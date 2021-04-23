<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Apotek X</h3>
                    <p>
                        Jl. Poros Pinrang-Polman, Km. 32, 91253 <br>
                        Pinrang, Sulawesi Selatan<br>
                        Indonesia <br><br>
                        <strong>Phone:</strong> +62 85156 1925 552<br>
                        <strong>Email:</strong> apotek_x@example.com<br>
                    </p>
                </div>
                <!--
          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>
          
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>-->

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="mr-md-auto text-center text-md-left">
            <div class="copyright">
                &copy; Copyright <strong><span>Apotek X</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->


<script src="<?=BASEURL;?>/bootstrap/js/jquery-3.5.1.js"></script>
<script src="<?=BASEURL;?>/costum/js/jscostum.js"></script>
<script src="<?=BASEURL;?>/table/js/jquery.dataTables.js"></script>
<script src="<?=BASEURL;?>/bootstrap/js/bootstrap.js"></script>
<script src="<?=BASEURL;?>/bootstrap/js/popper.js"></script>
<script src="<?=BASEURL;?>/bootstrap/js/bootstrap.popper.js"></script>
<script src="<?=BASEURL;?>/costum/js/main.js"></script>
<!--table js-->
<script src="<?=BASEURL;?>/table/js/dataTables.bootstrap4.min.js"></script>
<script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>

<!--SWEET ALERT JS-->
<script src="<?=BASEURL;?>/sweet/js/sweetalert2.all.min.js"></script>

<!-- Template Main JS File -->
<script src="<?=BASEURL;?>/medilab/assets/js/main.js"></script>

<!-- Sript costum--->


</body>
<script>
$(function() {
    $('#tb-respon').DataTable();

    $('#tb-respon2').DataTable();

    $('[dat-a-toggle="tooltip"]').tooltip();

    $('[data-toggle="popover"]').popover();

    $('.example-popover').popover({
        container: 'body'

    });


    window.setTimeout(function() {
        $('.alert').fadeTo(500, 0).slideUp(500,
            function() {
                $(this).remove();
            });
    }, 3000);




})
</script>

</html>