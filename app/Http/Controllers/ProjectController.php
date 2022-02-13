<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(){
        $userId = Auth::user()->id;
        $projects = Project::where('userId', $userId)->get();
        return view('projects',['projects'=>$projects]);
    }
    public function store(Request $request){
        $newProjectName = $request['newName'];
        $userId = Auth::user()->id;

        $newProject = new Project;
        $newProject->name=$newProjectName;
        $newProject->userId=$userId;
        $newProject->save();

        return redirect('projects');
    }

    public function delete(Request $request){
        $id = $request['id'];
        Project::destroy($id);
        return redirect('projects');
    }

    public function edit(Request $request){
        $idOfProject = $request['id'];
        $projectNewName = $request['name'];

        $projectToEdit = Project::find($idOfProject);
        $projectToEdit->name = $projectNewName;
        $projectToEdit->save();

        return redirect('projects');
    }
}
