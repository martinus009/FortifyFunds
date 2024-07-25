<?php

namespace App\Http\Controllers\User;

use App\Models\News;
use App\Models\User;
use App\Models\Admin;
use App\Models\Invest;
use App\Models\Artikel;
use App\Models\Contact;
use App\Models\Suggestion;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        $invest = Invest::latest()->limit(8)->get();
        $contact = Contact::get();
        $events = Artikel::where('category', 'event')->where('status', 'publish')->limit(6)->get();
        return view('user.dashboard', compact('events', 'contact', 'invest'));
    }


    public function about()
    {
        return view('user.about');
    }

    public function news()
    {
        $news = Artikel::where(function ($query) {
            $query->where('category', 'artikel')
                ->orWhere('category', 'event');
        })
            ->where('status', 'publish')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.news', compact('news'));
    }

    public function newsDetail($slug)
    {
        $news = Artikel::where('slug', $slug)->firstOrFail();
        $relatedNews = Artikel::where(function ($query) use ($news) {
            $query->where('category', 'event')
                ->orWhere('category', 'artikel');
        })
            ->where('status', 'publish')
            ->where('id', '!=', $news->id)
            ->take(5)
            ->get();

        return view('user.news-detail', compact('news', 'relatedNews'));
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function information()
    {
        return view('user.information');
    }

    public function investDetail($slug)
    {
        $invest = Invest::where('slug', $slug)->firstOrFail();
        return view('user.invest-detail', compact('invest'));
    }


    public function investMore()
    {
        $invest = Invest::latest()->paginate(8);
        return view('User.invest-more', compact('invest'));
    }

    public function profile()
    {
        return view('User.profile');
    }

    public function profileReset(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'password' => 'nullable|string',
        ]);

        $user = Auth::guard('users')->user();

        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Data berhasil diperbarui');
    }

    public function topUp()
    {
        return view('User.topUp');
    }

    public function mini()
    {
        return view('User.topUp-get');
    }

    public function topUpMini(Request $request)
    {
        $nasabah = auth()->user();

        $jumlah_topup = $request->amount;

        $jumlah_topup = str_replace('.', '', $jumlah_topup);
        $jumlah_topup = (int) $jumlah_topup;

        $maxBalance = 50000000;

        $saldo_setelah_topup = $nasabah->saldo + $jumlah_topup;

        if ($saldo_setelah_topup > $maxBalance) {
            return redirect()->route('topUp')->with('warning', 'Mohon Maaf, Anda Telah Melewati Batas Maksimal Untuk Menyimpan Saldo.');
        }

        // Menyimpan transaksi top-up ke dalam database
        DB::transaction(function () use ($nasabah, $jumlah_topup) {
            $nasabah->saldo += $jumlah_topup;
            $nasabah->save();

            $transaction = new Transaction();
            $transaction->amount = $jumlah_topup;
            $transaction->type = 'top-up';
            $transaction->save();
        });

        return redirect()->route('topUp.index')->with('success', 'Top Up berhasil. Saldo Anda telah diperbarui.');
    }


    public function withdraw()
    {
        return view('user.withdraw');
    }

    public function withdrawTake(Request $request)
    {
        $nasabah = User::where('id', auth()->user()->id)->firstOrFail();

        $jumlah_penarikan = str_replace('.', '', $request->amount);
        $jumlah_penarikan = (int) $jumlah_penarikan;

        $nominal_minimal = 50000;

        if ($nasabah->saldo >= $jumlah_penarikan && $jumlah_penarikan >= $nominal_minimal) {
            $nasabah->saldo -= $jumlah_penarikan;

            $nasabah->save();

            $transaction = new Transaction();
            $transaction->amount = $jumlah_penarikan;
            $transaction->type = 'withdraw';
            $transaction->save();

            return redirect()->route('information')->with('success', 'Tarik tunai berhasil. Saldo Anda telah diperbarui.');
        } elseif ($jumlah_penarikan < $nominal_minimal) {
            return redirect()->back()->with('topUp', 'Maaf, Jumlah Minimal untuk melakukan Tarik tunai adalah Rp' . number_format($nominal_minimal, 0, ',', '.') . '');
        } else {
            return redirect()->back()->with('topUp', 'Maaf, Saldo Anda tidak mencukupi untuk melakukan tarik tunai. Silahkan coba lagi.');
        }
    }

    public function transfer()
    {
        return view('user.transfer-search');
    }

    public function searchUser(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
        ]);

        $loggedInUserId = auth()->user()->id;

        $users = User::where('phone', $request->phone)->get();

        if ($users->isEmpty()) {
            return view('user.transfer-search')->with('error', 'Pengguna Yang Anda Cari Belum Terdaftar Di Platform Kami')->with('users', $users);
        }

        foreach ($users as $key => $user) {
            if ($user->id === $loggedInUserId) {
                unset($users[$key]);
                return view('user.transfer-search')->with('error', 'Anda tidak dapat mentransfer ke akun Anda sendiri.')->with('users', $users);
            }

            if ($user->status === 'banned') {
                return view('user.transfer-search')->with('error', 'Maaf, pengguna yang Anda cari saat ini akunnya sedang ditangguhkan sehingga tidak dapat melakukan transaksi untuk sementara waktu.')->with('users', $users);
            }
        }

        return view('user.transfer-search', compact('users'));
    }

    public function send()
    {
        return view('User.transfer-send');
    }

    public function transferSend($user_id)
    {
        $selectedUser = User::find($user_id);

        if (!$selectedUser) {
            abort(404);
        }

        return view('User.transfer-send', compact('selectedUser'));
    }

    public function processTransfer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
        ], [
            'user_id.required' => 'User ID harus diisi.',
            'user_id.exists' => 'User dengan ID ini tidak ditemukan.',
            'amount.required' => 'Jumlah transfer harus diisi.',
            'amount.numeric' => 'Jumlah transfer harus berupa angka.',
            'amount.min' => 'Jumlah transfer harus lebih besar atau sama dengan 0.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $receiver = User::find($request->user_id);

        if (!$receiver) {
            return redirect()->back()->with('error', 'Penerima transfer tidak ditemukan.');
        }

        $transferAmount = (float) $request->amount;
        $adminFee = 2500;

        $totalAmountToTransfer = $transferAmount + $adminFee;

        if ($user->saldo >= $totalAmountToTransfer) {
            DB::transaction(function () use ($user, $receiver, $transferAmount, $adminFee, $totalAmountToTransfer) {
                $transaction = new Transaction();
                $transaction->sender_id = $user->id;
                $transaction->receiver_id = $receiver->id;
                $transaction->amount = $transferAmount;
                $transaction->admin_fee = $adminFee;
                $transaction->type = 'transfer';
                $transaction->save();

                $user->saldo -= $totalAmountToTransfer;
                $user->save();

                $receiver->saldo += $transferAmount;
                $receiver->save();

                $admin = Admin::first();
                if ($admin) {
                    $admin->saldo += $adminFee;
                    $admin->save();
                }
            });

            return redirect()->route('transfer')->with('success', 'Transfer berhasil dilakukan.');
        } else {
            return redirect()->back()->with('error', 'Saldo Anda tidak mencukupi untuk melakukan transfer ini.');
        }
    }




    public function transactionHistory()
    {
        $user = Auth::user();
        $transactions = Transaction::where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)
            ->orderByDesc('created_at')
            ->get();

        return view('User.transaction-history', compact('transactions'));
    }

    public function suggestion(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        try {
            $suggestion = new Suggestion();
            $suggestion->name = $request->name;
            $suggestion->email = $request->email;
            $suggestion->phone = $request->phone;
            $suggestion->subject = $request->subject;
            $suggestion->message = $request->message;
            $suggestion->save();

            return redirect()->route('suggestion')->with('success', 'Pendaftaran Berhasil, Silakan Login.');
        } catch (\Exception $e) {
            return redirect()->route('suggestion')->with('error', 'Gagal melakukan pendaftaran. Silakan coba lagi.');
        }
    }
}
