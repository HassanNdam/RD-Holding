<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="og:description"
        content="Holding RD Finance, Groupe couvrant les enseignes Brasseries Éditos, Sherlock Pubs, Burger King, Starbuks sur la région de Reims, et nord de la France">
    <link rel="canonical" href="https://www.holding-rd-finance.fr">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:type" content="website">
    <meta property="og:image"
        content="https://static.wixstatic.com/media/3378e8_324b4761255f47808db05740ddd12252~mv2.png/v1/fill/w_460,h_130,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/LOGO%20HOLDING%20SEUL.png" />
    <meta property="og:title" content="Holding RD Finance | Groupe de Marques Restauration | Reims">

    <link rel="stylesheet" href="<?php echo(get_template_directory_uri() . '/style.css') ?>">
    <link rel="stylesheet" href="<?php echo(get_template_directory_uri() . '/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=2.1">
    <link rel="icon" href="<?php echo(get_template_directory_uri() . '/images/icone/faviconee.png') ?>"
        sizes="16x16 32x32 48x48 64x64">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?php change_title_browser_top(); ?></title>


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="site" id="page">

        <section id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

            <a class="skip-link screen-reader-text sr-only"
                href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>
            <nav id="global-nav" class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <?php if ( is_front_page() && is_home() ) : ?>
                    <a href="https://www.holding-rd-finance.fr/accueil" class="logolink d-none d-sm-block"
                        target="_blank">
                        <ul class="header-logos-liste header-liste">
                            <li class="header-logos-item header-logos-comp"></li>
                        </ul>
                    </a>
                    <?php else : ?>

                    <a href="https://www.holding-rd-finance.fr/accueil" class="logolink d-none d-sm-block"
                        target="_blank">
                        <ul class="header-logos-liste header-liste">
                            <li class="header-logos-item header-logos-comp"></li>
                        </ul>
                    </a>
                    <?php endif; ?>
                    <div class="main-menu">
                        <a href="https://jobaffinity.fr/apply/mcmx2498axyex7d3ad" target="_blank"
                            title="Nous rejoindre">
                            <button type="button" class="btn btn-primary" onclick="this.blur();">Candidature
                                spontanée</button>
                        </a>
                    </div>
                </div>
        </section>

        <?php if(is_single()) : ?>

        <div class="container-fluid bandeau bandeau-post">

        </div>
        <?php endif; ?>