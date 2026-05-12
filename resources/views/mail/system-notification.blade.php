<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $subjectLine }}</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f7fafc; color: #0f172a; margin: 0; padding: 24px;">
    <div style="max-width: 640px; margin: 0 auto; background: #ffffff; border-radius: 16px; padding: 32px; border: 1px solid #e2e8f0;">
        <h1 style="margin-top: 0; color: #12315b;">{{ $subjectLine }}</h1>
        <p style="font-size: 16px; line-height: 1.7;">{{ $messageBody }}</p>
        @if ($actionUrl && $actionLabel)
            <p>
                <a href="{{ $actionUrl }}" style="display: inline-block; background: #ff6b00; color: #ffffff; text-decoration: none; padding: 12px 18px; border-radius: 999px; font-weight: 700;">
                    {{ $actionLabel }}
                </a>
            </p>
        @endif
    </div>
</body>
</html>