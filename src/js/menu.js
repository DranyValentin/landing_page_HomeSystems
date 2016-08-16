(function()
{
	"use strict"

	console.log("Run file 'menu.js'!")

	var $li = document.createElement('li')
	var $nav = document.createElement('nav')
	var $ul = document.querySelector('.nav').cloneNode(true)
	var $menu_mobile = document.querySelector('.menu_mobile')
	var $feedback = document.querySelector('.feedback').cloneNode(true)
	var $contacts = document.querySelector('.contacts').cloneNode(true)

	console.log($nav)

	
	$li.appendChild($feedback.children[0])
	$ul.appendChild($li)

	console.log($ul)
	$li = $li.cloneNode(true)
	$li.replaceChild($contacts.children[0], $li.children[0])
	
	$ul.appendChild($li)
	console.log($li)	
	$nav.className = 'nav_mobile'
$nav.appendChild($ul)


	$nav.children[0].className = 'nav menu_list'
	$menu_mobile.appendChild($nav)
	$nav = document.querySelector('.nav_mobile')

	$menu_mobile.addEventListener('click', function(event)
	{
		console.log("Click on 'menu_mobile' work!")

		if ( !$nav.style.display )
			$nav.style.display = 'flex'
		else
			$nav.style.display = ''
	})
})()