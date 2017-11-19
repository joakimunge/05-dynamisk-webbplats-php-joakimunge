<main class="container">
    <section class="content">
        <section class="row align-center">
            <div class="col col-6">
                <h2>Edit post: <?php echo $post[0]['title']; ?></h2>
                <span class="divider pink"></span>
                <form method="POST" action="/submitedit?id=<?php echo $post[0]['id'] ?>" class="form" enctype="multipart/form-data">

                    <div class="form-item">
                        <label>Title <span class="req">*</span></label>
                        <input type="text" name="title" class="w50" value="<?php echo $post[0]['title'] ?>">
                    </div>

                    <div class="form-item">
                        <label>Content <span class="req">*</span></label>
                        <textarea rows="6" name="content"><?php echo $post[0]['content'] ?></textarea>
                    </div>

                    <div class="form-item">
                        <label>Tags <span class="req">*</span></label>
                        <select name="tag">
                            <option value="1">webdev</option>
                            <option value="3">javascript</option>
                            <option value="2">php</option>
                            <option value="4">css</option>
                            <option value="5">html</option>
                            <option value="6">angular</option>
                            <option value="7">react</option>
                            <option value="8">frameworks</option>
                            <option value="9">jquery</option>
                            <option value="10">general</option>
                            <option value="11">life outside coding</option>                            
                        </select>
                    </div>

                    <div>
                        <img src="<?php echo $post[0]['image']; ?>" alt="Post thumbnail" class="thumbnail">
                    </div>

                    <div class="form-item">
                        <label for="file" id="file-btn">Select new image</label>
                        <input type="file" name="image" id="file">
                    </div>

                    <div class="form-item">
                        <button>Update</button>
                        <button class="button secondary outline">Delete post</button>
                    </div>

                </form>
            </div>
        </section>
    </section>
</main>