<?php

// REST (Representational State Transfer) allows anything to work with your data // that can send a HTTP request

// The most common methods used are GET, POST, PUT, and DELETE
// GET: Used to retrieve data from a resource
// POST: Used to create a new resource, but is considered unsafe
// PUT: Used to update a resource, but is considered unsafe
// DELETE: Used to delete a resource and also is unsafe

function get_student_info($id){
    
    $student_info = array();
    
    // Data that normally is pulled from a database
    switch($id){
        
        case 1:
            $student_info = array("first_name" => "John Rogee", "last_name" => "Herrera", "address" => "186 Don Fabian Extension Quezon City, PH"); 
            break;
        case 2:
            $student_info = array("first_name" => "Jhaecee", "last_name" => "Herrera", "address" => "186 Don Fabian Extension Quezon City, PH");
            break;      
    }
    
    return $student_info;
    
}

function get_student_list(){
    
    // Data that normally is pulled from a database
    
    $student_list = array(array("id" => 1, "name" => "John Rogee Herrera"),
                          array("id" => 2, "name" => "Jhaecee Herrera"));
    
    return $student_list;
    
}

// Execute the proper method above based on request

if(isset($_GET["action"])){
    
    switch($_GET["action"]){
        
        case "get_student_list":
            $value = get_student_list();
            break;
        
        case "get_student":
            $value = get_student_info($_GET["id"]);
            break;
        
    }
    
}

exit(json_encode($value));

?>