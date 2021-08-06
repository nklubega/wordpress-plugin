<?php

//insert.php

$connect = new PDO("mysql:host=localhost;dbname=wamp-project", "root", "");

$query = "
INSERT INTO services 
(service_name, Descrition) 
VALUES (:service_name, :Descrition)
";

for($count = 0; $count<count($_POST['hidden_service_name']); $count++)
{
 $data = array(
  ':service_name' => $_POST['hidden_first_name'][$count],
  ':Descrition' => $_POST['hidden_Descrition'][$count]
 );
 $statement = $connect->prepare($query);
 $statement->execute($data);
}