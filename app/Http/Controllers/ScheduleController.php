<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::paginate(10);

        return view("home", [
            'title' => 'Home', 
            'header' => 'To Do List',
            'schedules' => $schedules,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'body' => 'required',
        ];

        Schedule::create($request->validate($rules));

        return back()->with('success','Task Created!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:schedules,id',
            'clear' => 'required|in:y,n',
        ]);

        $schedule = Schedule::find($request->id);
        $schedule->clear = $request->clear;
        $schedule->save();

        return response()->json(['message' => 'Schedule updated successfully.']);
    }

    public function destroy(Schedule $schedule) {
        $schedule = Schedule::find($_POST['id'])->delete();

        return back()->with('delete', 'Task Deleted!');
    }
}
