<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageTest extends TestCase
{
    public function test_home_page_exists(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_login_page_exists(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_register_page_exists(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
}
