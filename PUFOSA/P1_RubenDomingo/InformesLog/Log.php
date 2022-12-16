<html>

<head>
    <title>LOG</title>
    <style>
        body {
            background-color: #39ace7;
            font-family: Arial;
            color: white;
        }
    </style>
</head>

<body>
    <?php
    include '../MenuNavegacion/Menu.php';
    require 'CreacionFichero.php';

    //Imprimimos fichero log
    while ($linea = fgets($archivo)) {
        echo $linea.'<br/>';  
    }
    ?>
</body>

</html>