<?php

namespace App\Http\Controllers;

use App\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blogs::latest()->paginate(10);
        return view('pages.berita.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('public/images/cover_image/');
            $image->move($destinationPath, $name);

            // Create Post
            $post = new Blogs;
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->user_id = auth()->user()->id;
            $post->cover_image = $name;
            $post->save();
            alert()->success('Penyimpanan Berhasil !', '');
            return back();

        } else {
            alert()->success('Penyimpanan Berhasil !', '');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Blogs::find($id);
        return view('pages.berita.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Blogs::find($id);
        // check of correct user
        if (auth()->user()->id !== $post->user_id) {
            return back()->with('error', 'You are not allowed to edit this post.');
        }
        return view('pages.berita.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'required',
        ]);

        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('public/images/cover_image/');
            $image->move($destinationPath, $name);

            // Create Post
            $post = Blogs::find($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->user_id = auth()->user()->id;
            $post->cover_image = $name;
            $post->save();

            return redirect('/blogs')->with('success', 'Post created successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Blogs::find($id);
        // check of correct user
        if (auth()->user()->id !== $post->user_id) {
            return back()->with('error', 'You are not allowed to delete this post.');
        }

        if ($post->cover_image !== 'noimage.jpg') {
            //Delete image
            Storage::delete('public/images/cover_images/' . $post->cover_image);
        }
        $post->delete();
        return redirect('/blogs')->with('success', 'Post deleted successfully');
    }
}
