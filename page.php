<!-- Header -->
<?php
get_header();
?>
<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <?php the_title('<h2>', '</h2>'); ?>
            <?php
            echo "<p>" . $post->post_content . "</p>";
            ?> 
        </header>
        <section id="content">
            <?php echo get_custom_field('main_text'); ?>
        </section>
    </div>
</div>
<?
getIncludes(['needed']);
get_footer();
?>