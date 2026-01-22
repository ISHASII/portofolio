<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_submits_successfully()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'subject' => 'Hello',
            'message' => 'This is a test message.',
        ];

        $response = $this->post('/contact', $data);

        $response->assertRedirect()
                 ->assertSessionHas('success');
    }

    public function test_contact_form_validation_errors()
    {
        $response = $this->post('/contact', []);

        $response->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
    }
}
