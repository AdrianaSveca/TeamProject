<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\User;

class ContactsController extends Controller
{
    public function index()
    {
        return view('contact');
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'topic' => 'required|in:General enquiry,Orders & payments,Quiz & account,Technical issue',
            'message' => 'required|string',
        ]);

        $admin = User::where('role', 'admin')->inRandomOrder()->first();

        if (!$admin) {
            return back()->withErrors(['error' => 'No support staff are currently available to receive this message. Please contact us by phone.'])->withInput();
        }

        $validated['admin_id'] = $admin->user_id ?? $admin->id; 

        Contacts::create($validated);

        return redirect()->route('contact.thankyou');
    }

    public function showThankYou()
    {
        return view('thankyou');
    }
}