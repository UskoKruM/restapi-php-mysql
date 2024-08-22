<?php

require_once __DIR__ . '/../models/Developer.model.php';

class DeveloperService {

    private static $instance = null;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function listDevelopers() {
        $developers = array();

        array_push($developers, new Developer(1, "Juan", rand(1, 20)));
        array_push($developers, new Developer(2, "Fiorella", rand(1, 20)));
        array_push($developers, new Developer(3, "Sergio", rand(1, 20)));
        array_push($developers, new Developer(4, "Andrea", rand(1, 20)));
        array_push($developers, new Developer(5, "Belén", rand(1, 20)));
        array_push($developers, new Developer(6, "Giusseppe", rand(1, 20)));
        array_push($developers, new Developer(7, "Tatiana", rand(1, 20)));

        return $developers;
    }
}
