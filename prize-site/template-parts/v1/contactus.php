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
				<div id="popup-progress-bar" class="progress">
                	<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 25%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><span id="popup-progress-content">Progress ( 25% )</span></div>
            	</div>
				<h3>Register once, for a chance to win everyday!</h3>
				<form id="prizesite-lucky-form" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
					<div class="form-group">
						<div class="input-wrap">
							<label for="no" class="label-text">Your mobile number (ОЗххххххххх)</label>
							<input type="text" id="no" class="form-control" >
							<span class="error-message" id="error-msg">Please enter a phone number</span>
							<span class="error-message" id="number-invalid-msg">Phone number not in required format.<br>Phone number must have eleven digit.<br>Phone number should be in (03XXXXXXXXX) format.</span>
						</div>
						<div class="input-wrap">
                        	<label for="email" class="label-text">Your email address (myemail@domain.com)</label>
                        	<input type="text" id="email" class="form-control" >
                        	<span class="error-message" id="email-error-msg">Please enter a valid email address</span>
							<span class="error-message" id="email-invalid-msg">Email not in required format.<br>Format should be  myemail@domain.com.</span>
						</div>
						<span class="guarantee-message">We guarantee to never share your mobile number or email address</span>
					</div>
					<div class="form-group" id="check-box-div">
						<div class="input-wrap">
							<input id="agree" type="checkbox">
							<label id="check-label-box" for="agree" class="check-label">
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