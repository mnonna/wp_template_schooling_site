<?php
/*
*@package Ekosem-Szkolenia
*/

/*
Plugin Name: Szkolenia 
Description: Twórz harmonogramy szkoleń i zarządzaj nimi.
Version: 1.0.0
Author: mnonna
Licence: GPLv2
*/

if( ! defined('ABSPATH') ){
    die;
}


add_action('activated_plugin','save_error');
function save_error(){
file_put_contents(ABSPATH. 'wp-content/plugins/PLUGIN_FOLDER/error.html', ob_get_contents());
}

function ekosem_plugin_styles() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'style',  $plugin_url . "schooling-plugin-style.css");

    wp_register_style( 'material', 'https://fonts.googleapis.com/icon?family=Material+Icons');
    wp_enqueue_style('material');
}

function ekosem_scripts(){
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_script( 'schoolings-handler',  $plugin_url . "schoolings_handler.js");

    /*wp_register_script('jquery_ui','https://code.jquery.com/ui/1.12.1/jquery-ui.js');
    wp_enqueue_script('jquery_ui');*/
}

add_action( 'admin_menu', 'custom_post_type' );
function custom_post_type(){
    $menu = add_menu_page(
        __( 'Szkolenia', 'my-textdomain' ),
        __( 'Szkolenia', 'my-textdomain' ),
        'manage_options',
        'szkolenia-plugin',
        'ekosem_plugin_page',
        null,
        2
    );

    add_action( 'admin_print_styles-'.$menu, 'ekosem_plugin_styles' );
    add_action( 'admin_print_scripts', 'ekosem_scripts' );

    /*$submenu = add_submenu_page(
    'szkolenia-plugin','Jak to działa ?','Ekosem Szkolenia - Instrukcja','manage_options','ekosem_faq','ekosem_faq_content',1
    );*/
}

function ekosem_plugin_page(){
    global $wpdb;
    $sql = "SELECT *FROM wp_ekosem_szkolenia;";
    $event = $wpdb->get_results($sql);
    ?>

<div class="ekosem-plugin-wrapper">
    <div class="ekosem-plugin-main">
        <div class="ekosem-schoolings">
            <h2>Wszystkie planowane szkolenia EkoSem</h2>

            <?php foreach($event as $data){?>
            <div class="ekosem-schooling-item-dropdown">
                <span><?php echo $data->topic;?></span>
                <i class="material-icons open-ekosem-schooling-item">menu_open</i>
            </div>

            <?php
                $get_schooling_participants = "SELECT *FROM wp_ekosem_participants WHERE `topic` = '".$data->topic."';";
                $schooling_participants = $wpdb->get_results($get_schooling_participants);
            ?>

            <div class="ekosem-schooling-item-data">
                <div class="schooling-merch-data">
                    <p>Maksymalna liczba uczestników: &nbsp; <?php echo $data->max_people;?></p>
                    <p>Cena szkolenia (za 1 osobę): &nbsp; <?php echo $data->price;?></p>
                </div>

                <div class="schooling-current-participants">
                    <table class="participants-table">
                        <thead>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Podmiot zgłaszający</th>
                        </thead>

                        <tbody>
                            <?php foreach($schooling_participants as $participants){?>
                                <tr>
                                    <td><?php echo $participants->name; ?></td>
                                    <td><?php echo $participants->surname; ?></td>
                                    <td><?php echo $participants->declarant; ?></td>
                                </tr>
                            <?php }?>
                        </tbody>

                    </table>
                </div>
            </div>

            <?php }?>
        </div>

        <div class="ekosem-declarants">
        
        <?php
            $get_declarants = "SELECT *FROM wp_ekosem_declarants;";
            $declarants = $wpdb->get_results($get_declarants);
        ?>
        
        <h2>Podmioty zgłaszające</h2>
        <?php foreach($declarants as $declarant){?>
            <div class="ekosem-declarants-item-dropdown">
                <span><?php echo $declarant->declarant_name;?></span>
                <i class="material-icons open-declarants-schooling-item">menu_open</i>
            </div> 
            
            <div class="ekosem-declarants-item-data">
                <div class="declarants-data">
                    <p><strong>Dane podmiotu:</strong> <p><?php echo $declarant->declarant_credentials;?></p>
                    <p><strong>Osoba kontaktowa: </strong> <p><?php echo $declarant->contact_person;?></p>
                    <p><strong>Numer telefonu: </strong> <p> <?php echo $declarant->contact_person_phone;?></p>
                    <p><strong>Email: </strong> <p><?php echo $declarant->contact_person_email;?></p>
                </div>
            </div>
        <?php } ?>
        </div>

        <div class="add-schooling-wrapper">
            <div class="add-schooling-form">
                <form class="main-form">
                    <h2>Dodaj nowe szkolenie</h2>
                    <div class="form-group">
                        <label for="topicInput">Temat Szkolenia</label>
                        <input type="text" class="form-control" id="topicInput">
                    </div>
                    <div class="form-group">
                        <label for="dateInput">Data</label>
                        <input type="text" class="form-control" id="dateInput">
                    </div>
                    <div class="form-group">
                        <label for="priceInput">Cena</label>
                        <input type="text" class="form-control" id="priceInput">
                    </div>
                    <div class="form-group">
                        <label for="maxNumInput">Liczba uczestników</label>
                        <input type="text" class="form-control" id="maxNumInput">
                    </div>

                    <button type="button" class="confirm-participants">Dodaj szkolenie</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
}

