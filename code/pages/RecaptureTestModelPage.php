<?php
/**
 * Created by PhpStorm.
 * User: Koshala Manojeewa
 * Date: 3/12/19
 * Time: 9:01 AM
 */

class RecaptureTestModelPage extends Page {

}

class RecaptureTestModelPage_Controller extends Page_Controller {

    private static $allowed_actions = array (
        'Form',
        'ModalForm',
        'rendermodalform'
    );

    public function init(){
        parent::init();



        Requirements::javascript('mysite/javascript/TestModelForm.js');
        Requirements::javascript('mysite/javascript/ModalTestModelForm.js');

//        JS Initialization - both inline and modal form
        Requirements::customScript("
			(function($) {
				$(function () {
					var Form = new RecaptureTestModelForm($('#RecaptureTestModelForm_Form'), false, $('.FormHolder'));
					var ModalForm = new ModalTestModelForm('" . $this->Link() . "rendermodalform',$('#ModalTestModelFormTrigger'),$('#myModal'));
				});
			})(jQuery);
		");

        //Basic form styling - this could go into a stylesheet
        //(or just be left here to keep things together)
//        Requirements::customCSS("
//			label[for=RecaptureTestModelForm_Form_FirstName],
//			label[for=RecaptureTestModelForm_Form_Surname],
//			label[for=RecaptureTestModelForm_ModalForm_FirstName],
//			label[for=RecaptureTestModelForm_ModalForm_Surname],
//			#FirstName.has-error .InlineHelpText,
//			#Surname.has-error .InlineHelpText
//			{
//				display:none;
//			}
//			span.required {
//				color:#B94A48;
//			}
//		");




    }



    public function Form(){
        $form = new RecaptureTestModelForm($this, 'Form');
        return $form;
    }


    public function ModalForm(){
        $form = new RecaptureTestModelForm($this, 'ModalForm');
        return $form;
    }



    public function rendermodalform(){
        $form = $this->ModalForm();
        //removing actions - they are part of the modal form
        $form->customise(array(
            "Actions" => "",
        ));
        return $form->forTemplate()->RAW();
    }


}
