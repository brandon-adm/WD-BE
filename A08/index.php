<?php
include('connect.php');
include('classes.php');

$cards = array();
$islandQuery = "SELECT * FROM islandsofpersonality";
$islandResult = executeQuery($islandQuery);
$islandCount = mysqli_num_rows($islandResult);

while ($islandRow = mysqli_fetch_assoc($islandResult)) {
    $c = new island(
        $islandRow['islandOfPersonalityID'],
        $islandRow['name'],
        $islandRow['shortDescription'],
        $islandRow['longDescription'],
        $islandRow['color'],
        $islandRow['image']
    );

    array_push($cards, $c);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Core Memories</title>
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

        .display-1 {
            font-family: "Slackey", sans-serif;
            font-weight: 400;
            font-style: normal;
            background: linear-gradient(to top, #CCE5FF, #89A4E3);
            -webkit-background-clip: text;
            color: transparent;
        }

        .navbar {
            background-color: #89A4E3;
            font-family: "Slackey", sans-serif;
            font-weight: 400;
            font-style: normal;
        }


        .card {
            background-color: transparent;
            border-style: none;
        }

        .card-body {
            border-style: none;
        }

        .card-text {
            color: #CCE5FF;
        }

        .btn {}
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="index.php">Core Memories</a>
        </div>
    </nav>

    <div class="text-center my-5 text-light">
        <p class="display-1">CORE MEMORIES</p>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <p class="lead text-light text-center">I am Brandon Areej D. Mauricio, A student and a hobbyist.</p>
            </div>
        </div>

    </div>



    <div class="text-light" id="tour">
        <hr>
        <div class="text-center">
            <p class="text-light my-5"><i><?php echo $islandCount ?> Core Memory Banks</i></p><br>



            <div class="d-flex justify-content-evenly mt-5 row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 img-fluid">
                <?php foreach ($cards as $card) { ?>
                    <div class="col ">
                        <div class="d-flex justify-content-evenly card card-bg overflow-hidden m-3 p-0 rounded-5 img-fluid">
                            <img src="img/<?php echo $card->image; ?>" class="card-img-top img-card img-fluid" alt="...">
                            <div class="card-body text-light">
                                <p class="h5 card-title"><?php echo $card->name; ?></p>
                                <p class="card-text"><?php echo $card->shortDesc; ?></p>
                                <a href="view.php?id=<?php echo $card->id; ?>" class="btn btn-info text-dark">Go here</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <hr class="text-light">

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