<?php
include 'database.php';
$db = new database();

$db->connect();
$sql='select p.* from product as p,catogary as c where c.cata_id=p.cat_id and c.cata_name="Vegetable"  order by p.p_name';
//echo $sql;
$result=$db->select($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> product code: ". $row["p_code"]. " - Product Name: ". $row["p_name"].  $row["price"]. "<br>";
    }
} else {
    echo "0 results";
}

$db->close();

?>