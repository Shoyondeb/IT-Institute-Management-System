<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Pending</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: linear-gradient(135deg, #4F46E5, #7C3AED);
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }

        .content {
            background: #f9fafb;
            padding: 30px;
            border-radius: 0 0 8px 8px;
            border: 1px solid #e5e7eb;
        }

        .details {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin: 15px 0;
            border: 1px solid #e5e7eb;
        }

        .detail-row {
            padding: 10px 0;
            border-bottom: 1px solid #f3f4f6;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .label {
            font-weight: bold;
            color: #4F46E5;
            display: inline-block;
            width: 140px;
        }

        .badge {
            display: inline-block;
            background: #F59E0B;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .button {
            display: inline-block;
            background: #4F46E5;
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 15px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1 style="margin:0;">{{ $isAdmin ? '📋 New Enrollment Request' : '✅ Enrollment Submitted' }}</h1>
    </div>

    <div class="content">
        @if($isAdmin)
        <h2>Hello Admin!</h2>
        <p>A new enrollment request has been submitted by <strong>{{ $user->name }}</strong> ({{ $user->email }}).</p>
        @else
        <h2>Hello {{ $user->name }}!</h2>
        <p>Your enrollment request has been submitted successfully. Please wait for admin verification.</p>
        @endif

        <div class="details">
            <h3 style="margin-top:0; color:#4F46E5;">📝 Enrollment Details</h3>

            <div class="detail-row">
                <span class="label">Course:</span>
                <span>{{ $course->title }}</span>
            </div>

            <div class="detail-row">
                <span class="label">Course Fee:</span>
                <span>৳{{ $course->fee }}</span>
            </div>

            <div class="detail-row">
                <span class="label">Payment Method:</span>
                <span>{{ ucfirst($enrollment->payment_method) }}</span>
            </div>

            <div class="detail-row">
                <span class="label">Mobile Number:</span>
                <span>{{ $enrollment->mobile_number }}</span>
            </div>

            <div class="detail-row">
                <span class="label">Transaction ID:</span>
                <span><strong>{{ $enrollment->transaction_id }}</strong></span>
            </div>

            <div class="detail-row">
                <span class="label">Status:</span>
                <span class="badge">Pending Verification</span>
            </div>

            @if($isAdmin)
            <div class="detail-row">
                <span class="label">Student Email:</span>
                <span>{{ $user->email }}</span>
            </div>
            <div class="detail-row">
                <span class="label">Student Name:</span>
                <span>{{ $user->name }}</span>
            </div>
            @endif
        </div>

        @if(!$isAdmin)
        <p style="margin-top:20px;">
            <strong>⚠️ Important:</strong> Your enrollment will be active after admin verification.
            You will receive a confirmation email once verified.
        </p>
        @else
        <p style="margin-top:20px;">
            <strong>⚠️ Action Required:</strong> Please verify the payment details and approve or reject this enrollment.
        </p>
        @endif

        <div style="text-align:center;">
            @if($isAdmin)
            <a href="{{ route('admin.enrollments.index') }}" style="color:#ffffff; text-decoration:none;" class=" button">
                Admin Enrollment
            </a>
            @else
            <a href="{{ route('dashboard') }}" style="color:#ffffff; text-decoration:none;" class="button">Dashboard</a>
            @endif
        </div>
    </div>

    <div class="footer">
        <p>This email was sent from {{ config('app.name') }}</p>
        <p style="font-size:12px; color:#9ca3af;">
            {{ $isAdmin ? 'Admin notification' : 'Enrollment confirmation' }}
        </p>
    </div>
</body>

</html>