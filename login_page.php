<!DOCTYPE html>
<html>
  <head>
    <title> Login page </title>
    <!-- <link href="css/login_page.css" rel="stylesheet" type="text/css" media="all" /> -->
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="login_page.css" rel="stylesheet">
  </head>
  <body>
    <div class="login-page" >
      <div class="form">
        <!-- <form class="register-form" action="samplephp.php" method="post">
          <input type="text" placeholder="name" name="name1" />
          <input type="password" placeholder="password" name="password1" />
          <input type="text" placeholder="email address" name = "email1"/>
          <button>create</button>
          <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form> -->
        <form class="login-form" action = "login_page-backend.php" method="post">
          <input type="text" placeholder="username" name = "name1"/>
          <input type="password" placeholder="password" name = "password1"/>
          <button>login</button>
          <p class="message">Not registered? <a href="front_page.html">Create an account</a></p>
        </form>
      </div>
    </div>
  </body>
</html>



