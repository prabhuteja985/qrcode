<?php
include('config.php');
require_once 'phpqrcode/qrlib.php';


//folder to save qr images
$path ='images/';
if(!is_dir($path)){
    mkdir($path);
}

//file name
$file = $path.date("Y-m-d-h-i-s").'.png';
//$mydb = new dbc();


 ?>
 <table border="1">
 <tr>
 <?php
$code=71975;
//$id='ID';
 $grade = "SELECT * FROM `tblchristian` WHERE code = '$code'";

 $result = $con->query($grade);

 if ($result->num_rows > 0) 
 {
     // OUTPUT DATA OF EACH ROW
     while($row = $result->fetch_assoc())
     {
        
        
            $jsondata = "{'UniqueID': '".$row['code']."','Name':'".$row['name']."','Surname':'".$row['surname']."','Gender':'".$row['sex']."','Baptised Status':'".$row['status']."','Baptised Date':'".$row['sdob']."','Baptised Age':'".$row['sage']."', 'Christian Name':'".$row['cname'].",'Date Of Birth':'".$row['dob']."','Baptised Status':'".$row['status']."','STDID':'".$row['age']."','MOBILE':'".$row['business']."'}";
          //echo $jsondata;
         
Qrcode::png($jsondata, $file, 'H', 10, 2);
            
        
        
     }
 } 
 else {
     echo "0 results";
 }

 $x=1;$jsondata='';
 while($row = $result->fetch_assoc())
 for($i=0;$i<count($grade);$i++){
// $jsondata = '{"SUC": "'.$grade[$i]['student_no'].'","INSTITUTE":"'.$grade[$i]['institute_name'].'", "CAMPUS": "'.$grade[$i]['campus_name'].'", "COURSE":"'.$grade[$i]['course_main_code'].'","STUDENTNAME": "'.$grade[$i]['studentname'].'","STDID":"'.$grade[$i]['std_id'].'","MOBILE": "'.$grade[$i]['mobile_no'].'"}';


 //our text
$text='SELECT * FROM `tblchristian` ORDER BY `CreationDate` ASC';


 ?>
 <td>
 <span style="z-index:9"><img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $jsondata;?>" /></span>
 <p style="text-align:center; font-size:12px; font-weight:bold; margin-top:-15px; z-index:99; position:relative"><?php echo $jsondata;?></p>
 </td>
 
 <?php if($x==5){?> </tr><tr> <?php $x=0; } ?>
 
 <?php 
 $x++;
 } ?>


