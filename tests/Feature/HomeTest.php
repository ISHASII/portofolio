<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Testimonial;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_shows_expected_view_and_data()
    {
        Profile::factory()->create();
        Project::factory()->count(2)->create();
        Testimonial::factory()->count(2)->create();

        $response = $this->get('/');

        $response->assertStatus(200)
                 ->assertViewIs('home')
                 ->assertViewHasAll(['profile', 'projects', 'testimonials']);
    }
}
