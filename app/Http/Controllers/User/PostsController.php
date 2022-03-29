<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\PostRequest;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:users');
    }


    public function index()
    {   
        $e_all=Post::select('id','name','title','body','thumbnail','created_at')->paginate(4);
        // dd($e_all);
        return view('user.posts.index',compact('e_all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_name=$request->file('thumbnail')->store('');
        $thumbnail_path=$request->file('thumbnail')->storeAs('public/posts/',$file_name);
        try{
            DB::transaction(function () use($request,$thumbnail_path) {
                $e_all = Post::create([
                    'name' => Auth::user()->name,
                    'title' => $request->title,
                    'body' => $request->body,
                    'thumbnail'=>basename($thumbnail_path),
                    'created_at' => Carbon::now(),
                ]);
            }, 2);
        }catch(\Throwable $e){
            Log::error($e);
            throw $e;
        }
        return redirect()->route('user.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        // dd($post);
        return view('user.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $post_edit=Post::find($id);
        return view('user.posts.edit',compact('post_edit'));
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
        $file_name=$request->file('thumbnail')->store('');
        $thumbnail_path=$request->file('thumbnail')->storeAs('public/posts/',$file_name);
        try{
            DB::transaction(function () use($request, $post,$thumbnail_path) {
                    $post->title = $request->title;
                    $post->body = $request->body;
                    $post->thumbnail=basename($thumbnail_path);
                    $post->created_at = Carbon::now();
                    $post->save();
            }, 2);
        }catch(\Throwable $e){
            Log::error($e);
            throw $e;
        }
        return redirect()->route('user.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
