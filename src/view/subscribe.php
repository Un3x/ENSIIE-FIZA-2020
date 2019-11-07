<?php
$user = isset($this->data['user']) ? $this->data['user'] : null;
$errors = isset($this->data['errors']) ? $this->data['errors'] : null;
?>

<div class="contentContainer">
  <img src="index.png">
</div>
<div class="contentContainer">
  <div class="loginContainer">
    <div>
      <form method="post" action="adduser">
        <div class="formElementContainer">
            <label>Email</label>
            <input name="email" type="text" value="<?= $user ? $user['email'] : '' ?>" placeholder="votre email là" />
            <?php if($errors && $errors['email']): ?>
                <?php foreach($errors['email'] as $error): ?>
                    <p class="error"><?= $error ?></p>
                <?php endforeach;?>
            <?php endif;?>
        </div>
        <div class="formElementContainer">
          <label>Pseudo</label>
          <input name="pseudo" type="text" value="<?= $user ? $user['pseudo'] : '' ?>" placeholder="votre pseudo ici" />
            <?php if($errors && $errors['pseudo']): ?>
                <?php foreach($errors['pseudo'] as $error): ?>
                    <p class="error"><?= $error ?></p>
                <?php endforeach;?>
            <?php endif;?>
        </div>
        <div class="formElementContainer">
          <label>Mot de passe</label>
          <input name="password" type="password" />
            <?php if($errors && $errors['password']): ?>
                <?php foreach($errors['password'] as $error): ?>
                    <p class="error"><?= $error ?></p>
                <?php endforeach;?>
            <?php endif;?>
        </div>
        <div class="formElementContainer">
            <label>Confirmez votre mot de passe</label>
            <input name="password_check" type="password" />
            <?php if($errors && $errors['password_check']): ?>
                <?php foreach($errors['password_check'] as $error): ?>
                    <p class="error"><?= $error ?></p>
                <?php endforeach;?>
            <?php endif;?>
          </div>
        <div class="formElementContainer">
          <button type="submit">Inscription</button>
        </div>
      </form>
    </div>
  </div>
</div>