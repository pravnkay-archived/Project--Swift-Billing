<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Controllers\AceController\Controller;

use Config;

class PagesController extends Controller
{
	public function index()
	{
		$path = base_path('.env');

		if (file_exists($path)) {
			// file_put_contents($path, str_replace(
			// 	'APP_KEY='.$this->laravel['config']['app.key'], 'APP_KEY='.$key, file_get_contents($path)
			// ));

			// $currentDB = $this->laravel['config']['db.database'];

			$dbStatus = env('DB_INSTALLED');
		}

		if($dbStatus) {
			$installed = true;
		} else {
			$installed = false;
		}
   
        return view('frontend.home', compact('installed'));
    }
}
