<?php

namespace Tests\Feature;

use App\Material;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MaterialTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() {

        parent::setUp();

        // given we have a material
        $this->material = factory(Material::class)->create();
    }

    /**
     * @test
     */
    public function can_see_all_materials(): void {
        // given we have a material => added in setUp()

        // When we visit thread page
        $this->get('/materials')
            // we should see materials
            ->assertStatus(200)
            ->assertSee($this->material->name);
    }

    /**
     * @test
     */
    public function can_read_a_single_material(): void {

        // given we have a material => added in setUp()

        // We go to single material page
        $this->get('/materials/' . $this->material->id)
            // we should see the single material
            ->assertStatus(200)
            ->assertSee($this->material->name);
    }

    /**
     * @test
     */
    public function can_create_new_material(): void {

        $material = create(Material::class);

        $this->post('/materials', $material->toArray());

        $this->get($material->path())
            ->assertSee($material->name)
            ->assertSee($material->description);
    }

    /**
     * @test
     */
    public function can_edit_material(): void {

        // given we have a material, set up function

        // edit content
        $this->material->name = 'My Name';

        // see changed content


        $material = create(Material::class);

        $this->post('/materials', $material->toArray());

        $this->get($material->path())
            ->assertSee($material->name)
            ->assertSee($material->description);
    }
}
