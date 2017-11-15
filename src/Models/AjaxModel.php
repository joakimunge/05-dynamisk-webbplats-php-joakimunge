<?php 

use Blog\Core\Database;

// namespace Blog\Models;
// use Blog\Core\Database;

// class AjaxModel {

//     public function getPostsByTags(int $tag) {
//         $db = new Database();

//         $entries = $db->query('SELECT * FROM entry_tag WHERE tag_id = ?', [$tag]);

//         foreach ($entries as $entry) {
//             $post = new Blogpost($entry['title'], $entry['content'], $entry['author'], $entry['date'], $entry['image'], $entry['id']);
//             $posts[] = $post;
//         }

//         $data = [
//             'posts' => $posts
//         ];

//     }

// }

$db = new Database();

$tag = $_POST['tag_id'];
$entries = $db->query('SELECT * FROM entry_tag WHERE tag_id = ?', [$tag]);

foreach ($entries as $entry) {
    $post = new Blogpost($entry['title'], $entry['content'], $entry['author'], $entry['date'], $entry['image'], $entry['id']);
    $posts[] = $post;
}

$data = [
    'posts' => $posts
];



?>