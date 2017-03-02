<?php

/**
 * Created by PhpStorm.
 * User: Ruwan
 * Date: 1/29/2017
 * Time: 10:40 AM
 */
class Home extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->view('config');
    }
    function index(){
        $this->load->view('index');
    }
    function page($page='index'){
        $this->load->view($page);
    }

}