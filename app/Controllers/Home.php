<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['title'] = "PT Mitra Langgeng Teknik | Home";
        return view('template-user/user-content/landing_page_content', $data);
    }

    public function ComPro(): string
    {
        $data['title'] = "PT Mitra Langgeng Teknik | Company Profile";
        return view('template-user/company-profile-layout/main_content',$data);
    }
}
