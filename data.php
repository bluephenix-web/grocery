<?php 
    /**
     * 0-18 Young
     * 19-28 teen
     * 29-40 adult
     * 41-onwards old
     */
    $school ="UB";
    $age = 25;

    if($age < 18){
        echo "You are young";
    } elseif($age >= 19 && $age <= 28){
        echo "You are a teen";
    } elseif($age >= 29 && $age <= 40){
        echo "You are an adult";
    } else {
        echo "You are old";
    }
   

?>