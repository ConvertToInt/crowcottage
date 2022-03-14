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

        // dd($classes->dates());

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
        $class = new Classes;
        $class->name = $request->name;
        $class->desc = $request->desc;
        $class->start_time = $request->start_time;
        $class->end_time = $request->end_time;
        $class->spaces = $request->spaces;
        $class->price_per_block = $request->price;
        $class->weeks_per_block = $request->weeks;
        $class->save();
         
        return back()->with('success', 'Class Created');
    }

    public function check_availability(Request $request)
    {
        $date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
        $class = Classes::where('id', $request->class_id)->first();

        $date = $class->dates->where('date', $date);
        
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
