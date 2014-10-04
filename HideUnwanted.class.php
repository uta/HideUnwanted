<?php
class HideUnwanted {
  public static function hide(&$skin, &$template) {
    global $wgHideUnwantedFooters, $wgHideUnwantedHeaders, $wgHideUnwantedTabs;
    self::hideFooters($wgHideUnwantedFooters, $template);
    self::hideHeaders($wgHideUnwantedHeaders, $template);
    self::hideTabs($wgHideUnwantedTabs, $template);
  }

  private static function hideFooters($footers, &$template) {
    if(is_array($footers)) {
      foreach($footers as $footer) {
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

  private static function hideHeaders($headers, &$template) {
    if(is_array($headers)) {
      foreach($headers as $header) {
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

  private static function hideTabs($tabs, &$template) {
    if(is_array($tabs)) {
      foreach($tabs as $tab) {
        switch($tab) {
          case 'delete':
            unset($template->data['content_actions']['delete']);
            break;
          case 'edit':
            unset($template->data['content_actions']['edit']);
            break;
          case 'history':
            unset($template->data['content_actions']['history']);
            break;
          case 'move':
            unset($template->data['content_actions']['move']);
            break;
          case 'protect':
            unset($template->data['content_actions']['protect']);
            unset($template->data['content_actions']['unprotect']);
            break;
          case 'talk':
            unset($template->data['content_actions']['talk']);
            break;
          case 'viewsource':
            unset($template->data['content_actions']['viewsource']);
            break;
          case 'watch':
            unset($template->data['content_actions']['watch']);
            unset($template->data['content_actions']['unwatch']);
            break;
        }
      }
    }
    return true;
  }

  private static function remove(&$arr, $str) {
    $i = array_search($str, $arr);
    if($arr[$i]==$str) { array_splice($arr, $i, 1); }
  }
}
