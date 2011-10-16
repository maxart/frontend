<script type="text/javascript" charset="utf-8">
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			controlsContainer: ".flex-container",
			controlNav: true,
			pausePlay: false,
			directionNav: true,
			nextText: "<span title='Next'>Next</span>",
			prevText: "<span title='Previous'>Previous</span>"
		});
	});
</script>

<?php if($photos[0]['totalRows'] == 0) { ?>
  <?php if(User::isOwner()) { ?>
    <a href="<?php Url::photoUpload(); ?>" class="link" title="Start uploading now!"><img src="<?php getTheme()->asset('image', 'front.png'); ?>" class="front" /></a>
    <h1>Oh no, you haven't uploaded any photos yet. <a href="<?php Url::photoUpload(); ?>" class="link">Start Now</h1>
  <?php } else { ?>
    <img src="<?php getTheme()->asset('image', 'front-general.png'); ?>" class="front" />
    <h1>Sorry, no photos. <a class="login-click link">Login</a> to upload some.</h1>
  <?php } ?>
<?php } else { ?>
	<section id="slideshow">
		<div class="flex-container">
			<div class="flexslider">
				 <ul class="slides">
					<?php foreach($photos as $photo) { ?>
					<li>
						<a href="<?php Url::photoView($photo['id']); ?>" title="Click to see detail"><img src="<?php Url::photoUrl($photo, '800x450xCR'); ?>" /></a>
						<p class="flex-caption"><?php Utility::safe($photo['title']); ?></p>
					</li>
				  	<?php } ?>
				 </ul>
			</div>
		</div>
	</section>
<?php } ?>

