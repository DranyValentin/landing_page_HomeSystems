<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title>Шоурум компании Homesystems</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/main.css">
	
	<script src="js/jquery-3.1.0.min.js" defer></script>
	<script src="js/bootstrap.js" defer></script>
	<script src="js/setdate.js" defer></script>
	<script src="js/menu.js" defer></script>
	<script src="js/modalform.js" defer></script>
	<script src="js/slider.js" defer></script>
</head>
<body>
<div class="container-fluid">
	<header class="header">
		<div class="row wr_logo_contacts">
			<div class="col-xs-8 col-sm-3 image"><a href="/">
				<img class="img_logo" src="img/hs_showroom_logo.png" alt="Логотип компании Home Systems"></a>
			</div>
			<div class="col-xs-4 col-sm-8 col-sm-offset-1">
				<div class="row wr_phone_feedback_contacts">
					<div class="col-xs-4 phone"><a href="tel:+380442272802">+38-044-227-28-02</a></div>
					<div class="col-xs-4 feedback"><a href="#call-back-form" data-toggle="modal">Обратный звонок</a></div>
					<div class="col-xs-4 contacts"><a href="http://homesystems.com.ua/kontakty/" target="_blank">Контакты</a></div>
					<div class="col-xs-6 menu_mobile"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></div>
				</div>
			</div>
		</div>
		<div class="row nav_menu">
			<nav class="col-xs-10 col-xs-offset-1">
				<ul class="nav nav-pills">
					<li><a href="#user" id="down">Посетить</a>
					<li><a href="#events" id="down1">Мероприятия</a>
					<li><a href="#">О шоу-руме</a>
					<li><a href="http://homesystems.com.ua/o-nas/" target="_blank">О компании</a>
				</ul>
			</nav>
		</div>
	</header>
</div>
<div class="container-fluid section1">
	<div class="row wr_show_room">
		<div class="col-xs-12 
					col-sm-8 col-sm-offset-2 show_room text-center">
			<h1>Посетите наш<br>шоу-рум</h1>
			<p>В шоу-руме компании Home Systems вы сможете увидеть, протестировать и выбрать системы домашней автоматизации, повышающие комфорт вашей жизни!</p>
		</div>
	</div>
</div>

<?php
	require_once('preload.php');
	include_hs_components_plugin();

	$tag = get_term_by('slug', 'bezopasnost', 'post_tag');//meropriyatie

	/////////////////


	// $tags = get_tags();
	//  print_var($tags);

	/////////////////
	 // print_var($tag);

	$args = array(
		'posts_per_page' => 3,
		'offset' => 0,
		'tax_query' => array(
			array(
				'taxonomy' => 'post_tag',
				'field' => 'term_id',
				'terms' => $tag->term_id,
				)
			),
		'orderby' => 'date',
		'order' => 'DESC',
		'post_type' => 'post',
		'suppress_filters' => true
	);
	$posts = get_posts($args);
	// print_var($posts);
?>

<div id="events" class="container-fluid section_events">
	<div class="row">
		<div class="col-xs-12">
			<h2>Анонсы мероприятий</h2>
		</div>
		<div class="col-xs-12 wr_bl_events">
			<div class="col-xs-1 arrow arrow_left"><img src="img/arrow_left.svg"></div>
			<div class="col-xs-10 wr_events">
			<?php 
			for ($i = 0; $i < count($posts); $i++) {
				// print_var($i);
				if ($i > 0) $class = ' hidden_event'; else $class = ' current_event'; ?>
				<div class="col-xs-12 event<?php echo $class; ?>" id="slide<?php echo $i; ?>">
					<div class="col-xs-4 img_events"><img src="<?php echo get_the_post_thumbnail_url($posts[$i]); ?>" class="img-responsive" style="border: 1px solid orange"></div>
					<div class="col-xs-8 text_events">
						<h3><?php echo get_the_title($posts[$i]->ID); ?></h3>
						<p><?php echo get_the_excerpt($posts[$i]); ?></p>
						<p><a href="<?php echo get_permalink($posts[$i]); ?>">подробнее...</a></p>
				</div>
			</div>
			<?php } ?>
			</div>
			<div class="col-xs-1 arrow arrow_right"><img src="img/arrow_right.svg"></div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row wr_form">
		<form id="form" method="post" action="">
			<input type="hidden" name="formname" value="register">
			<h2 id="user">Запишитесь на посещение<br>Шоу-Рума!</h2>
			<div class="col-xs-12 
						col-sm-5 col-sm-offset-1 wr_sect_form">
				<div class="form-group">
					<label class="sr-only">Имя</label>
					<div class="col-xs-12 bl_name">
						<input type="text" class="form-control" placeholder="ИМЯ" name="name">
					</div>
				</div>
				<div class="form-group">
					<label class="sr-only">Телефон</label>
					<div class="col-xs-12 bl_tel">
						<input type="text" class="form-control" placeholder="ТЕЛЕФОН" name="phone">
					</div>
				</div>
				<div class="form-group">
					<label class="sr-only">E-mail</label>
					<div class="col-xs-12 bl_email">
						<input type="email" class="form-control" placeholder="E-MAIL" name="email">
					</div>
				</div>
			</div>
			<div class="col-xs-12
						col-sm-5 col-sm-offset-1 wr_sect_form">
				<div class="col-xs-12 bl_select_date">
					<p class="col-xs-5">Выберите дату</p>
					<div class="col-xs-2 col-xs-push-2 sel1">
						<select class="form-control select_date_num"  name="day">
						</select>
					</div>
					<div class="col-xs-2 col-xs-push-2 sel2">
						<select class="form-control select_date_month" name="month">
						<option value="">МЕСЯЦ</option>
						</select>
					</div>
				</div>
				<div class="col-xs-12 bl_select_system">
					<p class="col-xs-6">Выберите систему</p>
					<div class="col-xs-2 col-xs-push-1 sel3">
						<select class="form-control select_system" name="system">
							<option value="0">Домашняя автоматизация</option>
								<option value="1">Управление освещением</option>
								<option value="2">Климат-контроль</option>
								<option value="3">Интернет и Wi-Fi</option>
								<option value="4">Домашнее аудио</option>
								<option value="5">Видео и мультимедиа</option>
								<option value="6">Телевидение</option>
								<option value="7">Системы Hi-End Stereo</option>
								<option value="8">Видеонаблюдение</option>
								<option value="9">Охранная сигнализация</option>
								<option value="10">Отопление</option>
								<option value="11">Энергоэффективность</option>
								<option value="12">Современная электрика</option>
						</select>
					</div>
				</div>
				<div class="col-xs-12">
					<button type="click" class="btn btn-default btn_save_room" onclick="validateCallBackForm()">Отправить</button>
				</div>
			</div>
			<div class="col-xs-12
						col-sm-10 col-sm-offset-1">
				<p>Мы гарантируем сохранность ваших персональных данных.</p>
			</div>
			<div class="clearfix"></div>
		</form>
	</div>
