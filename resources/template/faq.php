
<?php include __DIR__ . '/inc/header.php'; ?>

<h1 class="display-4 mt-5 mb-3 text-center">FAQ</h1>

<ul class="lead">
  <?php foreach($questions as $question): ?>
  <li>
    <p><b><?php echo $question->question; ?></b></p>
    <div><?php echo $question->answer; ?></div>
  </li>
  <?php endforeach; ?>
</ul>

<?php include __DIR__ . '/inc/footer.php'; ?>
