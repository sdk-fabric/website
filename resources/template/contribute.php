<?php include __DIR__ . '/inc/header.php'; ?>

<section class="section">
  <div class="container">
    <h1 class="title">Contribute</h1>
    <p class="subtitle">This page provides a step by step guide how to submit a change to an SDK. This is needed in case an
      operation or type is missing at an SDK. While the SDK is targeted at developers this step involves no-code so in general every user
      should be able to adjust an SDK.</p>
    <div class="content">
      <ul>
        <li>
          <p><b>Find the TypeHub specification</b></p>
          <p>All specifications are managed at <a href="https://typehub.cloud/">TypeHub</a> under the <a href="https://app.typehub.cloud/d/sdkfabric">SdkFabric</a>
            account. In this first step you need to find the fitting specification and login to the TypeHub platform.</p>
        </li>
        <li>
          <p><b>Create a fork</b></p>
          <p>To change an existing specification you need to create a fork of the existing specification to your account. Go to the specification
            and use the "Fork" button at the right top to create an fork of this specification.</p>
          <img src="<?php echo $base; ?>/img/contribute/create_fork.png" class="img-fluid">
        </li>
        <li>
          <p><b>Adjust the specification</b></p>
          <img src="<?php echo $base; ?>/img/contribute/fork_success.png" class="img-fluid">
          <p>If the fork was successful you are redirect to your forked specification where you can directly start to modify the specification.</p>
        </li>
        <li>
          <p><b>Create a pull request</b></p>
          <p>If you have adjusted the specification you can create a pull request to merge those changes back to the origin specification. Therefor use the "Pull Request" button,
            to create a pull request at the upstream specification.</p>
          <img src="<?php echo $base; ?>/img/contribute/create_pull_request.png" class="img-fluid">
        </li>
        <li>
          <p><b>Done</b></p>
          <img src="<?php echo $base; ?>/img/contribute/pull_request_success.png" class="img-fluid">
          <p>You have now successfully suggested a change to an existing SDK specification. We will try to review the pull request as soon as possible and merge it if everything looks fine.
            At the pull request you can also see all changes s.</p>
          <img src="<?php echo $base; ?>/img/contribute/pull_request_detail.png" class="img-fluid">
          <p>If the pull request is merged our code generator automatically updates all SDKs.</p>
        </li>
      </ul>
    </div>
  </div>
</section>

<?php include __DIR__ . '/inc/footer.php'; ?>