function create_ekosem_tables()
{
    global $wpdb;
    $create_table_query = "
            CREATE TABLE `{$wpdb->prefix}ekosem_szkolenia` (
            `id` bigint(20) NOT NULL auto_increment,
            `topic` VARCHAR(200) NOT NULL,
            `sch_date` DATE NOT NULL,
            `max_people` tinyint,
            `price` int NOT NULL,
            `is_terminated` BOOLEAN DEFAULT 0,
            PRIMARY KEY (`id`)
            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
    ";

        $create_table_2 = "
        CREATE TABLE `{$wpdb->prefix}ekosem_participants` (
        `id` bigint(20) NOT NULL auto_increment,
        `topic` VARCHAR(200) NOT NULL,
        `name` VARCHAR(50) NOT NULL,
        `surname` VARCHAR(50) NOT NULL,
        `declarant` VARCHAR(250) NOT NULL,
        PRIMARY KEY (`id`),
        FOREIGN KEY (`declarant`) REFERENCES wp_ekosem_declarants(declarant_name),
        FOREIGN KEY (`topic`) REFERENCES wp_ekosem_szkolenia(topic)
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
        ";

        $create_table_3 = "
        CREATE TABLE `{$wpdb->prefix}ekosem_declarants` (
        `id` bigint(20) NOT NULL auto_increment,
        `declarant_name` VARCHAR(200) NOT NULL,
        `declarant_credentials` VARCHAR(500) NOT NULL,
        `contact_person` VARCHAR(100) NOT NULL,
        `contact_person_phone` VARCHAR(15) NOT NULL,
        `contact_person_email` VARCHAR(50) NOT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
        ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $create_table_query );
    dbDelta( $create_table_2 );
    dbDelta( $create_table_3 );
}
register_activation_hook( __FILE__, 'create_ekosem_tables' );


function ekosem_add_event()
{
    $data_to_add = $_POST['inputValues'];

    global $wpdb;

    $the_query = "INSERT INTO wp_ekosem_szkolenia (topic, sch_date, max_people, price) VALUES ('$data_to_add[0]','$data_to_add[1]',$data_to_add[3], $data_to_add[2]);";

    echo $the_query;

    if($wpdb->query($the_query)){
        echo "<p>Numery zostały dodane do bazy !<p>";
    }
    else{
        echo "<p>Błąd</p>";
    }

    die();
}
add_action('wp_ajax_handle_insert','ekosem_add_event');

?>
