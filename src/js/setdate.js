(function()
{
	"use strict"

	console.log("Run file 'setdate.js'")

//Set Date
	var currentDate = new Date()
	var currentDay = currentDate.getDate()
	var currentMonth = currentDate.getMonth()
	var arrDays = [31,28,31,30,31,30,31,31,30,31,30,31]

	var $selectDate = document.querySelector('.select_date_num')
	var $selectMonth = document.querySelector('.select_date_month')

	function setDays(firstDay, firstMonth){
		var $opt = document.createElement('option')
		$opt.value = ''
		$opt.text = 'ЧИСЛО'
		$selectDate.appendChild($opt)

		while ( firstDay <= arrDays[firstMonth] )
		{
			$opt = document.createElement('option')
			$opt.value = firstDay
			$opt.text = firstDay
			$selectDate.appendChild($opt)
			firstDay++
		}
	}

	function setMonths(date, firstMonth){
		var key = true;

		var $opt = document.createElement('option')
		var $optgroup = document.createElement('optgroup')
		var group1 = $optgroup.cloneNode(true)
		var group2 = $optgroup.cloneNode(true)

		group1.label = date.getFullYear()

		$selectMonth.appendChild(group1)

		for ( var count = 0 ; count < 12; count++ )
		{
			date.setMonth(firstMonth++)
			$opt = document.createElement('option')
			$opt.value = date.getMonth()
			$opt.text = date.getMonth() + 1

			if ( key && date.getMonth() < currentMonth )
				{
					group2.label = date.getFullYear()
					$selectMonth.appendChild(group2)
					key = false
				}

			$selectMonth.appendChild($opt)
		}
	}

	setDays(currentDay+1, currentMonth)
	setMonths(currentDate, currentMonth)

	var $selectMonth = document.querySelector('.select_date_month')
	$selectMonth.addEventListener('input', function(event)
	{
		$selectDate = document.querySelector('.select_date_num')
		var target = event.target
		var value = target.value


		var length = $selectDate.length
		for ( var i = 0; i < length; i++ )
		{
			$selectDate.remove(0)
		}

		if ( value == currentMonth )
			setDays(currentDay+1, value)
		else{
			setDays(1, value)
			
		}
	})
/* End Set Date */

// Open Select Systems
	var $boxSystems = document.querySelector('.select_system_caption')
	var $boxSystems_ = document.querySelector('.glyphicon-triangle-bottom')

	$boxSystems.addEventListener('click', function(event)
	{
		var target = event.target
		var listSystems = target.nextElementSibling

		if ( listSystems.classList.contains('hidden') )
			listSystems.classList.remove('hidden')
		else
			listSystems.classList.add('hidden')

		event.stopPropagation()
	})

	$boxSystems_.addEventListener('click', function(event)
	{
		var target = event.target
		var listSystems = target.parentNode.nextElementSibling

		if ( listSystems.classList.contains('hidden') )
			listSystems.classList.remove('hidden')
		else
			listSystems.classList.add('hidden')

		event.stopPropagation()
	})
// End Open Select Systems

/* Change color text when move on checkbox
*  And
*  Add Choice System in Box_System_Caption
*/
	var $checkboxSystems = document.querySelectorAll('.checkbox_system')
	var memSystemCaption = $boxSystems.textContent,
		countCheckedSystem = 0

	var	arrCaptions = []

	Array.from($checkboxSystems).forEach(function($checkboxSystem)
	{
		// Change Color Text
		$checkboxSystem.addEventListener('mouseover', function(event)
		{
			event.target.nextElementSibling.classList.add('text_orange')
		})

		$checkboxSystem.addEventListener('mouseout', function(event)
		{
			event.target.nextElementSibling.classList.remove('text_orange')
		})
		// End Change Color Text

		// Choice System in Box_System_Caption
		$checkboxSystem.addEventListener('click', function(event)
		{
			var target = event.target

			if ( target.checked )
			{
				arrCaptions[countCheckedSystem] = target.value
				countCheckedSystem++
			}
			else
			{	
				for ( var i = 0; i < arrCaptions.length; i++)
				{
					if ( arrCaptions[i] == target.value )
					{
						arrCaptions.splice(i,1)
					}
				}

				countCheckedSystem--
			}

			if ( arrCaptions.length > 1 )
			{
				$boxSystems.firstChild.nodeValue = arrCaptions[0] + ' ...'	
			}
			else if ( arrCaptions.length == 1 )
			{
				$boxSystems.firstChild.nodeValue = arrCaptions[0]
			}
			else if ( arrCaptions.length == 0 )
			{
				$boxSystems.firstChild.nodeValue = memSystemCaption
			}

			event.stopPropagation()
		})
		// End Choice System in Box_System_Caption
	})

	var $body = document.querySelector('body')
	var $selectSystem = document.querySelector('.select_system')

	$selectSystem.addEventListener('click', function(event)
	{
		event.stopPropagation()
	})

	$body.addEventListener('click', function(event)
	{
		$selectSystem.classList.add('hidden')
	})
	

})()