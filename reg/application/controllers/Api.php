<?php

/**
 * Created by PhpStorm.
 * User: Ruwan
 * Date: 1/27/2017
 * Time: 7:12 PM
 */
class Api extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('encrypt');
    }

    function index(){
        $this->send(404,'API not found');
    }
    private function data_not_found(){
        $this->send('401','Data not found');
    }
    private function invalid_auth(){
        $this->send('401','Invalid auth');
    }
    private function send($status,$data){
        header('Content-Type: application/json');
		header('Access-Control-Allow-Origin: *');  
        $output['status'] = $status;
        $output['data'] = $data;
        echo json_encode($output);
    }
    private function auth($token){
        $this->load->database();
        $user =  $this->db->query("select * from student where token = '$token';");
        //$this->send(200,$user->result());
        if($user->num_rows()==1){
            return $user->result()[0]->id;
        }else return -1;

    }

    function university($r1=null){

        if($r1==null){
            $this->load->database();
            $university = $this->db->get('university')->result();
            $this->send(200,$university);
        }else if($r1>0){
            $this->load->database();
            $university =  $this->db->query("SELECT * FROM university WHERE id=$r1");
            if($university->num_rows()>0){
                $this->send(200,$university->result()[0]);
            }else $this->data_not_found();

        }else $this->data_not_found();

    }
    function school($r1=null , $r2=null){

        if($r1==null){
            $this->load->database();
            $university = $this->db->query("SELECT name,id FROM school")->result();
            $this->send(200,$university);
        }else if($r1>0){
            $this->load->database();
            $university =  $this->db->query("SELECT name,id,teacher_name FROM school WHERE id=$r1");
            if($university->num_rows()>0){
                $this->send(200,$university->result()[0]);
            }else $this->data_not_found();

        }else if($r1 == 'login' && $r2>0){
            if(isset($_POST['data'])){
                $post = json_decode($_POST['data']);
                $password = $post->password;

                $this->load->database();
                $user =  $this->db->query("SELECT * FROM school WHERE id='$r2' and password='$password'");
                if($user->num_rows()==1){

                    $token = time();
                    $encrypted_string = $this->encrypt->encode($token);
                    $this->db->query("UPDATE school SET token = '$encrypted_string' WHERE id='$r2' and password='$password'");
                    $data['token'] = $encrypted_string;
                    $this->send(200,$data);
                }else $this->data_not_found();
            }else $this->data_not_found();
        }else if($r1 == 'data'){
            if(isset($_POST['data'])){
                $post = json_decode($_POST['data']);
                $token = $post->token;

                $this->load->database();
                $user =  $this->db->query("SELECT name,teacher_name,contact,city,teacher_food FROM school WHERE token='$token'");
				
                if($user->num_rows()==1){
                    $this->send(200,$user->result()[0]);
                }else $this->data_not_found();
            }else $this->data_not_found();

        }else if($r1 == 'set_data'){
            if(isset($_POST['data'])){
                $this->load->database();

                $token = json_decode($_POST['data'])->token;
                $data = json_decode($_POST['data'])->data;
                    if(!isset($data->id ) && !isset($data->token )&& !isset($data->password ) && !isset($data->name )){
                        $this->db->set($data);
                        $this->db->where("token", $token);
                        $this->db->update("school", $data);
                        if($this->db->conn_id->affected_rows==1){
                            $this->send(200,"Success");
                        }else $this->send(203,"not success");
                    }else $this->send(204,"bad request");



            }else $this->data_not_found();

        }else $this->data_not_found();

    }

    function student($r1=null,$r2=null){
        if($r1 == 'login'){
            if(isset($_POST['data'])){
                $post = json_decode($_POST['data']);

                $email =$post->email;
                $password = $post->password;

                $this->load->database();
                $user =  $this->db->query("SELECT * FROM student WHERE email='$email' and password='$password'");
                if($user->num_rows()==1){

                    $token = time();
                    $encrypted_string = $this->encrypt->encode($token);
                    $this->db->query("UPDATE student SET token = '$encrypted_string' WHERE email='$email' and password='$password'");
                    $data['token'] = $encrypted_string;
                    $this->send(200,$data);
                }else $this->data_not_found();
            }else $this->data_not_found();
        }else if($r1 == 'details'){
            if(isset($_POST['data'])){
                $this->load->database();
                $token = json_decode($_POST['data'])->token;
                $user =  $this->db->query("select * from student where token = '$token';");
                if($user->num_rows()==1){
                    $data = $user->result()[0];
                    $code = "";
                    if($data->type==1){
                        $code .= "SCH/";
                    }else{
                        $code .= "UNI/";
                    }
                    if($data->event==1){
                        $code .= "CON/";
                    }else{
                        $code .= "COM/";
                    }
                    $code .= $data->study."/";
                    $code .= $data->id;
                    $data->code = $code;
                    $this->send(200,$data);
                }else $this->send(201,"invalid auth");

            }else $this->data_not_found();

        }else if($r1 == 'set_data'){
            if(isset($_POST['data'])){
                $this->load->database();

                $token = json_decode($_POST['data'])->token;
                $data = json_decode($_POST['data'])->data;
                $auth = $this->auth($token);
                if($auth>-1){
                    if(!isset($data->id ) && !isset($data->token )&& !isset($data->password ) && !isset($data->email )){
                        $this->db->set($data);
                        $this->db->where("token", $token);
                        $this->db->update("student", $data);
                        if($this->db->conn_id->affected_rows==1){
                            $this->send(200,"Success");
                        }else $this->send(203,"not success");
                    }else $this->send(204,"bad request");

                }else $this->invalid_auth();

            }else $this->data_not_found();

        }else if($r1 == 'register'){
            if(isset($_POST['data'])){
                $this->load->database();
                $data = json_decode($_POST['data'])->data;
                $email = $data->email;
                $user =  $this->db->query("SELECT * FROM student WHERE email='$email'");
                if($user->num_rows()<1) {
                    if (isset($data->event) && isset($data->email) && isset($data->type)) {
                        $data->password = rand(10000, 99999);
                        $this->db->insert("student", $data);
                        if ($this->db->conn_id->affected_rows == 1) {


                            $this->load->library('email');
                           
                            $config['smtp_host'] = "smtp.gmail.com";
                            $config['smtp_port'] = "465";
                            $config['smtp_user'] = "aurora@sci.sjp.ac.lk";
                            $config['smtp_pass'] ="aurora.2k17";
                            $config['charset'] = "utf-8";
                            $config['mailtype'] = "html";
                            $config['newline'] = "\r\n";

                            $this->email->initialize($config);

                            $this->email->from('ruwan.m.samaraweera@gmail.com', 'AURORA 2K17');
                            $this->email->to($email);
                            $this->email->subject('AURORA Registration');
                            $this->email->message('Your password is:'.$data->password);
                            $this->email->send();

                            $this->send(200, "Success");

                        } else $this->send(203, "not success");

                    } else $this->send(204, "bad request");

                }else $this->send(205, "Email already exist.");

            }else $this->data_not_found();

        }else $this->data_not_found();
    }

    function test() {
        $em = 'ruwan.m.samaraweera@gmail.com';
        echo $em;
          $this->load->library('email');
		
				$config['smtp_host'] = "smtp.gmail.com";
				$config['smtp_port'] = "465";
				$config['smtp_user'] = "aurora@sci.sjp.ac.lk";
				$config['smtp_pass'] ="aurora.2k17";
				$config['charset'] = "utf-8";
				$config['mailtype'] = "html";
			$config['newline'] = "\r\n";



        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);

        $this->email->from('aurora@sci.sjp.ac.lk', 'AURORA 2K17');
        $this->email->to($em);
        $this->email->subject('AURORA Registration');
        $this->email->message('Your password is:');



        if ($this->email->send()) {
            echo 'Your email was sent, thanks chamil.';
        } else {
            show_error($this->email->print_debugger());
        }



    }

}