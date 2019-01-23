<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Category;

class CategoryTest extends TestCase
{
    use WithFaker , RefreshDatabase;

    public $att;

    /**
    * setUp
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();

        $this->att = factory(Category::Class)->make([ 'name' => $this->faker->name, 'status' => 1 ]);
    }

    /** @test */
    public function store_category()
    {

        $this->post(route('cats.store'),$this->att->toArray());

        $this->assertDatabaseHas('categories',$this->att->toArray());

        //$this->get('admin/cats/create/')->assertStatus(201);
    }
}
