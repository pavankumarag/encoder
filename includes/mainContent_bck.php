<?php
echo '<html>
<head>
<title>Encoder Usage Management</title>
<link href="encoder_main.css" rel="stylesheet" type="text/css" />
</head>
<body id="mainPage">
<div align="right">
	<h2 style="color: red; font-weight: bolder;">*Please login to continue</h2>
			<form name="postLoginHid" action="'.$thisScriptName.'" method="post">
			
					<P>User: 
					<INPUT TYPE=text NAME=username value="" SIZE=12 MAXLENGTH=16></P>
					<P>Password: 
					<INPUT TYPE=password NAME=password value="" SIZE=12 MAXLENGTH=16></P>
					<input type="submit"  value="Login" />
				
		</form>
		
</div>


<div align="left",style="font-family: arial, helvetica, sans-serif;font-style: sans-serif;padding-left: 50px;">
<a href="addEditEncoder.php">
				<span class="header ">Add/Edit Encoder or Encoder Details</span>
				
</a>
<br /><br />

<a href="companyCreate.php">
				<span class="header ">List Consolidated Encoder Allocation</span>
</a>
<br /><br />

<a href="companyCreate.php">
				<span class="header ">List Per Encoder Allocation</span>
</a>
<br /><br />

<a href="companyCreate.php">
				<span class="header ">New/Modify Encoder Allocation</span>
</a>
<br /><br />
<img src="images/akamai_logo.jpg" alt="Akamai" style="width:10%;height:10%	"/>
</div>

<div align="middle",style="font-family: arial, helvetica, sans-serif;font-style: sans-serif;padding-left: 100px;">

<h1>Encoder Allocation Tool(EAT)</h1>

<h2>(EAT)</h2>
</div>
				  

</body>

</html>'
?>