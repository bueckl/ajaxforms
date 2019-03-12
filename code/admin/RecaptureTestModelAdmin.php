<?php
/**
 * Created by PhpStorm.
 * User: Koshala Manojeewa
 * Date: 3/12/19
 * Time: 11:45 AM
 */

class RecaptureTestModelAdmin extends ModelAdmin
{
    public static $managed_models = array("RecaptureTestModel");
    public static $url_segment = 'RecaptureTestModel';
    public static $menu_title = 'RecaptureTestModel';
    public $showImportForm = false;
}