<?php

namespace App\Controllers;

class PublicController {
    public function index() {
        function() {
            $posts = [
                ['title' => 'Tiitel', 'body' => 'Kere'],
                ['title' => 'Tiitel', 'body' => 'Kere'],
                ['title' => 'Tiitel', 'body' => 'Kere'],
                ['title' => 'Tiitel', 'body' => 'Kere'],
                ['title' => 'Tiitel', 'body' => 'Kere'],
            ];
            include 'view/index.php';
        };
    }

    public function us() {
        function() {
            $posts = [
                ['title' => 'Tiitel', 'body' => 'Kere'],
                ['title' => 'Tiitel', 'body' => 'Kere'],
                ['title' => 'Tiitel', 'body' => 'Kere'],
                ['title' => 'Tiitel', 'body' => 'Kere'],
                ['title' => 'Tiitel', 'body' => 'Kere'],
            ];
            include 'view/us.php';
        };
    }
}