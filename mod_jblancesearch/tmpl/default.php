<?php
/**
 * @company		:	BriTech Solutions
 * @created by	:	JoomBri Team
 * @contact		:	www.joombri.in, support@joombri.in
 * @created on	:	29 March 2012
 * @file name	:	modules/mod_jblancesearch/tmpl/default.php
 * @copyright   :	Copyright (C) 2012 - 2015 BriTech Solutions. All rights reserved.
 * @license     :	GNU General Public License version 2 or later
 * @author      :	Faisel
 * @description	: 	Entry point for the component (jblance)
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

$document = JFactory::getDocument();
$direction = $document->getDirection();
$config = JblanceHelper::getConfig();

if ($config->loadBootstrap) {
  JHtml::_('bootstrap.loadCss', true, $direction);
}
$document->addStyleSheet("modules/mod_jblancesearch/css/style.css");

$currencysym = $config->currencySymbol;

$set_Itemid = intval($params->get('set_itemid', 0));
$Itemid = ($set_Itemid > 0) ? '&Itemid=' . $set_Itemid : '';

$sh_category = $params->get('category', 1);
$sh_status = $params->get('status', 1);
$sh_budget = $params->get('budget', 1);

//check of all other three fields are hidden
$isOnlyKeywords = false;
if ($sh_category == 0 && $sh_status == 0 && $sh_budget == 0) {
  $isOnlyKeywords = true;
}
?>
<?php if ($isOnlyKeywords == false) : ?>
  <form class="form-horizontal" action="index.php" method="get" name="userForm" >
    <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <input placeholder="<?php echo JText::_('MOD_JBLANCE_ENTER_KEYWORD'); ?>:" type="text" class="form-control" name="keyword" id="keyword" />
      </div>
    </div>

    <?php if ($sh_budget == 1) { ?>
      <div class="col-md-3">
      <div class="form-group">
        <div class="input-group">
          <label class="input-group-addon" for="min_bud"><?php echo JText::_('MOD_JBLANCE_MIN_BUDGET'); ?>: </label>
          <input type="text" class="form-control" name="min_bud" />
          <span class="input-group-addon"><?php echo $currencysym; ?></span>
        </div>
      </div>
      </div>
      <div class="col-md-3">
      <div class="form-group">
        <div class="input-group">
          <label class="input-group-addon" for="max_bud"><?php echo JText::_('MOD_JBLANCE_MAX_BUDGET'); ?>: </label>
          <input type="text" class="form-control" name="max_bud" />
          <span class="input-group-addon"><?php echo $currencysym; ?></span>
        </div>
      </div>
      </div>
    <?php } ?>
    <?php if ($sh_status == 1) { ?>
      <div class="col-md-3">
      <div class="form-group">
      <div class="input-group">
        <label class="input-group-addon" for="status"><?php echo JText::_('MOD_JBLANCE_STATUS'); ?>: </label>
        <?php
        $list_categ = ModJblanceSearchHelper::getSelectProjectStatus();
        echo $list_categ;
        ?>
      </div>
      </div>
      </div>
    <?php } ?>
    
  <?php if ($sh_category == 1) { ?>
      <div class="col-md-4">
      <div class="form-group">
      <div class="input-group">
        <label class="input-group-addon" for="id_categ"><?php echo JText::_('MOD_JBLANCE_CATEGORY'); ?>: </label>

        <?php
      
        $list_categ = ModJblanceSearchHelper::getListJobCateg();
        echo $list_categ;
        ?>
      </div>
      </div>
      </div>
  <?php } ?>

    <div class="col-md-4">
      <button type="submit" class="btn btn-default btn-block" value="">
        <i class="material-icons">search</i> <?php echo JText::_('MOD_JBLANCE_SEARCH'); ?>
      </button>

    </div>
    </div>
    <input type="hidden" name="option" value="com_jblance"/>
    <input type="hidden" name="view" value="project"/>
    <input type="hidden" name="layout" value="searchproject"/>
    <input type="hidden" name="Itemid" value="<?php echo $set_Itemid; ?>"/>
  </form>
<?php else : ?>
<form class="form-horizontal" id="homesearch">
    <div class="col-md-6">
    <div class="form-group">
    <div class="input-group input-group-lg">
      <input type="text" class="form-control" name="keyword" id="keyword" placeholder="<?php echo JText::_('MOD_JBLANCE_SEARCH_KEYWORD_TIPS'); ?>" />
      <span class="input-group-btn">
      <button type="submit" class="btn btn-primary"><i class="material-icons">search</i><?php echo JText::_('MOD_JBLANCE_SEARCH'); ?></button>
      </span>
    </div>
    </div>
    </div>

    <input type="hidden" name="option" value="com_jblance"/>
    <input type="hidden" name="view" value="project"/>
    <input type="hidden" name="layout" value="searchproject"/>
    <input type="hidden" name="Itemid" value="<?php echo $set_Itemid; ?>"/>
  </form>
</div>
<?php endif;