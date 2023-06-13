<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Exception;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        return view('partner');
    }

    public function apply(Request $request)
    {
        $request->validate([
            'apply_as' => ['required', 'integer'],
            'fullname' => ['required', 'string'],
            'image' => ['required', 'file', 'mimes:png,jpg'],
            'email' => ['required', 'email'],
            'speciality' => ['required', 'string'],
            'phone' => ['required', 'digits:10', 'starts_with:07'],
            'location' => ['required', 'string'],
            'dob' => ['required_if:apply_as,1|integer', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
            'company' => ['required', 'string']
        ]);

        try{
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/known_faces'), $imageName);

            $reqs = new Requests();
            $reqs->applied_as = $request->apply_as;
            $reqs->fullname = $request->fullname;
            $reqs->image = $imageName;
            $reqs->email = $request->email;
            $reqs->speciality = $request->speciality;
            $reqs->phone = $request->phone;
            $reqs->location = $request->location;
            $reqs->dob = $request->dob;
            $reqs->company = $request->company;
            $reqs->status = false;
            $reqs->save();

            return redirect()->back()->with('success', 'Successfully applied partnership');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
