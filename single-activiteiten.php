<!-- <link rel="stylesheet" href="<?php //bloginfo('template_url'); ?>/assets/css/inschrijfform/activiteitSignUpForm.css" type="text/css" />-->
        <div id="page-wrapper">
            <!-- Header -->
            <?php
            get_header();
            if (have_posts()) : while (have_posts()) : the_post();
            ?>
            <!-- Header -->
            <!-- Main -->
            <div id="main" class="wrapper style1">
                <div class="container">
                    <header class="major">
                        <?php the_title('<h2>', '</h2>'); ?>
                        <span id="datumActiviteit"><? echo makeUpDate(get_custom_field('datum_activiteit'))?></span><br/>
                    </header>

                    <!-- Content -->
                    <div style="height: 5000px;">
                    <section id="content">
                        <?php
                        $imgUrl = wp_get_attachment_url(get_custom_field('banner'));
                       the_content();
                       endwhile;
                        endif; ?>
                    </section>
                    <section class="commentSection">
                        <h3>Laatste updates en vragen</h3>
                        <?php
                        comments_template();
                        ?>
                    </section>
                        <section class="signUpContainer">
                            <section id="activityText">
                            </section>
                            <form></form>
                        </section>
                    </div>
                </div>
            </div>

            <!-- Footer -->
        </div>
        <?php
        $ID = get_the_ID();
        $args = array('p' => $ID, 'post_type' => 'activiteiten');
        $loop = new WP_Query($args);
        while ($loop->have_posts()) : $loop->the_post();
            global $post;
            $formId = get_custom_field('type_inschrijfformulier');
            $uiterlijkeInschrijfdatum = get_custom_field('uiterlijke_inschrijfdatum');
        endwhile;
        getIncludes(['activiteit' , 'needed']);
        get_footer();
        ?>
        <script>
            $(document).ready(function () {
                var uiterlijkeInschrijfdatum = '<? echo $uiterlijkeInschrijfdatum; ?>';
                var formId = <? echo $formId ?>;
                var activiteitId = <? echo $ID; ?>;
                var textContainer = $("#activityText");
                var FormContainer = $(".signUpContainer form");
                //
                //
                if ($.isNumeric(formId)) {
                    textContainer.append("<br/><br/><strong><a href='esmc.nl/inschrijvingen?id=" + activiteitId + "'>Inschrijvingen</a></strong>");
                    if ($.isNumeric(uiterlijkeInschrijfdatum)) {
                        var jaar = uiterlijkeInschrijfdatum.substr(0, 4);
                        var maand = uiterlijkeInschrijfdatum.substr(4, 2);
                        var dag = uiterlijkeInschrijfdatum.substr(6, 2);
                        var today = new Date();
                        var deadline = new Date();
                        deadline.setFullYear(jaar, maand - 1, dag);
                        if (deadline >= today) {
                            console.log('uiterlijke inschrijfdatum nog niet bereikt');
                            makeAndShowForm(formId, activiteitId, textContainer, FormContainer, false);
                        } else {
                            textContainer.append("<br/><br/><strong><span style='color:red;'>Inschrijvingen gesloten!</span></strong>");
                            console.log('inschrijvingen gesloten');
                        }
                    } else {
                        console.log('geen uiterlijke inschrijfdatum');
                        makeAndShowForm(formId, activiteitId, textContainer, FormContainer, false);
                    }
                } else {
                    console.log('geen inschrijfform');
                }
            });
        </script>
