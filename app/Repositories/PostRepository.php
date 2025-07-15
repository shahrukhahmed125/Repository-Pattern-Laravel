<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    /**
     * Create a new class instance.
     */

    public function all()
    {
        // Logic to retrieve all posts
        return Post::all();
    }

    public function find($id)
    {
        // Logic to find a post by ID
        return Post::find($id);
    }

    public function create(array $data)
    {
        // Logic to create a new post
        return Post::create($data);
    }

    public function update($id, array $data)
    {
        // Logic to update a post by ID
        $post = Post::find($id);
        if ($post) {
            $post->update($data);
            return $post;
        }
        return null;
    }

    public function delete($id)
    {
        // Logic to delete a post by ID
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return true;
        }
        return false;
    }
}
