<?php
/*
  Template Name: Organisator page
 */
?>
<!--<div id="banner"></div>-->
<!-- Header -->
<?php
get_header();
$user_ID = get_current_user_id();
if ($user_ID == 3 || $user_ID == 1) {
    //1 = admin
    //3 = organisatie
    ?>
    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Welkom organisatie</h2> 
                <p>de hulptool voor het organiseren.</p>
            </header>
            <section>
                <a href ="http://esmc.nl/wp-admin/post-new.php?post_type=activiteiten">activiteit toevoegen</a><br/>
                <a href="<?php bloginfo('template_url'); ?>/assets/pdf/Nieuwe_activiteit_toevoegen_2016.compressed.pdf" target="_blank">draaiboek activiteiten</a><br/>
                <a href="<?php bloginfo('template_url'); ?>/assets/pdf/Nieuw_inschrijfformulier_maken_2016.compressed.pdf" target="_blank">draaiboek nieuw inschrijfformulier</a><br/><br/>
            </section>
            <div class="row 150%">
                <div class="4u 12u$(medium)">
                    <!-- Sidebar -->
                    <section id="sidebar">
                        <p class="participants"></p>
                    </section>

                </div>
                <div class="8u$ 12u$(medium) important(medium)"> 
                    <section id="two" class="eventDetails">
                        <?
                        $args = array(
                            'post_type' => 'activiteiten',
                            'orderby' => 'meta_value_num',
                            'post_status' => array('publish'),
                            'meta_key' => 'datum_activiteit',
                            'order' => 'DESC'
                        );

                        $query = new WP_Query($args);
                        ?>
                        Kies hier je activiteit<br/>
                        <select>
                            <?
                            while ($query->have_posts()) {
                                $query->the_post();
                                $post_id = get_the_ID();
                                echo "<option name='" . $post_id . "'>";
                                $object = getActivityNames($post_id);
                                echo makeUpDate($object['datum']) . " " . $object['name'] . ", door " . $object['organisator'];
                            }
                            wp_reset_query();
                            ?>
                        </select>
                        <p class="activityDetails">
                        </p>
                    </section>
                </div>
            </div>
        </div>
        <!-- Footer -->
    </div>
    <?
} else{
    wp_redirect('http://esmc.nl/wp-login.php?redirect_to=http%3A%2F%2Fesmc.nl%2Forganisatie', 301);
    exit;
}
getIncludes(['organisator' , 'needed']);
get_footer();
?>