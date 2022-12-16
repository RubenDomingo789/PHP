<html>

<head>
    <title>Ejercicio 22</title>
</head>

<body>
    <?php
    function calculoSalario($nombre, $edad, &$salario){
        if ($salario < 1000){
            if($edad < 30){
                $salario = 1500;
            }
            elseif($edad >= 30 && $salario <= 45){
                $salario = $salario * 1.03;
            }
            else{
                $salario = $salario * 1.15;
            }
        }
        elseif ($salario <= 2000 && $salario >= 1000){
            if ($edad > 45){
                $salario = $salario * 1.04;
            }
            else {
                $salario = $salario * 1.1;
            }
        }
        else {
            $salario = $salario;
        }
    }
    $empleados = array(
        "CE0000" => array("Nombre" => "Pepe", "Edad" => 42, "Salario" => 1248),
        "CE0001" => array("Nombre" => "Cristina", "Edad" => 19, "Salario" => 1100),
        "CE0002" => array("Nombre" => "Sara", "Edad" => 27, "Salario" => 2300),
        "CE0003" => array("Nombre" => "David", "Edad" => 32, "Salario" => 2300),
        "CE0004" => array("Nombre" => "Juan", "Edad" => 22, "Salario" => 700),
        "CE0005" => array("Nombre" => "Marta", "Edad" => 58, "Salario" => 3000),
    );

    foreach($empleados as $clave => $valor){
        echo "Empleado $clave => {$valor['Salario']}<br>";
    }

    echo "<br>";
    
    foreach($empleados as $clave => $valor){
        calculoSalario($valor['Nombre'], $valor['Edad'], $valor['Salario']);
        echo "Empleado $clave => {$valor['Salario']}<br>";
    }
    ?>
</body>

</html>