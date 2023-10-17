<?php

class AdminCatView {
    public function showCategory($categories) {
        $count = count($categories);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion

        // mostrar el template
        require './templates/dashboard_categoria.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }

}