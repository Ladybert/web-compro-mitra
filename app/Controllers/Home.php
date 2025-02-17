<?php

namespace App\Controllers;
use App\Models\ContentModel;
use App\Models\FormDataModel;

class Home extends BaseController
{
    public function index(): string
    {
        $contentModel = new ContentModel();
        $data = [
            'title' => "PT Mitra Langgeng Teknik | Home",
            'contents' => $contentModel->getContent(),
        ];
        return view('template-user/user-content/landing_page_content', $data);
    }

    public function ComPro(): string
    {
        $data['title'] = "PT Mitra Langgeng Teknik | Company Profile";
        return view('template-user/company-profile-layout/main_content',$data);
    }

    public function contact(): string 
    {
        $data['title'] = "PT Mitra Langgeng Teknik | Contact";
        return view('template-user/contact-layout/main_content',$data);
    }

    public function storeFormContact()
    {
        $formDataModel = new FormDataModel();

        $validation = $this->validate([
            'name' => [
                'rules'  => 'required|string|max_length[50]',
                'errors' => [
                    'required'   => 'Kolom nama wajib diisi.',
                    'string'     => 'Tipe data selain string tidak diperbolehkan',
                    'max_length' => 'Panjang karakter tidak boleh melebihi 50',
                ]
                ],
            'email' => [
                    'rules'  => 'required|string',
                    'errors' => [
                        'required'   => 'Kolom email wajib diisi.',
                        'string'     => 'Tipe data selain string tidak diperbolehkan',
                    ]
                    ],
            'service' => [
                'rules'  => 'required|string',
                'errors' => [
                    'required'   => 'Kolom jenis layanan harus memiliki nilai.',
                    'string'     => 'Tipe data selain string tidak diperbolehkan',
                ]
                ],
            'fill' => [
                'rules'  => 'required|string',
                'errors' => [
                    'required'   => 'Kolom pesan wajib diisi.',
                    'string'     => 'Tipe data selain string tidak diperbolehkan',
                ]
                ],
        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->to('/contact-page')->withInput();
        }

        $insertedId= $formDataModel->insertWithId([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'service' => $this->request->getPost('service'),
            'message' => $this->request->getPost('fill'),
        ]); 

        if ($insertedId) {
            session()->setFlashdata('success', 'Formulir berhasil dikirimkan');
        }

        return redirect()->to('/contact-page');
    }
}
