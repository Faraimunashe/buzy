<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Exception;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::all();

        return view('admin.topics', [
            'topics' => $topics
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'topic' => ['required', 'string'],
            'information' => ['required', 'string']
        ]);
        try{
            $topics = new Topic();
            $topics->topic = $request->topic;
            $topics->information = $request->information;
            $topics->save();

            return redirect()->back()->with('success', 'Successfully added topic');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function update(Request $request)
    {
        $request->validate([
            'topic_id' => ['required', 'integer'],
            'topic' => ['required', 'string'],
            'information' => ['required', 'string']
        ]);
        try{
            $topics = Topic::find($request->topic_id);
            $topics->topic = $request->topic;
            $topics->information = $request->information;
            $topics->save();

            return redirect()->back()->with('success', 'Successfully update topic');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function delete(Request $request)
    {
        $request->validate([
            'topic_id' => ['required', 'integer'],
        ]);
        try{
            $topics = Topic::find($request->topic_id);
            $topics->delete();

            return redirect()->back()->with('success', 'Successfully deleted topic');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
}
