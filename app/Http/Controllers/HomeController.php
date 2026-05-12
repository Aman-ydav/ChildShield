<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\SystemNotificationMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'heroStats' => [
                ['label' => 'Reports received', 'value' => '1,248'],
                ['label' => 'Cases verified', 'value' => '872'],
                ['label' => 'Communities covered', 'value' => '54'],
            ],
        ]);
    }

    public function about(): View
    {
        return view('about');
    }

    public function contact(): View
    {
        return view('contact');
    }

    public function sendContact(ContactFormRequest $request): RedirectResponse
    {
        $supportEmail = config('mail.from.address') ?: 'support@childshield.test';

        Mail::to($supportEmail)->send(new SystemNotificationMail(
            subjectLine: 'ChildShield contact enquiry: '.$request->validated('subject'),
            messageBody: "Name: {$request->validated('name')}\nEmail: {$request->validated('email')}\n\n{$request->validated('message')}",
        ));

        return back()->with('status', __('childshield.contact_sent'));
    }
}