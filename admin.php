<?php
//     include "admin/actions/db_connect.php";

// $hashed = password_hash("admin123", PASSWORD_DEFAULT);

// $stmt = $connect->prepare("UPDATE users set password = ? where user_id = 1");
// $stmt->bind_param("s", $hashed);
// if ($stmt->execute()) {
//     echo "sucess";
// } else {
// echo "failed";
// }

$str = "admin123";
echo md5($str);

?>