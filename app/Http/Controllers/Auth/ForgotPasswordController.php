<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    protected function sendResetLinkEmail(Request $request)
    {
        $rules = [
            'email' => 'required|email',
        ];

        $feedback = [
            'email.required' => 'Preencha o email!',
            'email.email' => 'Email Inválido!'
        ];

        $request->validate($rules, $feedback);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return back()->with('status', 'Enviamos um email para redefinir sua senha!');
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()->withErrors(['wait' => 'Aguarde um pouco para tentar novamente!']);
    }
}
