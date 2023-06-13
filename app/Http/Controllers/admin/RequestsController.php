<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Consultant;
use App\Models\Investor;
use App\Models\Requests;
use Exception;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    public function index()
    {
        $requestss = Requests::where('status', false)->get();

        return view('admin.requests', [
            'requests' => $requestss
        ]);
    }

    public function approve(Request $request)
    {
        $request->validate([
            'request_id' => ['required', 'integer'],
        ]);
        try{

            $req = Requests::find($request->request_id);
            if(is_null($req))
            {
                return redirect()->back()->with('error', 'Request not found');
            }

            if($req->applied_as == 1)
            {
                $consultants = new Consultant();
                $consultants->fullname = $req->fullname;
                $consultants->image = $req->image;
                $consultants->email = $req->email;
                $consultants->speciality = $req->speciality;
                $consultants->phone = $req->phone;
                $consultants->location = $req->location;
                $consultants->dob = $req->dob;
                $consultants->company = $req->company;
                $consultants->save();
            }else{
                $consultants = new Investor();
                $consultants->fullname = $req->fullname;
                $consultants->image = $req->image;
                $consultants->email = $req->email;
                $consultants->interest = $req->speciality;
                $consultants->phone = $req->phone;
                $consultants->location = $req->location;
                $consultants->company = $req->company;
                $consultants->save();
            }

            $req->status = true;
            $req->save();
            return redirect()->back()->with('success', 'Successfully approved request');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function decline(Request $request)
    {
        $request->validate([
            'request_id' => ['required', 'integer'],
        ]);
        try{
            $req = Requests::find($request->request_id);
            $req->status = false;
            $req->save();
            return redirect()->back()->with('success', 'Successfully declined request');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function delete(Request $request)
    {
        $request->validate([
            'request_id' => ['required', 'integer'],
        ]);
        try{
            $req = Requests::find($request->request_id);
            $req->delete();
            return redirect()->back()->with('success', 'Successfully deleted request');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

}
