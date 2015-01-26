<!DOCTYPE html>
<html ng-app="loginApp">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>CI simple login | CSHL</title>
    <?php
      /*
        To load views as block templates whe just need to use:
        $this->load->view('your_view')
        Since "$this" is the singleton Codeigniter instance and
        can be used in controllers, models and views also.
      */
    ?>
    <!-- styles -->
    <?=$this->load->view('templates/styles.html')?>
    <!-- end styles -->
    <link rel="stylesheet" href="<?=base_url()?>static/css/login.css"/>
  </head>
  <body>
    <div class="container login-form  shadow-z-5">
      <div class="row">
        <div class="col-md-12">
          <form name="frmlogin" class="form-horizontal" action="admin">
            <!--
              validating form using angular.js
              the submit button is disabled when form is invalid
              see: https://docs.angularjs.org/api/ng/directive/form
              also: https://docs.angularjs.org/api/ng/input/input%5Btext%5D
            -->
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  ng-model="user.email"
                  placeholder="example@cshluesocc.org"
                  ng-required="true"
                  ng-trim="true"/>
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  ng-model="user.password"
                  placeholder="Password"
                  ng-required="true"
                  ng-minlength="6"
                  ng-maxlength="12"/>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button
                  type="submit"
                  class="btn btn-material-indigo btn-raised"
                  ng-disabled="frmlogin.$invalid">Sign in</button>

                <button type="button" class="btn btn-info  btn-raised" data-toggle="modal" data-target="#signup">Sign up</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal" id="signup" ng-controller="signupCtrl">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Register new user</h4>
            </div>
            <div class="modal-body">
              <!--
                validating form using angular.js
                the submit button is disabled when form is invalid
                see: https://docs.angularjs.org/api/ng/directive/form
                also: https://docs.angularjs.org/api/ng/input/input%5Btext%5D
              -->
              <form name="frm">
                <div class="form-group">
                  <label for="name" class="control-label">Name:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    placeholder="your name"
                    ng-required="true"
                    ng-model="new.name"
                    ng-trim="true"/>
                </div>
                <div class="form-group">
                  <label for="email" class="control-label">E-mail:</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="example@cshluesocc.org"
                    ng-required="true"
                    ng-model="new.email"
                    ng-trim="true"/>
                </div>
                <div class="form-group">
                  <label for="password" class="control-label">Password:</label>
                  <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Password"
                    ng-required="true"
                    ng-model="new.password"
                    ng-minlength="6"
                    ng-maxlength="12"/>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button
                type="button"
                class="btn btn-primary"
                id="btnSignUp"
                ng-click="newUser()"
                ng-disabled="frm.$invalid">Submit</button>
            </div>
          </div>
      </div>
    </div>

    <!-- scripts -->
    <?=$this->load->view('templates/scrips.html')?>
    <!-- end scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.10/angular.min.js"/></script>
    <script src="<?=base_url()?>static/js/loginApp.js"/></script>
  </body>
<html>
