<?php
/**
 * Created by PhpStorm.
 * User: Koshala Manojeewa
 * Date: 3/12/19
 * Time: 9:18 AM
 */

class RecaptureTestModelForm extends BootstrapAjaxForm {

    public function __construct($controller, $name) {


        $fields = singleton('RecaptureTestModel')->getFrontEndFields();
        $fields->push(new RecaptchaField('MyRecaptcha', '', ''));
//        echo '<pre>'.print_r($fields,1);die();

        $actions = FieldList::create(
            FormAction::create('doSubmit', 'Send')
                ->addExtraClass("btn btn-primary")
                ->setAttribute('data-loading-text','Sending …')
        );
        //new TextField();
        $validator = new RequiredFields(
            'FirstName',
            'Surname',
            'Email'
        );

        $this->setAttribute('novalidate', 'novalidate');


        parent::__construct($controller, $name, $fields, $actions, $validator);

    }

    public function sendEnquiryMail($data, $form) {

        // Send some eMails
        $from = 'jochen@guelden.org';
        $to = 'jochen@guelden.org';
        $body = '';
        $subject = 'Form [subject]';
        $email = new Email($from, $to, $subject, $body, null, $cc = null, $bcc = 'jochen@guelden.org');
        $email->setTemplate('TestModelEmail');


        $email->populateTemplate($data);

        if ( $email->send() ) {
            return true;
        } else {
            return false;
        }
    }



    public function doSubmit($data, $form) {

        $tm = new RecaptureTestModel();
        $form->saveInto($tm);
        $tm->write();

        if ($this->sendEnquiryMail($data, $form) ) {

            $config = SiteConfig::current_site_config();

            $ajaxData = array(
                'valid' => true,
                'html' => '<div class="alert">Thank You!</div>'
            );

        } else {

            $ajaxData = array(
                'valid' => true,
                'html' => '<div class="alert alert-danger">Ups!</div>'
            );


        }

        $response = new SS_HTTPResponse(json_encode($ajaxData));
        $response->addHeader("Content-type", "application/json");
        return $response;
    }


    public function forTemplate() {

        //actually this is what's called to aply bootstrap to forms,
        //but it messes up the actions (by applying the "form-control" class)
        //so we apply bootstrap only to the fields under the constuctor
        //$this->applyBootstrap();
        $return = $this->renderWith(array($this->class, 'Form'));

        //Now that we're rendered, clear message
        $this->clearMessage();
        return $return;
    }


    function validate() {
        parent::validate();


        if ($this->validator) {
            $errors = $this->validator->getErrors();
            $data = $this->getData();

            // edit
            $_errors = array();
            if( !empty($errors) && is_array($errors) ) foreach($errors AS $error) {
                $_errors[] = $error['message'];
            }

            if( !empty($_errors) ) {
                $this->sessionMessage(implode('<br/>', $_errors), 'bad');
                return false;
            }
        }
        return true;
    }


}
{

}