</div>
<div class="container-fluid wr_footer">
	<footer class="footer">
			<div class="wr_nav1">
				<ul class="nav nav-pills nav-stacked">
					<li>
						<a href="#"><span class="icon-hs-facebook"></span></a>
					</li>
				</ul>
			</div>
			<div class="wr_nav2">
				<ul class="nav nav-pills nav-stacked">
					<li><a href="http://homesystems.com.ua/umnyj-dom/komfort/" target="_blank">Комфорт</a></li>
					<li><a href="http://homesystems.com.ua/umnyj-dom/razvlecheniya/" target="_blank">Мультимедиа</a></li>
					<li><a href="http://homesystems.com.ua/umnyj-dom/bezopasnost/" target="_blank">Безопасность</a></li>
					<li><a href="http://homesystems.com.ua/umnyj-dom/energoeffektivnost/" target="_blank">Эффективность</a></li>
				</ul>
			</div>
			<address class="wr_nav3">
				<ul class="nav">
					<li>ул. Преображенская 23А, г. Киев</li>
					<li><a href="tel:+380442272802">+38-044-227-28-02</a></li>
					<li><a href="mailto:info@homesystems.com.ua">info@homesystems.com.ua</a></li>
				</ul>
			</address>
		
	</footer>
</div>

<!--Modal Form-->
	<div id="call-back-form" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" style="margin:5px 10px;"><span class="glyphicon glyphicon-remove-circle"></span></button>
					<h3 class="modal-title">Обратный звонок</h3>
				</div>
				<div class="modal-body">
					<form method="post" action="" id="callbackform">
						<input type="hidden" name="formname" value="callback">
						<div class="row">
							<div class="col-sm-6">
								<p>Ваше имя:</p>
									<input name="name" type="text" id="callbackname" onchange="checkInput(this)">
							</div>
							<div class="col-sm-6">
								<p>Ваш телефон:</p>
									<input name="phone" type="tel" id="callbacktel" onchange="checkInput(this)">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<p style="margin-top: 30px;">Комментарий:</p>
								<textarea name="text" id="callbacktext"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 call-time">
								<span style="margin-right: 30px;">Время для звонка:</span>
								<div style="display:inline-block">
									<input type="radio" id="radio-morning" name="call-time" value="morning">
									<label class="mini-conf-radio-label" for="radio-morning">Утро</label>
									<input type="radio" id="radio-day" name="call-time" value="day" checked>
									<label class="mini-conf-radio-label" for="radio-day">День</label>
									<input type="radio" id="radio-evening" name="call-time" value="evening">
									<label class="mini-conf-radio-label" for="radio-evening">Вечер</label>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="conf-mini-button" style="margin: 30px 0 30px 30px" onclick="validateCallBackForm()">
					<div>Позвоните мне</div>
				</div>
			</div>
		</div>
	</div>
	<div id="custom-alert-modal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content clearfix">
				<div class="modal-body">
					<p id="custom-alert-text">Спасибо за Ваш запрос, наш менеджер свяжется с Вами в ближайшее время.</p>
					<div class="conf-mini-button pull-right" style="margin: 30px 0 15px 30px; padding: 10px 60px" data-dismiss="modal">
						<div>OK</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- End Modal Form-->


<script>
jQuery(document).ready(function() {
	jQuery('.system-article').addClass('clearfix');
});

</script>

<script defer>
	var $body = document.querySelector('body')
	var down = document.querySelector('#down')
	var down1 = document.querySelector('#down1')

	down.addEventListener('click',function(event)
	{

	 	var interval = setInterval(function()
	 	{
	 		 var id  = event.target.getAttribute('href'),
	             top = document.querySelector(id).offsetTop

	 		$body.scrollTop += 20

	 		if ( $body.scrollTop > top )
	 			clearInterval(interval)
	 	}, 1)

	 	event.preventDefault();
	 })

	down1.addEventListener('click',function(event)
	{
	 	var interval = setInterval(function()
	 	{
	 		 var id  = event.target.getAttribute('href'),
	             top = document.querySelector(id).offsetTop

	 		$body.scrollTop += 20

	 		if ( $body.scrollTop > top )
	 			clearInterval(interval)
	 	}, 1)

	 	event.preventDefault();
	 })

</script>
</body>
</html>