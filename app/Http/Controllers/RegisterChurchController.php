<?php

namespace App\Http\Controllers;

use App\Models\Church;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterChurchController extends Controller
{
    public function showForm()
    {
        return view('auth.register-church');
    }

    public function store(Request $request)
    { 
        $request->validate([
            'name'      => 'required|string|max:255',
            'subdomain' => 'required|string|unique:churches,subdomain',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:6|confirmed',
        ]);

        DB::beginTransaction();

        try {
            // 1️⃣ Cria a igreja
           $church = Church::create([
                'name'      => $request->name,
                'subdomain' => Str::slug($request->subdomain),
                'email'     => $request->email,
                'active'    => true,
            ]);

            // 2️⃣ Cria o usuário ADMIN da igreja
            $user = User::create([
                'name'      => 'Administrador',
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'church_id' => $church->id,
            ]);

            // 3️⃣ Loga automaticamente
            Auth::login($user);

            // 4️⃣ Redireciona explicitamente para o subdomínio
            return redirect()->away(
                'http://' . $church->subdomain . '.localhost:8000'
            );


        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
