<?php
/**
 * @version     1.4
 * @package     mod_jumbotron
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @author      Brad Traversy <support@joomdigi.com> - http://www.bootstrapjoomla.com
 */
//No Direct Access
defined('_JEXEC') or die;
?>
<style>
<?php
if ($foreground_image_width != 'auto' || $foreground_image_width != '') {
    $foreground_image_width = $foreground_image_width . 'px';
}
?>

    .foreground_image{
        width:<?php echo $foreground_image_width; ?>
    }

<?php if (isset($background_image) && $background_image != '') : ?>
        .jumbotron{
            background:url(<?php echo JURI::base(); ?><?php echo $background_image; ?>) no-repeat <?php echo $x_pos; ?>px <?php echo $y_pos; ?>px;
            -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
        }
<?php endif; ?>

<?php if (!isset($background_image) && isset($background_color)) : ?>
        .jumbotron{
            background:<?php echo $background_color; ?>
        }
<?php endif; ?>

    .jumbotron h1{
        color:<?php echo $headingtextcolor; ?>;
<?php echo ($center_text == 1 ? 'text-align:center;' : ''); ?>
    }
    .jumbotron p{
        color:<?php echo $paragraphtextcolor; ?>;
<?php echo ($center_text == 1 ? 'text-align:center;' : ''); ?>
    }
    .jumbotron .btn{
        color:#fff !important;
<?php echo ($center_text == 1 ? 'text-align:center;' : ''); ?>
    }

    .jumbotron .foreground_image_wrap{
<?php echo ($center_text == 1 ? 'text-align:center;' : ''); ?>
    }

</style>
<div class="jumbotron <?php echo $moduleclass_sfx; ?>">
    <div class="blur"></div>
    <div class="container">
        <h1><?php echo $header_text; ?></h1>
        <p><?php echo $paragraph_text; ?></p>
        <?php if (isset($foreground_image)) : ?>
            <p class="foreground_image_wrap"><img class="foreground_image" src="<?php echo JURI::base(); ?><?php echo $foreground_image; ?>" alt="<?php echo $header_text; ?>" /></p>
        <?php endif; ?>
        <?php if ($show_read_more && $show_read_hire) : ?>

                <p>
                <a class="<?php echo $buttonstyle; ?>" role="button" href="<?php echo $read_more_link; ?>"><?php echo $read_more_text; ?></a>
                <a class="<?php echo $buttonstyle2; ?>" role="button" href="<?php echo $read_hire_link; ?>"><?php echo $read_more_hire; ?></a>
                </p>

   

        <?php endif; ?>



        <div class="row">
            <?php
            jimport('joomla.application.module.helper');
            $modules = JModuleHelper::getModules('homesearch'); // Get Modules assigned at a position myposition (Returns an array)- it can be a custom position.

            $attribs = array('style' => 'xhtml'); // define module attributes, like module chrome.

            if (count($modules) > 0) { // Checking if there are any modules 
                ?>

                <!-- Module wrapper -->
                <?php echo JModuleHelper::renderModule($modules[0], $attribs); // Render the first module of the $modules array. ?>

<?php } ?>
        </div>

    </div><!-- /.container -->
</div><!-- /.jumbotron -->
