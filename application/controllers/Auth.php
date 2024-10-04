<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/login');
	}


	public function login(){
    	$value;
        $this->load->library('session');
        $this->load->model('MyModel');
        $username=$_POST['username'];
        $password=$_POST['password'];
        $data="SELECT * FROM entry WHERE username='$username' AND password='$password'";
            $user['get']=$this->MyModel->getarraybyquery($data);
            print_r($user);
            if ($user['get']==true) {
                foreach($user['get'] as $value){}
              $this->session->set_userdata('login_id', $value['id']);
                $this->session->set_flashdata('success','user login successfully');

              redirect('admin/home');
            }else{
                $this->session->set_flashdata('error', "<p style='color:red; background:#f7d4d4; width:280px; padding:18px;'>Invalide Login Details ..!!</p>");
              redirect('auth/index');
            }
    }

}
