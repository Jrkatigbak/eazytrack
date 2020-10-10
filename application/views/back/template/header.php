<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Eazytrack</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url() ?>public/front/dist/img/logo/eazytrack.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?= base_url(); ?>public/back/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= base_url(); ?>public/back/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= base_url(); ?>public/back/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>public/back/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?= base_url(); ?>public/back/css/demo.css">
	<link rel="stylesheet" href="<?= base_url(); ?>public/css/custom-style.css">

	<!-- Timelines -->
	<link rel="stylesheet" href="<?= base_url() ?>public/css/timeline.css">

	<!-- Customs -->
	<link rel="stylesheet" href="<?= base_url() ?>public/custom/back/css/style.css">
	<link rel="stylesheet" href="<?= base_url()?>public/custom/back/css/preloader.css">

	<!-- ManyChat -->
	<script src="//widget.manychat.com/116448190198930.js" async="async"></script>
</head>