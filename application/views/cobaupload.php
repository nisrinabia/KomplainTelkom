<?php $s = '06/10/2011 19:00';
$date = strtotime($s);
/*echo $date . ' ';
echo convert(datetime,'18-06-12 10:34:09 PM',1) . ' ';
echo date('d/m/Y H:i:s', $date);*/
/*$a = 'closed';
echo ($a == 'closed' ? 1 : 0);*/
$a = '12:00';
$a = $a + '12:00';
echo $a;