<?php

namespace App\Entities;

use DevMakerLab\Entity;

class Database extends Entity
{
    public $id;
    public $name;
    public $status;
    public $created_at;
    public Server $server;
}
