<?php
class ControllerModuleHelloworld extends Controller {
	private $error = array();

	public function index() {
		
		$this->load->language('module/helloworld');
		
		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			
			$this->model_setting_setting->editSetting('helloworld', $this->request->post); 
			
			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');
		
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		
		$data['entry_code'] = $this->language->get('entry_code');
		$data['entry_status'] = $this->language->get('entry_status');

		$data['help_code'] = $this->language->get('help_code');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['code'])) {
			$data['error_code'] = $this->error['code'];
		} else {
			$data['error_code'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_module'),
			'href' => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('module/helloworld', 'token=' . $this->session->data['token'], 'SSL')
		);

		if (!isset($this->request->get['module_id'])) {
			$data['action'] = $this->url->link('module/helloworld', 'token=' . $this->session->data['token'], 'SSL');
		} else {
			$data['action'] = $this->url->link('module/helloworld', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], 'SSL');
		}

		$data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->request->post['helloworld_code'])) {
			$data['helloworld_code'] = $this->request->post['code'];
		} else {
			$data['helloworld_code'] = $this->config->get('code');
		}
		
		
		
		if (isset($this->request->post['helloworld_status'])) {
			$data['helloworld_status'] = $this->request->post['helloworld_status'];
		} else {
			$data['helloworld_status'] = $this->config->get('helloworld_status');
		}
		
		
		$this->load->model('design/layout'); // Loading the Design Layout Models
 
		$data['layouts'] = $this->model_design_layout->getLayouts(); // Getting all the Layouts available on system
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('module/helloworld.tpl', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/helloworld')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (empty($this->request->post)) {
			$this->error['code'] = $this->language->get('error_code');
		}

		return !$this->error;
	}
}
