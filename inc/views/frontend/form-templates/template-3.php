<?php
// Heading Text
if ( $heading_show && !empty( $heading_text ) ) {
    ?>
    <h2 class="stdl-heading-text"><?php echo $this->sanitize_html( $heading_text ); ?></h2>
    <?php
}
?>
<?php
// Sub Heading Text
if ( $sub_heading_show && !empty( $sub_heading_text ) ) {
    ?>
    <p class="stdl-heading-text stdl-heading-paragraph"><?php echo $this->sanitize_html( $sub_heading_text ); ?></p>
    <?php
}
?>
<div class="both-fields-wrap">

    <?php
    // Name Field
    if ( $name_show ) {
        ?>
        <div class="stdl-field-wrap name-field has-pre-icon">
            <label for="stdl_name" class="sr-only stdl-hidden-item"><?php echo esc_attr( $name_label ); ?></label>
            <input type="text" name="stdl_name" class="stdl-name" placeholder="<?php echo esc_attr( $name_label ); ?>"/>
            <i class="fas fa-user"></i>
        </div>
        <?php
    }
    ?>
    <!--Email Field-->
    <div class="stdl-field-wrap has-pre-icon">
        <label for="stdl_email" class="sr-only stdl-hidden-item"><?php echo esc_attr( $email_label ); ?></label>
        <input type="email" name="stdl_email" class="stdl-email" placeholder="<?php echo esc_attr( $email_label ); ?>"/>
        <i class="far fa-envelope"></i>
    </div>
    <!-- Email Field-->
</div>

<?php
// Terms and Agreement Text
if ( $terms_agreement_show && !empty( $terms_agreement_text ) ) {
    ?>
    <div class="stdl-field-wrap stdl-terms-agreement-wrap stdl-check-box-text">
        <label>
            <input type="checkbox" name="stdl_terms_agreement" class="stdl-terms-agreement"/>
            <?php echo $this->sanitize_html( $terms_agreement_text ); ?>
        </label>
    </div>
    <?php
}
?>

<!-- Subscribe Button-->
<div class="stdl-field-wrap stdl-btn-parent">
    <input type="submit" name="stdl_form_submit" class="stdl-form-submit" value="<?php echo esc_attr( $subscribe_button_text ); ?>"/>

</div>



<?php
// Footer Text
if ( $footer_show && !empty( $footer_text ) ) {
    ?>
    <div class="stdl-footer-text"><?php echo $this->sanitize_html( $footer_text ); ?></div>
    <?php
}
?>

<div class="stdl-form-message"></div>
<span class="stdl-form-loader-wraper">
        <div class="stdl-form-loader stdl-form-loader-1"><?php esc_html_e('Loading...','subscribe-to-download-lite');?></div>
    </span>
