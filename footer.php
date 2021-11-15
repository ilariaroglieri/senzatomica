

	<div class="footer container-fluid d-flex d-column">
			<div class="info d-flex t-wrap">
				<div class="name d-two-twelfth-pad t-half-pad">
					Comitato Senzatomica<br/>
					©<?php echo date("Y"); ?> 
				</div>
				<div class="address d-two-twelfth-pad t-half-pad">
					via R. Lambruschini, 52 - Firenze 50134<br/>
					<a href="mailto:amministrazione@senzatomica.it">Email</a><br/>
					+39 055 4269800
				</div>
				<div class="newsletter d-four-twelfth-pad t-whole-pad">
					newsletter
				</div>
				<div class="socials d-one-twelfth-pad t-center t-half-pad">
					<?php if (have_rows('social','option')): ?>
       	 		<?php while( have_rows('social','option') ) : the_row(); ?>
       	 			<?php $social = get_sub_field('link_social'); ?>
							<a class="uppercase" href="<?php echo $social['url']; ?>" target="_blank"><?php echo $social['title']; ?>
							</a><br/>
						<?php endwhile;
					endif; ?>
				</div>
				<div class="legals d-one-twelfth-pad t-center t-half-pad">
					<a href="<?php echo get_page_link( get_page_by_title( 'Privacy Policy' )->ID ); ?>">Privacy Policy</a>
					<a href="<?php echo get_page_link( get_page_by_title( 'Legals' )->ID ); ?>">Legals</a>
				</div>
			</div>

			<div class="partners d-flex t-wrap">
				<div class="partner d-flex d-column d-two-twelfth-pad t-half-pad">
					<?php $logo = get_field('partner_logo','option'); ?>
					Partner di:

					<div class="logo spacing-t-3">
						<?php if ($logo['caption']): ?>
							<a class="no-border" href="<?php echo $logo['caption']; ?>" target="_blank">
								<img src="<?php echo $logo['url']; ?>" />
							</a>
						<?php else: ?>
							<img src="<?php echo $logo['url']; ?>" />
						<?php endif; ?>
					</div>
				</div>

				<div class="promoters d-two-twelfth-pad promoters t-half-pad">
					Promossa da:

					<div class="logo d-flex ds-column t-row spacing-t-3">

					<?php if (have_rows('promoters','option')): ?>
       	 		<?php while( have_rows('promoters','option') ) : the_row(); ?>
       	 			<?php $promoterLogo = get_sub_field('immagine_logo'); ?>
							<?php if ($promoterLogo['caption']): ?>
								<a class="no-border" href="<?php echo $promoterLogo['caption']; ?>" target="_blank">
									<img src="<?php echo $promoterLogo['url']; ?>" />
								</a>
							<?php else: ?>
								<img src="<?php echo $promoterLogo['url']; ?>" />
							<?php endif; ?>
						<?php endwhile;
					endif; ?>
					</div>
				</div>
				<div class="patrons d-four-twelfth-pad t-half-pad">
					Adesioni e Patrocini

					<div class="spacing-t-3">
						<?php if (have_rows('adesioni_e_patrocini','option')): ?>
	       	 		<?php while( have_rows('adesioni_e_patrocini','option') ) : the_row(); ?>
	       	 			<?php $ente = get_sub_field('ente'); ?>
								<a href="<?php echo $ente['url']; ?>" target="_blank"><?php echo $ente['title']; ?>
								</a><br/>
							<?php endwhile;
						endif; ?>
					</div>
				</div>
				<div class="sustainers d-four-twelfth-pad t-half-pad">
					Progetto sostenuto con i fondi Otto per Mille dell’Istituto Buddista

					<?php $logo8 = get_field('istituto_buddista','option'); ?>
					<div class="logo d-flex spacing-t-3">
						<?php if ($logo8['url']): ?>
							<a class="no-border" href="<?php echo $logo8['caption']; ?>" target="_blank">
								<img src="<?php echo $logo8['url']; ?>" />
							</a>
						<?php else: ?>
							<img src="<?php echo $logo8['url']; ?>" />
						<?php endif; ?>
					</div>
				</div>
			</div>
	</div>
	 

<?php wp_footer(); ?>

</body>
</html>