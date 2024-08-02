<?php

namespace App\Controllers\Auth;

use CodeIgniter\Controller;
use App\Models\ClassroomsModel;

class Classrooms extends Controller
{
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('classrooms');
    }

    public function index(): string
    {
        $data = ['title' => 'Classrooms'];
        return view('pages/classrooms', $data);
    }

    public function detail($id = 0)
    {
        $data = ['title' => 'Classrooms Detail'];

        $this->builder->select('*');
        $this->builder->where('classroom_id', $id); // Corrected the table name to 'classrooms' and field name to 'id'
        $query = $this->builder->get();
        $data['classroom'] = $query->getRow();

        if (empty($data['classroom'])) {
            return redirect()->to('/users');
        }

        return view('pages/classrooms', $data);// Corrected the view path to 'pages/classrooms_detail'
    }
}
