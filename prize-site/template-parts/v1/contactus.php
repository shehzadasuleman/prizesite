<?php
/*
@package prizesitetheme
*/
	$envelope_url = get_template_directory_uri() . '/img/envelope-regular.svg';
	$map_url = get_template_directory_uri() . '/img/map-marker.svg';
	$phone_url = get_template_directory_uri() . '/img/phone.svg';
?>
<section class="about-block">
				<div class="container">
					<div class="time-block">
						<div class="timer-wrapper">
							<div class="timer">
								<span class="title">Next draw</span>
								<div id="defaultCountdown"></div>
							</div>
							<a href="http://localhost/wordpress/v1" class="btn">Enter daily lucky draw for free</a>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<h1>We will love to hear from you. Call, email or pop by our office to say hello :)</h1>
						</div>
						<div class="col">
							<div class="Queries-Box">
								<strong class="title">General Queries</strong>
								<table>
									<tbody>
										<tr>
											<td><img src="<?php print $envelope_url ?>" alt="Message"></td>
											<td><p>contact@muftpaise.com</p></td>
										</tr>
										<tr>
											<td><img src="<?php print $phone_url ?>" alt="Phone"></td>
											<td><p>+92(42)35402188</p></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="Queries-Box">
								<strong class="title">Advertise With Us</strong>
								<table>
									<tbody>
										<tr>
											<td><img src="<?php print $envelope_url ?>" alt="Message"></td>
											<td><p>advertising@muftpaise.com</p></td>
										</tr>
										<tr>
											<td><img src="<?php print $phone_url ?>" alt="Phone"></td>
											<td><p>+92(42)35402188</p></td>
										</tr>
									</tbody>
								</table>
							</div>
							<strong class="title">Visit Us</strong>
							<div>
								<?php the_content(); ?>
								<div class="Queries-Box">
									<table>
										<tbody>
											<tr>
												<td><img src="<?php print $map_url ?>" alt="Message"></td>
												<td><p>Defence Rd, Wapda Colony, Lahore, Pakistan</p></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<strong class="title">Don't forget to register</strong>
							<p>Our lucky draw is open to people from every corner of Pakistan to give everyone the chance to win daily cash prizes for free.</p>
							<a href="http://localhost/wordpress/v1" class="btn">Enter daily lucky draw for free</a>
						</div>
					</div>
				</div>
			</section>