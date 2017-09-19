<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='<?php echo plugin_dir_url(__FILE__).'style.css'; ?>' type='text/css' media='all' />
    <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__).'bootstrap/css/bootstrap.min.css'; ?>" type="text/css" media="all" />
</head>
<body class="ih-coming-soon-banner">
<div id="coming-soon">
        <div class="banner">
            <img alt="Coming Soon" src="<?php echo get_theme_mod('ih_coming_soon_banner_image',''); ?>" />
        </div>
</div>
<?php if(get_theme_mod('ih_coming_soon_banner_text') !='' ): ?>
<div class="banner-text">
    <h3>
        <?php echo get_theme_mod('ih_coming_soon_banner_text'); ?>
    </h3>
</div>
<?php endif; ?>
</body>
</html>

