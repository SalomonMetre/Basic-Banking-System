<?php

namespace App\Models;
use CodeIgniter\Model;
use Config\Database;

class TransactionModel extends Model{
    protected $allowedFields=['UserId', 'Id','ToId','Type','Amount','Date','Status'];
    protected $primaryKey='Id';
    protected $table='transactions';
    protected $db,$builder;

    public function __construct(){
        $db=Database::connect();
        $this->builder=$db->table($this->table);
    }
    
    public function insertTransaction($data){
        $this->builder->insert($data);
    }

    public function getAllTransactions(){
        return $this->builder->get()->getResultArray();
    }

    public function getAllTransactionsWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }

    public function getAverageDeposit($userId){
        return $this->builder->where(['userId'=>$userId, 'Type'=>'Deposit'])->selectAvg('Amount')->get()->getResultArray()[0]['Amount'];
    }

    public function getAverageWithdrawal($userId){
        return $this->builder->where(['userId'=>$userId, 'Type'=>'Withdraw'])->selectAvg('Amount')->get()->getResultArray()[0]['Amount'];
    }

    public function updateTransaction($conditions, $data){
        $this->builder->where($conditions)->update($data);
    }
}

?>