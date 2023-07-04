<?php

namespace App\Http\Controllers;

use App\Models\Post;

class AjaxController extends Controller
{
    public function __invoke()
    {
        $massiv = [];
        foreach (Post::all() as $post) {
            $massiv[] = $post->title;
        }
        return response()->json($massiv);
    }
}
