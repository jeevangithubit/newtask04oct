<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $id=$this->session->userdata('login_id');
        if(empty($id)){
          redirect('auth/index');
        }
    }

	public function home()
	{
		$sql = "SELECT * FROM `entry`";
		$data['get']=$this->MyModel->getarraybyquery($sql);
		$this->load->view('Admin/index',$data);
	}

	public function edit($id)
	{
		$data['get'] = $this->MyModel->get_record('entry', array('id'=>$id));
		$this->load->view('admin/update', $data);
	}

	public function update()
	{
		$sbsr=array(
					'username'=>$this->input->post('name'),
					'email'=>$this->input->post('email'),
					'password'=>$this->input->post('password'),
					'dob'=>$this->input->post('dob'),
				   );
		
		$str=$this->MyModel->update('entry',$sbsr,array('id'=>$this->input->post('id')));
		
		if($str){
				$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been updated successfully.</div>');
	             redirect(site_url('Admin/home'));
					
	            }else{
	            	$data['success'] = 'error';
	            }
	}

	public function delete(){
		$id=$this->uri->segment(3);
		$delete=$this->MyModel->delete('entry', $id);
		$this->session->set_flashdata('success', "<p style='color:green; background:#ceeace; width:280px; padding:18px;'>delete successfully ..!!</p>");
		redirect('Admin/home');
	}


	public function logout(){
		$this->session->unset_userdata('login_id', $user[0]['id']);
		redirect('auth/login');
	}
}
	


