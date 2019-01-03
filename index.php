<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>Site Under Construction</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <?php wp_head(); ?>
    </head>
    <body class="ih-coming-soon-banner">
        <div id="coming-soon">
            <div class="banner">
                <img alt="Coming Soon" src="<?php echo wp_get_attachment_url( get_option('banner_id')); ?>" />
            </div>
            <div class="count-area col-md-12">
                <h1>
                    <?php echo get_option('ihcs_text_input'); ?>
                </h1>
                <p id="countdown"></p>
            </div>
        </div>
        <div class="banner-text">
            <h3>
                <?php echo get_option('ihcs_text_input_message'); ?>
            </h3>
            <div class="ihcs-cta">
                <a href="<?php echo get_option('ihcs_text_input_url'); ?>"><?php echo get_option('ihcs_text_input_cta'); ?></a>
            </div>
        </div>

    </body>
</html>

