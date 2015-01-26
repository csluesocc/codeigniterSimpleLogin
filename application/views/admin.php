<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>CI simple login | CSHL</title>
    <!-- styles -->
    <?=$this->load->view('templates/styles.html')?>
    <!-- end styles -->
    <link rel="stylesheet" href="<?=base_url()?>static/css/custom.css"/>
  </head>
  <body>
    <?=$this->load->view('templates/menu')?>

    <div class="container">
      <div class="page-header">
        <h1>Wellcome back user</h1>
      </div>
    </div>

    <?=$this->load->view('templates/footer.html');?>

    <!-- scripts -->
    <?=$this->load->view('templates/scrips.html')?>
    <!-- end scripts -->
  </body>
<html>
