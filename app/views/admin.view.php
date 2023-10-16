<?php

class AdminView {
    public function showProduct($products) {
        $count = count($products);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion

        // mostrar el template
        require './templates/stock.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }

    public function showUpdate($product){
        require './templates/stock.phtml';
    }
}