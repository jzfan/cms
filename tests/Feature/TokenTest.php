<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TokenTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() :void
    {
        parent::setUp();

        $expiredTime = time() - config('token.expires') * 3600 - 1;
        $refreshExpiredTime = time() - config('token.refresh') * 24 * 3600 - 1;

        $this->expiredToken = '12345' . $expiredTime;
        $this->refreshExpiredToken = '12345' . $refreshExpiredTime;

    }
    /** @test */
    public function get_user_by_token()
    {
        $token = '12345' . time();

        $user = factory(User::class)->create([
            'name' => 'jhon doe',
            'api_token' => $token,
        ]);

        $data = $this->json('get', '/api/user', [], ['Authorization' => "Bearer {$token}"])
                    ->json();

        $this->assertEquals('jhon doe', $data['name']);
        $this->assertEquals($token, $user->fresh()->api_token);
    }

    /** @test */
    public function can_get_refresh_token_in_expires_time()
    {

        $user = factory(User::class)->create([
            'name' => 'jhon doe',
            'api_token' => $this->expiredToken,
        ]);


        $response = $this->json('get', '/api/user', [], ['Authorization' => "Bearer {$this->expiredToken}"]);

        $newToken = $user->fresh()->api_token;

        $response->assertHeader('Authorization', "Bearer {$newToken}");
        $this->assertNotEquals($this->expiredToken, $newToken);

        $this->assertEquals('jhon doe', $response->json()['name']);
        // dd($user->fresh()->api_token);
    }

    /** @test */
    public function can_not_get_refresh_token_if_overtime()
    {

        $user = factory(User::class)->create([
            'api_token' => $this->refreshExpiredToken,
        ]);

        $this->json('get', '/api/user', [], ['Authorization' => "Bearer {$this->refreshExpiredToken}"])
            ->assertStatus(401);
    }

    /** @test */
    public function multi_request_refresh_token_would_be_same()
    {

        $user = factory(User::class)->create([
            'name' => 'jhon doe',
            'api_token' => $this->expiredToken,
        ]);


        $response1 = $this->json('get', '/api/user', [], ['Authorization' => "Bearer {$this->expiredToken}"]);
        $response2 = $this->json('get', '/api/user', [], ['Authorization' => "Bearer {$this->expiredToken}"]);
        $response3 = $this->json('get', '/api/user', [], ['Authorization' => "Bearer {$this->expiredToken}"]);

        $newToken = $user->fresh()->api_token;
        $this->assertNotEquals($this->expiredToken, $newToken);

        $response1->assertHeader('Authorization', "Bearer {$newToken}");
        $response2->assertHeader('Authorization', "Bearer {$newToken}");
        $response3->assertHeader('Authorization', "Bearer {$newToken}");
    }
}
