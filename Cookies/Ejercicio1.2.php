<html>

<head>
    <title>Ejercicio 2</title>
</head>

<body>
    <?php
    if (isset($_POST['volver'])) {
        setcookie('nombre', '', time() - 1);
        setcookie('apellidos', '', time() - 1);
        setcookie('color', '', time() - 1);
        setcookie('letra', '', time() - 1);
        setcookie('font', '', time() - 1);
        header('Location:Ejercicio1.php');
    } else if (isset($_COOKIE['nombre'])) {
    ?>
        <div style='background-color: <?= $_COOKIE['color'] ?>'>
            <p style="color: <?= $_COOKIE['letra'] ?>; font-family:<?= $_COOKIE['font'] ?>">Hola <?= $_COOKIE['nombre'] ?> <?= $_COOKIE['apellidos'] ?></p>
        </div>
        <form method="post" action="">
            <button name="volver">
                Volver inicio
            </button>
        </form>
    <?php
    } else if (isset($_POST['nombre'])) {
    ?>
        <div style='background-color: <?= $_POST['color'] ?>'>
            <p style="color: <?= $_POST['letra'] ?>; font-family:<?= $_POST['font'] ?>">Hola <?= $_POST['nombre'] ?> <?= $_POST['apellidos'] ?></p>
        </div>
        <?php
        setcookie('nombre', $_POST['nombre']);
        setcookie('apellidos', $_POST['apellidos']);
        setcookie('color', $_POST['color']);
        setcookie('letra', $_POST['letra']);
        setcookie('font', $_POST['font']);
        ?>
        <form method="post" action="">
            <button name="volver">
                Volver inicio
            </button>
        </form>
    <?php
    }
    ?>
</body>

</html>