<?php
class Register extends Controller
{

    private $UserModel;

    public function __construct()
    {
        $this->UserModel = $this->model("UserModel");
    
        session_start();
    }

    public function index()
    {   

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $filteredPost = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $id = $this->UserModel->createUser(
                $filteredPost['firstname'],
                $filteredPost['infix'],
                $filteredPost['lastname'],
                $filteredPost['phone'],
                $filteredPost['email'],
                $filteredPost['password']
            );

            if ($id) {
                $_SESSION['user_id'] = $id->v_personId;

                echo "<h1>user created</h1>";
            } else {
                echo "<h1>user not created</h1>";
            }

            header("refresh:2;url=" . URLROOT . "/login");
        } else {

            if(isset($_SESSION['user_id'])) {
                header("Location: " . URLROOT . "/home");
            }

            $this->view("register");
        }
    }

    public function test()
    {
        $users = $this->UserModel->getUsers();
        var_dump($users);
    }

    public function dest() {
       session_destroy();
    }
}
