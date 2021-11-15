

	<div class="footer container-fluid d-flex d-column">
			<div class="info d-flex">
				<div class="d-two-twelfth">
					Comitato Senzatomica<br/>
					©<?php echo date("Y"); ?> 
				</div>
				<div class="d-two-twelfth">
					via R. Lambruschini, 52 - Firenze 50134<br/>
					<a href="mailto:amministrazione@senzatomica.it">Email</a><br/>
					+39 055 4269800
				</div>
				<div class="d-four-twelfth">
					newsletter
				</div>
				<div class="d-two-twelfth">
					socials
				</div>
				<div class="d-two-twelfth">
					privacy policy
				</div>
			</div>

			<div class="partners d-flex">
				<div class="d-two-twelfth">
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
				<div class="d-two-twelfth">
					Promossa da:

					<div class="logo d-flex spacing-t-3">

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
				<div class="d-four-twelfth">
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
				<div class="d-four-twelfth">
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