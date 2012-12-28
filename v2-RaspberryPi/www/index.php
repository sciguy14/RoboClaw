<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RoboClaw v2 Control - Jeremy Blum</title>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
function SetOutputVal(pin,val) {
	$.get("command.php?pin=" + pin + "&val=" + val);
	return false;
}
</script>
</head>
<body>

<table>

<tr><td colspan="2" align="center">
<font face="Verdana, Geneva, sans-serif"><Strong>Robotic Claw Control v2</Strong> - Jeremy Blum</font>
</td></tr>

<tr><td>
<!--WEBCAM STREAM-->
<SCRIPT LANGUAGE="JavaScript">
// Set the BaseURL to the URL of your camera
var BaseURL = "http://cornell.jeremyblum.com:8000/";

// DisplayWidth & DisplayHeight specifies the displayed width & height of the image.
// You may change these numbers, the effect will be a stretched or a shrunk image
var DisplayWidth = "480";
var DisplayHeight = "360";

// This is the path to the image generating file inside the camera itself
var File = "axis-cgi/mjpg/video.cgi?resolution=640x480";
// No changes required below this point
var output = "";
if ((navigator.appName == "Microsoft Internet Explorer") &&
   (navigator.platform != "MacPPC") && (navigator.platform != "Mac68k"))
{
  // If Internet Explorer under Windows then use ActiveX 
  output  = '<OBJECT ID="Player" width='
  output += DisplayWidth;
  output += ' height=';
  output += DisplayHeight;
  output += ' CLASSID="CLSID:DE625294-70E6-45ED-B895-CFFA13AEB044" ';
  output += 'CODEBASE="';
  output += BaseURL;
  output += 'activex/AMC.cab#version=3,32,31,0">';
  output += '<PARAM NAME="MediaURL" VALUE="';
  output += BaseURL;
  output += File + '">';
  output += '<param name="MediaType" value="mjpeg-unicast">';
  output += '<param name="ShowStatusBar" value="0">';
  output += '<param name="ShowToolbar" value="0">';
  output += '<param name="AutoStart" value="1">';
  output += '<param name="StretchToFit" value="1">';
  output += '<BR><B>Axis Media Control</B><BR>';
  output += 'The AXIS Media Control, which enables you ';
  output += 'to view live image streams in Microsoft Internet';
  output += ' Explorer, could not be registered on your computer.';
  output += '<BR></OBJECT>';
} else {
  // If not IE for Windows use the browser itself to display
  theDate = new Date();
  output  = '<IMG SRC="';
  output += BaseURL;
  output += File;
  output += '&dummy=' + theDate.getTime().toString(10);
  output += '" HEIGHT="';
  output += DisplayHeight;
  output += '" WIDTH="';
  output += DisplayWidth;
  output += '" ALT="Camera Image">';
}
document.write(output);
document.Player.ToolbarConfiguration = "play,+snapshot,+fullscreen"
</SCRIPT>
<!--END WEBCAM STREAM-->
</td><td>

