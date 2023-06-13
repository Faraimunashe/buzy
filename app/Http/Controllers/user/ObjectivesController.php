<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Objective;
use App\Models\ObjectiveComment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObjectivesController extends Controller
{
    public function index()
    {
        $objectives = Objective::where('user_id', Auth::id())->get();
        return view('user.objectives', [
            'objectives' => $objectives
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'objective' => ['required', 'string'],
            'checkpoint' => ['required', 'date', 'after:today'],
            'deadline' => ['required', 'date', 'after:today'],
            'description' => ['required', 'string']
        ]);

        try{
            $ob = new Objective();
            $ob->user_id = Auth::id();
            $ob->objective = $request->objective;
            $ob->checkpoint = $request->checkpoint;
            $ob->deadline = $request->deadline;
            $ob->description = $request->description;
            $ob->save();

            return redirect()->back()->with('success', 'successfully added an objective');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete(Request $request)
    {
        $request->validate([
            'objective_id' => ['required', 'integer'],
        ]);

        try{
            $ob = Objective::find($request->objective_id);
            $ob->delete();

            return redirect()->back()->with('success', 'successfully deleted objective');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function add_comment(Request $request)
    {
        $request->validate([
            'objective_id' => ['required', 'integer'],
            'comment' => ['required', 'string']
        ]);

        try{
            $com = new ObjectiveComment();
            $com->objective_id = $request->objective_id;
            $com->comment = $request->comment;
            $com->save();

            return redirect()->back()->with('success', 'successfully added new objective');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
