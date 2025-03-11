<?php include __DIR__ . '/inc/header.php'; ?>

<section class="section">
  <div class="container">
    <h1 class="title"><?php echo ucfirst($name); ?> SDK</h1>
    <p class="subtitle">The <?php echo ucfirst($name); ?> SDK is managed by the SDK Fabric project.</p>
    <div class="has-text-centered">
      <a href="https://app.typehub.cloud/d/sdkfabric/<?php echo $name; ?>" class="button is-primary">Specification</a>
    </div>
    <table class="mt-6 table table-striped is-fullwidth">
      <colgroup>
        <col width="10%">
        <col width="45%">
        <col width="45%">
      </colgroup>
      <thead>
      <tr>
        <th>Language</th>
        <th>GitHub</th>
        <th>Package</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($project as $lang => $config): ?>
        <tr>
          <td><?php echo $config->langDisplayName; ?></td>
          <td><a href="<?php echo $config->github; ?>"><?php echo $config->github; ?></a></td>
          <td><a href="<?php echo $config->package ?? ''; ?>"><?php echo $config->package ?? ''; ?></a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>

<?php include __DIR__ . '/inc/footer.php'; ?>
