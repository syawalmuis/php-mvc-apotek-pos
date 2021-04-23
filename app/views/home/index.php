<main id="main">
    <section>
        <div class="container">
            <div id="awal-x" class="row">
                <div id="img-user" class="col-sm-8 ">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 img-thumbnail" src="<?=BASEURL;?>/img/banner/b1.jpg"
                                    alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>...</h5>
                                    <p>...</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 img-thumbnail" src="<?=BASEURL;?>/img/banner/b2.jpg"
                                    alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>...</h5>
                                    <p>...</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 img-thumbnail" src="<?=BASEURL;?>/img/banner/b3.jpg"
                                    alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>...</h5>
                                    <p>...</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>

                </div>
                <div id="title-x" class="col-sm-4 mt-5">

                    <div class="container mt-5">
                        <h1 class="mb-2">Welcome to Apotek_X</h1>
                        <h5>Disini kami menjual berbagai macam obat dan kebutuhan kesehatan anda</h5>

                    </div>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="scrolling-box">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 id="product">Product</h3>
                    </div>
                    <div class="col-sm-3">
                        <form name="form-src" id="form-src">
                            <input type="text" name="search-usr" id="search-usr" class="form-control form-control-sm"
                                placeholder="Search">
                        </form>
                    </div>
                    <div class="col-sm-3">
                        <form action="" id="form-cat">
                            <div class="form-group mr-1">
                                <select name="category" id="category" class="form-control form-control-sm category">
                                    <option value="">Choose</option>
                                    <option value="all">Semua</option>
                                    <option value="Flu & Batuk">Flu & Batuk</option>
                                    <option value="Saluran pencernaan">Saluran pencernaan</option>
                                    <option value="Vitamin & Suplemen">Vitamin & Suplemen</option>
                                    <option value="Demam">Demam</option>
                                    <option value="Mata">Mata</option>
                                    <option value="Herbal">Herbal</option>
                                    <option value="Kepala">Kepala</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="cat-show"></div>
            </div>
        </div>

        <!-- <input type="text" class="keyword" id="keyword"> -->

        <!--carousel--->
    </section>
    <br>
</main><!-- End #main -->