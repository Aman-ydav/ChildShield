<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\SystemNotificationMail;
use App\Models\ContactSubmission;
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
        $validated = $request->validated();

        // Persist submission for admin review
        ContactSubmission::create([
            'user_id' => $request->user()?->id,
            'name' => $validated['name'] ?? null,
            'email' => $validated['email'] ?? null,
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'] ?? null,
            'ip_address' => $request->ip(),
        ]);

        Mail::to($supportEmail)->send(new SystemNotificationMail(
            subjectLine: 'ChildShield contact enquiry: '.$validated['subject'],
            messageBody: "Name: {$validated['name']}\nEmail: {$validated['email']}\n\n{$validated['message']}",
        ));

        return back()->with('status', __('childshield.contact_sent'));
    }
}