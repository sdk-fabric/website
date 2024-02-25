
<?php include __DIR__ . '/inc/header.php'; ?>

<h1 class="display-4 mt-5">FAQ</h1>
<?php foreach($questions as $question): ?>
  <hr>
  <h3><?php echo $question->question; ?></h3>
  <div><?php echo $question->answer; ?></div>
<?php endforeach; ?>

<?php include __DIR__ . '/inc/footer.php'; ?>
