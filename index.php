require_once 'uplodyArray.php';

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
