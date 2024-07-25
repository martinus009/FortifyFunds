<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Models\Invest;
use App\Models\Artikel;
use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminLogin()
    {
        return view('Admin.auth.login');
    }

    public function adminActionLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username harus di isi',
            'password.required' => 'Password harus di isi',
        ]);

        $auth = Auth::guard('admins')->attempt(['username' => $request->username, 'password' => $request->password]);
        if ($auth) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withErrors([
            'username' => 'Maaf, Sepertinya Username Atau Password Anda Salah',
        ])->withInput($request->only('username'));
    }


    public function adminLogout()
    {
        Auth::guard('admins')->logout();
        return redirect()->route('admin.login');
    }

    public function adminDashboard()
    {
        $totalUsers = User::count();
        $totalArtikel = Artikel::count();
        $totalSaldo = Admin::sum('saldo');
        $totalUsersOnline = User::where('status', 'online')->count();
        $totalUsersOffline = User::where('status', 'offline')->count();
        $totalUsersBanned = User::where('status', 'banned')->count();

        return view('Admin.pages.dashboard', compact('totalUsers', 'totalSaldo', 'totalArtikel', 'totalUsersOnline', 'totalUsersOffline', 'totalUsersBanned'));
    }


    public function adminProfile()
    {
        return view('Admin.pages.profile');
    }

    public function adminUser()
    {
        $user = User::get();
        return view('admin.pages.user', compact('user'));
    }

    public function block($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404, 'User not found');
        }

        $user->blocked_until = Carbon::now()->addDays(7);

        $user->status = 'banned';

        $user->save();

        return redirect()->back()->with('success', 'Akun Pengguna Berhasil Di Tangguhkan.');
    }


    public function unblock($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404, 'User not found');
        }

        $user->blocked_until = null;

        $user->status = 'offline';

        $user->save();

        return redirect()->back()->with('success', 'Akun Pengguna Berhasil Di Pulihkan');
    }

    public function adminArticle()
    {
        $article = Artikel::latest()->get();
        return view('Admin.pages.article', compact('article'));
    }

    public function articleCreate()
    {
        return view('Admin.pages.article-create');
    }


    public function createArticle(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:artikels',
            'slug' => 'required|string|max:255|unique:artikels',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string',
            'status' => 'required|string',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nama_foto = time() . '_' . $image->getClientOriginalName();
            $image->move('ArticlesPhotos/', $nama_foto);
        } else {
            return redirect()->back()->withErrors(['image' => 'File gambar wajib diunggah.'])->withInput();
        }

        $slug = Str::slug($request->title);

        $data = Artikel::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'category' => $request->category,
            'status' => $request->status,
            'image' => $nama_foto, // Simpan nama file gambar
        ]);

        return redirect()->route('admin.article')->with('success', 'Postingan berhasil ditambahkan');
    }

    public function adminInvest()
    {
        $invest = Invest::latest()->get();
        return view('Admin.pages.invest', compact('invest'));
    }

    public function adminMarket()
    {
        return view('Admin.pages.invest-create');
    }

    public function adminContact()
    {
        $company = Contact::first();
        return view('Admin.pages.contact', compact('company'));
    }

    public function adminUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|string|email|max:255',
        ]);

        $contact = Contact::first(); // Ganti dengan cara Anda mengambil ID kontak dari formulir

        if (!$contact) {
            return redirect()->back()->with('error', 'Kontak tidak ditemukan.');
        }

        $contact->name = $request->name;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->email = $request->email;

        $contact->save();

        return redirect()->route('admin.contact')->with('success', 'Berhasil Memperbaharui Informasi Kontak');
    }

    public function investCreate(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:invests',
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nama_foto = time() . '_' . $image->getClientOriginalName();
            $image->move('InvestPhotos/', $nama_foto);
        } else {
            return redirect()->back()->withErrors(['image' => 'File gambar wajib diunggah.'])->withInput();
        }

        $slug = Str::slug($request->code);

        $data = Invest::create([
            'code' => $request->code,
            'slug' => $slug,
            'name' => $request->name,
            'image' => $nama_foto,
            'category' => $request->category,
        ]);

        return redirect()->route('admin.invest')->with('success', 'Berhasil Menambahkan Market');
    }

    public function adminReset(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|string',
        ]);

        $admin = Auth::guard('admins')->user();

        $admin->username = $request->username;
        $admin->email = $request->email;

        if (!empty($request->password)) {
            $admin->password = bcrypt($request->password);
        }

        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Berhasil Memperbaharui Profile');
    }
}
