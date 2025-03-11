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

<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="<?php echo $url; ?>"><b>SDK Fabric</b></a>
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="<?php echo $router->getAbsolutePath([\App\Controller\Submit::class, 'show']); ?>">Submit</a>
      <a class="navbar-item" href="<?php echo $router->getAbsolutePath([\App\Controller\Faq::class, 'show']); ?>">FAQ</a>
    </div>
  </div>
</nav>

<section class="section sdk-fabric-header">
  <div class="container">
    <h1 class="title has-text-light">SDK Fabric</h1>
    <p class="subtitle has-text-light">An open infrastructure to automatically generate SDKs.</p>
    <a href="<?php echo $router->getAbsolutePath([\App\Controller\Submit::class, 'show']); ?>" class="button is-primary">Submit</a>
  </div>
</section>
