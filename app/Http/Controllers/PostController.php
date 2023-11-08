<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $posts = Post::latest()->paginate(5);
        $user = Auth::user();
        $posts = Post::all();


        return view('doctor.community_forum',compact('user','posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>['required','string', 'min:5','max:100'],
            'description'=>['required','string', 'min:5'],
        ]);

        $user = Auth::user();
        $user->post()->create($request->all());

        // return redirect()->back()->with('success','Post created successfully');
        return response()->json(['success'=>'Post created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    // community forum section
    // public function show_community_forum(){

    // }

    // public function create_post(Request $request){

    // }

    public function store_comment(Request $request){
        $request->validate([
            'comment'=>['required','string', 'min:5'],
            'post_id'=>['required','integer'],
        ]);

        $post = Post::find($request->post_id);

        $post->comments()->create($request->all());

        // return redirect()->back()->with('success','Post created successfully');
        return response()->json(['success'=>'Comment posted']);
    }
}
