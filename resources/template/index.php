<?php include __DIR__ . '/inc/header.php'; ?>

<h1 class="display-4 mt-5 text-center">Introduction</h1>

<p class="lead text-center mt-5 mb-5">The SDK Fabric project has an ambitious goal to revolutionize the API integration process by providing
  an open infrastructure and no-code way to generate SDKs at scale. Our service uses on the one hand the <a href="https://app.typehub.cloud/d/sdkfabric">TypeHub</a>
  platform, where every API specification is managed and on the other hand the <a href="https://github.com/sdk-fabric">SDK Fabric</a>
  GitHub organization where every SDK repository is placed.</p>

<div class="pt-3 pe-3 text-center">
  <img src="<?php echo $base; ?>/img/sdk/client-typescript.png" width="100">
  <img src="<?php echo $base; ?>/img/sdk/client-java.png" width="100">
  <img src="<?php echo $base; ?>/img/sdk/client-php.png" width="100">
  <img src="<?php echo $base; ?>/img/sdk/client-go.png" width="100">
  <img src="<?php echo $base; ?>/img/sdk/client-csharp.png" width="100">
  <img src="<?php echo $base; ?>/img/sdk/client-python.png" width="100">
</div>

<hr>

<h1 class="display-4 mt-5 mb-5 text-center">SDK</h1>

<p class="lead text-center mt-5 mb-5">
  Our project currently manages the following SDKs.
</p>

<table class="table">
  <thead>
  <colgroup>
    <col width="*">
    <col width="150">
    <col width="150">
    <col width="150">
    <col width="150">
    <col width="150">
    <col width="150">
  </colgroup>
  <tr>
    <th>Name</th>
    <th>C#</th>
    <th>Go</th>
    <th>Java</th>
    <th>Javascript</th>
    <th>PHP</th>
    <th>Python</th>
  </tr>
  </thead>
  <tbody>
  <?php foreach ($projects as $name => $languages): ?>
    <tr>
      <td>
        <h1 class="fs-3">
          <a href="<?php echo $router->getAbsolutePath([\App\Controller\SDK::class, 'show'], ['project' => $name]); ?>" class="p-1"><?php echo $name; ?></a>
        </h1>
      </td>
      <?php foreach ($languages as $lang => $config): ?>
      <td>
        <a href="<?php echo $config->github; ?>" class="p-1"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/></svg></a>
        <?php if (isset($config->package)): ?><a href="<?php echo $config->package; ?>" class="p-1"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box" viewBox="0 0 16 16"><path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/></svg></a><?php endif; ?>
      </td>
      <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<?php include __DIR__ . '/inc/footer.php'; ?>
