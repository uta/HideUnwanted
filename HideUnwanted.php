<?php
if(!defined('MEDIAWIKI')) die;

$dir = __DIR__;
$ext = 'HideUnwanted';

$wgExtensionCredits['skin'][] = array(
  'path'            => __FILE__,
  'name'            => $ext,
  'version'         => '0.1',
  'author'          => 'uta',
  'url'             => 'https://github.com/uta/HideUnwanted',
  'descriptionmsg'  => 'hide-unwanted-desc',
  'license-name'    => 'MIT-License',
);

$event                          = 'SkinTemplateOutputPageBeforeExec';
$wgHooks[$event][]              = "$ext::hide";
$wgAutoloadClasses[$ext]        = "$dir/$ext.class.php";
$wgExtensionMessagesFiles[$ext] = "$dir/$ext.i18n.php";
$wgMessagesDirs[$ext]           = "$dir/i18n";
$wgHideUnwantedFooters          = array();
$wgHideUnwantedHeaders          = array();
$wgHideUnwantedTabs             = array();
