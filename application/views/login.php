<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?= base_url('assets/temp/') ?>/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Login - Sneat</title>

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/temp/') ?>/assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="<?= base_url('assets/temp/') ?>/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?= base_url('assets/temp/') ?>/assets/vendor/css/core.css" />
    <link rel="stylesheet" href="<?= base_url('assets/temp/') ?>/assets/vendor/css/theme-default.css" />
    <link rel="stylesheet" href="<?= base_url('assets/temp/') ?>/assets/css/demo.css" />
    <link rel="stylesheet" href="<?= base_url('assets/temp/') ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url('assets/temp/') ?>/assets/vendor/css/pages/page-auth.css" />

    <script src="<?= base_url('assets/temp/') ?>/assets/vendor/js/helpers.js"></script>
    <script src="<?= base_url('assets/temp/') ?>/assets/js/config.js"></script>
  </head>

  <body>
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="<?= base_url() ?>" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <!-- SVG Logo disini -->
                    <svg width="25" viewBox="0 0 25 42" xmlns="http://www.w3.org/2000/svg"></svg>
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder">Sneat</span>
                </a>
              </div>
              <!-- /Logo -->

              <h4 class="mb-2">Welcome! 👋</h4>
              <p class="mb-4">Please sign-in to your account</p>

              <form id="formAuthentication" class="mb-3" action="<?= base_url('auth/login') ?>" method="POST">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Enter your username"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="<?= base_url('auth/forgot_password') ?>">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>

                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error') ?>
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>

              <p class="text-center">
                <span>New on our platform?</span>
                <a href="<?= base_url('auth/register') ?>"><span>Create an account</span></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- JS Core -->
    <script src="<?= base_url('assets/temp/') ?>/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url('assets/temp/') ?>/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url('assets/temp/') ?>/assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url('assets/temp/') ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url('assets/temp/') ?>/assets/vendor/js/menu.js"></script>
    <script src="<?= base_url('assets/temp/') ?>/assets/js/main.js"></script>
  </body>
</html>
