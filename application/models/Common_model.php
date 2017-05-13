<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends CI_Model {

    public function &__get($key) {
        $CI = & get_instance();
        return $CI->$key;
    }

    function select_all($tbl) {
        $data = $this->db->get($tbl);
        return $data->result();
    }

    function select_where($table, $id) {
        $qry = $this->db->get_where($table, $id);
        $respond = $qry->result();
        return $respond;
    }

    function select_where_row($table, $id) {
        $qry = $this->db->get_where($table, $id);
        return $qry->row();
    }

    function select_update($table, $data, $id) {
        $query = $this->db->update($table, $data, $id);
        return $query;
    }

    function insert($table, $data) {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    function delete_where($tbl, $where) {
        $query = $this->db->delete($tbl, $where);
        return $query;
    }

    function inserted_id($table, $data) {
        $insert_id = $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function get_cities($states) {
        $this->db->select();
        $this->db->from('cities');
        $this->db->where_in('state_id', $states);
        $qry = $this->db->get();
        return $qry->result();
    }

    function register_account($username, $email, $password, $key) {

        // $this->load->library('form_validation');
        // $validation_rules = array(
        // array('field' => 'email'.[$key].'', 'label' => 'Email Address', 'rules' => 'required|valid_email'),
        //array('field' => 'register_username', 'label' => 'Username', 'rules' => 'required|min_length[4]|identity_available'),
        //array('field' => 'passwordmain', 'label' => 'Password', 'rules' => 'required|validate_password'),
        //array('field' => 'inputPasswordConfirm', 'label' => 'Confirm Password', 'rules' => 'required|matches[passwordmain]'),
        //  );
        // $this->form_validation->set_rules($validation_rules);
        //if ($this->form_validation->run()) {

        $user_type = 3;
        //$email = $this->input->post('register_email_address');
        //$username = $this->input->post('register_username');
        //$password = $this->input->post('passwordmain');
//            $profile_data = array(
//                'uadd_address_01' => $this->input->post('address'),
//                'uadd_post_code' => $this->input->post('pincode'),
//                'uadd_city' => $this->input->post('city'),
//                'user_type' => $this->input->post('user_type')
//            ); 
        $instant_activate = $this->input->post('send_invites');
        $response = $this->flexi_auth->insert_user($email, $username, $password, $profile_data, $user_type, $instant_activate);

        if ($response) {
            //$appartment_id = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            // $this->db->update("user_accounts", array('appartment_id' => $appartment_id), array('uacc_id' => $response));
            if ($instant_activate == true) {
                $email_data = array('identity' => $email, 'username' => $username);
                $this->flexi_auth->send_email($email, 'Welcome', 'registration_welcome.tpl.php', $email_data);
            }

            $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
            $this->session->set_flashdata('inserted_user_id', true);
            return true;
        }
        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
        $this->data['message'] = validation_errors('<p class="error_msg">', '</p>');
        $this->session->set_flashdata('message', validation_errors());
        $this->session->set_flashdata('inserted_user_id', false);
        return FALSE;
    }

    function fetch_notices($limit = null, $start = null) {
        if ($limit != null || $start != null) {
            $this->db->limit($limit, $start);
        }
        $this->db->where('notices.status', 1);
        $query = $this->db->get('notices');
        if ($query->num_rows() > 0) {
            $final_data = array();
            foreach ($query->result() as $key => $row) {
                $data[] = $row;
                $final_data[$key] = $row;
            }
            $final_data['counts'] = $query->num_rows();
            return $final_data;
        }
        return false;
    }

}
