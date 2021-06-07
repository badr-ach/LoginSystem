<?php
    //chargé la partie view et la partie modèle necessaire
    class Controller {
        public function model($model) {
            //require le fichier modele
            require_once '../mvc/models/' . $model . '.php';
            //instanciation
            return new $model();
        }
        //charge la partie view
        public function view($view, $data = []) {
            if (file_exists('../mvc/views/' . $view . '.php')) {
                require_once '../mvc/views/' . $view . '.php';
            } else
                die("View does not exists.");
        }
    }
