<?php
class triune_colleges_model extends CI_Model{    
    public function __construct() {
        $this->load->database();
        $this->db->save_queries = false;
    }    
    
    public function colleges_all(){
        $this->db->select('triune_college_courses.CourseCode, triune_college_courses.CourseDescription, triune_curriculum.SY, triune_curriculum.SubjCode, tblsubjects.Description');
        $this->db->from('triune_college_courses');
        $this->db->join('triune_curriculum', 'triune_college_courses.CourseCode = triune_curriculum.CourseCode', 'inner');
        $this->db->join('tblsubjects','triune_curriculum.SubjCode = tblsubjects.SubjCode','inner');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function subject_all(){        
        $this->db->select('triune_curriculum.SubjCode, triune_curriculum.CourseCode, triune_curriculum.SY, triune_pre_req.Prereq, triune_co_req.Coreq');
        $this->db->from('triune_curriculum');
        $this->db->join('triune_co_req', 'triune_curriculum.CourseCode = triune_co_req.CourseCode AND triune_curriculum.SubjCode = triune_co_req.SubjCode AND triune_curriculum.SY = triune_co_req.SY', 'left');
        $this->db->join('triune_pre_req', 'triune_curriculum.CourseCode = triune_pre_req.CourseCode AND triune_curriculum.SubjCode = triune_pre_req.SubjCode AND triune_curriculum.SY = triune_pre_req.SY', 'left');
     
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getsycurr($course){
        $array = array('CourseCode' => $course);
        $this->db->distinct();
        $this->db->select('triune_curriculum.SY');//("SELECT DISTINCT SY FROM triune_co_req where CourseCode = '" . $course ."'");
        $this->db->where($array);
        $this->db->from('triune_curriculum');
        $query = $this->db->get();
        $result = $query->result();
        
        return $result;
    }
    
    public function getsbcurr($course){
        $array = array('CourseCode' => $course);
        $this->db->distinct();
        $this->db->select('triune_curriculum.SubjCode');//("SELECT DISTINCT SY FROM triune_co_req where CourseCode = '" . $course ."'");
        $this->db->where($array);
        $this->db->from('triune_curriculum');
        $query = $this->db->get();
        $result = $query->result();
        
        return $result;
    }
        
    public function setCoreq($data){        
        $this->db->insert('triune_co_req', $data);
//        $result = $this->db->query("INSERT INTO triune_co_req (SY, CourseCode, SubjCode, Coreq) VALUES('$f1', '$f2', '$f3', '$f4')");
}
    
    public function setPrereq($data2){
       //var_dump($data2);
        $this->db->insert('triune_pre_req', $data2);
        echo "Inserted";
    }
    
    public function SubjCode() {  
        $this->db->distinct();
        $this->db->select('triune_curriculum.SubjCode');
        $this->db->from('triune_curriculum');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function SubjCodeCoreq(){
        $this->db->distinct();
        $this->db->select('triune_co_req.Coreq');
        $this->db->from('triune_co_req');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function SubjCodePrereq(){
        $this->db->distinct();
        $this->db->select('triune_pre_req.Prereq');
        $this->db->from('triune_pre_req');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function SubjCodeCourse(){
        $this->db->distinct();
        $this->db->select('triune_curriculum.CourseCode');
        $this->db->from('triune_curriculum');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function SubjCodeSY(){
        $this->db->distinct();
        $this->db->select('triune_curriculum.SY');
        $this->db->from('triune_curriculum');
        
        $query = $this->db->get();
        return $query->result_array();
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */