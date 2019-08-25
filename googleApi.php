<?php
//error_reporting(0);
session_start();
$longi=$_POST['longitude'];
$lati=$_POST['latitude'];
$strTime=$_POST['time'];

//$longi="80.352673";
//$lati="26.473262";

$origin_geo=$lati.",".$longi;
$con=mysqli_connect("localhost","root","","smart_city_db");


 $query1="select * from location_master";

 $result=mysqli_query($con,$query1);
libxml_disable_entity_loader(false); 
while($row=mysqli_fetch_assoc($result))
{
 
 $desti_geo=$row['latitude'].",".$row['longitude'];

 

$xml = new XMLReader(); 
//echo "https://maps.googleapis.com/maps/api/directions/xml?origin=".$origin_geo."&destination=".$desti_geo."&key=AIzaSyA6dCVKWwqAuQbB6kXLtJO_Eu4-hJvonuo";
$xml->open("https://maps.googleapis.com/maps/api/directions/xml?origin=".$origin_geo."&destination=".$desti_geo."&key=AIzaSyCRNH2SeMDhA5fqAcNSWqbeNvPlDuPGmIk");
 $conf=array();
 $confval=array();
$i=0;
$k=0;
$tym=0;
while ($xml->read()) {
        switch ($xml->name) {
        case "html_instructions":
            $xml->read();
            $conf[$i] = $xml->value;
            $xml->read();
			$i++;
            break;
       case "value":
			$xml->read();
			$confval[$k] = $xml->value;
            $xml->read();
			$k++;
            break;
	   case "text":
			$xml->read();
			$dura = $xml->value;
			$arr=explode(" ",$dura);
			if($arr[1]=="min" || $arr[1]=="mins")
			$tym=$tym+$arr[0];
            $xml->read();
			
			
        }
    }
	
	$arr=explode(" ",$conf[0]);
	//echo $arr[1];
	//echo $confval[1];
	 $c=count($confval);
	    $res=(int)$confval[$c-1];

	if($tym>=0 && $tym<=$strTime)
	{
		$row2 = mysqli_fetch_assoc(mysqli_query($con,"select category from categories_master where id=".$row['cat_id'])); 
		$row1['id']=$row['id'];
		$row1['name']=$row['name'];
		$row1['description']=$row['description'];
		$row1['lati']=$row['latitude'];
		$row1['longi']=$row['longitude'];
		$row1['cat']=$row2['category'];
		$row1['distance']=$res;
		$row1['duration']=$tym;
		$output[]=$row1;
	
	}
	
	
 
}
$xml->close();
$output1['places']=$output;
print(json_encode($output1));

?>
