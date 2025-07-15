<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->postRepository->create($request->only(['title', 'content']));
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        $post = $this->postRepository->find($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->postRepository->update($id, $request->only(['title', 'content']));
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $this->postRepository->delete($id);
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
