<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Date;
use App\Models\Classes;
use Carbon\Carbon;

class DateController extends Controller
{
    public function toggle(Request $request)
    {
        $date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
        $class = Classes::where('id', $request->class_id)->first();

        if(Date::where('date', $date)->where('class_id', $class->id)->exists()){
            $date = Date::where('date', $date)->where('class_id', $class->id)->first();
            $this->delete($request, $date);
        } else{
            $this->create($request, $class);
        }

        return;
    }

    public function create($request, $class)
    {
        $date = new Date;
        $date->class_id = $class->id;
        $date->date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
        $date->availability = $class->spaces;
        $date->save();
        return;
    }

    public function delete($request, $date)
    {
        $date->delete();
        return;
    }
}
