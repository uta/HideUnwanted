<?php
if(!defined('MEDIAWIKI')) die;
class HideUnwantedHooks {
  public static function hide(&$skin, &$template) {
    self::hideFooters($template);
    self::hideHeaders($template);
    self::hideTabs($template);
    self::hideToolboxes($template);
  }

  private static function hideFooters(&$template) {
    global $wgHideUnwantedFooters;
    if(is_array($wgHideUnwantedFooters)) {
      foreach($wgHideUnwantedFooters as $footer) {
        switch($footer) {
          case 'about':
          case 'disclaimer':
          case 'privacy':
            self::remove($template->data['footerlinks']['places'], $footer);
            break;
          case 'copyright':
          case 'lastmod':
          case 'numberofwatchingusers':
          case 'viewcount':
            self::remove($template->data['footerlinks']['info'], $footer);
            break;
        }
      }
    }
  }

  private static function hideHeaders(&$template) {
    global $wgHideUnwantedHeaders;
    if(is_array($wgHideUnwantedHeaders)) {
      foreach($wgHideUnwantedHeaders as $header) {
        switch($header) {
          case 'login':
            unset($template->data['personal_urls'][$header]);
            unset($template->data['personal_urls']['logout']);
            break;
          case 'mycontris':
          case 'mytalk':
          case 'preferences':
          case 'userpage':
          case 'watchlist':
            unset($template->data['personal_urls'][$header]);
            break;
        }
      }
    }
  }

  private static function hideTabs(&$template) {
    global $wgHideUnwantedTabs;
    if(is_array($wgHideUnwantedTabs)) {
      foreach($wgHideUnwantedTabs as $tab) {
        switch($tab) {
          case 'delete':
          case 'edit':
          case 'move':
            unset($template->data['content_actions'][$tab]);
            unset($template->data['content_navigation']['actions'][$tab]);
            break;
          case 'history':
          case 'viewsource':
            unset($template->data['content_actions'][$tab]);
            unset($template->data['content_navigation']['views'][$tab]);
            break;
          case 'protect':
          case 'watch':
            unset($template->data['content_actions'][$tab]);
            unset($template->data['content_actions']["un$tab"]);
            unset($template->data['content_navigation']['actions'][$tab]);
            unset($template->data['content_navigation']['actions']["un$tab"]);
            break;
          case 'talk':
            unset($template->data['content_actions'][$tab]);
            unset($template->data['content_navigation']['namespaces'][$tab]);
            break;
        }
      }
    }
  }

  private static function hideToolboxes(&$template) {
    global $wgHideUnwantedToolboxes;
    if(is_array($wgHideUnwantedToolboxes)) {
      foreach($wgHideUnwantedToolboxes as $toolbox) {
        switch($toolbox) {
          case 'blockip':
          case 'contributions':
          case 'emailuser':
          case 'info':
          case 'log':
          case 'permalink':
          case 'print':
          case 'recentchangeslinked':
          case 'specialpages':
          case 'upload':
          case 'userrights':
          case 'whatlinkshere':
            unset($template->data['nav_urls'][$toolbox]);
            break;
        }
      }
    }
  }

  private static function remove(&$arr, $str) {
    $i = array_search($str, $arr);
    if($arr[$i]==$str) {array_splice($arr, $i, 1);}
  }
}
