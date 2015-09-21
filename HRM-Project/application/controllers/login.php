<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
    }
    public function index() {
        //$this->session->sess_destroy();
        $dashboard = $this->session->userdata('url');

        $this->login_model->loggedin() == FALSE || redirect($dashboard);

        $rules = $this->login_model->rules;
        $this->form_validation->set_rules($rules);

        if (empty($_POST['g-recaptcha-response'])) {

         $this->session->set_flashdata('error', 'Please Complete Captcha Verification');
            }

            else{
        if ($this->form_validation->run() == TRUE) {
            // We can login and redirect
            if ($this->login_model->login() == TRUE) {
                redirect($dashboard);
            } else {
                $this->session->set_flashdata('error', 'Username / Password combination does not exist');
                redirect('login', 'refresh');
            }
        }
}
        $data['title'] = "User Login";
        $data['subview'] = $this->load->view('login', $data, TRUE);
        $this->load->view('login', $data);
    }

    public function logout() {
        $this->login_model->logout();
        redirect('login');
    }

}