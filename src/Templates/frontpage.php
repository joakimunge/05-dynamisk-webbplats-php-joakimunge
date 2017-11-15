<main class="container">
    <section class="content">
        <section class="row">
            <div class="col col-12 tags">
                <ul id="tags" class="tags__list">
                    <?php foreach($tags as $tag): ?>
                        <li><a href="#"
                                class="tags__btn" 
                                data-id="<?php echo $tag->getId(); ?>"
                                data-name"<?php echo $tag->getTitle(); ?>"><?php echo $tag->getTitle(); ?>
                            </a>
                        </li>  
                    <?php endforeach; ?>                                  
                </ul>
            </div>
        </section>
        <section id="entries" class="row gutters blog">
            <?php
                foreach($posts as $post) {
                    include('post_card.php');
                }
            ?>
        </section>
    </section>
</main>