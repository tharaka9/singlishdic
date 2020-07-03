<?php
//fetch.php
if(isset($_POST["query"]))
{
 $connect = mysqli_connect("localhost", "root", "", "sinhala_dictionary");
 $request = mysqli_real_escape_string($connect, $_POST["query"]);
 $request1 = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM words 
  WHERE word LIKE '%".$request."%' LIMIT 7

 ";
 $result = mysqli_query($connect, $query);
 $data =array();
 $html = '';
 $html .= '

  <table class="table">
  ';
 if(mysqli_num_rows($result) > 0)
 {

  while($row = mysqli_fetch_array($result))
  {
   $data[] = $row["word"];
   $data[] = $row["mean"]; 
   $html .= '

    <td class="text-center" style="height:145px;">සිංහල වචනය : '.$row["word"].'<br> ඉංග්‍රීසි වචනය : '.$row["mean"].'</td>
 
   ';
  }
 }
 else
 {
  $data = 'No Data Found';
  $html .= '
   <tr>
    <td colspan="3">No Data Found</td>
   </tr>
   ';
 }
 $html .= '</table>';
 if(isset($_POST['typehead_search']))
 {
  echo $html;
 }
 else
 {
  $data = array_unique($data);
  echo json_encode($data);
 }
}

?>