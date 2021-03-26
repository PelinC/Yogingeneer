<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\Category;
use App\Models\Model\Post;
use App\Models\Model\Project;
use App\Models\Model\Contact;
use Validator;
use Mail;
class Homepage extends Controller
{
    public function index(){
        $data['posts']=Post::latest()->where('status',1)->take(3)->get();
        $data['projects']=Project::latest()->where('status',1)->take(3)->get();
        $data['categories']=Category::get();
        return view('front.homepage',$data);
    }
    public function resume(){
        return view('front.resume');
    }
    public function aboutMe(){
        return view('front.aboutme');
    }
    public function blog(){
        $data['posts']=Post::where('status',1)->orderBy('created_at','DESC')->paginate(3);
        $data['categories']=Category::get();
        return view('front.blog',$data);
    }
    public function single($category,$slug){
        $category=Category::whereSlug($category)->first() ?? abort(404);
        $posts=Post::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(404);
        $posts->increment('hit');
        $data['posts']=$posts;

        return view('front.single',$data);
    }
    public function projects(){
        $data['projects']=Project::where('status',1)->orderBy('created_at','DESC')->paginate(3);
        return view('front.Projects',$data);
    }
    public function project($slug){
        $projects=Project::whereSlug($slug)->first() ?? abort(404);
        $projects->increment('hit');
        $data['projects']=$projects;

        return view('front.project',$data);
    }
    public function category($slug){
        $category=Category::whereSlug($slug)->first() ?? abort(404);
        $data['category']=$category;
        $data['posts']=Post::where('category_id',$category->id)->orderBy('created_at','DESC')->paginate(3);;
        $data['categories']=Category::get();
        return view('front.category',$data);


    }
    public function contact(){
        return view('front.contact');
    }
    public function contactpost(Request $request){
        $rules=[
            'name'=>'required|min:6',
            'email'=>'required|email',
            'phone'=>'required',
            'message'=>'required'

        ];
        $validate=Validator::make($request->post(),$rules);
        if($validate->fails()){
            return redirect()->route('contact')->withErrors($validate)->withInput();
        }

        Mail::send([],[],function($message) use($request){
            $message->from('yogingeneer@blog.com','Yogingeneer');
            $message->to('pelinsucelebi@gmail.com');
            $message->setBody('Sent by:'.$request->name.'<br /> Sender e-mail: '.$request->email. '<br /><h3> '.$request->message.' </h3><br /><br /> Date:'.now().'','text/html');
            $message->subject($request->name . '  has send you a message!');

        });


        //$contact = new Contact;
        //$contact->name=$request->name;
        //$contact->email=$request->email;
        //$contact->phone=$request->phone;
        //$contact->message=$request->message;
        //$contact->save();
        return redirect()->route('contact')->with('success',"Thank you for your message. I will get back to you asap!");
    }
}
