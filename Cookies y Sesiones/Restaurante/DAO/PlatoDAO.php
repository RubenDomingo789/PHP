<?php
interface PlatoDAO {
    public function insertar(Plato $plato);
    public function mostrar();
    public function findByNombre($nombre);
}
?>