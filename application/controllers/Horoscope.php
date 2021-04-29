<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Horoscope extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
        $this->load->model('horoscope_model');
    }

    public function edit_horoscope()
    {
        $zodiac = $this->uri->segment(3);
        $data                           = array();
        $data['get_all_horoscope'] = $this->horoscope_model->get_all_horoscope_by_zodiac($zodiac);
        $data['maincontent']            = $this->load->view('admin/pages/edit_horoscope', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function manage_horoscope()
    {
        $data                    = array();
        $data['get_all_horoscope'] = $this->horoscope_model->get_all_horoscope();
        $data['maincontent']     = $this->load->view('admin/pages/manage_horoscope', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_horoscope()
    {
        $zodiac = $this->uri->segment(3);
        $data                              = array();
        $data['horoscope_today']    = $this->input->post('horoscope_today');
        $data['horoscope_weekly']   = $this->input->post('horoscope_weekly');
        $data['horoscope_monthly']  = $this->input->post('horoscope_monthly');
        $data['horoscope_yearly']   = $this->input->post('horoscope_yearly');
        $data['last_update']        = time();

        $this->form_validation->set_rules('horoscope_today', 'horoscope today', 'trim|required');
        $this->form_validation->set_rules('horoscope_weekly', 'horoscope weekly', 'trim|required');
        $this->form_validation->set_rules('horoscope_monthly', 'horoscope monthly', 'trim|required');
        $this->form_validation->set_rules('horoscope_yearly', 'horoscope yearly', 'trim|required');

        if ($this->form_validation->run() == true) {

            $result = $this->horoscope_model->save_horoscope_info($data,$zodiac);

            if ($result) {
                $this->session->set_flashdata('message', 'Horoscope Updated Sucessfully');
                redirect('manage/horoscope');
            } else {
                $this->session->set_flashdata('message', 'Horoscope Inserted Failed');
                redirect('edit/horoscope/'.$zodiac);
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('edit/horoscope/'.$zodiac);
        }
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
