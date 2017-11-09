<main class="container">
    <section class="content">
        <section class="row">
            <div class="col col-12 tags">
                <ul class="tags__list">
                    <li><a href="#" class="tags__btn">Web Development</a></li>
                    <li><a href="#" class="tags__btn">CSS</a></li>
                    <li><a href="#" class="tags__btn">PHP</a></li>
                    <li><a href="#" class="tags__btn">Javascript</a></li>
                    <li><a href="#" class="tags__btn">React</a></li>
                    <li><a href="#" class="tags__btn">Angular</a></li>
                    <li><a href="#" class="tags__btn">Frameworks</a></li>
                    <li><a href="#" class="tags__btn">HTML</a></li>
                </ul>
            </div>
        </section>
        <section class="row gutters blog">
            <?php
            
                foreach($params as $post) {
                    include('post_card.php');
                }
            
            ?>
        </section>
    </section>
</main>