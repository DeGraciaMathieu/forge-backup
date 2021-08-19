<?php

namespace App\Entities;

use DevMakerLab\Entity;

class Site extends Entity
{
    public $id;
    public $name;
    public $username;
    public $directory;
    public $wildcards;
    public $status;
    public $repository;
    public $repository_provider;
    public $repository_branch;
    public $repository_status;
    public $quick_deploy;
    public $project_type;
    public $app;
    public $php_version;
    public $app_status;
    public $slack_channel;
    public $telegram_chat_id;
    public $telegram_chat_title;
    public $deployment_url;
    public $created_at;
    public $tags;
}
