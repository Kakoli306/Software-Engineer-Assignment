<?php
namespace App\Repositories;
use App\Models\Task;

class TaskRepository implements TaskInterface {
    
    public function all(){
        return Task::get();
    }

    public function get($id){
        return Task::find($id);
    }

    public function store(array $data){
        return Task::create($data);
    }

    public function update($id, array $data){
        return Task::find($id)->update($data);
    }

    public function delete($id){
        return Task::destroy($id);
    }
}