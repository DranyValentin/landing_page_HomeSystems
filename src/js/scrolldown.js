(function()
{
	"use strict"

	var $body = document.querySelector('body')
	var down = document.querySelector('#down')
	var down1 = document.querySelector('#down1')

	down.addEventListener('click',function(event)
	{
		var memY = 0
	 	var interval = setInterval(function()
	 	{
	 		var id  = event.target.getAttribute('href')
	 		var top = document.querySelector(id).offsetTop

	 		$body.scrollTop += 20

	 		if ( $body.scrollTop > top || memY == $body.scrollTop )
	 			clearInterval(interval)

	 		memY = $body.scrollTop
	 	}, 1)

	 	event.preventDefault();
	 })

	down1.addEventListener('click',function(event)
	{
		var memY = 0
	 	var interval = setInterval(function()
	 	{
	 		 var id  = event.target.getAttribute('href'),
	             top = document.querySelector(id).offsetTop

	 		$body.scrollTop += 20

	 		if ( $body.scrollTop > top )
	 			clearInterval(interval)

	 		if ( $body.scrollTop > top || memY == $body.scrollTop )
	 			clearInterval(interval)

	 		memY = $body.scrollTop
	 	}, 1)

	 	event.preventDefault();
	 })
})()