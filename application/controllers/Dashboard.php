<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
   
    public function index()
    {
        if(!$this->session->userdata('admin_email')){
            redirect('dashboard-login');
        }

        $data                = array();
        $data['get_all_post'] = $this->post_model->get_all_post();
        $data['maincontent'] = $this->load->view('admin/pages/home',$data, true);
        $this->load->view('admin/master', $data);
    }

    public function logout()
    {

        $this->session->unset_userdata('admin_email');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_id');
        redirect('/');

    }

    public function dashboard_login()
    {
        if($this->session->userdata('admin_email')){
            redirect('dashboard');
        }
        $data = array();
        $this->load->view('admin/pages/login');
    }

    public function dashboard_login_check()
    {
        $user_email    = $this->input->post('user_email');
        $user_password = $this->input->post('user_password');

        $this->form_validation->set_rules('user_email', 'Admin Email', 'trim|required|valid_email|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('user_password', 'Admin Password', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->dashboard_model->get_admin_info($user_email,$user_password);
            if ($result) {
                $this->session->set_userdata('admin_id', $result->user_id);
                $this->session->set_userdata('admin_name', $result->user_name);
                $this->session->set_userdata('admin_email', $result->user_email);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', 'Admin Login Fail');
                redirect('dashboard-login');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('dashboard-login');
        }
    }

    public function dashboard_change_pw()
    {
        if(!$this->session->userdata('admin_email')){
            redirect('dashboard-login');
        }
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/change_password', '', true);
        $this->load->view('admin/master', $data);
    }

    public function save_new_password()
    {
        $this->form_validation->set_rules('oldpassword', 'oldpassword', 'trim|required|min_length[3]|max_length[20]|htmlspecialchars|xss_clean',
		array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('Password', 'Password', 'trim|required|min_length[5]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[Password]|xss_clean');
	
		if ($this->form_validation->run())
		{
            $this->load->model('dashboard_model');
			$odpw=$this->input->post('oldpassword');
			$Password=$this->input->post('Password');
			$pwd_hash=password_hash($Password,PASSWORD_BCRYPT);
			if($this->dashboard_model->change_password($odpw,$pwd_hash))
			{
				$this->session->set_flashdata('message','successfully changed!!');
			    return redirect('dashboard-change-password');
			}
			else
			{
				$this->session->set_flashdata('message','Old password not match/Try again!!');
				return redirect('dashboard-change-password');
			}
			
		}
        else
		{
            $this->session->set_flashdata('message', validation_errors());
			return redirect('dashboard-change-password');
		}	
    }

    public function forgot_password()
    {
        $data = array();
        $this->load->view('admin/pages/user_forgot_password');
    }

    public function send_otp()
    {
		$this->form_validation->set_rules('user_email', 'user_email', 'trim|required|valid_email|htmlspecialchars|xss_clean',
		array('required' => 'You must provide a %s.'));
		
		if ($this->form_validation->run())
		{
			$otp = rand(100000,999999);
			$user_email=$this->input->post('user_email');
			if($this->dashboard_model->if_email_exist($user_email,$otp))
			{
				$this->session->set_flashdata('otp_success','OTP successfully sended/Check your mail !!');
			    return redirect('dashboard/set-new-password');
			}
			else
			{
				$this->session->set_flashdata('otp_failed','Email not exist or Email not verified !!');
				return redirect('dashboard/forgot-password');
			}
			
		}
		else
		{
            $this->session->set_flashdata('otp_failed', validation_errors());
			return redirect('dashboard/forgot-password');
		}	
    }

    public function set_new_password()
    {
        $data = array();
        $this->load->view('admin/pages/user_set_new_password');
    }

    public function set_new_pw()
    {
        $this->form_validation->set_rules('otp', 'otp', 'trim|required|min_length[3]|max_length[6]|numeric|htmlspecialchars|xss_clean',
		array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('Password', 'Password', 'trim|required|min_length[5]|max_length[20]|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[Password]|htmlspecialchars|xss_clean');

        if ($this->form_validation->run())
		{
            $this->load->model('dashboard_model');
			$otp=$this->input->post('otp');
			$Password=$this->input->post('Password');
			$pwd_hash=password_hash($Password,PASSWORD_BCRYPT);
			if($this->dashboard_model->update_password($otp,$pwd_hash))
			{
				$this->session->set_flashdata('update_success','successfully Updated/ Login to your Ac!!');
			    return redirect('dashboard-login');
			}
			else
			{
				$this->session->set_flashdata('update_failed','Otp not match or Otp expired!!');
				return redirect('dashboard/set-new-password');
			}
			
		}
        else
		{
            $this->session->set_flashdata('update_failed', validation_errors());
			return redirect('dashboard/set-new-password');
		}	
    }

    public function customers()
    {
        $data                          = array();
        $data['customers_info'] = $this->dashboard_model->customers_info();
        $data['maincontent']           = $this->load->view('admin/pages/customers', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function manage_comments()
    {
        if(!$this->session->userdata('admin_email')){
            redirect('dashboard-login');
        }
        $data                          = array();
        $data['get_all_comments']      = $this->dashboard_model->get_all_comments();
        $data['read_unread_cmt_info']      = $this->dashboard_model->read_unread_cmt_info();
        $data['maincontent']           = $this->load->view('admin/pages/manage_comments', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function published_cmt($id)
    {
        if(!$this->session->userdata('admin_email')){
            redirect('dashboard-login');
        }
        $result = $this->dashboard_model->published_cmt_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published Comment Sucessfully');
            redirect('manage-comments');
        } else {
            $this->session->set_flashdata('message', 'Published Comment  Failed');
            redirect('manage-comments');
        }
    }
    public function unpublished_cmt($id)
    {
        if(!$this->session->userdata('admin_email')){
            redirect('dashboard-login');
        }
        $this->load->model('dashboard_model');
        $result = $this->dashboard_model->unpublished_cmt_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished Comment Sucessfully');
            redirect('manage-comments');
        } else {
            $this->session->set_flashdata('message', 'UnPublished Comment  Failed');
            redirect('manage-comments');
        }
    }

    public function delete_cmt($id)
    {
        if(!$this->session->userdata('admin_email')){
            redirect('dashboard-login');
        }
        $result = $this->dashboard_model->delete_cmt_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Comment Deleted Sucessfully');
            redirect('manage-comments');
        } else {
            $this->session->set_flashdata('message', 'Comment Deleted Failed');
            redirect('manage-comments');
        }
    }
    
    public function email_config()
    {
        if(!$this->session->userdata('admin_email')){
            redirect('dashboard-login');
        }
        $data                          = array();
        $data['EmailSetup'] = $this->identity_model->get_email_setup();
        $data['maincontent']           = $this->load->view('admin/pages/email_config', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_config()
    {
        if(!$this->session->userdata('admin_email')){
            redirect('dashboard-login');
        }
        $data  = $this->input->post();
        $this->load->model('dashboard_model');
        $this->form_validation->set_rules('email_from', 'Email from', 'trim|required');
        $this->form_validation->set_rules('email_to', 'Email To', 'trim|required');
        $this->form_validation->set_rules('protocol', 'Protocol', 'trim|required');
        $this->form_validation->set_rules('smtp_host', 'Smtp host', 'trim|required');
        $this->form_validation->set_rules('smtp_port', 'Smtp Port', 'trim|required');
        $this->form_validation->set_rules('smtp_user', 'Smtp User', 'trim|required');
        $this->form_validation->set_rules('smtp_pass', 'Smtp Password', 'trim|required');
        $this->form_validation->set_rules('mailtype', 'mailtype', 'trim|required');
        $this->form_validation->set_rules('wordwrap', 'wordwrap', 'trim|required');
        $this->form_validation->set_rules('wordwrap', 'wordwrap', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->dashboard_model->update_config($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Config Update Sucessfully');
                redirect('email-config');
            } else {
                $this->session->set_flashdata('message', 'Config Update Failed');
                redirect('email-config');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('email-config');
        }
    }
    
    
    
    public function contact_enquiry()
    {
        $data                          = array();
        $this->dashboard_model->read_unread_contact_info();
        $data['contact_enquiry'] = $this->dashboard_model->contact_enquiry();
        $data['maincontent']           = $this->load->view('admin/pages/contact_enquiry', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function delete_users($id)
    {
        $this->db->where('customer_id', $id);
        $this->db->delete('tbl_customer');
        $this->session->set_flashdata('message','Deleted successfully');
        return redirect('customers');
    }
    
    public function delete_ienquiry($id)
    {
        $this->db->where('enquiry_id', $id);
        $this->db->delete('tbl_islam_enquiry');
        $this->session->set_flashdata('message','Deleted successfully');
        return redirect('iastro-enquiry');
    }
    
    public function delete_services($id)
    {
        $this->db->where('sevice_id', $id);
        $this->db->delete('tbl_services');
        $this->session->set_flashdata('message','Deleted successfully');
        return redirect('services-enquiry');
    }
    
    public function delete_bmagic($id)
    {
        $this->db->where('enquiry_id', $id);
        $this->db->delete('tbl_enquiry');
        $this->session->set_flashdata('message','Deleted successfully');
        return redirect('bmagic-enquiry');
    }
    
    public function delete_entry($id)
    {
        $this->db->where('contact_id', $id);
        $this->db->delete('tbl_contact');
        $this->session->set_flashdata('message','Deleted successfully');
        return redirect('contact-enquiry');
    }
    

    public function add_footer_menu()
    {
        
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/add_footer_menu', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function manage_footer_menu()
    {
        $data                = array();
        $data['all_menu']   = $this->menu_model->getall_footer_menu_info();
        $data['maincontent'] = $this->load->view('admin/pages/manage_footer_menu', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_footer_menu()
    {
        $data                       = array();
        $data['menu_title']         = $this->input->post('menu_title');
        $data['custom_menu_link']  = $this->input->post('custom_menu_link');

        $this->form_validation->set_rules('menu_title', 'Menu Title', 'trim|required');
        $this->form_validation->set_rules('custom_menu_link', 'Menu custom link', 'trim');

        if ($this->form_validation->run() == true) {
            $result = $this->menu_model->save_footer_menu_info($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Footer Link Inseted Sucessfully');
                redirect('manage-footer-menu');
            } else {
                $this->session->set_flashdata('message', 'Footer Link Inserted Failed');
                redirect('manage-footer-menu');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add-footer-menu');
        }


    }

    public function delete_footer_menu($id)
    {
        $result = $this->menu_model->delete_footer_menu_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Footer Link Deleted Sucessfully');
            redirect('manage-footer-menu');
        } else {
            $this->session->set_flashdata('message', 'Footer Link Deleted Failed');
            redirect('manage-footer-menu');
        }
    }

    public function edit_footer_menu($id)
    {
        $data                     = array();
        $data['menu_footer_info_by_id'] = $this->menu_model->edit_footer_menu_info($id);
        $data['maincontent']      = $this->load->view('admin/pages/edit_footer_menu', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_footer_menu($id)
    {
        $data                       = array();
        $data['menu_title']         = $this->input->post('menu_title');
        $data['custom_menu_link']  = $this->input->post('custom_menu_link');

        $this->form_validation->set_rules('menu_title', 'Menu Title', 'trim|required');
        $this->form_validation->set_rules('custom_menu_link', 'Menu custom link', 'trim');

        if ($this->form_validation->run() == true) {
            $result = $this->menu_model->update_footer_menu_info($data, $id);
            if ($result) {
                $this->session->set_flashdata('message', 'Footer Link Update Sucessfully');
                redirect('manage-footer-menu');
            } else {
                $this->session->set_flashdata('message', 'Footer Link Failed');
                redirect('manage-footer-menu');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add-footer-menu');
        }
    }

    public function manage_pages()
    {
        $data                = array();
        $data['all_pages']   = $this->dashboard_model->get_all_pages_info();
        $data['maincontent'] = $this->load->view('admin/pages/manage_pages', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function edit_page($id)
    {
        $data                     = array();
        $data['page_info_by_id'] = $this->dashboard_model->page_info($id);
        $data['maincontent']      = $this->load->view('admin/pages/edit_page', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_page($id)
    {
        $data                       = array();
        $data['page_title']         = $this->input->post('page_title');
        $data['page_data']  = $this->input->post('page_data');

        $this->form_validation->set_rules('page_title', 'Page Title', 'trim|required');
        $this->form_validation->set_rules('page_data', 'Page Data', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->dashboard_model->update_page_info($data, $id);
            if ($result) {
                $this->session->set_flashdata('message', 'Page Update Sucessfully');
                redirect('manage-pages');
            } else {
                $this->session->set_flashdata('message', 'Page Failed');
                redirect('edit/page/'.$id);
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('edit/page/'.$id);
        }
    }

}
