(function()
{
	"use strict"

	console.log("Run file 'slide.js'!")

	var $arrowRight = document.querySelector('.arrow_right')
	var $arrowLeft = document.querySelector('.arrow_left')
	var $Events = document.querySelectorAll('.wr_events')

	var memIndex
	var memEvent
	function findVisibleEl()
	{
		Array.from($Events).forEach(function($event, index)
			{
				$event.classList.contains('hidden')

				if ( !$event.classList.contains('hidden') )
				{
					memEvent = $event
					memIndex = index
				}
			})
	}

	$arrowRight.addEventListener('click', function()
	{
		console.log("Click on arrow right!")

		findVisibleEl()

		memEvent.classList.add('hidden')

		if ( memIndex < $Events.length-1 )
			$Events[memIndex+1].classList.remove('hidden')
		else
			$Events[0].classList.remove('hidden')
	})

	$arrowLeft.addEventListener('click', function()
	{
		console.log("Click on arrow left!")
		
		findVisibleEl()
	
		memEvent.classList.add('hidden')

		if ( memIndex )
			$Events[memIndex-1].classList.remove('hidden')
		else
			$Events[$Events.length-1].classList.remove('hidden')
	})

})()