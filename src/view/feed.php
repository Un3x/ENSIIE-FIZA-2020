<ul class="feedContainer">
    <li class="postcontainer">
        <form action="addPost" method="post">
            <div>
                <label>Picture URL</label>
                <input type="text" name="picture_url" placeholder="insert picture url"/>
            </div>
            <div>
                <label>content</label>
                <input type="textarea" name="content" placeholder="insert content "/>
            </div>
            <div>
                <button type="submit">Add Post </button>
            </div>
        </form>
    </li>
  <?php foreach($this->data as $post): ?>
  <li class="postContainer">
      <div class="postTitleContainer">
        <img class="userPicture" />
        <?= $post['pseudo'] ?>
      </div>
    <div class="postImgContainer">
      <img src="<?= $post['img_url']?>">
    </div>
    <div class="postContentContainer">
      <?= $post['content'] ?>  
    </div>
    <div class="postFooterContainer">
      <div class="postLikeContainer">
        <span id="post-like-<?= $post['id']?>"><?= $post['likes'] ?></span>
        <?php if ($post['liked']): ?>
          <i class="red fas fa-heart" onclick="likePost(this, <?= $post['id'] ?>)"></i>
        <?php else: ?>
          <i class="red far fa-heart" onclick="likePost(this, <?= $post['id'] ?>)"></i>
        <?php endif; ?>
      </div>
      <div class="postCommentContainer">
        <a href="<?= 'comment?postId=' . $post['id'] ?>">Comment
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

<script type="text/javascript">
    var httpRequest;
    function likePost(element, postId) {
        httpRequest = new XMLHttpRequest();
        if (isLiked(element)) {
            httpRequest.onreadystatechange = handleLikeResponse(element, postId);
            httpRequest.open("POST", "/unlikePost", true);
            httpRequest.send(JSON.stringify({postId: postId}));
        } else {
            httpRequest.onreadystatechange = handleUnLikeResponse(element, postId);
            httpRequest.open("POST", "/likePost", true);
            httpRequest.send(JSON.stringify({postId: postId}));

        }
    }

    function handleLikeResponse(element, postId) {
        return function () {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (JSON.parse(httpRequest.response).success) {
                    var nbLikeElement = document.getElementById('post-like-' + postId);
                    nbLikeElement.innerHTML = parseInt(nbLikeElement.innerHTML, 10) - 1;
                    element.classList.remove('fas');
                    element.classList.add('far');
                }
            }
        }
    }

    function handleUnLikeResponse(element, postId) {
        return function () {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (JSON.parse(httpRequest.response).success) {
                    var nbLikeElement = document.getElementById('post-like-' + postId);
                    nbLikeElement.innerHTML = parseInt(nbLikeElement.innerHTML, 10) + 1;
                    element.classList.remove('far');
                    element.classList.add('fas');
                }
            }
        }
    }

    function isLiked(element) {
        return element.classList.contains('fas');
    }

</script>