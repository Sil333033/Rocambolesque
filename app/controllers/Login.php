<?php
class Login extends Controller
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        $this->view("login");
    }
}
