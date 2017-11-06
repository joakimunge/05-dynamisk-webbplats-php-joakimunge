<main class="container">
    <section class="content">
        <section class="row">
            <div class="col col-6">
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
                        <label>Post image</label>
                        <input type="file" name="image">
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