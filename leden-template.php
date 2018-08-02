<?php
/*
  Template Name: Leden template
 */
?>
<!-- Header -->
<?php
get_header();
?>
<!-- Main -->
<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Motoren van leden</h2>
            <p>een aantal motoren van onze leden.</p>
        </header>
            <div class="leden-container">
                <section>
                        <?php
                        foreach(get_members(true) as $key => $member_info){
                            echo "<div class='member_pic_container' style='background-image: url(".$member_info['motor'].")'>";
                            echo "<div class='motor_info'>".$member_info['motor_merk']." ".$member_info['motor_type']." ".$member_info['bouwjaar_motor'];
                            if($member_info['naam_op_website'] == 'Ja'){
                                echo "<br/>motor van: ".$member_info['voornaam'];
                            }else{
                                echo "<br/>...";
                            }
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>
                </section>
            </div>
    </div>
    <!-- Footer -->
</div>
<?
getIncludes(['leden','needed','reg_popup','tracking']);
get_footer();
?>