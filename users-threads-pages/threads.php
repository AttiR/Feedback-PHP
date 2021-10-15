<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Css -->
    <link rel="stylesheet" href="../css/styles.css?<?php echo time(); ?>">

    <!-- Bootsrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootsrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Fontawsome -->
    <script src="https://kit.fontawesome.com/d54712eab9.js" crossorigin="anonymous"></script>
    <title>ChatCodeE- codeDisscuss</title>
</head>

<body>

    <?php include '../config/dbcon.php';?>
    <header><?php include '../view/header.php'?></header>

    <?php

// fetching the data from a particular category , the category id passed from index.php
if (isset($_GET['categryid'])) {

    $categoryid = $_GET['categryid'];
    $categoryid = mysqli_real_escape_string($connect, $categoryid);
    $sql = "SELECT * FROM `Code_Categories` WHERE `code-category_id` = $categoryid";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_assoc($query)) {

        $categoryname = $row['code-category_name'];
        $categorydesc = $row['code-category_description']; // this data will be used to show values according to the id

    }
    $row = $connect->query($sql) or die('insert failed<br>' . $sql . '<br>' . mysqli_error($connect));

}

?>
    <section>

        <!-- Jumbotron Bootsrap 5-->
        <div class="container" style="width: 80%;">
            <div class="bg-light p-5 rounded-lg m-3">
                <h1 class="display-4" style="color:orange">
                    <?php echo $categoryname ?> Forum</h1>
                <!-- displaying data dynamically-->
                <p class="lead">
                    <?php echo $categorydesc ?> </p>
                <!-- displaying data dynamicaaly -->
                <hr class="my-4">
                <p>This is a peer to peer code chat forum. No Spam / Advertising / Self-promote in the forums is not
                    allowed. Do
                    not post copyright-infringing material. Do not post “offensive” posts, links or images. Do
                    not cross
                    post questions. Remain respectful of other members at all times.
                </p>
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </div>

        </div>

        <!-- User Questions, Ideas, tech information--->


        <!-----Fetching data from coding-threads---->
        <div class="container" style="width: 80%;">
            <h1 style="text-align: center; color:orange">Browse threads</h1>
            <div div class="bg-light p-5 rounded-lg m-3">
                <?php
$categoryid = $_GET['categryid'];
$categoryid = mysqli_real_escape_string($connect, $categoryid);
// fetching by id where id = category id selected by the user
$sql = "SELECT * FROM `coding_threads` WHERE `code_thread_id` = $categoryid";
$query = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($query)) {

    $codethreadid = $row['code_thread_id'];
    $codethreaddesc = $row['code_thread_desc'];
    $codethreadtitle = $row['code_thread_title'];
    $codethread_cat_id = $row['code_thread_cat_id'];
    $codethread_usr_id = $row['code_thread_user_id'];
    $dayandtime = $row['timestamp']; // this data will be used to show values according to the id

    // Media Oject dynamically data fecthing

    // user will choose category to explore. lets say Javascropt, will be guided to javascript corresponding id
    // and will be able to explore the threads corresponding to the category id.

    echo '
    <div class="d-flex">
                    <!-- Image -->
                    <img src="data:image/png;base64,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
                              Vn2JcU6dBBwVBdJ2MnI5hx+aKpfUcFw7AwTJ5f6ifqfGpOTWcNHcCcuFLapTpYRUWl5wq6yR8FXc2jOSoNhq7vgZlh4PoO2BFD/xFD/xFD/xFD/xFD/xFD/xFD/xFD/xFD/xFD/+m+4X/C8aeGQJJLlwAAAABJRU5ErkJggg=="
                        alt="John Doe" class="me-3 rounded-circle" style="width: 60px; height: 60px;" />
                    <!-- Body -->
                    <div>
                        <h5 class="fw-bold">
                           <a href="users-threads-pages/thread.php" class="text-dark"> ' . $codethreadtitle . '</a>
                            <small class="text-muted">' . $dayandtime . '</small>
                        </h5>
                        <p>
                            ' . $codethreaddesc . '
                        </p>
                    </div>
                </div>';
}
$row = $connect->query($sql) or die('insert failed<br>' . $sql . '<br>' . mysqli_error($connect));
?>


            </div>
        </div>
    </section>


    <?php include '../view/footer.php'?>

</body>

</html>