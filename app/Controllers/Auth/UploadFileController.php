<?php

namespace App\Controllers\Auth;


use App\Models\UploadFileModel;
use App\Models\MateriModel;
use App\Models\ClassroomModel;
use CodeIgniter\Controller;

class UploadFileController extends Controller
{
    public function create($classroom_id, $materi_id)
    {
        $data['title'] = 'Dashboard';
        $materiModel = new MateriModel();
        $classroomModel = new ClassroomModel();


        if (!$materiModel->find($materi_id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Materi tidak ditemukan.');
        }

        $data['materi_id'] = $materi_id;
        $data['classroom_id'] = $classroom_id;
        $data['classrooms'] = $classroomModel->findAll();

        return view('upload_file/create', $data);
    }

    public function store($classroom_id, $materi_id)
    {
        // Get user_id from session
        $userId = user_id();
        $model = new UploadFileModel();
        $file = $this->request->getFile('file');
        if ($file->isValid() && !$file->hasMoved()) {
            $file->move(WRITEPATH . 'uploads');
            $data = [
                'file_name' => $file->getName(),
                'classroom_id' => $classroom_id,
                'user_id' => $userId,
                'materi_id' => $materi_id,
            ];
            $model->save($data);
        }
        return redirect()->to('/classrooms/' . $classroom_id . '/materi/' . $materi_id . '/upload_files');
    }

    public function delete($classroom_id, $materi_id, $file_id)
    {
        // Load the UploadFileModel
        $model = new UploadFileModel();
        
        // Find the file record in the database
        $file = $model->find($file_id);
        
        if ($file) {
            // Construct the file path
            $filePath = WRITEPATH . 'uploads/' . $file['file_name'];
            
            // Check if the file exists before attempting to delete
            if (file_exists($filePath)) {
                // Attempt to delete the file
                if (unlink($filePath)) {
                    // If file deletion is successful, delete the record from the database
                    $model->delete($file_id);
                } else {
                    // Handle error if file could not be deleted
                    // You can log this error or set a flash message for user feedback
                    log_message('error', 'Failed to delete file: ' . $filePath);
                    // Optionally, you can redirect with an error message
                    session()->setFlashdata('error', 'Failed to delete the file from the server.');
                }
            } else {
                // Handle case where file does not exist
                log_message('error', 'File does not exist: ' . $filePath);
                session()->setFlashdata('error', 'File does not exist.');
            }
        } else {
            // Handle case where file record does not exist in the database
            log_message('error', 'File record not found for ID: ' . $file_id);
            session()->setFlashdata('error', 'File record not found.');
        }
        
        // Redirect to the appropriate page
        return redirect()->to('/classrooms/' . $classroom_id . '/materi/' . $materi_id . '/upload_files');
    }
    

    // public function showByMateri($classroom_id, $materi_id)
    // {
    //     $data['title'] = 'Dashboard';
    //     $model = new UploadFileModel();
    //     $data['files'] = $model->where('materi_id', $materi_id)->findAll();
    //     $data['materi_id'] = $materi_id;
    //     $data['classroom_id'] = $classroom_id;
    //     return view('upload_file/materi_files', $data);
    // }
    public function showByMateri($classroom_id, $materi_id)
{
    $data['title'] = 'Dashboard';
    $userId = user_id();
    $model = new UploadFileModel();
    $materiModel = new MateriModel(); // Model untuk tabel materi
   
    
    // Ambil file berdasarkan materi_id
    $data['files'] = $model->where('materi_id', $materi_id)->findAll();
    
    // Ambil materi_name berdasarkan materi_id
    $materi = $materiModel->find($materi_id);
    $data['materi_name'] = $materi ? $materi['materi_name'] : 'Materi tidak ditemukan';
    
    // Ambil fullname dari users berdasarkan id dari file
   
    
    $data['materi_id'] = $materi_id;
    $data['classroom_id'] = $classroom_id;

    return view('upload_file/materi_files', $data);
}


    public function download($classroom_id, $materi_id, $file_id)
    {
        $model = new UploadFileModel();
        $file = $model->find($file_id);

        if ($file) {
            return $this->response->download(WRITEPATH . 'uploads/' . $file['file_name'], null);
        }

        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('File tidak ditemukan.');
    }
}
