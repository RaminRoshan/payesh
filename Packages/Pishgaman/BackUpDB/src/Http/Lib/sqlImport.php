<?php

namespace Pishgaman\BackUpDB\Http\Lib;

require('mysql-import/vendor/autoload.php');
use Thamaraiselvam\MysqlImport\Import;
use DB;
use Illuminate\Support\Facades\Schema;

class sqlImport
{
    public function Import($filename)
    {        
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        $database = config('database.connections.mysql.database');
        $host     = config('database.connections.mysql.host');

        Schema::disableForeignKeyConstraints();
        foreach(DB::select('SHOW TABLES') as $table) {
            $table_array = get_object_vars($table);
            Schema::drop($table_array[key($table_array)]);
        }
        Schema::enableForeignKeyConstraints();

        new Import($filename, $username, $password, $database, $host);
    }
}