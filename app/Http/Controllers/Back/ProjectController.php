<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::orderby('created_at','ASC')->get();
        return view('back.projectpost.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.projectpost.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project=new Project;
        $project->title=$request->title;
        $project->git=$request->sc;
        $project->content=$request->content;
        $project->slug=str_slug($request->title);
        if($request->hasFile('image')){
            $imageName=str_slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $project->image="uploads/".$imageName;
        }
        $project->save();
        toastr()->success('Success', 'Posted Successfully!');
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project=Project::findOrFail($id);

        return view('back.projectpost.update',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
     {
         $project=Project::findOrFail($id);
         $project->title=$request->title;
         $project->git=$request->sc;
         $project->content=$request->content;
         $project->slug=str_slug($request->title);
         if($request->hasFile('image')){
             $imageName=str_slug($request->title).'.'.$request->image->getClientOriginalExtension();
             $request->image->move(public_path('uploads'),$imageName);
             $project->image="uploads/".$imageName;
         }
         $project->save();
         toastr()->success('Success', 'Updated Successfully!');
         return redirect()->route('admin.projects.index');
     }
     public function projectswitch(Request $request){
         $project=Project::findOrFail($request->id);
         $project->status=$request->statu=="true" ? 1 : 0;
         $project->save();
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($id){
         Project::find($id)->delete();
         toastr()->success('Project Deleted!');
         return redirect()->route('admin.projects.index');

     }
    public function destroy($id)
    {
        //
    }
}
