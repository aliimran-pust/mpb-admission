<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipApplication;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function candidate_list()
    {
        $candidates = MembershipApplication::all();
        return view('backend.candidate.candidate_list', compact('candidates'));
    }

    public function view_details_member($id)
    {
           $candidate = MembershipApplication::find($id);
           return view('backend.candidate.show', compact('candidate'));
    }

    public function membersApproval(Request $request)
    {
        MembershipApplication::where('id', $request->membership_id)->update(['application_status' => 'Approved']);
        $candidate = MembershipApplication::find($request->membership_id);
        return redirect()->back()
            ->with('success', $candidate->full_name . '\'s membership has been approved successfully!');
    }
}
