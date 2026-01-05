<!-- resources/views/emails/membership_confirmation.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>BACSAF Membership Application Received</title>
</head>
<body>
<h1>Dear {{ $data['title'] }} {{ $data['full_name'] }},</h1>

<p>Thank you for submitting your membership application to the Bangladesh Association of Commonwealth Scholars and Fellows (BACSAF).</p>

<h3>Application Details:</h3>
<ul>
    <li><strong>Application Date:</strong> {{ date('F j, Y') }}</li>
    <li><strong>Membership Type:</strong> {{ ucfirst($data['membership_type']) }} Member</li>
    <li><strong>Reference Number:</strong> {{ $data['csc_ref'] }}</li>
</ul>

<p>We will review your application and contact you if we need any additional information.</p>

<p>For any queries, please contact us at bacsafbd@gmail.com</p>

<p>Best regards,<br>
    BACSAF Team</p>
</body>
</html>
