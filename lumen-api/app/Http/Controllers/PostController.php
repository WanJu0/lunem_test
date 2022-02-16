<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
//use App\Models\posts_table;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'price' => 'required',
            'photo' => 'required',
            'description' => 'required'
        ]);

        $post = new Post();
        if($request->hasFile('photo')){
            $file = $request->file('photp');
            $allowedfileExtention =['pdf','png','jpg'];
            $extention=$file->getClientOriginalExtension();
            $check = in_array($extention, $allowedfileExtention);

            if($check){
                $name =time() . $file->getClientOriginalName();
                $file->move('images',$name);
                $post->photo =$name;
            }
        }

        $post->title = $request->input('title');
        $post->price = $request->input('price');
        $post->description = $request->input('description');

        $post->save();

        return response()->json($post);
    }


    public function show($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }


    public function update(Request $request ,$id)
    {
        $this->validate($request,[
            'title' => 'required',
            'price' => 'required',
            'photo' => 'required',
            'description' => 'required'
        ]);
        
        
        $post = Post::find($id);

        if($request->hasFile('photo')){
            $file = $request->file('photp');
            $allowedfileExtention =['pdf','png','jpg'];
            $extention=$file->getClientOriginalExtension();
            $check = in_array($extention, $allowedfileExtention);

            if($check){
                $name =time() . $file->getClientOriginalName();
                $file->move('images',$name);
                $post->photo =$name;
            }
        }

        $post->title = $request->input('title');
        $post->price = $request->input('price');
        $post->description = $request->input('description');

        $post->save();


        return response()->json($post);

    }
    public function destory($id)
    {
        $post= Post::find($id);
        $post->delete();

        return response() ->json('Deleted Successfully');

    }
}
