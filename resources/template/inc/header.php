<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="SDK Fabric provides an open infrastructure to automatically generate SDKs for every API.">
  <meta name="keywords" content="SDK Generator, Client Generator, API Generator, OpenAPI Generator, Model Generator, Code Generator">
  <title><?php echo $title ?? 'Generate open SDKs at scale | SDK Fabric'; ?></title>
  <link rel="preload" href="<?php echo $base; ?>/css/app.min.css" as="style" />
  <link rel="preload" href="<?php echo $base; ?>/js/app.min.js" as="script" />
  <link rel="stylesheet" href="<?php echo $base; ?>/css/app.min.css">
  <link rel="canonical" href="<?php echo $router->getUrl($method, (array) ($urlParameters ?? [])); ?>">
  <link rel="icon" type="image/png" href="<?php echo $base; ?>/img/logo/logo_white.png">
  <script async src="<?php echo $base; ?>/js/app.min.js"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-SQTPSTZJ4S"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-SQTPSTZJ4S', { 'anonymize_ip': true });
  </script>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo $url; ?>"><img src="<?php echo $base; ?>/img/logo/logo_black.png" width="32" height="32" alt="SDKgen logo"> SDK Fabric</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $router->getAbsolutePath([\App\Controller\Contribute::class, 'show']); ?>">Contribute</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $router->getAbsolutePath([\App\Controller\Submit::class, 'show']); ?>">Submit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $router->getAbsolutePath([\App\Controller\Faq::class, 'show']); ?>">FAQ</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="p-5 text-center" style="background:url('<?php echo $base; ?>/img/header_bg.jpg');background-size:cover;background-repeat:no-repeat;background-position:top center;background-color:#222;">
  <img src="<?php echo $base; ?>/img/logo/logo_white.png" height="150">
  <p class="text-white lead mt-4 mb-4">
    SDK Fabric provides an open infrastructure to automatically generate SDKs for every API.
  </p>
</div>


<div class="container">

