<?php
include('connect.php');
include('classes.php');

$islandID = $_GET['id'];
$islandInfo = null;

$islandQuery = "SELECT * FROM islandsofpersonality WHERE islandOfPersonalityID = '$islandID'";
$islandResult = executeQuery($islandQuery);

while ($islandRow = mysqli_fetch_assoc($islandResult)) {
    $islandInfo = new island(
        $islandRow['islandOfPersonalityID'],
        $islandRow['name'],
        $islandRow['shortDescription'],
        $islandRow['longDescription'],
        $islandRow['color'],
        $islandRow['image']
    );
}

$contentArray = array();
$islandContentQuery = "SELECT * FROM islandcontents WHERE islandOfPersonalityID = '$islandID'";
$islandContentResult = executeQuery($islandContentQuery);
$islandContentCount = mysqli_num_rows($islandContentResult);

while ($islandContentRow = mysqli_fetch_assoc($islandContentResult)) {
    $ic = new islandContent(
        $islandInfo->color,
        $islandContentRow['image'],
        $islandContentRow['islandOfPersonalityID'],
        $islandContentRow['content']
    );

    array_push($contentArray, $ic);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $islandInfo->name ?> - Core Memories</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="Icon" type="image/png" href="img/logo.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Joti+One&family=Slackey&display=swap');

        body {
            background-image: url('img/backgroundimg.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
        }



        .navbar {
            background-color: #89A4E3;
            font-family: "Slackey", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .card {
            background-color: transparent;
            border: none;
            transition: transform 0.3s ease;
        }

        .card-img-top {

            height: auto;
            margin: 0 auto;
            padding: 0;
        }

        .card-body {
            background-color: transparent;
        }

        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="index.php">Core Memories</a>
    </nav>

    <div class="container d-flex justify-content-center">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 gp-4 text-center img-fluid">
            <?php foreach ($contentArray as $card) { ?>
                <div class="col">
                    <div class="card my-5">
                        <img src="img/<?php echo $card->image; ?>" class="img-fluid rounded-5"
                            alt="Image for <?php echo $card->content; ?>">
                        <div class="card-body">
                            <p class="card-text text-light text-center"><?php echo $card->content; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


    <div class="container-fluid" style="background-color: transparent;">
        <div class="row">
            <div class="col my-4 text-center text-light">
                <p class="h6" style="font-weight: light; font-size: 12px;">This website is still subject to change.</p>
                <p class="h6">brandon-adm</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>