<?php
/**
 * @package      ITPrism Modules
 * @subpackage   ITPSocialButtons
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2010 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * ITPSocialButtons is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
// no direct access
defined( "_JEXEC" ) or die;?>
<div class="itp-socialbuttons-mod<?php echo $moduleClassSfx;?>">
   <?php if($params->get('showTitle')){ ?>
   <h4><?php echo $params->get('title');?></h4>
   <?php }?>
    <div class="<?php echo $params->get('displayLines');?>">
        <div class="<?php echo $params->get('displayIcons');?>">
        <?php if($params->get("displayDelicious")) {
          echo ItpSocialButtonsHelper::getDeliciousButton($title, $link, $stylePath);
        }
        if($params->get("displayDigg")) {
            echo ItpSocialButtonsHelper::getDiggButton($title, $link, $stylePath);
        }
        if($params->get("displayFacebook")) {
            echo ItpSocialButtonsHelper::getFacebookButton($title, $link, $stylePath);
        }
        if($params->get("displayGoogle")) {
            echo ItpSocialButtonsHelper::getGoogleButton($title, $link, $stylePath);
        }
        if($params->get("displaySumbleUpon")) {
            echo ItpSocialButtonsHelper::getStumbleuponButton($title, $link, $stylePath);
        }
        if($params->get("displayTechnorati")) {
            echo ItpSocialButtonsHelper::getTechnoratiButton($title, $link, $stylePath);            
        }
        if($params->get("displayTwitter")) {
            echo ItpSocialButtonsHelper::getTwitterButton($title, $link, $stylePath);
        }
        if($params->get("displayLinkedIn")) {
            echo ItpSocialButtonsHelper::getLinkedInButton($title, $link, $stylePath);
        }
        ?>
        <?php echo ItpSocialButtonsHelper::getExtraButtons($title, $link, $params); ?>
        </div>
   </div>
</div>
