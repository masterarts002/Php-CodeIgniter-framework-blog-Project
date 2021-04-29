<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Layout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('my_helper');
    }

    public function index()
    {
        $data                          = array();
        $meta['get_identity'] = $this->identity_model->get_identity_data();
        $meta['site_title'] = $meta['get_identity']->site_title;
        $meta['description'] = $meta['get_identity']->site_desc;
        $meta['keywords'] = $meta['get_identity']->site_keywords;
        $meta['site_favicon'] = $meta['get_identity']->site_favicon;
        $meta['get_main_menu'] = $this->layout_model->get_main_menu();
        $data['get_all_slider_post'] = $this->layout_model->get_all_slider_post();
        $data['all_clients']  = $this->client_model->getall_client_info();
        $data['get_post']  = $this->layout_model->getall_post();
        $meta['footer_menu']   = $this->menu_model->getall_footer_menu_info();
        $this->load->view('layout/inc/header',$meta);
        $this->load->view('layout/pages/home', $data);
        $this->load->view('layout/inc/footer',$meta);
    }

    public function blog()
    {
        $this->load->library('pagination');
        $config=[
			'base_url' => base_url('blog'),
			'per_page' =>9,
			'total_rows' => $this->layout_model->num_rows(),
			'display_pages'=>FALSE,
            'next_tag_open' =>"<span class='btn btn-primary'>",
            'next_tag_close' =>"</span>",
            'prev_tag_open' =>"<span class='btn btn-primary'>",
            'prev_tag_close' =>"</span>",
			'next_link' => ' '.'Next <i class="fa fa-long-arrow-right" aria-hidden="true"></i>',
			'prev_link' => '<i class="fa fa-long-arrow-left" aria-hidden="true"></i> Previous',
			'first_link' => FALSE,
			'last_link' => FAlSE
		   ];
		$this->pagination->initialize($config);
        $data                          = array();
        $meta['get_identity'] = $this->identity_model->get_identity_data();
        $meta['site_title'] = 'Blog - '.$meta['get_identity']->site_title;
        $meta['description'] = $meta['get_identity']->site_desc;
        $meta['keywords'] = $meta['get_identity']->site_keywords;
        $meta['site_favicon'] = $meta['get_identity']->site_favicon;
        $meta['get_main_menu'] = $this->layout_model->get_main_menu();
        $data['get_post']  = $this->layout_model->get_all_post($config['per_page'],$this->uri->segment(2));
        $data['get_recent_post']  = $this->layout_model->get_recent_post();
        $data['all_published_category'] = $this->post_model->get_all_published_category();
        $meta['footer_menu']   = $this->menu_model->getall_footer_menu_info();
        $this->load->view('layout/inc/header',$meta);
        $this->load->view('layout/pages/blog', $data);
        $this->load->view('layout/inc/footer',$meta);
    }

    public function post($id)
    {
        $post_id=$id;
		$ip = $_SERVER['REMOTE_ADDR'];
        $this->layout_model->counter($post_id,$ip);
        $data                          = array();
        $data['get_single_post']  = $this->layout_model->get_single_post($id);
        $meta['get_identity'] = $this->identity_model->get_identity_data();
        $meta['site_title'] = $data['get_single_post']->post_title;
        $meta['description'] = $data['get_single_post']->post_description;
        $meta['keywords'] = $data['get_single_post']->post_keywords;
        $meta['site_favicon'] = $meta['get_identity']->site_favicon;
        $meta['get_main_menu'] = $this->layout_model->get_main_menu();
        $data['get_comments']  = $this->layout_model->get_comments($id);
        $data['get_total_comments']  = $this->layout_model->get_total_comments($id);
        $data['get_recent_post']  = $this->layout_model->get_recent_post();
        $data['all_published_category'] = $this->post_model->get_all_published_category();
        $meta['footer_menu']   = $this->menu_model->getall_footer_menu_info();
        $this->load->view('layout/inc/header',$meta);
        $this->load->view('layout/pages/post', $data);
        $this->load->view('layout/inc/footer',$meta);
    }

    public function addcmt()
    {
        $meta['EmailSetup'] = $this->identity_model->get_email_setup();
        $data                     = array();
        $data['cmt_author']    = $this->input->post('cmt_author');
        $data['cmt_post_id'] = $this->input->post('cmt_post_id');
        $data['cmt_email']    = $this->input->post('cmt_email');
        $data['cmt_url']   = $this->input->post('cmt_url');
        $data['cmt_data']   = $this->input->post('cmt_data');
        $data['cmt_on']   = time();

        $cmt_author    = $this->input->post('cmt_author');
        $cmt_email = $this->input->post('cmt_email');
        $cmt_url    = $this->input->post('cmt_url');
        $cmt_data   = $this->input->post('cmt_data');
        $post_title   = $this->input->post('post_title');
        

        $this->form_validation->set_rules('cmt_author', 'Name', 'trim|required|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('cmt_email', 'Email', 'trim|required|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('cmt_url', 'about', 'trim|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('cmt_data', 'comment', 'trim|required|htmlspecialchars|xss_clean');

        if ($this->form_validation->run() == true) {
            $result = $this->layout_model->cmt_submit($data);
            if ($result) {
                $config = Array(
					'protocol' => $meta['EmailSetup']->protocol,
					'smtp_host' => $meta['EmailSetup']->smtp_host,
					'smtp_port' => $meta['EmailSetup']->smtp_port,
					'smtp_user' => $meta['EmailSetup']->smtp_user,
					'smtp_pass' => $meta['EmailSetup']->smtp_pass,
					'mailtype' => $meta['EmailSetup']->mailtype,
					'charset' => $meta['EmailSetup']->charset,
					'wordwrap' => $meta['EmailSetup']->wordwrap
				 );
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from($meta['EmailSetup']->email_from, "New Comment");
				$this->email->to($meta['EmailSetup']->email_to);  
				$this->email->subject("New Comment on".$post_title);
				$this->email->message('<h3 style="color:red">New Comment on '.$post_title.
                '</h3>Name: '.$cmt_author.
                '<br>Email: '.$cmt_email.
                '<br>Website: '.$cmt_url.
                '<br>comment: '.$cmt_data.
                '<br>Approve comment: '.base_url('manage-comment'));
				$this->email->send();

                $this->session->set_flashdata('message', 'Successfully submited');
                redirect('post/'.$data['cmt_post_id']);
            } else {
                $this->session->set_flashdata('message', 'Some error found! try again');
                redirect('post/'.$data['cmt_post_id']);
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('post/'.$data['cmt_post_id']);
        }
    }
    
    public function submit()
    {
        $meta['EmailSetup'] = $this->identity_model->get_email_setup();
        $data                     = array();
        $data['full_name']    = $this->input->post('full_name');
        $data['email'] = $this->input->post('email');
        $data['mubile_number']    = $this->input->post('mubile_number');
        $data['about']   = $this->input->post('about');
        $data['comment']   = $this->input->post('comment');
        $data['sent_on']   = time();

        $cmt_author    = $this->input->post('full_name');
        $cmt_email = $this->input->post('email');
        $cmt_url    = $this->input->post('mubile_number');
        $cmt_data   = $this->input->post('comment');
        $about   = $this->input->post('about');
        

        $this->form_validation->set_rules('full_name', 'Name', 'trim|required|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('mubile_number', 'Mobile', 'trim|required|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('about', 'about', 'trim|required|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('comment', 'comment', 'trim|htmlspecialchars|xss_clean');

        if ($this->form_validation->run() == true) {
            $result = $this->layout_model->contact_submit($data);
            if ($result) {
                $config = Array(
					'protocol' => $meta['EmailSetup']->protocol,
					'smtp_host' => $meta['EmailSetup']->smtp_host,
					'smtp_port' => $meta['EmailSetup']->smtp_port,
					'smtp_user' => $meta['EmailSetup']->smtp_user,
					'smtp_pass' => $meta['EmailSetup']->smtp_pass,
					'mailtype' => $meta['EmailSetup']->mailtype,
					'charset' => $meta['EmailSetup']->charset,
					'wordwrap' => $meta['EmailSetup']->wordwrap
				 );
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from($meta['EmailSetup']->email_from, "New Comment");
				$this->email->to($meta['EmailSetup']->email_to);  
				$this->email->subject("New Enquiry About".$about);
				$this->email->message('<h3 style="color:red">New Enquiry About '.$about.
                '</h3>Name: '.$cmt_author.
                '<br>Email: '.$cmt_email.
                '<br>Mobile: '.$cmt_url.
                '<br>comment: '.$cmt_data);
				$this->email->send();

                $this->session->set_flashdata('message', 'Successfully submited! We Will Get Back To you Soon');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('message', 'Some error found! try again');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function addrep()
    {
        $meta['EmailSetup'] = $this->identity_model->get_email_setup();
        $data                     = array();
        $data['rep_cmt_id'] = $this->input->post('rep_cmt_id');
        $data['rep_data']   = $this->input->post('rep_data');
        $data['admin_id']   = $this->session->userdata('admin_name');
        $data['rep_on']   = time();
        $post_title = $this->input->post('post_title');
        $post_url = base_url('post/'.$this->input->post('cmt_post_id'));
        $email = $this->db->select('cmt_email')->where('cmt_id',$data['rep_cmt_id'])->get('cmt_table');
        

        $this->form_validation->set_rules('rep_data', 'comment', 'trim|required|htmlspecialchars|xss_clean');

        if ($this->form_validation->run() == true) {
            $result = $this->layout_model->rep_submit($data);
            if ($result) {
                $config = Array(
					'protocol' => $meta['EmailSetup']->protocol,
					'smtp_host' => $meta['EmailSetup']->smtp_host,
					'smtp_port' => $meta['EmailSetup']->smtp_port,
					'smtp_user' => $meta['EmailSetup']->smtp_user,
					'smtp_pass' => $meta['EmailSetup']->smtp_pass,
					'mailtype' => $meta['EmailSetup']->mailtype,
					'charset' => $meta['EmailSetup']->charset,
					'wordwrap' => $meta['EmailSetup']->wordwrap
				 );
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from($meta['EmailSetup']->email_from, "New Comment");
				$this->email->to($email);  
				$this->email->subject("Admin reply on your comment on".$post_title);
				$this->email->message('<h3 style="color:red">Admin reply on your comment on '.$post_title.
                '<br>check reply here: '.$post_url);
				$this->email->send();

                $this->session->set_flashdata('message', 'Successfully submited');
                redirect('post/'.$this->input->post('cmt_post_id'));
            } else {
                $this->session->set_flashdata('message', 'Some error found! try again');
                redirect('post/'.$this->input->post('cmt_post_id'));
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('post/'.$this->input->post('cmt_post_id'));
        }
    }

    public function category($id)
    {
        $this->load->library('pagination');
        $config=[
			'base_url' => base_url('blog'),
			'per_page' =>9,
			'total_rows' => $this->layout_model->num_rows(),
			'display_pages'=>FALSE,
            'next_tag_open' =>"<span class='btn btn-primary'>",
            'next_tag_close' =>"</span>",
            'prev_tag_open' =>"<span class='btn btn-primary'>",
            'prev_tag_close' =>"</span>",
			'next_link' => ' '.'Next <i class="fa fa-long-arrow-right" aria-hidden="true"></i>',
			'prev_link' => '<i class="fa fa-long-arrow-left" aria-hidden="true"></i> Previous',
			'first_link' => FALSE,
			'last_link' => FAlSE
		   ];
		$this->pagination->initialize($config);
        $data                          = array();$meta['get_identity'] = $this->identity_model->get_identity_data();
        $meta['site_title'] = 'Post Categories - '.$meta['get_identity']->site_title;
        $meta['description'] = $meta['get_identity']->site_desc;
        $meta['keywords'] = $meta['get_identity']->site_keywords;
        $meta['site_favicon'] = $meta['get_identity']->site_favicon;
        $meta['get_main_menu'] = $this->layout_model->get_main_menu();
        $data['get_post']  = $this->layout_model->get_all_post_by_categories($config['per_page'],$id,$this->uri->segment(2));
        $data['get_recent_post']  = $this->layout_model->get_recent_post();
        $data['all_published_category'] = $this->post_model->get_all_published_category();
        $meta['footer_menu']   = $this->menu_model->getall_footer_menu_info();
        $this->load->view('layout/inc/header',$meta);
        $this->load->view('layout/pages/category', $data);
        $this->load->view('layout/inc/footer',$meta);
    }

    
    public function register_success()
    {
         
		$this->load->library('form_validation');
		$this->form_validation->set_rules('otp', 'otp', 'trim|required|numeric|htmlspecialchars|xss_clean');
		if ($this->form_validation->run())
		{
			$this->load->model('layout_model');
		    $otp=$this->input->post('otp');
		    $profile_id=$this->session->userdata('id');
		    $noRecords = $this->layout_model->verifyEmailAddress($otp,$profile_id);  
		    if ($noRecords > 0)
		    {
			    $this->db->set(['customer_email_cnf'=>TRUE,'email_verification_code'=>''])
					 ->where(['customer_id '=>$profile_id,'email_verification_code'=>$otp])
					 ->update('tbl_customer');
			    $this->session->set_flashdata('otp_success','successfully Verified Email!!');
			    return redirect('login'); 
		    }
		    else
		    {
			    $this->session->set_flashdata('otp_failed','Sorry Unable to Verify Your Email/ Invalid Otp!!');
			    return redirect('verify-email');
		    }
		}
		
		$this->load->view('layout/inc/header');
        $this->load->view('layout/pages/register_success');
        $this->load->view('layout/inc/footer');
    }

    public function resendotp()
	{
        $meta['EmailSetup'] = $this->identity_model->get_email_setup();
		$q=$this->db->where(['customer_id'=>$this->session->userdata('id')])
                 ->get('tbl_customer');
                $email=$q->row()->customer_email;
             if($q->row()->customer_email)     
             {
			
				$otp=rand(100000,999999);
				$config = Array(
					'protocol' => $meta['EmailSetup']->protocol,
					'smtp_host' => $meta['EmailSetup']->smtp_host,
					'smtp_port' => $meta['EmailSetup']->smtp_port,
					'smtp_user' => $meta['EmailSetup']->smtp_user,
					'smtp_pass' => $meta['EmailSetup']->smtp_pass,
					'mailtype' => $meta['EmailSetup']->mailtype,
					'charset' => $meta['EmailSetup']->charset,
					'wordwrap' => $meta['EmailSetup']->wordwrap
				 );
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from($meta['EmailSetup']->email_from, "Astro Moderation Team");
				$this->email->to($email);  
				$this->email->subject("New Registration at AstroStarMagik");
				$this->email->message('<h3>Dear,</h3><br>'.'User'.'<br>Your New One Time Password: '.$otp.'<br>Click <a style="color: red" href="http://astrostarmagik.com/verify-email">here</a> to set password<br><h3>Thanks & Regards,<br>Moderation Team</h3>');
				$this->email->send();
				
				$this->db->set(['email_verification_code'=>$otp])
                  ->where('customer_id',$this->session->userdata('id'))
                  ->update('tbl_customer');
				$this->session->set_flashdata('resend_otp_success','new OTP successfully sended');
				return redirect('verify-email');
             }
    }

    

    public function customer_register()
    {
        if($this->session->userdata(id)){
            return redirect('/');
        }
        $meta['title'] = "Astro Star Magic - Customer Register";
        $meta['description'] = "Get a free horoscope with online consultation by top astrologers. Avail best online horoscope and online astrology services by world leader in astrology.";
        $meta['keywords'] = "Astrology, Online Astrology, Horoscope, Online Horoscope, Free Online Horoscope, Astrologer, Online Astrologer, Astrology Online, Free Astrology";
        $data = array();
        $this->load->view('layout/inc/header',$meta);
        $this->load->view('layout/pages/customer_register');
        $this->load->view('layout/inc/footer');
    }

    public function customer_save()
    {
        $otp = rand(100000,999999);
        $username = $this->input->post('customer_name');
        $Email = $this->input->post('customer_email');
        $data                      = array();
        $data['customer_name']     = $this->input->post('customer_name');
        $data['customer_email']    = $this->input->post('customer_email');
        $data['customer_password'] = password_hash($this->input->post('customer_password'),PASSWORD_BCRYPT);
        $data['customer_address']  = $this->input->post('customer_address');
        $data['customer_city']     = $this->input->post('customer_city');
        $data['customer_state']    = $this->input->post('customer_state');
        $data['customer_phone']    = $this->input->post('customer_phone');
        $data['customer_zipcode']  = $this->input->post('customer_zipcode');
        $data['email_verification_code']  = $otp;

        $this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required|min_length[3]|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|htmlspecialchars|xss_clean|valid_email|is_unique[tbl_customer.customer_email]');
        $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required|min_length[5]|max_length[20]|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('PasswordCnf', 'Repeat Password', 'trim|required|min_length[5]|max_length[20]|htmlspecialchars|xss_clean|matches[customer_password]');
        $this->form_validation->set_rules('customer_address', 'Customer Address', 'trim|required|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('customer_city', 'Customer City', 'trim|required|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('customer_state', 'Customer Country', 'trim|required|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('customer_phone', 'Customer Phone', 'trim|required|htmlspecialchars|xss_clean|numeric');
        $this->form_validation->set_rules('customer_zipcode', 'Customer Zipcode', 'trim|required|htmlspecialchars|xss_clean|numeric',
        array('required' => 'You must provide a %s.','is_unique' => 'This %s already exists.'));

        if ($this->form_validation->run() == true) {
            $result = $this->layout_model->save_customer_info($data);
            if ($result) {
                $config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'smtp.hostinger.in',
					'smtp_port' => 587,
					'smtp_user' => 'noreply@astrostarmagik.com',
					'smtp_pass' => 'Astro@987',
					'mailtype' => 'html',
					'charset' => 'iso-8859-1',
					'wordwrap' => TRUE
				 );
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('noreply@astrostarmagik.com', "Astro Moderation Team");
				$this->email->to($Email);  
				$this->email->subject("New Registration at AstroStarMagik");
				$this->email->message('<h3>Dear,</h3><br>'.$username.'<br>Your One Time Password: '.$otp.'<br>Click <a style="color: red" href="http://astrostarmagik.com/verify-email">here</a> to set password<br><h3>Thanks & Regards,<br>Moderation Team</h3>');
				$this->email->send();

                $this->session->set_userdata('id', $result);
                $this->session->set_flashdata('customer_name', $data['customer_name']);
                $this->session->set_flashdata('customer_email', $data['customer_email']);
                redirect('verify-email');
            } else {
                $this->session->set_flashdata('message', 'Customer Registration Failed');
                redirect('register');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('register');
        }
    }

    public function customer_login()
    {
        if($this->session->userdata(id)){
            return redirect('/');
        }
        $data = array();
        $meta['title'] = "Astro Star Magic - Customer Login";
        $meta['description'] = "Get a free horoscope with online consultation by top astrologers. Avail best online horoscope and online astrology services by world leader in astrology.";
        $meta['keywords'] = "Astrology, Online Astrology, Horoscope, Online Horoscope, Free Online Horoscope, Astrologer, Online Astrologer, Astrology Online, Free Astrology";
        $data = array();
        $this->load->view('layout/inc/header',$meta);
        $this->load->view('layout/pages/customer_login');
        $this->load->view('layout/inc/footer');
    }

  

    public function customer_logincheck()
    {
        $customer_email    = $this->input->post('customer_email');
        $customer_password = $this->input->post('customer_password');

        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->layout_model->get_customer_info($customer_email,$customer_password);
            if ($result) {
                $this->session->set_userdata('id', $result->customer_id);
                $this->session->set_userdata('name', $result->customer_name);
                $this->session->set_userdata('email', $result->customer_email);
                return redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('message', 'Customer Login Fail');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('login');
        }
    }

    public function change_password()
    {
        $data = array();
        $meta['title'] = "Astro Star Magic - Customer Change Password";
        $meta['description'] = "Get a free horoscope with online consultation by top astrologers. Avail best online horoscope and online astrology services by world leader in astrology.";
        $meta['keywords'] = "Astrology, Online Astrology, Horoscope, Online Horoscope, Free Online Horoscope, Astrologer, Online Astrologer, Astrology Online, Free Astrology";
        $data = array();
        $this->load->view('layout/inc/header',$meta);
        $this->load->view('layout/pages/customer_change_password');
        $this->load->view('layout/inc/footer');
    }

    public function change_pw()
    {
        $this->form_validation->set_rules('oldpassword', 'oldpassword', 'trim|required|min_length[3]|max_length[20]|htmlspecialchars|xss_clean',
		array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('Password', 'Password', 'trim|required|min_length[5]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[Password]|xss_clean');
	
		if ($this->form_validation->run())
		{
			$odpw=$this->input->post('oldpassword');
			$Password=$this->input->post('Password');
			$pwd_hash=password_hash($Password,PASSWORD_BCRYPT);
			if($this->layout_model->change_password($odpw,$pwd_hash))
			{
				$this->session->set_flashdata('change_success','successfully changed!!');
			    return redirect('my-account');
			}
			else
			{
				$this->session->set_flashdata('change_failed','Old password not match/Try again!!');
				return redirect('change-password');
			}
			
		}
        else
		{
            $this->session->set_flashdata('change_failed', validation_errors());
			return redirect('change-password');
		}	
    }

    public function forgot_password()
    {
        $data = array();
        $meta['title'] = "Astro Star Magic - Forgot Password";
        $meta['description'] = "Get a free horoscope with online consultation by top astrologers. Avail best online horoscope and online astrology services by world leader in astrology.";
        $meta['keywords'] = "Astrology, Online Astrology, Horoscope, Online Horoscope, Free Online Horoscope, Astrologer, Online Astrologer, Astrology Online, Free Astrology";
        $data = array();
        $this->load->view('layout/inc/header',$meta);
        $this->load->view('layout/pages/customer_forgot_password');
        $this->load->view('layout/inc/footer');
    }

    public function send_otp()
    {
		$this->form_validation->set_rules('customer_email', 'customer_email', 'trim|required|valid_email|htmlspecialchars|xss_clean',
		array('required' => 'You must provide a %s.'));
		
		if ($this->form_validation->run())
		{
			$otp = rand(100000,999999);
			$customer_email=$this->input->post('customer_email');
			if($this->layout_model->if_email_exist($customer_email,$otp))
			{
				$this->session->set_flashdata('otp_success','OTP successfully sended/Check your mail !!');
			    return redirect('set-new-password');
			}
			else
			{
				$this->session->set_flashdata('otp_failed','Email not exist or Email not verified !!');
				return redirect('forgot-password');
			}
			
		}
		else
		{
            $this->session->set_flashdata('otp_failed', validation_errors());
			return redirect('forgot-password');
		}	
    }

    public function set_new_password()
    {
        $data = array();
        $this->load->view('layout/inc/header');
        $this->load->view('layout/pages/customer_set_new_password');
        $this->load->view('layout/inc/footer');
    }

    public function set_new_pw()
    {
        $this->form_validation->set_rules('otp', 'otp', 'trim|required|min_length[3]|max_length[6]|numeric|htmlspecialchars|xss_clean',
		array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('Password', 'Password', 'trim|required|min_length[5]|max_length[20]|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[Password]|htmlspecialchars|xss_clean');

        if ($this->form_validation->run())
		{
			$otp=$this->input->post('otp');
			$Password=$this->input->post('Password');
			$pwd_hash=password_hash($Password,PASSWORD_BCRYPT);
			if($this->layout_model->update_password($otp,$pwd_hash))
			{
				$this->session->set_flashdata('update_success','successfully Updated/ Login to your Ac!!');
			    return redirect('login');
			}
			else
			{
				$this->session->set_flashdata('update_failed','Otp not match or Otp expired!!');
				return redirect('set-new-password');
			}
			
		}
        else
		{
            $this->session->set_flashdata('update_failed', validation_errors());
			return redirect('set-new-password');
		}	
    }



    

    public function search()
    {

        $search = $this->input->post('search');

        if ($search) 
        {
            $data                    = array();
            $data['get_all_product'] = $this->layout_model->get_all_search_product($search);
            $data['search']          = $search;
            $data['get_all_category']=$this->layout_model->get_all_category();
            $this->load->view('layout/inc/header');
            $this->load->view('layout/pages/search', $data);
            $this->load->view('layout/inc/footer');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');
        redirect('/');
    }

    public function myaccount()
    {
        if(!$this->session->userdata('id')){
            redirect('login');
        }
        $data = array();
        $add['get_shipping_address'] = $this->layout_model->get_shipping_address();
        $this->load->view('layout/inc/header');
        $this->load->view('layout/pages/my_account',$add);
        $this->load->view('layout/inc/footer');
    }

    

    

    

    public function contact()
    {
        $data                          = array();
        $meta['get_identity'] = $this->identity_model->get_identity_data();
        $meta['site_title'] = 'Contact Us - '.$meta['get_identity']->site_title;
        $meta['description'] = $meta['get_identity']->site_desc;
        $meta['keywords'] = $meta['get_identity']->site_keywords;
        $meta['site_favicon'] = $meta['get_identity']->site_favicon;
        $meta['get_main_menu'] = $this->layout_model->get_main_menu();
        $data['footer_menu']   = $this->menu_model->getall_footer_menu_info();
        $data['get_recent_post']  = $this->layout_model->get_recent_post();
        $data['all_published_category'] = $this->post_model->get_all_published_category();
        $this->load->view('layout/inc/header',$meta);
        $this->load->view('layout/pages/contact', $data);
        $this->load->view('layout/inc/footer',$data);
    }

    
    
    public function privacy()
    {
        $data                  = array();
        $this->load->view('layout/inc/header');
        $this->load->view('layout/pages/privacy');
        $this->load->view('layout/inc/footer');
    }

    public function refund()
    {
        $data                  = array();
        $this->load->view('layout/inc/header');
        $this->load->view('layout/pages/refund');
        $this->load->view('layout/inc/footer');
    }

    public function terms()
    {
        $data                  = array();
        $this->load->view('layout/inc/header');
        $this->load->view('layout/pages/terms');
        $this->load->view('layout/inc/footer');
    }


}
