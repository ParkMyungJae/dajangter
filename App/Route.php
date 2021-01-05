<?php

namespace Dajangter;

class Route {
	public static $GET = [];
	public static $POST = [];

	public static function route($url)
	{
		foreach(self::${$_SERVER['REQUEST_METHOD']} as $req) {
			if($req[0] == $url) {
				$actions = explode("@", $req[1]);
				$cName = "\\Dajangter\\Controller\\" . $actions[0];
				$cInstance = new $cName();
				$cInstance->{$actions[1]}();
				return;
			}
		}

		echo "404 NOT FOUND";
		exit;
	}

	public static function get($link, $action)
	{
		self::$GET[] = [$link, $action];
	}

	public static function post($link, $action)
	{
		self::$POST[] = [$link, $action];
	}
}