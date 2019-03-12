/**
 * Test Model Form
 * Is automatically initialized on construction - see bottom of this script
 * 
 * form: Form object
 * modal: modal mode - true/false
 * formContainer: the container holding all form elements
 */
var TestModelForm = function(form, modal, formContainer) {
	var $this = this;
	var fieldset = null;
	this.init = function(){
		//console.log('Initializing ' + form.attr('id'));
		$this.fieldset = form.find('fieldset');
		$this.init_formenhancements();
		$this.bind_submitclick();
		$this.popover_destroyer();
	}

	/**
	 * Form enhancement
	 */
	this.init_formenhancements = function(){
		
		// Whatever extra logic we want to run here

		// $this.fieldset.find('input.date').click(function() {
		// 	$(this).ssDatepicker();
		// 	if($(this).data('datepicker')) {
		// 		$(this).datepicker('show');
		// 	}
		// });
		
	}
	

	/**
	 * Binding "submit" button click
	 *
	 */
	this.bind_submitclick = function(){
		
		var button = formContainer.find('[name=action_doSubmit]');

		button.click(function() {
			
			//for some reason we can't access the global form object, once we've done the
			//AJAX call - therefore we set it here once more

			var $form = form;
			
			//button loading state
			button.button('loading');
			
			$.post(
				form.attr('action'), 
				form.serialize(),
				function(data){
					
					//reset button loading state
					button.button('reset');

					if (data.valid) {
						
						//the data is valid, we're happy, and just present the final message
						
						//we expect the form to be wrapped inside of a "form holder"
						var holder = $form.parent();						
						holder.html(data.html);
						if (modal) {
							button.fadeOut();
						}
					} else {
						//if the data is not valid, we reload the form
						
						$this.fieldset.html($(data.html).find('fieldset').html());
						$this.init_formenhancements();
						
						//$this.error_message(button, data.msg);
					}

				},
				'json'
			);

			
			return false;
		});
	}
	
	/**
	 * Displaying error messages after submit
	 */
	this.error_message = function(element, msg){
		
		var placement = 'right';
		if (modal) {
			placement = 'left';
		}
		element.popover({
			title :'An error has occured',
			content : msg,
			placement: placement
		});
		
		element.popover('show');
	}
	
	/**
	 * Here we make sure that popovers can be destroyed
	 * when clicked on
	 */
	this.popover_destroyer = function(){
		
		formContainer.on('click', '.popover', function(){
			var popover = $(this);
//			popover.fadeOut(function(){
//				popover.remove();
//			});
			var button = formContainer.find('[name=action_doSubmit]');
			button.popover('destroy');
		});
	}

	//Automatic initialization on construction
	$this.init();

}