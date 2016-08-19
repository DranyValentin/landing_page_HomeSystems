(function()
{
	"use strict"
	// console.log(jQuery("#down"))

// 	 jQuery("#down").on("click", function (event) {
// 	 	console.log('jQuery')

//        var id  = jQuery(this).attr('href'),
//              top = jQuery(id).offset().top;
//        jQuery('body,html').animate({scrollTop: top}, 1000);
//       // event.preventDefault();
//      });

	// var down = document.querySelector('.down22')
	// console.log(down)

	//  down.addEventListener('click',function()
	//  {
	//  	console.log('jQuery')

	//  })


	console.log("Run file 'slide.js'!")

	var $arrowRight = document.querySelector('.arrow_right')
	var $arrowLeft = document.querySelector('.arrow_left')
	var $Events = document.querySelectorAll('.event')

	var slideIndex = 0

// console.log($Events)
// 	var memIndex
// 	var visibleEvent
	function removeAnimate()
	{
		var event = []
		Array.from($Events).forEach(function($event, index)
			{
				$event.classList.remove('current_animate')
				$event.classList.remove('animate')
				event[index] = $event
			})
	}

	setTimeout(function()
	{

	}, 1000)

	$arrowRight.addEventListener('click', function(event)
	{
		console.log("Click on arrow right!")
		
		removeAnimate()

		$arrowLeft.style.pointerEvents = "none"
		$arrowRight.style.pointerEvents = "none"

		$Events[slideIndex].classList.add('current_animate')
		$Events[slideIndex].classList.remove('current_event')
		$Events[slideIndex].classList.add('hidden_event')

		if ( slideIndex < $Events.length-1)
		{
			slideIndex++
			$Events[slideIndex].classList.add('animate')
			$Events[slideIndex].classList.remove('hidden_event')
			$Events[slideIndex].classList.add('current_event')
		}
		else
		{	
			slideIndex = 0
			$Events[slideIndex].classList.add('animate')
			$Events[slideIndex].classList.remove('hidden_event')
			$Events[slideIndex].classList.add('current_event')
		}


		// event.currentTarget.style.pointerEvents = 'none'
		
		// $Events[slideIndex].classList.add('current_animate')
		// $Events[slideIndex].classList.remove('current_event')
		// $Events[slideIndex].classList.add('hidden_event')

		// if ( slideIndex )
		// {
		// 	slideIndex--
		// 	$Events[slideIndex].classList.add('animate')
		// 	$Events[slideIndex].classList.remove('hidden_event')
		// 	$Events[slideIndex].classList.add('current_event')
		// }
		// else
		// {	
		// 	slideIndex = $Events.length-1
		// 	$Events[slideIndex].classList.add('animate')
		// 	$Events[slideIndex].classList.remove('hidden_event')
		// 	$Events[slideIndex].classList.add('current_event')
		// }

		setTimeout(function()
		{	
			$arrowRight.style.pointerEvents = ""
			$arrowLeft.style.pointerEvents = ""

			if (slideIndex == 1)
			{
				$Events[slideIndex-1].classList.add('opacity_zero')
				$Events[slideIndex+1].classList.remove('opacity_zero')

			}
			else if ( slideIndex == 2 )
			{
				$Events[slideIndex-1].classList.add('opacity_zero')
				$Events[slideIndex-2].classList.remove('opacity_zero')
			}
			else if (slideIndex == 0)
			{
				$Events[slideIndex+2].classList.add('opacity_zero')
				$Events[slideIndex+1].classList.remove('opacity_zero')
			}
		},3000)

	})

	$arrowLeft.addEventListener('click', function()
	{
		console.log("Click on arrow left!")
		
		removeAnimate()

		$arrowLeft.style.pointerEvents = "none"
		$arrowRight.style.pointerEvents = "none"

		$Events[slideIndex].classList.add('current_animate')
		$Events[slideIndex].classList.remove('current_event')
		$Events[slideIndex].classList.add('hidden_event')

		if ( slideIndex < $Events.length-1)
		{
			slideIndex++
			$Events[slideIndex].classList.add('animate')
			$Events[slideIndex].classList.remove('hidden_event')
			$Events[slideIndex].classList.add('current_event')
		}
		else
		{	
			slideIndex = 0
			$Events[slideIndex].classList.add('animate')
			$Events[slideIndex].classList.remove('hidden_event')
			$Events[slideIndex].classList.add('current_event')
		}

		setTimeout(function()
		{	
			$arrowLeft.style.pointerEvents = ""
			$arrowRight.style.pointerEvents = ""

			if (slideIndex == 1)
			{
				$Events[slideIndex-1].classList.add('opacity_zero')
				
				

				$Events[slideIndex+1].classList.remove('opacity_zero')

			}
			else if ( slideIndex == 2 )
			{
				$Events[slideIndex-1].classList.add('opacity_zero')
				$Events[slideIndex-2].classList.remove('opacity_zero')
			}
			else
			{
				$Events[slideIndex+2].classList.add('opacity_zero')
				$Events[slideIndex+1].classList.remove('opacity_zero')
			}
		},3000)
	})


})()