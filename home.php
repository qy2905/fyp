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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--font awesome css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!--stylesheet-->
    <link rel="stylesheet" href="style.css">
    <title>Osmosis</title>
    <style>
        /* carousel css */

        .multi-item-carousel {
            .carousel-inner {
                >.item {
                    transition: 500ms ease-in-out left;
                }

                .active {
                    &.left {
                        left: -33%;
                    }

                    &.right {
                        left: 33%;
                    }
                }

                .next {
                    left: 33%;
                }

                .prev {
                    left: -33%;
                }

                @media all and (transform-3d),
                (-webkit-transform-3d) {
                    >.item {
                        /* // use your favourite prefixer here */
                        transition: 500ms ease-in-out left;
                        transition: 500ms ease-in-out all;
                        backface-visibility: visible;
                        transform: none !important;
                    }
                }
            }

            .carouse-control {

                &.left,
                &.right {
                    background-image: none;
                }
            }
        }
    </style>
</head>

<body>
    <div class="row">
        <ul class="topnav" id="myTopnav">
            <li><img src="media/osmosis learn logo.png" alt="osmosis learn logo" class="logo" width="250" height="80">
            </li>
            <li><a href="home.php" class="explore">Explore</a></li>
            <li><a href="#create" class="create">Create</a></li>
            <li><a href="#events" class="events">Events</a></li>
            <li><a href="#login" class="login">Log In</a></li>
            <li><a href="#signup" class="signup">Sign Up</a></li>
        </ul>
        <hr>
        <h1 class="exporeasset" style="">Explore Assets</h1>
        <hr>
        <div>
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
                <!--cards-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="carousel slide multi-item-carousel" id="theCarousel">
                            <div class="carousel-inner">
                                <div class="card" style="width: 18rem;">
                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($picture); ?>"
                                        class="card-img-top" />
                                    <div class="card-body" style="outline-color:black;">
                                        <p class="card-text">
                                        <div class="container-fluid">
                                            <a href="details.php?asset_id=<?php echo $id; ?>"><?php echo $title; ?></a>
                                        </div>
                                        <div class="container-fluid" id="info">
                                            <?php echo $filetype; ?> &bull;
                                            <?php echo $duration; ?> &bull;
                                            <?php echo $date; ?>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <i class="fas fa-user-circle"></i>
                                                </div>
                                                <div class="col">
                                                    <i class="fas fa-info-circle"></i>
                                                </div>
                                                <div class="col">
                                                    <i class="fas fa-tags fa-rotate-90"></i>
                                                </div>
                                            </div>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i
                                    class="glyphicon glyphicon-chevron-left"></i></a>
                            <a class="right carousel-control" href="#theCarousel" data-slide="next"><i
                                    class="glyphicon glyphicon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <?php
            }
            ?>
        </div>
        <footer class="navbar navbar-expand-sm" style="background-color: #3a2718;">
            <div class="container-fluid">
                <ul class="nav text-muted" style="background-color: #3a2718;">
                    <li class="nav-item">
                        <a class="pl-2 pr-2 btn btn-footer" style="color: #fff;" href="about-us">About
                            Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="pl-2 pr-2 btn btn-footer" style="color: #fff;" href="#private-policy">Privacy
                            Policy</a>
                    </li>
                </ul>
                <button class="button button1" style="background-color:#3a2718;">
                    <a class="pl-2 pr-2 btn btn-footer" style="color: #fff;" href="#feedback">We Love to
                        Hear
                        From You</a>
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

    // Instantiate the Bootstrap carousel
    $('.multi-item-carousel').carousel({
        interval: false
    });

    // for every slide in carousel, copy the next slide's item in the slide.
    // Do the same for the next, next item.
    $('.multi-item-carousel .item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length > 0) {
            next.next().children(':first-child').clone().appendTo($(this));
        } else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });
</script>

</html>
