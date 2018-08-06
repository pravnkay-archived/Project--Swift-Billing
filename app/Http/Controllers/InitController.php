<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AceController\Controller;

use Illuminate\Http\Request;

use Artisan;
use Illuminate\Support\Facades\DB;

class InitController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

	protected $installed;

    public function __construct()
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
			$this->installed = true;
		} else {
			$this->installed = false;
		}
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if($this->installed) {
			return redirect()->route('login');
		}
        return view('initialize.install');
	}
	
	public function execute(Request $request)
	{
		clock($request->all());

		Artisan::call('migrate', [
			'--force' => true,
		]);

		$this->setEnvironmentValue('DB_INSTALLED', true);
		
		return redirect()->route('InitInstall');
	}

	public function setEnvironmentValue($envKey, $envValue)
	{
		$envFile = app()->environmentFilePath();
		$str = file_get_contents($envFile);

		$oldValue = env($envKey);

		$str = str_replace("{$envKey}={$oldValue}", "{$envKey}={$envValue}\n", $str);

		$fp = fopen($envFile, 'w');
		fwrite($fp, $str);
		fclose($fp);
	}
}
