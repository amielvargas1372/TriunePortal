<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Triune_sample extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('triune_colleges_model');
        $this->load->helper('url_helper');
        $this->load->helper('url');
    }
    
    public function index() {
        //echo "Hello World";
        $data['results'] = $this->triune_colleges_model->colleges_all();
        $this->load->view('sample_view', $data);
    }
    
    public function viewsubj() {
        $data['results'] = $this->triune_colleges_model->subject_all();
        $this->load->view('edit_view', $data);
    }

    
    public function sycurr(){
        $course = $this->input->post('course');
        $syresult = $this->triune_colleges_model->getsycurr($course);
       
        echo json_encode($syresult);
    }
    
    public function sbcurr(){
        $course = $this->input->post('course');
        $syresult = $this->triune_colleges_model->getsbcurr($course);
       
        echo json_encode($syresult);
    }
    
    public function create() {        
        $var1['results'] = $this->triune_colleges_model->SubjCode();
        $var2['result'] = $this->triune_colleges_model->SubjCodeCoreq();
        $var3['course'] = $this->triune_colleges_model->SubjCodeCourse();
        $var4['sy'] = $this->triune_colleges_model->SubjCodeSY();
        $var5['prereq'] = $this->triune_colleges_model->SubjCodePrereq();
        $data = array_merge($var1, $var2, $var3, $var4, $var5);
        
        $this->load->view('edit', $data);
    }
    
    public function insertCoreq() {
        $f1 = $_POST['sy'];
        $f2 = $_POST['course'];
        $f3 = $_POST['subjcode'];
        $f4 = $_POST['coreq'];
        
        $check = $this->db->query("Select CourseCode, SY, SubjCode, Coreq from triune_co_req where"
                . " CourseCode = '$f2' AND SY = '$f1' AND SubjCode = '$f3' AND Coreq = '$f4'");
        
        if($check->num_rows() == 0){
            $data = array(
                'CourseCode' => $f2,
                'SY' => $f1,
                'SubjCode' => $f3,
                'Coreq' => $f4
            );
            $this->triune_colleges_model->setCoreq($data);
            $this->viewsubj();
        }else{
            $this->create();            
        }
    }
    
    public function insertPrereq() {
        $f5 = $_POST['sy'];
        $f6 = $_POST['course'];
        $f7 = $_POST['subjcode'];
        $f8= $_POST['prereq'];
        
        $check2 = $this->db->query("Select CourseCode, SY, SubjCode, Prereq from triune_pre_req where"
                . " CourseCode = '$f6' AND SY = '$f5' AND SubjCode = '$f7' AND Prereq = '$f8'");
        if($check2->num_rows() == 0){
            $data2 = array(
                'CourseCode' => $f6,    
                'SY' => $f5,
                'SubjCode' => $f7,
                'Prereq' => $f8
            );
            
            $this->triune_colleges_model->setPrereq($data2);
        }else{
            $this->create();
        }
    }
}
