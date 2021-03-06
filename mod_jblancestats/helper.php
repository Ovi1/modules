<?php
/**
 * @company		:	BriTech Solutions
 * @created by	:	JoomBri Team
 * @contact		:	www.joombri.in, support@joombri.in
 * @created on	:	25 June 2012
 * @file name	:	modules/mod_jblancestats/helper.php
 * @copyright   :	Copyright (C) 2012 - 2015 BriTech Solutions. All rights reserved.
 * @license     :	GNU General Public License version 2 or later
 * @author      :	Faisel
 * @description	: 	Entry point for the component (jblance)
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
include_once(JPATH_ADMINISTRATOR.'/components/com_jblance/helpers/jblance.php');	//include this helper file to make the class accessible in all other PHP files

class ModJblanceStatsHelper {	
	public static function getTotalProjects(){
		$db	 = JFactory::getDbo();
		$now  = JFactory::getDate();
			
		$query = "SELECT COUNT(*) FROM #__jblance_project p WHERE p.approved=1 AND ".$db->quote($now)." > p.start_date ";	
		$db->setQuery($query);
		$total_jobs = $db->loadResult();

		return $total_jobs;
	}
	
	public static function getActiveProjects(){
		$db	 = JFactory::getDbo();
		$now  = JFactory::getDate();

		$where = "WHERE p.status=".$db->quote('COM_JBLANCE_OPEN')." AND p.approved=1 AND ".$db->quote($now)." > p.start_date";
			
		$query = "SELECT COUNT(*) FROM #__jblance_project p ".
				 $where;//echo $query;
		$db->setQuery($query);
		$active_project = $db->loadResult();

		return $active_project;
	}
	
	public static function getTotalUsers(){
		$db	 = JFactory::getDbo(); 		
			
		$query = "SELECT COUNT(*) FROM #__jblance_user ju ".
				 "LEFT JOIN #__users u ON u.id=ju.user_id ".
				 "WHERE u.block=0";
		$db->setQuery($query);
		$total_users = $db->loadResult();		
		
		return $total_users;
	}
}
?>