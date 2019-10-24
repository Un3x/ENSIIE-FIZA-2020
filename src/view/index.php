<?php
    $user = isset($data['user']) ? $data['user'] : null;
    $errors = isset($data['errors']) ? $data['errors'] : null;
?>

<div class="contentContainer">
  <img src="index.png">
</div>
<div class="contentContainer">
  <div class="loginContainer">
    <div>
      <form method="post" action="connect">
        <div class="formElementContainer">
          <label>Pseudo</label>
          <input type="text" name="pseudo" value="<?= $user ? $user['pseudo'] : '' ?>" placeholder="votre peusdo ici" />
            <?php if($errors && $errors['pseudo']): ?>
                <?php foreach($errors['pseudo'] as $error): ?>
                    <p class="error"><?= $error ?></p>
                <?php endforeach;?>
            <?php endif;?>
        </div>
        <div class="formElementContainer">
          <label>Password</label>
          <input type="password" name="password"/>
            <?php if($errors && $errors['password']): ?>
                <?php foreach($errors['password'] as $error): ?>
                    <p class="error"><?= $error ?></p>
                <?php endforeach;?>
            <?php endif;?>
        </div>
          <?php if($errors && $errors['authentication']): ?>
              <?php foreach($errors['authentication'] as $error): ?>
                  <p class="error"><?= $error ?></p>
              <?php endforeach;?>
          <?php endif;?>
        <div class="formElementContainer">
          <button type="submit">Se connecter</button>
        </div>
      </form>
      Vous n'avez pas de compte ?
      <a href="subscribe">inscrivez vous</a>
    </div>
  </div>
</div>