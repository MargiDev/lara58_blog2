<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
  protected $limit = 3;

  public function index()
  {

    $posts = Post::with('author')
                    ->latestFirst()
                    ->published()
                    ->simplePaginate($this->limit);
    return view('blog.index')->with(compact('posts'));

  }

  public function show(Post $post)
  {
    // $post = Post::published()->findOrFail($id);
    return view('blog.show')->with(compact('post'));
  }

}