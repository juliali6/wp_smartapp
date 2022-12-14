<?php

/**
 * Plugin Name:       Julia
 * Plugin URI:        http://myprojuliasmartapp
 * Description:       Custom form
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      8.1
 * Author:            Julia
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       julia
 * Domain Path:       /languages
 */


// Вывод пункта меню
function julia_show_nav_item(){
    add_menu_page(
        esc_html__('Welcome to plugin page', 'julia'),
        esc_html__('Julia Options', 'julia'),
        'manage_options',
        'julia-options',
        'custom_form_show_content',
        'dashicons-art',
        11

    );
}
add_action('admin_menu', 'julia_show_nav_item', 'custom_form_show_content');

function custom_form_show_content(){

    $validation_messages = [];
    $success_message = '';

    if ( isset( $_POST['contact_form'] ) ) {

        //Очистка данных
        $first_name = isset( $_POST['first_name'] ) ? sanitize_text_field( $_POST['first_name'] ) : '';
        $last_name = isset( $_POST['last_name'] ) ? sanitize_text_field( $_POST['last_name'] ) : '';
        $subjects = isset( $_POST['subjects'] ) ? sanitize_text_field( $_POST['subjects'] ) : '';
        $email     = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
        $message   = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

        //Проверка данных на валидность
        if ( strlen( $first_name ) === 0 ) {
            $validation_messages[] = esc_html__( 'Please enter a valid first_name.', 'myprojuliasmartapp.com' );
        }

        if ( strlen( $last_name ) === 0 ) {
            $validation_messages[] = esc_html__( 'Please enter a valid last_name.', 'myprojuliasmartapp.com' );
        }

        if ( strlen( $subjects ) === 0 ) {
            $validation_messages[] = esc_html__( 'Please enter a valid subject', 'myprojuliasmartapp.com' );
        }

        if ( strlen( $email ) === 0 or
            ! is_email( $email ) ) {
            $validation_messages[] = esc_html__( 'Please enter a valid email address.', 'myprojuliasmartapp.com' );
        }

        if ( strlen( $message ) === 0 ) {
            $validation_messages[] = esc_html__( 'Please enter a valid message.', 'myprojuliasmartapp.com' );
        }

        //Отправка электронного письма админу, если ошибок ввода нет
        if ( empty( $validation_messages ) ) {

            $mail    = get_option( 'admin_email' );
            $subject = $subjects . 'Subject';
            $user = $first_name . $last_name . 'User';
            $message = $message . ' - User: ' . $email;

            wp_mail( $mail, $subject, $user, $message );

            $success_message = esc_html__('Your message has been successfully sent.','myprojuliasmartapp.com' );

        }

    }

    //Вывод сообщений, если пользователь ввел невалидные данные
    if ( ! empty( $validation_messages ) ) {
        foreach ( $validation_messages as $validation_message ) {
            echo '<div class="validation-message">' . esc_html( $validation_message ) . '</div>';
        }
    }

    //Вывод сообщения об успешной отправке формы
    if ( strlen( $success_message ) > 0 ) {
        echo '<div class="success-message">' . esc_html( $success_message ) . '</div>';
    }

//    echo "Fist_name: $first_name <br> Last_name: $last_name <br> Subject: $subjects <br> Email: $email <br>Message: $message";


    ?>

    <!-- HTML форма отображений полей -->
    <div id="validation-messages-container"></div>

    <form id="contact-form" action="<?php echo esc_url( get_permalink() ); ?>"
          method="post">

        <input type="hidden" name="contact_form">

        <div class="form-section">
            <label for="first-name"><?php echo esc_html( 'First Name' ); ?></label>
            <input type="text" maxlength="10" id="first-name" name="first_name">
        </div>

        <div class="form-section">
            <label for="last-name"><?php echo esc_html( 'Last Name' ); ?></label>
            <input type="text" maxlength="20" id="last-name" name="last_name">
        </div>

        <div class="form-section">
            <label for="subjects"><?php echo esc_html( 'Subject' ); ?></label>
            <input type="text" maxlength="25" id="subjects" name="subjects">
        </div>

        <div class="form-section">
            <label for="email"><?php echo esc_html( 'Email' ); ?></label>
            <input type="text" maxlength="30" id="email" name="email">
        </div>

        <div class="form-section">
            <label for="message"><?php echo esc_html( 'Message' ); ?></label>
            <textarea id="message" maxlength="1000" name="message"></textarea>
        </div>

        <input type="submit" id="contact-form-submit" value="<?php echo esc_attr( 'Submit' ); ?>">

    </form>

    <?php
}

// Регистрируем новый шорткод: [custom_form]
add_shortcode( 'custom_form', 'custom_form_show_content' );







