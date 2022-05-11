<?php

class Login extends MY_controller
{

	public function index()
		{
			$this->form_validation->set_rules('uname', 'User name','required|alpha');
			$this->form_validation->set_rules('pass', 'Password','required|max_length[12]');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if($this->session->userdata('id')){
				return redirect('Users/welcome');
			}

			 if($this->form_validation->run()) 
			{
				$uname=$this->input->post('uname');
				$pass=$this->input->post('pass');
				#echo "Username is " . $uname . "</br>" . "and Password is " . $pass;

				$this->load->model('loginmodel');
				$login_id=$this->loginmodel->isvalidated($uname,$pass);
				if($login_id)
				{

					$this->load->library('session');
					$this->session->set_userdata('id',$login_id);
					#$this->load->view('Admin/dashboard');
					return redirect('Users/Welcome');
				}
				else 
				{
					$this->session->set_flashdata('Login_failed','Invalid Username/Password');
					redirect('login');
				}

			}
			else 
			{
				#echo validation_errors();
				$this->load->view('Admin/login');
			}
		}

	public function logout()
		{
			$this->session->unset_userdata('id');
			return redirect('login');
		}

}

?>