<ul class="feedContainer">
  <?php foreach($data as $post): ?>
  <li class="postContainer">
      <div class="postTitleContainer">
        <img class="userPicture" />
        <?= $post['author'] ?>
      </div>
    <div class="postImgContainer">
      <img src="<?= $post['img']?>">
    </div>
    <div class="postContentContainer">
      <?= $post['content'] ?>  
    </div>
    <div class="postFooterContainer">
      <div class="postLikeContainer">
        <?= $post['likes'] ?>
        <?php if ($post['liked']): ?>
          <i class="red fas fa-heart"></i>
        <?php else: ?>
          <i class="red far fa-heart"></i>
        <?php endif; ?>
      </div>
      <div class="postCommentContainer">
        <a href="comment.php">Comment 
          <i class="far fa-comments"></i>
        </a>
      </div>
      <div class="postLikeContainer">
        <?= $post['date'] ?>
      </div>
    </div>
  </li>
  <?php endforeach; ?>
</ul>