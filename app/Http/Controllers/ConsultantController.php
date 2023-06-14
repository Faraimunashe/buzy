<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use App\Models\Investor;
use App\Models\Objective;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    public function consultant($consultant_id)
    {
        $consultant = Consultant::find($consultant_id);
        return view('consultant', [
            'consultant' => $consultant
        ]);
    }


    public function investor($investor_id)
    {
        $investor = Investor::find($investor_id);
        return view('investor', [
            'investor' => $investor
        ]);
    }


    public function objectives($objective_id)
    {
        $objective = Objective::find($objective_id);
        return view('objective', [
            'objective' => $objective
        ]);
    }
}
