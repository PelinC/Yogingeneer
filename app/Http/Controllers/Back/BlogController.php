<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\Post;
use App\Models\Model\Category;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderby('created_at','ASC')->get();
        return view('back.blogpost.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('back.blogpost.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=new Post;
        $post->title=$request->title;
        $post->category_id=$request->category;
        $post->content=$request->content;
        $post->slug=str_slug($request->title);
        if($request->hasFile('image')){
            $imageName=str_slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $post->image="uploads/".$imageName;
        }
        $post->save();
        toastr()->success('Success', 'Posted Successfully!');
        return redirect()->route('admin.posts.index');
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
        $post=Post::findOrFail($id);

        $categories=Category::all();
        return view('back.blogpost.update',compact('categories','post'));

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
        $post=Post::findOrFail($id);
        $post->title=$request->title;
        $post->category_id=$request->category;
        $post->content=$request->content;
        $post->slug=str_slug($request->title);
        if($request->hasFile('image')){
            $imageName=str_slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $post->image="uploads/".$imageName;
        }
        $post->save();
        toastr()->success('Success', 'Updated Successfully!');
        return redirect()->route('admin.posts.index');
    }
    public function switch(Request $request){
        $post=Post::findOrFail($request->id);
        $post->status=$request->statu=="true" ? 1 : 0;
        $post->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($id){
         Post::find($id)->delete();
         toastr()->success('Post Deleted!');
         return redirect()->route('admin.posts.index');

     }
    public function destroy($id)
    {
        //
    }
}
