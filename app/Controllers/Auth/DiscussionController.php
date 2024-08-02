<?php

namespace App\Controllers\Auth;

use App\Models\DiscussionModel;
use App\Models\ReplyModel;
use CodeIgniter\Controller;

class DiscussionController extends Controller
{
    public function index()

    {
        $data['title'] = 'Dashboard';
        $discussionModel = new DiscussionModel();
        $data['discussions'] = $discussionModel->findAll();
        return view('discussions/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Dashboard';
        return view('discussions/create', $data);
    }

    public function store()
    {
        $data['title'] = 'Dashboard';
        $discussionModel = new DiscussionModel();

        // Get user_id from session
        $userId = session()->get('id');

        // Check if user ID is present
        if (!$userId) {
            return redirect()->to('/login'); // Redirect to login or error page
        }

        $data = [
            'user_id' => $userId,
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content')
        ];

        $discussionModel->insert($data);
        return redirect()->to('/discussions');
    }

    public function show($id)
    {
        $data['title'] = 'Dashboard';
        $discussionModel = new DiscussionModel();
        $replyModel = new ReplyModel();

        $data['discussion'] = $discussionModel->getDiscussionWithUser($id);
        $data['replies'] = $replyModel->getReplies($id);
        return view('discussions/show', $data);
    }

    public function reply()
    {
        $data['title'] = 'Dashboard';
        $replyModel = new ReplyModel();

        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'discussion_id' => 'required|integer',
            'content' => 'required|min_length[3]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Get user_id from session
        $userId = user_id();

        // Check if user ID is present
        if (!$userId) {
            return redirect()->to('/login'); // Redirect to login or error page
        }

        $data = [
            'discussion_id' => $this->request->getPost('discussion_id'),
            'user_id' => $userId,
            'content' => $this->request->getPost('content')
        ];

        if (!$replyModel->insert($data)) {
            return redirect()->back()->with('error', 'Failed to post reply.'); // Handle insertion failure
        }

        return redirect()->to('/discussions/show/' . $data['discussion_id']);
    }
}
