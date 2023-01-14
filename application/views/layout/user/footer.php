 <!-- Required vendors -->
 <script src="<?= base_url('assets') ?>/vendor/global/global.min.js"></script>
 <script src="<?= base_url('assets') ?>/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
 <script src="<?= base_url('assets') ?>/vendor/chart.js/Chart.bundle.min.js"></script>
 <script src="<?= base_url('assets') ?>/js/custom.min.js"></script>
 <script src="<?= base_url('assets') ?>/js/deznav-init.js"></script>
 <script src="<?= base_url('assets') ?>/vendor/owl-carousel/owl.carousel.js"></script>

 <!-- Chart piety plugin files -->
 <script src="<?= base_url('assets') ?>/vendor/peity/jquery.peity.min.js"></script>

 <!-- Apex Chart -->
 <script src="<?= base_url('assets') ?>/vendor/apexchart/apexchart.js"></script>

 <!-- Dashboard 1 -->
 <script src="<?= base_url('assets') ?>/js/dashboard/dashboard-1.js"></script>
 <script src="<?= base_url('assets') ?>/vendor/bootstrap-datetimepicker/js/moment.js"></script>
 <script src="<?= base_url('assets') ?>/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <?php if (@$_SESSION['sukses']) { ?>
     <script>
         swal("Congratulation", "<?php echo $_SESSION['sukses']; ?>", "success");
     </script>
     <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
 <?php unset($_SESSION['sukses']);
    } ?>

 <?php if (@$_SESSION['invalid']) { ?>
     <script>
         swal("Mohon Maaf", "<?php echo $_SESSION['invalid']; ?>", "warning");
     </script>
     <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
 <?php unset($_SESSION['invalid']);
    } ?>


 <script>
     function carouselReview() {
         /*  testimonial one function by = owl.carousel.js */
         jQuery('.testimonial-one').owlCarousel({
             loop: true,
             autoplay: true,
             margin: 30,
             nav: false,
             dots: false,
             left: true,
             navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
             responsive: {
                 0: {
                     items: 1
                 },
                 484: {
                     items: 2
                 },
                 882: {
                     items: 3
                 },
                 1200: {
                     items: 2
                 },

                 1540: {
                     items: 3
                 },
                 1740: {
                     items: 4
                 }
             }
         })
     }
     jQuery(window).on('load', function() {
         setTimeout(function() {
             carouselReview();
         }, 1000);
     });

     $(function() {
         $('#datetimepicker1').datetimepicker({
             inline: true,
         });
     });
 </script>
 </body>

 </html>