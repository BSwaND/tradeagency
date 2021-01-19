<?php
	/**
	 * @package     Joomla.Site
	 * @subpackage  com_content
	 *
	 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 */

	defined('_JEXEC') or die;
	include_once(JPATH_BASE .'/templates/custom/html/com_content/article/_header.php');

?>
<div class="main-screen ">
	<div class="header">
		<div class="container">
			<div class="hamburger hamburger--slider">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-4 col-lg-2 col-xxl-2">
					<a href="/" class="logo"><img src="/images/logo.svg" alt="logo"></a>
				</div>
				<div class="order-2 order-lg-0 col-12 col-lg-7 col-xxl-8">
					<?php
						$modules = JModuleHelper::getModules('menu');
						foreach($modules as $module){
							echo JModuleHelper::renderModule($module, $attribs);
						}
					?>
				</div>
				<div class="order-1 order-lg-0 col-12  col-sm-8 col-lg-3 col-xxl-2">
					<div class="header_control">
						<?php
							$modules = JModuleHelper::getModules('control_in_reg');
							foreach($modules as $module){
								echo JModuleHelper::renderModule($module, $attribs);
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="main-screen_page_news">
		<div class="container">
			<div class="h1_outer">
				<h1 class="h1"><?= $this->escape($this->params->get('page_heading')) ?></h1>
				<?= $this->item->event->afterDisplayTitle ?>
			</div>
		</div>
	</div>          
</div>

<div class="item-page<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Article">
	<meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>" />
	<div class="section section_accent">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<img src="<?= json_decode($this->item->images)->image_fulltext ?>" alt="<?= $this->item->title?>" class="item-page__img">
					<div class="item-page_body">
						<h2 class="h4 color_fff mb-3"><?= $this->item->title?></h2>
						<?= $this->item->event->beforeDisplayContent ?>
						<?= $this->item->text ?>
						<?= $this->item->event->afterDisplayContent ?>

						<div class="blog_item_footer__date mt-5"><?= date("d/m/Y", strtotime($this->item->created)) ?></div>
					</div>
				</div>
				<div class="col-lg-3">
					<?php
						$modules = JModuleHelper::getModules('last_news');
						foreach($modules as $module){
							echo JModuleHelper::renderModule($module, $attribs);
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
