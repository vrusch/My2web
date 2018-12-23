<footer class="container-fluid text-center" style="background-color: #054c8a;">
	<table style="width: 100%">
		<tr>
			<td style="width: 30%"></td>
			<td style="width: 30%">
				<a href="#myPage" title="To Top">
					<span class="glyphicon glyphicon-chevron-up linky"></span>
				</a>
				<p class="linky">Bootstrap Theme Made By <a href="https://www.w3schools.com" title="Visit w3schools" class="linky">www.w3schools.com</a>
				</p>
				<p><a href="colorscheme" target="_blank" class="linky">[Color Scheme]</a></p>
			</td>
			<td style="width: 30%">
				<div class="pull-right">
					<small>
						<?php echo sprintf(lang('website_page_rendered_in_x_seconds'), $this->benchmark->elapsed_time()); ?>
						<br>
						Copyright &copy; <?php echo date('Y'); ?> <?php echo ('4My2web'); ?>
					</small>
				</div>
			</td>
		</tr>
	</table>


</footer>

<script>
	$(document).ready(function () {
		// Add smooth scrolling to all links in navbar + footer link
		$(".navbar a, footer a[href='#myPage']").on('click', function (event) {
			// Make sure this.hash has a value before overriding default behavior
			if (this.hash !== "") {
				// Prevent default anchor click behavior
				event.preventDefault();

				// Store hash
				var hash = this.hash;

				// Using jQuery's animate() method to add smooth page scroll
				// The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
				$('html, body').animate({
					scrollTop: $(hash).offset().top
				}, 900, function () {

					// Add hash (#) to URL when done scrolling (default click behavior)
					window.location.hash = hash;
				});
			} // End if
		});

		$(window).scroll(function () {
			$(".slideanim").each(function () {
				var pos = $(this).offset().top;

				var winTop = $(window).scrollTop();
				if (pos < winTop + 600) {
					$(this).addClass("slide");
				}
			});
		});
	})
</script>
