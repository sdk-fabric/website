<?php include __DIR__ . '/inc/header.php'; ?>

<?php
$categories = [];
foreach ($questions as $question) {
    $categories[$question->category][] = $question;
}

$slugify = fn(string $value): string => trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($value)), '-');
?>

<section class="section sf-hero has-text-centered">
  <div class="container">
    <h1 class="title is-2">Frequently asked questions</h1>
    <p class="subtitle is-5 has-text-grey">Everything you need to know about SDK Fabric, how the SDKs are generated and how you can contribute.</p>
  </div>
</section>

<section class="section sf-projects">
  <div class="container">
    <div class="columns">
      <div class="column is-3">
        <nav class="sf-faq-nav">
          <p class="sf-faq-nav-label">Categories</p>
          <?php foreach ($categories as $category => $items): ?>
            <a href="#<?php echo $slugify($category); ?>"><?php echo htmlspecialchars($category); ?></a>
          <?php endforeach; ?>
        </nav>
      </div>
      <div class="column is-9">
        <?php foreach ($categories as $category => $items): ?>
          <div class="sf-faq-group" id="<?php echo $slugify($category); ?>">
            <h2 class="title is-4"><?php echo htmlspecialchars($category); ?></h2>
            <?php foreach ($items as $question): ?>
              <details class="sf-faq-item" id="<?php echo $slugify($question->question); ?>">
                <summary><?php echo htmlspecialchars($question->question); ?></summary>
                <div class="content sf-faq-answer"><?php echo $question->answer; ?></div>
              </details>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<section class="section sf-contribute">
  <div class="container">
    <div class="sf-contribute-box has-text-centered">
      <h2 class="title is-4">Still have questions?</h2>
      <p class="mb-4">Join our community on Discord or get in touch with us directly.</p>
      <div class="buttons is-centered">
        <a class="button is-primary" href="https://discord.gg/eMrMgwsc6e" target="_blank" rel="noopener noreferrer">Join Discord</a>
        <a class="button" href="https://www.apioo.de/en/contact" target="_blank" rel="noopener noreferrer">Contact us</a>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // open the question which is referenced in the url
    const target = window.location.hash ? document.getElementById(window.location.hash.substring(1)) : null;
    if (target && target.tagName === 'DETAILS') {
        target.open = true;
    }
});
</script>

<?php include __DIR__ . '/inc/footer.php'; ?>
