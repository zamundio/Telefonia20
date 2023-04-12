<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AjaxTest extends TestCase
{
    use RefreshDatabase;

    public function testGetSelectPersonal()
    {


        $response = $this->json('GET','/GetSelectPersonal');
        $response->assertStatus(200);

    }
}

