<main class="container">
    <section class="row align-center">
        <div class="col col-12 post__hero" style="background-image: url(<?php echo $params[0]->getImagePath(); ?>"></div>
    </section>
    <section class="content">
        <section class="row gutters blog align-center">
            <article class="col col-8">
                <div class="blog__post-content">
                    <h1><?php echo $params[0]->getTitle(); ?></h1>
                    <h4 class="pink-text"><?php echo $params[0]->getAuthor(); ?></h4>
                    <p class="blog__post-timestamp"><?php echo $params[0]->getDate(); ?></p>
                    <p><?php echo $params[0]->getContent(); ?></p>                    
                </div>
            </article>
        </section>
    </section>
</main>