<div class="container-fluid">
    <img src="img/image1.jpg " style="width:100%">
</div>
<div class="content"></div>
<style>
    body,
    html {
        height: 100%;
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    .bg-image {
        /* Add the blur effect */
        filter: blur(10px);
        -webkit-filter: blur(10px);

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    /* Position text in the middle of the page/image */
    .bg-text {
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/opacity/see-through */
        color: white;
        font-weight: bold;
        border: 1px solid #f1f1f1;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        width: 80%;
        padding: 20px;
        text-align: center;
    }

    body {
        background: #888;
    }

    .form-control::placeholder {
        font-size: 0.95rem;
        color: #aaa;
        font-style: italic;
    }

    .form-control.shadow-0:focus {
        box-shadow: none;
    }

    .kilimanjaro_social_links a {
        border: 1px solid #333;
        border-radius: 6px;
        color: #888;
        display: inline-block;
        font-size: 13px;
        margin-bottom: 3px;
        padding: 7px 12px;
    }
</style>

<div class="bg-image"></div>
<!-- Text on image -->
<div class="bg-text">
    <h2 style="color:white">Welcome to CrossFit's Homepage</h2>
    <h2 style="color:antiquewhite"> Write something Here!!! </h2>
    <a href='index.php?page=register'><input type='button' value='Join Us' class='btn btn-primary '></a>
    <a href='index.php?page=signin'><input type='button' value='Member Space' class='btn btn-primary'></a>
</div>
<!-- Footer -->
<footer class="bg-white">
    <div class="container">
        <div class="row py-4">
            <div class="col-lg-2"><img src="img/logo.jpeg" alt="" width="150" class="mb-3">
                <p class="font-italic text-muted"><b>CrossFit BlaBlaBla</b></p>
            </div>
            <div class="col-lg-3">
                <h5 class="text-uppercase font-weight-bold mb-4">CrossFit</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="#" class="text-muted">Our Team</a></li>
                        <li class="mb-2"><a href="#" class="text-muted">Our Events</a></li>
                        <li class="mb-2"><a href="#" class="text-muted">Our Policy</a></li>
                        <li class="mb-2"><a href="#" class="text-muted">Our Blog</a></li>
                    </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="text-uppercase font-weight-bold mb-4">Quick Contacts</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="#" class="text-muted">+33 669507899</a></li>
                        <li class="mb-2"><a href="https://webmail.polytechnique.fr/" class="text-muted">Email</a></li>
                    </ul>
                    <h5>Social Links</h5>
                    <ul class="kilimanjaro_social_links">
                        <li><a href="https://www.facebook.com/laychiva.chhout.3/"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
                        <li><a href="https://www.instagram.com/x20_crossfit/"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></li>
                    </ul>
            </div>
            <div class="col-lg-4">
                <h5 class="text-uppercase font-weight-bold mb-4">Contact Us</h5>
                <hr>
                <form>
                    <fieldset class="form-group">
                        <label for="InputEmail">Enter your email</label>
                        <input type="email" class="form-control" id="InputEmail" placeholder="Enter email">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="sport_section">Where do you come from?</label>
                        <select class="form-select" id="sport_section">
                            <option>Crossfit</option>
                            <option>Tennis</option>
                            <option>Football</option>
                            <option>Boxing</option>
                            <option>Volleyball</option>
                            <option>Rugby</option>
                            <option>Natation</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="exampleMessage">What is in your mind?</label>
                        <textarea class="form-control" id="exampleMessage" placeholder="Message"></textarea>
                    </fieldset>
                    <fieldset class="form-group text-xs-right">
                        <p></p>
                        <button type="button" class="btn btn-primary">Send</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Copyrights -->
    <div class="bg-light py-4">
        <div class="container text-center">
            <p class="text-muted mb-0 py-2">©CrossFit X2020 All rights reserved.</p>
        </div>
    </div>
</footer>