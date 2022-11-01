	

<?php

include_once "db.php";

        // print_r($_FILES['file']);

        if(isset($_POST['submit']))
        {
            $filename = $_FILES['file']['tmp_name'];
            $handle = fopen("$filename", "r");
            $i=0;
            while (($cont = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
                $institute_code = $cont[0];
                $institute = $cont[1];
                $program = $cont[2];
                $category = $cont[3];
                $quota = $cont[4];
                $opening_rank = $cont[5];
                $closing_rank = $cont[6];
                
                $res = mysqli_query($conn, "INSERT INTO `rank`( `institute_code`, `institute`, `program`, `category`, `quota`, `opening_rank`, `closing_rank`) VALUES ('$cont[0]','$cont[1]','$cont[2]','$cont[3]','$cont[4]','$cont[5]','$cont[6]')");
                // $res = mysqli_query($conn, "INSERT INTO `rank`( `institute_code`, `institute`, `program`, `category`, `quota`, `opening_rank`, `closing_rank`) VALUES ('$institute_code','$institute','$program','$category','$quota','$opening_rank','$closing_rank')");             
            }            
        } 
        // header("Location:insert.php");
        // exit(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display data </title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <style>
        body{
            background-color: aqua;
        }
        .click{
            text-align: center;
            padding: 5vw 5vw;
        }
        .click button a{
            font-weight: 700;
            font-size: 20px;
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>

    <div class="container">
        <hr>
        <p><strong><h1>Upload File</h1></strong></p>

        <p><h3>You can upload your csv file only. </h3></p>

        <div class="container color text-cente my-5">
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <label for="">Choose File &nbsp </label>
                <input type="file" name="file" required>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <hr>
    <!-- <button type="button" name="search-button" class="btn btn-light"><a href="display.php">click to chek</a></button> -->
    </div>

    <div class="click">
        <button type="button" class="btn btn-primary"><a href="display.php">Click to display the data</a></button>
    </div>
</body>
</html>










