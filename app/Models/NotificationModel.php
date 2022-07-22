<?php

namespace App\Models;
use CodeIgniter\Model;
use Config\Database;

class NotificationModel extends Model{
    protected $allowedFields=['Id', 'UserId','Message','Status','Date'];
    protected $primaryKey='Id';
    protected $table='notifications';
    protected $db,$builder;

    public function __construct(){
        $db=Database::connect();
        $this->builder=$db->table($this->table);
    }
    
    public function insertNotification($data){
        $this->builder->insert($data);
    }
    
    public function getNotificationsWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }
}

?>