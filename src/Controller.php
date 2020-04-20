<?php

namespace Zashiki\ContactForm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller as Base;
use Zashiki\ContactForm\Mail\Company;
use Zashiki\ContactForm\Mail\Customer;

class Controller extends Base
{
    public function index()
    {
        return view('contact::index');
    }

    public function send(Request $request)
    {
        $data = $request->validate(config('contact.validation', []));

        Mail::send(new Company($data));
        Mail::send(new Customer($data));

        return redirect()->route('contact.thanks');
    }

    public function thanks()
    {
        return view('contact::thanks');
    }
}
