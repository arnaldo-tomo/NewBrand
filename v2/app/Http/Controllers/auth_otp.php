<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class auth_otp extends Controller
{
    //

    public function auth(Request $request){
     // Capturar o input 'totp' da requisição
     $totpInput = $request->input('pin');
    
     // Verificar se o input existe
     if (!$totpInput) {
         return back()->withErrors(['totp' => 'O código TOTP é inválido.']);
     }
     
     // Tratar o input como string ou array conforme necessário
     $totpCode = is_array($totpInput) ? implode('', $totpInput) : $totpInput;
     
     // Validar que o código contém apenas números
     if (!ctype_digit($totpCode)) {
         return back()->withErrors(['totp' => 'O código TOTP deve conter apenas números.']);
     }
     
     // Verificar se o código é o esperado
     if ($totpCode === "647468") {
        Auth::login(Auth::getLastAttempted());
        $request->session()->regenerate();
        return redirect()->intended(route('dashboard', absolute: false));
     } else {
         // Retornar erro se o código não for o esperado
         return back()->withErrors(['totp' => 'O código de verificação está incorreto.']);
     }
    }
}
