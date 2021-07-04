<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\EmployeeSingleResource;
use Illuminate\Http\Request;
use App\Repositories\TestInterface;


class EmployeeController extends Controller
{
    protected $test;
    public function __construct(TestInterface $test)
    {
        $this->test = $test;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$employees = Employee::all();
        $employees = $this->test->all();

        if ($request->search) {
            $employees = Employee::where('first_name', "like", "%{$request->search}%")
            ->orWhere('last_name', "like", "%{$request->search}%")
            ->get();
        } elseif ($request->department_id) {
            $employees = Employee::where('department_id', $request->department_id)->get();
        }
       

        return EmployeeResource::collection($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request)
    {
       // $employee = Employee::create($request->validated());
       $employee = $this->test->store($request->validated());

        return response()->json($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(Employee $employee)
    // {
    //     return new EmployeeSingleResource($employee);
    // }

    public function show($id)
    {
        $employee = $this->test->get($id);
        return new EmployeeSingleResource($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // $this->test->get($id);
        //return response()->json($employee);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,EmployeeStoreRequest $request)
    {
        $this->test->update($id,$request->all());
       // $employee->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // $employee->delete();
       $this->test->delete($id);

        return response()->json('Employee Deleted Successfully');
    }
}
