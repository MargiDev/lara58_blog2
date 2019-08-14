<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class BlogController extends Controller
{
  protected $limit = 3;

  public function index()
  {

    // $categories = Category::with('posts')->orderby('title', 'asc')->get();
    $categories = Category::with(['posts' => function($query){
          $query->published();
      }])->orderBy('title', 'asc')->get();

    $posts = Post::with('author')
                    ->latestFirst()
                    ->published()
                    ->simplePaginate($this->limit);
    return view('blog.index')->with(compact('posts', 'categories'));

  }

  public function show(Post $post)
  {
    // $post = Post::published()->findOrFail($id);
    $categories = Category::with(['posts' => function($query){
          $query->published();
      }])->orderBy('title', 'asc')->get();
    return view('blog.show')->with(compact('post', 'categories'));
  }

  public function category($id)
  {

    // $categories = Category::with('posts')->orderby('title', 'asc')->get();
    $categories = Category::with(['posts' => function($query){
          $query->published();
      }])->orderBy('title', 'asc')->get();

    $posts = Post::with('author')
                    ->latestFirst()
                    ->published()
                    ->where('category_id', $id)
                    ->simplePaginate($this->limit);
    return view('blog.index')->with(compact('posts', 'categories'));

  }

}
