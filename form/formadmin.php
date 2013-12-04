<?php
//----------------------------------------------------------------------------- 
//  
// Initialize variables 
//   

$debug = true; 
//if ($debug) print "<p>DEBUG MODE IS ON</p>"; 

$baseURL = "https://www.uvm.edu/~asalate/"; 
$folderPath = "cs148/assignment7.1/form"; 
// full URL of this form 
$yourURL = $baseURL . $folderPath . "/form.php"; 

require_once("connect.php"); 

//############################################################################# 
// set all form variables to their default value on the form. for testing i set 
// to my email address. you lose 10% on your grade if you forget to change it. 

$Logon = "";
$Fname = "";
$Lname = "";
$email = ""; 
$link = "";
$classof = "";
$deptnum = "";
$chk1 = false;
$year1 = "";
$term1 = "";
$chk2 = false;
$year2 = "";
$term2 = "";
$chk3 = false;
$year3 = "";
$term3 = "";
$chk4 = false;
$year4 = "";
$term4 = "";
$chk5 = false;
$year5 = "";
$term5 = "";
$chk6 = false;
$year6 = "";
$term6 = "";
$chk7 = false;
$year7 = "";
$term7 = "";
$chk8 = false;
$year8 = "";
$term8 = "";
// Delete Button //

if (isset($_POST["btnDelete"])) {
	 $Logon = htmlentities($_POST["txtLogon"], ENT_QUOTES, "UTF-8");
	 $email = $Logon;
//-----------------------------------------------------------------------------
// 
// Checking to see if the form's been submitted. if not we just skip this whole 
// section and display the form

    // I may need to do a select to see if there are any related records.
    // and determine my processing steps before i try to code.

    $sql = "DELETE ";
    $sql .= "FROM tblStudent ";
    $sql .= 'WHERE pkEmail="' . $email . '"' ;

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $DeleteData = $stmt->execute();
		
		$sql = "DELETE ";
    $sql .= "FROM tblImage ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);
		
		$DeleteData = $stmt->execute();
		
		$sql = "DELETE ";
    $sql .= "FROM tblRegister ";
    $sql .= 'WHERE pkEmail="' . $email . '"' ;

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $DeleteData = $stmt->execute();
		
		$sql = "DELETE ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= "AND fkCourseID=1";

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $DeleteData = $stmt->execute();
		
		$sql = "DELETE ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= "AND fkCourseID=2";

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $DeleteData = $stmt->execute();
		
		$sql = "DELETE ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= "AND fkCourseID=3";

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $DeleteData = $stmt->execute();
		
		$sql = "DELETE ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= "AND fkCourseID=4";

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $DeleteData = $stmt->execute();
		
		$sql = "DELETE ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= "AND fkCourseID=5";

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $DeleteData = $stmt->execute();
		
		$sql = "DELETE ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= "AND fkCourseID=6";

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $DeleteData = $stmt->execute();
		
		
		$sql = "DELETE ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= "AND fkCourseID=7";

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $DeleteData = $stmt->execute();
		
		$sql = "DELETE ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= "AND fkCourseID=8";

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $DeleteData = $stmt->execute();
	
	// If Deleted, go to Home //
		
//		if($DeleteData){
//        header('Location: home.php');
//        exit();
//    }
}

// Log On Button //
if (isset($_POST["btnLogon"])) {
	 $Logon = htmlentities($_POST["txtLogon"], ENT_QUOTES, "UTF-8");
	 $email = $Logon;
	 if ($debug) print "<p>here " . $Logon;

    $sql = "SELECT fldFirstName, fldLastName, fldClassOf ";
    $sql .= "FROM tblStudent ";
    $sql .= 'WHERE pkEmail="' . $email . '"' ;

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $stmt->execute();

    $info = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($info);
        print "</pre>";
    }
	
    foreach ($info as $key) {
        $Fname = $key["fldFirstName"];
        $Lname = $key["fldLastName"];
        $classof = $key["fldClassOf"]; 
				}
				
	// Second SQL //
				
		$sql = "SELECT fldFileLink ";
    $sql .= "FROM tblImage ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $stmt->execute();

    $info = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($info);
        print "</pre>";
    }
	
    foreach ($info as $key) {
        $link = $key["fldFileLink"];
				}
				
				// THIRD SQL //
				
				$sql = "SELECT fldTerm, fldYear ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= "AND fkCourseID=1";

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $stmt->execute();

    $info = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($info);
        print "</pre>";
    }
	
    foreach ($info as $key) {
        $year1 = $key["fldYear"];
				$term1 = $key["fldTerm"];
				}
				if ($year1 != "") {
				$chk1 = "checked";}
				
				// FORTH SQL //
				
				$sql = "SELECT fldTerm, fldYear ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= "AND fkCourseID=2";

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $stmt->execute();

    $info = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($info);
        print "</pre>";
    }
	
    foreach ($info as $key) {
        $year2 = $key["fldYear"];
				$term2 = $key["fldTerm"];
				}
				if ($year2 != "") {
				$chk2 = "checked";}
				
				// FIFTH SQL //
				
				$sql = "SELECT fldTerm, fldYear ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= "AND fkCourseID=3";

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $stmt->execute();

    $info = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($info);
        print "</pre>";
    }
	
    foreach ($info as $key) {
        $year3 = $key["fldYear"];
				$term3 = $key["fldTerm"];
				}
				if ($year3 != "") {
				$chk3 = "checked";}
				
				// SIXTH SQL //
				
				$sql = "SELECT fldTerm, fldYear ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= "AND fkCourseID=4";

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $stmt->execute();

    $info = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($info);
        print "</pre>";
    }
	
    foreach ($info as $key) {
        $year4 = $key["fldYear"];
				$term4 = $key["fldTerm"];
				}
				if ($year4 != "") {
				$chk4 = "checked";}
				
				// SEVENTH SQL //
				
				$sql = "SELECT fldTerm, fldYear ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= "AND fkCourseID=5";

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $stmt->execute();

    $info = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($info);
        print "</pre>";
    }
	
    foreach ($info as $key) {
        $year5 = $key["fldYear"];
				$term5 = $key["fldTerm"];
				}
				if ($year5 != "") {
				$chk5 = "checked";}
				
				// EIGHTH SQL //
				
				$sql = "SELECT fldTerm, fldYear ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= "AND fkCourseID=6";

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $stmt->execute();

    $info = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($info);
        print "</pre>";
    }
	
    foreach ($info as $key) {
        $year6 = $key["fldYear"];
				$term6 = $key["fldTerm"];
				}
				if ($year6 != "") {
				$chk6 = "checked";}
				
				// NINTH SQL //
				
				$sql = "SELECT fldTerm, fldYear ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= "AND fkCourseID=7";

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $stmt->execute();

    $info = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($info);
        print "</pre>";
    }
	
    foreach ($info as $key) {
        $year7 = $key["fldYear"];
				$term7 = $key["fldTerm"];
				}
				if ($year7 != "") {
				$chk7 = "checked";}
				
				// TENTH SQL //
				
				$sql = "SELECT fldTerm, fldYear ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= "AND fkCourseID=8";

    if ($debug)
        print "<p>sql " . $sql;

    $stmt = $db->prepare($sql);

    $stmt->execute();

    $info = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($info);
        print "</pre>";
    }
	
    foreach ($info as $key) {
        $year8 = $key["fldYear"];
				$term8 = $key["fldTerm"];
				}
				if ($year8 != "") {
				$chk8 = "checked";}
				
   }  
	
	 
