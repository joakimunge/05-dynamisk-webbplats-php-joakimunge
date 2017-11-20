<?php 

namespace Blog\Controllers;
use Blog\Controllers\AbstractController;
use Blog\Core\Database;
use Blog\Models\Blogpost;

class PostController extends AbstractController
{

    public function postView()
    {
        $db = new Database();
        $id = $this->request->getQueryString('id');
        $entries = $db->query('SELECT (title), (content), (author), (date), (image), (id) FROM entries WHERE id = ? LIMIT 1', [$id]);
        $posts = [];
        foreach ($entries as $entry) {
            $modal = new Blogpost($entry['title'], $entry['content'], $entry['author'], $entry['date'], $entry['image'], $entry['id']);
            $posts[] = $modal;
        }
        $this->render('post', $posts);
    }

    public function editPost() {
        if (!$this->isAuthed()) {
            $this->redirect('/login');
        }

        $db = new Database();
        $id = $this->request->getQueryString('id');
        $post = $db->query('SELECT * FROM entries WHERE id = ?', [$id]);

        var_dump($post[0]['author_id']);

        if (!$this->isOwner($post[0]['author_id'])) {
            $this->redirect('/post?id=' . $id);
        }

        $data = ['post' => $post];

        $this->render('edit', $data);      
    }

    public function submitEdit() {
        $db = new Database();
        $db->query('UPDATE entries SET title=?, content=? WHERE id=?', [
            $this->request->getPostValue('title'),
            $this->request->getPostValue('content'),
            $this->request->getQueryString('id')
        ]);
        $this->redirect('/');
    }

    public function deletePost() {
        $db = new Database();
        $id = $this->request->getQueryString('id');
        $db->query('DELETE FROM entries WHERE id=?', [$id]);
        $this->redirect('/');

    }

}

?>