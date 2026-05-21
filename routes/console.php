<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('send-mail', function () {
    try {
        Mail::raw('Congrats for sending test email with Gmail SMTP!', function ($message) {
            $message->to('amanyadav923949@gmail.com')
                    ->subject('You are awesome!')
                    ->from('amanyadav923949@gmail.com', 'ChildShield');
        });
        $this->info('Email sent successfully via Gmail SMTP!');
    } catch (\Exception $e) {
        $this->error('Error sending email: ' . $e->getMessage());
    }
})->purpose('Send test email via Gmail SMTP');
