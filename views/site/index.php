<div>
<?php
$data = json_decode($data, true);              
?>
</div>
<div class="main">
<div id="myDIV" class="header">
  <h2 style="margin:5px">My To Do List</h2>
  <input type="text" id="myInput" placeholder="Title...">
  <span onclick="newElement()" class="addBtn">Add</span>
</div>

<ul id="myUL">
  <?php
  if($data == NULL)
    {
       echo '<li>TODOList is blank </li>';
    }
    $count = count($data);
    for($x=0; $x<$count; $x++) 
    {      
      if($data[$x]['status']==1)
      {
      	echo "<li id='".$data[$x]['id']."' class='checked'>".$data[$x]['name']."</li>";
      }else
      {
      	echo "<li id='".$data[$x]['id']."'>".$data[$x]['name']."</li>";
      }
    }
  ?>
</ul>
<script type="text/javascript" src="assets/js.js"></script>
</div>