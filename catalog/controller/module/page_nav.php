<?php
 class ControllerModulePAGENav extends Controller {
	public function index() {
		
		$this->load->language('module/page_nav');
		
			
		$this->id       = 'page_nav';
		//$this->template = $this->config->get('config_template') . '/template/module/share.tpl';
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/page_nav.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/module/page_nav.tpl');
		} else {
			return $this->load->view('default/template/module/page_nav.tpl');
		}
	}
}
?>
