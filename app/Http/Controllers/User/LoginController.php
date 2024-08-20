<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Admin;
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
            $user->status = 'offline';
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

        $user = User::where('username', $request->username)->first();

        if ($user && $user->blocked_until && $user->is_permanent_block > now()) {
            return redirect()->back()->withErrors([
                'username' => 'Maaf, Akun Anda telah Di Tangguhkan untuk sementara waktu.',
            ])->withInput($request->only('username'));
        }

        $auth = Auth::guard('users')->attempt([
            'username' => $request->username,
            'password' => $request->password
        ]);

        if ($auth) {
            $user->status = 'online';
            $user->save();

            return redirect()->route('Dashboard');
        }

        return redirect()->back()->withErrors([
            'username' => 'Maaf, Username atau Password Anda Salah.',
        ])->withInput($request->only('username'));
    }



    public function logout()
    {
        $user = Auth::guard('users')->user();

        Auth::guard('users')->logout();

        if ($user) {
            $user->status = 'offline';
            $user->save();
        }

        Session::flash('successMessage', 'Terima Kasih Atas Kepercayaan Anda');
        return redirect()->route('Dashboard');
    }


    public function forgotpassword()
    {
        return view('User.auth.reset');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        $admin = Admin::where('email', $request->email)->first();

        if ($user || $admin) {
            if ($admin) {
                Password::setDefaultDriver('admins');
            }
            $status = Password::sendResetLink(
                $request->only('email')
            );

            if ($status === Password::RESET_LINK_SENT) {
                return redirect()->route('login')->with('success', 'Berhasil mengirim tautan untuk mereset password. Silakan cek alamat email Anda.');
            } else {
                return redirect()->route('forgot')->with('error', 'Gagal mengirim tautan reset password. Silakan coba lagi nanti.');
            }
        } else {
            return redirect()->route('forgot')->with('error', 'Maaf, Kami tidak dapat menemukan alamat email Anda.');
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
        ], [
            'password.required' => 'Password tidak boleh kosong.',
            'password.min' => 'Password minimal harus memiliki 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
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
