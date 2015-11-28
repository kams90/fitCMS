<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_pages extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load classes
        $this->load->model('pages/pages_model', 'pages');
        $this->load->model('routes/routes_model', 'routes');
        $this->lang->load('pages', config_item('selected_lang'));
    }

    /**
     * Pages list action
     */
    public function index()
    {
        // Set page
        $page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $this->session->set_userdata('pages_return_link', config_item('base_url_301').$this->input->server('REQUEST_URI'));

        // Delete checked item
        if ($this->input->post()) {
            foreach ($this->input->post('check_item') as $item => $value) {
                $this->pages->delete($item);
                $this->routes->delete(['url' => $this->config->item('pages_route_controller').$item]);
            }

            // Set message and refresh the page
            $this->session->set_flashdata('success', lang('delete_checked_items'));
            redirect(current_url());
        }

        // Get number of pages
        $this->pages->generate_like_query($this->input->get('string'));
        $numberOfPages = $this->pages->count();

        // Pagiation
        $paginationLimits = $this->initPagination($numberOfPages, $page);

        // Get pages
        $this->pages->generate_like_query($this->input->get('string'));
        $pages = $this->pages
            ->limit($paginationLimits['limit'], $paginationLimits['limit_offset'])
            ->get_all();

        // Set view data
        $this->data['page'] = $page;
        $this->data['pages'] = $pages;
        $this->data['pageTitle'] = lang('pages');
        $this->data['breadcrumbs'] = [
            lang('pages') => ''
        ];

        $this->load->view('themes/'.config_item('admin_theme').'/pages/index', $this->data);
    }

    /**
     * Edit page action
     * 
     * @param int $id_page
     */
    public function edit($id_page)
    {
        $page = $this->pages->get($id_page);
        if (!$page) {
            show_404();
        }

        // If post is send
        if ($this->input->post()) {
            $result = $this->pages
                ->from_form($this->pages->rules['update'], NULL, [$this->pages->primary_key => $id_page])
                ->update();
            if ($result) {
                // Set informations
                $this->session->set_flashdata('success', lang('save_changes'));
                $pageUrl = $this->config->item('pages_route_controller').$id_page;

                // Update route
                $routesData = [
                    'slug' => $this->routes->prepare_unique_slug($this->input->post('slug'), $pageUrl),
                ];
                $this->routes->update($routesData, ['url' => $pageUrl]);

                // Redirect
                redirect(config_item('admin_url').'/pages/edit/'.$id_page);
            }
        }

        // Get page route
        $pageRoute = $this->routes->fields('slug')->get(['url' => $this->config->item('pages_route_controller').$id_page]);
        $page->slug = ($pageRoute) ? $pageRoute->slug : '';

        // Set view data
        $this->data['page'] = $page;
        $this->data['return_link'] = ($this->session->pages_return_link) ? $this->session->pages_return_link : config_item('admin_url').'pages';
        $this->data['pageTitle'] = lang('pages').'<small>'.lang('header.edit').'</small>';
        $this->data['breadcrumbs'] = [
            lang('pages') => admin_url('pages'),
            lang('edit') => '',
        ];

        $this->load->view('themes/'.config_item('admin_theme').'/pages/edit', $this->data);
    }

    /**
     * Add new page action
     */
    public function add()
    {
        // If post is send
        if ($this->input->post()) {
            $insertedId = $this->pages
                ->from_form($this->pages->rules['insert'])
                ->insert();
            if ($insertedId) {
                // Set informations
                $this->session->set_flashdata('success', lang('pages.messages.add_success'));

                $pageUrl = $this->config->item('pages_route_controller').$insertedId;
                $slug = ($this->input->post('slug')) ? $this->input->post('slug') : $this->input->post('title');

                // Add route
                $routesData = [
                    'slug' => $this->routes->prepare_unique_slug($slug),
                    'url' => $pageUrl,
                ];
                $this->routes->insert($routesData);

                // Redirect
                redirect(config_item('admin_url').'/pages/edit/'.$insertedId);
            }
        }

        // Set view data
        $this->data['return_link'] = ($this->session->pages_return_link) ? $this->session->pages_return_link : config_item('admin_url').'pages';
        $this->data['pageTitle'] = lang('pages').'<small>'.lang('header.add').'</small>';
        $this->data['breadcrumbs'] = [
            lang('pages') => admin_url('pages'),
            lang('add') => '',
        ];

        $this->load->view('themes/'.config_item('admin_theme').'/pages/add', $this->data);
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
            $id_page = $this->input->post('id_item');
            if ($id_page > 0) {
                try {
                    // Delete user
                    if (!$this->pages->delete($id_page)) {
                        throw new Exception(lang('pages.messages.delete_error'));
                    }

                    // Delete route
                    $this->routes->delete(['url' => $this->config->item('pages_route_controller').$id_page]);

                    // Set response data
                    $result['message'] = lang('pages.messages.delete_success');
                    $result['status'] = 1;
                } catch (Exception $ex) {
                    // Log error message
                    log_message('error', "Line: ".__LINE__."\nFile: ".__FILE__."\n".$ex->getMessage());

                    // Set response data
                    $result['message'] = lang('pages.messages.delete_error');
                    $result['status'] = 0;
                }
            }
        }

        // Send header and response data
        header('Content-Type: application/json');
        echo json_encode(array('results' => $result));
        exit;
    }

    public function update_routes()
    {
        $this->pages->update_routes();
        redirect(admin_url('pages'));
    }
}

/* End of file Admin_pages.php */
/* Location: ./application/modules/pages/controllers/admin/Admin_pages.php */

