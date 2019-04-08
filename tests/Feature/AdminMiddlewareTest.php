<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_login_dashboard()
    {
        $admin = factory(User::class)->create([
            'email' => 'jhon@example.com',
            'password' => password_hash('123456', PASSWORD_DEFAULT),
            'role' => 'admin'
        ]);

        $this->post('/login', [
            'email' => 'jhon@example.com',
            'password' => '123456'
        ])->assertStatus(302)
            ->assertRedirect('/admin');
    }

    /** @test */
    public function user_can_not_login_dashboard()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create([
            'email' => 'jhon@example.com',
            'password' => password_hash('123456', PASSWORD_DEFAULT),
            'role' => 'user'
        ]);
        $this->post('/login', [
            'email' => 'jhon@example.com',
            'password' => '123456'
        ])->assertStatus(302)
            ->assertRedirect('/news');
    }

    /** @test */
    public function user_can_not_view_admin_page()
    {
        $user = factory(User::class)->create(['role' => 'user']);
        $this->be($user);

        $this->get('/admin')
            ->assertStatus(302)
            ->assertRedirect('/news');

        $this->get('/admin/users/create')
            ->assertStatus(302)
            ->assertRedirect('/news');

        $this->get('/admin/users')
            ->assertStatus(302)
            ->assertRedirect('/news');
        
    }
}
