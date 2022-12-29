<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
  <meta charset="utf-8" />
  <title>Fastlanemall</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta content="Special application for distribute your business" name="description" />
  <meta content="are.vie18@gmail.com" name="author" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/'); ?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/'); ?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/'); ?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/'); ?>global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/'); ?>global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/'); ?>global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/'); ?>global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
  <link href="<?php echo base_url('assets/'); ?>global/css/plugins.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/'); ?>pages/css/login.min.css" rel="stylesheet" type="text/css" />

  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('logo/pavicon.png'); ?>">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('logo/pavicon.png'); ?>">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('logo/pavicon.png'); ?>">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('logo/pavicon.png'); ?>">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('logo/pavicon.png'); ?>">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('logo/pavicon.png'); ?>">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('logo/pavicon.png'); ?>">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('logo/pavicon.png'); ?>">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('logo/pavicon.png'); ?>">
  <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('logo/pavicon.png'); ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('logo/pavicon.png'); ?>">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('logo/pavicon.png'); ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('logo/pavicon.png'); ?>">
  <link rel="manifest" href="<?php echo base_url('assets/logo'); ?>/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php echo base_url('logo/pavicon.png'); ?>">
  <meta name="theme-color" content="#ffffff">
</head>

<body class=" login">
  <div class="logo">
    <img src="<?php echo base_url('logo/pavicon.png'); ?>" alt="Logo">
  </div>
  <div class="content">

    <?php echo $contents; ?>

  </div>
  <div class="copyright">
    <?php echo date('Y') ?> &copy;
    <a href=<?php echo base_url(); ?>>Fastlanemall</a>
    <br>Developed by
    <a href="https://www.ejoesolutions.com/" target="blank">ejoeSolutions</a>
  </div>
  <!--[if lt IE 9]>
  <script src="<?php echo base_url('assets/'); ?>global/plugins/respond.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>global/plugins/excanvas.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>global/plugins/ie8.fix.min.js"></script>
  <![endif]-->
  <script src="<?php echo base_url('assets/'); ?>global/plugins/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/'); ?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/'); ?>global/plugins/js.cookie.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/'); ?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/'); ?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/'); ?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/'); ?>global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/'); ?>global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/'); ?>global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/'); ?>global/scripts/app.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/'); ?>pages/scripts/login.min.js" type="text/javascript"></script>
  <script>
  $(document).ready(function()
  {
    $('#clickmewow').click(function()
    {
      $('#radio1003').attr('checked', 'checked');
    });
  })
  </script>
</body>

</html>
