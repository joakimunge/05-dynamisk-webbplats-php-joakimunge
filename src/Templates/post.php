<main class="container">
    <section class="row align-center">
        <div class="col col-12 post__hero" style="background-image: url('/assets/img/default_thumb.jpg')"></div>
    </section>
    <section class="content">
        <section class="row gutters blog align-center">
            <article class="col col-8">
                <div class="blog__post-content">
                    <h1><?php echo $post->getTitle(); ?></h1>
                    <h4 class="pink-text"><?php echo $post->getAuthor(); ?></h4>
                    <p class="blog__post-timestamp"><?php echo $post->getDate(); ?></p>
                    <p><?php echo $post->getContent(); ?></p>                    
                </div>
            </article>
        </section>
    </section>
</main>