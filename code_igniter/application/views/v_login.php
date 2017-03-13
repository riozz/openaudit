<?php
#  Copyright 2003-2015 Opmantek Limited (www.opmantek.com)
#
#  ALL CODE MODIFICATIONS MUST BE SENT TO CODE@OPMANTEK.COM
#
#  This file is part of Open-AudIT.
#
#  Open-AudIT is free software: you can redistribute it and/or modify
#  it under the terms of the GNU Affero General Public License as published
#  by the Free Software Foundation, either version 3 of the License, or
#  (at your option) any later version.
#
#  Open-AudIT is distributed in the hope that it will be useful,
#  but WITHOUT ANY WARRANTY; without even the implied warranty of
#  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#  GNU Affero General Public License for more details.
#
#  You should have received a copy of the GNU Affero General Public License
#  along with Open-AudIT (most likely in a file named LICENSE).
#  If not, see <http://www.gnu.org/licenses/>
#
#  For further information on Open-AudIT or for a license other than AGPL please see
#  www.opmantek.com or email contact@opmantek.com
#
# *****************************************************************************

/**
 * @author Mark Unwin <marku@opmantek.com>
 *
 * 
 * @version 1.12.8
 *
 * @copyright Copyright (c) 2014, Opmantek
 * @license http://www.gnu.org/licenses/agpl-3.0.html aGPL v3
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link rel="shortcut icon" href="<?php echo base_url();?>favicon.png" type="image/x-icon" />
    <title>Open-AudIT</title>
    <style type="text/css">
    #container { width: 950px; margin: 0 auto; padding: 10px 0; border: 1px solid #555; border-radius: 5px;}
    a { color: #101010; text-decoration: none }
    a:hover { color: #729FCF; }
    body { font-family:"Verdana","Lucida Sans Unicode","Lucida Sans",sans-serif; background: #fff; font-size:12px; color:#111;}
    h2 { border-color:#DBD9C5; border-style:solid; border-width:0pt 0pt 1px; color:#555555; font-size:22px; font-weight:bold; padding:0px 0px 1px; }
    img {border:0;}
    </style>
<script src="<?php echo $this->config->config['oa_web_folder']; ?>/js/jquery-3.1.1.min.js">
</script>
</head>
<?php

$file_exist = '';
$filename = dirname(dirname(dirname(dirname(__FILE__))))."/other/audit_windows.vbs";
if (strpos($_SERVER['HTTP_USER_AGENT'], "Windows NT") === false) {
    $show = "n";
} else {
    $show = "y";
}

if (! isset($this->config->config['logo']) or $this->config->config['logo'] == '') {
    $this->config->config['logo'] = 'logo-banner-oac-oae';
}
if ($this->config->config['logo'] == 'oac') {
    $this->config->config['logo'] = 'logo-banner-oac';
}
if ($this->config->config['logo'] == 'oae') {
    $this->config->config['logo'] = 'logo-banner-oae';
}
if ($this->config->config['logo'] == 'oac-oae') {
    $this->config->config['logo'] = 'logo-banner-oac-oae';
}

if (isset($form_url) and $form_url != '') {
    // this is the session requested url
} else {
    $form_url = 'main/list_groups';
}
?>
<!--<body onload="document.myform.username.focus();">-->
<body onload="document.myform.staffid.focus();">
    <div id="container">
    <div id="header" style='height: 200px; width: 950px; margin-left: auto; margin-right: auto; padding: 20px; border: 10px;' align='left'>
        <?php $attributes = array('name' => 'myform'); ?>
        <?php echo form_open($form_url, $attributes)."\n"; ?>
                <div align='left' style="height: 150px; width:60%; float: left; vertical-align: center; text-align: center;">
                    <img src='<?php echo $this->config->config['oa_web_folder'] . '/images/'.$this->config->config['logo']; ?>.png' alt='logo' border='0' /><br />
                    <?php
                    if ((file_exists($filename)) and $show == 'y') {
                        ?>
                        <span align='center'><br /><label for="staffid">Staff ID (without leading zero):</label>&nbsp;<input type="text" name="staffid" id="staffid" size="8" maxlength="8" />&nbsp;&nbsp;&nbsp;<input type="button" name="audit" id="audit" value="Audit My PC" /></span><br />&nbsp;<br /><label id="errmsg"></label>
                        <?php

                    }
                    ?>
                </div>
                <div align='right' style="height: 150px; width:40%; float: right; text-align: center;">
                    <p><label for="username">Username: </label><input type="text" name="username" id="username" size="20" /></p>
                    <p><label for="password">Password: </label><input type="password" name="password" id="password" size="20" /></p>
                    <p><?php echo form_submit(array('id' => 'submit', 'name' => 'submit'), 'Submit' );
                    echo htmlentities($this->session->flashdata('message'));
                    ?>
                    <br />&nbsp;</p>
                </div>
            <?php echo form_close(); ?>
            <?php if ($systems >= '0') {
            echo "<div style='width: 100%; text-align: center;'><br />&nbsp;<br />
            <span style='font-size: 10pt; font-style: italic; color: blue;' >Audit process will only retrieve PC hardwares, softwares, operating system settings, <br>network settings and services information for PC inventory purpose.</span><br />
            <!--<span style='font-size: 10pt; font-style: italic; color: green;'>Initial login credentials are admin .</span><br />-->
            <span style='font-size: 10pt; font-style: italic; color: red;'  >NO personal information will be grabbed in the audit process.</span><br />
            <br /></div>\n";
            } ?>
    </div>
<?php if (isset($oae_message)) {
echo "<div style='width: 950px; margin-left: auto; margin-right: auto; padding: 20px; border: 10px; text-align: center;' align='left'>\n";
echo "\t\t<span style='font-size: 12pt;'>".$oae_message."<br /><br /></span>\n";
echo "</div>\n";
}
?>
<div style='width: 950px; margin-left: auto; margin-right: auto; padding: 20px; border: 10px; text-align: center;' align='left'>
HKTP Version: <?php echo $this->config->item('web_hktp_version') ?><br/><br/>
<!--<span style='font-size: 12pt; color:blue;'>Powered by <br /><a target='_blank' href='https://opmantek.com'>https://opmantek.com</a><br /><br /></span>-->
<span style='font-size: 12pt; color:#f8f8f8;'>Powered by <br />https://opmantek.com<br /><br /></span>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
   // $("#audit").css("background-color", "yellow");
    $("#audit").click(function() {
      var staffid=document.getElementById("staffid").value;
      //alert("staffid: " + staffid.length);
      if (staffid.length > 5 ) { //check the ID
        $.get("/open-audit/index.php/login/checkstaffid/"+staffid, function(data, status) {
          //alert("Data: " + data + "\nStatus:" + status);
	  if (data === "ret=1") {
  	    //$("#errmsg").css("background-color", "red");
	    $("#errmsg").text("");
            location.href = "/open-audit/index.php/login/audit_my_pc/"+staffid;
	    /*
	      full URL
              location.href = "/open-audit/index.php/login/audit_my_pc/[staffid]/[OS];
	      [OS] = win/lin/osx
	    */
          } else { //no need to check if lenght <=5
            showErrMsg();
          }
        });
      } else {
        showErrMsg();
      }
    });
    $("#staffid").keydown(function (e) { //submit when enter
      var key = e.which;
      if (key == 13) {
        $("#audit").click();
        return false; 
      }
    });
  });

  function showErrMsg() {
    var errmsg="Invalid Staff ID!  \rPlease input your staff ID and press [Audit my PC].";
    alert(errmsg);
    $("#errmsg").text(errmsg);
    $("#errmsg").css("color", "red");
  }
 
/* 
    9100012:TMH12 spare PC
    9100026: BOH26 spare PC
    9100008: ETT8 spare PC
    9200012: BPF12/BMK spare PC
    9200004: BNK4 spare PC
    function audit_my_pc()
    {
	var staffid=document.getElementById("staffid").value;
	//alert("id:"+staffid);
	if (staffid.length<5) {
	  alert("Invalid Staff ID!\rPlease input your staff ID and press [Audit my PC].");
        } else {
          location.href = "/open-audit/index.php/login/audit_my_pc/"+staffid;
        }
        //location.href = "/open-audit/index.php/login/audit_my_pc";
        //alert("/open-audit/index.php/login/audit_my_pc/"+staffid);
    }
*/
<?php if ($systems == '0') {
    ?>
    document.getElementById("staffid").value = "";
    document.getElementById("username").value = "";
    document.getElementById("password").value = "";
    <?php

} ?>
</script>
</body>
</html>
