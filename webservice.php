<?php
$search_param= $_POST["search"];
//$search_area= $_POST["area"];

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
   while($row = $result->fetch_assoc()){
       $doctorid = $row["id"];
       $doctorname = $row["doctorname"];
       $doctorinfo = $row["doctorinformation"];
       $doctorimage = $row["doctorimage"];
       
       $doctor_data["DocName"]=$doctorname;
       $doctor_data["DocInfo"]=$doctorinfo;
       $doctor_data["docImage"]=$doctorimage;

       $data[$doctorid]=$doctor_data;
      
   }
   $data["Result"]="True";
   $data["Message"]="Doctors fetched Successfully";

    

}else{
    $data["Result"]="False";
    $data["Message"]="no doctors found";
}

echo json_encode($data,JSON_UNESCAPED_SLASHES);

?>