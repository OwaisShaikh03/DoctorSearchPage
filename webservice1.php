<?php
$search_param= $_POST["search"];
//$search_area= $_POST["area"];
if(isset($_POST["search"])){
$host= "localhost";
$dbuser= "id20473941_root";
$dbpass= "Maahid@2011@";
$dbname= "id20473941_doctorappoin";
$conn= new mysqli($host, $dbuser, $dbpass, $dbname);
//doctorarea like '%".$search_area."%' and
$sql = "SELECT * from doctor where doctorcategory like '%".$search_param."%' ";

$result=$conn->query($sql) ;

if($result->num_rows > 0)
{
    $data='<div class="rdsectioninfo">doctors found </div>';
    $doctor_data="";
   while($row = $result->fetch_assoc()){
       $doctorid = $row["id"];
       $doctorname = $row["doctorname"];
       $doctorinfo = $row["doctorinformation"];
       $doctorimage = $row["doctorimage"];
       
       $doctor_data= $doctor_data.'<div class="finddoc3rdsec">
       <img
         class="bestdoctoricom-icon"
         alt=""
         src="'.$doctorimage.'"
       /><b class="find-best-doctors-container"
         ><p class="p">'.$doctorname.'</p></b
       >
       <div class="find-your-doctor">
         '.$doctorinfo.'
       </div>
     </div>';
      
    }

}else{
    $data='<div class="rdsectioninfo"><h1>No doctor found in area</h1></div>';
}
}else{
  $data='<div class="rdsectioninfo"><h1>Bad Query</h1></div>';
}

$data = $data.$doctor_data;
echo $data;

?>