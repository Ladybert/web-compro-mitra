<?php

namespace App\Controllers;
use App\Models\ContentModel;

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
}
