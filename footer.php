			<footer>
				<div class="wrap">
					<div class="flex">
						<?php
						if(get_theme_mod( 'endereco' )) :
							echo "<p class='flex33'>".get_theme_mod( 'endereco' )."</p>";
						endif;
						if(get_theme_mod( 'telefone' )) :
							echo "<p class='flex33'>Tel: ".get_theme_mod( 'telefone' )."</p>";
						endif;
						if(get_theme_mod( 'contato' )) :
							echo "<p class='flex33'>Email: <a href='mailto:".get_theme_mod( 'contato' )."'>".get_theme_mod( 'contato' )."</a></p>";
						endif;
						?>
					</div>
				</div>
			</footer>
		</div>
		<div id="fb-root"></div>
		<?php wp_footer(); ?> 
	</body>
	</html>