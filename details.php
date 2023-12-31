<?php

include "dbFunctions.php";

$id = isset($_GET['asset_id']) ? htmlspecialchars($_GET['asset_id'], ENT_QUOTES, 'UTF-8') : null;
$query = "SELECT * FROM asset WHERE asset_id='$id'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $filetype = htmlspecialchars($row['filetype'], ENT_QUOTES, 'UTF-8');
    $author = htmlspecialchars($row['author'], ENT_QUOTES, 'UTF-8');
    $intent = htmlspecialchars($row['intent'], ENT_QUOTES, 'UTF-8');
    $picture = htmlspecialchars($row['thumbnail'], ENT_QUOTES, 'UTF-8');
    $skilltags = htmlspecialchars($row['skill_tags'], ENT_QUOTES, 'UTF-8');
    $publisher = htmlspecialchars($row['publisher'], ENT_QUOTES, 'UTF-8');
    $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
    $content = htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8');
    $duration = htmlspecialchars($row['duration'], ENT_QUOTES, 'UTF-8');
    $date = htmlspecialchars($row['pub_date'], ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!--stylesheet-->
    <link href="detailspage.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://unpkg.com/vue@2.6.14/dist/vue.js"></script>
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <title>Filetype</title>
</head>

<body>
    <div class="row">
        <?php include "navBar.php" ?>
        <hr>
        <div class="navbottom" style="padding-left:50px;">
            <a href="home.php" style="text-decoration:none;color:black;">
                <i class="fas fa-home"></i>
            </a>
            <a> > </a>
            <?php echo $title; ?>
        </div>
        <hr>
        <?php if (!empty($id)) { ?>
        <div class="iframe">
            <?php if ($filetype == "LINK") { ?>
            <!-- Vue component for LINK -->
            <div id="app">
                <iframe-component width="960" height="436" :src=" '<?php echo $content ?>' "></iframe-component>
            </div>
            <?php } elseif ($filetype == "IMG") { ?>
            <!-- Vue component for IMG -->
            <div id="app">
                <iframe-component width="960" height="436" :src="'media/<?php echo $content ?>'"></iframe-component>
            </div>
            <?php } elseif ($filetype == 'MP3') { ?>
            <!-- Vue component for MP3 -->
            <div id="app">
                <iframe-component width="960" height="436" :src="'media/<?php echo $content ?>'"></iframe-component>
            </div>
            <?php } elseif ($filetype == "MP4") { ?>
            <!-- Vue component for MP4 -->
            <div id="app">
                <iframe-component width="960" height="436" :src="'media/<?php echo $content ?>'"></iframe-component>
            </div>
            <?php } elseif ($filetype == "pdf") { ?>
            <!-- Vue component for PDF -->
            <div id="app">
                <iframe-component width="960" height="436" :src="'media/<?php echo $content ?>'"></iframe-component>
            </div>
            <?php } else { ?>
            <!-- Vue component for default (fallback) -->
            <div id="app">
                <iframe-component width="960" height="436" :src="'<?php echo $content ?>'"></iframe-component>
            </div>
            <?php } ?>
        </div>

        <script>
        // Define the Vue iframe component
        Vue.component('iframe-component', {
            props: ['src'],
            template: '<iframe :src="src"></iframe>'
        });

        // Initialize the Vue app
        new Vue({
            el: '#app',
        });
        </script>
        <div style="font-weight:lighter;">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <b class="uploaded-by" style="padding-left:60px;">Uploaded By</b>
                        </br>
                        <b class="publisher">
                            <?php echo $publisher ?>
                        </b>
                    </div>
                    <div class="col">
                        <b class="authored-by" style="padding-left:40px;">Authored By</b>
                        </br>
                        <b class="author">
                            <?php echo $author ?>
                        </b>
                    </div>
                    <div class="col">
                        <b class="info" style="font:10px;padding-left:0;color:#8c8581;">
                            <?php echo $filetype ?>.
                            <?php echo $duration ?> .Published
                            <?php echo $date ?>
                        </b>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <i class="fas fa-info-circle fa-xl" style="color: #b88051;"></i>
                                </div>
                                <div class="col">
                                    <i class="far fa-clone fa-xl" style="color: #b88051;"></i>
                                </div>
                                <div class="col">
                                    <i class="far fa-copy fa-xl" style="color: #b88051;"></i>
                                </div>
                                <div class="col">
                                    <i class="fas fa-user-friends fa-xl" style="color: #b88051;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">

                    </div>
                    <div class="col">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <i class="far fa-lightbulb fa-xl" style="color: #b88051;"></i>
                                </div>
                                <div class="col">
                                    <i class="far fa-bookmark fa-xl" style="color: #b88051;"></i>
                                </div>
                                <div class="col">
                                    <i class="fas fa-share-alt fa-xl" style="color: #b88051;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="information">
                <b class="intent" style="font-size:30px; padding-top:20px; padding-left: 60px;">Intent of this
                    Asset</b>
                </br>
                <b class="container" style="text-transform:none;">
                    <div class="container">
                        <?php echo $intent ?>
                    </div>
                </b>
            </div>
            <div class="skilltags">
                <b class="skilltag" style="font-size:15px; padding-top:20px; padding-left: 60px;color:#8c8581;">SKILL
                    TAGS</b>
                </br>
                <b class="container" style="text-transform:none;">
                    <div class="container">
                        <?php echo $skilltags ?>
                    </div>
                </b>
            </div>
        </div>
    </div>
    <?php } ?>
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

    <div class="footer footer-btn" style="background-color: #503620; color: white;">
        <div class="footer container justify-content-end text-end">
            © 2023 Osmosis Learn
        </div>
    </div>
</body>

</html>