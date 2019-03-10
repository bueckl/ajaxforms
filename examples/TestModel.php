<?php
class TestModel extends DataObject {

  	//CRUD SETTINGS
	//This should be read-only from the CMS
  	public function canCreate($member = null) { return false;}
  	public function canDelete($member = null) { return true;}
	public function canEdit($member = null)   { return false;}
	public function canView($member = null)   { return true;}		
	
	static $db = array(
		'FirstName' => 'Varchar',
		'Surname' => 'Varchar',
		'Email' => 'Varchar(255)'
	);
	

	public static $summary_fields = array(
		'Created',
		'FirstName',
		'Surname',
		'Email'
	);
	
	public static $searchable_fields = array(
		'FirstName',
		'Surname',
		'Email',
	);
	
	static $default_sort = 'ID DESC';

	function getFrontEndFields($params = null) {
		$fields = parent::getFrontEndFields($params);
		return $fields;
	}
	
	//readonly in the CMS

	function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields = $fields->transform(new ReadonlyTransformation());
		return $fields;	
	}		
	
}