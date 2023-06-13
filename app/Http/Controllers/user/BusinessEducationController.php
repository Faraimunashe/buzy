<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;

class BusinessEducationController extends Controller
{
    public function index()
    {
        $business_educations = Topic::all();
        return view('user.business-education', [
            'topics' => $business_educations
        ]);
    }

    public function one($id)
    {
        $topic = Topic::find($id);
        return view('user.one-businesseducation', [
            'topic' => $topic
        ]);
    }
}
