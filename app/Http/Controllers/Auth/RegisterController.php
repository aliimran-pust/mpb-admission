<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\MembershipApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('backend.auth.register');
    }

    public function register(Request $request)
    {
        // Validate the form data
        $validatedData = $this->validateRequest($request);

        // Process file upload
        $receiptPath = $request->file('payment_receipt_copy')->store('payment_receipts', 'public');
        $validatedData['payment_receipt_copy'] = $receiptPath;

        // Create the membership application
        $application = MembershipApplication::create($validatedData);

        // Send email - pass the data as 'data' variable
        Mail::send('backend.email.membership_confirmation', ['data' => $validatedData],
            function ($message) use ($validatedData, $receiptPath, $request) {
                $message->to('bacsafbd@gmail.com')
                    ->subject('BACSAF Membership Registration')
                    ->from('bacsafsupport@gmail.com', 'BACSAF Admin');

                $message->attach(
                    Storage::disk('public')->path($receiptPath),
                    [
                        'as' => 'payment_receipt.' .
                            $request->file('payment_receipt_copy')->getClientOriginalExtension(),
                        'mime' => $request->file('payment_receipt_copy')->getMimeType()
                    ]
                );
            }
        );

        return redirect()->route('register')->with('success', 'Application submitted successfully!');
    }


    /**
     * Store the uploaded signature file
     */
    protected function storeSignature($file)
    {
        // Generate a unique filename
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

        // Store the file in the 'public/signatures' directory
        return $file->storeAs('payment_receipt_copy', $filename, 'public');
    }


    /**
     * Validate the form request data
     */
    protected function validateRequest(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|max:10',
            'full_name' => 'required|string|max:100',
            'address' => 'required|string|max:500',
            'mobile' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'occupation' => 'required|string|max:100',
            'specialization' => 'required|string|max:100',
            'membership_type' => 'required|in:life,general',
            'award_years' => 'required|string|max:50',
            'award_type' => 'required|in:scholarship,fellowship',
            'csc_ref' => 'required|string|max:50',
            'host_institution' => 'required|string|max:200',
            'academic_program' => 'required|string|max:50',
            'declaration' => 'required|accepted',
            'transaction_id' => 'required|string|max:50',
            'payment_receipt_copy' => [
                'required',
                'file',
                'mimetypes:application/pdf,image/jpeg,image/png',
                'max:2048' // 2MB max size
            ],
        ]);
    }

    public function success()
    {
        return view('membership.success');
    }

}
