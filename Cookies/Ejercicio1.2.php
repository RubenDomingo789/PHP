<html>

<head>
    <title>Ejercicio 2</title>
</head>

<body>
    <?php
    if (isset($_COOKIE['nombre'])) {
        setcookie('nombre', $_COOKIE['nombre']);
        setcookie('apellidos', $_COOKIE['apellidos']);
        setcookie('color', $_COOKIE['color']);
        setcookie('letra', $_COOKIE['letra']);
        setcookie('font', $_COOKIE['font']);
    ?>
        <div style='background-color: <?= $_COOKIE['color'] ?>'>
            <p style="color: <?= $_COOKIE['letra'] ?>; font-family:<?= $_COOKIE['font'] ?>">Hola <?= $_COOKIE['nombre'] ?> <?= $_COOKIE['apellidos'] ?></p>
        </div>
        <a href="Ejercicio1.php" <?php
            setcookie('nombre', $_POST['nombre'], 0);
            setcookie('apellidos', $_POST['apellidos'], 0);
            setcookie('color', $_POST['color'], 0);
            setcookie('letra', $_POST['letra'], 0);
            setcookie('font', $_POST['font'], 0);
            ?>>
            Volver inicio
        </a>
    <?php
    } else {
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
        <a href="Ejercicio1.php" <?php
            setcookie('nombre', $_POST['nombre'], 0);
            setcookie('apellidos', $_POST['apellidos'], 0);
            setcookie('color', $_POST['color'], 0);
            setcookie('letra', $_POST['letra'], 0);
            setcookie('font', $_POST['font'], 0);
            ?>>
            Volver inicio
        </a>
    <?php
    }
    ?>
</body>

</html>
