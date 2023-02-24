<?php 
    class Menu extends Controller{
        public function __construct() 
        {
            
        }
            
        public function index()
        {
            $this->view("menu");
        }
    }