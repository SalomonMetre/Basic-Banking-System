<?php

namespace App\Models;
use CodeIgniter\Model;
use Config\Database;

class RatingModel extends Model{
    protected $allowedFields=['Id','UserId','Rating'];
    protected $primaryKey='Id';
    protected $table='ratings';
    protected $db,$builder;

    public function __construct(){
        $db=Database::connect();
        $this->builder=$db->table($this->table);
    }

    public function insertRating($data){
        $this->builder->insert($data);
    }
}

?>