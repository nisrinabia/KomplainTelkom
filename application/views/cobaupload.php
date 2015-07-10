<?php $s = '06/10/2011 19:00';
$date = strtotime($s);
/*echo $date . ' ';
echo convert(datetime,'18-06-12 10:34:09 PM',1) . ' ';
echo date('d/m/Y H:i:s', $date);*/

$a = 'closed';
echo ($a == 'closed' ? 1 : 0);
echo '\n';
/*$a = 'closed';
echo ($a == 'closed' ? 1 : 0);*/
$a = '12:00';
$a = $a + '12:00';
echo $a;

$deadline = '07/08/2015 09.30 PM'; 
$tanggal = substr($deadline, 0, 10);
$menit = substr($deadline, -5, -3);
$temp = substr($deadline, -8, -6);
if(substr($deadline, -2) == 'PM'){
	$result = $temp + 12;
	if($result == '24'){
        $result = '00';
	}
	$deadline = $tanggal .' '. $result . ':' . $menit;
	echo $deadline;
}
else{

	$deadline = $tanggal .' '. $temp . ':' . $menit;
	echo $deadline;	
}

