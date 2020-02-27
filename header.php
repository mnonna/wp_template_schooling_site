<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php wp_head();?>
    </head>

<body <?php body_class();?> >

<div class="ekosem-mobile-nav-wrapper-menu" id="expand-menu-id">
    <div class="mobile-menu-bar-collapsed">
        <div class="mobile-menu-collapse"><i class="material-icons menu-icon-collapse" id="collapse-mobile-menu">exit_to_app</i>WRÓĆ</div>
    </div>

    <?php 
        $menu_items = wp_get_nav_menu_items( 'Menu 1' ); 
    ?>

    <?php foreach($menu_items as $items){?>
        
        <a class="nav-anchor" href=<?php echo $items->url; ?>>
            <span class="nav-span">
                <?php echo $items->title; ?>
            </span>
        </a>
    <?php } ?>
    
</div>

<div class="mobile-menu-bar" id="collapse-menu-id">
    <div class="mobile-menu-expand"><i class="material-icons menu-icon" id="expand-mobile-menu">menu_open</i>MENU</div>
</div>

<div class="header-wrapper">

    <div class="ekosem-logo-wrapper">
        <div class="ekosem-logo-main">
            <a href=<?php echo get_home_url();?>>
                <img class="ekosem-logo-img" src="<?php echo get_template_directory_uri(); ?>/Component_1___1-removebg-preview.png">
            </a>
        </div>
    </div>

    <?php 
        $menu_items = wp_get_nav_menu_items( 'Menu 1' ); 
    ?>


    <div class="ekosem-navbar">
        <div class="ekosem-nav-links">

        <?php foreach($menu_items as $items){
        ?>
            <a class="nav-anchor" href=<?php echo $items->url; ?>>
                <span class="nav-span">
                    <?php echo $items->title; ?>
                </span>
            </a>
        <?php } ?>
        </div>
    </div>
</div>    
