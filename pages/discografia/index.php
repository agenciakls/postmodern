<main role="main">
	<section class="jumbotron text-center header-slogan" style="background-image: url('<?php echo baseUrl(); ?>images/banner-discografia.jpg') !important;">		<div class="container">
			<!-- <img src="http://postmodernmastering.com/site/images/title_logo_2.png" width="350" alt=""> -->
		</div>
	</section>
	
	<div class="header-agendamento-sessao">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><?php echo langVar('page-discografia-title'); ?></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="agendamento-mixagens" id="tela-1">
		<div class="container">
			<div class="row content-mixagens">
				<div class="col-md-12 set-content">
					<h3></h3>
					<div align="center">
						
					<?php
					
					$listDiscografia = array(
						array( 'link' => 'https://links.altafonte.com/yoteamo_', 'img' => 'images/image-timmaia.jpeg' ),
						array( 'link' => 'https://itunes.apple.com/br/album/o-tempo-%C3%A9-agora/1418660856?l=en', 'img' => 'images/disco-claudia-brant.jpg' ),
						array( 'link' => 'https://music.apple.com/br/album/amor-pasado/1528253125', 'img' => 'images/amor-pasado.jpg' ),
						array( 'link' => 'https://music.apple.com/br/album/bruma-celebrating-milton-nascimento/1512653326', 'img' => 'images/bruma.jpg' ),
						array( 'link' => 'https://music.apple.com/br/album/harmonize/1462051893', 'img' => 'images/harmonize.jpg' ),
						array( 'link' => 'https://music.apple.com/br/album/outra-raz%C3%A3o/1500770837', 'img' => 'images/outra-razao.jpg' ),
						array( 'link' => 'https://itunes.apple.com/br/album/sincera/1437233081?l=en', 'img' => 'images/1.jpg' ),
						array( 'link' => 'https://itunes.apple.com/br/album/hora-certa-ep/1451636244?l=en', 'img' => 'images/2.jpg' ),
						array( 'link' => 'https://itunes.apple.com/br/album/n%C3%B3s-voz-eles/1443645499?l=en', 'img' => 'images/3.jpg' ),
						array( 'link' => false, 'img' => 'images/4.jpg' ),
						array( 'link' => 'https://www.amazon.com/Obra-Completa-1976-2010-Djavan/dp/B00PNOEFVS', 'img' => 'images/01-disco.jpg' ),
						array( 'link' => 'https://itunes.apple.com/br/album/reverence/1188441346?l=en', 'img' => 'images/02-disco.jpg' ),
						array( 'link' => 'https://itunes.apple.com/br/album/campos-neutrais/1292438268?l=en', 'img' => 'images/03-disco.jpg' ),
						array( 'link' => false, 'img' => 'images/04-disco.jpg' ),
						array( 'link' => 'https://itunes.apple.com/br/album/samba-de-chico/1098998572?l=en', 'img' => 'images/05-disco.jpg' ),
						array( 'link' => 'https://itunes.apple.com/br/album/vidas-pra-contar/1050317081?l=en', 'img' => 'images/06-disco.jpg' ),
						array( 'link' => 'https://itunes.apple.com/br/album/new-direction/1074367814?l=en', 'img' => 'images/07-disco.jpg' ),
						array( 'link' => 'https://itunes.apple.com/br/album/rheomusi/505231588?l=en', 'img' => 'images/08-disco.png' ),
						array( 'link' => 'https://itunes.apple.com/br/album/tocata-%C3%A0-amizade/962165770?l=en', 'img' => 'images/10-disco.jpg' ),
						array( 'link' => 'https://itunes.apple.com/br/album/mais-e-mais/1261995153?l=en', 'img' => 'images/11-disco.jpg' ),
						array( 'link' => 'https://itunes.apple.com/br/album/cool-romantics-feat-mafalda-minnozzi-paul-ricci/1365672664?l=en', 'img' => 'images/12-disco.jpg' ),
						array( 'link' => 'https://itunes.apple.com/br/album/orizzonti-sexteto/1335474065?l=en', 'img' => 'images/13-disco.jpg' ),
						array( 'link' => 'https://itunes.apple.com/br/album/bajo-mundo/1211995072?l=en', 'img' => 'images/14-disco.jpg' ),
						array( 'link' => 'https://itunes.apple.com/br/album/bossa-negra/904067057?l=en', 'img' => 'images/15-disco.jpg' ),
						array( 'link' => 'https://itunes.apple.com/br/album/derivaciviliza%C3%A7%C3%A3o/1181602360?l=en', 'img' => 'images/capa10010.jpg' ),
						array( 'link' => false, 'img' => 'images/16-disco.jpg' ),
						array( 'link' => false, 'img' => 'images/17-disco.jpg' ),
						array( 'link' => false, 'img' => 'images/19-disco.jpg' ),

					);
					$count = 1;
					foreach ($listDiscografia as $singleDiscografia) {
						?>
						<?php if ($singleDiscografia['link']) { ?>  <a href="<?php echo $singleDiscografia['link']; ?>" target="_blank"> <?php  } ?>
							<img src="<?php echo $singleDiscografia['img']; ?>" alt="" title="" style="padding-right: 4%; width: 217.72px; height: 169px;"/>
						<?php if ($singleDiscografia['link']) { ?>  </a> <?php  } ?>
						<?php if ($count == 4) { ?>  <br /><br /><br /> <?php  } ?>
						<?php
						$count = ($count != 4) ? $count + 1 : 1;
					}
					?>
					<br /><br /><br />					
						
					<!-- <button class="btn-post">Discografia Completa</button>
					<button class="btn-post">All Music Credits</button> -->
					
					
					</div><!---DIV CENTRALIZADA: Rafael Mendes ---->
					
				</div>

			</div>
		</div>
	</div>
</main>