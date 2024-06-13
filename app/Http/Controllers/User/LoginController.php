<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LoginController extends Controller
{
    public function Login()
    {
        return view('user.auth.login');
    }

    public function input()
    {
        $validatedData = request()->validate([
            'username' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|unique:users',
            'password' => 'required',
        ]);

        try {
            $user = new User();
            $user->username = $validatedData['username'];
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->phone = $validatedData['phone'];
            $user->password = bcrypt($validatedData['password']);
            $user->save();

            return redirect()->route('login')->with('success', 'Pendaftaran Berhasil, Silakan Login.');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Gagal melakukan pendaftaran. Silakan coba lagi.');
        }
    }


    public function actionLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $auth = Auth::guard('users')->attempt(['username' => $request->username, 'password' => $request->password]);
        if ($auth) {
            return redirect()->route('Dashboard');
        }

        return redirect()->back()->withErrors([
            'username' => 'Maaf, Sepertinya Username Atau Password Anda Salah',
        ])->withInput($request->only('username'));
    }

    public function logout()
    {
        Auth::guard('users')->logout();
        Session::flash('successMessage', 'Terima Kasih Atas Kepercayaan Anda');
        return redirect()->route('Dashboard');
    }

    public function forgotpassword()
    {
        return view('User.auth.reset');
    }

    public function resetpassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        try {
            $user = User::where('email', $request->email)->firstOrFail();
            $status = Password::sendResetLink(
                $request->only('email')
            );

            return redirect()->route('login')->with('success', 'Berhasil mengirim tautan untuk mereset password. Silakan cek alamat email anda.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('forgot')->with('error', 'Maaf, Kami tidak menemukan alamat email anda');
        }
    }


    public function passwordreset(string $token)
    {
        return view('User.auth.passwordreset', ['token' => $token]);
    }

    public function password(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return redirect()->route('login')->with('success', 'Password berhasil diubah. Silakan login kembali.');
    }
}
