@include('emails.email_header')

<tr>
    <td style="color: #5c5c5e; padding: 15px 0 10px 0; border-top: 1px solid #999999;" colspan="2">
        Hi {{ $user['first_name'] }},
    </td>
</tr>
<tr>
    <td style="color: #5c5c5e; padding-bottom: 22px;" colspan="6">
        An account has been created for you in Arogya Hospital. Please login to your account and change the password.
    </td>
</tr>
<tr>
    <td style="vertical-align: top; padding-bottom: 10px;">
        <strong>Username:</strong>
    </td>
    <td style="vertical-align: top; padding-bottom: 10px;">
        {{$user['email']}}
    </td>
</tr>
<tr>
    <td style="vertical-align: top; padding-bottom: 10px;">
        <strong>Password:</strong>
    </td>
    <td style="vertical-align: top; padding-bottom: 10px;">
        {{$user['password']}}
    </td>
</tr>
<tr>
    <td style="padding-bottom: 15px;" colspan="2">
        Thank you,<br /><br />
        <strong>Arogya Website</strong><br />
        <a href="<?php echo url('/'); ?>" style="color: #0c75fb; text-decoration: none;"><?php echo url('/'); ?></a>
    </td>
</tr>

<a href="{{ url('/') }}">Arogya</a>

@include('emails.email_footer')