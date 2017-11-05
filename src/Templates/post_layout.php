<article class="col col-3 blog__post">
    <div class="blog__post-image">
        <a href="/"><img src="./assets/img/blog-test.jpg" alt="" width=100%></a>
    </div>
    <div class="blog__post-content">
        <h4 class="blog__post-title"><?php print_r($params[0]->getTitle()); ?></h4>
        <h5 class="blog__post-author"><?php print_r($params[0]->getAuthor()); ?></h5>
        <p class="blog__post-timestamp"><?php print_r($params[0]->getDate()); ?>7</p>
        <p><?php print_r($params[0]->getContent()); ?></p>
    </div>
</article>