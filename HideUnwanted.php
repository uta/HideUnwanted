<?php
if(!defined('MEDIAWIKI')) die;

$dir = __DIR__;
$ext = 'HideUnwanted';

$wgExtensionCredits['other'][] = array(
  'path'            => __FILE__,
  'name'            => $ext,
  'version'         => '0.1',
  'author'          => '[https://github.com/uta uta]',
  'url'             => 'https://github.com/uta/HideUnwanted',
  'descriptionmsg'  => 'hide-unwanted-desc',
  'license-name'    => 'MIT-License',
);

$wgAutoloadClasses["${ext}Hooks"]               = "$dir/classes/${ext}Hooks.php";
$wgExtensionMessagesFiles[$ext]                 = "$dir/i18n/_backward_compatibility.php";
$wgHooks['SkinTemplateOutputPageBeforeExec'][]  = "${ext}Hooks::hide";
$wgMessagesDirs[$ext]                           = "$dir/i18n";

$wgHideUnwantedFooters                          = array();
$wgHideUnwantedHeaders                          = array();
$wgHideUnwantedTabs                             = array();
