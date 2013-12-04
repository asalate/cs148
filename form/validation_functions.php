 <?php 
//----------------------------------------------------------------------------- 
// begining set of validation functions      

function verifyEmail ($testString) { 
    // Check for a valid email address  
    return (preg_match("/^([[:alnum:]]|_|\.|-)+@([[:alnum:]]|\.|-)+(\.)([a-z]{2,4})$/", $testString)); 
}		
		
function verifyFname ($testString) { 
    // Check for letters, numbers and dash, period, ?, !, space and single and double quotes only.  
    return (preg_match("/^([[:alnum:]]|-|\.| |\n|\r|\?|\!|\"|\')+$/",$testString)); 
}		
		
function verifyLname ($testString) { 
    // Check for letters, numbers and dash, period, ?, !, space and single and double quotes only.  
    return (preg_match("/^([[:alnum:]]|-|\.| |\n|\r|\?|\!|\"|\')+$/",$testString)); 
} 

function verifylink ($testString) { 
        // Check for a valid URL 
    return (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $testString)); 
}

function verifyclassof ($testString) { 
    // Check for letters, numbers and dash, period, ?, !, space and single and double quotes only.  
    return (preg_match("/^([[:alnum:]]|-|\.| |\n|\r|\?|\!|\"|\')+$/",$testString)); 
}

function verifyAlphaNum ($testString) { 
    // Check for letters, numbers and dash, period, space and single quote only.  
    return (preg_match ("/^([[:alnum:]]|-|\.| |')+$/", $testString)); 
}

function verifyText ($testString) { 
    // Check for letters, numbers and dash, period, ?, !, space and single and double quotes only.  
    return (preg_match("/^([[:alnum:]]|-|\.| |\n|\r|\?|\!|\"|\')+$/",$testString)); 
} 

function verifyPhone ($testString) { 
    // Check for only numbers, dashes and spaces in the phone number  
    return (preg_match('/^([[:digit:]]| |-)+$/', $testString)); 
} 

function verifyURL ($testString) { 
        // Check for a valid URL 
    return (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $testString)); 

} 

?> 