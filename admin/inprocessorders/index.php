<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?	
	include('../../connect.php');
	
	session_start();
	
	$user = $_COOKIE['user'];

	$sql_user =	" SELECT * FROM admin WHERE admin_username = '$user' ";
	$query_user = mysql_query($sql_user) or die("Can't Query");
	$row_user = mysql_fetch_array($query_user);
	$name = $row_user['admin_username'];

	if($user == ""){ header("HTTP/1.1 301 Moved Permanently"); header('Location: ../'); exit(); }
	else if($user != $name){ header("HTTP/1.1 301 Moved Permanently"); header('Location: ../'); exit(); }
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
<link href="../css/vendors.bundle.css" rel="stylesheet" type="text/css">
<link href="../css/style.bundle.css" rel="stylesheet" type="text/css">
<link href="../css/datatables.bundle.css" rel="stylesheet" type="text/css">
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
<style type="text/css">
#printable {
	display: block;
}

@media print {
#non-printable {
	display: none;
}
#printable {
	display: block;
}
}
</style>
<link rel="shortcut icon" href="../images/favicon.ico">
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
              <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click"> <a href="#" class="m-nav__link m-dropdown__toggle"> <span class="m-topbar__userpic" style="font-family: 'Roboto', sans-serif;"> <img src="../images/icon.png" class="m--img-rounded m--marginless m--img-centered"> </span> <span class="m-topbar__username m--hide">
                <?=$row_user['admin_firstname'];?>
                </span> </a>
                <div class="m-dropdown__wrapper"> <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                  <div class="m-dropdown__inner">
                    <div class="m-dropdown__header m--align-center">
                      <div class="m-card-user m-card-user--skin-dark">
                        <div class="m-card-user__pic"> <img src="../images/icon.png" class="m--img-rounded m--marginless"> </div>
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
                          <li class="m-nav__item"> <a href="" class="m-nav__link"> <span class="m-nav__link-text" style="font-family: 'Roboto', sans-serif;"> My Profile </span> </a> </li>
                          <li class="m-nav__item"> <a href="../logout/" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" style="font-family: 'Roboto', sans-serif;"> Logout </a> </li>
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
    <? include('../header/index.php'); ?>
    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper"> 
      <!-- BEGIN: Subheader -->
      
      <div class="m-content">
        <div id="non-printable">
          <div class="col-md-12">
            <div class="m-portlet m-portlet--tab">
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption" align="center">
                  <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text" style="text-transform:uppercase;" style="font-family: 'Roboto', sans-serif;">
                    <strong> In-Process Orders </strong>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body">
              <div id="non-printable">
                <div align="left">
                  <div class="col-md-12">
                    <label style="font-family: 'Roboto', sans-serif;"> <a href="index.php"> All Reseller </a> </label>
                    <br>
                    <br>
                    <br>
                  </div>
                  <form class="m-form m-form--fit m-form--label-align-right" action="search.php" method="post">
                    <div class="col-md-12">
                      <label style="font-family: 'Roboto', sans-serif;"> Search by Reseller &nbsp;&nbsp;&nbsp;&nbsp; </label>
                      <label style="font-family: 'Roboto', sans-serif;">
                        <select class="form-control m-input" name="reseller" id="reseller">
                          <?
                      $strSQL = " SELECT * FROM admin_reseller WHERE reseller_status = 'T' AND reseller_type = 'Admin' ORDER BY id ASC ";
					  $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					  ?>
                          <option value="">--Select Reseller--</option>
                          <? while($objResult = mysql_fetch_array($objQuery)) { ?>
                          <option value="<?=$objResult["reseller_company"]?>">
                          <?=$objResult["reseller_company"]?>
                          </option>
                          <? } ?>
                        </select>
                      </label>
                      <label style="font-family: 'Roboto', sans-serif;"> &nbsp;&nbsp;&nbsp;&nbsp; </label>
                      <label style="font-family: 'Roboto', sans-serif;"> Search by Date &nbsp;&nbsp;&nbsp;&nbsp; </label>
                      <label style="font-family: 'Roboto', sans-serif;">
                      <div class="input-daterange input-group" id="m_datepicker_5">
                        <div class="input-group-append"> <span class="input-group-text"> From </span> </div>
                        <input type="text" class="form-control m-input" name="start_date" id="start_date" readonly>
                        <div class="input-group-append"> <span class="input-group-text"> To </span> </div>
                        <input type="text" class="form-control" name="end_date" id="end_date" readonly>
                      </div>
                      </label>
                      <label style="font-family: 'Roboto', sans-serif;"> <span class="m-form__help" style="font-family: 'Roboto', sans-serif;"> month/day/year </span> </label>
                    </div>
                    <div class="col-md-12">
                      <label style="font-family: 'Roboto', sans-serif;">
                        <button type="submit" class="btn btn-primary" style="font-family: 'Roboto', sans-serif;"> Search </button>
                      </label>
                    </div>
                  </form>
                </div>
              </div>
              <div id="non-printable" align="right">
                <label style="font-family: 'Roboto', sans-serif;">
                  <button type="button" class="btn btn-primary" style="font-family: 'Roboto', sans-serif;" onClick="window.print();"> Print & Save PDF </button>
                </label>
              </div>
              <div id="printable"><br>
                <div style="font-family: 'Roboto', sans-serif; text-transform:uppercase; color:#000000; font-size:16px; letter-spacing:1px;" align="center"><strong> IN-PROCESS ORDERS </strong></div>
                <br>
                <!--begin: Datatable -->
                <? 
	  				$strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_process = 'In-Process' ";
	  				$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
	  				$Num_Rows = mysql_num_rows($objQuery1);
	  				$Per_Page = 120;
	  				$Page = $_GET["Page"];
	  				if(!$_GET["Page"])
	  				{
		  				$Page=1;
	  				}
	  				$Prev_Page = $Page-1;
	  				$Next_Page = $Page+1;
	  
	  				$Page_Start = (($Per_Page*$Page)-$Per_Page);
	  				if($Num_Rows<=$Per_Page)
	  				{
		  				$Num_Pages =1;
	  				}
	  				else if(($Num_Rows % $Per_Page)==0)
	  				{
		  				$Num_Pages =($Num_Rows/$Per_Page) ;
	  				}
	  				else
	  				{
		  				$Num_Pages =($Num_Rows/$Per_Page)+1;
		  				$Num_Pages = (int)$Num_Pages;
	  				}
	  				$strSQL1 .=" ORDER BY ABS(id) DESC LIMIT $Page_Start , $Per_Page";
	  				$objQuery1  = mysql_query($strSQL1);
	  			?>
                <table width="100%">
                  <thead>
                    <tr style="height:50px;">
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Invoice No </strong></div></th>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Order No </strong></div></th>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Date </strong></div></th>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Reseller Name </strong></div></th>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Amount </strong></div></th>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Order Status </strong></div></th>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Payment Status </strong></div></th>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> View & Print Order </strong></div></th>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Print PDF & Download Invoice PDF </strong></div></th>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Print Excel & Download Invoice Excel </strong></div></th>
                    </tr>
                  </thead>
                  <tbody>
                    <? while($objResult1 = mysql_fetch_array($objQuery1)) { ?>
                    <tr style="height:50px;" align="center">
                      <td style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1["checkout_invoice"]?>
                          -
                          <?=$objResult1["checkout_number"]?>
                        </div></td>
                      <td style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1["checkout_order"]?>
                        </div></td>
                      <td style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1["checkout_date"]?>
                        </div></td>
                      <td style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1["checkout_company"]?>
                        </div></td>
                      <td style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><?
					$country = $objResult1['checkout_country'];
                    if ($country == 'Austria') {
		
					$currency = '€';	
		
					} else if ($country == 'Australia') {
	
					$currency = '$';
		
					} else if ($country == 'Belgium') {
		
					$currency = '€';	
		
					} else if ($country == 'Canada') {
		
					$currency = '$';	
		
					} else if ($country == 'Denmark') {
		
					$currency = 'DKK';	
		
					} else if ($country == 'Germany') {
		
					$currency = '€';	
				
					} else if ($country == 'Italy') {
		
					$currency = '€';	
		
					} else if ($country == 'Netherlands') {
		
					$currency = '€';	
		
					} else if ($country == 'Norway') {
		
					$currency = 'NOK';	
		
					} else if ($country == 'Sweden') {
		
					$currency = 'SEK';	
		
					} else if ($country == 'Switzerland') {
		
					$currency = '€';	
		
					} else if ($country == 'Thailand') {
		
					$currency = '฿';	
		
					} else if ($country == 'UK') {
		
					$currency = '£';	
		
					} else if ($country == 'US') {	
	
					$currency = '$';
		
					}
					?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$currency?>
                          <?=$objResult1['checkout_price'];?>
                        </div></td>
                      <td style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><select class="form-control m-input" style="color:#000000; font-size:10px; letter-spacing:1px;" name="status" id="status" onChange="javascript:changeLocation(this)">
                          <option style="color:#000000; font-size:10px; letter-spacing:1px;" value="<?=$objResult1["checkout_status_process"]?>">
                          <?=$objResult1["checkout_status_process"]?>
                          </option>
                          <option style="color:#000000; font-size:10px; letter-spacing:1px;" value="../include/orders_process_code.php?id=<?=$objResult1["id"]?>&&process=In-Process">In-Process</option>
                          <option style="color:#000000; font-size:10px; letter-spacing:1px;" value="../include/orders_process_code.php?id=<?=$objResult1["id"]?>&&process=Completed">Completed</option>
                          <option style="color:#000000; font-size:10px; letter-spacing:1px;" value="../include/orders_process_code.php?id=<?=$objResult1["id"]?>&&process=Pending">Pending</option>
                        </select></td>
                      <td style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><select class="form-control m-input" style="color:#000000; font-size:10px; letter-spacing:1px;" name="payment" id="payment" onChange="javascript:changeLocation(this)">
                          <option style="color:#000000; font-size:10px; letter-spacing:1px;" value="<?=$objResult1["checkout_status_payment"]?>">
                          <?=$objResult1["checkout_status_payment"]?>
                          </option>
                          <option style="color:#000000; font-size:10px; letter-spacing:1px;" value="../include/orders_payment_code.php?id=<?=$objResult1["id"]?>&&payment=Paid">Paid</option>
                          <option style="color:#000000; font-size:10px; letter-spacing:1px;" value="../include/orders_payment_code.php?id=<?=$objResult1["id"]?>&&payment=Unpaid">Unpaid</option>
                        </select></td>
                      <td style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><a href="view.php?order_id=<?=$objResult1['checkout_orderid'];?>&&user=<?=$objResult1["checkout_company"]?>" target="_blank">
                        <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> View </div>
                        </a></td>
                      <td style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><a href="../pdf/order_invoice.php?order_id=<?=$objResult1['checkout_orderid'];?>&&user=<?=$objResult1["checkout_company"]?>" target="_blank">
                        <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                        </a></td>
                      <td style="border: 1px solid #c5c5c5; font-weight:100;" align="center"><a href="../excel/index.php?order_id=<?=$objResult1['checkout_orderid'];?>&&user=<?=$objResult1["checkout_company"]?>" target="_blank">
                        <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                        </a></td>
                    </tr>
                    <? } ?>
                  </tbody>
                </table>
                <div align="right" style="font-family: 'Roboto', sans-serif; font-size:14px; color:#000; letter-spacing:1px;"> <br>
                  <? if($Prev_Page) { echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'> < Previous </a> "; } ?>
                  <?
        			for($i=1; $i<=$Num_Pages; $i++){
					$Page1 = $Page-2;
					$Page2 = $Page+2;
					if($i != $Page && $i >= $Page1 && $i <= $Page2)
					{
						echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
					}
					elseif($i==$Page)
					{
						echo "<b> $i </b>";
					}
					}


			  ?>
                  <? if($Page!=$Num_Pages) {	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'> Next > </a> "; } ?>
                </div>
                <div id="printable" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;" align="left"><strong> TOTAL </strong><br>
                  <?
                $strSQL01 = " SELECT SUM(checkout_price) FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_process = 'In-Process' AND checkout_country = 'Austria' ";
	  			$objQuery01 = mysql_query($strSQL01) or die ("Error Query [".$strSQL01."]");
				$objResult01 = mysql_fetch_array($objQuery01);
				?>
                  <?
                $strSQL02 = " SELECT SUM(checkout_price) FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_process = 'In-Process' AND checkout_country = 'Australia' ";
	  			$objQuery02 = mysql_query($strSQL02) or die ("Error Query [".$strSQL02."]");
				$objResult02 = mysql_fetch_array($objQuery02);
				?>
                  <?
                $strSQL03 = " SELECT SUM(checkout_price) FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_process = 'In-Process' AND checkout_country = 'Belgium' ";
	  			$objQuery03 = mysql_query($strSQL03) or die ("Error Query [".$strSQL03."]");
				$objResult03 = mysql_fetch_array($objQuery03);
				?>
                  <?
                $strSQL04 = " SELECT SUM(checkout_price) FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_process = 'In-Process' AND checkout_country = 'Canada' ";
	  			$objQuery04 = mysql_query($strSQL04) or die ("Error Query [".$strSQL04."]");
				$objResult04 = mysql_fetch_array($objQuery04);
				?>
                  <?
                $strSQL05 = " SELECT SUM(checkout_price) FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_process = 'In-Process' AND checkout_country = 'Denmark' ";
	  			$objQuery05 = mysql_query($strSQL05) or die ("Error Query [".$strSQL05."]");
				$objResult05 = mysql_fetch_array($objQuery05);
				?>
                  <?
                $strSQL06 = " SELECT SUM(checkout_price) FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_process = 'In-Process' AND checkout_country = 'Germany' ";
	  			$objQuery06 = mysql_query($strSQL06) or die ("Error Query [".$strSQL06."]");
				$objResult06 = mysql_fetch_array($objQuery06);
				?>
                  <?
                $strSQL07 = " SELECT SUM(checkout_price) FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_process = 'In-Process' AND checkout_country = 'Italy' ";
	  			$objQuery07 = mysql_query($strSQL07) or die ("Error Query [".$strSQL07."]");
				$objResult07 = mysql_fetch_array($objQuery07);
				?>
                  <?
                $strSQL08 = " SELECT SUM(checkout_price) FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_process = 'In-Process' AND checkout_country = 'Netherlands' ";
	  			$objQuery08 = mysql_query($strSQL08) or die ("Error Query [".$strSQL08."]");
				$objResult08 = mysql_fetch_array($objQuery08);
				?>
                  <?
                $strSQL09 = " SELECT SUM(checkout_price) FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_process = 'In-Process' AND checkout_country = 'Norway' ";
	  			$objQuery09 = mysql_query($strSQL09) or die ("Error Query [".$strSQL09."]");
				$objResult09 = mysql_fetch_array($objQuery09);
				?>
                  <?
                $strSQL010 = " SELECT SUM(checkout_price) FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_process = 'In-Process' AND checkout_country = 'Sweden' ";
	  			$objQuery010 = mysql_query($strSQL010) or die ("Error Query [".$strSQL010."]");
				$objResult010 = mysql_fetch_array($objQuery010);
				?>
                  <?
                $strSQL011 = " SELECT SUM(checkout_price) FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_process = 'In-Process' AND checkout_country = 'Switzerland' ";
	  			$objQuery011 = mysql_query($strSQL011) or die ("Error Query [".$strSQL011."]");
				$objResult011 = mysql_fetch_array($objQuery011);
				?>
                  <?
                $strSQL012 = " SELECT SUM(checkout_price) FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_process = 'In-Process' AND checkout_country = 'Thailand' ";
	  			$objQuery012 = mysql_query($strSQL012) or die ("Error Query [".$strSQL012."]");
				$objResult012 = mysql_fetch_array($objQuery012);
				?>
                  <?
                $strSQL013 = " SELECT SUM(checkout_price) FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_process = 'In-Process' AND checkout_country = 'UK' ";
	  			$objQuery013 = mysql_query($strSQL013) or die ("Error Query [".$strSQL013."]");
				$objResult013 = mysql_fetch_array($objQuery013);
				?>
                  <?
                $strSQL014 = " SELECT SUM(checkout_price) FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_process = 'In-Process' AND checkout_country = 'US' ";
	  			$objQuery014 = mysql_query($strSQL014) or die ("Error Query [".$strSQL014."]");
				$objResult014 = mysql_fetch_array($objQuery014);
				?>
                  <? if ($objResult01["SUM(checkout_price)"] != '') { ?>
                  €
                  <?=$objResult01["SUM(checkout_price)"]?>
                  (Austria) <br>
                  <? } else { } ?>
                  <? if ($objResult02["SUM(checkout_price)"] != '') { ?>
                  $
                  <?=$objResult01["SUM(checkout_price)"]?>
                  (Australia) <br>
                  <? } else { } ?>
                  <? if ($objResult03["SUM(checkout_price)"] != '') { ?>
                  €
                  <?=$objResult01["SUM(checkout_price)"]?>
                  (Belgium) <br>
                  <? } else { } ?>
                  <? if ($objResult04["SUM(checkout_price)"] != '') { ?>
                  $
                  <?=$objResult01["SUM(checkout_price)"]?>
                  (Canada) <br>
                  <? } else { } ?>
                  <? if ($objResult05["SUM(checkout_price)"] != '') { ?>
                  DKK
                  <?=$objResult05["SUM(checkout_price)"]?>
                  (Denmark) <br>
                  <? } else { } ?>
                  <? if ($objResult06["SUM(checkout_price)"] != '') { ?>
                  €
                  <?=$objResult06["SUM(checkout_price)"]?>
                  (Germany) <br>
                  <? } else { } ?>
                  <? if ($objResult07["SUM(checkout_price)"] != '') { ?>
                  €
                  <?=$objResult07["SUM(checkout_price)"]?>
                  (Italy) <br>
                  <? } else { } ?>
                  <? if ($objResult08["SUM(checkout_price)"] != '') { ?>
                  €
                  <?=$objResult08["SUM(checkout_price)"]?>
                  (Netherlands) <br>
                  <? } else { } ?>
                  <? if ($objResult09["SUM(checkout_price)"] != '') { ?>
                  NOK
                  <?=$objResult09["SUM(checkout_price)"]?>
                  (Norway) <br>
                  <? } else { } ?>
                  <? if ($objResult010["SUM(checkout_price)"] != '') { ?>
                  SEK
                  <?=$objResult010["SUM(checkout_price)"]?>
                  (Sweden) <br>
                  <? } else { } ?>
                  <? if ($objResult011["SUM(checkout_price)"] != '') { ?>
                  €
                  <?=$objResult011["SUM(checkout_price)"]?>
                  (Switzerland) <br>
                  <? } else { } ?>
                  <? if ($objResult012["SUM(checkout_price)"] != '') { ?>
                  ฿
                  <?=$objResult012["SUM(checkout_price)"]?>
                  (Thailand) <br>
                  <? } else { } ?>
                  <? if ($objResult013["SUM(checkout_price)"] != '') { ?>
                  £
                  <?=$objResult013["SUM(checkout_price)"]?>
                  (UK) <br>
                  <? } else { } ?>
                  <? if ($objResult014["SUM(checkout_price)"] != '') { ?>
                  $
                  <?=$objResult014["SUM(checkout_price)"]?>
                  (US) <br>
                  <? } else { } ?>
                </div>
              </div>
            </div>
          </div>
          <!-- END EXAMPLE TABLE PORTLET--> 
        </div>
      </div>
      
      <!-- end::Body --> 
    </div>
  </div>
  <!-- end:: Body --> 
  <!-- begin::Footer -->
  <footer class="m-grid__item m-footer">
    <div id="non-printable">
      <div class="m-container m-container--fluid m-container--full-height m-page__container">
        <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
          <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last"> <span class="m-footer__copyright"> 2019 &copy; Reseller Online </span> </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- end::Footer --> 
</div>
<!-- end:: Page --> 
<!--begin::Base Scripts --> 
<script src="../js/vendors.bundle.js" type="text/javascript"></script> 
<script src="../js/scripts.bundle.js" type="text/javascript"></script> 
<script src="../js/datatables.bundle.js" type="text/javascript"></script> 
<script src="../js/bootstrap-datepicker.js" type="text/javascript"></script> 
<script> function changeLocation(menuObj) { var i = menuObj.selectedIndex; if(i > 0) { window.location = menuObj.options[i].value; } } </script> 
<!--end::Base Scripts -->
</body>
<!-- end::Body -->
</html>
