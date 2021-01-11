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

?>
<div class="blog<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Blog">
	<?php echo $afterDisplayTitle; ?>
	<?php echo $afterDisplayContent; ?>
	<?php echo $beforeDisplayContent; ?>

	<pre>
		<?php print_r($this)?>
	</pre>


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
						<ul class="nav nav_header">
							<li class="current active"><a href="#">О компании</a></li>
							<li><a href="#">Инвестиции</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Новости</a></li>
							<li><a href="#">Контакты</a></li>
						</ul>
					</div>
					<div class="order-1 order-lg-0 col-12  col-sm-8 col-lg-3 col-xxl-2">
						<div class="header_control">
							<a href="#" class="btn btn_in">Вход</a>
							<a href="#" class="btn btn_default">Регистрация</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="main-screen_page_faq">
			<div class="container">
				<div class="h1_outer">
					<h1 class="h1">Новости</h1>
				</div>
			</div>
		</div>
	</div>


	<div class="section">
		<div class="container">
			<div class="row">

				<div class="col-md-6 col-lg-4">
					<div href="#" class="blog_item">
						<div class="blog_item__img">
							<img src="/images/blog/blog-1.jpg" alt="">
						</div>
						<div class="blog_item_body">
							<div class="blog_item__title">Как Вам вложить ваши денежные средства ?</div>
							<div class="blog_item__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
								incididunt ut labore et dolore magna aliqua.
							</div>
							<div class="blog_item_footer">
								<div class="blog_item_footer__date">
									14/01/21
								</div>
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
				</div>
				<div class="col-md-6 col-lg-4">
					<div href="#" class="blog_item">
						<div class="blog_item__img">
							<img src="/images/blog/blog-1.jpg" alt="">
						</div>
						<div class="blog_item_body">
							<div class="blog_item__title">Как Вам вложить ваши денежные средства ?</div>
							<div class="blog_item__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
								incididunt ut labore et dolore magna aliqua.
							</div>
							<div class="blog_item_footer">
								<div class="blog_item_footer__date">
									14/01/21
								</div>
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
				</div>
				<div class="col-md-6 col-lg-4">
					<div href="#" class="blog_item">
						<div class="blog_item__img">
							<img src="/images/blog/blog-1.jpg" alt="">
						</div>
						<div class="blog_item_body">
							<div class="blog_item__title">Как Вам вложить ваши денежные средства ?</div>
							<div class="blog_item__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
								incididunt ut labore et dolore magna aliqua.
							</div>
							<div class="blog_item_footer">
								<div class="blog_item_footer__date">
									14/01/21
								</div>
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
				</div>
				<div class="col-md-6 col-lg-4">
					<div href="#" class="blog_item">
						<div class="blog_item__img">
							<img src="/images/blog/blog-1.jpg" alt="">
						</div>
						<div class="blog_item_body">
							<div class="blog_item__title">Как Вам вложить ваши денежные средства ?</div>
							<div class="blog_item__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
								incididunt ut labore et dolore magna aliqua.
							</div>
							<div class="blog_item_footer">
								<div class="blog_item_footer__date">
									14/01/21
								</div>
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
				</div>

			</div>
		</div>
	</div>

</div>
