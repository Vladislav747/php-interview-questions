<?php
	require_once('auth.php');
?>
<?php
//include the connection file

//require_once('connection.php');

//save the data on the DB and send the email

if(isset($_POST['action']) && $_POST['action'] == 'submitform')
{
	//recieve the variables
	
	
	$bid_id = $_POST['bid_id'];
	$seller_id = $_POST['seller_id'];
	$seller_name = $_POST['seller_name'];
	$email = $_POST['email'];
    $comment = $_POST['comment'];
	
	$ip = gethostbyname($_SERVER['REMOTE_ADDR']);
	
	//save the data on the DB
	
	//mysql_select_db($database_connection, $connection);
	
	$connection=mysql_connect('localhost','root') or die('unable to connect');
        
          mysql_select_db("corner");
	
	$insert_query = sprintf("INSERT INTO mail (bid_id, seller_id, seller_name, email, comment, date, ip) VALUES (%s, %s, %s, %s, %s,  NOW(), %s)",
							
							sanitize($bid_id, "text"),
							sanitize($seller_id, "text"),
							sanitize($seller_name, "text"),
							sanitize($email, "text"),
							sanitize($comment, "text"),
							//sanitize($date, "text"),
							sanitize($ip, "text")
		
	);
	
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
	{
		//send the email
		
		$to = "pradeep.vwa@gmail.com";
		$subject = "New contact from the website";
		
		//headers and subject
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: ".$seller_name." <".$email.">\r\n";
		
		$body =  "New contact<br />";
		$body .= "Bid Id: ".$bid_id."<br />";
		$body .= "Seller Id: ".$seller_id."<br />";
		$body .= "Seller Name: ".$seller_name."<br />";
		$body .= "Email: ".$email."<br />";
		$body .= "Comment: ".$comment."<br />";
		//$body .= "Date: ".$date."<br />";
		$body .= "IP: ".$ip."<br />";
		
		//mail($to, $subject, $body, $headers);
		
		//ok message
		
		
		//echo "Your message has been sent";

		
	}
}

function sanitize($value, $type) 
{
  $value = (!get_magic_quotes_gpc()) ? addslashes($value) : $value;

  switch ($type) {
    case "text":
      $value = ($value != "") ? "'" . $value . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $value = ($value != "") ? intval($value) : "NULL";
      break;
    case "double":
      $value = ($value != "") ? "'" . doubleval($value) . "'" : "NULL";
      break;
    case "date":
      $value = ($value != "") ? "'" . $value . "'" : "NULL";
      break;
  }
  
  return $value;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="3600" />
  <meta name="revisit-after" content="2 days" />
  <meta name="robots" content="index,follow" />
  <meta name="publisher" content="Pradeep Kumar" />
  <meta name="copyright" content="BMS Institute of Technology" />
  <meta name="author" content="Design: Pradeep Kumar www.bmsit.org / Author: MCA 6th sem student" />
  <meta name="distribution" content="global" />
  <meta name="description" content="Design and Development of Multi-Attribute Decision making model in Reverse Auction" />
  <meta name="keywords" content="online auction,reverse auction, eprocurement ,multi-attribute reverse auction,online bidding,multi-attribute auction" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="./css/layout4_setup.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="./css/layout4_text.css" />
  <link rel="icon" type="image/x-icon" href="./img/auction1.png" />
  <link href="./style.css" rel="stylesheet" type="text/css" media="all">
  <script src="./cb=gapi.loaded0" async=""></script><script type="text/javascript" async="" src="./plusone.js" gapi_processed="true"></script><script type="text/javascript" src="./jquery.1.3.2.jquery.min.js"></script>
  <link href="./stylesDynamic.css" rel="stylesheet" type="text/css" media="all">
  <script type="text/javascript" src="./scripts.js"></script>
  <script type="text/javascript" src="./scriptSlider.js"></script>
  <link href="./stylesDynamic(1).css" rel="stylesheet" type="text/css">
  <link><link><link><link></head><body><div id="dropmenudiv" style="visibility:hidden;width:165px;background-color:#7e8aa2" onmouseover="clearhidemenu()" onmouseout="dynamichide(event)"></div>
  <script type="text/javascript">
  jQuery(document).ready(function(){
	$('#pageNav').addClass('active');
	$('#pageNav ul li:first').addClass('active');	
});
</script>
  <title>Online Auction | Administrator Login</title>
</head>
<!--#################   CODE FOR DISABLE BACK BUTTON  ##################-->

<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><script type="text/javascript">
   function disableBackButton()
   {
     window.history.forward();
   }
  
  setTimeout("disableBackButton()", 0);
  (function($) { disableBackButton(); }); 
    
var isNS = (navigator.appName == "Netscape") ? 1 : 0;

if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);

