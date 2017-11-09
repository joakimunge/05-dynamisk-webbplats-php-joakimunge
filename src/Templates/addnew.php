<main class="container">
    <section class="content">
        <section class="row align-center">
            <div class="col col-6">
                <h2>Submit new post</h2>
                <span class="divider pink"></span>
                <form method="POST" action="/submit" class="form" enctype="multipart/form-data">

                    <div class="form-item">
                        <label>Title <span class="req">*</span></label>
                        <input type="text" name="title" class="w50">
                    </div>

                    <div class="form-item">
                        <label>Author <span class="req">*</span></label>
                        <input type="text" name="author" class="w50">
                    </div>

                    <div class="form-item">
                        <label>Content <span class="req">*</span></label>
                        <textarea rows="6" name="content"></textarea>
                    </div>

                    <div class="form-item">
                        <label for="file" id="file-btn">Select post image</label>
                        <input type="file" name="image" id="file">
                    </div>

                    <div class="form-item">
                        <button>Submit</button>
                        <button class="button secondary outline">Cancel</button>
                    </div>

                </form>
            </div>
        </section>
    </section>
</main>