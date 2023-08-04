<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Guru;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kelas = Kelas::all()->count();
        $guru = Guru::all()->count();
        $siswa = Siswa::all()->count();
        $user = User::all()->count();
        return view('pages.admin.dashboard', compact('kelas','guru','siswa','user'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
