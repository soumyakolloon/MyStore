<?php

/**
* Module for calendar: front view controller
* Author Soumya Kolloon Date: Feb 20/ 2015
**/


 class ControllerModuleCalendar extends Controller {
	
	public function index() {
		
		$this->load->language('module/calendar');
		
			
		$this->id       = 'calendar';
		//$this->template = $this->config->get('config_template') . '/template/module/share.tpl';
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/calendar.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/module/calendar.tpl');
		} else {
			return $this->load->view('default/template/module/calendar.tpl');
		}
	}
}
?>
