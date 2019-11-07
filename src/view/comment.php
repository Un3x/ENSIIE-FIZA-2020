<ul class="feedContainer">
  <?php foreach ($this->data['comments'] as $comment): ?>
  <li class="postContainer">
    <div class="postTitleContainer">
      <img class="userPicture" /> <?= $comment['pseudo'] ?>
    </div>
    <div class="postContentContainer">
      <?= $comment['content'] ?>
    </div>
  </li>
  <?php endforeach; ?>
  
  <li class="postContainer">
      <div class="postContentContainer">
        <form action="addComment" method="post">
            <input type="hidden" name="post_id" value="<?= $this->data['postId'] ?>" />
          <input type="text" name="content" placeholder="ton commentaire" />
          <button type="submit">Commenter</button>
        </form>
      </div>
  </li>
</ul>