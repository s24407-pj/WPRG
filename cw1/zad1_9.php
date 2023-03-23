<?php 
    $tab1 = array(1, 1, 1, 1, 1, 1);
    $tab2 = array(1, 1, 1, 1, 1);
    if(count($tab1)>count($tab2)){
        $n = count($tab2);
    }else{
        $n = count($tab1);
    }
    $sum = 0;
    for($i = 0; $i < $n; $i++){
        $sum += $tab1[$i]*$tab2[$i];
    }
    echo $sum
?>