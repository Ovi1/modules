<?php
/**
 * @version     1.2
 * @package     mod_bootstrapblock
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @author      Brad Traversy <support@bootstrapjoomla.com> - http://www.bootstrapjoomla.com
 */
//No Direct Access
defined('_JEXEC') or die;
?>
<style>
<?php if($icon_position == 'left') : ?>
	.icon-content {
		float: left;
		width: 75%;
	}

	.icon {
		float: left;
		width: 25%;
		margin-top: 10px;
	}
<?php endif; ?>
<?php if($icon_position == 'right') : ?>
	.icon {
		float: right;
		width: 30%;
		margin-top: 10px;
	}

	.icon-content {
		float: left;
		width: 70%;
	}
<?php endif; ?>

	.center_block{
		text-align: center;
	}
</style>
<?php if($icon_position == 'heading-left' || $icon_position == 'heading-left') : ?>
	<h3 style="color:<?php echo $headingcolor; ?>">
		<?php if($show_icon == 1 && $icon_position == 'heading-left') : ?>
			<i class="<?php echo $icon.' '.$icon_size. '' .(!empty($icon_extra) ? $icon_extra : '') ?>"></i>
		<?php endif; ?>
		<?php echo $headingtext; ?> 
		<?php if($show_icon == 1 && $icon_position == 'heading-right') : ?>
			<i class="<?php echo $icon.' '.$icon_size. '' .(!empty($icon_extra) ? $icon_extra : '') ?>"></i>
		<?php endif; ?>
	</h3>
	<p style="color: <?php echo $paragraphcolor; ?>"><?php echo $paragraphtext; ?></p>
<?php elseif($icon_position == 'left' || $icon_position == 'right') : ?>
	<div class="icon">
		<i class="<?php echo $icon.' '.$icon_size. '' .(!empty($icon_extra) ? $icon_extra : '') ?>"></i>
	</div>
	<div class="icon-content">
		<h3 style="color:<?php echo $headingcolor; ?>"><?php echo $headingtext; ?></h3>
		<p style="color: <?php echo $paragraphcolor; ?>"><?php echo $paragraphtext; ?></p>
	</div>
<?php elseif($icon_position == 'center-top'): ?>
		<div class="center_block">
			<i class="<?php echo $icon.' '.$icon_size. '' .(!empty($icon_extra) ? $icon_extra : '') ?>"></i>
			<h3 style="color:<?php echo $headingcolor; ?>"><?php echo $headingtext; ?></h3>
			<p style="color:<?php echo $paragraphcolor; ?>"><?php echo $paragraphtext; ?></p>
		</div>
<?php elseif($icon_position == 'center-mid'): ?>
		<div class="center_block">
			<h3 style="color:<?php echo $headingcolor; ?>"><?php echo $headingtext; ?></h3>
			<i class="<?php echo $icon.' '.$icon_size. '' .(!empty($icon_extra) ? $icon_extra : '') ?>"></i>
			<p style="color: <?php echo $paragraphcolor; ?>"><?php echo $paragraphtext; ?></p>
		</div>
<?php endif; ?>
<?php if($show_read_more) : ?>
	<?php if($center_read_more == 1): ?>
		<div class="span7 text-center">
	<?php endif; ?>
	<a class="readmore <?php echo $buttonstyle; ?>" href="<?php echo $read_more_link; ?>"><?php echo $read_more_text; ?></a>
	<?php if($center_read_more == 1): ?>
		</div>
	<?php endif; ?>
<?php endif; ?>