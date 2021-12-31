<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Save Post
     *
     * @param $data
     * @return post
     * */
    public function save($data){
        $post = new $this->post;

        $post->title = $data['title'];
        $post->description = $data['description'];

        $post->save();

        return $post->refresh();
    }

    /**
     * Get all Posts
     *
     * @return array post
     * */
    public function getAll(){
        return $this->post->get();
    }

    /**
     * Get a specific Post
     *
     * @param int $id
     * @return post
     * */
    public function getById($id){
        return $this->post->findOrFail($id);
    }

    /**
     * delete Post
     *
     *
     * @param int $id
     * @return post
     * */
    public function delete($id){
        $post =  $this->post->findOrFail($id);
        $post->delete();

        return $post;
    }

    /**
     * Update Post
     *
     * @param array $data
     * @param int $id
     * @return post
     * */
    public function update($data, $id){
        $post = $this->post->findOrFail($id);

        $post->title = $data['title'];
        $post->description = $data['description'];

        $post->update();

        return $post;

    }
}
