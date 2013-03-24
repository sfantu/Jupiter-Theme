<?php query_posts('category_name=next&showposts=1'); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<div id="top_wrap">
		<div id="top_container">
			<div id="js_countdown">
				<a href="<?php echo(get_page_link(get_page_by_title('live')->ID)) ?>"><h2><?php the_title(); ?></h2></a>
				<?php the_date('Y, m, j, G, i, s', '<h2 id="date">', '</h2>'); ?>
				<div id="plus_date"><?php the_excerpt(); ?></div>
				<script type="text/javascript">
					$(function () {
						var str = $("h2#date").text();
						var alt = str.split(",");
						var year = parseInt(alt[0]);
						var month =parseInt(alt[1]);
						var plusstr = $("div#plus_date").children('p').text()
						var plusalt = plusstr.split(",");
						var day = parseInt(alt[2])+parseInt(plusalt[0]);
						var hour = parseInt(alt[3])+parseInt(plusalt[1]);
						var minute = parseInt(alt[4])+parseInt(plusalt[2]);
						var seconds = parseInt(alt[5]);						
						var austDay = new Date();
						austDay = new Date(year, month-1, day, hour, minute, seconds);

						$('#defaultCountdown').countdown({ 
until: $.countdown.UTCDate(+1, austDay ),format: 'DHMS', expiryText: '<a href="<?php echo(get_page_link(get_page_by_title('live')->ID))?>"> <div class="over">We are live</div> </a>',alwaysExpire: true});
					});
				</script>
				<div id="defaultCountdown"></div>
			</div>
			<div id="upcoming_logo">
				<?php the_post_thumbnail('next-thumb'); ?>
			</div>
		</div>
	</div>
<?php endwhile; ?>
<?php endif; ?>