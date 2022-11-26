<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Date;
use Carbon\Carbon;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Classes::get();
        $dates = Date::get();

        return view ('classes.index', [
            'classes'=>$classes,
            'dates'=>$dates
        ]);
    }

    public function create()
    {
        return view ('classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'desc' => 'required|max:64000',
            'start_time' => 'required',
            'end_time' => 'required',
            'spaces' => 'required|numeric',
            'price_per_block' => 'required|numeric',
            'weeks_per_block' => 'required|numeric'
        ]);

        $class = new Classes;
        $class->name = $request->name;
        $class->desc = $request->desc;
        $class->start_time = $request->start_time;
        $class->end_time = $request->end_time;
        $class->spaces = $request->spaces;
        $class->price_per_block = $request->price_per_block;
        $class->weeks_per_block = $request->weeks_per_block;
        $class->save();
         
        return back()->with('success', 'Class Created');
    }

    public function check_availability(Request $request)
    {
        $date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
        $class = Classes::where('id', $request->class_id)->first();

        $date = Date::where('class_id', $class->id)->where('date', $date)->first();
        
        return $date;
    }

    public function delete(Classes $class)
    {
        $class->delete();

        $classes = classes::get();

        return view ('admin.classes', [
            'classes'=>$classes
        ]);

    }
}
