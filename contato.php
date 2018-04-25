<div class="popup">
	<div id="dadosCadastrais">
		<div>
			<div>
				<p>
					<strong>Dados cadastrais da tilicon</strong>
					<br/>
					Razão Social:  Tilicon Construções Ltda.<br/>
					Nome Comercial: TILICON<br/>
					CNPJ: 69.263.945/0001-00<br/>
					Inscrição Estadual: XX.XXX.XXX/XXXX-XX<br/>
					Responsável: Bruno Tilieri<br/>
					<?php if(get_theme_mod( 'endereco' )) : ?>
					Endereço: <?php echo get_theme_mod( 'endereco' ); ?><br/>
					<?php endif; ?>
					<?php if(get_theme_mod( 'telefone' )) : ?>
					Tel: <?php echo get_theme_mod( 'telefone' ); ?><br/>
					<?php endif; ?>
					<?php if(get_theme_mod( 'contato' )) : ?>
					Email: <?php echo "<a href='mailto:".get_theme_mod( 'contato' )."'>".get_theme_mod( 'contato' )."</a>"; ?>
					<?php endif; ?>					
				</p>  				
			</div>
		</div>
	</div>
	<div id="cadastreEmpresa">
		<div>
			<div>
				<p>
					<strong>Cadastre sua Empresa</strong>
				</p>
				<?php echo do_shortcode('[contact-form-7 id="45" title="Cadastro"]'); ?>
			</div>
		</div>
	</div>
</div>

<div class="flex content">
	<div class="flex100 flex">
		<div class="flex50">
			<p>A TILICON dispõe de uma equipe especializada para esclarecer qualquer dúvida sobre todos os nossos empreendimentos. Sua sugestão, reclamação ou elogio são muito importantes para nós. Envie sua mensagem, que entraremos em contato o mais breve possível.</p>
		</div>
	</div>
	<div class="flex100 flex">
		<div class="flex50">
			<?php echo do_shortcode('[contact-form-7 id="43" title="Contato"]'); ?>
			<script>
				jQuery(document).ready(function(){
					$('input.telefone').mask('00 0 0000 0000', {reverse: true});
					$('input.cep').mask('00.000-000', {reverse: true});
					$('input.cnpj').mask('00.000.000/0000-00', {reverse: true});
					$('[name="estado"],[name="Estado"]').bind('keyup blur',function(){ 
					    var node = $(this);
					    node.val(node.val().replace(/[^a-z]/g,'') ); }
					);
					$('[name="estado"],[name="Estado"]').attr("onkeyup","this.value=this.value.replace(/[^a-z]/g,'')").attr("maxlength","2");
				});
			</script>
		</div>
		<div class="flex50">
			<a href="javascript:void(0)" role="popup" title="Dados cadastrais da Tilicon" class="b btn btn_3 sizer">Dados cadastrais da Tilicon</a>
			<a href="javascript:void(0)" role="popup" title="Cadastre aqui a sua empresa" class="b btn btn_2 sizer">Cadastre aqui a sua empresa</a>
			<?php echo do_shortcode('[wysija_form id="1"]'); ?>
		</div>
	</div>
</div>