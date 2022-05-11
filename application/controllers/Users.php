<?php 

class Users extends MY_controller 
{


		public function Welcome()
		{
			$this->load->model('loginmodel');
			$this->load->library('pagination');

			if(!$this->session->userdata('id'))
			{
				return redirect('login');
			}

			$config=[
				   'base_url' => base_url('Users/Welcome'),
				   'per_page' => 3,
				   'total_rows' => $this->loginmodel->num_rows(),
				   'full_tag_open' => "<nav aria-label='Page navigation example'>",
				   'full_tag_open' => "<ul class='pagination' style='margin-left:35%;'>",
				   'full_tag_close' => "</ul>",
				   'full_tag_close' => "</nav>",
				   'next_tag_open' => "<li class='page-link'><a class='page-link'>",
				   'next_tag_open' => "</a></li>",
				   'prev_tag_open' => "<li class='page-link'><a class='page-link'>",
				   'prev_tag_open' => "</a></li>", 
				   'num_tag_open' => "<li class='page-link'><a class='page-link'>",
				   'num_tag_open' => "</a></li>",
				   'cur_tag_open' => "<li class='active'></li><a>",
				   'cur_tag_close' => "</a></li>",
			];

			$this->pagination->initialize($config);

			$articles=$this->loginmodel->articleList($config['per_page'],$this->uri->segment(3));
			//uri breaks the segments after base url and starts the segment at the position mentioned
			//within the paretnthis
			$this->load->view('Admin/dashboard',['articles'=>$articles]);
		}

		public function addUser()
		{
			$this->load->view('Admin/add_article');
		}

		public function addContact()
		{
			if(!$this->session->userdata('id')){
				return redirect('login');
			}
			$this->load->view('Users/email_send');
		}

		public function editUser()
		{
			$id=$this->input->post('id');
			$article=$this->loginmodel->find_article($id);
			$this->load->view('Admin/edit_article',['article'=>$article]);
		}

		public function updatearticle($article_id)
		{

				$post=$this->input->post();
				//unset()
				if($this->loginmodel->update_article($article_id,$post))
				{
					$this->session->set_flashdata('Added','Article Edit successfully');
					$this->session->set_flashdata('msg-class','alert-success');
				}
				else
				{
					$this->session->set_flashdata('Added','Article not edited successfully');
					$this->session->set_flashdata('msg-class','alert-danger');
				}
				return redirect('Users/Welcome');
		}


		public function delarticle()
		{
			$id=$this->input->post('id');
			if($this->loginmodel->deleterecords($id))
				{
					$this->session->set_flashdata('Added','Articles deleted successfully.');
					$this->session->set_flashdata('msg_class', 'alert-success');
				}
				else 
				{
					$this->session->set_flashdata('Added','Articles not deleted.');
					$this->session->set_flashdata('msg_class','alert-danger');
					
				}

				return redirect('Users/Welcome');

		}

		public function userValidation() 
		{
			if($this->form_validation->run('add_article_rules'))
			{

				//$post=$this->input->post();
				$data['user_id']=$this->session->userdata('id');
				$data['article_title']=$this->input->post('article_title');
				$data['article_body']=$this->input->post('article_body');
				if($this->loginmodel->saverecords($data))
				{
					$this->session->set_flashdata('Added','Articles added successfully.');
					$this->session->set_flashdata('msg_class', 'alert-success');
				}
				else 
				{
					$this->session->set_flashdata('Added','Articles not added.');
					$this->session->set_flashdata('msg_class','alert-danger');
					
				}

				return redirect('Users/Welcome');

			}
				
			else 
			{
				$this->load->view('admin/add_article');
			}
		}




}

?>