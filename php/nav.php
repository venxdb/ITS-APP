<?php
function renderNav($currentPage) {
    $links = [
        "HOME" => "coordinator_profile.php",
        "ORARI" => "weekly_schedule.php",
        "AVVISI" => "contacts.php",
        "REGISTRO" => "attendance.php",
        "MATERIALI" => "student_profile.php"
    ];

    echo '<nav>';
    echo '<img src="../images/itsintero.svg" alt="Logo ITS"></span>';
    echo '<ul class="nav-links">';

    // Move the current page to the first position
    if (array_key_exists($currentPage, $links)) {
        $temp = [$currentPage => $links[$currentPage]];
        unset($links[$currentPage]);
        $links = $temp + $links;
    }

    foreach ($links as $name => $url) {
        echo 
        '<a id="etichette" href="' . $url . '"' . ($name === $currentPage ? ' class="active"' : '') . '><li>' . $name . '</li></a>';
    }

    echo '</ul>';
   
    echo '</div>';
    echo '</nav>';
}
?>
