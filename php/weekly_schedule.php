<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Orari - ITS APP</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/nav-style.css">
        <link rel="stylesheet" href="../css/coord-style.css">
        <link rel="stylesheet" href="../css/footer-style.css">
        <link rel="stylesheet" href="../css/table-style.css">

    </head>
    <body>
        <?php include 'nav.php'; ?>
        
        <div class="schedule-container profile-container">
            <div class="contenitore">
                <h2>GESTIONE ORARI</h2>
                <table class="course-table">
        <thead>
            <tr>
                <th>CORSO</th>
                <th>ANNO</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>IT652789</td>
                <td>1</td>
                <td><a href="#">Vedi Disponibilità</a></td>
                <td><a href="#">Richiedi Disponibilità</a></td>
                <td><a href="#">Crea nuovo orario</a></td>
            </tr>
            <tr>
                <td>IT652789</td>
                <td>2</td>
                <td><a href="#">Vedi Disponibilità</a></td>
                <td><a href="#">Richiedi Disponibilità</a></td>
                <td><a href="#">Crea nuovo orario</a></td>
            </tr>
        </tbody>
    </table>
    <h2>ULTIMI ORARI</h2>
    <div class="table-container">
        <table class="course-table">
            <thead>
                <tr>
                    <th>CORSO</th>
                    <th>ANNO</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>IT652789</td>
                    <td>1</td>
                    <td><a href="#">Scarica Orario</a></td>
                    <td><a href="#">Invia Orario</a></td>
                    <td><a href="#">Vedi Orario</a></td>
                </tr>
                <tr>
                    <td>IT652789</td>
                    <td>2</td>
                    <td><a href="#">Scarica Orario</a></td>
                    <td><a href="#">Invia Orario</a></td>
                    <td><a href="#">Vedi Orario</a></td>
                </tr>
            </tbody>
        </table>
              
            </div>    
        </div>
    </div>
    

</body>
<?php include 'footer.php'?>
</html>
