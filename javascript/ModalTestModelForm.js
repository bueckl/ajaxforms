/**
 * Test Model Form
 * Is automatically initialized on construction - see bottom of this script
 * 
 * If controllerUrl is null the trigger button's href attribute will be used to load the modal
 */
var ModalTestModelForm = function(controllerUrl, triggerButton, modalObj) {
	var $this = this;
	
	//the $controllerUrl is used only, if no controllerUrl has been submitted
	var $controllerUrl = null;

	this.init = function(){
		$this.init_triggerclick();
		$this.init_onshownevent();
		$this.modal_release();
	}
	
	this.init_triggerclick = function(){
		triggerButton.click(function(){
			var button = $(this);
			
			//if controller URL has not been supplied on initialization
			//we take the button href instead
			if (!controllerUrl) {
				$controllerUrl = button.attr('href');
			}
			modalObj.modal({
				//'remote': controllerUrl
			});
			return false;
		});
	}
	
	this.init_onshownevent = function(){
    modalObj.on('shown.bs.modal', function () {
			
			var url = controllerUrl;
			if (!url) {
				url = $controllerUrl;
			}
			
			$.get(url, function(data){
				$('.modal-body').html(data);
				var form = $('.modal-body form');
				var modalForm = new TestModelForm(form, true, modalObj);
			});
    })	
	}

	/**
	 * There is an issue with the Bootstrap 3 modal.
	 * Once it's closed, the modal backdrop stays open
	 */
	this.modal_release = function(){
		modalObj.on('hidden.bs.modal', function () {
			$('.modal-backdrop').remove();
		})
		
	}



	//Automatic initialization on construction
	$this.init();
};	