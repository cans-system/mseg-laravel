<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\MyUtil;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index() {
        return view('pages.admin.posts', [
            'posts' => Post::all()
        ]);
    }
    
    public function create() {        
        # 初期値の指定
        $post = new Post();
        $post->published_at = new Carbon();
        $post->private = 0;
        
        return view('pages.admin.postCreate', [
            'post' => $post
        ]);
    }
    
    public function store(Request $request) {
        $request->validate([
            'title' => 'required'
        ]);
        
        $post = new post();
        $post->title = $request->title;
        $post->text = $request->text;
        $post->published_at = $request->published_at;
        $post->private = $request->private;
        if ($request->hasFile('image')) {
            $post->image = MyUtil::thumbnail($request->file('image')->store('img'));
        } elseif ($request->boolean('imageClear1')) {
            $post->image = "";
        }
        $post->save();

        return redirect("/admin/posts/{$post->id}/edit");
    }
    
    public function edit(Post $post) {
        return view('pages.admin.postEdit', [
            'post' => $post
        ]);
    }
    
    public function update(Request $request, Post $post) {
        $request->validate([
            'title' => 'required',
        ]);
        
        $post->title = $request->title;
        $post->text = $request->text;
        $post->published_at = $request->published_at;
        $post->private = $request->private;
        if ($request->hasFile('image')) {
            $post->image = MyUtil::thumbnail($request->file('image')->store('img'));
        } elseif ($request->boolean('imageClear1')) {
            $post->image = "";
        }
        $post->save();       

        return back()->with('toast', ['success', "{$post->title}を更新しました"]);
    }
    
    public function delete(Post $post) {     
        $post->delete();
      
        return back()->with('toast', ['success', "{$post->title}を削除しました"]);
    }
}
