<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class Export extends Command implements SelfHandling {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	$select = "select * from rutas"
	$data = \DB::connection('mysql')->select($select);
	public function __construct($data, $filename)
	{
		$fp = fopen($filename, 'w');
        foreach ($data as $row) {
            fputcsv($fp, $row);
        }

        fclose($fp);
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		//
	}

}
