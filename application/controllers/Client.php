<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
    }

    public function index()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/add_client', '', true);
        $this->load->view('admin/master', $data);
    }

    public function save_client()
    {

        $data['client_link']               = $this->input->post('client_link');

        $this->form_validation->set_rules('client_link', 'client_link', 'trim|required');
        $site_logo = $this->input->post('image');

        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 2000;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('client');
            } else {
                $post_image            = $this->upload->data();
                $data['image'] = $post_image['file_name'];
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->client_model->save_clients($data);

            if ($result) {
                $this->session->set_flashdata('message', 'client Updated Sucessfully');
                redirect('manage/client');
            } else {
                $this->session->set_flashdata('message', 'client Updated Failed');
                redirect('add/client');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/client');
        }
    }

    public function manage_client()
    {
        $data                = array();
        $data['all_clients']  = $this->client_model->getall_client_info();
        $data['maincontent'] = $this->load->view('admin/pages/manage_client', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function edit_client($id)
    {
        $data                      = array();
        $data['client_info_by_id'] = $this->client_model->edit_client_info($id);
        $data['maincontent']       = $this->load->view('admin/pages/edit_client', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_client($id)
    {
        
        $data['client_link']               = $this->input->post('client_link');

        $this->form_validation->set_rules('client_link', 'client_link', 'trim|required');
        $delete_client               = $this->input->post('delete_image');

        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

             if (!$this->upload->do_upload('image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/post');
            } else {
                $post_image            = $this->upload->data();
                $data['image'] = $post_image['file_name'];
                unlink($delete_image);
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->client_model->update_client_info($data, $id);

            if ($result) {
                $this->session->set_flashdata('message', 'client Updated Sucessfully');
                redirect('manage/client');
            } else {
                $this->session->set_flashdata('message', 'client Updated Failed');
                redirect('manage/client');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('edit/client/'.$id);
        }

    }

    public function delete_client($id)
    {
        $delete_client = $this->get_client_by_id($id);
        unlink('uploads/' . $delete_client->client);
        $result = $this->client_model->delete_client_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'client Deleted Sucessfully');
            redirect('manage/client');
        } else {
            $this->session->set_flashdata('message', 'client Deleted Failed');
            redirect('edit/client/'.$id);
        }
    }

    private function get_client_by_id($id)
    {
        $this->db->select('image');
        $this->db->from('client_table');
        $this->db->where('client_id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function get_user()
    {

        $email = $this->session->userdata('admin_email');
        $name  = $this->session->userdata('admin_name');
        $id    = $this->session->userdata('admin_id');

        if (!$email) {
            redirect('dashboard-login');
        }

    }

}
