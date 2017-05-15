<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->library('pagination');
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
        $this->data['albums'] = $this->Common_model->get_albums();
        $this->load->library('form_validation');
        $type = "News";
        if (strpos($_SERVER['HTTP_REFERER'], 'auth_admin') || strpos($_SERVER['HTTP_REFERER'], 'home') || $this->uri->segment(3) != "") {
            $type = "Notice";
        }
        if ($this->input->post('page_type')) {
            $type = $this->input->post('page_type');
        }

        if ($this->input->post('notice_id')) {
            $result = $this->Common_model->delete_where('notices', array('id' => $this->input->post('notice_id')));
            if ($result) {
                $this->data['message'] = "Notice deleted successfully !";
                $this->data['message_type'] = true;
            } else {
                $this->data['message'] = "Try again later...";
                $this->data['message_type'] = false;
            }
        }
        // Notice Table Data
        $config = array();
        $config["base_url"] = base_url() . "user/home";
        $config["per_page"] = 5;
        $config['use_page_numbers'] = FALSE;

        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '&nbsp;<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $search_location = "";
        $search_amount = "";
        $search_key = "";
        if ($this->input->post()) {
            $this->data['search_location'] = $search_location = $this->input->post('search_location');
            $this->data['search_amount'] = $search_amount = $this->input->post('search_amount');
            $this->data['search_key'] = $search_key = $this->input->post('search_key');
        }
        $total_row = $this->Common_model->fetch_notices('', '');
        $config["total_rows"] = $total_row['counts'];
        $config['num_links'] = $total_row['counts'];
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data["results"] = $this->Common_model->fetch_notices($config["per_page"], $page);

        $this->pagination->initialize($config);
        $str_links = $this->pagination->create_links();
        $this->data["links"] = explode('&nbsp;', $str_links);

        if ($this->input->post('add_notice') == 'add_notice') {
            $this->form_validation->set_rules('notice_email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('notice_subject', 'Subject', 'required');
            $this->form_validation->set_rules('notice_expiry_date', 'Expiry Date', 'required');
            $this->form_validation->set_rules('notice_description', 'Brief Description', 'required');
            $noticedata = array(
                "user_id" => $this->user_id,
                "type" => $this->input->post('notice_type'),
                "from_email" => $this->input->post('notice_email'),
                "subject" => $this->input->post('notice_subject'),
                "expiry_date" => $this->input->post('notice_expiry_date'),
                "description" => $this->input->post('notice_description'),
                "recepients" => $this->input->post('recepients'),
                "detailed_description" => $this->input->post('final_detailed_descrption'));
            if ($this->form_validation->run() == true) {
                if ($this->input->post('edit_id')) {
                    $result = $this->Common_model->select_update('notices', $noticedata, array('id' => $this->input->post('edit_id')));
                } else {
                    $result = $this->Common_model->insert('notices', $noticedata);
                }
                if ($result) {
                    $this->data['message'] = "Information saved successfully";
                    $this->data['message_type'] = true;
                } else {
                    $this->data['message'] = "Try again later...";
                    $this->data['message_type'] = false;
                }
            } else {
                $this->data['noticedata'] = $noticedata;
                $this->data['message'] = validation_errors('<p class="error_msg">', '</p>');
                $this->data['message_type'] = false;
            }
        } else if ($this->input->post('add_album') == 'add_album') {
            $this->form_validation->set_rules('album_name', 'Album Name', 'required');
            //$this->form_validation->set_rules('userFiles', 'Images', 'required');
            if ($this->form_validation->run() == true) {
                $album_id = $this->Common_model->inserted_id('albums', array('user_id' => $this->user_id, 'album_name' => $this->input->post('album_name')));
                if (!empty($_FILES['userFiles']['name'])) {
                    $filesCount = count($_FILES['userFiles']['name']);
                    for ($i = 0; $i < $filesCount; $i++) {
                        $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                        $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                        $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                        $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                        $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                        $uploadPath = 'include_files/albums';
                        $config['upload_path'] = $uploadPath;
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['encrypt_name'] = TRUE;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('userFile')) {
                            $fileData = $this->upload->data();
                            $uploadData[$i]['album_id'] = $album_id;
                            $uploadData[$i]['image'] = $fileData['file_name'];
                        }
                    }
                    if (!empty($uploadData)) {
                        $insert = $this->db->insert_batch('album_images', $uploadData);
                    }
                    $statusMsg = ($album_id || $edit_business_id || $insert) ? 'Album has been saved succesfully !' : 'Some problem occurred, please try again.';
                    $this->data['message'] = $statusMsg;
                    $this->data['message_type'] = ($business_id || $edit_business_id || $insert) ? true : false;
                }
            } else {
                $this->data['albumdata'] = array('album_name' => $this->input->post('album_name'));
                $this->data['message'] = validation_errors('<p class="error_msg">', '</p>');
                $this->data['message_type'] = false;
            }
        }
        $this->data['type'] = $type;
        $this->data = $this->include_files();
        $this->load->view('user/home', $this->data);
    }

    function myflats() {
        $this->data = $this->include_files();
        $this->load->view('user/myflats', $this->data);
    }

    function get_album_images() {
        $album_id = $this->input->post('album_id');
        $images = $this->Common_model->select_where('album_images', array('album_id' => $album_id));
        $data = "";
        foreach ($images as $image) {
            $image_name = ($image->image != "" && (file_exists(FCPATH . 'include_files/albums/' . $image->image))) ? $image->image : 'noimage.jpg';
            
            $data .= '<div class="col-md-3">';
            $data .= '<img src="'.base_url().'include_files/albums/'.$image_name.'" alt="" class="img-responsive" />';
            $data .= '</div>';
        }
        die(json_encode($data));
    }

}
