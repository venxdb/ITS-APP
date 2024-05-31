<?php
function renderNav($currentPage) {
    $links = [
        "HOME" => "professor_profile.php",
        "ORARI" => "weekly_schedule.php",
        "AVVISI" => "contacts.php",
        "REGISTRO" => "attendance.php",
        "MATERIALI" => "student_profile.php"
    ];

    echo '<nav>';
    echo '<img src="../img/logo.svg" alt="Logo ITS"></span>';
    echo '<ul class="nav-links">';

    // Move the current page to the first position
    if (array_key_exists($currentPage, $links)) {
        $temp = [$currentPage => $links[$currentPage]];
        unset($links[$currentPage]);
        $links = $temp + $links;
    }

    foreach ($links as $name => $url) {
        echo '<li ><a id="etichette" href="' . $url . '"' . ($name === $currentPage ? ' class="active"' : '') . '>' . $name . '</a></li>';
    }

    echo '</ul>';
    echo '</div>';
    echo '</nav>';
}
?>
