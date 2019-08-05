<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\TmplService;
use Illuminate\Support\Facades\Log;

class TmplTest extends TestCase
{
    public function testTmplGetList()
    {
        $TmplService = new TmplService();
        $response = $TmplService->getList();
        Log::info('message', [$response]);
        $this->assertTrue(true);
    }
}
