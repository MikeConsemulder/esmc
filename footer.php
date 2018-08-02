<? wp_footer();?>
<script>
    $("nav li a").last().addClass("button special");
    $('nav div').contents().unwrap();
</script>
<!-- Scripts -->
<!-- /div for the page-wrapper -->
</div>
<!-- /div for the page-wrapper -->
<footer id="footer">
    <img  src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="ESMC logo">
    <ul class="copyright">
        <?php
        $ID = 85;
        $args = array('p' => $ID, 'post_type' => 'contactgegevens');
        $loop = new WP_Query($args);
        while ($loop->have_posts()) : $loop->the_post();
            global $post;
            echo "<li>" . get_custom_field('naam') . "</li>";
            echo "<li>" . get_custom_field('adres') . "</li>";
            echo "<li>" . get_custom_field('postcode') . "</li>";
            echo "<li>" . get_custom_field('plaats') . "</li>";
        endwhile;
        ?>
    </ul>
</footer>
<?php
getIncludes(['analytics']);
?>
</body>
</html>
