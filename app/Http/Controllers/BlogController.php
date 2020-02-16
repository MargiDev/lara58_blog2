<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;

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
    // Update posts set view_count = view_count + 1 where id = ?
    # 1
    // $viewCount = $post->view_count + 1;
    // $post->update(['view_count' => $viewCount]);

    # 2
    $post->increment('view_count');
    return view('blog.show')->with(compact('post'));
  }

  public function category(Category $category)
  {

    $categoryName = $category->title;

    $posts = $category->posts()
                      ->with('author')
                      ->latestFirst()
                      ->published()
                      ->simplePaginate($this->limit);
    return view('blog.index')->with(compact('posts', 'categoryName'));

  }

  public function author(User $author)
  {
    $authorName = $author->name;

    $posts      = $author->posts()
                        ->with('category')
                        ->latestFirst()
                        ->published()
                        ->simplePaginate($this->limit);
    return view('blog.index')->with(compact('posts', 'authorName'));
  }

}
