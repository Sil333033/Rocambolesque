<?php
class Register extends Controller
{

    private $UserModel;

    public function __construct()
    {
        $this->UserModel = $this->model("UserModel");
    }

    public function index()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $filteredPost = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $res = $this->UserModel->createUser(
                $filteredPost['firstname'],
                $filteredPost['infix'],
                $filteredPost['lastname'],
                $filteredPost['phone'],
                $filteredPost['email'],
                $filteredPost['password']
            );

            // var_dump($res);
            // exit;

            echo "<h1>user created</h1>";

            header("refresh:2;url=" . URLROOT . "/login");
        } else {
            $this->view("register");
        }
    }

    public function test()
    {
        $users = $this->UserModel->getUsers();

        var_dump($users);
    }
}
