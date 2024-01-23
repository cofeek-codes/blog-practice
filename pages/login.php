<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "../components/links.php" ?>
    <title>CofBlog | Войти</title>
</head>

<body class="d-flex flex-column min-vh-100">

    <?php require "../components/header.php" ?>
    <main class="form-signin w-50 m-auto">
        <form>
            <h1 class="h3 mb-3 fw-normal">Войти</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Почта</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Пароль</label>
            </div>

            <div class="form-check text-start my-3">

            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Войти</button>
            <p class="mt-5 mb-3 text-body-secondary">© 2024</p>
        </form>
    </main>
    <?php require "../components/footer.php" ?>

</body>

</html>