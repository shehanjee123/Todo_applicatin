<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $task;       

    public function __construct(){
        $this->task=new Todo();
    }

    public function index(){
        $response['tasks'] = $this->task->all();                                                                                               
        return view('pages.tode.index')->with($response); 
    }

    public function insert(Request $request){
    // 1 method
    //    $task = new Todo;
    //    $task->title=$request->title;
    //    $task->save();
    //    return redirect()->route('home');

    // 2 method
    $this->task->create($request->all());
    return redirect()->back();

    }
     
    public function delete($task_id){
       $task =  $this->task->find($task_id);
       $task->delete();
       return redirect()->back();
    }
   
    public function complete($task_id){
        $task = $this->task->find($task_id);
        $task->status = 1;
        $task->update();
        return redirect()->back();
    }

    public function not_complete($task_id){
        $task = $this->task->find($task_id);
        $task->status = 0;
        $task->update();
        return redirect()->back();
    }

    
}
