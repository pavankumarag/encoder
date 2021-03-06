<?php

/*		INCLUDE FILE:   fn_EncoderAllocationEntry_SQL.php
*
*		folder:			includes/
*
*		used in:       index.php
*
*		version:    	0901   date: 2010-07-01
*
*		purpose:			FUNCTIONS:
*							personInsert - INSERTS new tPerson record
*							personUpdate - UPDATES edits from tp_personEditForm.php
*
*	===========================================================================
*/		

	function personInsert($Salutation, $FirstName, $LastName, $Tel, $eMail, $companyID) {

		$tPerson_SQLinsert = "INSERT INTO tPerson (";			
		$tPerson_SQLinsert .=  "Salutation, ";
		$tPerson_SQLinsert .=  "FirstName, ";
		$tPerson_SQLinsert .=  "LastName, ";
		$tPerson_SQLinsert .=  "Tel, ";	
		$tPerson_SQLinsert .=  "eMail, ";	
		$tPerson_SQLinsert .=  "companyID ";
		$tPerson_SQLinsert .=  ") ";
		
		$tPerson_SQLinsert .=  "VALUES (";
		$tPerson_SQLinsert .=  "'".$Salutation."', ";
		$tPerson_SQLinsert .=  "'".$FirstName."', ";
		$tPerson_SQLinsert .=  "'".$LastName."', ";
		$tPerson_SQLinsert .=  "'".$Tel."', ";	
		$tPerson_SQLinsert .=  "'".$eMail."', ";	
		$tPerson_SQLinsert .=  "'".$companyID."' ";
		$tPerson_SQLinsert .=  ") ";

		if (!empty($LastName)) {
			if (mysql_query($tPerson_SQLinsert))  {	
				$errorMsg = "";
			} else {
				$errorMsg = "FAILED to add new person.";
			}
		} else {
			$errorMsg = "Cannot add person with no Lastname.";
		}		
		return $errorMsg;
	}	

	function personUpdate($personID, $Salutation, $FirstName, $LastName, $Tel, $eMail, $companyID) {
		
		$tPerson_SQLupdate = "UPDATE tPerson SET ";			
		$tPerson_SQLupdate .=  "CompanyID = '".$companyID."', "; 
		
		$tPerson_SQLupdate .=  "Salutation = '".$Salutation."', ";
		$tPerson_SQLupdate .=  "FirstName = '".$FirstName."', ";
		$tPerson_SQLupdate .=  "LastName = '".$LastName."', ";
		$tPerson_SQLupdate .=  "Tel = '".$Tel."', ";
		$tPerson_SQLupdate .=  "eMail = '".$eMail."' ";
		$tPerson_SQLupdate .=  "WHERE ID = '".$personID."' "; 	
	
		if (!empty($LastName)) {
			if (mysql_query($tPerson_SQLupdate))  {	
				$errorMsg = "";
			} else {
				$errorMsg = "FAILED to update person.";
			}
		} else {
			$errorMsg = "Cannot make Lastname empty.";
		}		
		
		return $errorMsg;
	}	


?>