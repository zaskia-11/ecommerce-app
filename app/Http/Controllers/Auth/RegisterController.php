<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // ================================================
    // TRAIT: RegistersUsers
    // ================================================
    // Trait ini yang melakukan pekerjaan berat:
    // - Menangani routes GET /register (tampil form)
    // - Menangani routes POST /register (proses submit)
    // - Login otomatis setelah register sukses
    // ================================================
    use RegistersUsers;

    /**
     * Redirect setelah registrasi berhasil.
     */
    protected $redirectTo = '/home';

    /**
     * Constructor.
     */
    public function __construct()
    {
        // Hanya guest (belum login) yang bisa akses form register.
        // User yang sudah login akan di-redirect ke home.
        $this->middleware('guest');
    }

    /**
     * Validasi data registrasi.
     *
     * Method ini menentukan aturan validasi untuk input form.
     *
     * @param array $data Data dari request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            // CUSTOM MESSAGES
            'name.required'     => 'Nama wajib diisi.',
            'email.required'    => 'Email wajib diisi.',
            'email.unique'      => 'Email sudah terdaftar. Gunakan email lain.',
            'password.min'      => 'Password minimal 8 karakter agar aman.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);
    }

    /**
     * Buat user baru setelah validasi berhasil.
     *
     * Method ini dieksekusi oleh Trait RegistersUsers setelah validasi lolos.
     *
     * @param array $data Data valid
     * @return \App\Models\User Object user baru
     */
    protected function create(array $data): User
    {
        // ================================================
        // CREATE USER + HASH PASSWORD
        // ================================================
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     =>'customer',       
        ]);
    }
}
