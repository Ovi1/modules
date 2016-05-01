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

//JHtml::_('bootstrap.framework');
//

$document = JFactory::getDocument();
$direction = $document->getDirection();
$config = JblanceHelper::getConfig();
$user = JFactory::getUser();

if ($config->loadBootstrap) {
    JHtml::_('bootstrap.loadCss', true, $direction);
}

$limit = $config->feedLimitDashboard;
$notifys = JblanceHelper::getFeeds($limit, 'notify'); //get the notificataion feeds
$newMsgs = JblanceHelper::countUnreadMsg();

$link_messages = JRoute::_('index.php?option=com_jblance&view=message&layout=inbox');
$link_home = '';
$link_logout = JRoute::_('index.php?option=com_users&task=user.logout&' . JSession::getFormToken() . '=1&return=' . base64_encode($link_home));
?>
<script type="text/javascript">
<!--
    function showElement(layer) {
        var myLayer = document.getElementById(layer);
        if (myLayer.style.display == "none") {
            myLayer.style.display = "block";
            myLayer.backgroundPosition = "top";
        } else {
            myLayer.style.display = "none";
        }

        //set the status to read
        var myRequest = jQuery.ajax({
            url: "index.php?option=com_jblance&task=user.setfeedread&<?php echo JSession::getFormToken() . "=1"; ?>",
            method: "POST",
            success: function (response) {
                if (response == "OK") {
                    //nothing
                } else {
                    alert(":(");
                }
            }
        });
    }
//-->
</script>


<nav class="navbar navbar-default <?php echo $fixed; ?>">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#jb-menu" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#userlogin"  data-toggle="modal" data-target="#userlogin"><?php echo $user->name; ?></a>
        </div>
        <div class="collapse navbar-collapse" id="jb-menu">
            <ul class="nav navbar-nav nav-hover">
                <?php
                $bootstrap_menu_generator = new ModJblanceMenuGenerator();
                $bootstrap_menu = $bootstrap_menu_generator->Build_BootStrap_Menu($list, $path, $active_id, 1);
                echo $bootstrap_menu;
                ?>
            </ul>

            <?php if (!$user->guest) { ?>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="javascript:void(0);" onclick="javascript:showElement('notify-menu')">
                            <i class="material-icons">notifications_none</i>
                            <?php
                            $countUnreadFeeds = countUnreadFeeds();
                            if ($countUnreadFeeds) :
                                ?>
                                <span class="notify-count"><?php echo $countUnreadFeeds; ?></span>
                            <?php endif; ?>
                        </a>

                        <div id="notify-menu" class="notify-menu animated fadeInRight" style="display: none;">
                            <a href="javascript:void(0);" style="z-index:-1" onclick="javascript:showElement('notify-menu')">
                                <i class="material-icons">close</i>                                    

                            </a>
                            <div class="notifaction-title"><?php echo JText::_('COM_JBLANCE_NOTIFICATIONS'); ?></div>
                            <div class="notifaction-body">
                                <?php
                                if (count($notifys)) {
                                    for ($i = 0, $n = count($notifys); $i < $n; $i++) {
                                        $notify = $notifys[$i];
                                        ?>
                                        <div class="media jb-borderbtm-dot">
                                            <?php echo $notify->logo; ?>
                                            <div class="media-body">
                                                <?php echo $notify->title; ?>
                                                <div>
                                                    <i class="material-icons">date_range</i> <?php echo $notify->daysago; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <div class="font16">
                                        <?php
                                        echo JText::_('COM_JBLANCE_NO_NEW_NOTIFICATION');
                                        ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo $link_messages; ?>" title="New Messages">
                            <i class="material-icons">message</i>
                            <?php if ($newMsgs) : ?>
                                <span class="notify-count"><?php echo $newMsgs; ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo $link_logout; ?>" title="<?php echo JText::_('JLOGOUT'); ?>"><i class="material-icons">exit_to_app</i>
                        </a>
                    </li>
                </ul>
            <?php } ?>
        </div><!-- /.nav-collapse -->

    </div><!-- /navbar-inner -->
</nav>

<?php

function countUnreadFeeds() {
    $db = JFactory::getDbo();
    $user = JFactory::getUser();

    $query = "SELECT COUNT(is_read) isRead FROM #__jblance_feed WHERE target=" . $db->quote($user->id) . " AND is_read=0";
    $db->setQuery($query);
    $total = $db->loadResult();
    return $total;
}
?>