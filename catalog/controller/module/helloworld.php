<?php
class ControllerModuleHelloworld extends Controller {
	public function index() {
		$this->load->language('module/helloworld');

		$data['heading_title'] = $this->language->get('heading_title');

		if ($this->request->server['HTTPS']) {
			$data['code'] = str_replace('http', 'https', html_entity_decode($this->config->get('helloworld_code')));
		} else {
			$data['code'] = html_entity_decode($this->config->get('helloworld_code'));
		}
		
		
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/helloworld.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/module/helloworld.tpl', $data);
		} else {
			return $this->load->view('default/template/module/helloworld.tpl', $data);
		}
	}
}
