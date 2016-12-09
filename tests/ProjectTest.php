<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function a_project_automatically_sets_the_slug_on_create()
    {
        $project = factory('App\Project')->create(['name' => 'Dit is een proef tekst']);
        $this->assertEquals('dit-is-een-proef-tekst', $project->slug);
    }

    /** @test */
    public function a_project_will_always_increment_a_slug_if_its_duplicate()
    {
        factory('App\Project')->create(['name' => 'Dit is een proef tekst']);
        factory('App\Project')->create(['name' => 'Dit is een proef tekst']);

        $latestProject = factory('App\Project')->create(['name' => 'Dit is een proef tekst']);
        $this->assertEquals('dit-is-een-proef-tekst-2', $latestProject->slug);
    }

    /** @test */
    public function a_project_will_always_update_slug_if_name_is_changed()
    {

    }

}
