<!-- Header -->
<?php
get_header();
?>
<!-- Main -->
<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Activiteiten Kalender</h2> 
            <p>Een overzicht van de geplande evenementen.</p>
        </header>
        <div class="row 150%">
            <div class="4u 12u$(medium)">

                <!-- Sidebar -->
                <section id="sidebar">
                    <section>
                        <h3>Geplande activiteiten</h3>
                        <p>Hier vind je een overzicht van de geplande activiteiten. Je vindt hier de activiteiten die we door het gehele jaar plannen. Zoals motorweekenden, of een clubavond.</p>
                        <p>Voor de spontane evenementen zoals een toertocht, bbq of een stapavond is het verstandig om de facebook of whatsapp goed in de gaten te houden.</p>
                    </section>
                    <hr />
                    <section>
                        <h3>Foto's</h3>
                        <p>Voor foto's van activiteiten uit het verleden kun je terecht op onze foto pagina</p>
                        <footer>
                            <ul class="actions"> 
                                <li><a href="http://esmc.nl/fotos" class="button">Bekijk de foto's</a></li>
                            </ul>
                        </footer>
                    </section>
                    <!-- section activiteiten text -->
                    <section>

                    </section>
                </section>

            </div>
            <div class="8u$ 12u$(medium) important(medium)"> 
                <!-- Table -->
                <section id="two">
                    <h3>Aankomende activiteiten</h3>
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Naam</th>
                                    <th>Datum</th>
                                    <th>Organisatie</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $args = array(
                                    'post_type' => 'activiteiten',
                                    'orderby' => 'meta_value_num',
                                    'meta_key' => 'datum_activiteit',
                                    'post_status' => 'publish',
                                    'order' => 'ASC',
                                    'meta_query' => array(
                                        array(
                                            'value' => date('Ymd', strtotime("today")),
                                            'compare' => '>=',
                                            'type' => 'DATE'
                                        )
                                    )
                                );
                                $the_query = new WP_Query($args);
                                if ($the_query->have_posts()):
                                    while ($the_query->have_posts()) : $the_query->the_post();
                                        echo "<tr>";
                                        echo "<td><a href='" . get_permalink() . "' id='activity' class='" . get_the_ID() . "'>" . get_the_title() . "</a></td>";
                                        echo "<td>" . makeUpDate(get_custom_field('datum_activiteit', FALSE)) . "</td>";
                                        echo "<td>" . get_custom_field('organisator', FALSE) . "</td>";
                                        echo "</tr>";
                                    endwhile;
                                    wp_reset_postdata();
                                else:
                                    echo '<p>No content found</p>';
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- overzicht eerdere activiteiten -->
                    <h3>Eerdere activiteiten</h3>
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Naam</th>
                                    <th>Datum</th>
                                    <th>Organisatie</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $args = array(
                                    'post_type' => 'activiteiten',
                                    'orderby' => 'meta_value_num',
                                    'meta_key' => 'datum_activiteit',
                                    //'posts_per_page' => 10,
                                    'order' => 'DESC',
                                    'meta_query' => array(
                                        array(
                                            'value' => date('Ymd', strtotime("today")),
                                            'compare' => '<',
                                            'type' => 'DATE'
                                        )
                                    )
                                );
                                $the_query = new WP_Query($args);
                                if ($the_query->have_posts()):
                                    while ($the_query->have_posts()) : $the_query->the_post();
                                        echo "<tr>";
                                        echo "<td>" . get_the_title() . "</td>";
                                        echo "<td>" . makeUpDate(get_custom_field('datum_activiteit', FALSE)) . "</td>";
                                        echo "<td>" . get_custom_field('organisator', FALSE) . "</td>";
                                        echo "</tr>";
                                    endwhile;
                                    wp_reset_postdata();
                                else:
                                    echo '<p>No content found</p>';
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- -->
                </section>
            </div>
        </div>
    </div>
    <!-- Footer -->
</div>
<?
getIncludes(['needed']);
get_footer();
?>