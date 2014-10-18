<?php
if(!defined('MEDIAWIKI')) die;
class HideUnwantedHooks {
  public static function hide(&$skin, &$template) {
    self::hideFooters($template);
    self::hideHeaders($template);
    self::hideTabs($template);
  }

  private static function hideFooters(&$template) {
    global $wgHideUnwantedFooters;
    if(is_array($wgHideUnwantedFooters)) {
      foreach($wgHideUnwantedFooters as $footer) {
        switch($footer) {
          case 'about':
            self::remove($template->data['footerlinks']['places'], 'about');
            break;
          case 'copyright':
            self::remove($template->data['footerlinks']['info'],   'copyright');
            break;
          case 'disclaimer':
            self::remove($template->data['footerlinks']['places'], 'disclaimer');
            break;
          case 'lastmod':
            self::remove($template->data['footerlinks']['info'],   'lastmod');
            break;
          case 'numberofwatchingusers':
            self::remove($template->data['footerlinks']['info'],   'numberofwatchingusers');
            break;
          case 'privacy':
            self::remove($template->data['footerlinks']['places'], 'privacy');
            break;
          case 'viewcount':
            self::remove($template->data['footerlinks']['info'],   'viewcount');
            break;
        }
      }
    }
    return true;
  }

  private static function hideHeaders(&$template) {
    global $wgHideUnwantedHeaders;
    if(is_array($wgHideUnwantedHeaders)) {
      foreach($wgHideUnwantedHeaders as $header) {
        switch($header) {
          case 'login':
            unset($template->data['personal_urls']['login']);
            unset($template->data['personal_urls']['logout']);
            break;
          case 'mycontris':
            unset($template->data['personal_urls']['mycontris']);
            break;
          case 'mytalk':
            unset($template->data['personal_urls']['mytalk']);
            break;
          case 'preferences':
            unset($template->data['personal_urls']['preferences']);
            break;
          case 'userpage':
            unset($template->data['personal_urls']['userpage']);
            break;
          case 'watchlist':
            unset($template->data['personal_urls']['watchlist']);
            break;
        }
      }
    }
    return true;
  }

  private static function hideTabs(&$template) {
    global $wgHideUnwantedTabs;
    if(is_array($wgHideUnwantedTabs)) {
      foreach($wgHideUnwantedTabs as $tab) {
        switch($tab) {
          case 'delete':
            unset($template->data['content_actions']['delete']);
            unset($template->data['content_navigation']['actions']['delete']);
            break;
          case 'edit':
            unset($template->data['content_actions']['edit']);
            unset($template->data['content_navigation']['actions']['edit']);
            break;
          case 'history':
            unset($template->data['content_actions']['history']);
            unset($template->data['content_navigation']['views']['history']);
            break;
          case 'move':
            unset($template->data['content_actions']['move']);
            unset($template->data['content_navigation']['actions']['move']);
            break;
          case 'protect':
            unset($template->data['content_actions']['protect']);
            unset($template->data['content_actions']['unprotect']);
            unset($template->data['content_navigation']['actions']['protect']);
            unset($template->data['content_navigation']['actions']['unprotect']);
            break;
          case 'talk':
            unset($template->data['content_actions']['talk']);
            unset($template->data['content_navigation']['namespaces']['talk']);
            break;
          case 'viewsource':
            unset($template->data['content_actions']['viewsource']);
            unset($template->data['content_navigation']['views']['viewsource']);
            break;
          case 'watch':
            unset($template->data['content_actions']['watch']);
            unset($template->data['content_actions']['unwatch']);
            unset($template->data['content_navigation']['actions']['watch']);
            unset($template->data['content_navigation']['actions']['unwatch']);
            break;
        }
      }
    }
    return true;
  }

  private static function remove(&$arr, $str) {
    $i = array_search($str, $arr);
    if($arr[$i]==$str) {array_splice($arr, $i, 1);}
  }
}
