<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $data = json_decode(file_get_contents('data.json'), true);
    
    $task = null;
    foreach ($data as $item) {
        if ($item['data']['id'] == $id) { 
            $task = $item;
            break;
        }
    }

    if ($task) {
        $response = [
            'id' => $task['data']['id'],
            'name' => $task['data']['attributes']['name'],
            'status' => $task['data']['attributes']['status'],
            'startDate' => $task['data']['attributes']['start-time'],
            'endDate' => $task['data']['attributes']['end-time'],
            'description' => $task['data']['attributes']['description'],
            'responsible' => $task['data']['relationships']['responsible']['data']['name'],
            'initiator' => $task['data']['relationships']['initiator']['data']['name'],
            'performers' => array_map(function($performer) {
                return ['name' => $performer['name'], 'role' => $performer['role']];
            }, $task['data']['relationships']['performers']['data']),
            'products' => array_map(function($product) {
                return $product['name'];
            }, $task['data']['relationships']['products']['data'])
        ];
        echo json_encode($response);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Task not found']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}


