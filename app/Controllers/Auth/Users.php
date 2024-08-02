<?php

namespace App\Controllers\Auth;

use CodeIgniter\Controller;

class Users extends Controller
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }
    public function index(): string
    {
        $data = ['title' => 'Users Lists'];

        $this->builder->select('users.id as userid,username,email,user_image,name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();
        $data['users'] = $query->getResult();
        return view('pages/admin/users', $data);
    }

    public function detail($id = 0)
    {
        $data = ['title' => 'Users Detail'];

        $this->builder->select('users.id as userid,username,email,name,user_image,fullname');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();
        $data['user'] = $query->getRow();
        if (empty($data['user'])) {
            return redirect()->to('/users');
        }
        return view('pages/admin/user_detail', $data);
    }
}
