<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use DB;
class TaskController extends Controller

{
    
    public function index(){
        $tasks = Task::where('user_id', '=', ((Auth()->user()->id)))
        ->where('task_status', '=', 1)
        ->paginate(7);
        return view('tasks-history',['tasks'=>$tasks]);


    }

    public function donetask($id){
        Task::where('id', $id)->update(array('task_status' => '1'));
            return back();
       }

    public function deletetask($id){
        Task::where('id', $id)->delete();
            return back();
       }


    public function insertTask(Request $request) {

        $content = new Task();

        $content->user_id = $request->input('id');
        $content->name = $request->input('name');
        $content->save();



        return back();

    }
}
