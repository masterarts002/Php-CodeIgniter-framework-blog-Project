<?php

class Layout_Model extends CI_Model
{

    public function get_main_menu()
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->order_by('position','ASC');
        $this->db->where('parent_id', 0);
        $query = $this->db->get();
        $res = $query->result();
        if ($res){
            return $res;
        }
        else{
            return false;
        }
    }

    
    public function num_rows()
    {
        $q=$this->db->select()
            ->from('post_table')
            ->get();
           return $q->num_rows();

    }

    public function get_single_product($product_slug)
    {
        $this->db->select('*');
        $this->db->from('post_table');
        $this->db->join('tbl_category', 'tbl_category.id=post_table.product_category');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=post_table.product_brand');
        $this->db->where('post_table.product_slug', $product_slug);
        $info = $this->db->get();
        return $info->row();
    }





    public function get_all_post_by_categories($limit,$category_slug,$offset)
    {
        $this->db->select('*');
        $this->db->from('post_table');
        $this->db->join('admin_table', 'admin_table.user_id=post_table.post_author');
        $this->db->order_by('post_table.post_id', 'DESC');
        $this->db->limit($limit,$offset);
        $this->db->where('post_table.publication_status', 1);
        $this->db->where('post_table.post_category', $category_slug);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_single_post($id)
    {
        $this->db->select();
        $this->db->from('post_table');
        $this->db->where('post_table.publication_status', 1);
        $this->db->where('post_table.post_slug', $id);
        $this->db->join('admin_table', 'admin_table.user_id=post_table.post_author');
        $info = $this->db->get();
        return $info->row();
    }

    public function counter($post_id,$ip)
    {
        $quary = $this->db->select('*')
        ->from('post_views')
        ->where(['post_id'=>$post_id,'ip'=>$ip])
        ->get();
        
        if(!$quary->num_rows())     
        {
            $now = time();
            $this->db->insert('post_views',array('post_id'=>$post_id,'ip'=>$ip,'time'=>$now));
            $this->db->set('post_view','`post_view`+1',FALSE)
                    ->where('post_slug',$post_id)
                    ->update('post_table');
        }
        elseif($quary->num_rows()){
            $interval= now() - $quary->row()->time;
        }
        elseif($interval >400){
            $now = time();
            $this->db->set('time',$now)
                 ->where('post_id',$post_id)
                 ->update('post_views');
            $this->db->set('post_view','`post_view`+1',FALSE)
                     ->where('post_id',$post_id)
                     ->update('post_table');
        }
           
    }
    
    public function get_comments($id)
    {
        $this->db->select();
        $this->db->from('cmt_table');
        $this->db->where('cmt_approved', 1);
        $this->db->where('cmt_post_id', $id);
        $this->db->order_by('cmt_on', 'DESC');
        $info = $this->db->get();
        return $info->result();
    }

    public function get_total_comments($id)
    {
        $this->db->select();
        $this->db->from('cmt_table');
        $this->db->where('cmt_post_id', $id);
        $info = $this->db->get();
        return $info->num_rows();
    }

    public function save_customer_info($data)
    {
        $this->db->insert('tbl_customer', $data);
        return $this->db->insert_id();
    }

    
    public function get_customer_info($customer_email,$customer_password)
    {
        
        $q=$this->db->where(['customer_email'=>$customer_email])
                 ->get('tbl_customer');
                
             if($q->num_rows())     
             {
               
               $hash=$q->row()->customer_password;
               if(password_verify($customer_password, $hash))
               {
                  
                  return $q->row();
                 
               }
                
             }   
             else
             {
                 return false;
             }
    }

    // VERIFY EMAIL
    public function verifyEmailAddress($otp,$profile_id)
    {
        $q=$this->db->select()
            ->from('tbl_customer')
            ->where(['customer_id'=>$profile_id,'email_verification_code'=>$otp])
            ->get();
           return $q->num_rows();
    }

    public function if_email_exist($customer_email,$otp)
    {
        $q=$this->db->select()
            ->from('tbl_customer')
            ->where(['customer_email'=>$customer_email,'customer_email_cnf'=>'1'])
            ->get();
            $customer_email= $q->row()->customer_email;
      if($q->num_rows())
      {
             $config = Array(
                 'protocol' => 'smtp',
                 'smtp_host' => 'smtp.hosting.in',
                 'smtp_port' => 587,
                 'smtp_user' => 'admin@example.com',
                 'smtp_pass' => '*****',
                 'mailtype' => 'html',
                 'charset' => 'iso-8859-1',
                 'wordwrap' => TRUE
              );
             $this->load->library('email', $config);
             $this->email->set_newline("\r\n");
             $this->email->from('noreply@example.com', "Astro Moderation Team");
             $this->email->to($customer_email);  
             $this->email->subject("Forgot password MasterArts");
             $this->email->message('<h3>Dear,</h3><br>'.'User'.'<br>Your OTP for forgot Password: '.$otp.'<br>Click <a style="color: red" href="http://astrostarmagik.com/set-new-password">here</a> to set password<br><h3>Thanks & Regards,<br>Moderation Team</h3>');
             $this->email->send();
             $this->db->set(['email_verification_code'=>$otp])
                  ->where('customer_email',$customer_email)
                  ->update('tbl_customer');
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
                 ->get('tbl_customer');
                
             if($q->num_rows())     
             {
                  $this->db->set('customer_password',$pwd_hash)
                           ->where('email_verification_code',$otp)
                           ->update('tbl_customer');
                  return true;
             }   
             else
             {
                 return false;
             }
    }

    public function change_password($odpw,$pwd_hash)
    {
      $id= $this->session->userdata('id');
      $q=$this->db->where(['customer_id'=>$id])
                 ->get('tbl_customer');
                
             if($q->num_rows())     
             {
               $hash=$q->row()->customer_password;
               if(password_verify($odpw, $hash))
               {
                  $this->db->set('customer_password',$pwd_hash)
                           ->where('customer_id',$id)
                           ->update('tbl_customer');
                  return true;
                 
               }
                
             }   
             else
             {
                 return false;
             }
    }

    
    public function get_all_slider_post()
    {
        $this->db->select('*');
        $this->db->from('slider_table');
        $this->db->where('publication_status', 1);
        $info = $this->db->get();
        return $info->result();
    }

    public function getall_post()
    {
        $this->db->select('*');
        $this->db->from('post_table');
        $this->db->join('admin_table', 'admin_table.user_id=post_table.post_author');
        $this->db->where('post_table.publication_status', 1);
        $this->db->limit(4);
        $info = $this->db->get();
        return $info->result();
    }
    
    public function get_recent_post()
    {
        $this->db->select('*');
        $this->db->from('post_table');
        $this->db->join('admin_table', 'admin_table.user_id=post_table.post_author');
        $this->db->where('post_table.publication_status', 1);
        $this->db->limit(9);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_post($limit,$offset)
    {
        $this->db->select('*');
        $this->db->from('post_table');
        $this->db->join('admin_table', 'admin_table.user_id=post_table.post_author');
        $this->db->limit($limit,$offset);
        $this->db->where('post_table.publication_status', 1);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_search_product($search)
    {
        $this->db->select('*');
        $this->db->from('post_table');
        $this->db->join('tbl_category', 'tbl_category.id=post_table.product_category');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=post_table.product_brand');
        $this->db->order_by('post_table.product_id', 'DESC');
        $this->db->where('post_table.publication_status', 1);
        $this->db->like('post_table.product_title', $search, 'both');
        $this->db->or_like('post_table.product_short_description', $search, 'both');
        $this->db->or_like('post_table.product_long_description', $search, 'both');
        $this->db->or_like('tbl_category.category_name', $search, 'both');
        $this->db->or_like('tbl_brand.brand_name', $search, 'both');
        $info = $this->db->get();
        return $info->result();
    }


    public function cmt_submit($data)
    {
        $this->db->insert('cmt_table', $data);
        return $this->db->insert_id();
    }
    
    public function rep_submit($data)
    {
        $this->db->insert('rep_table', $data);
        return $this->db->insert_id();
    }

    public function contact_submit($data)
    {
        $this->db->insert('contact_table', $data);
        return $this->db->insert_id();
    }

    public function edit_profile_info($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_profile');
        $this->db->where('profile_slug', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function get_profile()
    {
        $this->db->select('*');
        $this->db->from('tbl_profile')->limit(6);
        $info = $this->db->get();
        return $info->result();
    }

    public function islam_enquiry_submit($data)
    {
        $this->db->insert('tbl_islam_enquiry', $data);
        return $this->db->insert_id();
    }

    public function kundali_matching_enquiry_submit($data)
    {
        $this->db->insert('tbl_kundali_matching', $data);
        return $this->db->insert_id();
    }

    public function kundali_making_enquiry_submit($data)
    {
        $this->db->insert('tbl_kundali_making', $data);
        return $this->db->insert_id();
    }

    public function services_submit($data)
    {
        $this->db->insert('tbl_services', $data);
        return $this->db->insert_id();
    }

    


}
