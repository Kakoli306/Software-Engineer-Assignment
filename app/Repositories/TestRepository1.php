<?php
namespace App\Repositories;
use App\Models\Employee;

class TestRepository1 implements TestInterface {
    
    public function all(){
        return Employee::get();
    }

    public function get($id){
        return Employee::find($id);
    }

    public function store(array $data){
        return Employee::create($data);
    }

    public function update($id, array $data){
        return Employee::find($id)->update($data);
    }

    public function delete($id){
        return Employee::destroy($id);
    }
}