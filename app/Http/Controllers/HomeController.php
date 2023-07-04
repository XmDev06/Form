<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Comment;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('id','>','0')->latest()->get();
        $categories = Category::all();

        $category_id = request()->input('category_id');
        $user_id = request()->input('user_id');


        if ($category_id != null) {
            $posts = Post::when($category_id, function ($query) use ($category_id) {
                $query->where('category_id', $category_id);
            })->latest()->get();
        }

        if ($user_id != null) {
            $posts = Post::when($user_id, function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })->latest()->get();
        }

        return view('user.posts.index', compact('posts', 'categories'));
    }

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

        DB::table('posts')->insert([
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'user_id' => $_POST['user_id'],
            'category_id' => $_POST['category_id'],
            'created_at' => $_POST['created_at'],
            'updated_at' => $_POST['updated_at'],
            'image' => $newname,
        ]);
        return redirect()->route('post');
    }

    public function show(Post $post)
    {
        $posts = [$post];
        return view('user.posts.show', compact('posts'));
    }

    public function search(Post $post)
    {
        $search = $_POST['search'];
        $posts = Post::where('title','like',"%$search%")->get();

        return view('user.posts.show', compact('posts'));
    }

    public function like(Post $post)
    {

    }
}
