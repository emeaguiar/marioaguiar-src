<?php
  define("EMAIL", "me@marioaguiar.net");

    include "validate.class.php";

    $errors = false;
    $success = false;

    $data = json_decode( file_get_contents( "php://input" ) );

    $name = sanitize_text_field( $data->name );
    $email = sanitize_email( $data->email );
    $subject = sanitize_text_field( $data->subject );
    $company = sanitize_text_field( $data->company );
    $message = esc_textarea( $data->text );

    $v = new MA_Validate();
    $v->validateStr( $name, 'name', 3, 75 );
    $v->validateStr( $message, 'message', 5, 1000 );
    $v->validateEmail( $email, 'email' );

    if ( isset( $data->honey ) ) {
      $v->setError( 'honey', 'The honeypot field must be empty!' );
    }

    if ( ! $v->hasErrors() ) {
      $header = "From: $email\n" . "Reply-To: $email\n";
      $subject = "Contact Form: $subject";
      $email_to = EMAIL;

      $email_message = "Name: " . $name . "\n";
      $email_message .= "Email: " . $email . "\n";
      $email_message .= "Company: " . $company . "\n";
      $email_message .= $message;

      $success = mail( $email_to, $subject, $email_message, $header );
    } else {
      $message_text = $v->errorNumMessage();

      $errors = array(
        'name' => $v->getError( 'name' ),
        'email' => $v->getError( 'email' ),
        'message' => $v->getError( 'message' ),
        'honey' => $v->getError( 'honey' )
      );
    }

    $response = array(
      'success' => $success,
      'errors' => $errors
    );

    echo json_encode( $response );
