<?php

namespace App\Services;

use App\Mail\SystemNotificationMail;
use App\Models\SystemNotification;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class CaseNotificationService
{
    public function notify(
        User $user,
        string $title,
        string $message,
        ?string $subjectLine = null,
        ?string $actionUrl = null,
        ?string $actionLabel = null
    ): void {
        SystemNotification::create([
            'user_id' => $user->id,
            'title' => $title,
            'message' => $message,
            'is_read' => false,
        ]);

        Mail::to($user->email)->send(new SystemNotificationMail(
            subjectLine: $subjectLine ?? $title,
            messageBody: $message,
            actionUrl: $actionUrl,
            actionLabel: $actionLabel,
        ));
    }
}