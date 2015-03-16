<?php
 class ControllerModuleshare extends Controller {
	public function index() {
		
		$this->load->language('module/share');
		
		
		
		$this->id       = 'share';
		//$this->template = $this->config->get('config_template') . '/template/module/share.tpl';
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/share.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/module/share.tpl');
		} else {
			return $this->load->view('default/template/module/share.tpl');
		}
	}
}
?>
