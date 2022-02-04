<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index(){
        $userId = Auth::user()->id;
        $categories = Category::where('userId',$userId)->get();
        $projects = Project::where('userId',$userId)->get();
        return view('addNewTask',[
            'categories' => $categories,
            'projects' => $projects
        ]);
    }

    public function store(Request $request){
        $newTask = new Task;

        $newTask->userId=Auth::user()->id;
        $newTask->name=$request['taskName'];
        $newTask->statusId=$request['statusId'];
        $newTask->categoryId=$request['categoryId'];
        $newTask->projectId=$request['projectId'];
        $newTask->source=$request['source'];
        $newTask->notes=$request['notes'];


        $dueDate = strtotime($request['dueDate']);
        $newTask->dueDate=date('Y-m-d H:i:s', $dueDate);

        $startDate = strtotime($request['startDate']);
        $newTask->startDate=date('Y-m-d H:i:s', $startDate);



        $newTask->save();

        return redirect('addNewTask');
    }
}
