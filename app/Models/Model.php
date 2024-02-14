<?php

namespace App\Models;

use App\Core\DbConnect;

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = DbConnect::getInstance()->getConnection();
    }
}
