<?php 
function is_blank($value){
    return !isset($value)|| trim($value)=== "" ; 

}
function is_present($value){
    return !is_blank($value);
}
function length_is_greater_than($value,$min){
    $length = strlen($value);
    return $length > $min ;
}
function length_is_less_than($value,$max){
    $length = strlen($value);
    return $length < $max ;
}
function length_is_equal($value,$equal){
    $length = strlen($value);
    return $length == $equal ;
}
function has_length($value, $options){
    if(isset($options['min']) && !length_is_greater_than($value,$options['min']-1)){
         return false;
        } elseif(isset($options['max']) && !length_is_less_than($value,$options['max']+1)){
         return false;
        } elseif(isset($options['exact']) && !length_is_equal($value,$options['exact'])){
         return false;
        } else
            return true;
 }
function has_value_in($value, $set){
return in_array($value,$set);
}
function no_value_in($value, $set){
return !in_array($value,$set);
}
function has_string($value,$requested_string){
    return strpos($value,$requested_string)!== false;
}
function email_is_valid($value){
    $email_regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
    return preg_match($email_regex,$value)===1;
}

?>