<div class="container-fluid">
    <img src="img/image1.jpg " style="width:100%">
    <div class="bg-image"></div>
    <!-- Text on image -->
    <div class="bg-text">
        <h2 style="color:white">Welcome to CrossFit's Homepage</h2>
        <h2 style="color:antiquewhite"> Write something Here!!! </h2>
        <a href='index.php?page=register'><input type='button' value='Join Us' class='btn btn-primary '></a>
        <a href='index.php?page=signin'><input type='button' value='Member Space' class='btn btn-primary'></a>
    </div>
</div>
<!-- End -->
<?php
require('scripts/team.php');
getMenu()
?>
<section class="details-card" id="event">
    <div class="row text-center text-white">
        <div class="col-lg-8 mx-auto">
            <h1 style='color:white'>Our Events</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card-content">
                    <div class="card-img">
                        <img src="https://placeimg.com/380/230/nature" alt="">
                        <span>
                            <h4>heading</h4>
                        </span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                        <a href="#" class="btn-card">Read</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-content">
                    <div class="card-img">
                        <img src="https://placeimg.com/380/230/animals" alt="">
                        <span>
                            <h4>heading2</h4>
                        </span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading2</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                        <a href="#" class="btn-card">Read</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-content">
                    <div class="card-img">
                        <img src="https://placeimg.com/380/230/tech" alt="">
                        <span>
                            <h4>heading3</h4>
                        </span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading3</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                        <a href="#" class="btn-card">Read</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-content">
                    <div class="card-img">
                        <img src="https://placeimg.com/380/230/tech" alt="">
                        <span>
                            <h4>heading3</h4>
                        </span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading3</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                        <a href="#" class="btn-card">Read</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>