<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model
{
    protected $table      = 'materi';
    protected $primaryKey = 'materi_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['materi_name', 'classroom_id'];

    public function getAllMateri($classroomId)
    {
        return $this->select('classrooms.classroom_id, classrooms.classroom_name, users.fullname, materi.materi_name, materi.materi_id')
            ->where('classrooms.classroom_id', $classroomId)
            ->join('classrooms', 'materi.classroom_id = classrooms.classroom_id')  // Join classrooms table
            ->join('users', 'users.id = classrooms.user_id')  // Join users table
            ->findAll();
    }
}
