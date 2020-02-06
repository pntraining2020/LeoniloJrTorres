<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\TimeBreak;
use App\Models\TimeLogs;
use DB;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    //

    protected $names;
    protected $current_emp;
    protected $logs;
    protected $breaks;

    public function retrieveAll(Request $request)
    {

        $this->current_emp = Employee::find(1);
        $this->logs = TimeLogs::where(['emp_id' => $this->current_emp->id]);
        $this->breaks = TimeBreak::where(['emp_id' => $this->current_emp->id]);
        return $this->returnView();

    }

    public function switchEmp(Request $request)
    {
        $this->current_emp = Employee::find($request->current_emp);
        $this->logs = TimeLogs::where(['emp_id' => $this->current_emp->id]);
        $this->breaks = TimeBreak::where(['emp_id' => $this->current_emp->id]);
        return $this->returnView();
    }

    public function timeIn(Request $request)
    {

         $this->current_emp = Employee::find($request->id);
        $updateTime = new \DateTime();
        DB::table('logs')
            ->where('emp_id', $request->id)
            ->update(['time_in' => $updateTime->format("H:i")]);
        return $this->returnView();
    }
    public function timeOut(Request $request)
    {
         $this->current_emp = Employee::find($request->id);
        $updateTime = new \DateTime();
        DB::table('logs')
            ->where('emp_id', $request->id)
            ->update(['time_out' => $updateTime->format("H:i")]);
        return $this->returnView();
    }
    public function start_break(Request $request)
    {
         $this->current_emp = Employee::find($request->id);
        $updateTime = new \DateTime();
        DB::table('breaks')
            ->where('emp_id', $request->id)
            ->update(['start_time' => $updateTime->format("H:i")]);
        return $this->returnView();}
    public function end_break(Request $request)
    {
         $this->current_emp = Employee::find($request->id);
        $updateTime = new \DateTime();
        DB::table('breaks')
            ->where('emp_id', $request->id)
            ->update(['end_time' => $updateTime->format("H:i")]);
        return $this->returnView();

    }
    public function returnView()
    {
        # code...
        $this->names = Employee::all();

        $this->logs = TimeLogs::where(['emp_id' => $this->current_emp->id])->get();
        $this->breaks = TimeBreak::where(['emp_id' => $this->current_emp->id])->get();
        return view('index')->with('data', [
            'names' => $this->names,
            'breaks' => $this->breaks,
            'logs' => $this->logs,
            "current_emp" => $this->current_emp]);

    }
}
