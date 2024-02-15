<?php

include('CurrencyConverter.inc');


$c = new CurrencyConverter();

$convert = array(array('from' => 'USD', 'to' => 'ILS'),
                 array('from' => 'USD', 'to' => 'ZWD'),
                 array('from' => 'CAD', 'to' => 'USD')
                );
                     
foreach($convert as $arr) {
    echo "1 ";
    echo $c->getName($arr['from']);
    echo " = ";
    echo $c->convert($arr['from'], $arr['to']);
    echo " ";
    echo $c->getName($arr['to']);
    echo "<P>";
}

?>