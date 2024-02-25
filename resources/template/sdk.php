<?php include __DIR__ . '/inc/header.php'; ?>

<h1 class="display-4 mt-5 mb-3 text-center"><?php echo ucfirst($name); ?> SDK</h1>

<div class="text-center">
  <p class="lead">The <?php echo ucfirst($name); ?> SDK is managed by the SDK Fabric project.</p>
  <a href="https://app.typehub.cloud/d/sdkfabric/<?php echo $name; ?>" class="btn btn-lg btn-primary mt-4">Specification</a>
</div>

<table class="table mt-5">
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

<?php include __DIR__ . '/inc/footer.php'; ?>
