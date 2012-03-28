<!--*********************************home start*******************************-->

<table width="96%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td width="5%"><img src="images/login/bullet1.jpg" alt="bullet" width="10" height="20" /></td>
    <td width="95%" background="images/login/leftbg.jpg">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <? if ($mlevel==0){?>  
		<tr>
          <td height="20" class="mail_font" >Talents Management</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='manage_user.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage Talents</td>
        </tr>
		<tr>
          <td height="20" class="mail_font" >Event Management</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='manage_events.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage Events</td>
        </tr>
		<tr>
          <td height="20" class="mail_font" >Ticket Orders Management</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='manage_order.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage Ticket Orders</td>
        </tr>
		<tr>
          <td height="20" class="mail_font" >Home Page Banner Management</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='manage_banners.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage Home Page Banners</td>
        </tr>
		<tr>
          <td height="20" class="mail_font" >Admin Username & Password</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='changepass.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Change Admin Username & Password</td>
        </tr>
		<tr>
          <td height="20" class="mail_font" >E-Mail Address Management</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='manage_mail.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage E-Mail Address</td>
        </tr>
		<tr>
          <td height="20" class="mail_font" >Newsletter Subscriber</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='manage_newsletter.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage Newsletter Subscriber</td>
        </tr>
		<tr>
          <td height="20" class="mail_font">Static Page Management </td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='editcontents.php?id=1';" onmouseover="className='menuover';" onmouseout="className='menuon';">About Us</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='editcontents.php?id=2';" onmouseover="className='menuover';" onmouseout="className='menuon';">Contact Us</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='editcontents.php?id=3';" onmouseover="className='menuover';" onmouseout="className='menuon';">Our Mission</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='editcontents.php?id=4';" onmouseover="className='menuover';" onmouseout="className='menuon';">News & Press</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='editcontents.php?id=5';" onmouseover="className='menuover';" onmouseout="className='menuon';">How to help</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='editcontents.php?id=6';" onmouseover="className='menuover';" onmouseout="className='menuon';">Jobs</td>
        </tr>
		<? } else if($mlevel==3){ ?> 
		<tr>
          <td height="20" class="mail_font" >Admin Username & Password</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='changepass.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Change Admin Username & Password </td>
        </tr>
		<tr>
          <td height="20" class="mail_font" >E-Mail Address Management</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='manage_mail.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage E-Mail Address</td>
        </tr>
		<tr>
          <td height="20" class="mail_font" >Home Page Banner Management</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='add_banner.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Add Home Page Banner</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='manage_banners.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage Home Page Banners</td>
        </tr>
		<tr>
          <td height="20" class="mail_font" >Email To Friend Management</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='manage_emailfriend.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage Email To Friend</td>
        </tr>
		<? } else if($mlevel==1){ ?>
		<tr>
          <td height="20" class="mail_font">Product Management</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onclick="javascript:document.location.href='add_product.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Add Product</td>
        </tr>
        <tr>
          <td height="20" class="menuon" onclick="javascript:document.location.href='manage_product.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage Product</td>
        </tr>
		<? } else if($mlevel==5){ ?> 
		<tr>
          <td height="20" class="mail_font" >Talents Management</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='manage_user.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage Talents</td>
        </tr>
		<?php /*?><tr>
          <td height="20" class="mail_font" >Genre Management</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='add_genre.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Add Genre</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='manage_genre.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage Genre</td>
        </tr>
		<tr>
          <td height="20" class="mail_font" >Label Type Management</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='add_labeltype.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Add Label Type</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='manage_labeltype.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage Label Type</td>
        </tr><?php */?>
        <? }else if($mlevel==4){ ?>
        <tr>
          <td height="20" class="mail_font">Static Page Management </td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='editcontents.php?id=1';" onmouseover="className='menuover';" onmouseout="className='menuon';">About Us</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='editcontents.php?id=2';" onmouseover="className='menuover';" onmouseout="className='menuon';">Contact Us</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='editcontents.php?id=3';" onmouseover="className='menuover';" onmouseout="className='menuon';">Our Mission</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='editcontents.php?id=4';" onmouseover="className='menuover';" onmouseout="className='menuon';">News & Press</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='editcontents.php?id=5';" onmouseover="className='menuover';" onmouseout="className='menuon';">How to help</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='editcontents.php?id=6';" onmouseover="className='menuover';" onmouseout="className='menuon';">Jobs</td>
        </tr>
		<? }else if($mlevel==6){ ?>
		<tr>
          <td height="20" class="mail_font" >Event Management</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='manage_events.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage Events</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='add_event.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Add Event</td>
        </tr>
		<tr>
          <td height="20" class="mail_font">Event Category Management</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onclick="javascript:document.location.href='add_eventcat.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Add Event Category</td>
        </tr>
        <tr>
          <td height="20" class="menuon" onclick="javascript:document.location.href='manage_eventcat.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage Event Category</td>
        </tr>
		<tr>
          <td height="20" class="mail_font">Event Venue Management</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onclick="javascript:document.location.href='add_eventvenue.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Add Event Venue</td>
        </tr>
        <tr>
          <td height="20" class="menuon" onclick="javascript:document.location.href='manage_eventvenue.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage Event Venue</td>
        </tr>
		
		<? }else if($mlevel==11){ ?>
		<tr>
          <td height="20" class="mail_font" >Ticket Orders Management</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='manage_order.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage Ticket Orders</td>
        </tr>
		<tr>
          <td height="29" class="mail_font">Promo. Code Management</td>
        </tr>
        <tr>
          <td height="29" class="menuon" onClick="javascript:document.location.href='add_promo.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Add Promotional Code</td>
        </tr>
        <tr>
          <td height="29" class="menuon" onClick="javascript:document.location.href='manage_promo.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage Promotional Code</td>
        </tr>
		<? }else if($mlevel==8){ ?>
		<tr>
          <td height="20" class="mail_font" >Newsletter Subscriber</td>
        </tr>
		<tr>
          <td height="20" class="menuon" onClick="javascript:document.location.href='manage_newsletter.php';" onmouseover="className='menuover';" onmouseout="className='menuon';">Manage Newsletter Subscriber</td>
        </tr>
		<? } ?>
      </table></td>
  </tr>
</table>