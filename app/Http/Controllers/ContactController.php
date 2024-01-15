<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact.form');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Send email to administrators
        $adminsEmails = ['admin1@example.com', 'admin2@example.com']; // Add your administrators' emails
        foreach ($adminsEmails as $adminEmail) {
            Mail::to($adminEmail)->send(new ContactFormMail($request->all()));
        }

        return redirect()->route('contact.form')->with('success', 'Your message has been sent!');
    }
}