<div id="imgmapdiv">  
	<map name="imgmap">  
    	
        <!--CLAW OPEN CLOSE-->
        <area shape="poly" coords="19,188,26,235,64,199,20,190" href="#" onClick="return SetOutputVal(22, 1);" title="Claw Open" alt="Claw Open">
        <area shape="poly" coords="83,275,125,244,126,289" href="#" onClick="return SetOutputVal(22, 1);" title="Claw Open" alt="Claw Open">  
        <area shape="poly" coords="71,212,76,245,44,238" href="#" onClick="return SetOutputVal(22, 0);" title="Claw Close" alt="Claw Close">  
        <area shape="poly" coords="78,229,79,261,108,238" href="#" onClick="return SetOutputVal(22, 0);" title="Claw Close" alt="Claw Close">  
          

		<!--WRIST UP DOWN-->
 	 	<area shape="poly" coords="238,12,199,66,277,67" href="#" onClick="return SetCmd('WU', '3');" title="Wrist Up 3" alt="Wrist Up 3">  
        <area shape="poly" coords="199,89,215,67,259,66,278,89,261,90,217,89,205,91" href="#" onClick="return SetCmd('WU', '2');" title="Wrist Up 2" alt="Wrist Up 2">  
        <area shape="poly" coords="214,89,263,90,276,114,200,113" href="#" onClick="return SetCmd('WU', '1');" title="Wrist Up 1" alt="Wrist Up 1">  
        <area shape="poly" coords="199,139,216,162,262,161,276,140,222,139,201,140" href="#" onClick="return SetCmd('WD', '1');" title="Wrist Down 1" alt="Wrist Down 1">  
        <area shape="poly" coords="197,163,214,185,261,186,276,162,200,163" href="#" onClick="return SetCmd('WD', '2');" title="Wrist Down 2" alt="Wrist Down 2">  
        <area shape="poly" coords="199,186,277,187,239,241" href="#" onClick="return SetCmd('WD', '3');" title="Wrist Down 3" alt="Wrist Down 3"> 

		<!--ELBOW UP DOWN-->
        <area shape="poly" coords="562,87,497,99,551,152" href="#" onClick="return SetCmd('EU', '3');" title="Elbow Up 3" alt="Elbow Up 3">  
        <area shape="poly" coords="535,170,540,143,507,111,480,116" href="#" onClick="return SetCmd('EU', '2');" title="Elbow Up 2" alt="Elbow Up 2">  
        <area shape="poly" coords="462,131,489,128,522,161,518,187,464,133" href="#" onClick="return SetCmd('EU', '1');" title="Elbow Up 1" alt="Elbow Up 1">  
        <area shape="poly" coords="427,161,482,217,456,221,423,187" href="#" onClick="return SetCmd('ED', '1');" title="Elbow Down 1" alt="Elbow Down 1">  
        <area shape="poly" coords="411,177,466,233,438,237,407,204" href="#" onClick="return SetCmd('ED', '2');" title="Elbow Down 2" alt="Elbow Down 2">  
        <area shape="poly" coords="394,194,383,261,450,250" href="#" onClick="return SetCmd('ED', '3');" title="Elbow Down 3" alt="Elbow Down 3">  
         
        <!--ARM FORWARD BACK-->
	 	<area shape="poly" coords="310,299,311,377,255,338" href="#" onClick="return SetCmd('AD', '3');" title="Arm Back 3" alt="Arm Back 3">
        <area shape="poly" coords="311,315,334,298,335,314,334,353,335,377,323,371,310,362,309,351,311,336,312,322" href="#" onClick="return SetCmd('AD', '2');" title="Arm Back 2" alt="Arm Back 2">
        <area shape="poly" coords="357,378,358,301,334,316,335,361,354,376" href="#" onClick="return SetCmd('AD', '1');" title="Arm Back 1" alt="Arm Back 1">
	 	<area shape="poly" coords="413,315,414,361,391,375,390,298" href="#" onClick="return SetCmd('AU', '1');" title="Arm Forward 1" alt="Arm Forward 1">         
	 	<area shape="poly" coords="414,299,413,377,438,360,437,316,416,301,414,300" href="#" onClick="return SetCmd('AU', '2');" title="Arm Forward 2" alt="Arm Forward 2">  
	 	<area shape="poly" coords="437,298,438,378,491,338" href="#" onClick="return SetCmd('AU', '3');" title="Arm Forward 3" alt="Arm Forward 3">

		<!--ARM ROTATE-->
		<area shape="poly" coords="222,348,202,356,193,362,186,373,177,384,175,395,174,410,182,406,200,405,209,406,216,409,222,413,230,415,244,418,233,408,228,401,226,394,222,382,223,364" href="#" onClick="return SetCmd('SR', '3');" title="Swivel Right 3" alt="Swivel Right 3">
		<area shape="poly" coords="183,405,184,413,185,421,184,430,188,440,190,444,197,443,196,438,201,437,211,435,223,437,230,438,244,436,252,437,241,430,233,427,225,422,223,419,221,413,218,411,205,407,183,405" href="#" onClick="return SetCmd('SR', '2');" title="Swivel Right 2" alt="Swivel Right 2">
		<area shape="poly" coords="197,440,200,448,202,469,209,467,221,465,236,461,247,460,261,458,270,455,263,451,254,445,248,441,245,440,217,438,212,437,206,439,200,441" href="#" onClick="return SetCmd('SR', '1');" title="Swivel Right 1" alt="Swivel Right 1">
        <area shape="poly" coords="346,516,340,510,336,507,333,500,329,490,326,484,324,479,315,475,310,471,305,467,301,462,295,458,297,469,302,481,308,496,312,513,317,530,327,524,337,520" href="#" onClick="return SetCmd('SL', '1');" title="Swivel Left 1" alt="Swivel Left 1">
        <area shape="poly" coords="319,464,326,477,331,489,337,501,346,512,347,518,343,528,356,526,366,522,376,516,380,513,378,507,376,501,368,495,363,488,354,484,352,480,339,478,329,472,327,472" href="#" onClick="return SetCmd('SL', '2');" title="Swivel Left 2" alt="Swivel Left 2">
        <area shape="poly" coords="341,467,355,470,370,471,382,466,395,462,406,455,411,451,412,463,413,479,411,488,405,498,399,510,390,518,381,522,382,513,379,504,375,494,366,491,362,485,355,482,353,480,350,477,346,472" href="#" onClick="return SetCmd('SL', '3');" title="Swivel Left 3" alt="Swivel Left 3">

	</map>  
</div>  
   
   <img src="images/claw.gif" alt="Move mouse over image" usemap="#imgmap" border="0">  


</td></tr></table>

</body>
</html>
