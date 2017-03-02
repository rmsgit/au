<?php

class Home extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        if(!isset($_SESSION['loged'])){
          $url = base_url('index.php/login');
          echo "<script>window.location = '$url'</script>";
          exit();
        }

        $this->load->view('config');
        $this->load->view('menu');

    }
	function index(){
		
	}

    function school($r1=null,$r2=null){
        $this->load->database();

        if ($r1=='add'){
            if(isset($_POST)){
                $this->db->insert('school', $_POST);
            }

        }

        if($r1='remove'){
              if($r2>0){
                  $query = $this->db->query("DELETE FROM school WHERE id = '$r2';");

              }
        }

        $query = $this->db->get('school');

        $this->load->view('allSchools',array(
            'schools' => $query->result()
        ));
    }
	
	function student($r1=null,$r2=null){
        $this->load->database();
        if($r1 == 'school'){
          $query1 = $this->db->query("Select student.*,school.name as 'sch_name'  FROM student,school WHERE student.type = 1 and student.study = school.id  ORDER BY student.study ASC");
          $this->load->view('allStudents',array(
            'sch_students' => $query1->result(),
          ));
        }elseif ($r1 == 'university') {
          $query = $this->db->query("Select student.*,university.name as 'uni_name'  FROM student,university WHERE student.type = 2 and student.study = university.id");

          $this->load->view('allUniStudents',array(
            'uni_students' => $query->result(),
          ));
        }elseif ($r1 == 'public') {
          $query3 = $this->db->query("Select *  FROM student WHERE student.type = 3");
          $this->load->view('allGenStudents',array(
            'gen_students' => $query3->result(),
          ));
        }
    }
	function teacher(){
		$this->load->database();
		$query = $this->db->get('school');
		
      $this->load->view('allSchoolTeachers',array(
          'schools' => $query->result()
      ));
    }
}
