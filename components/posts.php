<div class="album py-5 bg-body-tertiary">
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      <?php
      $conn = new mysqli("localhost", "root", "", "kormyshevblog");
      $get_posts_query = "SELECT * FROM `posts`";
      $posts_fetch_res = $conn->query($get_posts_query);

      while ($post = $posts_fetch_res->fetch_assoc()) :
      ?>

        <div class="col">
          <div class="card shadow-sm">
            <img src="../uploads/posts/<?php echo $post['thumbnailUrl']; ?>" width="420" height="225" alt="">
            <div class="card-body">
              <h3 class="card-title"><?php echo $post['title']; ?></h3>
              <p class="card-text"><?php echo mb_strimwidth($post['content'], 0, 150, "..."); ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="../pages/post.php?id=<?php echo $post['id']; ?>">
                    <button type="button" class="btn btn-sm btn-outline-primary">Читать</button>
                  </a>

                </div>
                <small class="text-body-secondary"><?php echo round(strlen($post['content']) / 256) ?> мин</small>
              </div>
            </div>
          </div>
        </div>

      <?php endwhile; ?>








    </div>
  </div>
</div>