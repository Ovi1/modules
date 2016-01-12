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

/* Params */
$moduleclass_sfx = 	htmlspecialchars($params->get('moduleclass_sfx'));
$show_read_more =  	$params->get('show_read_more',1);
$read_more_text =  	htmlspecialchars($params->get('read_more_text','Read More'));
$read_more_link =  	htmlspecialchars($params->get('read_more_link','#'));
$headingtext = 		htmlspecialchars($params->get('headingtext','Bootstrap Block'));
$paragraphtext =  	htmlspecialchars($params->get('paragraphtext'));
$paragraphcolor =  	htmlspecialchars($params->get('paragraphcolor'));
$headingcolor =  	htmlspecialchars($params->get('headingcolor'));
$show_icon =  		$params->get('show_icon');
$icon =  		$params->get('icon','fa fa-check-square');
$icon_size = $params->get('icon_size','fa-3');
$icon_extra =  		$params->get('icon_extra');
$icon_position = $params->get('icon_position','heading-left');
$buttonstyle =  $params->get('buttonstyle','btn btn-primary');
$center_read_more =  		$params->get('center_read_more');

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

require JModuleHelper::getLayoutPath('mod_bootstrapblock', $params->get('layout', 'default'));
?>