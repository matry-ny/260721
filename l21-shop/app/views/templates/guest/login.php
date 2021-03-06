<main class="form-signin">
    <form method="post">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating mb-3">
            <input type="email"
                   class="form-control"
                   id="floatingInput"
                   name="login"
                   placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password"
                   class="form-control"
                   id="floatingPassword"
                   name="password"
                   placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021–<?= date('Y') ?></p>
    </form>
</main>