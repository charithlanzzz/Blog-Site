<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    protected $post_id;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_layout()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_posts_index()
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
    }


    public function test_posts_create()
    {
        $response = $this->get('/posts/create');

        $response->assertStatus(200);
    }


    // public function test_posts_store()
    // {
    //     // $response = $this->get('/posts');
    //     // //$this->post_id=5;
    //     // $response->assertStatus(200);

    //     $response = $this->post('/posts',
         
    //      ['_token' => csrf_token(),
    //       'title' => 'charith',
    //       'content' => 'kasun',
    //       'author_id' => '02',
    //       'category_id' => '03']
    //     );    
    //     $response->assertStatus(201);
    // }

    
    public function test_posts_update()
    {
        //$response = $this->get('/posts/'.$this->post_id);
        $response = $this->get('/posts/6');
        $response->assertStatus(200);
    }


    public function test_posts_edit()
    {
        $response = $this->get('/posts/6/edit');

        $response->assertStatus(200);
    }

    //  public function test_posts_delete()
    //  {
    //      $response = $this->get('/posts/13/delete');

    //      $response->assertStatus(200);
    //  }
}
