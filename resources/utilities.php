<?php

function emptyField($ReqFieldArray){
    $errors = array();
    foreach($ReqFieldArray as $fields){
       if(!isset($_POST[$fields])|| $_POST[$fields] == NULL){
           $errors[] = "$fields is a required Field";
       }
   }
   return $errors;
}
function matchMinLen($fieldCheck){
    $errors = array();
    foreach($fieldCheck as $fieldName => $fieldMinLen){
        if(strlen(trim($_POST[$fieldName])) <$fieldMinLen){
            $errors[] = $fieldName ." is too short. ". $fieldMinLen. " characters are required.";
        }
    
    }
    return $errors;
}

function validEmail($data){
    $errors = array();
    $key ='email';
    if($data[$key] != NULL){
        $key = filter_var($key, FILTER_SANITIZE_EMAIL);
        if(filter_var($_POST[$key], FILTER_VALIDATE_EMAIL) === FALSE){
            $errors[] = "$key is not a valid e-mail address";
        }
    }
    return $errors;
}
function compFields($input1, $input2,$comparison){
    $errors = array();
    if ($input1 != $input2){
        $errors[] = $comparison ."s do not match each other.";
    }
    return $errors;
}
function displayErrors($errorsArray){
        $errors = "<ul style='color:red;'>";
        foreach($errorsArray as $error){
           $errors .= "<li>$error</li>";
        }
        $errors .="</ul>";
        return $errors;
    }

?>