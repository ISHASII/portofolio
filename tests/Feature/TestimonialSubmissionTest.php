<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Testimonial;

class TestimonialSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_testimonial_submits_and_is_saved()
    {
        $data = [
            'name' => 'Jane Doe',
            'content' => 'Great work!',
            'rating' => 5,
        ];

        $response = $this->post('/testimonials', $data);

        $response->assertRedirect()
                 ->assertSessionHas('success');

        $this->assertDatabaseHas('testimonials', [
            'name' => 'Jane Doe',
            'content' => 'Great work!',
            'rating' => 5,
        ]);
    }

    public function test_testimonial_validation_errors()
    {
        $response = $this->post('/testimonials', []);

        $response->assertSessionHasErrors(['name', 'content', 'rating']);
    }
}