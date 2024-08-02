<?php

namespace App\Models;

use CodeIgniter\Model;

class DiscussionModel extends Model
{
    protected $table = 'discussions';
    protected $primaryKey = 'id';

    protected $allowedFields = ['user_id', 'title', 'content', 'created_at', 'updated_at'];

    public function getDiscussionWithUser($id)
    {
        return $this->select('discussions.*, users.username')
                    ->join('users', 'users.id = discussions.user_id')
                    ->where('discussions.id', $id)
                    ->first();
    }
}
