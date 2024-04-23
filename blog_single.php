<?php
include 'php/PDBC.php';
mysqli_set_charset($link, 'utf8');
if (!isset($_GET['id'])) {
    header("Location:blog.html");
}
$sql = "SELECT * FROM blog WHERE id_blog='" . $_GET["id"] . "'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="de">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script
            async
            src="https://www.googletagmanager.com/gtag/js?id=UA-139627029-1"
        ></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());

            gtag("config", "UA-139627029-1");
            gtag("event", "conversion", {
                send_to: "UA-139627029-1/-RWjCP382LEBEPLkrc0C"
            });
        </script>

        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="content-language" content="en">
        <meta name="robots" content="index, follow, all, noodp, noydir"/>
        <meta name="keywords" content="<?php echo $row['tags']; ?>"/>
        <meta name="author" content="SCORFi3LD">
        <title><?php echo $row['blog_title']; ?> - Lanka Tours</title>

        <meta property="og:title" content="<?php echo $row['blog_title']; ?> - Lanka Tours">
        <meta property="og:description" content="<?php echo substr($row['content'], 0, 150); ?>">
        <meta property="og:image" content="https://lankatourdriver.com/<?php echo $row['cover_image']; ?>">
        <meta property="og:url" content="https://lankatours.at/blog_single.php?id=<?php echo $row['id_blog']; ?>">
        <meta property="og:type" content="website" />

        <!-- Favicons -->
        <link href="img/favicon.png" rel="icon" />
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon" />

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet" />

        <!-- Bootstrap CSS File -->
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Data Tables -->
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>

        <!-- Libraries CSS Files -->
        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="lib/animate/animate.min.css" rel="stylesheet" />
        <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet" />
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet" />

        <!-- Main Stylesheet File -->
        <link href="css/style.css" rel="stylesheet" />

        <style type="text/css">
            .media-meta {
                font-size: 12px;
            }
        </style>
    </head>

    <body>
        <header id="header"></header>
        <section class="clearfix" style="height:100px;"></section>
        <main id="main">
            <section id="services" class="section-bg">
                <div class="container">
                    <header class="section-header">
                        <h3 style="text-transform: capitalize;"><?php echo $row['blog_title']; ?></h3>
                    </header>
                    <img src="https://lankatourdriver.com/<?php echo $row['cover_image']; ?>" class="img-fluid" style="width:100%;" alt="<?php echo $row['blog_title']; ?>"/>
                    <?php
                    $now = time();
                    $publishedDate = strtotime($row['published_date']);
                    $elapsedDays = round(($now - $publishedDate) / 86400);
                    ?>
                    <div class="media-meta"><span>Published <?php echo $elapsedDays; ?> days ago</span></div>
                    <p><?php echo $row['content']; ?></p>

                    <div id="disqus_thread"></div>
                    <script>
                        var disqus_config = function () {
                            // this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = <?php echo $row['id_blog']; ?>;
                        };

                        (function () { // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = 'https://lankatours.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                </div>
            </section>
        </main>

        <footer id="footer" class="section-bg"></footer>

        <!--<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>-->
        <!-- Uncomment below i you want to use a preloader -->
        <!--<div id="preloader"></div>-->

        <!-- JavaScript Libraries -->
        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/jquery/jquery-migrate.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/mobile-nav/mobile-nav.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        <!-- Contact Form JavaScript File -->
        <script src="contactform/contactform.js"></script>

        <!-- Template Main Javascript File -->
        <script src="js/main.js"></script>

        <script type="text/javascript">
                        $(document).ready(function () {
                            $("#header").load("header.html");
                            $("#footer").load("footer.html");
                        });
        </script>
    </body>
</html>
