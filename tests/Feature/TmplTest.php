<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Tmpl;
use Faker\Generator as Faker;

class TmplTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetTmpls()
    {
        $response = $this->get('/tmpls');

        $response->assertStatus(200);
    }

    public function testPostTmpls()
    {
        $faker = new Faker();
        $data = [
            'name' => $faker->name,
            'sex'  => $faker->numberBetween(0, 1),
        ];
        $response = $this->post('/tmpls', $data);
        $response->assertStatus(200);
    }

    public function testPutTmpls()
    {
        $tmpl = Tmpl::first();
        $tmpl->name = 'test';
        $response = $this->put('/tmpls/' . $tmpl->id, $tmpl);
        $response->assertStatus(200);
    }

    public function testDeleteTmpls()
    {
        $tmpl = Tmpl::first();
        $response = $this->delete('/tmpls/' . $tmpl->id);
        echo $tmpl->id;
        $response->assertStatus(200);
        $this->isNull(Tmpl::find($tmpl->id));
    }
}
