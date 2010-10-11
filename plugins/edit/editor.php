<h1>Editing <?php echo htmlspecialchars($page); ?></h1>

<form action="?edit=1&amp;save=1" method="post">
  <input type="hidden" name="editFile" value="<?php echo htmlspecialchars($page); ?>" />
  <textarea name="editContent" cols="100" rows="20" style="width: 100%;"><?php echo htmlspecialchars($c); ?></textarea><br />
  <input type="submit" value="Save changes" />
</form>