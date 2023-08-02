<?php
include "dbFunctions.php";

$query = "SELECT * FROM asset";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
    $arrContent[] = $row;
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--font awesome css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!--stylesheet-->
    <link rel="stylesheet" href="style.css">
    <title>FYP prototype</title>
</head>

<body>
    <div class="row">
        <ul class="topnav" id="myTopnav">
            <li><img src="osmosis learn logo.png" alt="osmosis learn logo" class="logo" width="250" height="80"></li>
            <li><a href="#explore" class="explore">Explore</a></li>
            <li><a href="#create" class="create">Create</a></li>
            <li><a href="#events" class="events">Events</a></li>
            <li><a href="#login" class="login">Log In</a></li>
            <li><a href="#signup" class="signup">Sign Up</a></li>
        </ul>
        <hr>
        <h1>Explore Assets</h1>
        <hr>
        <table cellpadding="2" cellspacing="2">
            <tr>
                <th></th>
                <th>Name</th>
                <th>File Type</th>
                <th>iFrame</th>
                <th>Duration</th>
                <th>Publish Date</th>
                <th>Author</th>
            </tr>

            <?php
            for ($i = 0; $i < count($arrContent); $i++) {
                $id = $arrContent[$i]['asset_id'];
                $filetype = $arrContent[$i]['filetype'];
                $author = $arrContent[$i]['author'];
                $intent = $arrContent[$i]['intent'];
                $picture = $arrContent[$i]['thumbnail'];
                $skilltags = $arrContent[$i]['skill_tags'];
                $publisher = $arrContent[$i]['publisher'];
                $title = $arrContent[$i]['title'];
                $content = $arrContent[$i]['content'];
                $duration = $arrContent[$i]['duration'];
                $date = $arrContent[$i]['pub_date'];
                ?>

                <tr>
                    <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($picture); ?>" />
                    </td>
                    <td>
                        <?php echo $title; ?>
                    </td>
                    <td>
                        <?php echo $filetype; ?>
                    </td>
                    <td><a href="details.php?asset_id=<?php echo $id; ?>">Click Here</a></td>
                    <td>
                        <?php echo $duration; ?>
                    </td>
                    <td>
                        <?php echo $date; ?>
                    </td>
                    <td>
                        <?php echo $publisher; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <footer class="navbar navbar-expand-sm" style="background-color: #3a2718;">
        <div class="container-fluid">
            <ul class="nav text-muted" style="background-color: #3a2718;">
                <li class="nav-item">
                    <a class="pl-2 pr-2 btn btn-footer" style="color: #fff;" href="about-us">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="pl-2 pr-2 btn btn-footer" style="color: #fff;" href="#private-policy">Privacy Policy</a>
                </li>
            </ul>
            <button class="button button1" style="background-color:#3a2718;">
                <a class="pl-2 pr-2 btn btn-footer" style="color: #fff;" href="#feedback">We Love to Hear From You</a>
            </button>
        </div>
    </footer>

    <div class="footer footer-btm" style="background-color: #503620; color: white;">
        <div class="footer container justify-content-end text-end">
            © 2023 Osmosis Learn
        </div>
    </div>
</body>
<script>
//iframe load when user on homepage
    (function (d) {
        var iframe = d.pdy.appendChild(d.createElement('iframe')), doc = iframe.contentWindow.document;
        doc.open().write('<body onload="" 'var d = document; d.getElementsByTagName('head')[0].' + 'appendChild(d.createElement('script')).src' +
            = VV / path\to\file\"" > ");
        doc.close(); //iframe, onload, event happens

    })(document); 
</script>

</html>