function mischandler(){
return false;
}
function mousehandler(e){
	
var myevent = (isNS) ? e : event;
var eventbutton = (isNS) ? myevent.which : myevent.button;
var eventbutton1 =  myevent.button;


if((eventbutton==2)||(eventbutton==3))
	return false;
}

document.oncontextmenu = mischandler;
document.onmousedown = mousehandler;
document.onmouseup = mousehandler;

</script></head>

<!-------------------------------------------------------------------------->

<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->

<body>
  <!-- Main Page Container -->
  <div class="page-container">

   <!-- For alternative headers START PASTE here -->

    <!-- A. HEADER -->      
    <div class="header">
      
      <!-- A.1 HEADER TOP -->
      <div class="header-top">
        
        <!-- Sitelogo and sitename -->
        <a class="sitelogo" href="#" title="Go to Start page"></a>
        <div class="sitename">
          <h1><a href="index.html" title="Go to Start page">Online Auction<span style="font-weight:normal;font-size:50%;"></span></a></h1>
          <h2></h2>
        </div>
    
        <!-- Navigation Level 0 -->
        <div class="nav0">
          <ul>
		   <li><a href="#" title="home in India"><img src="./img/flag_India.jpg" alt="Image description" /></a></li>
            <li><a href="#" title="Pagina home in Italiano"><img src="./img/flag_italy.gif" alt="Image description" /></a></li>
            <li><a href="#" title="Homepage auf Deutsch"><img src="./img/flag_germany.gif" alt="Image description" /></a></li>
            <li><a href="#" title="Hemsidan p&aring; svenska"><img src="./img/flag_sweden.gif" alt="Image description" /></a></li>
          </ul>
        </div>			

        <!-- Navigation Level 1 -->
        <div class="nav1">
          <ul>
            <li><a href="../r/home.html" title="Go to Start page">Home</a></li>
            <li><a href="../r/index.html" title="Get to know who we are">About</a></li>
            <li><a href="http://localhost/r/Contact Us.php" title="Get in touch with us">Contact</a></li>																		
            <li><a href="afterNews.html" title="Get an overview of Procurement Process">Help</a></li>
          </ul>
        </div>              
      </div>
      
     <!--########################    SLIDING HEADER   ######################-->
     
	  
   <div id="pageBanner">
        	<div class="pageBannerContent">
            	<div id="gallery">
                    <div id="slides" style="width: 4990px; margin-left: -1810.2179892840595px; ">
                        <div class="pageBannerInnerCont" style="">
                            <h3>EXTENSIVE SUPPLIER DATABASE</h3>
                            <p>Whether you are a manufacturer, distributor or a service provider we can provide that vital link to a large community of Buyers that could mean increased business opportunities for you.
                            </p>
                            <div class="clear"></div>
                        </div>
                        <div class="pageBannerInnerCont bannerTwo" style="">
                            <h3>ONLINE REQUEST</h3>
                            <p>Do you need help sourcing new Suppliers for a contract you have available? Use our expertise and experience to help you with cross border sourcing.
                            </p>
                            <div class="clear"></div>
                        </div>
                        <div class="pageBannerInnerCont bannerThree" style="">
                            <h3>SUPPLIER SCAN REPORTS</h3>
                            <p>Do you already know the suppliers in the market but need extra information, take a look at our available reports.
                            </p>
                            <div class="clear"></div>
                        </div>
                        <div class="pageBannerInnerCont bannerFour" style="">
                            <h3>CROSS-BORDER SOURCING</h3>
                            <p>Are you a professional Buyer and need help in locating new suppliers for a contract you have available, then search our extensive database and find the right suppliers you need.
                            </p>
                            <div class="clear"></div>
                        </div>
                        <div class="pageBannerInnerCont bannerFive" style="">
                            <h3>eTENDERING TOOL</h3>
                            <p>Deliver increased savings by using our self-service, on demand and low-cost eSourcing Tool to create your own specific RFI, RFP or RFQ to evaluate and compare your Suppliers.
                            </p>
                            <div class="clear"></div>
                        </div>
                    </div>
             	</div>
				
		<a href="../r/index.html" title="register today"><script type="text/javascript">writePngImage('/r/img/bgRegister.png', 145, 63, 'register today');</script><img alt="Register Today" src="../r/img/bgRegister.png" style="width: 145px; height: 63px;"></a>
                <div class="bannerNav">
                	<ul>
                		                    		<li class="menuItem"><a href="#">Extensive Supplier </a><span>bg</span></li>
                		                		
                		                		
                		                        	<li class="menuItem"><a href="#">Online Request</a><span>bg</span></li>
                                                
                                                
                                                	
                        	<li class="menuItem active "><a href="#">Supplier Scan Reports</a><span>bg</span></li>
                        	
                                                	<li class="menuItem"><a href="#">Cross-border Sourcing</a><span>bg</span></li>
                                                
                                                
                        	
                        	<li class="menuItem"><a href="#">eTendering Tool</a><span>bg</span></li>
                                                
                                                
                        	
                    </ul>
                </div> 
            </div>        
      	</div> 

