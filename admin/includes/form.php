<?php if (!empty($article->errors)): ?>

<?php foreach ($article->errors as $error): ?>
    <p>
        <?= $error ?>
    </p>
<?php endforeach ?>
<?php endif ?>



<div class="container d-flex flex-column justify-content-center align-items-center">
<form method="post">
  <div class="mb-3">
    <label for="title" class="form-label">Tytuł:</label>
    <input type="text" name="title" id="title" placeholder="wprowadź tytuł" value="<?= htmlspecialchars($article->title) ?>"  class="form-control"  aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Tytuł nie może przekraczać 250 znaków.</div>
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Treść:</label>
    <textarea name='content' id='content' class="form-control" rows="10" cols='100' placeholder="wprowadź treść"><?= htmlspecialchars($article->content) ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Edytuj</button>
</form>
</div>