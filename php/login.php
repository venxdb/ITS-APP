<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="../css/login.css">
    </head>
    <body>
        <!--------header---->
        <header></header>
        <!--copertina-->
        <div class="centrale">
            <div class="copertina">
                <div id="logo"></div>
                <h2>SERVIZI DI GESTIONE SCOLASTICA PER ISTITUTI TECNICI SUPERIORI</h2>
            </div>

            <div class="centrale">
                <div class="login-container login">
                    <form id="login-form" action="backend/login_process.php" method="post">
                    <label >username</label>
                        <input
                            type="text"
                            name="username"
                            placeholder="Nome utente/Email"
                            required="required">
                            <label >password</label>
                        <input
                            type="password"
                            name="password"
                            placeholder="Password"
                            required="required">
                        <button type="submit" id = "submit">Login</button>
                    </form>
                    <div id="login-error" class="error-message"></div>
                </div>
            </div>

        </body>
    </html>