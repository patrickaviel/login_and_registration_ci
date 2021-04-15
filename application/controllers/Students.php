<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
        //$this->output->enable_profiler();
		//$this->output->enable_profiler();
    }
    public function index()
    {  
        $this->load->view('index');
    }
    public function welcome()
    {  
        $this->load->view('welcome');
    }

    public function login()
    {
        
        $this->form_validation->set_rules('email','<strong><em>Email</em></strong>','trim|required');
        $this->form_validation->set_rules('password','<strong><em>Password</em></strong>','trim|required');
        if($this->form_validation->run()===FALSE)
        {
            // $data['errors'] = validation_errors();
            // $this->session->set_flashdata('form_errors',$data);
            $this->session->set_flashdata('errors_login', validation_errors());
            redirect(base_url());
        }else
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $student = $this->student_model->get_student_by_email($email);
            if($student && $student['password'] === $password)
            {
                $user = array(
                    'first_name' => $student['first_name'],
                    'last_name' => $student['last_name'],
                    'email' => $student['email'],
                    'is_logged_in' => true
                );
                $this->session->set_userdata($user);
                redirect('/students/profile');
            }
            else
            {
                $this->session->set_flashdata("login_error", "Invalid email or password!");
                redirect("/students/index");
            }
            //$this->student_model->update
        }
    }
    public function register()
    {
        $this->form_validation->set_rules('first_name','<strong><em>First Name</em></strong>','trim|required');
        $this->form_validation->set_rules('last_name','<strong><em>Last Name</em></strong>','trim|required');
        $this->form_validation->set_rules('email','<strong><em>Email</em></strong>','trim|required|is_unique[users.email]|valid_email');
        $this->form_validation->set_rules('password','<strong><em>Password</em></strong>','trim|required|min_length[8]');
        $this->form_validation->set_rules('c_password','<strong><em>Confirm Password</em></strong>','trim|required|differs[password]');
        if($this->form_validation->run()===FALSE)
        {
            // $data['errors'] = error_array();
            // $this->session->set_flashdata('form_errors',$data);
            $this->session->set_flashdata('errors_register', validation_errors());
            redirect(base_url());
        }else
        {
            $this->student_model->add_student($this->input->post(NULL, TRUE));
            redirect(base_url());
        }
    }
    public function profile()
    {
        if($this->session->userdata('is_logged_in') === TRUE)
        {
            redirect('/students/welcome');
        }
        else
        {
            redirect("/students/index");
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect("/students/index");   
    }
}