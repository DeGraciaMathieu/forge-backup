<?php

namespace App\Services;

use App\Entities\Database;
use App\Entities\Site;

class Backup
{
    public function site(Site $site)
    {
        dump($site);
    }

    public function database(Database $database)
    {
        dump($database);
    }
}
