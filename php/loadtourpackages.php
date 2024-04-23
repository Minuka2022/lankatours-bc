<?php

include './PDBC.php';
mysqli_set_charset($link, 'utf8');
$sql = "SELECT * FROM tour";
$text = "";
if ($tourresult = mysqli_query($link, $sql)) {
    while ($tourrow = mysqli_fetch_row($tourresult)) {
        $text .= "<li>";
        $text .= "    <a data-toggle='collapse' class='collapsed' href='#faq$tourrow[0]'><img src='img/tours/$tourrow[2]' class='img-fluid' style='margin:10px 0;' alt=''/> $tourrow[1]</a>";
        $text .= "    <div id='faq$tourrow[0]' class='collapse' data-parent='#faq-list'>";
        $text .= "        <ul id='faq-list'>";
        $sql1 = "SELECT * FROM package WHERE tour_id='" . $tourrow[0] . "'";
        if ($packageresult = mysqli_query($link, $sql1)) {
            while ($packagerow = mysqli_fetch_row($packageresult)) {
                $text .= "            <li class='section-bg' style='padding:0 20px'>";
                $text .= "                <a data-toggle='collapse' class='collapsed' href='#faq$tourrow[0]$packagerow[0]'>$packagerow[1]</a>";
                $text .= "                <div id='faq$tourrow[0]$packagerow[0]' class='collapse'>";
                $text .= "                    <div>";
                $sql2 = "SELECT * FROM trip WHERE package_id='" . $packagerow[0] . "'";
                if ($tripresult = mysqli_query($link, $sql2)) {
                    while ($triprow = mysqli_fetch_row($tripresult)) {
                        $text .= "                            <h4 class='margin-10 text-left'>$triprow[1]</h4>";
                        $text .= "                            <p>$triprow[2]</p>";
                        $text .= "                            <h5 class='marginbot-10'>Things to see on the way & on the day</h5>";
                        $text .= "                            <ul>";
                        $todo = explode(",", $triprow[3]);
                        for ($x = 0; $x < count($todo); $x++) {
                            $text .= "                                <li style='border-bottom:none;'>$todo[$x]</li>";
                        }
                        $text .= "                            </ul>";
                    }
                }
                $text .= "                    </div>";
                $text .= "                </div>";
                $text .= "            </li>";
            }
        }
        $text .= "        </ul>";
        $text .= "    </div>";
        $text .= "</li>";
    }
    // Free result set
    // mysqli_free_result($tourresult);
    // mysqli_free_result($packageresult);
    // mysqli_free_result($tripresult);
}
echo $text;
