<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user_id = $request->user_id;
        $post_id = $request->post_id;
        $comment_id = $request->comment_id;
        $like = Like::where('user_id', $user_id)->where('post_id', $post_id)->get();
        $isLiked = $like->all() === [];

        if ($isLiked) {
            Like::create($request->all());
        } else {
            $like1 = Like::find($like[0]->id)->delete();
        }

        return redirect()->to($request->url);
    }

    /**
     * Display the specified resource.
     *
     * @param Like $like
     * @return Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Like $like
     * @return Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Like $like
     * @return Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Like $like
     * @return Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
