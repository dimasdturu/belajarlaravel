<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProvinsiSQLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path('database/provinsi.sql');
        $sqlfile = DB::unprepared(file_get_contents($path));
        $db_bin = "C:\laragon\bin\mysql\mysql-8.0.30-winx64\bin";

        $db = [
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'host' => env('DB_HOST'),
            'database' => env('DB_DATABASE')
        ];

        exec("$db_bin}\mysql --user={$db['username']} --password={$db['password']} --host={$db['host']} --database {$db['database']} < $sqlfile");

        Log::info('Import SQL Success from sql file '.$path.'');

    }
}
