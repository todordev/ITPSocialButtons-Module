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
defined('_JEXEC') or die('Restricted access');

class ItpSocialButtonsHelper{
    
    /**
     * A method that make a long url to short url
     * 
     * @param string $link
     * @param array $params
     * @return string
     */
    public static function getShortUrl($link, $params){
        
        JLoader::register("ItpShortUrlSocialButtons",JPATH_PLUGINS.DS."content".DS."itpsocialbuttons".DS."itpshorturlsocialbuttons.php");
        $options = array(
            "login"     => $params->get("login"),
            "apiKey"    => $params->get("apiKey"),
            "service"   => $params->get("shortUrlService"),
        );
        $shortUrl = new ItpShortUrlSocialButtons($link,$options);
        $shortLink = $shortUrl->getUrl();
        if(!$shortLink) {
            jimport( 'joomla.error.log' );
            // get an instance of JLog for myerrors log file
            $log = JLog::getInstance();
            // create entry array
            $entry = array(
                'LEVEL' => '1',
                'STATUS' => "ITPSocialButtons",
                'COMMENT' => $shortUrl->getError()
            );
            // add entry to the log
            $log->addEntry($entry);
        } else {
            $link = $shortLink;
        }
        
        return $link;
            
    }
    
    /**
     * Generate a code for the extra buttons. 
     * Is also replace indicators {URL} and {TITLE} with that of the article.
     * 
     * @param string $title Article Title
     * @param string $url   Article URL
     * @param array $params Plugin parameters
     * 
     * @return string
     */
    public static function getExtraButtons($title, $url, &$params) {
        
        $html  = "";
        // Extra buttons
        for($i=1; $i < 6;$i++) {
            $btnName = "ebuttons" . $i;
            $extraButton = $params->get($btnName, "");
            if(!empty($extraButton)) {
                $extraButton = str_replace("{URL}", $url,$extraButton);
                $extraButton = str_replace("{TITLE}", $title,$extraButton);
                $html  .= $extraButton;
            }
        }
        
        return $html;
    }
    
    public static function getDeliciousButton($title, $link, $style){
            
        $img_url = $style. "/delicious.png";
        
        return '<a href="http://del.icio.us/post?url=' . $link . '&amp;title=' . $title . '" title="' . JText::sprintf("MOD_ITPSOCIALBUTTONS_SUBMIT", "Delicious") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_ITPSOCIALBUTTONS_SUBMIT", "Delicious") . '" />
        </a>';
    
    }
    
    public static function getDiggButton($title, $link, $style){
        
        $img_url = $style . "/digg.png";
        
        return '<a href="http://digg.com/submit?url=' . $link . '&amp;title=' . $title . '" title="' . JText::sprintf("MOD_ITPSOCIALBUTTONS_SUBMIT", "Digg") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_ITPSOCIALBUTTONS_SUBMIT", "Digg") . '" />
        </a>';
    
    }
    
    public static function getFacebookButton($title, $link, $style){
        
        $img_url = $style . "/facebook.png";
        
        return '<a href="http://www.facebook.com/sharer.php?u=' . $link . '&amp;t=' . $title . '" title="' . JText::sprintf("MOD_ITPSOCIALBUTTONS_SUBMIT", "Facebook") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_ITPSOCIALBUTTONS_SUBMIT", "Facebook") . '" />
        </a>';
    
    }
    
    public static function getGoogleButton($title, $link, $style){
        
        $img_url = $style . "/google.png";
        
        return '<a href="http://www.google.com/bookmarks/mark?op=edit&amp;bkmk=' . $link . '" title="' . JText::sprintf("MOD_ITPSOCIALBUTTONS_SUBMIT", "Google Bookmarks") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_ITPSOCIALBUTTONS_SUBMIT", "Google Bookmarks") . '" />
        </a>';
    
    }
    
    public static function getStumbleuponButton($title, $link, $style){
        
        $img_url = $style . "/stumbleupon.png";
        
        return '<a href="http://www.stumbleupon.com/submit?url=' . $link . '&amp;title=' . $title . '" title="' . JText::sprintf("MOD_ITPSOCIALBUTTONS_SUBMIT", "Stumbleupon") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_ITPSOCIALBUTTONS_SUBMIT", "Stumbleupon") . '" />
        </a>';
    
    }
    
    public static function getTechnoratiButton($title, $link, $style){
        
        $img_url = $style . "/technorati.png";
        
        return '<a href="http://technorati.com/faves?add=' . $link . '" title="' . JText::sprintf("MOD_ITPSOCIALBUTTONS_SUBMIT", "Technorati") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_ITPSOCIALBUTTONS_SUBMIT", "Technorati") . '" />
        </a>';
    
    }
    
    public static function getTwitterButton($title, $link, $style){
        
        $img_url = $style . "/twitter.png";
        
        return '<a href="http://twitter.com/share?text=' . $title . "&amp;url=" . $link . '" title="' . JText::sprintf("MOD_ITPSOCIALBUTTONS_SUBMIT", "Twitter") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_ITPSOCIALBUTTONS_SUBMIT", "Twitter") . '" />
        </a>';
    
    }
    
    public static function getLinkedInButton($title, $link, $style){
        
        $img_url = $style . "/linkedin.png";
        
        return '<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=' . $link .'&amp;title=' . $title . '" title="' . JText::sprintf("MOD_ITPSOCIALBUTTONS_SUBMIT", "LinkedIn") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_ITPSOCIALBUTTONS_SUBMIT", "LinkedIn") . '" />
        </a>';
    
    }
}