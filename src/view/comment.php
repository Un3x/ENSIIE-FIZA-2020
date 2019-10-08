<ul class="feedContainer">
  <? foreach ($data as $comment): ?>
  <li class="postContainer">
    <div class="postTitleContainer">
      <img class="userPicture" /> <?= $comment['author'] ?>
    </div>
    <div class="postContentContainer">
      <?= $comment['content'] ?>
    </div>
  </li>
  <?php endforeach; ?>
  
  <li class="postContainer">
      <div class="postContentContainer">
        <form action="">
          <input type="text" placeholder="ton commentaire" />
          <button type="submit">Commenter</button>
        </form>
      </div>
  </li>
</ul>