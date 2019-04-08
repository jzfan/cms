<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_fresh_token_and_user_info_by_login()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create([
            'name' => 'jhon doe',
            'email' => 'jhon@example.com',
            'password' => password_hash('123456', PASSWORD_DEFAULT),
            'api_token' => '12345'
        ]);

        $response = $this->json('post', '/api/login', [
            'email' => 'jhon@example.com',
            'password' => '123456',
        ])->assertOk();

        $token = $user->fresh()->api_token;
        $this->assertNotEquals('12345', $token);
        
        $arr = $response->assertHeader('Authorization', "Bearer {$token}")->json();
        $this->assertEquals(config('token.length') + 10, strlen($token));
        $this->assertEquals('jhon doe', $arr['name']);
        $this->assertEquals('jhon@example.com', $arr['email']);
    }

    /** @test */
    public function get_error_by_wrong_password_login()
    {
        $user = factory(User::class)->create([
            'email' => 'jhon@example.com',
            'password' => password_hash('123456', PASSWORD_DEFAULT),
        ]);

        $response = $this->json('post', '/api/login', [
            'email' => 'jhon@example.com',
            'password' => 'wrong password',
        ])->assertStatus(422)
            ->assertJsonStructure(['message', 'errors']);

    }
}
