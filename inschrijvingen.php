<?php
/*
  Template Name: inschrijvingen page
 */
get_header();
?>
<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <?php
            $content = $post->post_content;
            $post = get_post($_GET['id']);
            $title = $post->post_title;
            the_title('<h2>Inschrijvingen ', '</h2>');
            ?>
        </header>
        <section id="content">
            <div id="securityCheck" style="text-align: center;">
                <h3>Wegens privacy redenen hebben we dit deel afgeschermd. vraag het bestuur om de inloggegevens.</h3>
                <form style="width: 50%; margin-left:auto; margin-right: auto; min-width: 350px;">
                    <input type="text" name="login" id="login"><br/>
                    <input type="password" name="pass" id="pass"><br/>
                    <input type="button" value="vroem!" id="submit">
                </form>
            </div>
            <div class="table-wrapper">
                <table style="font-size: 0.8em;">
                    <thead>
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
<?
getIncludes(['inschrijvingen' , 'needed']);
get_footer();
?>