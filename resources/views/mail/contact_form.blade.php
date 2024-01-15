<!-- resources/views/mail/contact_form.blade.php -->

<h2>New Contact Form Submission</h2>

<p><strong>Name:</strong> {{ $formData['name'] }}</p>
<p><strong>Email:</strong> {{ $formData['email'] }}</p>
<p><strong>Message:</strong> {{ $formData['message'] }}</p>
