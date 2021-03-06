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
	<script src="js/scrolldown.js" defer></script>
	<script src="js/menu.js" defer></script>
	<script src="js/modalform.js" defer></script>
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
		<div id="carousel_events" class="col-xs-12 wr_bl_events carousel slide" data-ride="carousel">
			<div class="col-xs-1 arrow arrow_left"><a class="left carousel-control" href="#carousel_events" role="button" data-slide="prev"><img src="img/arrow_left.svg"></a></div>
			<div class="col-xs-10 wr_events carousel-inner" role="listbox">
			<?php 
			for ($i = 0; $i < count($posts); $i++) {
				// print_var($i);
				if ($i > 0) $class = ''; else $class = ' active'; ?>
				<div class="col-xs-12 item<?php echo $class; ?>" id="slide<?php echo $i; ?>">
					<div class="col-xs-12 col-sm-6 img_events"><img src="<?php echo get_the_post_thumbnail_url($posts[$i]); ?>" class="img-responsive"></div>
					<div class="col-xs-12 col-sm-6 text_events">
						<h3><?php echo get_the_title($posts[$i]->ID); ?></h3>
						<p><?php echo get_the_excerpt($posts[$i]); ?></p>
						<p><a href="<?php echo get_permalink($posts[$i]); ?>" target="_blank">подробнее...</a></p>
				</div>
			</div>
			<?php } ?>
			</div>
			<div class="col-xs-1 arrow arrow_right"><a class="right carousel-control" href="#carousel_events" role="button" data-slide="next"><img src="img/arrow_right.svg"></a></div>
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
					<div class="col-xs-6 sel3">
						<div class="select_system_caption">Выбор не сделан
							<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
						</div>
						<ul class="select_system hidden">
							<li><input id="system_1" class="checkbox_system" type="checkbox" value="Домашняя автоматизация"><label for="system_1">Домашняя автоматизация</label></li>
							<li><input id="system_2" class="checkbox_system"type="checkbox" value="Управление освещением"><label for="system_2">Управление освещением</label></li>
							<li><input id="system_3" class="checkbox_system"type="checkbox" value="Климат-контроль"><label for="system_3">Климат-контроль</label></li>
							<li><input id="system_4" class="checkbox_system"type="checkbox" value="Интернет и Wi-Fi"><label for="system_4">Интернет и Wi-Fi</label></li>
							<li><input id="system_5" class="checkbox_system"type="checkbox" value="Домашнее аудио"><label for="system_5">Домашнее аудио</label></li>
							<li><input id="system_6" class="checkbox_system"type="checkbox" value="Видео и мультимедиа"><label for="system_6">Видео и мультимедиа</label></li>
							<li><input id="system_7" class="checkbox_system"type="checkbox" value="Телевидение"><label for="system_7">Телевидение</label></li>
							<li><input id="system_8" class="checkbox_system"type="checkbox" value="Системы Hi-End Stereo"><label for="system_8">Системы Hi-End Stereo</label></li>
							<li><input id="system_9" class="checkbox_system"type="checkbox" value="Видеонаблюдение"><label for="system_9">Видеонаблюдение</label></li>
							<li><input id="system_10" class="checkbox_system"type="checkbox" value="Охранная сигнализация"><label for="system_10">Охранная сигнализация</label></li>
							<li><input id="system_11" class="checkbox_system"type="checkbox" value="Отопление"><label for="system_11">Отопление</label></li>
							<li><input id="system_12" class="checkbox_system"type="checkbox" value="Энергоэффективность"><label for="system_12">Энергоэффективность</label></li>
							<li><input id="system_13" class="checkbox_system"type="checkbox" value="Современная электрика"><label for="system_13">Современная электрика</label></li>
						</ul>
					</div>
				</div>
				<div class="col-xs-12">
					<button type="click" class="btn btn-default btn_visit_room">Отправить</button>
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



</body>
<script>
	var $articles = document.body.querySelectorAll('.system-article')

	Array.from($articles).forEach(function($article){
		$article.classList.add('clearfix')		
	})
</script>
</html>