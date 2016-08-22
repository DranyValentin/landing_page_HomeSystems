(function()
{

	"use strict"

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

   AjaxFormRequest('messegeResult', 'callbackform', '../callback.php')
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
		console.log(response)
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
/* Form Visit Show-room*/
function clearInput()
{
	$name.placeholder = "ИМЯ"
	$tel.placeholder = "ТЕЛЕФОН"
	$email.placeholder = "E-MAIL"

	$name.value = ""
	$tel.value = ""
	$email.value = ""
	$dateNum.selectedIndex = 0
	$dateMonth.selectedIndex = 0
}

var $button = document.querySelector('.btn_visit_room'),
	$name = document.querySelector('[placeholder="ИМЯ"]'),
	$tel = document.querySelector('[placeholder="ТЕЛЕФОН"]'),
	$email = document.querySelector('[placeholder="E-MAIL"]'),
	$dateNum = document.querySelector('[name="day"]'),
	$dateMonth = document.querySelector('[name="month"]')

$name.addEventListener('input', function(event)
{
	event.target.classList.remove('error_input')
})

$tel.addEventListener('input', function()
{
	event.target.classList.remove('error_input')
})

$email.addEventListener('input', function()
{
	event.target.classList.remove('error_input')
})

$dateNum.addEventListener('click', function()
{
	event.target.classList.remove('error_input')
})

$dateMonth.addEventListener('click', function()
{
	event.target.classList.remove('error_input')
})

$button.addEventListener('click', function(event)
{
	var regExpName = /[a-zA-Z]+/g
  	var regExpTel = /[0-9]+/g
  	var regExpEmail = /[a-z.A-z0-9]+@[a-zA-z]+.(com)?(net)?(ua)?(ru)?(co)?(\.)?(uk)?/g

  	if (!regExpName.test($name.value)) 
  	{
   		$name.classList.add('error_input')
   		$name.value = ''
		$name.placeholder = "Введите имя"
  	}
  	else if (!regExpTel.test($tel.value)) 
  	{
   		$tel.classList.add('error_input')
   		$tel.value = ''
		$tel.placeholder = "Введите только цифры номера телефона"
  	}
  	else if ( !regExpEmail.test($email.value) )
  	{
   		$email.classList.add('error_input')
   		$email.value = ''
		$email.placeholder = "Введите правильный e-mail"
  	}
  	else if ( !$dateNum.selectedIndex )
  	{
  		$dateNum.classList.add('error_input')
  	}
  	else if ( !$dateMonth.selectedIndex )
  	{
  		$dateMonth.classList.add('error_input')
  	}
  	else
  	{
		AjaxFormRequest('messegeResult', 'form', '../callback.php')
		clearInput()
  	}
	
	event.preventDefault()
})

})()