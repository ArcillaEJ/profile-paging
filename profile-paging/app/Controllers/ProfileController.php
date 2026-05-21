<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $model = new UserModel();

        $search = $this->request->getGet('search');

        if ($search) {
            $model->groupStart()
                ->like('name', $search)
                ->orLike('email', $search)
                ->groupEnd();
        }

        $data = [
            'users' => $model->orderBy('id', 'DESC')->paginate(5),
            'pager' => $model->pager,
            'search' => $search,
        ];

        return view('profiles/index', $data);
    }

    public function create()
    {
        return view('profiles/create');
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min_length[2]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'avatar' => 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png,image/webp]|max_size[avatar,2048]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $avatar = $this->request->getFile('avatar');
        $newName = $avatar->getRandomName();

        $avatar->move(FCPATH . 'uploads', $newName);

        $model = new UserModel();

        $model->insert([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'avatar' => 'uploads/' . $newName,
        ]);

        return redirect()->to('/profiles')->with('success', 'Profile created successfully.');
    }
}