<main class="container">
    <section class="content">
        <section class="row">
            <div class="col col-12 tags">
                <ul id="tags" class="tags__list">
                    <?php foreach($tags as $tag): ?>
                        <li><a href="<?php echo $tag->getURL();?>" class="tags__btn"><?php echo $tag->getTitle(); ?></a></li>  
                    <?php endforeach; ?>                                  
                </ul>
            </div>
        </section>
        <section class="row gutters blog">
            <?php
                foreach($posts as $post) {
                    include('post_card.php');
                }
            ?>
        </section>
    </section>
</main>