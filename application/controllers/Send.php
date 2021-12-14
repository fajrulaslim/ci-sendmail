<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send extends CI_Controller {


	public function index()
	{
		$from_email = ""; 
        $to_email = "";  

         $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => $from_email,
                'smtp_pass' => '',
                'mailtype'  => 'html', 
                'charset'   => 'iso-8859-1'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");   

		$this->email->from($from_email, 'Tes'); 
		$this->email->to($to_email);
		$this->email->subject('Test Pengiriman Email'); 
		$this->email->message('Coba mengirim Email dengan CodeIgniter.'); 

		//Send mail 
		if($this->email->send()){
		    // $this->session->set_flashdata("notif","Email berhasil terkirim."); 
		    echo "Email berhasil terkirim.";
		}else {
		    // $this->session->set_flashdata("notif","Email gagal dikirim."); 
		    // $this->load->view(‘home’); 
		    echo "Email gagal dikirim.";
		} 
	}


}
