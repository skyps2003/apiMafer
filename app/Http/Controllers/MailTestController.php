<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailTestController extends Controller
{
    public function sendTestMail()
    {
        Mail::raw('This is a test email.', function ($message) {
            $message->to('your_test_email@example.com')
                    ->subject('Test Email');
        });

        return response()->json(['message' => 'Test email sent.']);
    }
}
