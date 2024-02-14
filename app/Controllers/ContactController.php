<?php

namespace App\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Contact',
        ];

        $this->render('pages/Contact', $data);
    }
}
