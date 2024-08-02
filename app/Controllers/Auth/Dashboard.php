<?php

namespace App\Controllers\Auth;

use App\Models\ClassroomModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $classroomsModel = new ClassroomModel();
        $data['classrooms'] = $classroomsModel->findAll();


        return view('pages/dashboard', $data);
    }
    public function class_subject()
    {
        $data['title'] = 'Dashboard';
        $classroomsModel = new ClassroomModel();
        $data['classrooms'] = $classroomsModel->findAll();


        return view('pages/dashboard', $data);
    }
}
