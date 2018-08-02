<?php
/*
  Template Name: foto's page
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
				<h2>Foto's</h2>
				<p>Foto's uit het archief</p>
			</header>
			<section>
				<h3>Foto's</h3>
				<p>Hier vind je de foto's per activiteit.</p>
			</section>
			<div class="row 150%">
				<div class="4u 12u$(medium)">

					<!-- Sidebar -->
					<section id="sidebar">
						<hr/>
						<section>
							<h3>Foto's plaatsen?</h3>
							<p>De foto's zijn gekoppeld aan het ESMC Flickr
								account. Klik op de knop op een foto te
								uploaded. je kunt hier ook alle albums
								downloaden</p>
							<p>Als je de inloggegevens bent vergeten graag even
								contact opnemen met het bestuur</p>
							<footer>
								<ul class="actions">
									<li>
										<a href="https://www.flickr.com/photos/137988253@N04/albums"
										   class="button" target="_blank">Foto's
											downloaden/uploaden</a></li>
								</ul>
							</footer>
						</section>
					</section>
				</div>
				<div class="8u$ 12u$(medium) important(medium)">
					<h2 class="foto_uitleg">Bekijk hier de foto's van onze activiteiten</h2>
					<div class="esmc_pictures">
						<?php
						foreach(get_album_list() as $key => $album_info){
							?>
							<div class="photo_album" style="background-image: url('<?php echo $album_info['album_cover']; ?>')" id="<?php echo $album_info['id']; ?>">
							<?php
							//$album_info['id']." ".
							//$album_info['description']
							echo "<span class='album_title'>".$album_info['title']."</span>";
							?>
							</div>
							<?php
						}
						?>
					</div>
					<div class="photos_container">
					</div>
				</div>
			</div>
		</div>
		<!-- Footer -->
	</div>
<?
getIncludes(['fotos','needed']);
get_footer();
?>