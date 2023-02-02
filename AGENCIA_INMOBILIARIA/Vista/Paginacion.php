<html>

<head>
    <?php
    if (!isset($_SESSION['usuario'])) {
        header('location: ../index.php');
    } ?>
    <title>Ejercicio 1</title>
    <style>
        ul.pagination {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        ul.pagination li {
            display: inline;
        }

        ul.pagination li button {
            color: white;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
            background-color: #542854;
        }

        .pagination li:first-child button {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .pagination li:last-child button {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        ul.pagination li button:hover:not(.active) {
            background-color: #d147ed;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST['users'])) {
    ?>
        <ul class="pagination">
            <li>
                <form method="post" action="<?php if ($nPaginas <= 1) {
                                                echo 'index.php';
                                            } else {
                                                echo "index.php?nPaginas=" . ($nPaginas - 1);
                                            } ?>">
                    <button name="users">
                        Anterior
                    </button>
                </form>
            </li>
            <?php for ($i = 1; $i <= $paginas; $i++) { ?>
                <li>
                    <form method="post" action="index.php<?php echo "?nPaginas=" . $i; ?>">
                        <button name="users">
                            <?php echo $i ?>
                        </button>
                    </form>
                </li>
            <?php } ?>
            <li>
                <form method="post" action="<?php if ($nPaginas >= $paginas) {
                                                echo "index.php?nPaginas=" . ($nPaginas ++);
                                            } else {
                                                echo 'index.php?nPaginas=' . $paginas;
                                            } ?>">
                    <button name="users">
                        Siguiente
                    </button>
                </form>
            </li>
        </ul>
    <?php
    } else {
    ?>
        <ul class="pagination">
            <li>
                <form method="post" action="<?php if ($nPaginas <= 1) {
                                                echo 'index.php';
                                            } else {
                                                echo "index.php?nPaginas=" . ($nPaginas - 1);
                                            } ?>">
                    <button>
                        Anterior
                    </button>
                </form>
            </li>
            <?php for ($i = 1; $i <= $paginas; $i++) { ?>
                <li>
                    <form method="post" action="index.php<?php echo "?nPaginas=" . $i; ?>">
                        <button>
                            <?php echo $i ?>
                        </button>
                    </form>
                </li>
            <?php } ?>
            <li>
                <form method="post" action="<?php if ($nPaginas >= $paginas) {
                                                echo "index.php?nPaginas=" . ($nPaginas ++);
                                            } else {
                                                echo 'index.php?nPaginas=' . $paginas;
                                            } ?>">
                    <button>
                        Siguiente
                    </button>
                </form>
            </li>
        </ul>
    <?php
    }
    ?>
</body>