<!--------------------------------------------------------------------------->

      
      <!-- A.3 HEADER BOTTOM -->
      <div class="header-bottom">
      
        <!-- Navigation Level 2 (Drop-down menus) -->
        <div class="nav2">
	
           <!-- Navigation item -->
          <ul>
            <li><a href="../r/home.html">Home</a></li>
          </ul>
          
          <!-- Navigation item -->
          <ul>
            <li><a href="#">Buyer<!--[if IE 7]><!--></a><!--<![endif]-->
              <!--[if lte IE 6]><table><tr><td><![endif]-->
                <ul>
                  <li><a href="buyer.html">Buyer</a></li>
                  <li><a href="Buyer Agreement.html">Register</a></li>
                  
				  <li><a href="benefits.html">Buyer Benefits</a></li>
				  
                                                    
                </ul>
              <!--[if lte IE 6]></td></tr></table></a><![endif]-->
            </li>
          </ul>          

          <!-- Navigation item -->
          <ul>
            <li><a href="#">Supplier<!--[if IE 7]><!--></a><!--<![endif]-->
              <!--[if lte IE 6]><table><tr><td><![endif]-->
                <ul>
                  <li><a href="supplier.html">Supplier</a></li>
                  <li><a href="Supplier Agreement.html">Registeration</li>
                
				  <li><a href="afterNews.html">Futured Suppliers</a></li>
                </ul>
              <!--[if lte IE 6]></td></tr></table></a><![endif]-->
            </li>
          </ul> 
        </li>
        </ul> 
 
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<script src="script.js" type="text/javascript" align="right"></script>
   
<!--###########   CODE FOR DYNAMIC CLOCK   ##############-->
<head>
<script type="text/javascript">
function clock1()
 {
  
   var d=new Date();
   var t=d.toLocaleTimeString();
   document.myform.txt.value=t;
   setTimeout("clock1()",1000);


  }
</script>
</head>

<form name="myform">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="txt" size=4 />
<body onload="clock1()"></body>
</form>
        
<!---------------------------------------------------------->         
		 
		 
        </div>
	  </div>

      <!-- A.4 HEADER BREADCRUMBS -->

      <!-- Breadcrumbs -->
      <div class="header-breadcrumbs">
        <ul>
          <li><a href="../r/home.html">Home&nbsp;</a></li>
          <li><a href="../r/index.html">About Us&nbsp;</a></li>
          <li><a href="http://localhost/r/Contact Us.php">Contact&nbsp;</a></li>
         
        </ul>

        <!--############   SEARCH FORM   ##############-->    
		
        <div class="searchform">
          <form action="#" method="get" class="form">
            <fieldset>
              <input value=" Search..." name="field" class="field" />
              <input type="submit" value="GO!" name="button" class="button" />
            </fieldset>
          </form>
        </div>
		</div>
	 </div>
		
    

    <!-- For alternative headers END PASTE here -->

    <!-- B. MAIN -->
    <div class="main">
 
      <!-- B.1 MAIN NAVIGATION -->
      <div class="main-navigation">

        <!-- Navigation Level 3 -->
        <div class="round-border-topright"></div>
        <h1 class="first">Select  Here</h1>

        <!-- Navigation with grid style -->
	<dl class="nav3-grid">
      <dt><a href="http://localhost/r/buyer_info.php">Buyer Information</a></dt>
      <dt><a href="http://localhost/r/supplier_info.php">Supplier Information</a></dt>
	  <dt><a href="http://localhost/r/supplier_participate.php">Supplier Participate</a></dt>
      <dt><a href="http://localhost/r/price_priority.php">Price Priority Table</a></dt>
	  <dt><a href="http://localhost/r/lead_time_priority.php">Lead Time Priority Table</a></dt>
	  <dt><a href="http://localhost/r/free_shipment_priority.php">Free-shipment Priority Table</a></dt>
	  <dt><a href="http://localhost/r/discount_priority.php">Discount Priority Table</a></dt>
	  <dt><a href="http://localhost/r/warranty_priority.php">Warranty Priority Table</a></dt>
	  <dt><a href="http://localhost/r/supplier_priority.php">Supplier Priority Table</a></dt>
	  <dt><a href="http://localhost/r/attribute_matrix.php">Generate Matrix Table</a></dt>
	  <dt><a href="http://localhost/r/winner.php">Winner Table</a></dt>
	  <dt><a href="http://localhost/r/mail.php">Send a Mail</a></dt>
      <dt><a href="http://localhost/r/logout.php">Logout</a></dt>
	  
	  
		
        </dl> 
		
        
      </div>
 
      <!-- B.2 MAIN CONTENT -->
      <div class="main-content">
        
        <!-- Pagetitle -->
        <h1 class="pagetitle">Administrator Zone</h1>

