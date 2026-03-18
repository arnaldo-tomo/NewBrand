<?php

namespace App\Http\Controllers;

use App\Mail\ContactConfirmation;
use App\Mail\ContactReceived;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:120'],
            'email'   => ['required', 'email', 'max:200'],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
        ]);

        $contact = Contact::create([
            'name'    => $data['name'],
            'email'   => $data['email'],
            'message' => $data['message'],
            'ip'      => $request->ip(),
        ]);

        try {
            // Email to Arnaldo
            Mail::to(config('mail.owner_address', 'contacto@arnaldotomo.dev'))
                ->send(new ContactReceived($contact));

            // Confirmation to the sender
            Mail::to($contact->email)
                ->send(new ContactConfirmation($contact));
        } catch (\Exception $e) {
            // Log but don't fail — message is already saved
            \Log::error('Contact email failed: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Mensagem enviada com sucesso!',
        ]);
    }
}
