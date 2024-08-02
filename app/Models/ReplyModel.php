<?php
namespace App\Models;

use CodeIgniter\Model;

class ReplyModel extends Model
{
    protected $table = 'replies';
    protected $primaryKey = 'id';

    protected $allowedFields = ['discussion_id', 'user_id', 'content', 'created_at', 'updated_at'];

    // Method to get replies for a specific discussion
    public function getReplies($discussionId)
    {
        return $this->where('discussion_id', $discussionId)
                    ->join('users', 'users.id = replies.user_id')
                    ->findAll();
    }
}
