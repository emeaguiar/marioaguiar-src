<?php
/**
 * The home template
 *
 * @since Mario_Aguiar 2.0
 */
get_header();
?>

<div id="welcome">
			<p><?php _e('I am a <strong>front-end developer</strong> specialized in <em>WordPress</em> &amp; <em>Drupal</em>.'); ?></p>
		</div>
		
		<div class="detailsTop"></div>
		<div id="detailsContainer">
			<div id="about-me">
				<div id="about">
					<article class="me">
						<h2><?php _e( 'Who am I?', 'marioaguiar' ); ?> </h2>
						<p><?php _e('Born in <abbr title="Los Angeles">LA</abbr>, raised in Mexico for over 24 years, that\'s me, <strong>Mario Aguiar</strong>.', 'marioaguiar'); ?></p>
						<p><?php _e('I have <em>over seven years</em> of experience in <strong>web development</strong> and I hope to keep doing this for several more years, what can I say, I just love it.', 'marioaguiar'); ?></p>
						<p><?php _e('I spend most of my time in front of the screen working with web pages. <strong>I love WordPress</strong> and turn designers\' dreams into reality.', 'marioaguiar'); ?></p>
					</article>
					
					<article class="capabilities">
						<h2><?php _e( 'What do I do?', 'marioaguiar' ); ?> </h2>
						<p><?php _e('I specialize in <strong>Front-end development</strong> using these tools:', 'marioaguiar'); ?></p>
						<ul class="tools">
							<li><abbr title="HyperText Markup Language">HTML</abbr></li>
							<li>WordPress</li>
							<li><abbr title="Cascading Style Sheets">CSS</abbr></li>
							<li>Textpattern</li>
							<li><abbr title="PHP: Hypertext Preprocessor">PHP</abbr></li>
							<li>Drupal</li>
							<li><abbr title="Javascript">JS</abbr></li>
						</ul>
					</article>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div class="detailsBottom"></div>
		<!-- <div id="work">
			<h2><?php _e( 'See some of my work' ); ?></h2>
			<ul class="clearfix">
				<li class="primary"><a href="#bluemasters"><img id="projectOne" src="<?php echo get_template_directory_uri(); ?>/images/bluemasters.jpg" alt="Bluemasters Theme" /></a></li>
				<li class="secondary"><a href="#celeste"><img id="projectTwo" src="<?php echo get_template_directory_uri(); ?>/images/celeste.jpg" alt="Celeste Theme" /></a></li>
				<li class="secondary"><a href="#studioanime"><img id="projectThree" src="<?php echo get_template_directory_uri(); ?>/images/studioanime.jpg" alt="Studio anime" /></a></li>
			</ul>
		</div>
		<div class="detailsBottom"></div> -->
		<div id="contact">
			<div id="social">
				<h3><?php _e( 'Get in touch', 'marioaguiar' ); ?></h3>
				<p><?php _e('If you want to get in touch with me, to work together in a proyect, or even just to say something about this site go ahead. Here are some ways you can contact me.<br>Don\'t be shy!', 'marioaguiar'); ?></p>
				<div class="clear"></div>
				<ul id="socialIcons">
					<li><a href="http://twitter.com/emeaguiar"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="Twitter" /></a></li>
					<li><a href="http://www.facebook.com/mario.aguiar"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="Facebook" /></a></li>
					<li><a href="http://www.linkedin.com/in/marioaguiar"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt="Linkedin" /></a></li>
					<li><a href="http://forr.st/-emeaguiar"><img src="<?php echo get_template_directory_uri(); ?>/images/forrst.png" alt="forrst" /></a></li>
				</ul>
			</div>
			
			<form>
				<fieldset>
					<legend><?php _e('Contact Form', 'marioaguiar'); ?></legend>
					<input id="nombre" placeholder="<?php _e('Name', 'marioaguiar'); ?>" required />
					<input id="asunto" placeholder="<?php _e('Subject', 'marioaguiar'); ?>" required />
					<input id="correo" type="email" placeholder="<?php _e('Email', 'marioaguiar'); ?>" required />
					<input id="company" placeholder="<?php _e('Company', 'marioaguiar'); ?>" />
					<textarea id="mensaje"></textarea>
					<label for="checking" class="screenReader"><?php _e('If you want to send the form, leave this field blank', 'marioaguiar'); ?></label>
					<input type="text" name="checking" id="checking" class="screenReader" value="" />
					</li>
					<button type="submit" id="enviar" name="submit"><?php _e('Send', 'marioaguiar'); ?></button>
				</fieldset>
			
			<aside id="otherWay">
				<h3><?php _e('More ways!'); ?></h3>
				<p><?php _e('If by any weird reason the contact form is not working, here are some more ways.', 'marioaguiar'); ?></p>
				
				<ul>
					<li><strong><?php _e('Email', 'marioaguiar'); ?></strong> - me[at]marioaguiar.net</li>
					<li><strong><?php _e('Phone', 'marioaguiar'); ?></strong> - (203) 243 4133</li>
					<li><strong><?php _e('State', 'marioaguiar'); ?></strong> - Connecticut</li>
					<li><strong><?php _e('Country', 'marioaguiar'); ?></strong> - USA</li>
				</ul>
				
			</aside>
			<div class="clear"></div>
		</form>
			
		</div>

<?php get_footer(); ?>