<main class="container">
    <section class="content">
        <section class="row">
            <div class="col col-12 tags">
                <ul id="tags" class="tags__list">
                    <li><a href="#" class="tags__btn" data-value="webdev">Web Development</a></li>
                    <li><a href="#" class="tags__btn" data-value="css">CSS</a></li>
                    <li><a href="#" class="tags__btn" data-value="php">PHP</a></li>
                    <li><a href="#" class="tags__btn" data-value="javascript">Javascript</a></li>
                    <li><a href="#" class="tags__btn" data-value="react">React</a></li>
                    <li><a href="#" class="tags__btn" data-value="angular">Angular</a></li>
                    <li><a href="#" class="tags__btn" data-value="frameworks">Frameworks</a></li>
                    <li><a href="#" class="tags__btn" data-value="html">HTML</a></li>
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