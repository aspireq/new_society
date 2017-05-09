<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function &__get($key) {
        $CI = & get_instance();
        return $CI->$key;
    }

    function get_user_account() {
        $this->load->library('Datatables');
        $this->datatables->select('user_accounts.reffrence_link as reffrence_link,user_accounts.uacc_active as uacc_active,user_accounts.uacc_admin_approved as uacc_admin_approved,user_accounts.earnings as earnings,user_accounts.uacc_username as uacc_username,user_accounts.uacc_group_fk as uacc_group_fk,user_accounts.uacc_email as uacc_email,user_accounts.uacc_id as uacc_id,user_accounts.uacc_ip_address as uacc_ip_address ,user_accounts.uacc_date_last_login as uacc_date_last_login,user_accounts.uacc_suspend as uacc_suspend');
        $this->datatables->from('user_accounts');
        $this->datatables->where('uacc_group_fk = 2');
        return $this->datatables->generate();
    }

    function get_business() {
        $this->load->library('Datatables');
        $this->datatables->select('businesses.id as id,businesses.name as name,businesses.email as email,businesses.mobile_no as mobile_no,businesses.other_no as other_no,businesses.created_date as created_date,businesses.is_approved as is_approved');
        $this->datatables->from('businesses');
        //$this->datatables->where('uacc_group_fk = 1');
        return $this->datatables->generate();
    }

    function get_categories() {
        $this->load->library('Datatables');
        $this->datatables->select('categories.id as id,categories.name as name,categories.description as description,categories.created_date as created_date,categories.status as status');
        $this->datatables->from('categories');
        $this->datatables->where('categories.status = 1');
        return $this->datatables->generate();
    }

    function get_subcategories() {
        $this->load->library('Datatables');
        $this->datatables->select('categories.name as category_name,subcategories.id as id,subcategories.category_id as category_id,subcategories.name as name,subcategories.description as description,subcategories.created_date as created_date,categories.status as status');
        $this->datatables->from('subcategories');
        $this->datatables->where('subcategories.status = 1');
        $this->datatables->join('categories', 'subcategories.category_id = categories.id', 'inner');
        return $this->datatables->generate();
    }

    function get_payments($user_id) {
        $this->load->library('Datatables');
        $this->datatables->select('reseller_payments.id as id,reseller_payments.netamount as netamount,reseller_payments.tax as tax,reseller_payments.date as date,reseller_payments.payment_method as payment_method,reseller_payments.id as id,reseller_payments.created_date as created_date,reseller_payments.status as status,reseller_payments.amount as amount,reseller_payments.transaction_id as transaction_id,reseller_payments.bank_transaction_id as bank_transaction_id,reseller_payments.chequeno as chequeno');
        $this->datatables->from('reseller_payments');
        $this->datatables->where('reseller_payments.status = 1');
        $this->datatables->where('reseller_payments.user_id', $user_id);
        return $this->datatables->generate();
    }

    function get_visitors() {
        $this->load->library('Datatables');
        $this->datatables->select('visitorinfo.company_name as company_name,visitorinfo.first_name as first_name,visitorinfo.last_name as last_name,visitorinfo.contact_no as contact_no,visitorinfo.is_verified as is_verified,visitorinfo.advertize_added as advertize_added');
        $this->datatables->from('visitorinfo');
        return $this->datatables->generate();
    }

    function dashboard_data() {
        $query = $this->db->query('SELECT
  (SELECT COUNT(*) FROM categories WHERE status = 1) as total_categories, 
  (SELECT COUNT(*) FROM subcategories WHERE status = 1) as total_subcategories,
  (SELECT COUNT(*) FROM visitorinfo) as total_visitors,
  (SELECT COUNT(*) FROM reseller_payments where status = 1) as reseller_payments,
  (SELECT COUNT(*) FROM businesses WHERE is_approved = 0) as pending_business,
  (SELECT COUNT(*) FROM businesses WHERE is_approved = 1) as approved_business,
  (SELECT COUNT(*) FROM user_accounts WHERE uacc_group_fk = 2 and uacc_active = 1) as total_users,
  (SELECT COUNT(*) FROM visitorinfo WHERE advertize_added = 1) as total_visitor_adds');
        return $query->row();
    }

    function add_users() {

        $this->load->library('form_validation');
        $validation_rules = array(
            array('field' => 'register_email_address', 'label' => 'Email Address', 'rules' => 'required|valid_email'),
            array('field' => 'register_username', 'label' => 'Username', 'rules' => 'required|min_length[4]|identity_available'),
            array('field' => 'passwordmain', 'label' => 'Password', 'rules' => 'required|validate_password'),
            array('field' => 'inputPasswordConfirm', 'label' => 'Confirm Password', 'rules' => 'required|matches[passwordmain]'),
        );

        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run()) {

            $user_type = 3;
            $email = $this->input->post('register_email_address');
            $username = $this->input->post('register_username');
            $password = $this->input->post('passwordmain');

            $profile_data = array(
                'uadd_address_01' => $this->input->post('address'),
                'uadd_post_code' => $this->input->post('pincode'),
                'uadd_city' => $this->input->post('city'),
                'user_type' => $this->input->post('user_type')
            );
            $instant_activate = FALSE;
            $response = $this->flexi_auth->insert_user($email, $username, $password, $profile_data, $user_type, $instant_activate);
            if ($response) {
                $appartment_id = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
                $this->db->update("user_accounts", array('appartment_id' => $appartment_id), array('uacc_id' => $response));
                $email_data = array('identity' => $email, 'username' => $username);
                $this->flexi_auth->send_email($email, 'Welcome', 'registration_welcome.tpl.php', $email_data);
                $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
                $this->session->set_flashdata('inserted_user_id', true);
                return true;
            }
            $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
            $this->session->set_flashdata('inserted_user_id', false);
            return false;
        }
        $this->data['message'] = validation_errors('<p class="error_msg">', '</p>');
        $this->session->set_flashdata('message', validation_errors());
        $this->session->set_flashdata('inserted_user_id', false);
        return FALSE;
    }

}