<!--######################  SENDING MAIL TO SUPPLIER   #######################-->


<!--
<form id="contact" name="contact" action="mail.php" method="post">

<p><label>Name: <input type="text" id="name" name="name" value="" /></label></p>

<p><label>Email: <input type="text" id="email" name="email" value="" /></label></p>

<p><label>Website: <input type="text" id="url" name="url" value="http://" /></label></p>

<p><label>Comment:<br /><textarea id="comment" name="comment"></textarea></label></p>

<input type="hidden" id="action" name="action" value="submitform" />

<p><input type="submit" id="submit" name="submit" value="Submit" /> <input type="reset" id="reset" name="reset" value="Reset" /></p>

</form>-->

 <form id="contact" name="contact" method=post action="mail.php">
                                   

       <div class="column1-unit">
          <div class="contactform">
           
            <fieldset><legend>&nbsp;SEND A MAIL&nbsp;</legend>
              
                
				  <p><label for="bid_id" class="left">Bid Id:</label>
                   <input type="text" name="bid_id" id="bid_id" class="field" value="" tabindex="1" /></p>
				  <p><label for="seller_id" class="left">Seller Id:</label>
                   <input type="text" name="seller_id" id="seller_id" class="field" value="" tabindex="1" /></p>
				   <p><label for="seller_name" class="left">Seller Name:</label>
                   <input type="text" name="seller_name" id="seller_name" class="field" value="" tabindex="1" /></p>
				   <p><label for="email" class="left">Email:</label>
                   <input type="text" name="email" id="email" class="field" value="" tabindex="1" /></p>  
				  <p><label for="comment" class="left">Comment:</label><textarea id="comment" name="comment"></textarea></p><br/>  
              <!-- </fieldset>-->
			 
			  <input type="hidden" id="action" name="action" value="submitform" />
            
			 <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" id="submit" name="submit" value=" Submit " /> 
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" id="reset" name="reset" value="  Reset  " /></p>
            
          </fieldset>
		  </form>
		  </div></div></div>
		


        <!--################   PRODUCT ADVERTISEMENT CODE   ################-->

   <div class="main-subcontent">
       <div class="subcontent-unit-border-green">
	  
          <div class="round-border-topleft"></div><div class="round-border-topright"></div>
          <h1 class="green">Advertisement</h1>


	             <tr>
					<td valign="top" align="middle" width="100%" height="100"><iframe name="news" id="news" border="0" src="./news.htm" frameborder="0" width="180" scrolling="no" height="200"> </iframe>&nbsp;
					</td>
				</tr></div>
			<!--</tbody></table>-->


        <!-- Subcontent unit -->
      <div class="subcontent-unit-border-green">
          <div class="round-border-topleft"></div><div class="round-border-topright "></div> 
          <h1 class="green" >It's free!</h1>
          <p>Enjoy the bidding process. There are no restrictions in the license. As a sign of appreciation, please keep the author credits "<a href="http://www.bmsit.org.in">Design by Pradeep Kumar .</a>" Thanks!</p>
        </div>
     </div>
    </div>
        
        
      
    <!--#############   FOOTER AREA   ##############-->      

    <div class="footer">
      <p>Copyright &copy; 2012 BMS Institute of Technology | All Rights Reserved</p>
      <p class="credits">Original design by : <a href="http://www.bmsit.org.in" title="Designer Homepage">Pradeep Kumar</a> | USN : <a href="http://www.bmsit.org.in" title="Designer Homepage">1BY09MCA28</a></p>
    </div>      
  </div> 
</body>
</html>



