(function()
{
	"use strict"

	console.log("Run file 'menu.js'!")

	var $feedback = document.querySelector('.feedback')
	var $contacts = document.querySelector('.contacts')
	var $nav_menu = document.querySelector('.nav_menu')

	var feedbackClassName = $feedback.className
	var contactsClassName = $contacts.className
	var nav_menuClassName = $nav_menu.className

	function feedbackHidden()
	{
		if ( innerWidth < 768 )
			$feedback.className = 'hidden'
		else
			$feedback.className = feedbackClassName
	}

	function contactsHidden()
	{
		if ( innerWidth < 768 )
			$contacts.className = 'hidden'
		else
			$contacts.className = contactsClassName
	}

	function nav_menuHidden()
	{
		if ( innerWidth < 768 )
			$nav_menu.className = 'hidden'
		else
			$nav_menu.className = nav_menuClassName
	}

	var menu = document.createElement(div)


	feedbackHidden()
	contactsHidden()
	nav_menuHidden()
	window.addEventListener('resize', function(event)
	{
		var innerWidth = event.target.innerWidth
		feedbackHidden()
		contactsHidden()
		nav_menuHidden()
	})
})()