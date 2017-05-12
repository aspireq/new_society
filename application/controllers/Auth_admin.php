<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_admin extends CI_Controller {

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

//        if (!$this->flexi_auth->is_logged_in_via_password() || !$this->flexi_auth->is_admin()) {
//            $this->flexi_auth->set_error_message('You must login as an admin to access this area.', TRUE);
//            $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
//            redirect('auth');
//        }
        $this->data['userinfo'] = $this->userinfo = $this->flexi_auth->get_user_by_identity_row_array();
        $this->user_id = $this->data['userinfo']['uacc_id'];
        $this->appartment_id = $this->data['userinfo']['appartment_id'];
    }

    function include_files() {
        $this->data['header'] = $this->load->view('admin/header', $this->data, TRUE);
        $this->data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $this->data['common'] = $this->load->view('admin/common', NULL, TRUE);
        $this->data['footer'] = $this->load->view('admin/footer', NULL, TRUE);
        $this->data['top_menu'] = $this->load->view('admin/top_menu', NULL, TRUE);
        return $this->data;
    }

    function index() {
        $this->dashboard();
    }

    function dashboard() {
        //$this->data['dashboard_data'] = $this->Admin_model->dashboard_data();
        $this->data['message'] = $this->session->flashdata('message');
        $this->data = $this->include_files();
        $this->load->view('admin/home', $this->data);
    }

    function manage_users() {
        if ($this->input->post('submit') == 'add_users') {
            $this->load->model('demo_auth_model');
            $usernames = $this->input->post('username');
            $passwords = $this->input->post('password');
//          $blocks = $this->input->post('block');
//          $mobiles = $this->input->post('mobile');
//          $intercom = $this->input->post('intercom');
            $emails = $this->input->post('email');
            foreach ($usernames as $key => $user) {
                if ($usernames[$key] != "" && $passwords[$key] != "" && $emails[$key] != "") {
                    $this->Common_model->register_account($usernames[$key], $emails[$key], $passwords[$key], $key + 1);
                    $this->data['message'] = $this->session->flashdata('message');
                    $this->data['message_type'] = false;
                }
            }
        } else if ($this->input->post('add_permission') == 'add_permission') {
            foreach ($this->input->post('user_ids') as $key => $user) {
                $is_commitee_member = (isset($this->input->post('committee_member')[$key])) ? 1 : 0;
                $this->Common_model->select_update('user_accounts', array('designation' => $this->input->post('designation')[$key], 'is_commitee_member' => $is_commitee_member), array('uacc_id' => $user));

                // For Manage Users
                $manage_users = (isset($this->input->post('manage_users')[$key])) ? 1 : 0;
                $previleg_id = $this->Common_model->select_where_row('user_privileges', array('upriv_name' => 'Manage Users'));
                if ($manage_users == 1) {
                    $check_existings = $this->Common_model->select_where_row('user_privilege_users', array('upriv_users_uacc_fk' => $user, 'upriv_users_upriv_fk' => $previleg_id->upriv_id));
                    if (empty($check_existings)) {
                        $this->Common_model->insert('user_privilege_users', array('upriv_users_uacc_fk' => $user, 'upriv_users_upriv_fk' => $previleg_id->upriv_id));
                    }
                } else {
                    $this->Common_model->delete_where('user_privilege_users', array('upriv_users_uacc_fk' => $user, 'upriv_users_upriv_fk' => $previleg_id->upriv_id));
                }
            }
            $this->data['message'] = "permissions added successfully !";
            $this->data['message_type'] = true;
        }
        $this->data['users'] = $this->Admin_model->get_users($this->appartment_id, $this->user_id);
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->data = $this->include_files();
        $this->load->view('admin/manage_users', $this->data);
    }
    
    function profile_setup() {
        if ($this->input->post('add_images') == 'add_images') {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('code', 'Code', 'trim|required');
//            if (empty($_FILES['userFiles']['name'][0])) {
//                $this->form_validation->set_rules('images', 'Image', 'required');
//            }
            if ($this->form_validation->run() == true) {
                $old_images_post = $this->input->post('old_company_images');
                $old_images_table = $this->db->query("select image from appartment_images where user_id = '" . $this->user_id . "'")->result_array();
                $final_images = array_diff(array_column($old_images_table, 'image'), $old_images_post);
                foreach ($final_images as $row_image) {
                    if (file_exists(FCPATH . 'include_files/appartment_images/' . $row_image)) {
                        unlink(FCPATH . 'include_files/appartment_images/' . $row_image);
                        $this->Common_model->delete_where('appartment_images', array('user_id' => $this->user_id, 'image' => $row_image));
                    }
                }
                if (!empty($_FILES['userFiles']['name'][0])) {
                    $filesCount = count($_FILES['userFiles']['name']);
                    for ($i = 0; $i < $filesCount; $i++) {
                        $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                        $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                        $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                        $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                        $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                        $uploadPath = 'include_files/appartment_images';
                        $config['upload_path'] = $uploadPath;
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['encrypt_name'] = TRUE;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('userFile')) {
                            $this->data['message'] = $this->upload->display_errors();
                            $this->data['message_type'] = false;
                        } else {
                            $fileData = $this->upload->data();
                            $uploadData[$i]['image'] = $fileData['file_name'];
                            $uploadData[$i]['user_id'] = $this->user_id;
                        }
                    }
                    if (!empty($uploadData)) {
                        $this->db->insert_batch('appartment_images', $uploadData);
                        $this->data['message'] = "Images added succesfully !";
                        $this->data['message_type'] = true;
                    }
                }
            } else {
                $this->data['message'] = validation_errors('<p class="error_msg">', '</p>');
                $this->data['message_type'] = false;
            }
        } else if ($this->input->post('appartmentinfo') == 'appartmentinfo') {
            $appartment_info = array(
                'user_id' => $this->user_id,
                'appartment_id' => $this->userinfo['appartment_id'],
                'appartment_name' => $this->userinfo['apartmentname'],
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city_name'),
                'state' => $this->input->post('state_name'),
                'pincode' => $this->input->post('pincode'),
                'phone' => $this->input->post('phone'),
                'builder_url' => $this->input->post('builder_url'),
                'association_name' => $this->input->post('association_name'),
                'amenities' => $this->input->post('amenities')
            );
            $check_existing = $this->Common_model->select_where_row('appartment_info', array('user_id' => $this->user_id));
            if (!empty($check_existing)) {
                $this->Common_model->select_update('appartment_info', $appartment_info, array('user_id' => $this->user_id));
            } else {
                $this->Common_model->insert('appartment_info', $appartment_info);
            }
            $this->data['message'] = "Appartment information saved succesfully !";
            $this->data['message_type'] = true;
        } else if ($this->input->post('add_info') == 'add_info') {
            $check_existing = $this->Common_model->select_where_row('appartment_info', array('user_id' => $this->user_id));
            if (!empty($check_existing)) {
                $this->Common_model->select_update('appartment_info', array('info' => $this->input->post('txtEditor')), array('user_id' => $this->user_id));
            } else {
                $this->Common_model->insert('appartment_info', array('info' => $this->input->post('txtEditor'), 'user_id' => $this->user_id));
            }
            $this->data['message'] = "Appartment information saved succesfully !";
            $this->data['message_type'] = true;
        }
        $this->data['appartment_info'] = $this->Common_model->select_where_row('appartment_info', array('user_id' => $this->user_id));
        $this->data['appartment_images'] = $this->Common_model->select_where('appartment_images', array('user_id' => $this->user_id));
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->data = $this->include_files();
        $this->load->view('admin/profile_setup', $this->data);
    }

    public function file_check($str) {
        $allowed_mime_type_arr = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png');
        $mime = get_mime_by_extension($_FILES['image']['name']);
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
            if (in_array($mime, $allowed_mime_type_arr)) {
                return true;
            } else {
                $this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
                return false;
            }
        } else {
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }

    function add_categories($category_id = null) {
        if ($this->input->post()) {
            $error = "";
            $this->load->library('form_validation');
            $this->load->helper('file');
            $this->form_validation->set_rules('name', 'Category Name', 'required');
            //$this->form_validation->set_rules('description', 'Description', 'required');
            if ($this->input->post('old_image') == "") {
                $this->form_validation->set_rules('image', '', 'callback_file_check');
            }

            if ($this->form_validation->run() == true) {
                $categorydata = $this->data['donorsdata'] = array(
                    "name" => $this->input->post('name'),
                    "description" => $this->input->post('description'));

                if (!empty($_FILES['image']['name'])) {
                    $this->load->library('upload');
                    $config['upload_path'] = 'include_files/categories';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['overwrite'] = FALSE;
                    $config['encrypt_name'] = TRUE;
                    $config['max_filename'] = 25;
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('image')) {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', $error);
                    } else {
                        $file_info = $this->upload->data();
                        $categorydata['image'] = $file_info['file_name'];
                    }
                }

                if ($error == "") {
                    if ($this->input->post('edit_id')) {
                        if (isset($categorydata['image'])) {
                            if (file_exists(FCPATH . 'include_files/categories/' . $this->input->post('old_image'))) {
                                unlink(FCPATH . 'include_files/categories/' . $this->input->post('old_image'));
                            }
                            $categorydata['image'] = $file_info['file_name'];
                        } else {
                            $categorydata['image'] = $this->input->post('old_image');
                        }
                        $result = $this->Common_model->select_update('categories', $categorydata, array('id' => $this->input->post('edit_id')));
                    } else {
                        $result = $this->Common_model->insert('categories', $categorydata);
                    }
                    $this->session->set_flashdata('message', "Information saved successfully");
                    redirect('auth_admin/categories');
                } else {
                    $this->session->set_flashdata('message', $error);
                }
            } else {
                $this->data['category_info'] = array(
                    'name' => $this->input->post('name'),
                    'description' => $this->input->post('description')
                );
                $this->data['message'] = (validation_errors() != "") ? validation_errors('<p class="error_msg">', '</p>') : $this->upload->display_errors();
            }
        }
        if ($category_id != "") {
            $this->data['category_info'] = (array) $this->Common_model->select_where_row('categories', array('id' => $category_id));
        }
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->data = $this->include_files();
        $this->load->view('admin/add_categories', $this->data);
    }

    function add_subcategories($subcategory_id = null) {

        if ($this->input->post()) {
            $error = "";
            $this->load->library('form_validation');
            $this->load->helper('file');
            $this->form_validation->set_rules('name', 'Category Name', 'required');
            //$this->form_validation->set_rules('description', 'Description', 'required');

            if ($this->form_validation->run() == true) {
                $subcategorydata = array(
                    "name" => $this->input->post('name'),
                    "category_id" => $this->input->post('category_id'),
                    "description" => $this->input->post('description'));


                if ($this->input->post('edit_id')) {
                    $result = $this->Common_model->select_update('subcategories', $subcategorydata, array('id' => $this->input->post('edit_id')));
                } else {
                    $result = $this->Common_model->insert('subcategories', $subcategorydata);
                }
                if (!empty($result)) {
                    $this->session->set_flashdata('message', "Information saved successfully");
                    redirect('auth_admin/subcategories');
                } else {
                    $this->session->set_flashdata('message', "Something went wrong,Please try again later");
                }
            } else {
                $this->data['subcategory_info'] = array(
                    'name' => $this->input->post('name'),
                    'description' => $this->input->post('description')
                );
                $this->data['message'] = validation_errors('<p class="error_msg">', '</p>');
            }
        }
        if ($subcategory_id != "") {
            $this->data['subcategory_info'] = (array) $this->Common_model->select_where_row('subcategories', array('id' => $subcategory_id));
        }
        $this->data['categories'] = $this->Common_model->select_where('categories', array('status' => 1));
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->data = $this->include_files();
        $this->load->view('admin/add_subcategories', $this->data);
    }

    function logout() {
        $this->flexi_auth->logout(TRUE);
        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
        redirect('admin');
    }

    function get_user_account() {
        $data = $this->Admin_model->get_user_account();
        die($data);
    }

    function record_status() {
        $table_name = $this->input->post('table_name');
        $table_coloum_name = $this->input->post('table_coloum');
        $table_id = $this->input->post('id');
        $recordinfo = $this->Common_model->select_where_row($table_name, array($table_coloum_name => $table_id));
        if ($recordinfo->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $result = $this->Common_model->select_update($table_name, array('status' => $status), array($table_coloum_name => $table_id));
        echo json_encode($result);
        die();
    }

    function susped_user() {
        $recordinfo = $this->Common_model->select_where_row('user_accounts', array('uacc_id' => $this->input->post('user_id')));
        if ($recordinfo->uacc_suspend == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $result = $this->Common_model->select_update('user_accounts', array('uacc_suspend' => $status), array('uacc_id' => $this->input->post('user_id')));
        echo json_encode($result);
        die();
    }

    function get_item_info() {
        $table_name = $this->input->post('table_name');
        $table_coloum_name = $this->input->post('table_coloum');
        $table_id = $this->input->post('id');
        $result = $this->Common_model->select_where_row($table_name, array($table_coloum_name => $table_id));
        echo json_encode($result);
        die();
    }

    function delete_record() {
        $table_name = $this->input->post('table_name');
        $table_coloum_name = $this->input->post('table_coloum');
        $table_id = $this->input->post('id');
        if ($this->input->post('image_folder')) {
            $recordinfo = $this->Common_model->select_where_row($table_name, array($table_coloum_name => $table_id));
            if ($recordinfo->image != null && file_exists(FCPATH . 'includes/' . $this->input->post('image_folder') . '/' . $recordinfo->image)) {
                unlink(FCPATH . 'includes/' . $this->input->post('image_folder') . '/' . $recordinfo->image);
            }
        }
        $result = $this->Common_model->delete_where($table_name, array($table_coloum_name => $table_id));
        die($result);
    }

}
