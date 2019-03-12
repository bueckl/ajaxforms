<?php

class TestModelAdmin extends ModelAdmin {

	public static $managed_models = array("TestModel");
	public static $url_segment = 'TestModel';
	public static $menu_title = 'TestModel';
	public $showImportForm = false;
	
}