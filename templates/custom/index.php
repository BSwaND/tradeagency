<?php

	defined('_JEXEC') or die;

	$app = JFactory::getApplication();
	$user = JFactory::getUser();
	$this->setHtml5(true);
	$params = $app->getTemplate(true)->params;
	$menu = $app->getMenu()->getActive();
	$document = JFactory::getDocument();
	$document->setGenerator('');
	$template_url = JUri::root() . 'template/' . $this->template;
	$pageclass = '';
	if (is_object($menu))
		$pageclass = $menu->params->get('pageclass_sfx');

	// Подключение своих стилей:
	JHtml::_('stylesheet', 'styles.min.css', array('version' => 'v=1.3', 'relative' => true));
	JHtml::_('stylesheet', 'custom.css', array('version' => 'v=1.3', 'relative' => true));

	//Протокол Open Graph
	$pageTitle = $document->getTitle();
	$metaDescription = $document->getMetaData('description');
	$type = 'website';
	$view = $app->input->get('view', '');
	$id = $app->input->get('id', '');
	$image = JURI::base() . 'templates/custom/icon/logo.png';
	$title = !empty($pageTitle) ? $pageTitle : "default title";
	$desc = !empty($metaDescription) ? $metaDescription : "default description";

	if (!empty($view) && $view === 'article' && !empty($id)) {
		$article = JControllerLegacy::getInstance('Content')->getModel('Article')->getItem($id);
		$type = 'article';
		$images = json_decode($article->images);
		$image = !empty($images->image_intro) ? JURI::base() . $images->image_intro : JURI::base() . $images->image_fulltext;
	}
	$document->addCustomTag('
    <meta property="og:type" content="' . $type . '" />
    <meta property="og:title" content="' . $title . '" />
    <meta property="og:description" content="' . $desc . '" />
    <meta property="og:image" content="' . $image . '" />
    <meta property="og:url" content="' . JURI:: current() . '" />
');
?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" prefix="og: http://ogp.me/ns#">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/images/favicon.ico">
	<jdoc:include type="head"/>
</head>

<body class="<?php echo $pageclass ? htmlspecialchars($pageclass) : 'default'; ?>">
<jdoc:include type="modules" name="ticker_tape_little" style="none"/>
<jdoc:include type="component"/>
<jdoc:include type="modules" name="footer" style="none"/>

<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-lg-2">
				<div class="">
					<a href="/" class="logo__footer">
						<img src="/images/logo.svg" alt="logo">
					</a>
					<div class="footer_descript">
					</div>
					<a href="#" class="btn btn_big btn_accent btn_arrow">Инвестировать </a>
				</div>
			</div>
			<div class="offset-md-2 col-md-6 col-lg-2">
				<jdoc:include type="modules" name="menu-footer" style="none"/>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="footer_info">
					<div class="footer_info_item">
						<div class="footer_info_item__marker">
							<img src="/images/icon-marker.svg" alt="icon">
						</div>
						<div class="footer_info_item__body">
							<div class="footer_info_item__title">Адрес:</div>
							<div class="footer_info_item__text">Seychelles, Mahe, Providence, <br>Rue de la Perle, Global Gateway 8</div>
						</div>
					</div>
					<div class="footer_info_item">
						<div class="footer_info_item__marker">
							<img src="/images/icon-tel.svg" alt="icon">
						</div>
						<div class="footer_info_item__body">
							<div class="footer_info_item__title">Телефон:</div>
							<div class="footer_info_item__text">
								Город1: +xxx xx-xx-xxx <br>
								Город2: +xxx xx-xx-xxx
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="footer_info">
					<div class="footer_info_item">
						<div class="footer_info_item__marker">
							<img src="/images/icon-email.svg" alt="icon">
						</div>
						<div class="footer_info_item__body">
							<div class="footer_info_item__title">E-mail:</div>
							<div class="footer_info_item__text">xxxxxxxxxxx@gmail.com</div>
						</div>
					</div>
					<div class="footer_info_item">
						<div class="footer_info_item__marker">
							<img src="/images/icon-telegram.svg" alt="icon">
						</div>
						<div class="footer_info_item__body">
							<div class="footer_info_item__title">Telegram:</div>
							<div class="footer_info_item__text">@xxxxx_xxxxxxxxxxxx</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer_sub">
		<div class="container">
			<div class="d-md-flex align-items-center">
				<div class="footer_sub_control">  
					<jdoc:include type="modules" name="control_in_reg" style="none"/>
				</div>
				<div class="footer_sub_cooperate">© <?php echo date('Y'); ?>  Все права защищены</div>
			</div>
		</div>
	</div>
</footer>

<div class="btn_up"></div>

<script src="/templates/<?php echo $this->template; ?>/js/scripts.min.js"></script>
<script src="/templates/<?php echo $this->template; ?>/js/custom.js"></script>
</body>
</html>