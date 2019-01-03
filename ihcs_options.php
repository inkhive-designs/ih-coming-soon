<div class="coming-soon-admin">
    <p class="ihcs-title"><b><?php _e('IH Coming Soon Plugin', 'ihcs'); ?></b> <small><?php _e('Version 0.9', 'ihcs'); ?></small></p>
    <div class="ihcs-body-content">
        <br>
        <?php
        // Saving data
        if(isset( $_POST['enable_disable'])){
            update_option( 'enable_disable', $_POST['enable_disable']); //Send to value to database
        } else {
            update_option( 'enable_disable', ''); //Send to value to database
        }

        if(isset( $_POST['ihcs_text_input'])){
            $itext = sanitize_text_field($_POST['ihcs_text_input']);//Sanitize input and convert to interger
            update_option( 'ihcs_text_input', $itext); //Send value to database
        }
        if(isset( $_POST['ihcs_text_input_message'])){
            $itext = sanitize_text_field($_POST['ihcs_text_input_message']);//Sanitize input and convert to interger
            update_option( 'ihcs_text_input_message', $itext); //Send value to database
        }
        if(isset( $_POST['ihcs_text_input_cta'])){
            $itext = sanitize_text_field($_POST['ihcs_text_input_cta']);//Sanitize input and convert to interger
            update_option( 'ihcs_text_input_cta', $itext); //Send value to database
        }
        if(isset( $_POST['ihcs_text_input_url'])){
            $itext = sanitize_text_field($_POST['ihcs_text_input_url']);//Sanitize input and convert to interger
            update_option( 'ihcs_text_input_url', $itext); //Send value to database
        }
        if(isset( $_POST['banner_id'])){
            $banner_id = intval(sanitize_text_field($_POST['banner_id']));//Sanitize input and convert to interger
            $banner_id	=	absint( $banner_id); //Make sure value is not a negative otherwise convert it
            update_option( 'banner_id', $banner_id); //Send value to database
        }
        if(isset( $_POST['ihcs_input_coundown'])){
            $itext = sanitize_text_field($_POST['ihcs_input_coundown']);//Sanitize input and convert to interger
            update_option( 'ihcs_input_coundown', $itext); //Send value to database
        }
        ?>

        <form method="POST">
            <?php var_dump(get_option('enable_disable')); ?>
            <p class="ihcs-settings"><?php _e('General Settings', 'ihcs'); ?></p>
            <table class="ihcs-form-table">
                <tr>
                    <th>
                        <?php _e('Enable | Disable', 'ihcs'); ?>
                    </th>
                    <td>
                        <input type="checkbox" class="menu-item-checkbox" id="enable_disable" name="enable_disable" value="1" <?php if ( isset( $_POST['enable_disable']) ) checked(get_option('enable_disable'),  1 ); ?> />
                        <?php _e( 'Check to Enable and Uncheck to Disable Coming Soon Page', 'ihcs' ); ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?php _e( 'Heading', 'ihcs' ); ?>
                    </th>
                    <td>
                        <input id="ihcs_text_input" name="ihcs_text_input" type="text" value="<?php echo !empty(get_option( 'ihcs_text_input' ))? (get_option('ihcs_text_input')):''; ?>" />
                        <?php _e( 'Enter a Headline to display on Coming Soon Page', 'ihcs' ); ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?php _e( 'Select a Banner Image', 'ihcs' ); ?>
                    </th>
                    <td>
                        <div class="img-screenshot clearfix">
                            <div class="screen-thumbnail"><img id="ihcsban" src="<?php echo wp_get_attachment_url( get_option('banner_id')); ?>" /></div>
                        </div>
                        <input id="upload-button" type="button" value="Upload Image" class="button upload_img" />
                        <input id="clear-button" class="button" type="button" value="<?php esc_html_e('Clear', 'ihcs') ?>"/><div class="clearfix"></div>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?php _e( 'Message', 'ihcs' ); ?>
                    </th>
                    <td>
                        <input id="ihcs_text_input_message" name="ihcs_text_input_message" type="text" value="<?php echo !empty(get_option( 'ihcs_text_input_message' ))? (get_option('ihcs_text_input_message')):''; ?>" />
                        <?php _e( 'Write your Message here to be displayed with following button.', 'ihcs' ); ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?php _e( 'Enter Button Name', 'ihcs' ); ?>
                    </th>
                    <td>
                        <input id="ihcs_text_input_cta" name="ihcs_text_input_cta" type="text" value="<?php echo !empty(get_option( 'ihcs_text_input_cta' ))? (get_option('ihcs_text_input_cta')):''; ?>" /><div class="clearfix"></div>
                        <?php _e( 'Enter a button name', 'ihcs' ); ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?php _e( 'Enter Button URL', 'ihcs' ); ?>
                    </th>
                    <td>
                        <input id="ihcs_text_input_url" name="ihcs_text_input_url" type="text" value="<?php echo !empty(get_option( 'ihcs_text_input_url' ))? (get_option('ihcs_text_input_url')):''; ?>" /><div class="clearfix"></div>
                        <?php _e( 'Enter a link for CTA Button', 'ihcs' ); ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?php _e( 'Select Countdown Date & Time', 'ihcs' ); ?>
                    </th>
                    <td class="selected-date">
                        <?php _e( 'Select Date & Time', 'ihcs' ); ?>
                        <input type="hidden" id="ihcs_input_coundown" name="ihcs_input_coundown" value="<?php echo (!empty(get_option('ihcs_input_coundown')) ? get_option('ihcs_input_coundown') : '' ) ?> " />
                        <input type="text" autocomplete="off" class="date-input" name="ihcs_input_coundown" placeholder="Click Here..." value="<?php echo (!empty(get_option('ihcs_input_coundown')) ? get_option('ihcs_input_coundown') : '' ) ?> " readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type='hidden' name='banner_id' id='banner_id' value='<?php echo !empty(get_option( 'banner_id' ))? (get_option('banner_id')):'#'; ?>' />
                        <input type="submit" class="button button-primary" name="save_settings" value="Save Changes" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="ihcs-misc-content">
        <div class="about-sec">
            <h3>
                <?php _e( 'About IHCS Plugin', 'ihcs' ); ?>
            </h3>
            <p>
                <?php _e( 'This IHCS Plugin is Coming Soon Plugin Designed by InkHive Designs. You can use it to create a coming soon banner for your upcoming website.', 'ihcs' ); ?>
            </p>
        </div>
        <div class="feature-sec">
            <h3>
                <?php _e( 'IHCS Features', 'ihcs' ); ?>
            </h3>
            <ul>
                <li><?php _e( 'Much Easier to Use', 'ihcs' ); ?></li>
                <li><?php _e( 'Ads Free', 'ihcs' ); ?></li>
                <li><?php _e( 'Ultra Lite', 'ihcs' ); ?></li>
                <li><?php _e( 'More Controls in Next Version', 'ihcs' ); ?></li>
            </ul>
        </div>

        <div class="formatting-sec">
            <h3>
                <?php _e( 'Format Content', 'ihcs' ); ?>
            </h3>

            <form method="post">
                <p><?php _e( 'Font Size', 'ihcs' ); ?></p>
                <select id="ihcs_font_size">
                    <option><?php _e( 'Small', 'ihcs' ); ?></option>
                    <option><?php _e( 'Medium', 'ihcs' ); ?></option>
                    <option><?php _e( 'Large', 'ihcs' ); ?></option>
                </select>

                <div class="clearfix"></div>

                <p><?php _e( 'Font Family', 'ihcs' ); ?>
                    <select id="ihcs_font_family" name="ihcs_font_family" onchange="location = this.value;">
                        <option value=""><?php _e( 'Default', 'ihcs' ); ?></option>
                        <option value="roboto"><?php _e( 'Roboto', 'ihcs' ); ?></option>
                        <option value="raleway"><?php _e( 'Raleway', 'ihcs' ); ?></option>
                        <option value="arimo"><?php _e( 'Arimo', 'ihcs' ); ?></option>
                    </select>
            </form>
        </div>
    </div>
</div>
