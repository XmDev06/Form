<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Comment;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        $image = $request->file('image');
        $newname = time() . $image->getClientOriginalName();

        $image->move('images', $newname);


        Post::create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
                'created_at' => $request->created_at,
                'updated_at' => $request->updated_at,
                'image' => $newname,
            ]
        );
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View|Response
     */
    public function edit(Post $post)
    {

        return view('admin.posts.update', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return Response
     */
    public function update(Request $request, Post $post)
    {
        if ($request->image == null) {
            Post::find($post->id)->update(
                [
                    'title' => $request->title,
                    'description' => $request->description,
                    'user_id' => $request->user_id,
                    'updated_at' => DB::raw('NOW()'),
                ]
            );
        } else {

            unlink("images/".Post::find($post->id)->image);

            $image = $request->file('image');
            $newname = time() . $image->getClientOriginalName();

            $image->move('images', $newname);

            Post::find($post->id)->update(
                [
                    'title' => $request->title,
                    'description' => $request->description,
                    'user_id' => $request->user_id,
                    'updated_at' => $request->updated_at,
                    'image' => $newname,
                ]
            );
        }


        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        unlink('images/' . $post->image);
        return back();
    }
}
