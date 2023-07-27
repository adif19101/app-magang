<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>You're Offline!</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/tabler.min.css') ?>">

    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('favicon-16x16.png') ?>">
  </head>

  <body class="border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
      <div class="container-tight py-4">
        <div class="empty">
          <div class="empty-img">
            <img
              src="<?= base_url('assets/img/undraw_quitting_time_dm8t.svg') ?>"
              height="128"
              alt=""
            />
          </div>
          <p class="empty-title">Uh-oh! It appears that you are currently offline.</p>
          <p class="empty-subtitle text-muted">
            Please check your internet connection and try again later. If the issue persists, feel free to reach out to us when you're back online. Thank you for your understanding!
          </p>
          <div class="empty-action">
            <a onClick="window.location.reload();" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                 </svg>
              Refresh
            </a>
          </div>
        </div>
      </div>
    </div>
    
    <script src="<?= base_url('assets/js/tabler.min.js') ?>"></script>
  </body>

</html>
