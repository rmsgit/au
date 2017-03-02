<?php

/**
 * Created by PhpStorm.
 * User: Ruwan
 * Date: 2/21/2017
 * Time: 2:02 AM
 */
class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->view('config');

    }

    function index(){
        $this->load->view('loginForm');
    }
    function login(){
        $this->load->library('session');
        $pass = "aurora123@";
        if(isset($_POST['pass'])){
            if($pass == $_POST['pass']){

                $_SESSION['loged'] = 1;
                $url = base_url('index.php/Home');
                echo "<script>window.location = '$url'</script>";

            }else echo "not success";
        }else echo "not success";


    }

}
