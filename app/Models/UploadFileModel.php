<?php namespace App\Models;

use CodeIgniter\Model;

class UploadFileModel extends Model
{
    protected $table      = 'upload_file';
    protected $primaryKey = 'file_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['file_name', 'classroom_id', 'user_id', 'materi_id'];
}
