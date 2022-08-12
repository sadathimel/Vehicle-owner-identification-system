<?php
// Load the database configuration file
include_once 'dbConfig.php';

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $id         = $line[0];
                $name       = $line[1];
                $phone      = $line[2];
                $email      = $line[3];
                $address    = $line[4];
                $vnplate    = $line[5];
                $vmodel     = $line[6];
                $speed     = $line[7];
                $fine       = $line[8];
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT phone FROM vehicle";
                $prevResult = $db->query($prevQuery);
                if($prevResult->num_rows > 0){
                    // Insert member data in the database
                    $db->query("INSERT INTO abul (name, phone, email,address,vnplate,vmodel,speed,fine) VALUES ('".$name."', '".$phone."', '".$email."','".$address."','".$vnplate."','".$vmodel."','".$speed."','".$fine."')");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header("Location: index.php".$qstring);