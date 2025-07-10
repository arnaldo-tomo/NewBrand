<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class auth_otp extends Controller
{
    public function auth(Request $request)
    {
        // Capturar o input 'pin' da requisição
        $totpInput = $request->input('pin');
        
        // Capturar email e senha do formulário
        $email ="arnaldotomo@gmail.com";
        $password ="ajtomo@123";
        
        // Verificar se os campos necessários existem
        if (!$totpInput || !$email || !$password) {
            return back()->with('pin','Todos os campos são obrigatórios.');
        }
        
        // Tratar o input do PIN conforme necessário
        $totpCode = is_array($totpInput) ? implode('', $totpInput) : $totpInput;
        
        // Validar que o código contém apenas números
        if (!ctype_digit($totpCode)) {
            return back()->with('pin' ,'O código PIN deve conter apenas números.');
        }
        
        // Verificar se o código PIN é o esperado
        if ($totpCode === "647468") {
            // Se o PIN estiver correto, tenta fazer login com as credenciais fornecidas
            $credentials = [
                'email' => $email,
                'password' => $password
            ];
            
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended(route('dashboard', absolute: false));
            } else {
                return back()->with('pin', 'As credenciais fornecidas estão incorretas.');
            }
        } else {
            // Retornar erro se o código não for o esperado
            return back()->with('pin', 'O código de verificação está incorreto.');
        }
    }
}