<?php
    include('includes/header.php');
    include('includes/db.php');
    require_once('./function/function.php');
?>
<div class="elfsight-app-c22e0596-753c-4820-8f4d-5ed04d002ce7"></div>
<div id="carouselExampleCaptions" class="carousel slide container" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
        <a href="formal_trouser.php">
          <img src="images/trouser slide.png" class="d-block w-100" alt="...">
        </a>
      <div class="carousel-caption d-none d-md-block">
        
      </div>
    </div>
    <div class="carousel-item">
        <a href="formal_shirts.php">
          <img src="images/shirt slide.png" class="d-block w-100" alt="...">
        </a>
      <div class="carousel-caption d-none d-md-block">
        
      </div>
    </div>
    <div class="carousel-item">
        <a href="suit.php">
          <img src="images/Suits Slider.png" class="d-block w-100" alt="...">
        </a>
      <div class="carousel-caption d-none d-md-block">
        
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<br>

    <!-- Features Section Begin -->
    <section class="features-section spad">
        <h1 style="text-align: center;">Featured</h1><br> <hr>
        <!-- Features Box -->
        <div class="features-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <?php getfeature();?>
                            <?php getfeature2();?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <?php  getfeature1(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <!-- Features Section End -->

<!-- Trending Product Begin -->
<section class="latest-products spad">
        <div class="container">
            <div class="product-filter">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Trending Products</h2>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row" id="product-list">
                
                <?php 
                    gettrending();
                ?>
                
            </div>
        </div>
    </section>
    <hr>
    <!-- Trending Product End -->



<!-- Latest Product Begin -->
<section class="latest-products spad">
        <div class="container">
            <div class="product-filter">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Latest Products</h2>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row" id="product-list">
               
                            
                <?php 
                    getproduct();
                ?>
            </div>
        </div>
    </section>
    <!-- Latest Product End -->

<?php
    include('includes/footer.php');
?>