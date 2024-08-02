<?php

namespace App\Controllers\Auth;

use App\Models\MateriModel;
use App\Models\ClassroomModel;
use App\Models\UploadFileModel;
use CodeIgniter\Controller;

class MateriController extends Controller
{
    public function index($classroom_id)
    {
        $data['title'] = 'Dashboard';
        $model = new MateriModel();
        // $data['materi'] = $model->where('classroom_id', $classroom_id)->findAll();   
        $data['classrooms'] = $model->getAllMateri($classroom_id);
        $data['classroom_id'] = $classroom_id;
        // dd($data);
        return view('materi/index', $data);
    }

    public function create($classroom_id)
    {
        $data['title'] = 'Dashboard';
        $data['classroom_id'] = $classroom_id;
        return view('materi/create', $data);
    }

    public function store($classroom_id)
    {
        $data['title'] = 'Dashboard';
        $model = new MateriModel();
        $data = [
            'materi_name' => $this->request->getPost('materi_name'),
            'classroom_id' => $classroom_id,
        ];
        $model->save($data);
        return redirect()->to('/classrooms/' . $classroom_id . '/materi');
    }

    public function edit($classroom_id, $id)
    {
        $data['title'] = 'Dashboard';
        $model = new MateriModel();
        $data['materi'] = $model->find($id);
        $data['classroom_id'] = $classroom_id;
        return view('materi/edit', $data);
    }

    public function update($classroom_id, $id)
    {
        $data['title'] = 'Dashboard';
        $model = new MateriModel();
        $data = [
            'materi_name' => $this->request->getPost('materi_name'),
        ];
        $model->update($id, $data);
        return redirect()->to('/classrooms/' . $classroom_id . '/materi');
    }

    public function delete($classroom_id, $id)
    {
        $data['title'] = 'Dashboard';
        $model = new MateriModel();
        $model->delete($id);
        return redirect()->to('/classrooms/' . $classroom_id . '/materi');
    }
}
