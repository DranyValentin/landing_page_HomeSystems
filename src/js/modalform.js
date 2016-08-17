	function validateCallBackForm() {
	   if (document.getElementById('callbackname').value == "") {
	       document.getElementById('callbackname').className = "input-highlight";
	       return;
	   }
	   if (document.getElementById('callbacktel').value == "") {
	       document.getElementById('callbacktel').className = "input-highlight";
	       return;
	   }
	   jQuery('#call-back-form').modal('hide');

		setTimeout(function()
		{
			jQuery('#custom-alert-modal').modal('show');
		}, 500)
	
	   AjaxFormRequest('messegeResult', 'callbackform', '/wp-content/plugins/hs-configurer/callback.php')
	   //document.getElementById('callbackform').submit();
	}

	function checkInput(obj) {
	    if (obj.value != "") obj.className = "";
	}

	function AjaxFormRequest(result_id,formMain,url) {
	    jQuery.ajax({
	        url: url,
	        type: "POST",
	        dataType: "html",
	        data: jQuery("#"+formMain).serialize(),
	        success: function(response) {
	            //document.getElementById(result_id).innerHTML = response;
	        },
	        error: function(response) {
	            //document.getElementById(result_id).innerHTML = "<p>Возникла ошибка при отправке формы. Попробуйте еще раз</p>";
	        }
	    });
	     
	    jQuery(':input','#formMain')
	    .not(':button, :submit, :reset, :hidden')
	    .val('')
	    .removeAttr('checked')
	    .removeAttr('selected');
	}
