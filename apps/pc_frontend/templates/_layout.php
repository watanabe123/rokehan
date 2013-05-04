<!DOCTYPE html>
<html lang="en">

<head>
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>
<?php include_stylesheets() ?>
<?php if (Doctrine::getTable('SnsConfig')->get('customizing_css')): ?>
<link rel="stylesheet" type="text/css" href="<?php echo url_for('@customizing_css') ?>" />
<?php endif; ?>
<?php if (opConfig::get('enable_jsonapi') && opToolkit::isSecurePage()): ?>
<?php
use_helper('Javascript');

use_javascript('jquery.min.js');
use_javascript('jquery.tmpl.min.js');
use_javascript('jquery.notify.js');
use_javascript('op_notify.js');
$jsonData = array(
  'apiKey' => $sf_user->getMemberApiKey(),
  'apiBase' => app_url_for('api', 'homepage'),
);

$json = defined('JSON_PRETTY_PRINT') ? json_encode($jsonData, JSON_PRETTY_PRINT) : json_encode($jsonData);

echo javascript_tag('
var openpne = '.$json.';
');
?>
<?php endif ?>
<?php include_javascripts() ?>
<?php echo $op_config->get('pc_html_head') ?>

    <meta charset="utf-8">
    <title>Trublu - Design Gallery Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content>
    <meta name="author" content>




    <!-- Le styles -->
    <link href="/openpne/rokehan/web/assets/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {

        padding-bottom: 40px;
      }
    </style>



   <link href='http://fonts.googleapis.com/css?family=Days+One' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>






    <link href="/openpne/rokehan/web/assets/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="trueblue_files/favicon0.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body class="mainblock">


  <body id="<?php printf('page_%s_%s', $view->getModuleName(), $view->getActionName()) ?>" class="<?php echo opToolkit::isSecurePage() ? 'secure_page' : 'insecure_page' ?>">
<?php echo $op_config->get('pc_html_top2') ?>
<div id="Body">
<?php echo $op_config->get('pc_html_top') ?>
<div id="Container">
<!--
<div id="Header">
<div id="HeaderContainer">
<?php //include_partial('global/header') ?>
</div>
</div>
-->
<div id="Contents">
<div id="ContentsContainer">

<div id="localNav">
<?php
$context = sfContext::getInstance();
$module = $context->getActionStack()->getLastEntry()->getModuleName();
$localNavOptions = array(
  'is_secure' => opToolkit::isSecurePage(),
  'type'      => sfConfig::get('sf_nav_type', sfConfig::get('mod_'.$module.'_default_nav', 'default')),
  'culture'   => $context->getUser()->getCulture(),
);
if ('default' !== $localNavOptions['type'])
{
  $localNavOptions['nav_id'] = sfConfig::get('sf_nav_id', $context->getRequest()->getParameter('id'));
}
include_component('default', 'localNav', $localNavOptions);
?>
</div><!-- localNav -->

<div id="Layout<?php echo $layout ?>" class="Layout">

<?php if ($sf_user->hasFlash('error')): ?>
<?php op_include_parts('alertBox', 'flashError', array('body' => __($sf_user->getFlash('error'), $sf_data->getRaw('sf_user')->getFlash('error_params', array())))) ?>
<?php endif; ?>
<?php if ($sf_user->hasFlash('notice')): ?>
<?php op_include_parts('alertBox', 'flashNotice', array('body' => __($sf_user->getFlash('notice'), $sf_data->getRaw('sf_user')->getFlash('notice_params', array())))) ?>
<?php endif; ?>

<?php if (has_slot('op_top')): ?>
<div id="Top">
<?php include_slot('op_top') ?>
</div><!-- Top -->
<?php endif; ?>

<?php if (has_slot('op_sidemenu')): ?>
<div id="Left">
<?php include_slot('op_sidemenu') ?>

</div><!-- Left -->
<?php endif; ?>

<div id="Center">
<?php echo $sf_content ?>
</div><!-- Center -->

<?php if (has_slot('op_bottom')): ?>
<div id="Bottom">
<?php include_slot('op_bottom') ?>
</div><!-- Bottom -->
<?php endif; ?>

</div><!-- Layout -->

<div id="sideBanner">
<?php include_component('default', 'sideBannerGadgets'); ?>
</div><!-- sideBanner -->

</div><!-- ContentsContainer -->
</div><!-- Contents -->

<?php if ($sf_request->isSmartphone(false)): ?>
<div id="SmtSwitch">
<a href="javascript:void(0)" id="SmtSwitchLink"><?php echo __('View this page on smartphone style') ?></a>
<?php echo javascript_tag('
document.getElementById("SmtSwitchLink").addEventListener("click", function() {
  opCookie.set("disable_smt", "0");
  location.reload();
}, false);
') ?>
</div>
<?php endif ?>

<div id="Footer">
<div id="FooterContainer">
<?php include_partial('global/footer') ?>
</div><!-- FooterContainer -->
</div><!-- Footer -->

<?php echo $op_config->get('pc_html_bottom2') ?>
</div><!-- Container -->
<?php echo $op_config->get('pc_html_bottom') ?>
</div><!-- Body -->
</body>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="assets/jquery.js"></script>-->
    <script src="/openpne/rokehan/web/assets/bootstrap.js"></script>
    <script src="/openpne/rokehan/web/assets/bootstrap-transition.js"></script>
    <script src="/openpne/rokehan/web/assets/bootstrap-alert.js"></script>
    <script src="/openpne/rokehan/web/assets/bootstrap-modal.js"></script>
    <script src="/openpne/rokehan/web/assets/bootstrap-dropdown.js"></script>
    <script src="/openpne/rokehan/web/assets/bootstrap-scrollspy.js"></script>
    <script src="/openpne/rokehan/web/assets/bootstrap-tab.js"></script>
    <script src="/openpne/rokehan/web/assets/bootstrap-tooltip.js"></script>
    <script src="/openpne/rokehan/web/assets/bootstrap-popover.js"></script>
    <script src="/openpne/rokehan/web/assets/bootstrap-button.js"></script>
    <script src="/openpne/rokehan/web/assets/bootstrap-collapse.js"></script>
    <script src="/openpne/rokehan/web/assets/bootstrap-carousel.js"></script>
    <script src="/openpne/rokehan/web/assets/bootstrap-typeahead.js"></script>

  </body>
</html>