//############################################################################# 
//  
// flags for errors 

$FnameERROR = false;
$LnameERROR = false;
$emailERROR = false; 
$linkERROR = false; 
$classofERROR = false;

//############################################################################# 
//   
$mailed = false; 
$messageA = ""; 
$messageB = ""; 
$messageC = ""; 



//----------------------------------------------------------------------------- 
//  
// Checking to see if the form's been submitted. if not we just skip this whole  
// section and display the form 
//  
//############################################################################# 
// minor security check 
if (isset($_POST["btnSubmit"])) { 
    $fromPage = getenv("http_referer"); 

   if ($debug) 
        print "<p>From: " . $fromPage . " should match "; 
        print "<p>Your: " . $yourURL; 

   if ($fromPage != $yourURL) { 
        die("<p>Sorry you cannot access this page. Security 
  			each detected and reported.</p>"); 
    } 

//############################################################################# 
// replace any html or javascript code with html entities 
// 
	  $Fname = htmlentities($_POST["txtFname"], ENT_QUOTES, "UTF-8");
		$Lname = htmlentities($_POST["txtLname"], ENT_QUOTES, "UTF-8");
    $email = htmlentities($_POST["txtemail"], ENT_QUOTES, "UTF-8"); 
		$link = htmlentities($_POST["txtlink"], ENT_QUOTES, "UTF-8"); 
		$classof = htmlentities($_POST["radclassof"], ENT_QUOTES, "UTF-8");
		
		if(isset($_POST["chk1"])) {
        $chk1  = true;
    }else{
        $chk1  = false;
    }
		
		$year1 = htmlentities($_POST["lstyear1"], ENT_QUOTES, "UTF-8");
		$term1 = htmlentities($_POST["lstterm1"], ENT_QUOTES, "UTF-8");
		
		if(isset($_POST["chk2"])) {
        $chk2  = true;
    }else{
        $chk2  = false;
    }
		
		$year2 = htmlentities($_POST["lstyear2"], ENT_QUOTES, "UTF-8");
		$term2 = htmlentities($_POST["lstterm2"], ENT_QUOTES, "UTF-8");
		
		if(isset($_POST["chk3"])) {
        $chk3  = true;
    }else{
        $chk3  = false;
    }
		
		$year3 = htmlentities($_POST["lstyear3"], ENT_QUOTES, "UTF-8");
		$term3 = htmlentities($_POST["lstterm3"], ENT_QUOTES, "UTF-8");
		
		if(isset($_POST["chk4"])) {
        $chk4  = true;
    }else{
        $chk4  = false;
    }
		
		$year4 = htmlentities($_POST["lstyear4"], ENT_QUOTES, "UTF-8");
		$term4 = htmlentities($_POST["lstterm4"], ENT_QUOTES, "UTF-8");
		
		if(isset($_POST["chk5"])) {
        $chk5  = true;
    }else{
        $chk5  = false;
    }
		
		$year5 = htmlentities($_POST["lstyear5"], ENT_QUOTES, "UTF-8");
		$term5 = htmlentities($_POST["lstterm5"], ENT_QUOTES, "UTF-8");
	
	  if(isset($_POST["chk6"])) {
        $chk6  = true;
    }else{
        $chk6  = false;
    }
	
		$year6 = htmlentities($_POST["lstyear6"], ENT_QUOTES, "UTF-8");
		$term6 = htmlentities($_POST["lstterm6"], ENT_QUOTES, "UTF-8");
		
		if(isset($_POST["chk7"])) {
        $chk7  = true;
    }else{
        $chk7  = false;
    }
		
		$year7 = htmlentities($_POST["lstyear7"], ENT_QUOTES, "UTF-8");
		$term7 = htmlentities($_POST["lstterm7"], ENT_QUOTES, "UTF-8");
		
		if(isset($_POST["chk8"])) {
        $chk8  = true;
    }else{
        $chk8  = false;
    }
		
		$year8 = htmlentities($_POST["lstyear8"], ENT_QUOTES, "UTF-8");
		$term8 = htmlentities($_POST["lstterm8"], ENT_QUOTES, "UTF-8");

//############################################################################# 
//  
// Check for mistakes using validation functions 
// 
// create array to hold mistakes 
//  
		
    include ("validation_functions.php"); 

    $errorMsg = array(); 


//############################################################################ 
//  
// Check each of the fields for errors then adding any mistakes to the array. 
// 
    //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^       Check email address 
    
		
		if (empty($Fname)) { 
        $errorMsg[] = "Please enter your First Name"; 
        $FnameERROR = true; 
    } else { 
        $valid = verifyFname($Fname); /* test for non-valid  data */ 
        if (!$valid) { 
            $errorMsg[] = "I'm sorry, please enter a valid First Name"; 
            $FnmeERROR = true; 
        } 
    } 
		
		if (empty($Lname)) { 
        $errorMsg[] = "Please enter your Last Name"; 
        $LnameERROR = true; 
    } else { 
        $valid = verifyLname($Lname); /* test for non-valid  data */ 
        if (!$valid) { 
            $errorMsg[] = "I'm sorry, please enter a valid Last Name"; 
            $LnameERROR = true; 
        } 
    } 
		
		if (empty($email)) { 
        $errorMsg[] = "Please enter your Email Address"; 
        $emailERROR = true; 
    } else { 
        $valid = verifyEmail($email); /* test for non-valid  data */ 
        if (!$valid) { 
            $errorMsg[] = "I'm sorry but the email address you entered is not valid."; 
            $emailERROR = true; 
        } 
    } 
		
		if (empty($link)) { 
        $errorMsg[] = "Please enter the link to your Photo"; 
        $linkERROR = true; 
    } else { 
        $valid = verifylink($link); /* test for non-valid  data */ 
        if (!$valid) { 
            $errorMsg[] = "I'm sorry but the link you entered is not valid."; 
            $linkERROR = true; 
        } 
    } 
		
		if (empty($classof)) { 
        $errorMsg[] = "Please enter your Graduation Year"; 
        $classofERROR = true; 
    } else { 
        $valid = verifyclassof($classof); /* test for non-valid  data */ 
        if (!$valid) { 
            $errorMsg[] = "I'm sorry but the year you've selected is not valid."; 
            $classofERROR = true; 
        } 
    } 
	
	
	// My attempt at Error Checking the Checkboxes and Lists... fail. 
	
		
	/*	if (!empty($term1) AND !isset($_POST["txtchk1"])); {
			 $errorMsg[] = "I'm sorry but you didn't check CS 148.";} 
			 
		if (!empty($year1) AND !isset($_POST["txtchk1"])); {
			 $errorMsg[] = "I'm sorry but you didn't check CS 148.";}
			
		
		//	} elseif (isset($_POST['txtchk1']))
		//	{$valid="1";}
		//	endif
			 
		if (!empty($term2) AND !isset($_POST["txtchk2"])); {
			 $errorMsg[] = "I'm sorry but you didn't check CS 142.";}
			 
			 
		if (!empty($year2) AND !isset($_POST["txtchk2"])); {
			 $errorMsg[] = "I'm sorry but you didn't check CS 142.";} */

//############################################################################ 
//  
// Processing the Data of the form 
// 

    if (!$errorMsg) { 
 //       if ($debug) print "<p>Form is valid</p>"; 

//############################################################################ 
// 
// the form is valid so now save the information 
//     

/// Insert or Update? //
 		$sql = "SELECT fldFirstName, fldLastName ";
    $sql .= "FROM tblStudent ";
    $sql .= 'WHERE pkEmail="' . $email . '"' ;
    if ($debug)
        print "<p>sql " . $sql;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $id = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($id);
        print "</pre>";
    }	
    foreach ($id as $key) {
        $id1 = $key["fldFirstName"];
				$id2 = $key["fldLastName"];
				}
				if ($debug) print "<p>id:" . $id2;

		/////////////////////////////////////////////		
	$sql = "SELECT fldYear ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= 'And fkCourseID="1"' ;
    if ($debug)
        print "<p>sql " . $sql;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $ci = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($ci);
        print "</pre>";
    }
    foreach ($ci as $key) {
        $ci1 = $key["fldFirstName"];
				}
				if ($debug) print "<p>ci1:" . $ci1;
						/////////////////////////////////////////////		
	$sql = "SELECT fldYear ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= 'And fkCourseID="2"' ;
    if ($debug)
        print "<p>sql " . $sql;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $ci = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($ci);
        print "</pre>";
    }
    foreach ($ci as $key) {
        $ci2 = $key["fldFirstName"];
				}
				if ($debug) print "<p>ci1:" . $ci2;
		/////////////////////////////////////////////		
	$sql = "SELECT fldYear ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= 'And fkCourseID="3"' ;
    if ($debug)
        print "<p>sql " . $sql;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $ci = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($ci);
        print "</pre>";
    }
    foreach ($ci as $key) {
        $ci3 = $key["fldFirstName"];
				}
				if ($debug) print "<p>ci1:" . $ci3;
		/////////////////////////////////////////////		
	$sql = "SELECT fldYear ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= 'And fkCourseID="4"' ;
    if ($debug)
        print "<p>sql " . $sql;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $ci = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($ci);
        print "</pre>";
    }
    foreach ($ci as $key) {
        $ci4 = $key["fldFirstName"];
				}
				if ($debug) print "<p>ci1:" . $ci4;
			/////////////////////////////////////////////		
	$sql = "SELECT fldYear ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= 'And fkCourseID="5"' ;
    if ($debug)
        print "<p>sql " . $sql;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $ci = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($ci);
        print "</pre>";
    }
    foreach ($ci as $key) {
        $ci5 = $key["fldFirstName"];
				}
				if ($debug) print "<p>ci1:" . $ci5;
		/////////////////////////////////////////////		
	$sql = "SELECT fldYear ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= 'And fkCourseID="6"' ;
    if ($debug)
        print "<p>sql " . $sql;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $ci = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($ci);
        print "</pre>";
    }
    foreach ($ci as $key) {
        $ci6 = $key["fldFirstName"];
				}
				if ($debug) print "<p>ci1:" . $ci6;
		/////////////////////////////////////////////		
	$sql = "SELECT fldYear ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= 'And fkCourseID="7"' ;
    if ($debug)
        print "<p>sql " . $sql;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $ci = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($ci);
        print "</pre>";
    }
    foreach ($ci as $key) {
        $ci7 = $key["fldFirstName"];
				}
				if ($debug) print "<p>ci1:" . $ci7;
			/////////////////////////////////////////////		
	$sql = "SELECT fldYear ";
    $sql .= "FROM tblStudentCourses ";
    $sql .= 'WHERE fkEmail="' . $email . '"' ;
		$sql .= 'And fkCourseID="8"' ;
    if ($debug)
        print "<p>sql " . $sql;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $ci = $stmt->fetchAll();
    if ($debug) {
        print "<pre>";
        print_r($ci);
        print "</pre>";
    }
    foreach ($ci as $key) {
        $ci8 = $key["fldFirstName"];
				}
				if ($debug) print "<p>ci1:" . $ci8;
        
				
				$primaryKey = ""; 	
				
        $dataEntered = false; 
         
        try { 
            $db->beginTransaction(); 
              
							if (isset($_POST["btnSubmit"])) { // update record
							if ($id2 != ""){
            $sql = "UPDATE ";
            $sql .= "tblStudent SET ";
            $sql .= 'fldFirstName="' . $Fname . '", ' ;
            $sql .= 'fldLastName="' . $Lname . '", ' ;
            $sql .= 'fldClassOf="' . $classof . '" ' ;
            $sql .= 'WHERE pkEmail="' . $email . '"' ;
						if ($debug) print "<p>sql ". $sql;
						if ($debug) print "<p>CHECKBOX8 ". $chk8; 
						if ($debug) print "<p>YEAR8 ". $year8; 
						if ($debug) print "<p>TERM8 ". $term8; 
        } else { // insert record
            $sql = "INSERT INTO ";
            $sql .= "tblStudent SET ";
						$sql .= 'pkEmail="' . $email . '", ' ;
            $sql .= 'fldFirstName="' . $Fname . '", ' ;
            $sql .= 'fldLastName="' . $Lname . '", ' ;
            $sql .= 'fldClassOf="' . $classof . '"' ;
						if ($debug) print "<p>sql ". $sql; 
        } }
				
				 $stmt = $db->prepare($sql); 
    //        if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); 
						
						
							if (isset($_POST["btnSubmit"])) { // update record
							if ($id2 != ""){
							$sql = "UPDATE ";
            $sql .= 'tblRegister SET ';
            $sql .='pkEmail="' . $email . '" ';
						if ($debug) print "<p>sql ". $sql;
					} else {
						$sql = "INSERT INTO ";
            $sql .= 'tblRegister SET ';
            $sql .='pkEmail="' . $email . '" ';
						if ($debug) print "<p>sql ". $sql;
					} }
						
            $stmt = $db->prepare($sql); 
    //        if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); 
             
            $primaryKey = $email; 
 //           if ($debug) print "<p>pk= " . $primaryKey;
						
/*						foreach ($_POST as $key => $value){
		          if (substr($key, 0, 3)=="chk")
		            $ObjName = "lstyear".$value;
		            $ObjName2 = "lstterm".$value;
								$objName3 = "chk".$value;
	              	$year = $_POST[ObjName];
	              	$term = $_POST[ObjName2];
									$courseID =  $_POST[ObjName3]; */
							if(isset($_POST['chk1'])){
							
							if (isset($_POST["btnSubmit"])) { // update record
							if ($ci1 != ""){
            $sql = "UPDATE ";
            $sql .= 'tblStudentCourses SET ';
							$sql .= 'fldTerm="' . $term1 . '", ';
							$sql .= 'fldYear="' . $year1 . '"' ;
							$sql .= 'WHERE ';
							$sql .= 'fkCourseID="1"' ;
							$sql .= 'AND' ;
							$sql .= 'fkEmail="' . $email . '"' ;
						if ($debug) print "<p>sql ". $sql;
        } else { // insert record
            $sql = "INSERT INTO ";
            $sql .= 'tblStudentCourses SET ';
							$sql .= 'fkEmail="' . $email . '", ';
							$sql .= 'fkCourseID="1", ';
							$sql .= 'fldTerm="' . $term1 . '", ';
							$sql .= 'fldYear="' . $year1 . '"' ;
						if ($debug) print "<p>sql ". $sql;
					} }
							
						$stmt = $db->prepare($sql); 
 //           if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); }
						
						if (isset($_POST["btnSubmit"])) { // delete record
						if ($chk1 != 1) {
					$sql = "DELETE FROM ";
            $sql .= 'tblStudentCourses ';
							$sql .= 'WHERE fkEmail="' . $email . '" ';
							$sql .= 'AND fkCourseID="1" ';
							if ($debug) print "<p>sql ". $sql;  }
							
							$stmt = $db->prepare($sql); 
 //           if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); }
						
/////------------------------------------/////
						
						$primaryKey = $email; 
 //           if ($debug) print "<p>pk= " . $primaryKey;
						
							if(isset($_POST['chk2'])){
							
							if (isset($_POST["btnSubmit"])) { // update record
							if ($ci2 != ""){
            $sql = "UPDATE ";
            $sql .= 'tblStudentCourses SET ';
							$sql .= 'fldTerm="' . $term1 . '", ';
							$sql .= 'fldYear="' . $year1 . '"' ;
							$sql .= 'WHERE ';
							$sql .= 'fkCourseID="2"' ;
							$sql .= 'AND' ;
							$sql .= 'fkEmail="' . $email . '"' ;
						if ($debug) print "<p>sql ". $sql;
        } else { // insert record
            $sql = "INSERT INTO ";
            $sql .= 'tblStudentCourses SET ';
							$sql .= 'fkEmail="' . $email . '", ';
							$sql .= 'fkCourseID="2", ';
							$sql .= 'fldTerm="' . $term2 . '", ';
							$sql .= 'fldYear="' . $year2 . '"' ;
						if ($debug) print "<p>sql ". $sql;
        } }
						
						$stmt = $db->prepare($sql); 
 //           if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); }
						
						if (isset($_POST["btnSubmit"])) { // delete record
						if ($chk2 != 1) {
					$sql = "DELETE FROM ";
            $sql .= 'tblStudentCourses ';
							$sql .= 'WHERE fkEmail="' . $email . '" ';
							$sql .= 'AND fkCourseID="2" ';
							if ($debug) print "<p>sql ". $sql;  }
							
							$stmt = $db->prepare($sql); 
 //           if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); }
						
/////------------------------------------/////
						$primaryKey = $email; 
    //        if ($debug) print "<p>pk= " . $primaryKey;

							if(isset($_POST['chk3'])){
							
							if (isset($_POST["btnSubmit"])) { // update record
							if ($ci3 != ""){
            $sql = "UPDATE ";
            $sql .= 'tblStudentCourses SET ';
							$sql .= 'fldTerm="' . $term1 . '", ';
							$sql .= 'fldYear="' . $year1 . '"' ;
							$sql .= 'WHERE ';
							$sql .= 'fkCourseID="3"' ;
							$sql .= 'AND' ;
							$sql .= 'fkEmail="' . $email . '"' ;
						if ($debug) print "<p>sql ". $sql;
        } else { // insert record
            $sql = "INSERT INTO ";
            $sql .= 'tblStudentCourses SET ';
							$sql .= 'fkEmail="' . $email . '", ';
							$sql .= 'fkCourseID="3", ';
							$sql .= 'fldTerm="' . $term3 . '", ';
							$sql .= 'fldYear="' . $year3 . '"' ;
						if ($debug) print "<p>sql ". $sql;
				} }
						
						$stmt = $db->prepare($sql); 
    //        if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); }
						
						if (isset($_POST["btnSubmit"])) { // delete record
						if ($chk3 != 1) {
					$sql = "DELETE FROM ";
            $sql .= 'tblStudentCourses ';
							$sql .= 'WHERE fkEmail="' . $email . '" ';
							$sql .= 'AND fkCourseID="3" ';
							if ($debug) print "<p>sql ". $sql;  }
							
							$stmt = $db->prepare($sql); 
 //           if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); }
						
/////------------------------------------/////
						$primaryKey = $email; 
    //        if ($debug) print "<p>pk= " . $primaryKey;

							if(isset($_POST['chk4'])){
							
							if (isset($_POST["btnSubmit"])) { // update record
							if ($ci4 != ""){
            $sql = "UPDATE ";
            $sql .= 'tblStudentCourses SET ';
							$sql .= 'fldTerm="' . $term1 . '", ';
							$sql .= 'fldYear="' . $year1 . '"' ;
							$sql .= 'WHERE ';
							$sql .= 'fkCourseID="4"' ;
							$sql .= 'AND' ;
							$sql .= 'fkEmail="' . $email . '"' ;
						if ($debug) print "<p>sql ". $sql;
        } else { // insert record
            $sql = "INSERT INTO ";
            $sql .= 'tblStudentCourses SET ';
							$sql .= 'fkEmail="' . $email . '", ';
							$sql .= 'fkCourseID="4", ';
							$sql .= 'fldTerm="' . $term4 . '", ';
							$sql .= 'fldYear="' . $year4 . '"' ;
						if ($debug) print "<p>sql ". $sql;
        } }
						
						$stmt = $db->prepare($sql); 
    //        if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); }
						
						if (isset($_POST["btnSubmit"])) { // delete record
						if ($chk4 != 1) {
					$sql = "DELETE FROM ";
            $sql .= 'tblStudentCourses ';
							$sql .= 'WHERE fkEmail="' . $email . '" ';
							$sql .= 'AND fkCourseID="4" ';
							if ($debug) print "<p>sql ". $sql;  }
							
							$stmt = $db->prepare($sql); 
 //           if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); }
						
/////------------------------------------/////
						$primaryKey = $email; 
    //        if ($debug) print "<p>pk= " . $primaryKey;
						
							if(isset($_POST['chk5'])){
							
							if (isset($_POST["btnSubmit"])) { // update record
							if ($ci5 != ""){
            $sql = "UPDATE ";
            $sql .= 'tblStudentCourses SET ';
							$sql .= 'fldTerm="' . $term1 . '", ';
							$sql .= 'fldYear="' . $year1 . '"' ;
							$sql .= 'WHERE ';
							$sql .= 'fkCourseID="5"' ;
							$sql .= 'AND' ;
							$sql .= 'fkEmail="' . $email . '"' ;
						if ($debug) print "<p>sql ". $sql;
        } else { // insert record
            $sql = "INSERT INTO ";
            $sql .= 'tblStudentCourses SET ';
							$sql .= 'fkEmail="' . $email . '", ';
							$sql .= 'fkCourseID="5", ';
							$sql .= 'fldTerm="' . $term5 . '", ';
							$sql .= 'fldYear="' . $year5 . '"' ;
						if ($debug) print "<p>sql ". $sql;
        } }
						
						$stmt = $db->prepare($sql); 
    //        if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); }
						
						if (isset($_POST["btnSubmit"])) { // delete record
						if ($chk5 != 1) {
					$sql = "DELETE FROM ";
            $sql .= 'tblStudentCourses ';
							$sql .= 'WHERE fkEmail="' . $email . '" ';
							$sql .= 'AND fkCourseID="5" ';
							if ($debug) print "<p>sql ". $sql;  }
							
							$stmt = $db->prepare($sql); 
 //           if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); }
						
/////------------------------------------/////
						$primaryKey = $email; 
    //        if ($debug) print "<p>pk= " . $primaryKey;

							if(isset($_POST['chk6'])){
							
							if (isset($_POST["btnSubmit"])) { // update record
							if ($ci6 != ""){
            $sql = "UPDATE ";
            $sql .= 'tblStudentCourses SET ';
							$sql .= 'fldTerm="' . $term1 . '", ';
							$sql .= 'fldYear="' . $year1 . '"' ;
							$sql .= 'WHERE ';
							$sql .= 'fkCourseID="6"' ;
							$sql .= 'AND' ;
							$sql .= 'fkEmail="' . $email . '"' ;
						if ($debug) print "<p>sql ". $sql;
        } else { // insert record
            $sql = "INSERT INTO ";
            $sql .= 'tblStudentCourses SET ';
							$sql .= 'fkEmail="' . $email . '", ';
							$sql .= 'fkCourseID="6", ';
							$sql .= 'fldTerm="' . $term6 . '", ';
							$sql .= 'fldYear="' . $year6 . '"' ;
						if ($debug) print "<p>sql ". $sql;
        } }
						
						$stmt = $db->prepare($sql); 
    //        if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); }
						
						if (isset($_POST["btnSubmit"])) { // delete record
						if ($chk6 != 1) {
					$sql = "DELETE FROM ";
            $sql .= 'tblStudentCourses ';
							$sql .= 'WHERE fkEmail="' . $email . '" ';
							$sql .= 'AND fkCourseID="6" ';
							if ($debug) print "<p>sql ". $sql;  }
							
							$stmt = $db->prepare($sql); 
 //           if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); }
						
/////------------------------------------/////
						$primaryKey = $email; 
    //        if ($debug) print "<p>pk= " . $primaryKey;
						
							if(isset($_POST['chk7'])){
							
							if (isset($_POST["btnSubmit"])) { // update record
							if ($ci7 != ""){
            $sql = "UPDATE ";
            $sql .= 'tblStudentCourses SET ';
							$sql .= 'fldTerm="' . $term1 . '", ';
							$sql .= 'fldYear="' . $year1 . '"' ;
							$sql .= 'WHERE ';
							$sql .= 'fkCourseID="7"' ;
							$sql .= 'AND' ;
							$sql .= 'fkEmail="' . $email . '"' ;
						if ($debug) print "<p>sql ". $sql;
        } else { // insert record
            $sql = "INSERT INTO ";
            $sql .= 'tblStudentCourses SET ';
							$sql .= 'fkEmail="' . $email . '", ';
							$sql .= 'fkCourseID="7", ';
							$sql .= 'fldTerm="' . $term7 . '", ';
							$sql .= 'fldYear="' . $year7 . '"' ;
						if ($debug) print "<p>sql ". $sql;
        } }
						
						$stmt = $db->prepare($sql); 
    //        if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); }
						
						if (isset($_POST["btnSubmit"])) { // delete record
						if ($chk7 != 1) {
					$sql = "DELETE FROM ";
            $sql .= 'tblStudentCourses ';
							$sql .= 'WHERE fkEmail="' . $email . '" ';
							$sql .= 'AND fkCourseID="7" ';
							if ($debug) print "<p>sql ". $sql;  }
							
							$stmt = $db->prepare($sql); 
 //           if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); }
						
/////------------------------------------/////

$primaryKey = $email; 
    //        if ($debug) print "<p>pk= " . $primaryKey;
						
							if(isset($_POST['chk8'])){
							
							if (isset($_POST["btnSubmit"])) { // update record
							if ($ci8 != ""){
            $sql = "UPDATE ";
            $sql .= 'tblStudentCourses SET ';
							$sql .= 'fldTerm="' . $term1 . '", ';
							$sql .= 'fldYear="' . $year1 . '"' ;
							$sql .= 'WHERE ';
							$sql .= 'fkCourseID="8"' ;
							$sql .= 'AND' ;
							$sql .= 'fkEmail="' . $email . '"' ;
						if ($debug) print "<p>sql ". $sql;
        } else { // insert record
            $sql = "INSERT INTO ";
            $sql .= 'tblStudentCourses SET ';
							$sql .= 'fkEmail="' . $email . '", ';
							$sql .= 'fkCourseID="8", ';
							$sql .= 'fldTerm="' . $term8 . '", ';
							$sql .= 'fldYear="' . $year8 . '"' ;
						if ($debug) print "<p>sql ". $sql;
        } }
						
						$stmt = $db->prepare($sql); 
    //        if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); }
						
						if (isset($_POST["btnSubmit"])) { // delete record
						if ($chk8 != 1) {
					$sql = "DELETE FROM ";
            $sql .= 'tblStudentCourses ';
							$sql .= 'WHERE fkEmail="' . $email . '" ';
							$sql .= 'AND fkCourseID="8" ';
							if ($debug) print "<p>sql ". $sql;  }
							
							$stmt = $db->prepare($sql); 
 //           if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); }
						
						
						$primaryKey = $email; 
   //         if ($debug) print "<p>pk= " . $primaryKey; 
//
            if (isset($_POST["btnSubmit"])) { // update record
						if ($id2 != ""){
            $sql = 'UPDATE tblImage SET ';
						$sql .= 'fldFileLink="' . $link . '"';
						$sql .='WHERE ';
						$sql .='fkEmail="' . $email . '" '; 
					}	  else { // insert record
            $sql = 'INSERT INTO tblImage SET ';
						$sql .='fkEmail="' . $email . '", ';
						$sql .= 'fldFileLink="' . $link . '"'; } }
						// use commas
            $stmt = $db->prepare($sql); 
            if ($debug) print "<p>sql ". $sql; 
        
            $stmt->execute(); 
				/*		}   */
						/// redo the above for the other tables
            // all sql statements are done so lets commit to our changes 

			$dataEntered = $db->commit();
  //          if ($debug) print "<p>transaction complete "; 
        } catch (PDOExecption $e) { 
            $db->rollback(); 
 //           if ($debug) print "Error!: " . $e->getMessage() . "</br>"; 
            $errorMsg[] = "There was a problem with accpeting your data please contact us directly."; 
        }

        // If the transaction was successful, give success message 
        if ($dataEntered) { 
   //         if ($debug) print "<p>data entered now prepare keys "; 
	 
            //################################################################# 
            // create a key value for confirmation 

            $sql = "SELECT fldDateJoined FROM tblRegister WHERE pkEmail=" . $primaryKey; 
            $stmt = $db->prepare($sql); 
            $stmt->execute(); 

            $result = $stmt->fetch(PDO::FETCH_ASSOC); 
             
            $dateSubmitted = $result["fldDateJoined"]; 

            $key1 = sha1($dateSubmitted); 
            $key2 = $primaryKey; 

		//				if ($debug){
    //        print "<p>key 1: " . $key1; 
    //        print "<p>key 2: " . $key2; 
		//				}

            //################################################################# 
            // 
            //Put forms information into a variable to print on the screen 
            // 

            $messageA = '<h2>Thank you for registering.</h2>'; 

            $messageB = "<p>Click this link to confirm your registration: "; 
            $messageB .= '<a href="' . $baseURL . $folderPath  . 'confirmation.php?q=' . $key1 . '&amp;w=' . $key2 . '">Confirm Registration</a></p>'; 
            $messageB .= "<p>or copy and paste this url into a web browser: "; 
            $messageB .= $baseURL . $folderPath  . 'confirmation.php?q=' . $key1 . '&amp;w=' . $key2 . "</p>"; 

            $messageC .= "<p><b>Email Address:</b><i>   " . $email . "</i><br><b>First Name:</b><i>   " . $Fname . "</i><br>";
						$messageC .= "<b>Last Name:</b><i>   " . $Lname . "</i><br><b>Graduation Year:</b><i>   " . $classof . "</i></p>"; 

            //############################################################## 
            // 
            // email the form's information 
            // 
             
        //1    $subject = "CS 148 Registration"; 
        //1    include_once('mailMessage.php'); 
        //1    $mailed = sendMail($email, $subject, $messageA . $messageB . $messageC); 
        } //data entered    
    } // no errors  
}// ends if form was submitted.  

include ("top.php");


    $ext = pathinfo(basename($_SERVER['PHP_SELF'])); 
    $file_name = basename($_SERVER['PHP_SELF'], '.' . $ext['extension']); 

    print '<body id="' . $file_name . '">'; 

    include ("header.php"); 
    include ("menu.php"); 
    ?> 

    <section id="main"> 
        <h1>Register </h1> 

        <? 
//############################################################################ 
// 
//  In this block  display the information that was submitted and do not  
//  display the form. 
// 
     /*1   if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) { 
            print "<h2>Your Request has "; 

            if (!$mailed) { 
                echo "not "; 
            } 

            echo "been processed</h2>"; 

            print "<p>A copy of this message has "; 
            if (!$mailed) { 
                echo "not "; 
            } 
            print "been sent to: " . $email . "</p>"; 

            echo $messageA . $messageC; 
        } else { 


//############################################################################# 
// 
// Here we display any errors that were on the form 
// 

            print '<div id="errors">'; 

            if ($errorMsg) { 
                echo "<ol>\n"; 
                foreach ($errorMsg as $err) { 
                    echo "<li>" . $err . "</li>\n"; 
                } 
                echo "</ol>\n"; 
            } 

            print '</div>'; 1*/
            ?> 

<!-- ###########   Here is the form page html     ################## -->

<form action="<? print $_SERVER['PHP_SELF']; ?>" 
			method="post"
			id="frmSurvey"
            enctype="multipart/form-data">
			

<fieldset class="intro">
<legend>Please complete the following form</legend>

<legend>User Log on</legend>					
	<label for="txtLogon">User Email</label>
  <input type="text" id="txtLogon" name="txtLogon" placeholder="User's Email" tabindex="100"
			size="35" maxlength="45" autofocus onfocus="this.select()" value="">
	<br>
<input type="submit" id="btnLogon" name="btnLogon" value="Logon" 
				tabindex="991" class="button"/>
				<input type="submit" name="btnDelete" value="Delete" />
				
<fieldset class="contact">
<legend>Contact Information</legend>					
	<label for="txtFname" class="required">First Name<br>*</label>
  <input type="text" id="txtFname" name="txtFname" placeholder="Enter your First Name" tabindex="100"
			size="35" maxlength="45" autofocus onfocus="this.select()" value="<?php echo $Fname; ?>">
	<br>
				
	<label for="txtLname" class="required">Last Name<br>*</label>
  <input type="text" id="txtLname" name="txtLname" placeholder="Enter your Last Name" tabindex="110"
			size="35" maxlength="45" onfocus="this.select()" value="<?php echo $Lname; ?>"> 
	<br>
				
	<label for="txtemail" class="required">Email<br>*</label>
  <input type="text" id="txtemail" name="txtemail" placeholder="Enter your Email" tabindex="120"
			size="35" maxlength="50" onfocus="this.select()" value="<?php echo $email; ?>"> 
	<br>
	</fieldset>
	<fieldset class="link">
	<legend>URL for Your Photo</legend>			
	<label for="txtlink" class="required">*</label>
  <input type="text" id="txtlink" name="txtlink" placeholder="Enter the URL for your picture" tabindex="120"
				size="75" maxlength="500" onfocus="this.select()" value="<?php echo $link; ?>">
<br>
</fieldset>				

<fieldset class="radio">
   <legend>*When is your Graduation Year?</legend>
   <label><input type="radio" id="rad2013" name="radclassof" value="2013" tabindex="510" 
	 							 <?php if($classof=="2013") echo ' checked="checked" ';?>>2013</label><br />
   <label><input type="radio" id="rad2014" name="radclassof" value="2014" tabindex="520" 
	 							 <?php if($classof=="2014") echo ' checked="checked" ';?>>2014</label><br />
   <label><input type="radio" id="rad2015" name="radclassof" value="2015" tabindex="530" 
	 							 <?php if($classof=="2015") echo ' checked="checked" ';?>>2015</label><br />
   <label><input type="radio" id="rad2016" name="radclassof" value="2016" tabindex="540" 
	 							 <?php if($classof=="2016") echo ' checked="checked" ';?>>2016</label><br />
   <label><input type="radio" id="rad2017" name="radclassof" value="2017" tabindex="550" 
	 							 <?php if($classof=="2017") echo ' checked="checked" ';?>>2017</label><br />
	 <label><input type="radio" id="rad2018" name="radclassof" value="2018" tabindex="560" 
	 							 <?php if($classof=="2018") echo ' checked="checked" ';?>>2018</label><br />
	 <label><input type="radio" id="radother" name="radclassof" value="Other" tabindex="570" 
	 							 <?php if($classof=="Other") echo ' checked="checked" ';?>>Other</label>
</fieldset>

<fieldset class="checkboxes">
   <legend>What classes have you taken with Robert Erickson?</legend>
	 <input type="checkbox" name="chk1" value="1" <?php if($chk1) echo ' checked="checked" ';?>>CS 148<br>
	 <fieldset class="lists">
   What year was that?<br>
	 <select id="lstyear1" name="lstyear1" tabindex="130" size="1">
   <option value="" >
		<option value="2013" <?php if($year1=="2013") echo ' selected="selected" ';?>>2013</option>
		<option value="2012" <?php if($year1=="2012") echo ' selected="selected" ';?>>2012</option>
		<option value="2011" <?php if($year1=="2011") echo ' selected="selected" ';?>>2011</option>
		<option value="2010" <?php if($year1=="2010") echo ' selected="selected" ';?>>2010</option>
		<option value="2009" <?php if($year1=="2009") echo ' selected="selected" ';?>>2009</option>
		<option value="2008" <?php if($year1=="2008") echo ' selected="selected" ';?>>2008</option>
		<option value="2007" <?php if($year1=="2007") echo ' selected="selected" ';?>>2007</option>
	</select><br>
   And what term?<br>
	 <select id="lstterm1" name="lstterm1" tabindex="130" size="1">
   <option value="" >
		<option value="Fall" <?php if($term1=="Fall") echo ' selected="selected" ';?>>Fall</option>
		<option value="Winter" <?php if($term1=="Winter") echo ' selected="selected" ';?>>Winter</option>
		<option value="Spring" <?php if($term1=="Spring") echo ' selected="selected" ';?>>Spring</option>
		<option value="Summer" <?php if($term1=="Summer") echo ' selected="selected" ';?>>Summer</option>
	</select>
	</fieldset>
   <input type="checkbox" name="chk2" value="2" <?php if($chk2) echo ' checked="checked" ';?>>CS 142<br>
	 <fieldset class="lists">
   What year was that?<br>
	 <select id="lstyear2" name="lstyear2" tabindex="130" size="1">
   <option value="" >
		<option value="2013" <?php if($year2=="2013") echo ' selected="selected" ';?>>2013</option>
		<option value="2012" <?php if($year2=="2012") echo ' selected="selected" ';?>>2012</option>
		<option value="2011" <?php if($year2=="2011") echo ' selected="selected" ';?>>2011</option>
		<option value="2010" <?php if($year2=="2010") echo ' selected="selected" ';?>>2010</option>
		<option value="2009" <?php if($year2=="2009") echo ' selected="selected" ';?>>2009</option>
		<option value="2008" <?php if($year2=="2008") echo ' selected="selected" ';?>>2008</option>
		<option value="2007" <?php if($year2=="2007") echo ' selected="selected" ';?>>2007</option>
	</select><br>
   And what term?<br>
	 <select id="lstterm2" name="lstterm2" tabindex="130" size="1">
   <option value="" >
		<option value="Fall" <?php if($term2=="Fall") echo ' selected="selected" ';?>>Fall</option>
		<option value="Winter" <?php if($term2=="Winter") echo ' selected="selected" ';?>>Winter</option>
		<option value="Spring" <?php if($term2=="Spring") echo ' selected="selected" ';?>>Spring</option>
		<option value="Summer" <?php if($term2=="Summer") echo ' selected="selected" ';?>>Summer</option>
	</select>
</fieldset>
	 <input type="checkbox" name="chk3" value="3" <?php if($chk3) echo ' checked="checked" ';?>>CS 095<br>
	 <fieldset class="lists">
   What year was that?<br>
	 <select id="lstyear3" name="lstyear3" tabindex="130" size="1">
   <option value="" >
		<option value="2013" <?php if($year3=="2013") echo ' selected="selected" ';?>>2013</option>
		<option value="2012" <?php if($year3=="2012") echo ' selected="selected" ';?>>2012</option>
		<option value="2011" <?php if($year3=="2011") echo ' selected="selected" ';?>>2011</option>
		<option value="2010" <?php if($year3=="2010") echo ' selected="selected" ';?>>2010</option>
		<option value="2009" <?php if($year3=="2009") echo ' selected="selected" ';?>>2009</option>
		<option value="2008" <?php if($year3=="2008") echo ' selected="selected" ';?>>2008</option>
		<option value="2007" <?php if($year3=="2007") echo ' selected="selected" ';?>>2007</option>
	</select><br>
   And what term?<br>
	 <select id="lstterm3" name="lstterm3" tabindex="130" size="1">
   <option value="" >
		<option value="Fall" <?php if($term3=="Fall") echo ' selected="selected" ';?>>Fall</option>
		<option value="Winter" <?php if($term3=="Winter") echo ' selected="selected" ';?>>Winter</option>
		<option value="Spring" <?php if($term3=="Spring") echo ' selected="selected" ';?>>Spring</option>
		<option value="Summer" <?php if($term3=="Summer") echo ' selected="selected" ';?>>Summer</option>
	</select>
</fieldset>
	 <input type="checkbox" name="chk4" value="4" <?php if($chk4) echo ' checked="checked" ';?>>CS 042<br>
	 <fieldset class="lists">
   What year was that?<br>
	 <select id="lstyear4" name="lstyear4" tabindex="130" size="1">
   <option value="" >
		<option value="2013" <?php if($year4=="2013") echo ' selected="selected" ';?>>2013</option>
		<option value="2012" <?php if($year4=="2012") echo ' selected="selected" ';?>>2012</option>
		<option value="2011" <?php if($year4=="2011") echo ' selected="selected" ';?>>2011</option>
		<option value="2010" <?php if($year4=="2010") echo ' selected="selected" ';?>>2010</option>
		<option value="2009" <?php if($year4=="2009") echo ' selected="selected" ';?>>2009</option>
		<option value="2008" <?php if($year4=="2008") echo ' selected="selected" ';?>>2008</option>
		<option value="2007" <?php if($year4=="2007") echo ' selected="selected" ';?>>2007</option>
	</select><br>
   And what term?<br>
	 <select id="lstterm4" name="lstterm4" tabindex="130" size="1">
   <option value="" >
		<option value="Fall" <?php if($term4=="Fall") echo ' selected="selected" ';?>>Fall</option>
		<option value="Winter" <?php if($term4=="Winter") echo ' selected="selected" ';?>>Winter</option>
		<option value="Spring" <?php if($term4=="Spring") echo ' selected="selected" ';?>>Spring</option>
		<option value="Summer" <?php if($term4=="Summer") echo ' selected="selected" ';?>>Summer</option>
	</select>
</fieldset>
   <input type="checkbox" name="chk5" value="5" <?php if($chk5) echo ' checked="checked" ';?>>CS 014<br>
	 <fieldset class="lists">
   What year was that?<br>
	 <select id="lstyear5" name="lstyear5" tabindex="130" size="1">
   <option value="" >
		<option value="2013" <?php if($year5=="2013") echo ' selected="selected" ';?>>2013</option>
		<option value="2012" <?php if($year5=="2012") echo ' selected="selected" ';?>>2012</option>
		<option value="2011" <?php if($year5=="2011") echo ' selected="selected" ';?>>2011</option>
		<option value="2010" <?php if($year5=="2010") echo ' selected="selected" ';?>>2010</option>
		<option value="2009" <?php if($year5=="2009") echo ' selected="selected" ';?>>2009</option>
		<option value="2008" <?php if($year5=="2008") echo ' selected="selected" ';?>>2008</option>
		<option value="2007" <?php if($year5=="2007") echo ' selected="selected" ';?>>2007</option>
	</select><br>
   And what term?<br>
	 <select id="lstterm5" name="lstterm5" tabindex="130" size="1">
   <option value="" >
		<option value="Fall" <?php if($term5=="Fall") echo ' selected="selected" ';?>>Fall</option>
		<option value="Winter" <?php if($term5=="Winter") echo ' selected="selected" ';?>>Winter</option>
		<option value="Spring" <?php if($term5=="Spring") echo ' selected="selected" ';?>>Spring</option>
		<option value="Summer" <?php if($term5=="Summer") echo ' selected="selected" ';?>>Summer</option>
	</select>
</fieldset>
	 <input type="checkbox" name="chk6" value="6" <?php if($chk6) echo ' checked="checked" ';?>>CS 008<br>
	 <fieldset class="lists">
   What year was that?<br>
	 <select id="lstyear6" name="lstyear6" tabindex="130" size="1">
   <option value="" >
		<option value="2013" <?php if($year6=="2013") echo ' selected="selected" ';?>>2013</option>
		<option value="2012" <?php if($year6=="2012") echo ' selected="selected" ';?>>2012</option>
		<option value="2011" <?php if($year6=="2011") echo ' selected="selected" ';?>>2011</option>
		<option value="2010" <?php if($year6=="2010") echo ' selected="selected" ';?>>2010</option>
		<option value="2009" <?php if($year6=="2009") echo ' selected="selected" ';?>>2009</option>
		<option value="2008" <?php if($year6=="2008") echo ' selected="selected" ';?>>2008</option>
		<option value="2007" <?php if($year6=="2007") echo ' selected="selected" ';?>>2007</option>
	</select><br>
   And what term?<br>
	 <select id="lstterm6" name="lstterm6" tabindex="130" size="1">
   <option value="" >
		<option value="Fall" <?php if($term6=="Fall") echo ' selected="selected" ';?>>Fall</option>
		<option value="Winter" <?php if($term6=="Winter") echo ' selected="selected" ';?>>Winter</option>
		<option value="Spring" <?php if($term6=="Spring") echo ' selected="selected" ';?>>Spring</option>
		<option value="Summer" <?php if($term6=="Summer") echo ' selected="selected" ';?>>Summer</option>
	</select>
</fieldset>
	 <input type="checkbox" name="chk7" value="7" <?php if($chk7) echo ' checked="checked" ';?>>CS 002<br>
	 <fieldset class="lists">
   What year was that?<br>
	 <select id="lstyear7" name="lstyear7" tabindex="130" size="1">
   <option value="" >
		<option value="2013" <?php if($year7=="2013") echo ' selected="selected" ';?>>2013</option>
		<option value="2012" <?php if($year7=="2012") echo ' selected="selected" ';?>>2012</option>
		<option value="2011" <?php if($year7=="2011") echo ' selected="selected" ';?>>2011</option>
		<option value="2010" <?php if($year7=="2010") echo ' selected="selected" ';?>>2010</option>
		<option value="2009" <?php if($year7=="2009") echo ' selected="selected" ';?>>2009</option>
		<option value="2008" <?php if($year7=="2008") echo ' selected="selected" ';?>>2008</option>
		<option value="2007" <?php if($year7=="2007") echo ' selected="selected" ';?>>2007</option>
	</select><br>
   And what term?<br>
	 <select id="lstterm7" name="lstterm7" tabindex="130" size="1">
   <option value="" >
		<option value="Fall" <?php if($term7=="Fall") echo ' selected="selected" ';?>>Fall</option>
		<option value="Winter" <?php if($term7=="Winter") echo ' selected="selected" ';?>>Winter</option>
		<option value="Spring" <?php if($term7=="Spring") echo ' selected="selected" ';?>>Spring</option>
		<option value="Summer" <?php if($term7=="Summer") echo ' selected="selected" ';?>>Summer</option>
	</select>
</fieldset>
	 <input type="checkbox" name="chk8" value="8" <?php if($chk8) echo ' checked="checked" ';?>>NR 285
	 <fieldset class="lists">
   What year was that?<br>
	 <select id="lstyear8" name="lstyear8" tabindex="130" size="1">
   <option value="" >
		<option value="2013" <?php if($year8=="2013") echo ' selected="selected" ';?>>2013</option>
		<option value="2012" <?php if($year8=="2012") echo ' selected="selected" ';?>>2012</option>
		<option value="2011" <?php if($year8=="2011") echo ' selected="selected" ';?>>2011</option>
		<option value="2010" <?php if($year8=="2010") echo ' selected="selected" ';?>>2010</option>
		<option value="2009" <?php if($year8=="2009") echo ' selected="selected" ';?>>2009</option>
		<option value="2008" <?php if($year8=="2008") echo ' selected="selected" ';?>>2008</option>
		<option value="2007" <?php if($year8=="2007") echo ' selected="selected" ';?>>2007</option>
	</select><br>
   And what term?<br>
	 <select id="lstterm8" name="lstterm8" tabindex="130" size="1">
   <option value="" >
		<option value="Fall" <?php if($term8=="Fall") echo ' selected="selected" ';?>>Fall</option>
		<option value="Winter" <?php if($term8=="Winter") echo ' selected="selected" ';?>>Winter</option>
		<option value="Spring" <?php if($term8=="Spring") echo ' selected="selected" ';?>>Spring</option>
		<option value="Summer" <?php if($term8=="Summer") echo ' selected="selected" ';?>>Summer</option>
	</select>
</fieldset> 

<fieldset class="buttons">
	<legend></legend>				
	<input type="submit" id="btnSubmit" name="btnSubmit" value="Register" 
				tabindex="991" class="button"/>

	<input type="reset" id="butReset" name="butReset" value="Reset Form" 
				tabindex="993" class="button" onclick="reSetForm()" />
</fieldset>					
</fieldset>
</fieldset>

            </form> 
					
            <?php 
     //1   } // end 
				 submit 
  //      if ($debug) 
  //          print "<p>END OF PROCESSING</p>"; 
        ?> 
    </section> 


    <? 
    include ("tables.php"); 
    ?> 
		</html>
