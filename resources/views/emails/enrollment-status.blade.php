<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Status</title>
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
            padding: 20px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }

        .header-verified {
            background: linear-gradient(135deg, #10B981, #059669);
            color: white;
        }

        .header-rejected {
            background: linear-gradient(135deg, #EF4444, #DC2626);
            color: white;
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
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .badge-verified {
            background: #10B981;
            color: white;
        }

        .badge-rejected {
            background: #EF4444;
            color: white;
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

        .reason-box {
            background: #FEF2F2;
            border-left: 4px solid #EF4444;
            padding: 12px 16px;
            margin: 15px 0;
            border-radius: 4px;
        }

        .reason-box p {
            margin: 0;
            color: #991B1B;
        }
    </style>
</head>

<body>
    @if($status === 'verified')
    <div class="header header-verified">
        <h1 style="margin:0;">✅ Enrollment Verified!</h1>
    </div>
    @else
    <div class="header header-rejected">
        <h1 style="margin:0;">❌ Enrollment Rejected</h1>
    </div>
    @endif

    <div class="content">
        <h2>Hello {{ $user->name }}!</h2>

        @if($status === 'verified')
        <p>Congratulations! Your enrollment for <strong>"{{ $course->title }}"</strong> has been <strong style="color:#10B981;">verified</strong>.</p>
        <p>You can now access the course content and start learning.</p>
        @else
        <p>We regret to inform you that your enrollment for <strong>"{{ $course->title }}"</strong> has been <strong style="color:#EF4444;">rejected</strong>.</p>
        <div class="reason-box">
            <p><strong>Reason:</strong> Your provided information did not match our records. Please check your payment details and try again.</p>
        </div>
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
                @if($status === 'verified')
                <span class="badge badge-verified">Verified ✅</span>
                @else
                <span class="badge badge-rejected">Rejected ❌</span>
                @endif
            </div>
        </div>

        @if($status === 'verified')
        <div style="text-align:center;">
            <a href="{{ route('dashboard') }}" class="button">🎓 Go to My Courses</a>
        </div>
        @else
        <div style="text-align:center;">
            <p style="color:#6b7280; font-size:14px;">You can try submitting a new enrollment with correct information.</p>
            <a href="{{ route('courses.public.index') }}" style="color:#ffffff; text-decoration:none;" class="button">📚 Browse Courses</a>
        </div>
        @endif
    </div>

    <div class="footer">
        <p>This email was sent from {{ config('app.name') }}</p>
        <p style="font-size:12px; color:#9ca3af;">
            Enrollment status update
        </p>
    </div>
</body>

</html>