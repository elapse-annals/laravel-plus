<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TmplTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTmpls()
    {
        $response = $this->get('/tmpls');

        $response->assertStatus(200);
    }
}
