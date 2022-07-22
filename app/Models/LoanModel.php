<?php

namespace App\Models;
use CodeIgniter\Model;
use Config\Database;

class LoanModel extends Model{
    protected $allowedFields=['Id','UserId','Amount','Status','Date'];
    protected $primaryKey='Id';
    protected $table='loans';
    protected $db,$builder;

    public function __construct(){
        $db=Database::connect();
        $this->builder=$db->table($this->table);
    }

    public function insertLoan($data){
        $this->builder->insert($data);
    }

    public function getAllLoans(){
        return $this->builder->get()->getResultArray();
    }

    public function updateLoan($conditions, $data){
        $this->builder->where($conditions)->update($data);
    }

    public function getLoansWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }
}

?>