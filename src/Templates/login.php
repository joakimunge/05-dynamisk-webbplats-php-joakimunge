<main class="container">
    <section class="content">
        <section class="row align-center">
            <div class="col col-6 push-center center">
                <article class="center">
                    <h2>Log in!</h2>
                    <span class="divider pink"></span>
                    <form method="POST" action="/submitlogin" class="form" enctype="multipart/form-data">

                        <div class="form-item">
                            <label>E-mail<span class="req">*</span></label>
                            <input type="text" name="email" class="w50">
                        </div>

                        <div class="form-item">
                            <label>Password<span class="req">*</span></label>
                            <input type="password" name="password" class="w50">
                        </div>

                        <div class="form-item">
                            <button type="submit" class="w50">Submit</button>
                        </div>

                    </form>
                </article>
            </div>
        </section>
    </section>
</main>