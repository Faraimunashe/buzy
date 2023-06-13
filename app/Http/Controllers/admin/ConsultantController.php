<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Consultant;
use Exception;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    public function index()
    {
        $consultants = Consultant::all();

        return view('admin.consultants', [
            'consultants' => $consultants
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'string'],
            'image' => ['required', 'file', 'mimes:png,jpg'],
            'email' => ['required', 'email'],
            'speciality' => ['required', 'string'],
            'phone' => ['required', 'digits:10', 'starts_with:07'],
            'location' => ['required', 'string'],
            'dob' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
            'company' => ['required', 'string']
        ]);
        try{
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/known_faces'), $imageName);

            $consultants = new Consultant();
            $consultants->fullname = $request->fullname;
            $consultants->image = $imageName;
            $consultants->email = $request->email;
            $consultants->speciality = $request->speciality;
            $consultants->phone = $request->phone;
            $consultants->location = $request->location;
            $consultants->dob = $request->dob;
            $consultants->company = $request->company;
            $consultants->save();

            return redirect()->back()->with('success', 'Successfully added consultant');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function update(Request $request)
    {
        $request->validate([
            'consultant_id' => ['required', 'integer'],
            'fullname' => ['required', 'string'],
            'image' => ['required', 'file', 'mimes:png,jpg'],
            'email' => ['required', 'email'],
            'speciality' => ['required', 'string'],
            'phone' => ['required', 'digits:10', 'starts_with:07'],
            'location' => ['required', 'string'],
            'dob' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
            'company' => ['required', 'string']
        ]);
        try{
            $imageName = time().'.'.$request->file->extension();
            $request->file->move(public_path('images/known_faces'), $imageName);

            $consultants = Consultant::find($request->consultant_id);
            $consultants->fullname = $request->fullname;
            $consultants->image = $imageName;
            $consultants->email = $request->email;
            $consultants->speciality = $request->speciality;
            $consultants->phone = $request->phone;
            $consultants->location = $request->location;
            $consultants->dob = $request->dob;
            $consultants->company = $request->company;
            $consultants->save();

            return redirect()->back()->with('success', 'Successfully updated consultant');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function delete(Request $request)
    {
        $request->validate([
            'consultant_id' => ['required', 'integer'],
        ]);
        try{
            $consultants = Consultant::find($request->consultant_id);
            $consultants->delete();

            return redirect()->back()->with('success', 'Successfully deleted consultant');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
}
