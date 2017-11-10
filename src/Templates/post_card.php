<article class="col col-4 blog__post">
    <div class="blog__post-image">
        <a href="<?php echo $post->getURL(); ?>"><img src="<?php echo $post->getImagePath(); ?>" alt="blog-post-image" width=100%></a>
    </div>
    <div class="blog__post-content">
        <h4 class="blog__post-title"><?php echo $post->getTitle(); ?></h4>
        <h5 class="blog__post-author"><?php echo $post->getAuthor(); ?></h5>
        <p class="blog__post-timestamp"><?php echo $post->getDate(); ?></p>
        <p><?php echo $post->getContent(); ?></p>
    </div>
</article>