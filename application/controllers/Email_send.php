<?php 

class Email_send extends MY_controller 
{

	public function index()
	{
		$this->load->view('Users/email_send');
	}

	public function send()
	{

		$to = $this->input->post('from'); // User emails passes here
		$subject = 'Welcome To TechaSoft';

		$from = 'suryanshkaushal98@gmail.com';

		$emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc; margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"></td></tr>';
		$emailContent .= '<tr><td style="height:20px"></td></tr>';

		$emailContent .= $this->input->post('message');

		$emailContent .= '<tr><td style="height:20px"></td></td>';
		$emailContent .= "<tr><td style='background:#000000; color: #999999;padding: 2%; text-align: center;font-size:13px;'><p style='margin-top:1px;'><a href='https://codeigniter.com/userguide3/libraries/sessions.html' target='_blank' style='text-decoration:none; color: #60d2ff;'>www.codeignitor.com</a></p></td></tr></table></body></html>";


		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_port'] = '465';
		$config['smtp_timeout'] = '60';

		$config['smtp_user'] = 'suryanshkaushal98@gmail.com';
		$config['smtp_pass'] = 'p2+b2=h2';

		$config['charset'] = 'utf-8';
		$config['newline'] = '\r\n';
		$config['mailtype'] = 'html';
		$config['validation'] = TRUE;

		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($emailContent);
		$this->email->send();

		$this->session->set_flashdata('msg',"Mail has been sent successfully");
		$this->session->set_flashdata('msg_class', 'alert-success');

		return redirect('email_send');

	}
}



?>