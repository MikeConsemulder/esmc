<?php
/*
  Template Name: Videos template
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
                'post_type' => 'videos',
                'orderby' => 'meta_value_num',
                'meta_key' => 'datum',
                'order' => 'DESC',
                'meta_query' => array(
                    array(
                        'value' => date('Ymd', strtotime("today")),
                        'compare' => '<=',
                        'type' => 'DATE'
                    )
                )
            );
            ?>
            <div id='youtubeContainer' class='movie'>
                <?
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()):
                    while ($the_query->have_posts()) : $the_query->the_post();
                        $string = get_custom_field('youtube_link', FALSE);
                        $search = '#(.*?)(?:href="https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch?.*?v=))([\w\-]{10,12}).*#x';
                        $replace = 'http://www.youtube.com/embed/$2';
                        $url = preg_replace($search, $replace, $string);
                        ?>
                        <iframe class="youtubePlayer" src="<? echo $url; ?>" allowfullscreen="allowfullscreen">
                        </iframe>
                        <?
                    endwhile;
                    ?>
                    <div style="clear: both"></div>
                </div>
                <?
                wp_reset_postdata();
            else:
                echo '<p>No content found</p>';
            endif;
            ?>
        </section>
    </div>
</div>
<?
getIncludes(['needed']);
get_footer();
?>