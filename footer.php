<!-- Start Footer -->
<section class="footer">
	<div class="container">		
		<div class="row footer-bottom">
			<div class="col-xl-3 col-md-6 col-12 wow fadeIn">
				<div class="single-footer">
					<div class="about-footer">
						<div class="footer-logo">
							<a href="#"><img src="assets/img/footer-logo.svg" alt="Edumon"></a>
						</div>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit varius congue Morbi 
						</p>
						
						<div class="fot-social">
							<span>Follow Us On :</span>
							<ul>
								<li>
									<a href="#"><i class="fab fa-facebook-f"></i></a>
								</li>

								<li>
									<a href="#"><i class="fab fa-twitter"></i></a>										
								</li>
								<li>
									<a href="#"><i class="fab fa-linkedin-in"></i></a>	
								</li>
								<li>
									<a href="#"><i class="fab fa-youtube"></i></a>								
								</li>																				
							</ul>
						</div>
					</div>
				</div>
			</div><!-- End Col -->
			
			<div class="col-xl-3 col-md-6 col-12 wow fadeIn">
				<div class="single-footer">
					<h3 class="footer-title">Useful Links</h3>
					<?php
						wp_nav_menu(array(
							'theme_location' => 'footer-1',
						));
					?>
				</div>
			</div><!-- End Col -->	

			<div class="col-xl-3 col-md-6 col-12 wow fadeIn">
				<div class="single-footer">
					<h3 class="footer-title">Resources</h3>
					<?php
						wp_nav_menu(array(
							'theme_location' => 'footer-2',
						));
					?>
				</div>
			</div><!-- End Col -->
			
			<div class="col-xl-3 col-md-6 col-12 wow fadeIn">
				<div class="single-footer">
					<h3 class="footer-title">Contact Us</h3>
					<div class="contact-info">
						<p>
							<i class="fas fa-map-marker-alt"></i>
							<span>15 Rose Street Harvey, IL <br> 60426 USA</span>
						</p>
						<p>
							<i class="fas fa-phone"></i>
							<span>708-210-9101</span>
						</p>

						<p>
							<i class="fas fa-envelope"></i>
							<span> 
							<a href="mailto:info@example.com">info@example.com</a></span>
						</p>
					</div>
				</div>
			</div><!-- End Col -->
		</div>
	

	</div>
	
	<div class="copyright text-center wow fadeIn">
		<p>Copyright © 2025 <a href="#">Edumon</a>. All rights reserved.</p>
	</div>
</section>
<?php wp_footer();?>
</body>
</html>
