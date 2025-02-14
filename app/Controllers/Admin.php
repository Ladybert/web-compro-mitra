<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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

        $data = [
            'title' => "MLT Admin | Dashboard",
            'userName' => $session->get('userName'),
            'total_content' => $contentModel->countAllResults(),
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
        $data = [
            'title' => "MLT Admin | Message",
        ];
        return view('template-admin/admin-page/form_response_page', $data);
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
