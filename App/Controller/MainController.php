<?php

namespace Dajangter\Controller;

use Dajangter\DB;

class MainController extends MasterController {

	public function index()
	{	
		if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
        }else {
			$user = null;
		}

        $this->render("main", ["user" => $user]);
	}
}