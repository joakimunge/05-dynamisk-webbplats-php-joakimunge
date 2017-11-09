<main class="container">
    <section class="content">
        <section class="row align-center">
            <div class="col col-6 push-center center">
                <h2>Sign up!</h2>
                <span class="divider pink"></span>
                <form method="POST" action="/register" class="form" enctype="multipart/form-data">

                    <div class="form-item">
                        <label>First name<span class="req">*</span></label>
                        <input type="text" name="firstname" class="w50">
                    </div>

                    <div class="form-item">
                        <label>Last name<span class="req">*</span></label>
                        <input type="text" name="lastname" class="w50">
                    </div>

                    <div class="form-item">
                        <label>E-mail<span class="req">*</span></label>
                        <input type="text" name="email" class="w50">
                    </div>

                    
                    <div class="form-item">
                        <label>Password<span class="req">*</span></label>
                        <input type="text" name="password" class="w50">
                    </div>

                    <div class="form-item">
                        <button type="submit">Submit</button>
                        <button class="button secondary outline">Cancel</button>
                    </div>

                </form>
            </div>
        </section>
    </section>
</main>