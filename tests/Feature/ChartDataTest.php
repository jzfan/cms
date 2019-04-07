<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChartApiTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function can_count_user_registered_number_in_30_days()
	{
		$this->be(factory(User::class)->make(['role' => 'admin']));

		factory(User::class, 2)->create([
			'created_at' => strtotime('-29 days')		
		]);
		factory(User::class, 3)->create([
			'created_at' => strtotime('now')		
		]);

		$data = $this->get('/admin/chart/users')->json();
		$this->assertCount(30, $data);
		$this->assertEquals(2, array_shift($data));
		$this->assertEquals(3, array_pop($data));
		$this->assertEquals(0, array_sum($data));
	}
}
