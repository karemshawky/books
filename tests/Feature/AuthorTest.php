<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Author;

class AuthorTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * setUp
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function storeAuthor()
    {
        $gest = factory(User::Class)->create();

        $user = $this->be($gest);

        // $attributes = [
        //     'name'    => $this->faker->name,
        //     'about'   => $this->faker->text,
        //     'pic'     => null,
        //     'status'  => 1,
        //     'user_id' => $gest->id
        // ];

        $author = factory(Author::Class)->create();

        $this->post('/admin/authors/', $author->toArray());

        $this->assertDatabaseHas('authors', $author->toArray());

        $this->get('/admin/authors/')->assertSee($author->name);
    }
}
