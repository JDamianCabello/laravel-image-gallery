<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * Root route should return Http code 302 redirect.
     *
     * @return void
     */
    public function test_homeRoute_Should_ReturnCode302Redirect(): void
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }

    /**
     * Gallery route should return Http code 200 OK.
     *
     * @return void
     */
    public function test_galleryRoute_Should_returnCode200OK(): void
    {
        $response = $this->get('/gallery');
        $response->assertStatus(200);
    }

    /**
     * Gallery route should return Http code 200 OK.
     *
     * @return void
     */
    public function test_editPhoto_Should_returnCode200OK(): void
    {
        $response = $this->get('/gallery/randomIDThatDoesExist');
        $response->assertStatus(200);
    }
}
