<article class="col col-4 blog__post animate__fadein">
    <div class="blog__post-image">
        <a href="<?php echo $post->getURL(); ?>">
            <img src=".<?php echo $post->getImagePath(); ?>" alt="blog-post-image" width=100%>
        </a>
    </div>
    <div class="blog__post-content">
        <h4 class="blog__post-title">
            <?php echo $post->getTitle(); ?>
        </h4>
        <h5 class="blog__post-author">
            by <?php echo $post->getAuthor(); ?>
        </h5>
        <p class="blog__post-timestamp">
            <?php echo $post->getDate(); ?>
        </p>
        <p>
            <?php echo $post->getContent(); ?>
        </p>

        <?php if(isset($_SESSION['id']) && $_SESSION['admin'] === '1'): ?>
            <span class="blog__icon blog__icon-edit">
                <a href="/edit?id=<?php echo $post->getId(); ?>">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            </span>
        <?php endif; ?>

        <?php if (isset($_SESSION['id'])) : ?>
            <span class="blog__icon blog__icon-fav <?php echo $post->getFavStatus(); ?>" onclick="toggleFav(<?php echo $post->getId(); ?>)" data-id="c<?php echo $post->getId(); ?>">
                <i class="fa fa-star" aria-hidden="true"></i>
            </span>
        <?php endif ?>
    </div>
</article>