<?php

namespace App\Controllers\Auth;

use App\Models\ClassroomModel;
use App\Models\MateriModel;
use CodeIgniter\Controller;

class ClassroomController extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $model = new ClassroomModel();
        $data['classrooms'] = $model->getAllClassroom();
       
        return view('classrooms/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Dashboard';
        return view('classrooms/create');
    }

    public function store()
    {
        $data['title'] = 'Dashboard';
        $model = new ClassroomModel();
        $data = [
            'classroom_name' => $this->request->getPost('classroom_name'),
        ];
        $model->save($data);
        return redirect()->to('/classrooms');
    }

    public function edit($id)
    {
        $data['title'] = 'Dashboard';
        $model = new ClassroomModel();
        $data['classroom'] = $model->find($id);
        return view('classrooms/edit', $data);
    }

    public function update($id)
    {
        $data['title'] = 'Dashboard';
        $model = new ClassroomModel();
        $data = [
            'classroom_name' => $this->request->getPost('classroom_name'),
        ];
        $model->update($id, $data);
        return redirect()->to('/classrooms');
    }

    public function delete($id)
    {
        $data['title'] = 'Dashboard';
        $model = new ClassroomModel();
        $model->delete($id);
        return redirect()->to('/classrooms');
    }

    // public function showMateri($classroom_id)
    // {
    //     $data['title'] = 'Dashboard';
    //     $model = new MateriModel();
        
    //     $data['materi'] = $model->where('classroom_id', $classroom_id)->findAll();
    //     $data['classrooms'] = $model->getAllClassroom();
    //     dd($data);
    //     $data['classroom_id'] = $classroom_id;
    //     return view('materi/index', $data);
    // }
}
