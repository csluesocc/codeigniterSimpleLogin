<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>CI simple login | CSHL</title>
    <!-- styles -->
    <?=$this->load->view('templates/styles.html')?>
    <!-- end styles -->
    <link rel="stylesheet" href="<?=base_url()?>static/css/login.css"/>
  </head>
  <body>
    <div class="container login-form  shadow-z-5">
      <div class="row">
        <div class="col-md-12">
          <form class="form-horizontal">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="example@cshluesocc.org">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-material-indigo btn-raised">Sign in</button>
                <button type="button" class="btn btn-info  btn-raised" data-toggle="modal" data-target="#signup">Sign up</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal" id="signup">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Register new user</h4>
            </div>
            <div class="modal-body">
              <form >
                <div class="form-group">
                  <label for="name" class="control-label">Name:</label>
                  <input type="text" class="form-control" id="name" placeholder="your name">
                </div>
                <div class="form-group">
                  <label for="email" class="control-label">E-mail:</label>
                  <input type="email" class="form-control" id="name" placeholder="example@cshluesocc.org">
                </div>
                <div class="form-group">
                  <label for="password" class="control-label">Password:</label>
                  <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btnSignUp">Submit</button>
            </div>
          </div>
      </div>
    </div>
    
    <!-- scripts -->
    <?=$this->load->view('templates/scrips.html')?>
    <!-- end scripts -->
  </body>
<html>
