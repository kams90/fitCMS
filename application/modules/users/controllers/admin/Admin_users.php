<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_users extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load classes
        $this->load->model('users/users_model', 'users');
        $this->lang->load('users', config_item('selected_lang'));
    }

    /**
     * List of all users
     */
    public function index()
    {
        // Set page
        $page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $this->session->set_userdata('users_return_link', config_item('base_url_301').$this->input->server('REQUEST_URI'));

        // Delete checked item
        if ($this->input->post()) {
            foreach ($this->input->post('check_item') as $item => $value) {
                // Delete action
                $this->users->delete($item);
            }

            // Set message and refresh the page
            $this->session->set_flashdata('success', lang('delete_checked_items'));
            redirect(current_url());
        }

        // Get users
        $this->users->generate_like_query($this->input->get('string'));
        $numberOfUsers = $this->users->count();

        // Pagiation
        $paginationLimits = $this->initPagination($numberOfUsers,  $page);

        // Get users
        $this->users->generate_like_query($this->input->get('string'));
        $users = $this->users
            ->limit($paginationLimits['limit'], $paginationLimits['limit_offset'])
            ->get_all();

        // Set view data
        $this->data['page'] = $page;
        $this->data['users'] = $users;
        $this->data['pageTitle'] = lang('users');
        $this->data['breadcrumbs'] = [
            lang('users') => ''
        ];

        $this->load->view('themes/'.config_item('admin_theme').'/users/index', $this->data);
    }

    /**
     * Edit single user
     *
     * @param int $id_user
     */
    public function edit($id_user)
    {
        $user = $this->users->get($id_user);
        if (!$user) {
            show_404();
        }

        // If post is send
        if ($this->input->post()) {
            // Set the validation rules
            $this->form_validation->set_rules($this->users->get_rules('edit', $id_user));

            if ($this->form_validation->run() == TRUE) {
                // Set data to insert
                $dataUpdate = array(
                    'name' => $this->security->xss_clean($this->input->post('name')),
                    'login' => $this->security->xss_clean($this->input->post('login')),
                    'email' => $this->security->xss_clean($this->input->post('email'))
                );

                // If password is not empty
                if ($this->input->post('password')) {
                    $dataUpdate['password'] = $this->auth->hash($this->input->post('password'));
                }
                // Update
                if ($this->users->update($dataUpdate, $id_user)) {
                    // Set informations
                    $this->session->set_flashdata('success', lang('save_changes'));

                    // Redirect
                    redirect(config_item('admin_url').'/users/edit/'.$id_user);
                }
            }
        }

        // Set view data
        $this->data['user'] = $user;
        $this->data['return_link'] = ($this->session->users_return_link) ? $this->session->users_return_link : config_item('admin_url').'users';
        $this->data['pageTitle'] = lang('users').'<small>'.lang('header.edit').'</small>';
        $this->data['breadcrumbs'] = [
            lang('users') => admin_url('users'),
            lang('edit') => '',
        ];

        $this->load->view('themes/'.config_item('admin_theme').'/users/edit', $this->data);
    }

    /**
     * Add new user action
     */
    public function add()
    {
        // If post is send
        if ($this->input->post()) {
            $inserted_id = $this->users->from_form($this->users->get_rules('add'))->insert();
            if ($inserted_id) {
                // Set informations
                $this->session->set_flashdata('success', lang('success_add_user'));

                // Redirect
                redirect(config_item('admin_url').'/users/edit/'.$inserted_id);
            }
        }

        // Set view data
        $this->data['return_link'] = ($this->session->users_return_link) ? $this->session->users_return_link : config_item('admin_url').'users';
        $this->data['pageTitle'] = lang('users').'<small>'.lang('header.add').'</small>';
        $this->data['breadcrumbs'] = [
            lang('users') => admin_url('users'),
            lang('add') => '',
        ];

        $this->load->view('themes/'.config_item('admin_theme').'/users/add', $this->data);
    }

    /**
     * Delete action (by AJAX)
     *
     * @throws Exception
     */
    public function delete()
    {
        // Unset template
        $this->output->unset_template();

        if ($this->input->post('id_item')) {
            $id_user = $this->input->post('id_item');
            if ($id_user > 0) {
                try {
                    // Delete user
                    if (!$this->users->delete($id_user)) {
                        throw new Exception(lang('user_delete_error'));
                    }

                    // Set response data
                    $result['message'] = lang('user_was_deleted');
                    $result['status'] = 1;
                } catch (Exception $ex) {
                    // Log error message
                    log_message('error', "Line: ".__LINE__."\nFile: ".__FILE__."\n".$ex->getMessage());

                    // Set response data
                    $result['message'] = lang('user_delete_error');
                    $result['status'] = 0;
                }
            }
        }

        // Send header and response data
        header('Content-Type: application/json');
        echo json_encode(array('results' => $result));
        exit;
    }
}

/* End of file Admin_users.php */
/* Location: ./application/modules/users/controllers/admin/Admin_users.php */

