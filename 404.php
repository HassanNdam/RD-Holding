<?php

get_header(); ?>


<?php if(is_404()) : ?>
<div class="container d-flex align-items-center justify-content-center mb-5 shadow-sm p-5">
    <div class="text-center">
        <h1 class="display-1 fw-bold text-404 ">404</h1>
        <p class="fs-3 mt-3"> <span class="text-dark">Désolé!</span> Page non trouvée.</p>
        <p class="lead mb-4">
            La page que vous recherchez n'existe pas.
        </p>
        <a href="<?php echo get_site_url();?>" target="_blank" title="Nous rejoindre">
            <button type="button" class="btn" onclick="this.blur();"> Trouver un poste</button>
        </a>
    </div>
</div>

<?php 
endif ;
get_footer(); 

?>