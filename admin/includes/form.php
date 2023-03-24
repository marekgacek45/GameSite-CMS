

<?php $errors = $article->errors ?>



<div class="container d-flex flex-column justify-content-center align-items-center">
<form method="post" id='article'>
  <div class="mb-3">
    <label for="title" class="form-label">Tytuł:</label>
    <input type="text" name="title" id="title" placeholder="wprowadź tytuł" value="<?= htmlspecialchars($article->title) ?>"  class="form-control"  aria-describedby="tittleHelp">
    <?php if(in_array('wprowadź tytuł',$errors)):?>
      <div id="tittleHelp" class="form-text" style="color:red;margin-left:.3em">Wprowadź tytuł</div>
    <?php endif ?>
    
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Treść:</label>
    <textarea name='content' id='content' class="form-control" rows="10" cols='100' placeholder="wprowadź treść" aria-describedby="contentHelp"><?= htmlspecialchars($article->content) ?></textarea>
    <?php if(in_array('wprowadź treść',$errors)):?>
      <div id="contentHelp" class="form-text" style="color:red;margin-left:.3em">Wprowadź treść</div>
    <?php endif ?>
    </div>
  <!-- <button type="submit" class="btn btn-primary">Edytuj</button> -->
 
</form>

</div>