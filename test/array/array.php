<?php 

//array

	/* 1.index 2.assoc 3.multidimesinal array */

$a = array(1,2,3,4,5,6,7,8,9,10,11,12,13);

echo "<pre>";
print_r($a);


	/* assoc array */

$a = array('hello' => 'welcome','0'=>'1.5','3.5'=>'a');
echo "<pre>";
print_r($a);

/* multidimesinal array */

$a = array('hello' => 'welcome','0'=>'1.5','3.5'=>'a','second'=>array('welcome','0'=>'1.5','3.5'=>'a'));
echo "<pre>";
print_r($a);

 ?>