<?php

class ControllerModuleshare extends Controller {
	private $error = array(); 
	
	public function index() {   
		$this->load->language('module/share');
		$this->load->model('setting/setting');
		
		$this->document->setTitle($this->language->get('heading_title'));
						
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->model_setting_setting->editSetting('share', $this->request->post);		
				
			$this->session->data['success'] = $this->language->get('text_success');
						
			$this->response->redirect(HTTPS_SERVER . 'index.php?route=extension/module&token=' . $this->session->data['token']);
		}
				
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_left'] = $this->language->get('text_left');
		$data['text_right'] = $this->language->get('text_right');
		
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

  		$this->document->breadcrumbs = array();

   		$this->document->breadcrumbs[] = array(
       		'href'      => HTTPS_SERVER . 'index.php?route=common/home&token=' . $this->session->data['token'],
       		'text'      => $this->language->get('text_home'),
      		'separator' => FALSE
   		);

   		$this->document->breadcrumbs[] = array(
       		'href'      => HTTPS_SERVER . 'index.php?route=extension/module&token=' . $this->session->data['token'],
       		'text'      => $this->language->get('text_module'),
      		'separator' => ' :: '
   		);
		
   		$this->document->breadcrumbs[] = array(
       		'href'      => HTTPS_SERVER . 'index.php?route=module/share&token=' . $this->session->data['token'],
       		'text'      => $this->language->get('heading_title'),
      		'separator' => ' :: '
   		);
		
		$data['action'] = HTTPS_SERVER . 'index.php?route=module/share&token=' . $this->session->data['token'];
		
		$data['cancel'] = HTTPS_SERVER . 'index.php?route=extension/module&token=' . $this->session->data['token'];
		
			
		if (isset($this->request->post['share_status'])) {
			$data['share_status'] = $this->request->post['share_status'];
		} else {
			$data['share_status'] = $this->config->get('share_status');
		}
		
		
		if (isset($this->request->post['share_position'])) {
			$data['share_position'] = $this->request->post['share_position'];
		} else {
			$data['share_position'] = $this->config->get('share_position');
		}			
				
		$this->id       = 'content';
		//$this->template = 'module/share.tpl';
		$this->load->model('design/layout'); // Loading the Design Layout Models
 
	//	$data['layouts'] = $this->model_design_layout->getLayouts(); // Getting all the Layouts available on system
		$data['layouts'] = $this->model_design_layout->getLayouts(); // Getting all the Layouts available on system
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('module/share.tpl', $data));
		
		//$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/share')) {
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
