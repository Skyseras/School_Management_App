<?php

namespace app\controllers;


use thecodeholic\phpmvc\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return $this->render('about');
    }
}