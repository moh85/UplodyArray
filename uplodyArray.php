<?php
function selectById($db,$cols,$tbl,$query){
require($db);
if(strpos($query,'get (') == FALSE){
$start = 'get (';
$end = ')';
$query = ' ' . $query;
$ini = strpos($query, $start);
if ($ini == 0) return '';
$ini += strlen($start);
$len = strpos($query, $end, $ini) - $ini;
$dataType = substr($query, $ini, $len);
$start = ' by id (';
$end = ')';
$query = ' ' . $query;
$ini = strpos($query, $start);
if ($ini == 0) return '';
$ini += strlen($start);
$len = strpos($query, $end, $ini) - $ini;
$id = substr($query, $ini, $len);
$gettbl = preg_match_all("/\{(.*?)\}/", $cols, $getAll);
$key = array_search ($dataType, $getAll[1]);
$xvar = eval('return $'. $tbl . '[$id][$key];');
return $xvar;
 }
    }
	
function multiSelect($db,$cols,$tbl,$query){
require($db);
if(strpos($query,'get (') == FALSE){
$start = 'get (';
$end = ')';
$query = ' ' . $query;
$ini = strpos($query, $start);
if ($ini == 0) return '';
$ini += strlen($start);
$len = strpos($query, $end, $ini) - $ini;
$dataType = substr($query, $ini, $len);
$start = ' by id (';
$end = ')';
$query = ' ' . $query;
$ini = strpos($query, $start);
if ($ini == 0) return '';
$ini += strlen($start);
$len = strpos($query, $end, $ini) - $ini;
$id = substr($query, $ini, $len);
$allData = explode(',',$dataType);
$query = array();
foreach($allData as $xdata){
$gettbl = preg_match_all("/\{(.*?)\}/", $cols, $getAll);
$key = array_search($xdata, $getAll[1]);
$xvar = eval('return $'. $tbl . '[$id][$key];');
$data = $xvar;
$query[] = $data;
 }
return array_merge($query);
 }
  }
  
function whereCore($array, $key, $value){
$results = array();
 if (is_array($array)) {
 if (isset($array[$key]) && $array[$key] == $value) {
 $results[] = $array;
    }
 foreach ($array as $subarray) {
 $results = array_merge($results, whereCore($subarray, $key, $value));
 }
      }
 return $results;
   }
function selectWhere($db, $tbl, $query){
require($db);
if(strpos($query,'get all') !== FALSE && strpos($query,'where (') !== FALSE){
$start = 'where (';
$end = ')';
$query = ' ' . $query;
$ini = strpos($query, $start);
if ($ini == 0) return '';
$ini += strlen($start);
$len = strpos($query, $end, $ini) - $ini;
$title = substr($query, $ini, $len);
$start = ') is ("';
$end = '")';
$query = ' ' . $query;
$ini = strpos($query, $start);
if ($ini == 0) return '';
$ini += strlen($start);
$len = strpos($query, $end, $ini) - $ini;
$value = substr($query, $ini, $len);
return whereCore($$tbl, $title, $value);
 }
   }
	
// Select single Data by Order Number (ID)
/* echo selectById('db.php','{id}{name}{age}{country}','users','get (name) by id (0)'); */
// Multiple data select by order number (ID)
/* $getData = multiSelect('db.php','{id}{name}{age}{country}','users','get (id,name,country) by id (1)');
foreach($getData as $singleData){
 echo $singleData.'<br>';
 } */
 
// Multiple data select based on condition
/* $getAll = selectWhere('db.php','users2','get all where (country) is ("Lebanon")');
echo '<table class="table">
 <thead>
 <tr>
 <th>ID</th>
 <th>Name</th>
 <th>Age</th>
 <th>Country</th>
 </tr>
 </thead>
<tbody>';
foreach ($getAll as $row) {
 echo '<tr class="all_data">';
 echo '<td>'.$row['id'].'</td>';
 echo '<td>'.$row['name'].'</td>';
 echo '<td>'.$row['age'].'</td>';
 echo '<td>'.$row['country'].'</td>';
 echo '</tr>';
   } */
