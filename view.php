<?php 
// Include the database configuration file  
// require_once 'dbConfig.php'; 

header('Content-Type:application/json');
header('Acess-Control-Allow-Origin:*');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "photo";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT image from images";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $encoded_data= base64_encode($row['image']);
    $request_data = array(
        'data' => $encoded_data,
        'some_other_data' => 'value',
        'another_data' => 'value'
    );
    $json_data = json_encode($request_data);
    echo $json_data;


} else {
    echo "Error: " . mysqli_error($conn);
}




//  echo json_encode($result);
 ?>
