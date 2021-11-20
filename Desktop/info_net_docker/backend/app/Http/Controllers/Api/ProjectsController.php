<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;

class ProjectsController extends Controller
{
    // 一覧を表示する
    public function index()
    {


        $project = Projects::all();
        return response()->json($project, 200);
        //return ("hello");
        //return $project;
    }

    public function store(Request $request)
    {
        $project = new Projects;
        $project->name = $request->name;
        $project->save();
    }

    public function show(Projects $project)
    {
        return $project;
    }

    public function update(Request $request, Projects $project)
    {
        $project->name = $request->name;
        $project->save();

        return $project;
    }

    public function destroy(Projects $project)
    {
        $project->delete();
    }
}
