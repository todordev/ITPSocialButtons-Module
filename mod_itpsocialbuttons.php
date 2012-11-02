<?php
/**
 * @package      ITPrism Modules
 * @subpackage   ITPSocialButtons
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2010 Todor Iliev <todor.iliev@itprism.com>. All rights reserved.
 * @license      http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * ITPSocialButtons is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

// no direct access
defined( "_JEXEC" ) or die;

JLoader::register('ItpSocialButtonsHelper', dirname(__FILE__).DIRECTORY_SEPARATOR.'helper.php');

$urlPath        = JURI::base() . "modules/mod_itpsocialbuttons/";
$moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

$doc = JFactory::getDocument();
/** $doc JDocumentHTML **/

// Loading style.css
if($params->get("loadCss")) {
    $doc->addStyleSheet($urlPath . "style.css");
}

$link  	 	= JURI::getInstance()->toString();
$title  	= $doc->getTitle();

$title      = rawurlencode($title);
$link       = rawurlencode($link);

// Short URL service
if($params->get("shortUrlService")) {
    $link = ItpSocialButtonsHelper::getShortUrl($link, $params);
}

$stylePath = $urlPath."images/".$params->get("icons_package");

require JModuleHelper::getLayoutPath('mod_itpsocialbuttons', $params->get('layout', 'default'));

