
  <div class="footer py-4">
    <div class="container-fluid">
      <p>
      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | elaborada por A&A | adellemuzb2@gmail.com 
      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
    </div>
  </div>

		
		
		<script src="<?php echo BASE_URL; ?>public/js/config.js" type="text/javascript"></script>
		<script src="<?php echo $_layoutParams['ruta_js']; ?>core.min.js"></script>
		<script src="<?php echo $_layoutParams['ruta_js']; ?>jquery-3.3.1.min.js"></script>
		<script src="<?php echo $_layoutParams['ruta_js']; ?>jquery-migrate-3.0.1.min.js"></script>
		<script src="<?php echo $_layoutParams['ruta_js']; ?>jquery-ui.js"></script>
		
		<script src="<?php echo $_layoutParams['ruta_js']; ?>popper.min.js"></script>
		<script src="<?php echo $_layoutParams['ruta_js']; ?>bootstrap.min.js"></script>
		<script src="<?php echo $_layoutParams['ruta_js']; ?>owl.carousel.min.js"></script>
		<script src="<?php echo $_layoutParams['ruta_js']; ?>jquery.stellar.min.js"></script>
		<script src="<?php echo $_layoutParams['ruta_js']; ?>jquery.countdown.min.js"></script>
		<script src="<?php echo $_layoutParams['ruta_js']; ?>jquery.magnific-popup.min.js"></script>
		<script src="<?php echo $_layoutParams['ruta_js']; ?>bootstrap-datepicker.min.js"></script>
		<script src="<?php echo $_layoutParams['ruta_js']; ?>swiper.min.js"></script>
		<script src="<?php echo $_layoutParams['ruta_js']; ?>aos.js"></script>

		<script src="<?php echo $_layoutParams['ruta_js']; ?>picturefill.min.js"></script>
		<script src="<?php echo $_layoutParams['ruta_js']; ?>lightgallery-all.min.js"></script>
		<script src="<?php echo $_layoutParams['ruta_js']; ?>jquery.mousewheel.min.js"></script>

		<script src="<?php echo $_layoutParams['ruta_js']; ?>main.js"></script>

		<script>
		$(document).ready(function(){
		$('#lightgallery').lightGallery();
		});
		</script>



<?php if(isset($_layoutParams['js']) && count($_layoutParams['js'])): ?>
    <?php for($i=0; $i < count($_layoutParams['js']); $i++): ?>
        <script src="<?php echo $_layoutParams['js'][$i] ?>" type="text/javascript"></script>
    <?php endfor; ?>
<?php endif; ?>




</body>

</html>