<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Investor;
use Exception;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    public function index()
    {
        $investors = Investor::all();

        return view('admin.investors', [
            'investors' => $investors
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'string'],
            'image' => ['required', 'file', 'mimes:png,jpg'],
            'email' => ['required', 'email'],
            'interest' => ['required', 'string'],
            'phone' => ['required', 'digits:10', 'starts_with:07'],
            'location' => ['required', 'string'],
            'company' => ['required', 'string']
        ]);
        try{
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/known_faces'), $imageName);

            $consultants = new Investor();
            $consultants->fullname = $request->fullname;
            $consultants->image = $imageName;
            $consultants->email = $request->email;
            $consultants->interest = $request->interest;
            $consultants->phone = $request->phone;
            $consultants->location = $request->location;
            $consultants->company = $request->company;
            $consultants->save();

            return redirect()->back()->with('success', 'Successfully added investor');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function update(Request $request)
    {
        $request->validate([
            'investor_id' => ['required', 'integer'],
            'fullname' => ['required', 'string'],
            'image' => ['required', 'file', 'mimes:png,jpg'],
            'email' => ['required', 'email'],
            'interest' => ['required', 'string'],
            'phone' => ['required', 'digits:10', 'starts_with:07'],
            'location' => ['required', 'string'],
            'company' => ['required', 'string']
        ]);
        try{
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/known_faces'), $imageName);

            $consultants = Investor::find($request->investor_id);
            $consultants->fullname = $request->fullname;
            $consultants->image = $imageName;
            $consultants->email = $request->email;
            $consultants->interest = $request->interest;
            $consultants->phone = $request->phone;
            $consultants->location = $request->location;
            $consultants->company = $request->company;
            $consultants->save();

            return redirect()->back()->with('success', 'Successfully updated investor');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function delete(Request $request)
    {
        $request->validate([
            'investor_id' => ['required', 'integer'],
        ]);
        try{
            $investors = Investor::find($request->investor_id);
            $investors->delete();

            return redirect()->back()->with('success', 'Successfully deleted investor');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
}
