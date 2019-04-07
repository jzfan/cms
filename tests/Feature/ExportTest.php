<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_export_all_users()
    {
        $admin = factory(User::class)->create(['role' => 'admin']);
        $this->be($admin);

        // \Excel::shouldReceive('download')
        //     ->once();

        $response = $this->get('/admin/export/users')->baseResponse;
        $this->assertInstanceOf(BinaryFileResponse::class, $response);
    }
}
