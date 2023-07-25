<?php

include "dbFunctions.php";

$id = $_GET['asset_id'];
$query = "SELECT * FROM asset WHERE asset_id='$id'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $filetype = $row['filetype'];
    $author = $row['author'];
    $intent = $row['intent'];
    $picture = $row['thumbnail'];
    $skilltags = $row['skill_tags'];
    $publisher = $row['publisher'];
    $title = $row['title'];
    $content = $row['content'];
    $duration = $row['duration'];
    $date = $row['pub_date'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>File Type</title>
</head>

<body>
    <div class="row">
        <ul>
            <li><img src="osmosis learn logo.png" alt="osmosis learn logo" class="logo" width="250" height="80"></li>
            <li><a href="#explore" class="explore">Explore</a></li>
            <li><a href="#create" class="create">Create</a></li>
            <li><a href="#events" class="events">Events</a></li>
            <li><a href="#login" class="login">Log In</a></li>
            <li><a href="#signup" class="signup">Sign Up</a></li>
        </ul>
        <hr>
        <?php if (!empty($id)) { ?>
            <div style="width:350px;">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($arrContent[$id]['thumbnail']); ?>" />
                <br />
                <b>File Type:</b>
                <?php echo $filetype ?><br />
                <b>Author:</b>
                <?php echo $author ?><br />
                <b>Publisher</b>
                <?php echo $publisher ?><br />
                <b>Date Published:</b>
                <?php echo $date ?><br />
                <b>Skill Tags:</b>
                <?php echo $skilltags ?><br />
                <b>Title:</b>
                <?php echo $title ?><br />
                <b>Duration:</b>
                <?php echo $duration ?><br />
                <b>Intent:</b>
                <?php echo $intent ?><br />
            </div>
        <?php } ?>
</body>

</html>