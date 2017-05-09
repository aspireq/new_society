<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Admin_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->auth = new stdClass;
        $this->load->library('flexi_auth');
        $this->data = null;
        if (!$this->flexi_auth->is_logged_in_via_password() || !$this->flexi_auth->get_user_group_id()) {
            $this->flexi_auth->set_error_message('You must login as an admin to access this area.', TRUE);
            $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
            redirect('home');
        }
        $this->data['userinfo'] = $this->userinfo = $this->flexi_auth->get_user_by_identity_row_array();
        $this->user_id = $this->data['userinfo']['uacc_id'];
    }

    function index() {
        $this->home();
    }

    function include_files() {
        $this->data['header'] = $this->load->view('user/header', $this->data, TRUE);
        $this->data['top_menu'] = $this->load->view('user/top_menu', NULL, TRUE);
        $this->data['common'] = $this->load->view('user/common', NULL, TRUE);
        $this->data['footer'] = $this->load->view('user/footer', NULL, TRUE);
        return $this->data;
    }

    function home() {
        $this->data = $this->include_files();
        $this->load->view('user/home', $this->data);
    }

    function myflats() {
        $this->data = $this->include_files();
        $this->load->view('user/myflats', $this->data);
    }

}
