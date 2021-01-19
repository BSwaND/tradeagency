<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<div class="last-news">
	<div class="last-news__title"><?= $module->title ?></div>
	<div class="newsflash<?= $moduleclass_sfx; ?>">
		<?php foreach ($list as $item) { ?>
			<a href="<?php echo $item->link; ?>" class="last-news_item">
				<div class="last-news_item__title"><?= $item->title ?></div>
				<div class="last-news_item_footer">
					<div class="blog_item_footer__date"><?= date("d/m/Y", strtotime($item->created)) ?></div>
					<div class="btn btn_round">
						<span class="btn_round_inner"></span>
					</div>
				</div>
			</a>
		<?php } ?>
	</div>
</div>


