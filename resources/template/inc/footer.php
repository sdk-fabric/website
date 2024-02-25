</div>

<footer class="bd-footer py-4 py-md-5 mt-5 bg-dark text-light">
  <div class="container mt-4">
    <div class="row">
      <div class="col-6 col-lg-2 offset-lg-1 mb-3">
        <p class="font-weight-bold">Links</p>
        <ul class="list-unstyled text-small">
          <li class="mb-2"><a href="<?php echo $router->getAbsolutePath([\App\Controller\Index::class, 'show']); ?>" class="text-white">Home</a></li>
          <li class="mb-2"><a href="<?php echo $router->getAbsolutePath([\App\Controller\Faq::class, 'show']); ?>" class="text-white">FAQ</a></li>
          <li class="mb-2"><a href="<?php echo $router->getAbsolutePath([\App\Controller\Submit::class, 'show']); ?>" class="text-white">Submit</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 offset-lg-1 mb-3">
        <p class="font-weight-bold">External</p>
        <ul class="list-unstyled text-small">
          <li class="mb-2"><a href="https://typehub.cloud/" class="text-white">TypeHub</a></li>
          <li class="mb-2"><a href="https://typeschema.org/" class="text-white">TypeSchema</a></li>
          <li class="mb-2"><a href="https://typeapi.org/" class="text-white">TypeAPI</a></li>
          <li class="mb-2"><a href="https://sdkgen.app/" class="text-white">SDKgen</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 offset-lg-1 mb-3">
        <p class="font-weight-bold">API</p>
        <ul class="list-unstyled text-small">
          <li class="mb-2"><a href="<?php echo $base; ?>/projects.json" class="text-white">Projects</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 offset-lg-1 mb-3">
        <p class="font-weight-bold">Contact</p>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="https://discord.gg/eMrMgwsc6e" class="text-white">Discord</a></li>
          <li class="mb-2"><a href="https://www.apioo.de/en/contact" class="text-white">Contact</a></li>
          <li class="mb-2"><a href="https://www.apioo.de/en/imprint" class="text-white">Imprint</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

</body>
</html>
