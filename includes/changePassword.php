<?php

$thisScriptName = "index.php?content=changePassword";
	
			$userID = $_COOKIE["userID"];
			$currentPassword = $_POST["currentPassword"];			
			if(isset($currentPassword)) {
				
				$currentPassword = md5($currentPassword);	
				echo '<br />';
				$newPassword = md5($_POST["newPassword"]);
				$validatePassword = md5($_POST["validatePassword"]);	
				$get_UserPassword_SQL = "SELECT password from eUser where ID =\"$userID\" ";
				//echo $get_UserPassword_SQL;
				$get_UserPassword_SQL_Query = mysql_query($get_UserPassword_SQL);
				//echo $get_UserPassword_SQL_Query;
				$dbPassword = mysql_fetch_assoc($get_UserPassword_SQL_Query);
				 $dbPassword = $dbPassword['password'];
				if ( $currentPassword == $dbPassword)
				{
						if( $newPassword == $validatePassword)
						{
								$update_UserPassword_SQL = "UPDATE eUser SET password = '".$newPassword."'  WHERE ID = '".$userID."' ";
								//echo $update_UserPassword_SQL;
								if( mysql_query($update_UserPassword_SQL))
								{
										//setcookie("loginAuthorised", "", time()-7200,"/");											
										echo 'Password Successfully Changed. Please relogin to continue &nbsp;&nbsp;
													<a href="index.php">
										<span class="mainMenuItem">Login</span>
										</a>';																																					
								}
								else
								 {
										echo 'Some errors while changing password'.mysql_error().' <a href="index.php?content=changePassword">
										<span class="mainMenuItem">Retry</span>';
								}
								
						}
						else 						
						{
								echo 'New password and Validate Password field does not match. &nbsp;&nbsp;<a href="index.php?content=changePassword">
										<span class="mainMenuItem">Click to Try Again</span>
										</a>';
						}
				}
				else
				 {
						echo 'Current password does not match. &nbsp;&nbsp;<a href="index.php?content=changePassword">
										<span class="mainMenuItem">Click to Try Again</span>
										</a>';
				}
			}
			else {
						echo '<form name="poseUser" action="index.php?content=changePassword" method="post">';
								echo '<input type="hidden" name="saveClicked" value="saveClicked"/>';
								echo '
								<table>
									<tr>
										<td>Current Password</td>
										<td><input type="password" name="currentPassword" /></td>
									</tr>
									<tr>
										<td>New password</td>
										<td><input type="password" name="newPassword" /></td>
									</tr>
									<tr>
										<td>retype password</td>
										<td><input type="text" name="validatePassword" /></td>
									</tr>
									<tr>
										<td></td>
										<td align="right"><input type="submit"  value="Save" /></td>
									</tr>
								</table>
								';
									
						echo '</form>';
			}

?>