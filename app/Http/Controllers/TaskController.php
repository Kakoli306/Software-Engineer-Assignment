<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskInterface;


class TaskController extends Controller
{
    protected $newtesk,$test;

    public function __construct(TaskInterface $newtesk)
    {
        $this->newtesk = $newtesk;
        
    }
   
    public function index()
    {
       // $tasks = Task::all()->toArray();
        $tasks = $this->newtesk->all()->toArray();
        return array_reverse($tasks);      
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'detail' => 'required',
            
        ]);
        $this->newtesk->store($request->all());
//Task::create($request->all());
        // $task = new Task([
        //     'name' => $request->input('name'),
        //     'detail' => $request->input('detail')
        // ]);
        // $task->save();

        return response()->json('Task created!');
    }

    public function show($id)
    {
        $task = $this->newtesk->get($id);
        return response()->json($task);
    }

    public function update($id, Request $request)
    {
        $this->newtesk->update($id,$request->all());

        // $task = Task::find($id);
        // $task->update($request->all());

        return response()->json('Task updated!');
    }

    public function destroy($id)
    {

        $this->newtesk->delete($id);
        // $task = Task::find($id);
        // $task->delete();

        return response()->json('Task deleted!');
    }

}
