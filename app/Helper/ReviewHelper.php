<?php

namespace App\Helper;

use App\User;

class ReviewHelper
{
	public static function getUserName($user_id)
	{
		$user = User::where('id', $user_id)->first();

		$name = $user['name'];

		return $name;
	}

	public static function getUserEmail($user_id)
	{
		$user = User::where('id', $user_id)->first();

		$email = $user['email'];

		return $email;
	}



}




?>