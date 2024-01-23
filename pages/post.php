<?php require "../components/links.php"; ?>
<?php require "../components/header.php"; ?>

<?php
$conn = new mysqli("localhost", "root", "", "kormyshevblog");
$get_posts_query = "SELECT * FROM `posts` WHERE id = " . htmlspecialchars($_GET['id']);
$posts_fetch_res = $conn->query($get_posts_query);
$post = $posts_fetch_res->fetch_assoc();

$get_author_query  =
    "SELECT * FROM `users` WHERE id = " . htmlspecialchars($post['id_user']);
$author_fetch_res = $conn->query($get_author_query);
$author = $author_fetch_res->fetch_assoc();
?>

<!--Main layout-->
<main>
    <div class="container">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-md-8 mb-4">
                <!--Section: Post data-mdb-->
                <section class="border-bottom mb-4">
                    <img src="../uploads/posts/<?php echo $post['thumbnailUrl'] ?>" class="img-fluid shadow-2-strong rounded mb-4" alt="" />

                    <div class="row align-items-center mb-4">
                        <div class="col-lg-6 text-center text-lg-start mb-3 m-lg-0">
                            <img src="../assets/img/avatar.png" class="rounded shadow-1-strong me-2" height="100" width="100" alt="" loading="lazy" />
                            <span> Published <u>15.07.2020</u> by</span>
                            <a href="" class="text-dark"><?php echo $author['name']; ?></a>
                        </div>


                    </div>
                </section>
                <!--Section: Post data-mdb-->

                <!--Section: Text-->
                <section>
                    <p>
                        <?php echo $post['content'] ?>
                    </p>


                </section>
                <!--Section: Text-->



                <!--Section: Author-->
                <section class="border-bottom border-top mt-4 pt-4 mb-4 pb-4">
                    <div class="row">
                        <div class="col-3">
                            <img src="../assets/img/avatar.png" class="img-fluid shadow-1-strong rounded" alt="" />
                        </div>

                        <div class="col-9">
                            <p class="mb-2"><strong><?php echo $author['name']; ?></strong></p>

                        </div>
                    </div>
                </section>
                <!--Section: Author-->

                <!--Section: Comments-->
                <section class="border-bottom mb-3">
                    <?php
                    $conn = new mysqli("localhost", "root", "", "kormyshevblog");
                    $get_comments_query = "SELECT * FROM `comments` WHERE post_id = " . $_GET['id'];
                    $comments_res = $conn->query($get_comments_query);
                    $comments_count = sizeof($comments_res->fetch_all());
                    ?>
                    <p class="text-center"><strong>Комментарии: <?php echo $comments_count; ?></strong></p>

                    <!-- Comment -->
                    <?php $conn = new mysqli("localhost", "root", "", "kormyshevblog");
                    $get_comments_query = "SELECT * FROM `comments` WHERE post_id = " . $_GET['id'];
                    $comments_res = $conn->query($get_comments_query);
                    while ($comment = $comments_res->fetch_assoc()) :
                        $comment_autor_query = $conn->query("SELECT * FROM `users` WHERE id = " . $comment['user_id']);
                        $comment_author = $comment_autor_query->fetch_assoc();
                    ?>
                        <div class="row mb-4">
                            <div class="col-2">
                                <img src="../assets/img/avatar.png" class="img-fluid shadow-1-strong rounded" alt="" />
                            </div>

                            <div class="col-10">
                                <p class="mb-2"><strong><?php echo $comment_author['name'] ?></strong></p>
                                <p>
                                    <?php echo $comment['text']; ?>
                                </p>
                            </div>
                        </div>


                    <?php endwhile; ?>

                </section>
                <!--Section: Comments-->

                <!--Section: Reply-->
                <section>
                    <p class="text-center"><strong>Оставьте комментарий</strong></p>

                    <form>

                        <!-- Message input -->
                        <div class="form-outline mb-4" data-mdb-input-init>
                            <textarea class="form-control" id="form4Example3" rows="4"></textarea>
                            <label class="form-label" for="form4Example3">Коммент</label>
                        </div>



                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4" data-mdb-ripple-init>
                            Отправить
                        </button>
                    </form>
                </section>
                <!--Section: Reply-->
            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->
    </div>
</main>
<!--Main layout-->

<?php require "../components/footer.php"; ?>