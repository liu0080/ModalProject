<?php
function printLoginForm($askedPage)
{
  echo <<<END
    <section>
    <div class="container">
        <br><form action ='index.php?page=$askedPage&todo=login' method='POST'>
            <input class='form-control me-sm-2' type = 'text' placeholder='Login' name='login'>
            <input class='form-control me-sm-2' type = "password" placeholder='Password' name='mdp' id="myInput">
            <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" onclick="myFunction()">
        <label class="form-check-label" for="flexSwitchCheckChecked">Show Password</label>
      </div>
            </br>
            <script>
            function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                  x.type = "text";
                } else {
                  x.type = "password";
                }
            }
            </script>
            <center><button class='btn btn-primary' type='submit'>Sign in</button> you don't have account? <a href="index.php?page=register">Sign up</a></center>
    </div>
    </section>
    END;
}
function printLogoutForm()
{
  echo <<<END
    <div class="nav-item dropdown" style="margin-right : 35px">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: aliceblue">
            Profile <img src="img/png_profile.jpg" style="vertical-align: middle;
            width: 25px;
            height: 20px;
            border-radius: 50%;" ></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="index.php?page=compte">Your account</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?page=info&todo=logout"><input type ='submit' value='Disconnect' class ="btn btn-danger"></a>
          </div>
          </div>
        </div>
        </div>
    END;
}
