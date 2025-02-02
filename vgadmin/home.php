<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?	
	include('../connect.php');
	
	session_start();
	
	$user = $_COOKIE['user'];

	$sql_user =	" SELECT * FROM admin WHERE admin_username = '$user' ";
	$query_user = mysql_query($sql_user) or die("Can't Query");
	$row_user = mysql_fetch_array($query_user);
	$name = $row_user['admin_username'];

	if($user == ""){ header("HTTP/1.1 301 Moved Permanently"); header('Location: index.php'); exit(); }
	else if($user != $name){ header("HTTP/1.1 301 Moved Permanently"); header('Location: index.php'); exit(); }
?>
<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head>
<meta charset="utf-8">
<title>RESELLER ONLINE | Admin</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--begin::Base Styles -->
<link href="https://fonts.googleapis.com/css?family=Adamina|Roboto&display=swap" rel="stylesheet">
<link href="css/style.bundle.css" rel="stylesheet" type="text/css">
<!--end::Base Styles -->
<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
<link rel="shortcut icon" href="images/favicon.ico">
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page"> 
  <!-- BEGIN: Header -->
  <header id="m_header" class="m-grid__item m-header" m-minimize-offset="200" m-minimize-mobile-offset="200">
    <div class="m-container m-container--fluid m-container--full-height">
      <div class="m-stack m-stack--ver m-stack--desktop"> 
        <!-- BEGIN: Brand -->
        <div class="m-stack__item m-brand m-brand--skin-dark">
          <div class="m-stack m-stack--ver m-stack--general">
            <div class="m-stack__item m-stack__item--middle m-brand__tools"> 
              <!-- BEGIN: Left Aside Minimize Toggle --> 
              <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block"> <span></span> </a> 
              <!-- END --> 
              <!-- BEGIN: Responsive Aside Left Menu Toggler --> 
              <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block"> <span></span> </a> 
              <!-- END --> 
              <!-- BEGIN: Responsive Header Menu Toggler --> 
              <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block"> <span></span> </a> 
              <!-- END --> 
              <!-- BEGIN: Topbar Toggler --> 
              <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block"> <i class="flaticon-more"></i> </a> 
              <!-- BEGIN: Topbar Toggler --> 
            </div>
          </div>
        </div>
        <!-- END: Brand --> 
        <!-- BEGIN: Topbar -->
        <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
          <div class="m-stack__item m-topbar__nav-wrapper">
            <ul class="m-topbar__nav m-nav m-nav--inline">
              <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click"> <a href="#" class="m-nav__link m-dropdown__toggle"> <span class="m-topbar__userpic" style="font-family: 'Roboto', sans-serif;"> <img src="images/icon.png" class="m--img-rounded m--marginless m--img-centered"> </span> <span class="m-topbar__username m--hide">
                <?=$row_user['admin_firstname'];?>
                </span> </a>
                <div class="m-dropdown__wrapper"> <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                  <div class="m-dropdown__inner">
                    <div class="m-dropdown__header m--align-center">
                      <div class="m-card-user m-card-user--skin-dark">
                        <div class="m-card-user__pic"> <img src="images/icon.png" class="m--img-rounded m--marginless"> </div>
                        <div class="m-card-user__details"> <span class="m-card-user__name m--font-weight-500" style="font-family: 'Roboto', sans-serif;">
                          <?=$row_user['admin_firstname'];?>
                          <?=$row_user['admin_lastname'];?>
                          </span> <a href="" class="m-card-user__email m--font-weight-300 m-link" style="font-family: 'Roboto', sans-serif;">
                          <?=$row_user['admin_email'];?>
                          </a> </div>
                      </div>
                    </div>
                    <div class="m-dropdown__body">
                      <div class="m-dropdown__content">
                        <ul class="m-nav m-nav--skin-light">
                          <li class="m-nav__section m--hide"> <span class="m-nav__section-text"> Section </span> </li>
                          <li class="m-nav__item"> <a href="profile/" class="m-nav__link"> <span class="m-nav__link-text" style="font-family: 'Roboto', sans-serif;"> My Profile </span> </a> </li>
                          <li class="m-nav__item"> <a href="logout/" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" style="font-family: 'Roboto', sans-serif;"> Logout </a> </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <!-- END: Topbar --> 
        
      </div>
    </div>
  </header>
  <!-- END: Header --> 
  <!-- begin::Body -->
  <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body"> 
    <!-- BEGIN: Left Aside -->
    <button class="m-aside-left-close  m-aside-left-close--skin-dark" id="m_aside_left_close_btn"> <i class="la la-close"></i> </button>
    <div id="m_aside_left" class="m-grid__item m-aside-left m-aside-left--skin-dark"> 
      <!-- BEGIN: Aside Menu -->
      <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark" m-menu-vertical="1" m-menu-scrollable="0"  m-menu-dropdown-timeout="500">
        <ul class="m-menu__nav m-menu__nav--dropdown-submenu-arrow">
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="profile/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif; color:#F00;"> CHANGE PROFILE </span> </a> </li>
          <? if($row_user['admin_status_country'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="country/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Country </span> </a> </li>
          <? } else if($row_user['admin_status_country'] == '') { } ?>
          <? if($row_user['admin_status_category'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="category/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Product Category </span> </a> </li>
          <? } else if($row_user['admin_status_category'] == '') { } ?>
          <? if($row_user['admin_status_fabrictype'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="fabrictype/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Fabric Type </span> </a> </li>
          <? } else if($row_user['admin_status_fabrictype'] == '') { } ?>
          <? if($row_user['admin_status_fabricbrand'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="fabricbrand/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Fabric Brand </span> </a> </li>
          <? } else if($row_user['admin_status_fabricbrand'] == '') { } ?>
          <? if($row_user['admin_status_parameter'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="parameter/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Other Pricing Parameter </span> </a> </li>
          <? } else if($row_user['admin_status_parameter'] == '') { } ?>
          <? if($row_user['admin_status_extraoption'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="extraoption/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Extra Option </span> </a> </li>
          <? } else if($row_user['admin_status_extraoption'] == '') { } ?>
          <? if($row_user['admin_status_fabrics'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Fabrics </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Fabrics </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="fabrics/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="fabrics/jacket.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Jacket Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="fabrics/jeans.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Jeans Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="fabrics/overcoat.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Overcoat Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="fabrics/pants.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Pants Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="fabrics/shirt.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Shirt Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="fabrics/suit.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Suit Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="fabrics/vest.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Vest Fabrics </span> </a> </li>
              </ul>
            </div>
          </li>
          <? } else if($row_user['admin_status_fabrics'] == '') { } ?>
          <? if($row_user['admin_status_lining'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Lining </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Lining </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="lining/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Lining </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="lining/jacket.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Jacket Lining </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="lining/overcoat.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Overcoat Lining </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="lining/pants.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Pants Lining </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="lining/suit.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Suit Lining </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="lining/vest.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Vest Lining </span> </a> </li>
              </ul>
            </div>
          </li>
          <? } else if($row_user['admin_status_lining'] == '') { } ?>
          <? if($row_user['admin_status_tie'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Tie </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Tie </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="tie/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Tie </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="tie/view.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Tie </span> </a> </li>
              </ul>
            </div>
          </li>
          <? } else if($row_user['admin_status_tie'] == '') { } ?>
          <? if($row_user['admin_status_buttons'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Buttons </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Buttons </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="buttons/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Buttons </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="buttons/jacket.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Jacket Buttons </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="buttons/overcoat.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Overcoat Buttons </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="buttons/pants.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Pants Buttons </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="buttons/shirt.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Shirt Buttons </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="buttons/suit.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Suit Buttons </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="buttons/vest.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Vest Buttons </span> </a> </li>
              </ul>
            </div>
          </li>
          <? } else if($row_user['admin_status_buttons'] == '') { } ?>
          <? if($row_user['admin_status_design'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="design/view.php" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Design Option </span> </a> </li>
          <? } else if($row_user['admin_status_design'] == '') { } ?>
          <? if($row_user['admin_status_orderform'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="orderform/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Update Order Form </span> </a> </li>
          <? } else if($row_user['admin_status_orderform'] == '') { } ?>
          <? if($row_user['admin_status_reseller'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Reseller </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Reseller </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="reseller/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Reseller </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="reseller/view.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Reseller </span> </a> </li>
              </ul>
            </div>
          </li>
          <? } else if($row_user['admin_status_reseller'] == '') { } ?>
          <? if($row_user['admin_status_orders'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="orders/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Orders </span> </a> </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="inprocessorders/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> In-Process Orders </span> </a> </li>
          <? } else if($row_user['admin_status_orders'] == '') { } ?>
          <? if($row_user['admin_status_reports'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Reports </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Reports </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="report/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Report </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="categorywise/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Categorywise Sales Report </span> </a> </li>
              </ul>
            </div>
          </li>
          <? } else if($row_user['admin_status_reports'] == '') { } ?>
          <? if($row_user['admin_status_create_invoice'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Invoice </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Invoice </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="invoice/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Invoice </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="invoice/view.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Invoice </span> </a> </li>
              </ul>
            </div>
          </li>
          <? } else if($row_user['admin_status_create_invoice'] == '') { } ?>
          <? if($row_user['admin_status_subuser'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Sub User </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Sub User </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="subuser/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Sub User </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="subuser/view.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Sub User </span> </a> </li>
              </ul>
            </div>
          </li>
          <? } else if($row_user['admin_status_subuser'] == '') { } ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="logout/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif; color:#F00;"> LOGOUT </span> </a> </li>
        </ul>
      </div>
      <!-- END: Aside Menu --> 
    </div>
    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper"> 
      <!-- begin::Body --> 
      
      <!-- end::Body --> 
    </div>
  </div>
  <!-- end:: Body --> 
  <!-- begin::Footer -->
  <footer class="m-grid__item m-footer">
    <div class="m-container m-container--fluid m-container--full-height m-page__container">
      <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
        <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last" align="right"> <span class="m-footer__copyright"> 2019 &copy; Reseller Online </span> </div>
      </div>
    </div>
  </footer>
  <!-- end::Footer --> 
</div>
<!-- end:: Page --> 
<!--begin::Base Scripts --> 
<script src="js/vendors.bundle.js" type="text/javascript"></script> 
<script src="js/scripts.bundle.js" type="text/javascript"></script> 
<!--end::Base Scripts -->
</body>
<!-- end::Body -->
</html>
