<?php
/**
 * @company		:	BriTech Solutions
 * @created by	:	JoomBri Team
 * @contact		:	www.joombri.in, support@joombri.in
 * @created on	:	23 January 2016
 * @file name	:	modules/mod_jblancemenu/tmpl/default.php
 * @copyright   :	Copyright (C) 2012 - 2016 BriTech Solutions. All rights reserved.
 * @license     :	GNU General Public License version 2 or later
 * @author      :	Faisel
 * @description	: 	Entry point for the component (jblance)
 */
 // no direct access
 defined('_JEXEC') or die('Restricted access');

 // Include the syndicate functions only once
 require_once __DIR__ . '/helper.php';
 
 $menutype	= $params->get('menutype', 'joombri');
 $fixed		= $params->get('fixed', '');

 $list      = ModJblanceMenuHelper::getList($params, $menutype);
 $base      = ModJblanceMenuHelper::getBase($params);
 $active    = ModJblanceMenuHelper::getActive($params);
 $active_id = $active->id;
 $path      = $base->tree;

if(count($list)){
    require JModuleHelper::getLayoutPath('mod_jblancemenu', $params->get('layout', 'default'));
}
?>