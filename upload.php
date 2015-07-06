<?php

if (!is_dir("uploads")){
mkdir("uploads");

header('Content-Type: application/json');

$uploaded = array();

if (!empty($_FILES['file']['name'][0])) {

    foreach($_FILES['file']['name'] as $position => $name) {
        if(move_uploaded_file($_FILES['file']['tmp_name'][$position], 'uploads/' . $name)) {


     if(true) {

        require_once('mysqli_connect.php');

        $query = "INSERT INTO files (fileName) VALUES (?)";

        $stmt = mysqli_prepare($dbc, $query);


        mysqli_stmt_bind_param($stmt, "s", $name);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Succesfully Uploaded!';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        }

    }



            $uploaded[] = array(
                'name' => $name,
                'file' => 'uploads/' . $name
                );
        }

    }

}

echo json_encode($uploaded);

 ?>
