<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('Login');
    }
  }

  function index(){
      if($this->session->userdata('level')==='1'){
        redirect(base_url("admin"));
      }else{
          echo "Access Denied";
      }
  }

  function staff(){
    if($this->session->userdata('level')==='2'){
        redirect(base_url("operator"));
    }else{
        echo "Access Denied";
    }
  }

  function author(){
    if($this->session->userdata('level')==='3'){
      redirect(base_url("user"));
    }else{
        echo "Access Denied";
    }
  }
}