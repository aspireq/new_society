<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->auth = new stdClass;

        $this->load->library('flexi_auth');
        if ($this->flexi_auth->is_logged_in_via_password() && uri_string() != 'auth/logout') {
            if ($this->session->flashdata('message')) {
                $this->session->keep_flashdata('message');
            }
        }
        $this->data = null;
        if ($this->flexi_auth->is_logged_in()) {
            $this->data['userinfo'] = $this->userinfo = $this->flexi_auth->get_user_by_identity_row_array();
            $this->user_id = $this->data['userinfo']['uacc_id'];
        }
    }

    function index() {
        $this->home();
    }

    function register() {
        if ($this->input->is_ajax_request()) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->register_account();
            die(json_encode(array('message' => $this->session->flashdata('message'), 'login_status' => $this->session->flashdata('inserted_user_id'))));
        }
    }

    function login_via_ajax() {
        if ($this->input->is_ajax_request()) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->login_via_ajax();
            die(json_encode(array('message' => $this->flexi_auth->get_messages(), 'login_status' => $this->flexi_auth->is_logged_in())));
        }
    }

    function logout() {
        $this->flexi_auth->logout(TRUE);
        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
        redirect('home');
    }

    public function include_files() {
        $this->data['header'] = $this->load->view('visitor/header', $this->data, TRUE);
        $this->data['footer'] = $this->load->view('visitor/footer', $this->data, TRUE);
        return $this->data;
    }

    public function home() {
        $states_obj = (array) $this->Common_model->select_where('states', array('country_id' => 101));
        $states_arr = array_map(function($o) {
            return $o->id;
        }, $states_obj);
        $this->data['cities'] = $this->Common_model->get_cities($states_arr);
        $this->data = $this->include_files();
        $this->load->view('visitor/home', $this->data);
    }

    public function whyus() {
        $this->data = $this->include_files();
        $this->load->view('visitor/whyus', $this->data);
    }

    public function price() {
        $this->data = $this->include_files();
        $this->load->view('visitor/price', $this->data);
    }

    public function buzzar() {
        $this->data = $this->include_files();
        $this->load->view('visitor/buzzar', $this->data);
    }

    public function career() {
        $this->data = $this->include_files();
        $this->load->view('visitor/career', $this->data);
    }

    public function blog() {
        $this->data = $this->include_files();
        $this->load->view('visitor/blog', $this->data);
    }

    public function contact() {
        $this->data = $this->include_files();
        $this->load->view('visitor/contact', $this->data);
    }

}
