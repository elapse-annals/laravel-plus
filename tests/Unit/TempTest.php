<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\TempService;
use Illuminate\Support\Facades\Log;

class TempTest extends TestCase
{
    public function testTempGetList()
    {
        $TempService = new TempService();
        $response = $TempService->getList();
        Log::info('message', [$response]);
        $this->assertTrue(true);
    }
}
