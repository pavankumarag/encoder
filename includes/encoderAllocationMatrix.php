<?php


//$thisScriptName = 'index.php?content=encoderAllocation';
{  //   Style declarations
			$trOdd = 'style = "background-color: #BFFFCF;"';
			$trEven = 'style = "background-color: #FCCDFF;"';
			
			$textFont = 'style = " font-family: arial, helvetica, sans-serif; "';
			$textRed = 'style = " font-family: arial, helvetica, sans-serif; color:maroon; "';
			
			$indent50 = 'style = " margin-left: 50; "';
			$indent100 = 'style = " margin-left: 100; "';
			
	//   END: Style declarations	
	}
	
	echo '<h1>All Allocations by Encoder</h1>';
	
	{	//		SQL
	$eEncoderAllocation_SQLselect = "SELECT  ";
	$eEncoderAllocation_SQLselect .= "eEncoderAllocation.ID AS allocationID, ";	
	$eEncoderAllocation_SQLselect .= "eEncoderAllocation.user, ";	
	$eEncoderAllocation_SQLselect .= "eEncoderAllocation.email, eEncoderAllocation.startDate, eEncoderAllocation.endDate, ";	
	$eEncoderAllocation_SQLselect .= "eEncoder.ID AS encoderID, ";		
	$eEncoderAllocation_SQLselect .= "eEncoder.encoderIP, eEncoder.encoderInfo ";	
	$eEncoderAllocation_SQLselect .= "FROM eEncoderAllocation LEFT JOIN eEncoder ";
	$eEncoderAllocation_SQLselect .= "ON eEncoderAllocation.encoderID = eEncoder.ID ";
	$eEncoderAllocation_SQLselect .= "ORDER BY encoderID ";
	//$eEncoderAllocation_SQLselect .= "eEncoderAllocation.LastName, eEncoderAllocation.FirstName ";

	$eEncoderAllocation_SQLselect_Query = mysql_query($eEncoderAllocation_SQLselect);
	//		END:  SQL 	
	}		
	$currentEncoderID = -1;
	$indx = 0;
	$tableEnd = 0;
	//echo '<div '.$textFont.'>';
	//date_default_timezone_set('GMT');

	while ($row = mysql_fetch_array($eEncoderAllocation_SQLselect_Query, MYSQL_ASSOC))
	 {		
												$allocationID = $row['allocationID'];
												$user = $row['user'];
												$email = $row['email'];
												$startDate = date('D M/d/Y H:i:s',$row['startDate']);
												$endDate = date('D M/d/Y H:i:s',$row['endDate']);
																						
												$encoderID = $row['encoderID'];
												$encoderIP = long2ip($row['encoderIP']);
												$encoderInfo = $row['encoderInfo'];																						 
												$encoderFullInfo = trim($encoderIP." ".$encoderInfo);

												if (empty($encoderID)) 
												{
													$encoderID = 0;
													$encoderFullInfo = "UN-Allocated";
												}	
								
											   if ($encoderID <> $currentEncoderID)
											    {										
												  if ($currentCompanyID <> -1)
												 {											   
										 				echo "</table>";	
										 				//echo '</div>';
											   	}
											   	echo '<h2 '.$indent50.'>'.$encoderFullInfo.'</h2>';											   	
													//echo '<div '.$indent100.'>';
											   	echo "<table border='1'>";
													echo "<tr>";																											
														echo "<td>ID</td>";
														echo "<td>user</td>";
														echo "<td>email</td>";
														echo '<td>Start Date</td>';
														echo '<td>Release Date </td>';												
													echo "</tr>";  
											   } 
								  					$currentEncoderID = $encoderID;
											if (($indx % 2) == 1) {$rowClass = $trOdd; } else { $rowClass = $trEven; }
											echo '<tr '.$rowClass.'>';								 														
												echo "<td>".$allocationID."&nbsp;</td>";       //  this is NOT  eEncoderAllocation.ID
												echo "<td>".$user."&nbsp;</td>";
												echo "<td>".$email."&nbsp;</td>";
												echo "<td>".$startDate."&nbsp;</td>";
												echo "<td>".$endDate."&nbsp;</td>";																						
											echo "</tr>";
											$indx++;
											$tableEnd = 1;
	}
	
	//echo '</div>';
	echo '</table><br />';

	mysql_free_result($eEncoderAllocation_SQLselect_Query);		

echo '<a href="index.php">Back to Menu</a>';
?>