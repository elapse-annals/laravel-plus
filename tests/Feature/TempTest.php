<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TempTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('temps');
        \Log::info('$response', [$response]);
        $data = ['js_data','info','table_data','js_data.page'];
        $response->assertViewHasAll($data);

    }

    /*public function testCreate()
    {
        $response = $this->get('temps');

        $response->assertStatus(200);
    }

    public function testStore()
    {
        $response = $this->get('temps');

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $response = $this->get('temps');

        $response->assertStatus(200);
    }

    public function testEdit()
    {
        $response = $this->get('temps');

        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $response = $this->get('temps');

        $response->assertStatus(200);
    }

    public function testDestroy()
    {
        $response = $this->get('temps');

        $response->assertStatus(200);
    }*/

}
