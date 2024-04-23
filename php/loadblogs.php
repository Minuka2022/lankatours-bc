<?php

include './PDBC.php';
mysqli_set_charset($link, 'utf8');
$sql = "SELECT * FROM blog WHERE lang='du' AND hidden='0' ORDER BY id_blog DESC LIMIT ".$_GET['page'].", 10";
$text = "";
if ($blogResult = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_row($blogResult)) {
        $now = time();
        $publishedDate = strtotime($row[5]);
        $elapsedDays = round(($now - $publishedDate) / 86400);
        $text .= '<div class="col-md-12 wow bounceInLeft" data-wow-delay="0.1s" data-wow-duration="1.4s" style="visibility: hidden; animation-duration: 1.4s; animation-delay: 0.1s; animation-name: none;"> <div class="box"> <div style="margin:10px"> <table width="100%"> <tr> <td width="120px"><img class="img-fluid" src="https://lankatourdriver.com/'.$row[4].'" style="width:100px;height:100px;object-fit:cover;" alt="Blog Image"/></td><td class="text-left"> <p class="media-heading">'.$row[1].'</p><div class="media-meta"> <span>Published '.$elapsedDays.' days ago</span> </div><p class="media-content">'.substr($row[3], 0, 150).'...</p><p class="media-link"><a href="blog_single.php?id='.$row[0].'">Read more →</a></p></td></tr></table> </div></div></div>';      
    }
}

echo $text;