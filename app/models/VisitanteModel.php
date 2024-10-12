<?php

namespace App\Models;
use Config\Connector;
use Core\Model;

class VisitanteModel extends Model {
    public function __construct() {
        parent::__construct();
        $this->table = 'visitantes';
    }
}