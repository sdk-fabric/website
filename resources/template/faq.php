
<?php include __DIR__ . '/inc/header.php'; ?>

<section class="section">
  <div class="container">
    <h1 class="title">FAQ</h1>
  </div>
</section>

<?php foreach($questions as $question): ?>
  <section class="section">
    <div class="container">
      <h2 class="title"><?php echo $question->question; ?></h2>
      <p class="subtitle"><?php echo $question->answer; ?></p>
    </div>
  </section>
<?php endforeach; ?>

<?php include __DIR__ . '/inc/footer.php'; ?>
