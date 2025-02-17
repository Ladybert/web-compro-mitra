<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FormDataModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\ContentModel;

class Admin extends BaseController
{
    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger,
    ) {
        parent::initController($request, $response, $logger);
    }
    public function dashboard()
    {
            $session = session();
            $contentModel = new ContentModel();
            $formDataModel = new FormDataModel();
            $check = $contentModel->countAllResults();
            $checkMessage = $formDataModel->countAllResults();
        
            $output['total_content'] = ($check === 0) ? 'belum ada' : $check;
            $output['total_message'] = ($checkMessage === 0) ? 'belum ada' : $checkMessage;
        
            $data = [
                'title' => "MLT Admin | Dashboard",
                'userName' => $session->get('userName'),
                'total_content' =>  $output['total_content'],
                'total_message' =>  $output['total_message'],
            ];
            return view('template-admin/admin-page/dashboard_page', $data);
    }

    public function content()
    {
        $contentModel = new ContentModel();

        $data = array(
            'title' => "MLT Admin | Content",
            'contents' => $contentModel->getPaginatedContents(2),
            'pager' => $contentModel->pager,
        );
        return view('template-admin/admin-page/content_page', $data);
    }

    public function storeContent()
    {
        $contentModel = new ContentModel();
    
        $validation = $this->validate([
            'content_title' => [
                'rules'  => 'required|string|max_length[100]',
                'errors' => [
                    'required'   => 'Masukkan Judul Post.',
                    'string'     => 'Tipe data selain string tidak diperbolehkan',
                    'max_length' => 'Panjang karakter tidak boleh melebihi 100',
                ]
            ],
            'content_img'   => [
                'rules'  => 'uploaded[content_img]|max_size[content_img,2048]|max_dims[content_img,700,700]|mime_in[content_img,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'uploaded' => 'Masukkan konten gambar.',
                    'max_size' => 'Ukuran konten gambar terlalu besar, maksimal hanya 2048kb',
                    'max_dims' => 'Resolusi konten gambar terlalu besar, maksimal 700 x 700',
                    'mime_in'  => 'Tipe konten gambar yang diperbolehkan hanya png, jpg, & jpeg',
                ]
            ],
        ]);
    
        if (!$validation) {
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->to('admin/content')->withInput();
        }
    
        // Ambil gambar dari request
        $image = $this->request->getFile('content_img');
    
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $newName);
        } else {
            return redirect()->back()->with('error', 'Gagal mengupload gambar.');
        }
    
        // Simpan data ke database dengan generate ID otomatis
        $insertedId = $contentModel->insertWithId([
            'title' => $this->request->getPost('content_title'),
            'image' => $newName,
        ]);
    
        if ($insertedId) {
            session()->setFlashdata('success', 'Konten Berhasil Disimpan');
        } else {
            session()->setFlashdata('error', 'Gagal menyimpan konten');
        }
    
        return redirect()->to('admin/content');
    }

    public function updateContent($id)
    {
        $contentModel = new ContentModel();

        $validation = $this->validate([
            'content_title' => [
                'rules'  => 'required|string|max_length[100]',
                'errors' => [
                    'required'   => 'Masukkan Judul Post.',
                    'string'     => 'Tipe data selain string tidak diperbolehkan',
                    'max_length' => 'Panjang karakter tidak boleh melebihi 100',
                ]
            ],
            'content_img'   => [
                'rules'  => 'max_size[content_img,2048]|max_dims[content_img,700,700]|mime_in[content_img,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'max_size' => 'Ukuran konten gambar terlalu besar, maksimal hanya 2048kb',
                    'max_dims' => 'Resolusi konten gambar terlalu besar, maksimal 700 x 700',
                    'mime_in'  => 'Tipe konten gambar yang diperbolehkan hanya png, jpg, & jpeg',
                ]
            ],
        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->to('admin/content')->withInput();
        }

        $content = $contentModel->find($id);
        if (!$content) {
            return redirect()->back()->with('error', 'Konten tidak ditemukan.');
        }

        $image = $this->request->getFile('content_img');
        $newName = $content['image'];

        if ($image && $image->isValid() && !$image->hasMoved()) {
            // Hapus gambar lama
            $oldImagePath = ROOTPATH . 'public/uploads/' . $content['image'];
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Upload gambar baru
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $newName);
        }

        // Update data ke database
        $updated = $contentModel->update($id, [
            'title' => $this->request->getPost('content_title'),
            'image' => $newName,
        ]);

        if ($updated) {
            session()->setFlashdata('success', 'Konten Berhasil Diperbarui');
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui konten');
        }

        return redirect()->to('admin/content');
    }
    
    public function deleteContent($id)
    {
        $contentModel = new ContentModel();

        $good_job = $contentModel->where('id', $id)->delete();
        
        if ($good_job) {
            session()->setFlashdata('success', 'Konten berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus konten');
        }
        return redirect()->to('admin/content');
    }
    
    public function message()
    {
        $formDataModel = new FormDataModel();
        $messages = $formDataModel->getMessage();

        foreach ($messages as &$message) {
            $createdAt = strtotime($message['created_at']);
            $now = strtotime(date('Y-m-d 00:00:00')); // Set waktu sekarang ke awal hari
            $diff = $now - strtotime(date('Y-m-d 00:00:00', $createdAt));

            if (date('Y-m-d', $createdAt) == date('Y-m-d', $now)) {
                $message['created_at'] = 'Today';
            } elseif ($diff < 604800) { // less than 7 days
                $days = floor($diff / 86400);
                $message['created_at'] = "$days days ago";
            } elseif ($diff < 2629743) { // less than 1 month
                $weeks = floor($diff / 604800);
                $message['created_at'] = "$weeks weeks ago";
            } elseif ($diff < 31536000) { // less than 12 months
                $months = floor($diff / 2629743); // approx. seconds in a month
                $message['created_at'] = "$months months ago";
            } else {
                $years = floor($diff / 31536000); // more than 12 months
                $message['created_at'] = "$years years ago";
            }

            $message['created_at_detail'] = strftime("Pukul %H:%M | %A - %d %B %Y", $createdAt);
        }

        $data = [
            'title' => "MLT Admin | Message",
            'messages' => $messages,
        ];
        return view('template-admin/admin-page/form_response_page', $data);
    }

    public function deleteMessage($id)
    {
        $formDataModel = new FormDataModel();

        $good_job = $formDataModel->where('id', $id)->delete();
        
        if ($good_job) {
            session()->setFlashdata('success', 'Pesan berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus pesan');
        }
        return redirect()->to('admin/message');
    }

    public function accountPage()
    {
        $session = session();

        $data = [
            'title' => "MLT Admin | Account",
            'userId' => $session->get('userId'),
            'userEmail' => $session->get('userEmail'),
            'userName' => $session->get('userName'),
            ];
        return view('template-admin/admin-page/account_page', $data);
    }
}
