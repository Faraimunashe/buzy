<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Consultant;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    public function index()
    {
        $consultants = Consultant::all();
        return view('user.consultants', [
            'consultants' => $consultants
        ]);
    }
}
