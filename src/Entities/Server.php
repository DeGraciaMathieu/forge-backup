<?php

namespace App\Entities;

use DevMakerLab\Entity;

class Server extends Entity
{
    public $id;
    public $credential_id;
    public $name;
    public $type;
    public $provider;
    public $provider_id;
    public $size;
    public $region;
    public $db_status;
    public $redis_status;
    public $php_version;
    public $php_cli_version;
    public $database_type;
    public $ip_address;
    public $ssh_port;
    public $private_ip_address;
    public $local_public_key;
    public $blackfire_status;
    public $papertrail_status;
    public $revoked;
    public $created_at;
    public $is_ready;
    public $tags;
    public $network;
}
