<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function loginPage()
    {
        $session = session();
        if ($session->get('isLoggedIn')) {
            return redirect()->to('admin/dashboard');
        }
        
        $data['title'] = "MLT Admin | Login";
        return view('template-admin/admin-page/login_page', $data);
    }
    public function login()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Set session
            $session->set([
                'isLoggedIn' => true,
                'userId' => $user['id'],
                'userEmail' => $user['email'],
                'userName' => $user['name'],
            ]);

            return redirect()->to('admin/dashboard');
        } else {
            $session->setFlashdata('error', 'Email atau password salah!');
            return redirect()->to('/login-admin-page');
        }
    }

    public function changePassword()
    {
        $session = session();
        $userId = $session->get('userId');

        if (!$userId) {
            return redirect()->to('/login-admin-page')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $userModel = new UserModel();
        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->to('/login-admin-page')->with('error', 'Akun tidak ditemukan.');
        }

        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if (!$newPassword || !$confirmPassword) {
            return redirect()->back()->with('error', 'Harap isi semua kolom password.');
        }

        if (strlen($newPassword) < 8) { 
            return redirect()->back()->with('error', 'Password minimal 8 karakter.');
        }

        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('error', 'Password baru dan konfirmasi password tidak cocok.');
        }

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $userModel->update($userId, ['password' => $hashedPassword]);

        return redirect()->back()->with('success', 'Password berhasil diperbarui.');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login-admin-page');
    }
}
