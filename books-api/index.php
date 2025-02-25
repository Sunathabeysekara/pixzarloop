<?php
// index.php

$method = $_SERVER['REQUEST_METHOD'];

$id = isset($request[0]);

switch ($method) {
    case 'GET':
        if ($id) {
            // Get a single book
            $response = $book->getById($id);
        } else {
            // Get all books
            $response = $book->getAll();
        }
        break;

    case 'POST':
        // New book
        $data = json_decode(file_get_contents('php://input'), true);
        $response = ['id' => $book->create($data)];
        break;

    case 'PUT':
        // Update books
        $data = json_decode(file_get_contents('php://input'), true);
        $response = ['updated' => $book->update($id, $data)];
        break;

    case 'DELETE':
        // Delete book
        $response = ['deleted' => $book->delete($id)];
        break;

}

?>