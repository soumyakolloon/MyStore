<?php
class ControllerModuleCalendar extends Controller {
	private $error = array(); 
	
	public function index() {   
		$this->load->language('module/calendar');
		$this->load->model('setting/setting');
		
		$this->document->setTitle($this->language->get('heading_title'));
						
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->model_setting_setting->editSetting('calendar', $this->request->post);		
				
			$this->session->data['success'] = $this->language->get('text_success');
						
			$this->response->redirect(HTTPS_SERVER . 'index.php?route=extension/module&token=' . $this->session->data['token']);
		}
				
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_left'] = $this->language->get('text_left');
		$data['text_right'] = $this->language->get('text_right');
		$data['text_edit'] = $this->language->get('text_edit');
		
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_position'] = $this->language->get('entry_position');
		
		
		$data['entry_version_status'] = $this->language->get('entry_version_status');
		$data['entry_author'] = $this->language->get('entry_author');
		
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

        if (isset($this->error['warning'])) {
        	$data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
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
			'href' => $this->url->link('module/calendar', 'token=' . $this->session->data['token'], 'SSL')
		);
		
		$data['action'] = HTTPS_SERVER . 'index.php?route=module/calendar&token=' . $this->session->data['token'];
		
		$data['cancel'] = HTTPS_SERVER . 'index.php?route=extension/module&token=' . $this->session->data['token'];
		
			
		if (isset($this->request->post['calendar_status'])) {
			$data['calendar_status'] = $this->request->post['calendar_status'];
		} else {
			$data['calendar_status'] = $this->config->get('calendar_status');
		}
		
					
				
		$this->id       = 'content';
		$this->template = 'module/calendar.tpl';
		$this->load->model('design/layout'); // Loading the Design Layout Models
 

		$data['layouts'] = $this->model_design_layout->getLayouts(); // Getting all the Layouts available on system
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('module/calendar.tpl', $data));
		
		//$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/calendar')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
				
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}	
	}
}
?>
