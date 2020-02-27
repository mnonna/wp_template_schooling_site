<?php

    function load_stylesheets(){
        wp_register_style('stylesheet', get_template_directory_uri() . '/styles.css', array(), false, 'all');
        wp_enqueue_style('stylesheet');
        wp_register_style('stylesheet_slick', get_template_directory_uri() . '/js/slick-1.8.1/slick/slick-theme.css', array(), false, 'all');
        wp_enqueue_style('stylesheet_slick');
        wp_register_style('slick', get_template_directory_uri() . '/js/slick-1.8.1/slick/slick.css', array(), false, 'all');
        wp_enqueue_style('slick');

        wp_register_style('OpenSans&&Montserrat', 'https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Quicksand|Raleway|Domine&display=swap');
        wp_enqueue_style('OpenSans&&Montserrat');
    }

    function load_scripts(){
        wp_enqueue_script( 'slick_lib_js',  get_template_directory_uri() ."/js/slick-1.8.1/slick/slick.min.js");
        wp_enqueue_script( 'post_slider',  get_template_directory_uri() ."/js/post_carousel.js");
        wp_enqueue_script( 'number_spinner',  get_template_directory_uri() ."/js/number_spinner.js");
        wp_enqueue_script( 'mobile-handler',  get_template_directory_uri() ."/js/mobile-menu-handler.js");
    }

    add_action( 'wp_enqueue_scripts', 'load_scripts' );

    add_action('wp_enqueue_scripts', 'load_stylesheets');

    add_theme_support('menus');
    add_theme_support('post-thumbnails');

    register_nav_menus(
      array(
        'top-menu' =>  'pageMenu',
      )
    );


    function cw_post_type_aktualne() {
        $supports = array(
        'title',
        'editor', 
        'author', 
        'thumbnail', 
        'excerpt', 
        'custom-fields', 
        'comments', 
        'revisions', 
        'post-formats', 
        );
        $labels = array(
        'name' => _x('Aktualne Szkolenia', 'plural'),
        'singular_name' => _x('aktualne', 'singular'),
        'menu_name' => _x('Aktualne Szkolenia', 'admin menu'),
        'name_admin_bar' => _x('Aktualne Szkolenia', 'admin bar'),
        'add_new' => _x('Dodaj Aktualne', 'add new'),
        'add_new_item' => __('Dodaj Szkolenie'),
        'new_item' => __('Nowe Szkolenie'),
        'edit_item' => __('Edytuj Szkolenie'),
        'view_item' => __('Pokaż Szkolenie'),
        'all_items' => __('Wszystkie Szkolenia'),
        'search_items' => __('Szukaj Nowych'),
        'not_found' => __('Nie znaleziono'),
        );
        $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true, 
        'rewrite' => array('slug' => 'aktualne'),
        'has_archive' => true,
        'hierarchical' => false,
        );
        register_post_type('aktualne', $args);
        }
        add_action('init', 'cw_post_type_aktualne');


    function cw_post_type_zamkniete() {
        $supports = array(
        'title', // post title
            'editor', // post content
            'author', // post author
            'thumbnail', // featured images
            'excerpt', // post excerpt
            'custom-fields', // custom fields
            'comments', // post comments
            'revisions', // post revisions
            'post-formats', // post formats
            );
            $labels = array(
            'name' => _x('Szkolenia Zamknięte', 'plural'),
            'singular_name' => _x('zamkniete', 'singular'),
            'menu_name' => _x('Szkolenia Zamknięte', 'admin menu'),
            'name_admin_bar' => _x('Szkolenia Zamknięte', 'admin bar'),
            'add_new' => _x('Dodaj Zamknięte', 'add new'),
            'add_new_item' => __('Dodaj Zamknięte'),
            'new_item' => __('Nowe Zamknięte'),
            'edit_item' => __('Edytuj Zamknięte'),
            'view_item' => __('Pokaż Zamknięte'),
            'all_items' => __('Wszystkie Zamknięte'),
            'search_items' => __('Szukaj Zamknięte'),
            'not_found' => __('Nie znaleziono'),
            );
            $args = array(
            'supports' => $supports,
            'labels' => $labels,
            'public' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'zamkniete'),
            'has_archive' => true,
            'hierarchical' => false,
            );
            register_post_type('zamkniete', $args);
            }
            add_action('init', 'cw_post_type_zamkniete');


    function cw_post_type_zrealizowane() {
                $supports = array(
                'title', // post title
                'editor', // post content
                'author', // post author
                'thumbnail', // featured images
                'excerpt', // post excerpt
                'custom-fields', // custom fields
                'comments', // post comments
                'revisions', // post revisions
                'post-formats', // post formats
                );
                $labels = array(
                'name' => _x('Szkolenia Zrealizowane', 'plural'),
                'singular_name' => _x('zrealizowane', 'singular'),
                'menu_name' => _x('Szkolenia Zrealizowane', 'admin menu'),
                'name_admin_bar' => _x('Szkolenia Zrealizowane', 'admin bar'),
                'add_new' => _x('Dodaj Zrealizowane', 'add new'),
                'add_new_item' => __('Dodaj Zrealizowane'),
                'new_item' => __('Nowe Zrealizowane'),
                'edit_item' => __('Edytuj Zrealizowane'),
                'view_item' => __('Pokaż Zrealizowane'),
                'all_items' => __('Wszystkie Zrealizowane'),
                'search_items' => __('Szukaj Zrealizowane'),
                'not_found' => __('Nie znaleziono'),
                );
                $args = array(
                'supports' => $supports,
                'labels' => $labels,
                'public' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'zrealizowane'),
                'has_archive' => true,
                'hierarchical' => false,
                );
                register_post_type('zrealizowane', $args);
                }
                add_action('init', 'cw_post_type_zrealizowane');

        
        
        function ekosem_add_persons()
        {
            $data_to_add = $_POST['credentials'];
            $schooling = $_POST['schooling'];
            $declarant = $_POST['declarant_data'];

            $declarant_credentials = "";

            $declarant_credentials .= "Adres: ".$declarant[0]["address"].", ";
            $declarant_credentials .= "Kod pocztowy: ".$declarant[0]["postal"].", ";
            $declarant_credentials .= "NIP: ".$declarant[0]["nip"];

            global $wpdb;

            $add_declarant = "INSERT INTO wp_ekosem_declarants (declarant_name, declarant_credentials, contact_person, contact_person_phone, contact_person_email) VALUES ('".$declarant[0]["declarant"]."','".$declarant_credentials."','".$declarant[0]["con_person"]."','".$declarant[0]["con_phone"]."','".$declarant[0]["email"]."');";
            
            $the_query = "INSERT INTO wp_ekosem_participants (topic, name, surname, declarant) VALUES";
                
            for($i=0; $i<count($data_to_add); $i++){
                if($i == count($data_to_add)-1){
                    $the_query .= "('".$schooling."','".$data_to_add[$i]["name"]."','".$data_to_add[$i]["surname"]."','".$data_to_add[$i]["declarant"]."')";
                }
                else{
                    $the_query .= "('".$schooling."','".$data_to_add[$i]["name"]."','".$data_to_add[$i]["surname"]."','".$data_to_add[$i]["declarant"]."'),";
                }
            }
                
            $insert_flag = true;

            if($wpdb->query($add_declarant)){
                $insert_flag = true;
            }
            else{
                $insert_flag = false;
            }

            if($wpdb->query($the_query)){
                $insert_flag = true;
            }
            else{
                $insert_flag = false;
            }

            if($insert_flag == false){
                echo "<p class='response-text' style='color:red; font-weight: bold; font-size: 14px'>Coś poszło nie tak :(</p>";
            }
            else{
                echo "<p class='response-text' style='color:green; font-weight: bold; font-size: 14px'>Uczestnicy zarejestrowani pomyślnie :)</p>";
            }
                

            $email_to = $declarant[0]["email"];

            $subject = "Drogi kliencie, dokonałeś zapisu uczestników na szkolenie";
                $content = "<!DOCTYPE html>
                <html xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office'>
                
                <body>
                  <table role='presentation' class='vb-outer' width='100%' cellpadding='0' border='0' cellspacing='0' bgcolor='#f07c1d'
                    style='background-color: #f07c1d;' id='ko_logoBlock_5'>
                    <tbody>
                      <tr>
                        <td class='vb-outer' align='center' valign='top' style='padding-left: 9px; padding-right: 9px; font-size: 0;'>
                          <div style='margin: 0 auto; max-width: 570px; -mru-width: 0px;'>
                            <table role='presentation' border='0' cellpadding='0' cellspacing='9' bgcolor='#ffffff' width='570'
                              class='vb-row'
                              style='border-collapse: separate; width: 100%; background-color: #ffffff; mso-cellspacing: 9px; border-spacing: 9px; max-width: 570px; -mru-width: 0px;'>
                
                              <tbody>
                                <tr>
                                  <td align='center' valign='top' style='font-size: 0;'>
                                    <div style='vertical-align: top; width: 100%; max-width: 276px; -mru-width: 0px;'>
                                      <table role='presentation' class='vb-content' border='0' cellspacing='9' cellpadding='0'
                                        width='276'
                                        style='border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px;'>
                
                                        <tbody>
                                          <tr>
                                            <td width='100%' valign='top' align='center' class='links-color'>
                                              <img border='0' hspace='0' align='center' vspace='0' width='258'
                                                style='border: 0px; display: block; vertical-align: top; height: auto; margin: 0 auto; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; width: 100%; max-width: 258px; height: auto;'
                                                src='".plugins_url("ekosem-szkolenia/Component_1___1-removebg-preview.png")."'>
                
                                            </td>
                                          </tr>
                
                                        </tbody>
                                      </table>
                                    </div>
                                  </td>
                                </tr>
                
                              </tbody>
                            </table>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <table role='presentation' class='vb-outer' width='100%' cellpadding='0' border='0' cellspacing='0' bgcolor='#f07c1d'
                    style='background-color: #f07c1d;' id='ko_titleBlock_7'>
                    <tbody>
                      <tr>
                        <td class='vb-outer' align='center' valign='top' style='padding-left: 9px; padding-right: 9px; font-size: 0;'>
                
                          <div style='margin: 0 auto; max-width: 570px; -mru-width: 0px;'>
                            <table role='presentation' border='0' cellpadding='0' cellspacing='0' bgcolor='#ffffff' width='570'
                              class='vb-row'
                              style='border-collapse: separate; width: 100%; background-color: #ffffff; mso-cellspacing: 0px; border-spacing: 0px; max-width: 570px; -mru-width: 0px;'>
                
                              <tbody>
                                <tr>
                                  <td align='center' valign='top' style='font-size: 0; padding: 0 9px;'>
                                    <div style='vertical-align: top; width: 100%; max-width: 552px; -mru-width: 0px;'>
                
                                      <table role='presentation' class='vb-content' border='0' cellspacing='9' cellpadding='0'
                                        style='border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px;'
                                        width='552'>
                
                                        <tbody>
                                          <tr>
                                            <td width='100%' valign='top' align='center'
                                              style='font-weight: normal; color: #3f3f3f; font-size: 22px; font-family: Arial, Helvetica, sans-serif; text-align: center;'>
                                              <span style='font-weight: normal;'><strong>Dokonano rejestracji uczestników na szkolenie o temacie: ".$schooling."</strong></span></td>
                                          </tr>
                
                                        </tbody>
                                      </table>
                                    </div>
                                  </td>
                                </tr>
                
                              </tbody>
                            </table>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <table role='presentation' class='vb-outer' width='100%' cellpadding='0' border='0' cellspacing='0' bgcolor='#f07c1d'
                    style='background-color: #f07c1d;' id='ko_textBlock_8'>
                    <tbody>
                      <tr>
                        <td class='vb-outer' align='center' valign='top' style='padding-left: 9px; padding-right: 9px; font-size: 0;'>
                          <div style='margin: 0 auto; max-width: 570px; -mru-width: 0px;'>
                            <table role='presentation' border='0' cellpadding='0' cellspacing='18' bgcolor='#ffffff' width='570'
                              class='vb-container'
                              style='border-collapse: separate; width: 100%; background-color: #ffffff; mso-cellspacing: 18px; border-spacing: 18px; max-width: 570px; -mru-width: 0px;'>
                
                              <tbody>
                                <tr>
                                  <td class='long-text links-color' width='100%' valign='top' align='left'
                                    style='font-weight: normal; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; text-align: left; line-height: normal;'>
                                    <p style='margin: 1em 0px; margin-top: 0px; text-align: center;'>Drogi kliencie !</p>
                                    <p style='margin: 1em 0px; text-align: center;'>&nbsp;</p>
                                    <p style='margin: 1em 0px; margin-bottom: 0px; text-align: center;'>Bardzo dziękujemy Ci za rejestrację uczestników na organizowane przez nas szkolenie. 
                                    Więcej informacji o szkoleniu znajdziesz na naszej stronie. W razie jakichkolwiek pytań, prosimy o kontakt z nami przez formularz kontaktowy.</p>
                                    <p style='margin: 1em 0px; text-align: center;'>Dziękujemy, zespół EkoSem.pl :)</p>
                                  </td>
                                </tr>
                
                              </tbody>
                            </table>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <table role='presentation' class='vb-outer' width='100%' cellpadding='0' border='0' cellspacing='0' bgcolor='#3f3f3f'
                    style='background-color: #3f3f3f;' id='ko_socialBlock_9'>
                    <tbody>
                      <tr>
                        <td class='vb-outer' align='center' valign='top' style='padding-left: 9px; padding-right: 9px; font-size: 0;'>
                          <div style='margin: 0 auto; max-width: 570px; -mru-width: 0px;'>
                            <table role='presentation' border='0' cellpadding='0' cellspacing='9'
                              style='border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; max-width: 570px; -mru-width: 0px;'
                              width='570' class='vb-row'>
                
                              <tbody>
                                <tr>
                                  <td align='center' valign='top' style='font-size: 0;'>
                                    <div style='width: 100%; max-width: 552px; -mru-width: 0px;'>
                                      <div class='mobile-full'
                                        style='display: inline-block; vertical-align: top; width: 100%; max-width: 276px; -mru-width: 0px; min-width: calc(50%); max-width: calc(100%); width: calc(304704px - 55200%);'>
                                        <table role='presentation' class='vb-content' border='0' cellspacing='9' cellpadding='0'
                                          style='border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; -yandex-p: calc(2px - 3%);'
                                          width='276' align='left'>
                
                                          <tbody>
                                            <tr>
                                              <td class='long-text links-color' width='100%' valign='top' align='left'
                                                style='font-weight: normal; color: #919191; font-size: 13px; font-family: Arial, Helvetica, sans-serif; text-align: left;'>
                                                <p style='margin: 1em 0px; margin-bottom: 0px; margin-top: 0px; text-align: center;'>
                                                  <span style='color: #ffffff;'>&copy; 2020 EkoSem.pl</span></p>
                                              </td>
                                            </tr>
                
                                          </tbody>
                                        </table>
                                      </div>
                
                                      <div class='mobile-full'
                                        style='display: inline-block; vertical-align: top; width: 100%; max-width: 276px; -mru-width: 0px; min-width: calc(50%); max-width: calc(100%); width: calc(304704px - 55200%);'>
                                        <table role='presentation' class='vb-content' border='0' cellspacing='9' cellpadding='0'
                                          style='border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; -yandex-p: calc(2px - 3%);'
                                          width='276' align='left'>
                
                                          <tbody>
                                            <tr>
                                              <td width='100%' valign='top'
                                                style='font-size: 6px; font-weight: normal; text-align: right;' align='right'
                                                class='links-color socialLinks mobile-textcenter'>
                
                                              </td>
                                            </tr>
                
                
                                          </tbody>
                                        </table>
                
                                      </div>
                
                                    </div>
                                  </td>
                                </tr>
                
                              </tbody>
                            </table>
                          </div>
                
                        </td>
                      </tr>
                    </tbody>
                  </table>
                
                </body>
                
                </html>";
        
                $headers = array('Content-Type: text/html; charset=UTF-8','<meta name="viewport" content="initial-scale=1.0">');
        
                wp_mail( $email_to, $subject, $content, $headers );


            die();
            }

            add_action('wp_ajax_handle_participants','ekosem_add_persons');

            function add_ajaxurl() {
                echo '<script type="text/javascript">
                 var ajaxurl = "' . admin_url('admin-ajax.php') . '";
                </script>';
            }
            add_action('wp_head', 'add_ajaxurl');
?>