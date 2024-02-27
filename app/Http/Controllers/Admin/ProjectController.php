<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderByDesc('id')->get();
        return view('admin.projects.projects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create_project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->all();
        $project = new Project();
        $project->title = $form_data['title'];
        $project->description = $form_data['description'];
        $project->languages = $form_data['languages'];
        $project->relese_date = $form_data['relese_date'];

        if ($request->hasFile('mockup_image')) {
            $path = Storage::disk('public')->put('project_image', $form_data['mockup_image']);
            $form_data['mockup_image'] = $path;
        }
        $project->mockup_image = $form_data['mockup_image'];
        $slug = Str::slug($project->title, '-');
        $project->slug = $slug;
        $project->save();
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show_project', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit_project', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->all();
        $project->title = $form_data['title'];
        $project->description = $form_data['description'];
        $project->languages = $form_data['languages'];
        $project->relese_date = $form_data['relese_date'];

        if ($request->hasFile('mockup_image')) {

            if ($project->mockup_image != null) {
                Storage::disk('public')->delete($project->mockup_image);
            }
            $path = Storage::disk('public')->put('project_image', $form_data['mockup_image']);
            $form_data['mockup_image'] = $path;
            $project->mockup_image = $form_data['mockup_image'];
        }
        $slug = Str::slug($project->title, '-');
        $project->slug = $slug;
        $project->update();
        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->mockup_image != null) {
            Storage::disk('public')->delete($project->mockup_image);
        }
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
