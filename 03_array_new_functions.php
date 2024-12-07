<?php

$todos = [
    'taylor' => [
        'id' => 1,
        'todo' => 'Buy new book',
        'completedBy' => 'zura'
    ],
    'nuno' => [
        'id' => 2,
        'todo' => 'Send flowers to my wife',
        'completedBy' => 'taylor'
    ],
    'zura' => [
        'id' => 3,
        'todo' => 'Like & Subscribe',
        'completedBy' => 'zura'
    ],
];

$todo = array_find($todos, function ($todo, $key) {
    return $todo['completedBy'] === $key;
});
echo '<pre>';
var_dump($todo);
echo '</pre>';

$index = array_find_key($todos, function ($todo, $key) {
    return $todo['completedBy'] === $key;
});

echo '<pre>';
var_dump($index);
echo '</pre>';

$any = array_any($todos, function ($todo) {
    return str_contains($todo['todo'], 'Buy');
});
echo '<pre>';
var_dump($any);
echo '</pre>';

$all = array_all($todos, function ($todo) {
    return str_contains($todo['todo'], 'a');
});
echo '<pre>';
var_dump($all);
echo '</pre>';