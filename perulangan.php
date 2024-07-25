<?php 
$i = -100;

for($i=-100;$i<=10;$i++){
    if($i % 10 != 0){
        echo $i;
        echo "";
    }else{
        echo $i;
        echo "<br>";
    }
}

echo "<br> <br>";

$j=-100;
while ($j<=10){
    echo $j;
    $j++;
}

echo "<br> <br>";

$x=-100;
do{
    echo $x;
    $x++;
}while($x<=10)

?>