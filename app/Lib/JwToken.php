<?php

namespace App\Lib;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;

Class JwToken
{
	protected $builder;
	protected $signer;

	public function __construct()
	{
		$this->builder = new Builder();
		$this->signer  = new Sha256();

		$this->builder->setIssuer(config('app.name')) //发布者
	        ->setAudience(config('app.name')) //接收者
	        ->setId("biao_shi", true) //对当前token设置的标识
	        ->setIssuedAt(time()) //token创建时间
	        ->setExpiration(time() + 60) //过期时间
	        ->setNotBefore(time()); //当前时间在这个时间前，token不能使用
	}

	public function make($user=null)
	{
		$user = $user ?? auth()->user();

		$this->builder->set('id', $user->id) //自定义数据
		        ->set('email', $user->email)
		        ->set('role', $user->role)
		        ->set('avatar', $user->avatar)
		        ->sign($this->signer, config('lib.jwt_secret'));

		return  (string)$this->builder->getToken();

	}

}