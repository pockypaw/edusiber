<?php namespace App\Models;

use CodeIgniter\Model;

class ClassroomModel extends Model
{
    protected $table      = 'classrooms';
    protected $primaryKey = 'classroom_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['classroom_name'];

    public function getAllClassroom()
    {
        return $this->select('classrooms.classroom_id, classrooms.classroom_name, users.fullname')
                    ->join('users', 'users.id = classrooms.user_id')
                    ->findAll();
    }
    
    
}
