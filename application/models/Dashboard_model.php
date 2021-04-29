<?php

class Dashboard_Model extends CI_Model
{
    public function get_admin_info($user_email,$user_password)
    {
        
        $q=$this->db->where(['user_email'=>$user_email])
                 ->get('admin_table');
                
             if($q->num_rows())     
             {
               
               $hash=$q->row()->user_password;
               if(password_verify($user_password, $hash))
               {
                  
                  return $q->row();
                 
               }
                
             }   
             else
             {
                 return false;
             }
    }

    public function if_email_exist($user_email,$otp)
    {
        $q=$this->db->select()
            ->from('admin_table')
            ->where(['user_email'=>$user_email])
            ->get();
            $user_email= $q->row()->user_email;
      if($q->num_rows())
      {
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
             $this->email->to($user_email);  
             $this->email->subject("Forgot password AstroStarMagik");
             $this->email->message('<h3>Dear,</h3><br>'.'User'.'<br>Your OTP for forgot Password: '.$otp.'<br>Click <a style="color: red" href="http://astrostarmagik.com/set-new-password">here</a> to set password<br><h3>Thanks & Regards,<br>Moderation Team</h3>');
             $this->email->send();
             $this->db->set(['email_verification_code'=>$otp])
                  ->where('user_email',$user_email)
                  ->update('admin_table');
        return true;
      }
      else
      {
        return false;
      }
    }

    public function update_password($otp,$pwd_hash)
    {
      $q=$this->db->where('email_verification_code',$otp)
                 ->get('admin_table');
                
             if($q->num_rows())     
             {
                  $this->db->set('user_password',$pwd_hash)
                           ->where('email_verification_code',$otp)
                           ->update('admin_table');
                  return true;
             }   
             else
             {
                 return false;
             }
    }


    public function change_password($odpw,$pwd_hash)
    {
      $id= $this->session->userdata('admin_id');
      $q=$this->db->where(['user_id'=>$id])
                 ->get('admin_table');
                
             if($q->num_rows())     
             {
               $hash=$q->row()->user_password;
               if(password_verify($odpw, $hash))
               {
                  $this->db->set('user_password',$pwd_hash)
                           ->where('user_id',$id)
                           ->update('admin_table');
                  return true;
                 
               }
                
             }   
             else
             {
                 return false;
             }
    }

    public function update_config($data)
    {
        $this->db->where('ID', 1);
        return $this->db->update('email_setup_table', $data);
    }

    public function get_all_comments()
    {
      $q=$this->db->select()
            ->from('cmt_table')
            ->get();
           return $q->result();
    }
    


    public function read_unread_cmt_info()
    {
        $this->db->set('read_unread', 1);
        $this->db->where('read_unread', 0);
        return $this->db->update('cmt_table');
    }
    
    public function read_unread_contact_info()
    {
        $this->db->set('read_unread', 1);
        $this->db->where('read_unread', 0);
        return $this->db->update('contact_table');
    }


    public function published_cmt_info($id)
    {
        $this->db->set('cmt_approved', 1);
        $this->db->where('cmt_id', $id);
        return $this->db->update('cmt_table');
    }

    public function unpublished_cmt_info($id)
    {
        $this->db->set('cmt_approved', 0);
        $this->db->where('cmt_id', $id);
        return $this->db->update('cmt_table');
    }

    public function delete_cmt_info($id)
    {
        $this->db->where('cmt_id', $id);
        return $this->db->delete('cmt_table');
    }

    public function get_total_user()
    {
      $q=$this->db->select()
            ->from('tbl_customer')
            ->get();
           return $q->num_rows();
    }

    public function get_total_order()
    {
      $q=$this->db->select()
            ->from('tbl_order_details')
            ->get();
           return $q->num_rows();
    }
    public function get_total_iastro_enquiry()
    {
      $q=$this->db->select()
            ->from('tbl_islam_enquiry')
            ->get();
           return $q->num_rows();
    }
    public function get_total_services_enquiry()
    {
      $q=$this->db->select()
            ->from('tbl_services')
            ->get();
           return $q->num_rows();
    }
    public function get_total_problem_enquiry()
    {
      $q=$this->db->select()
            ->from('tbl_enquiry')
            ->get();
           return $q->num_rows();
    }
    public function get_total_contact_enquiry()
    {
      $q=$this->db->select()
            ->from('contact_table')
            ->get();
           return $q->num_rows();
    }
    

    public function customers_info()
    {
      $q=$this->db->select()
            ->from('tbl_customer')
            ->get();
           return $q->result();
    }


    
    public function contact_enquiry()
    {
      $q=$this->db->select()
            ->from('contact_table')
            ->get();
           return $q->result();
    }
    
}
