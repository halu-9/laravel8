<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function test_status_code()
    {
        // \Illuminate\Testing\TestResponseが返る
        $response = $this->get('/home');
        $response->assertStatus(200);
    }

    public function test_body()
    {
        $response = $this->get('/home');
        $response->assertSeeText('こんにちは!');
    }
}
