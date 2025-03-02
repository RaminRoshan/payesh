<?php

namespace Pishgaman\BackUpDB\Http\Lib;

use Pishgaman\BackUpDB\Models\BackUp;
use Pishgaman\BackUpDB\Http\Lib\Mysqldump;
use File;
use Config;

class BackupClass
{
    public function getBackUp()
    {
        set_time_limit(0);

        $host     = Config::get('database.connections.mysql.host') ?? 'localhost';
        $database = Config::get('database.connections.mysql.database') ?? 'nope';
        $user     = Config::get('database.connections.mysql.username') ?? 'root';
        $pass     = Config::get('database.connections.mysql.password') ?? 'root';
        $path     = base_path() . '/../media/DBBackUp';
        $name     = date('Ymdhis');
        $OutPut   = $path.'/'.$name.'.sql';

        if(!File::isDirectory($path)) File::makeDirectory($path, 0777, true, true);

        $dump = new Mysqldump('mysql:host='.$host.';dbname='.$database, $user, $pass);
        $res = $dump->start($OutPut);
        $BackUp = new BackUp;
        $BackUp->name = $name;
        $BackUp->save();
    }
}
