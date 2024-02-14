<?php

namespace App\Controllers;

class AproposController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'À propos de nous',
        ];

        $this->render('pages/Apropos', $data);
    }
}
