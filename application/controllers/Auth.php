<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('email','Email', 'trim|required|min_length[2]|valid_email',
												 array(
												 		'required' 				=> 'masukkan email' ,
												 		'min_length' 			=> 'email terlalu pendek',
												 		'valid_email'			=> 'email tidak valid',
													  )
		);
		$this->form_validation->set_rules('password','Password','trim|required|min_length[4]',
                                            	 array(
		                                                'required'   => 'Masukkan Password..!.',
		                                                'min_length' => 'Minimal 4 huruf/angka/karakter'
                                                	  )
        );
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/header');
			$this->load->view('auth/login');
			$this->load->view('auth/footer');
			} else 
			{
			//-- when validation success
           $this->_login();
		}
		
	}

	private function _login()
	{
		$email      = htmlspecialchars($this->input->post('email',true));
        $password   = htmlspecialchars($this->input->post('password',true));

        //query data from database
        $user = $this->db->get_where('user', ['email' => $email])->row_array();


        //--when user axist
        if($user)
        {
            //--when user activated
            if( $user['is_active'] ==1 )
            {
                //--ceck password
                if(password_verify($password, $user['password']))
                {
                    
                    //--data for session

                    $data = [
                        'email'     		=> $user['email'],
                        'role_id'   		=> $user['role_id'],
                        'member_status'     => $user['member_status']
                    ];

                    $this->session->set_userdata($data);

                    //--redirect user;
                    
                    if($user['role_id'] == 1 ) {
                            redirect('useraccess/ceo');
                        } elseif ($user['role_id'] == 2 ) {
                            redirect('useraccess/admin');
                        } elseif ($user['role_id'] == 3 && $user['member_status'] == 1 ) {
                            redirect('useraccess/member');
                        }else {
                            redirect('home/index');
                        }
                        
                    
                }else
                {
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">password salah!</div>');
                    redirect('auth/index');
                }
            }else
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">email belum diaktivasi!</div>');
                redirect('auth/index');
            }
        }else
        {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">silahkan aktivasi email!</div>');
            redirect('auth/index');
        }
	}

	
	public function registration()
	{
		
		$this->form_validation->set_rules('username','Username','trim|required|min_length[2]|is_unique[user.username]',
												 array(
												 		'required' 		=> 'masukkan username' ,
												 		'min_length' 	=> 'username terlalu pendek',
												 		'is_unique'		=> 'username pernah digunakan'
													  )
		);
		$this->form_validation->set_rules('email','Email','trim|required|min_length[2]|valid_email|is_unique[user.email]',
												 array(
												 		'required' 		=> 'masukkan email' ,
												 		'min_length' 	=> 'email terlalu pendek',
												 		'valid_email'	=> 'email tidak valid',
												 		'is_unique'		=> 'email pernah digunakan'
													  )
		);
		$this->form_validation->set_rules('password1','Password1','trim|required|min_length[4]|matches[password2]',
                                            	 array(
		                                                'required'   => 'Masukkan Password..!.',
		                                                'min_length' => 'Minimal 4 huruf/angka/karakter',
		                                                'matches'    => 'password tidak cocok'
                                                	  )
        );
        $this->form_validation->set_rules('password2','Password2', 'trim|required|min_length[4]',
	                                             array(
		                                                'required'   => 'Masukkan Password..!.',
		                                                'min_length' => 'Minimal 4 huruf/angka/karakter',
	                                                  )
	    );

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('auth/header');
			$this->load->view('auth/registration');
			$this->load->view('auth/footer');
		} else {
			$data = [
                    'username'      => htmlspecialchars($this->input->post('username', true)),
                    'email'     	=> htmlspecialchars($this->input->post('email', true)),
                    'image'     	=> 'default.jpg',
                    'password'  	=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id'   	=> 3,
                    'member_status' => 0,
                    'is_active' 	=> 0,
                    'date_created' 	=> time()
                    ];
            // insert into database
            $this->db->insert('user', $data);
            // create message success in index
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">registrasi sukses!</div>');
            
            redirect('auth/index');
		}

	}

	public function forgetPassword()
	{
		$this->load->view('auth/header');
		$this->load->view('auth/forget_password');
		$this->load->view('auth/footer');
	}

	public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Logout sukses!</div>');
        redirect('home/index');
    }
}
