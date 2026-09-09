<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store(StoreContactMessageRequest $request)
    {
        ContactMessage::create($request->safe()->except('website'));

        return back()->with('success', 'Terima kasih, pesan Anda sudah kami terima. Tim Technogan akan segera menghubungi Anda.');
    }
}
