<?php
interface PlatoDAO {
    public function insertar(Plato $plato);
    public function findByNombre($nombre);
}
?>