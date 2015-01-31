<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
  <!-- wp_head begain -->
  <?php wp_head(); ?>
  <!-- wp_head end -->	
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri();?>/css/bootstrap-responsive.css" rel="stylesheet">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
  <![endif]-->
  <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js" type="text/javascript"></script>

</head>
<body <?php body_class(); ?>>
	<div class="container">

    <div class="page-header">
      <ul class="nav nav-pills">
        <li><a href="/"><i class="icon-home"></i>首页</a></li>
        <li><a href="/wp-login.php">会员登录</a></li>
        <li><a href="/wp-login.php?action=register">会员注册</a></li>
        <li><a href="/?p=700">参会申请</a></li>
        <li class="pull-right"><a href="#" id="weixin" rel="popover" data-placement="bottom"><img src="<?php echo get_template_directory_uri();?>/images/weixin.png"> </a></li>
        <li class="pull-right"><a href="http://weibo.com/bjtangren"><img src="<?php echo get_template_directory_uri();?>/images/weibo.png"> </a></li>
        <li class="pull-right"><a href="/?p=473"><img src="<?php echo get_template_directory_uri();?>/images/tel.png"> </a></li>
        <li class="pull-right"><a href="/?p=473"><img src="<?php echo get_template_directory_uri();?>/images/email.png"> </a></li>
      </ul>
      <!-- wexin popover -->
      <script>
      $(function (){ $("#weixin").popover({html:true,title: '扫码关注微信帐号', content: "<img src='<?php echo get_template_directory_uri();?>/images/wxew.png'>"});
      });
      </script>
      <div class="row-fluid" style="border-top:1px solid #E90E22;">
        <div class="span6">
          <a href="/"><img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt=""></a>
        </div>
        <div class="span6 pull-right text-right">
          <span style='display:block;line-height:65px;font-family:"仿宋";font-size:24px;font-weight:bold;color:#E70012;'>圈层创造价值 专业改变行业</span>
          <?php get_search_form(); ?>
        </div>
      </div>
    </div>

    <div class="navbar">
      <div class="navbar-inner">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="nav-collapse collapse navbar-responsive-collapse">
<?php   
wp_nav_menu( array(   
'theme_location' => 'top-menu',   
'depth' => 2,   
'container' => false,   
'menu_class' => 'nav navbar-nav',   
'fallback_cb' => 'wp_page_menu',   
//添加或更改walker参数   
'walker' => new GWalker_Nav_Menu())   
);   
?>  
          </div><!-- /.nav-collapse -->
      </div><!-- /navbar-inner -->
    </div><!-- /navbar -->