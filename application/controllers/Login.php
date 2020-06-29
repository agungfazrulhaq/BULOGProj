<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_user");
        $this->load->library('form_validation');
    }

    public function index(){
        if($this->input->post()){
            if($this->M_user->doLogin()){
                redirect(site_url());
            }
        }
        
        $this->load->view("login.php");
        
    }

    public function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('successlogout', 'Berhasil menghapus data');
        redirect(site_url("Login/"));
    }
}