<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Employee;

class DashController extends Controller
{
    public function dash()
    {
        $employees = Employee::all()->toArray();
        $tasks = Task::all()->toArray();
        return response()->json($employees,$tasks);
       

    }

    public function dashone()
    {
        $employees = Employee::all();
        
        return response()->json($employees);

    }
}
