  <section class="webdoor" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>);">
  	<div>
  		<h1><!-- --></h1>
  	</div>
  </section>
  <?php
  $args = array('post_type' => 'empreendimentos', 'empreendimentos_categories' => $_GET['filter'], 'order' => 'DESC');
  $query = new WP_Query($args);
  if($query->have_posts()=="1"){ ?>
  <section id="empreendimentos" class="slider_parent">
    <!-- pop ups -->
    <div class="popups"> 
      <?php
        while($query -> have_posts()) : $query -> the_post();
        echo "<div class='pop item_".$post->ID."'>";
        echo '
        <div class="webdoor" style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id($post->ID)).');">
          <div>
            <h1><!-- --></h1>
          </div>
        </div>
        <a href="javascript:void(0)" role="close"><!-- --></a>
        <ul class="b r tabs">
          <li><a href="javascript:void(0)">Visão Geral</a></li>
          <li><a href="javascript:void(0)">Detalhes do Imóvel</a></li>
          <li><a href="javascript:void(0)">Localização</a></li>
          <li><a href="javascript:void(0)">Situação da Obra</a></li>
          <li><a href="javascript:void(0)">Galeria</a></li>
        </ul>
        <div class="c"></div>
        <div class="content">
        <h3>'.get_the_title().'</h3>
        <ul class="tabs-content">
        ';          
        $terms = get_the_terms( $post->ID, 'empreendimentos_categories' );
        foreach($terms as $term) {
          switch ($term->slug) {
            case 'em-andamento':
              echo "
                <li title='Visão Geral'>
                  <div class='flex'>
                    <div class='flex40'><div class='slide'>";
                    // for ($i = 1; $i <= 11; $i++) {
                    //   if(wp_get_attachment_image_src( MultiPostThumbnails::get_post_thumbnail_id( get_post_type(), 'featured-image-'.$i, $post->ID ), 'full' )[0]){
                    //     echo "<div class='item'><img src='".wp_get_attachment_image_src( MultiPostThumbnails::get_post_thumbnail_id( get_post_type(), 'featured-image-'.$i, $post->ID ), 'full' )[0]."' /></div>";
                    //   }
                    // } 
                    echo "</div></div>
                    <div class='flex60'>
                      <p>
                        ".get_post_meta($post->ID, "Cidade", true)."<br/>
                        ".get_post_meta($post->ID, "Bairro", true)."<br/>
                        ".get_post_meta($post->ID, "Tipo", true)."<br/>
                        ".get_the_excerpt()."<br/>
                        Início Previsto<br/>
                        <b>".get_post_meta($post->ID, "Previsão", true)."</b>
                      </p>  
                    </div>
                  </div>
                </li>
                <li title='Detalhes do Imóvel'>
                  <div class='flex'>
                    <div class='flex40'>
                      <div class='slide'>
                        ";
                          echo do_shortcode('[types field="detalhes-do-imovel" separator=""][/types]');                       
                        echo "
                      </div>
                    </div>
                    <div class='flex60'>
                      <p>".get_the_excerpt()."</p>
                    </div>
                  </div>
                </li>
                <li title='Localização'>
                  <div class='flex'>
                    <div class='flex60'></div>
                    <div class='flex40'>
                      <p>
                        <b>Localização</b><br/>
                        ".get_post_meta($post->ID, "Endereço", true)."<br/><br/>
                        ".get_post_meta($post->ID, "Bairro", true)."<br/>
                        ".get_post_meta($post->ID, "Cidade", true)."
                      </p>
                    </div>
                  </div>
                </li>
                <li title='Situação da Obra'>
                  <div class='flex'>
                    <div class='flex60'>
                      <div class='slide'>
                        ";
                          echo do_shortcode('[types field="detalhes-do-imovel" separator=""][/types]');
                        echo "
                      </div>
                    </div>
                    <div class='flex40'>
                        <p>Projeto</p><span class='progresso'><span><span style='width:".get_post_meta($post->ID, "Projeto", true).";'></span></span><p>".get_post_meta($post->ID, "Projeto", true)."</p></span><br/>
                        <p>Fundação</p><span class='progresso'><span><span style='width:".get_post_meta($post->ID, "Fundação", true).";'></span></span><p>".get_post_meta($post->ID, "Fundação", true)."</p></span><br/>
                        <p>Estrutura</p><span class='progresso'><span><span style='width:".get_post_meta($post->ID, "Estrutura", true).";'></span></span><p>".get_post_meta($post->ID, "Estrutura", true)."</p></span><br/>
                        <p>Acabamentos Internos</p><span class='progresso'><span><span style='width:".get_post_meta($post->ID, "Acabamentos Internos", true).";'></span></span><p>".get_post_meta($post->ID, "Acabamentos Internos", true)."</p></span><br/>
                        <p>Acabamentos Externos</p><span class='progresso'><span><span style='width:".get_post_meta($post->ID, "Acabamentos Externos", true).";'></span></span><p>".get_post_meta($post->ID, "Acabamentos Externos", true)."</p></span>
                    </div>
                  </div>
                </li>
                <li title='Galeria'>
                  <div class='flex'>
                    <div class='flex100'>
                      <div class='slide'>";
                        // for ($i = 1; $i <= 11; $i++) {
                        //   if(wp_get_attachment_image_src( MultiPostThumbnails::get_post_thumbnail_id( get_post_type(), 'featured-image-'.$i, $post->ID ), 'full' )[0]){
                        //     echo "<div class='item galeria'>
                        //       <div style='background-image:url(".wp_get_attachment_image_src( MultiPostThumbnails::get_post_thumbnail_id( get_post_type(), 'featured-image-'.$i, $post->ID ), 'full' )[0].");'></div>
                        //     </div>";
                        //   }
                        // }  
                      echo "</div>
                    </div>
                  </div>
                </li>
              ";
            break;
            case 'lancamentos':
              echo "
                <li title='Visão Geral'>
                  <div class='flex'>
                    <div class='flex40'><div class='slide'>";
                    // for ($i = 1; $i <= 11; $i++) {
                    //   if(wp_get_attachment_image_src( MultiPostThumbnails::get_post_thumbnail_id( get_post_type(), 'featured-image-'.$i, $post->ID ), 'full' )[0]){
                    //     echo "<div class='item'><img src='".wp_get_attachment_image_src( MultiPostThumbnails::get_post_thumbnail_id( get_post_type(), 'featured-image-'.$i, $post->ID ), 'full' )[0]."' /></div>";
                    //   }
                    // }  
                    echo "</div></div>
                    <div class='flex60'>
                      <p>
                        ".get_post_meta($post->ID, "Cidade", true)."<br/>
                        ".get_post_meta($post->ID, "Bairro", true)."<br/>
                        ".get_post_meta($post->ID, "Tipo", true)."<br/>
                        ".get_the_excerpt()."<br/>
                        Início Previsto<br/>
                        <b>".get_post_meta($post->ID, "Previsão", true)."</b>
                      </p>  
                    </div>
                  </div>
                </li>
                <li title='Detalhes do Imóvel'>
                  <div class='flex'>
                    <div class='flex40'>
                      <div class='slide'>
                        ";
                          echo do_shortcode('[types field="detalhes-do-imovel" separator=""][/types]');
                        echo "
                      </div>
                    </div>
                    <div class='flex60'>
                      <p>".get_the_excerpt()."</p>
                    </div>
                  </div>
                </li>
                <li title='Localização'>
                  <div class='flex'>
                    <div class='flex60'></div>
                    <div class='flex40'>
                      <p>
                        <b>Localização</b><br/>
                        ".get_post_meta($post->ID, "Endereço", true)."<br/><br/>
                        ".get_post_meta($post->ID, "Bairro", true)."<br/>
                        ".get_post_meta($post->ID, "Cidade", true)."
                      </p>
                    </div>
                  </div>
                </li>
                <li title='Situação da Obra'>
                  <div class='flex'>
                    <div class='flex60'>
                      <div class='slide'>
                        ";
                          echo do_shortcode('[types field="detalhes-do-imovel" separator=""][/types]');
                        echo "
                      </div>
                    </div>
                    <div class='flex40'>
                        <p>Projeto</p><span class='progresso'><span><span style='width:".get_post_meta($post->ID, "Projeto", true).";'></span></span><p>".get_post_meta($post->ID, "Projeto", true)."</p></span><br/>
                        <p>Fundação</p><span class='progresso'><span><span style='width:".get_post_meta($post->ID, "Fundação", true).";'></span></span><p>".get_post_meta($post->ID, "Fundação", true)."</p></span><br/>
                        <p>Estrutura</p><span class='progresso'><span><span style='width:".get_post_meta($post->ID, "Estrutura", true).";'></span></span><p>".get_post_meta($post->ID, "Estrutura", true)."</p></span><br/>
                        <p>Acabamentos Internos</p><span class='progresso'><span><span style='width:".get_post_meta($post->ID, "Acabamentos Internos", true).";'></span></span><p>".get_post_meta($post->ID, "Acabamentos Internos", true)."</p></span><br/>
                        <p>Acabamentos Externos</p><span class='progresso'><span><span style='width:".get_post_meta($post->ID, "Acabamentos Externos", true).";'></span></span><p>".get_post_meta($post->ID, "Acabamentos Externos", true)."</p></span>
                    </div>
                  </div>
                </li>
                <li title='Galeria'>
                  <div class='flex'>
                    <div class='flex100'>
                      <div class='slide'>";
                        // for ($i = 1; $i <= 11; $i++) {
                        //   if(wp_get_attachment_image_src( MultiPostThumbnails::get_post_thumbnail_id( get_post_type(), 'featured-image-'.$i, $post->ID ), 'full' )[0]){
                        //     echo "<div class='item galeria'>
                        //       <div style='background-image:url(".wp_get_attachment_image_src( MultiPostThumbnails::get_post_thumbnail_id( get_post_type(), 'featured-image-'.$i, $post->ID ), 'full' )[0].");'></div>
                        //     </div>";
                        //   }
                        // }  
                      echo "</div>
                    </div>
                  </div>
                </li>
              ";
            break;
          default:
          break;            
          }
          echo "</ul></div></div>";
        }
        endwhile;
        wp_reset_query();         
      ?> 
    </div>
    <!--  -->
    <div class="slider">
      <div class="slider_wrapper">
      <?php
        while($query -> have_posts()) : $query -> the_post();
        echo "<div id='item_".$post->ID."' class='item'>";
        $terms = get_the_terms( $post->ID, 'empreendimentos_categories' );
        foreach($terms as $term) {
          switch ($term->slug) {
            case 'em-andamento':
              echo "
                <h3>".get_the_title()."</h3>
                <div class='lbox' style='background-image:url(".wp_get_attachment_url(get_post_thumbnail_id($post->ID)).");'>
                  <div>
                    <h3>".get_the_title()."</h3>
                    <a href='javascript:void(0)' class='b btn btn_default' title='Ver detalhes'>Ver detalhes</a>
                  </div>
                </div>
              ";
            break;
            case 'lancamentos':
              echo "
                <h3>".get_the_title()."</h3>
                <div class='lbox' style='background-image:url(".wp_get_attachment_url(get_post_thumbnail_id($post->ID)).");'>
                  <div>
                    <h3>".get_the_title()."</h3>
                    <a href='javascript:void(0)' class='b btn btn_default' title='Ver detalhes'>Ver detalhes</a>
                  </div>
                </div>
              ";
            break;
            case 'realizados':
              echo "
                <div class='lbox' style='background-image:url(".wp_get_attachment_url(get_post_thumbnail_id($post->ID)).");'>
                  <div>
                    <h3>".get_the_title()."</h3>
                  </div>
                </div>
              ";
            break;
          default:
          break;            
          }
          echo "</div>";
        }
        endwhile;
        wp_reset_query();         
      ?>
      </div>
      <a class="button prev" href="javascript:void(0)"></a>
      <a class="button next" href="javascript:void(0)"></a>
    </div>
  </section>
  <?php
}
?>
<script>
	$(document).ready(function(){
		<?php echo '$(".webdoor h1").text("'.$term->name.'");'; ?>
	});
</script>