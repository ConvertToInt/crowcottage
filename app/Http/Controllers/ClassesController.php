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

        // dd($dates);

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
        $class->price_per_block = $request->price;
        $class->weeks_per_block = $request->weeks;
        $class->save();

        // foreach ($request->dates as $class_date){
            $date = new Date;
            $date->class_id = $class->id;
            $date->date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
            $date->spaces = $request->spaces;
            $date->save();
        // }
         
        return back()->with('success', 'Class Created');
    }

    public function check_spaces(Date $date, Request $request)
    {
        $spaces = $date->spaces;
        
        return $spaces;
    }
}
