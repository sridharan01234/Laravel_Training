<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail as SendEmail;

class ProductController extends Controller
{
    public function index()
    {
        return 'Hello from ProductController index method';
    }

    public function create()
    {
        return 'Hello from ProductController create method';
    }

    public function store(Request $request)
    {
        return 'Hello from ProductController store method';
    }

    public function edit($id)
    {
        return "Hello from ProductController edit method for product $id";
    }

    public function update(Request $request, $id)
    {
        return "Hello from ProductController update method for product $id";
    }

    public function destroy($id)
    {
        return "Hello from ProductController destroy method for product $id";
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'to' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $to = $request->input('to');
        $subject = $request->input('subject');
        $message = $request->input('message');

        try {
            $email = new SendEmail($to, $subject, $message);
            Mail::to($to)->send($email);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }


                return redirect()->back()->with('success', 'Email sent successfully.');
    }
}
