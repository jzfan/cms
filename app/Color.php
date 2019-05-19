<?php

namespace App;

class Color
{
	public static function style($color)
	{
		$color = config('color.' . $color);
		return "background: {$color['bg']}; color: {$color['text']}";
	}
    
}
