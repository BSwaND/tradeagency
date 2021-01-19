<?php
	/**
	 * @package     Joomla.Site
	 * @subpackage  com_content
	 *
	 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 */

	defined('_JEXEC') or die;

	JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

	JHtml::_('behavior.caption');

	$dispatcher = JEventDispatcher::getInstance();

	$this->category->text = $this->category->description;
	$dispatcher->trigger('onContentPrepare', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
	$this->category->description = $this->category->text;

	$results = $dispatcher->trigger('onContentAfterTitle', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
	$afterDisplayTitle = trim(implode("\n", $results));

	$results = $dispatcher->trigger('onContentBeforeDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
	$beforeDisplayContent = trim(implode("\n", $results));

	$results = $dispatcher->trigger('onContentAfterDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
	$afterDisplayContent = trim(implode("\n", $results));

	jimport('joomla.application.module.helper');
	$attribs['style'] = 'none';

?>
<div class="blog<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Blog">
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
				</div>
				<?= $afterDisplayTitle ?>
			</div>
		</div>
	</div>

	<div class="section">
		<div class="container">
			<?= $beforeDisplayContent ?>
			<div class="row">
				<?php foreach($this->items as $item){  ?>
					<div class="col-md-6 col-lg-4">
						<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language)); ?>" class="blog_item">
							<div class="blog_item__img">
								<img src="<?= json_decode($item->images)->image_intro ?>" alt="<?= $item->title ?>">
							</div>
							<div class="blog_item_body">
								<div class="blog_item__title"><?= mb_substr(strip_tags($item->title), 0, 40, 'UTF-8') ?></div>
								<div class="blog_item__text"><?= mb_substr(strip_tags($item->introtext), 0, 130, 'UTF-8') ?>
								</div>
								<div class="blog_item_footer">
									<div class="blog_item_footer__date"><?= date("d/m/Y", strtotime($item->created)) ?></div>
									<div class="blog_item_footer__control">
										<div class="btn btn_round">
											<span class="btn_round__title">Подробнее</span>
											<span class="btn_round_inner"></span>
										</div>
									</div>
								</div>
							</div>
							</a>
					</div>
				<?php	} ?>
			</div>
			<?= $afterDisplayContent ?>
		</div>
		<div class="container">
			<?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
				<div class="pagination">
					<?php echo $this->pagination->getPagesLinks(); ?> </div>
			<?php endif; ?>
		</div>
	</div>

</div>
