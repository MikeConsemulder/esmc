<?php
/*
  Template Name: Oud bestuur
 */
?>
<!-- Header -->
<?php
get_header();
?>
<!-- Header -->
<!-- Main -->
<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <?php the_title('<h2>', '</h2>'); ?>
            <?php
            echo "<p>" . $post->post_content . "</p>";
            ?>
        </header>
        <!-- Content -->
        <section id="content">
            <?php
            echo get_custom_field('main_text');
            $args = array(
                'post_type' => 'besturen',
                'orderby' => 'meta_value_num',
                'meta_key' => 'bestuur_nummer',
                'order' => 'DESC',
            );
            ?>
            <?
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()):
                while ($the_query->have_posts()) : $the_query->the_post();
                    $bestuur_nummer = get_custom_field('hoeveelste_bestuur', FALSE);
                    $bestuur_jaar = get_custom_field('jaar_van_tot', FALSE);
                    $bestuur_naam = get_custom_field('bestuur_naam', FALSE);
                    $bestuur_namen_functies = get_custom_field('namen_en_functies', FALSE);

                    echo $bestuur_nummer . " " . $bestuur_jaar . "<br/>";
                    echo $bestuur_naam . "<br/>";
                    echo $bestuur_namen_functies . "<br/>";
                endwhile;
                ?>
                <?
                wp_reset_postdata();
            else:
                echo '<p>No content found</p>';
            endif;
            ?>
        </section>
    </div>
    <!-- Footer -->
</div>
<?
getIncludes(['needed']);
get_footer();
?>