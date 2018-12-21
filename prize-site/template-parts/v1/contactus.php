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
							<button type="sumbit" class="btn" data-toggle="modal" data-target="#registration-modal">Enter daily lucky draw for free</button>
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
							<button type="sumbit" class="btn" data-toggle="modal" data-target="#registration-modal">Enter daily lucky draw for free</button>
						</div>
					</div>
				</div>
			</section>

<div class="modal" id="registration-modal" tabindex="-1" role="dialog" aria-labelledby="registrationModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div>
			<button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="col">
				<h3>Register once, for a chance to win everyday!</h3>
				<form id="prizesite-lucky-form" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
					<div class="form-group">
						<div class="input-wrap">
							<label for="no" class="label-text">Your mobile number (ОЗххххххххх)</label>
							<input type="text" id="no" class="form-control" pattern="03[0-9]{2}(?!1234567)(?!1111111)(?!7654321)[0-9]{7}" >
							<span class="label">Don't worry, we'll never pass this on.</span>
							<span class="error-message" id="error-msg">Please enter a phone number</span>
						</div>
					</div>
					<div class="form-group" id="check-box-div">
						<div class="input-wrap">
							<input id="agree" type="checkbox">
							<label for="agree" class="check-label">
							<?php
								wp_nav_menu( array(
								'theme_location' => 'v1-secondary-menu',
									'container' => false,
									'items_wrap' => '%3$s'
								) );
							?>
							</label>
							<span class="error-message" id="error-chk-box-msg">Please agree to our Terms & Conditions</span>
					</div>
				</div>
				<button type="sumbit" class="btn">Enter daily lucky draw for free</button>
            </form>
		</div>
      </div>
    </div>
  </div>
</div>