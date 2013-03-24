	<!-- Footer -->
	<div class="footer_wrap">
		<footer id="footer">
			<nav class="footer-menu" role="navigation">
				<h3>Support Jupiter Broadcasting while shopping at:</h3>
				<?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>
			</nav>
			<div class="addvertise">
				<h3>Advertise With Us &</h3>		
				<p>Reach a monthly audience of over 2 million tech-savvy consumers, managers, developers, entrepreneurs, creatives, & gamers.</p>
				<a href="<?php echo(get_page_link(get_page_by_title('advertise')->ID)) ?>" class="d-btn">
    				<span class="a-btn-text">More information</span>
				</a>
			</div>
			<div class="copyright">
						
			</div>
		</footer>
	</div>
		<?php wp_footer(); ?>
	</body>
</html>
