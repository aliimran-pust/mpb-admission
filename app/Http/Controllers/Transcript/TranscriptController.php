<?php

namespace App\Http\Controllers\Transcript;

use App\Http\Controllers\Controller;
use App\Models\Transcript\CandidateProfile;
use App\Traits\UtilityTrait;
use Illuminate\Http\Request;

class TranscriptController extends Controller
{
    use UtilityTrait;

    public function create()
    {
        return view('backend.auth.create');
    }

    public function profile()
    {
        $profile = CandidateProfile::where('user_id', auth()->id())->first();
        return view('backend.candidate.create', compact('profile'));
    }

    public function store_profile(Request $request) {
        $request->validate([
            'name_bn' => 'required|string',
            'name_en' => 'required|string',
            'mother_name' => 'required|string',
            'father_name' => 'required|string',
            'dob' => 'required|date',
            'nationality' => 'required|string',
            'present_address' => 'required|string',
            'permanent_address' => 'nullable|string',
            'department' => 'required|string',
            'hall' => 'required|string',
            'reg_no' => 'required|string',
            'session' => 'required|string',
            'session_started' => 'required|string',
            'exam_held' => 'required|string',
            'degree_awarded' => 'required|string',
            'year' => 'required|string',
            'nid' => 'nullable|string',
            'birth_certificate' => 'nullable|string',
            'passport' => 'nullable|string',
        ]);

        if ( empty($request->nid) && empty($request->birth_certificate) && empty($request->passport) ) {
            return back()->withErrors([
                'id_required' => 'At least one of NID, Birth Certificate, or Passport is required.'
            ])->withInput();
        }

        CandidateProfile::updateOrCreate(
            ['user_id' => auth()->id()],
            $request->except('_token')
        );

        $this->messageSession($request, 'Information Updated Successfully');

        return redirect()->route('candidate.profile');
    }
}
