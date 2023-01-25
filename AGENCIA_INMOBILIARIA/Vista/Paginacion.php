<html>

<head>
    <title>Ejercicio 1</title>
    <style>
        ul.pagination {
            display:flex;
            flex-direction: row;
            justify-content: center;
        }

        ul.pagination li {
            display: inline;
        }

        ul.pagination li a {
            color: white;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
        }

        .pagination li:first-child a {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .pagination li:last-child a {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        ul.pagination li a:hover:not(.active) {
            background-color: #d147ed;
        }
    </style>
</head>

<body>
    <ul class="pagination">
        <li class="<?php if ($nPagina <= 1) {
                        echo 'disabled';
                    } ?>">
            <a href="<?php if ($nPagina <= 1) {
                            echo 'index2.php';
                        } else {
                            echo "?nPagina=" . ($nPagina - 1);
                        } ?>">Anterior
            </a>
        </li>
        <?php for ($i = 1; $i <= $paginas; $i++) { ?>
            <li>
                <a href="index2.php<?php echo "?nPagina=" . $i; ?>">
                    <?php echo $i ?>
                </a>
            </li>
        <?php } ?>
        <li class="<?php if ($nPagina >= $paginas) {
                        echo 'disabled';
                    } ?>">
            <a href="<?php if ($nPagina >= $paginas) {
                            echo 'index2.php';
                        } else {
                            echo "?nPagina=" . ($nPagina + 1);
                        } ?>">Siguiente
            </a>
        </li>
    </ul>
</body>


</html>