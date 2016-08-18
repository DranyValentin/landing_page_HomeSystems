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
})()