    <?php


    if (
        isset($error_login) && !empty($error_login)
    ) {
        alerta_sw($error_login, "error", "Error");
    }

    if (isset($_POST["boton_register"]) && !empty($_POST["boton_register"])) {

        if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["repeat-password"]) && !empty($_POST["repeat-password"])) {
            $email = $_POST["email"];

            $buscar_email = mysqli_query($db, "SELECT * FROM `usuarios` WHERE `email` = '$email'");
            if (mysqli_num_rows($buscar_email) > 0) {
                alerta_sw("Ya hay una cuenta creada con este correo.", "error", "Error");
            } else {
                $password = password_generar_hash($_POST["password"]);
                $repeat_password = password_generar_hash($_POST["repeat-password"]);
                if ($password == $repeat_password) {
                    $password   = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_query($db, "INSERT INTO usuarios (email,password) VALUES ('$email','$password')");
                    $user_id = $db->insert_id;
                    AddNewAdress($user_id);
                    alerta_sw("Te haz registrado con exito", "success", "Fabuloso!");
                } else {
                    alerta_sw("Las contraseñas puestas no coinciden.", "error", "Error");
                }
            }
        } else {
            alerta_sw("No se han detectado toda la informacion necesaria", "error", "Error");
        }
    }


    ?>

    <section class="marco">
        <header>
            <nav class="navbar navbar-expand-lg">
                <div class="Logo">
                    <a class="navbar-brand" href="/">
                        <img src="/img/img/images/1_5143645411986112722.png" alt=" ">
                    </a>
                </div>
                <div class="navbar-nav">
                    <a class="nav-link " href="/"><i class="fas fa-home"></i>Inicio </a>
                    <a class="nav-link " href="#"><i class="fas fa-download"></i>Descargas </a>
                    <a class="nav-link " href="#"><i class="fas fa-wallet"></i>Billetera </a>
                    <a class="nav-link " href="#"><i class="fas fa-clipboard-check"></i> Exchange </a>
                    <a class="nav-link " href="login"><i class="fas fa-sign-in-alt"></i> Entrar</a>
                </div>
            </nav>
        </header>
        <div class="marcoDo">
            <section class="Register_login">
                <figure>
                    <form method="POST" action="" id="login" class='login'>
                        <img src="/img/img/images/1_5143645411986112722.png" alt="">
                        <label>
                            Usuario <br>
                            <input name="username" type="text">
                        </label>
                        <label>
                            Contraseña <br>
                            <input name="password" type="password">
                        </label>
                        <small style="margin-bottom: 3%;"><a href="#">He olvidado mi Contraseña</a></small>
                        <button>Iniciar Sesión</button>
                        <input type="hidden" value="no" name="boton_login">
                        <p>
                            ¿No estas Registrado?
                            <a href="#" onclick=change()>Registrarse</a>
                        </p>
                    </form>
                    <form method="POST" action="" id="register" class='login register'>
                        <img src="/img/img/images/1_5143645411986112722.png" alt="">
                        <label style="margin-top: 5%;">
                            Correo
                            <input id="email" name="email" type="email">
                        </label>
                        <label>
                            Contraseña
                            <input id="password" name="password" type="password">
                        </label>
                        <label>
                            Confirmar contraseña
                            <input name="repeat-password" id="repeat-password" type="password">
                        </label>
                        <button>Continuar</button>
                        <input type="hidden" value="aksjdkasd0" name="boton_register">
                        <p>
                            ¿Ya tienes Cuenta?
                            <a href="#" onclick=change2()>Iniciar Sesión</a>
                        </p>
                    </form>
                </figure>
            </section>
        </div>
    </section>