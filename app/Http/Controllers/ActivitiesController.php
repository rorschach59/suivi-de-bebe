<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivitiesRequest;
use App\Models\Activities;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function create()
    {
        $activities = new Activities();

        return view('activities.create', [
            'activities' => $activities
        ]);
    }

    public function postCreate(ActivitiesRequest $request)
    {
        $activities = Activities::create($request->validated());

        return redirect()->route('home-index')->with('newActivity', ' ');
    }

}
