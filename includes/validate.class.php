<?php

  include "../cms/wp-load.php";

  class MA_Validate {
    public $errors = array();

    function validateStr( $postVal, $postName, $min = 3, $max = 500 ) {
      if ( strlen( $postVal ) < intval( $min ) ) {
        $this->setError( $postName, ucfirst( $postName ) . " must be at least {$min} characters long." );
      } elseif ( strlen( $postVal ) > intval( $max ) ) {
        $this->setError( $postName, ucfirst( $postName ) . " must be less than {$max} characters long." );
      }
    }

    function validateEmail( $emailVal, $emailName ) {
      if ( strlen( $emailVal ) <= 0 ) {
        $this->setError( $emailName, "Please enter an Email Address" );
      } else if ( ! is_email( $emailVal ) ) {
        $this->setError( $emailName, "Please enter a valid Email Address" );
      }
    }

    function setError( $element, $message ) {
      $this->errors[ $element ] = $message;
    }

    function getError( $elementName ) {
      if ( isset( $this->errors[ $elementName ] ) ) {
        return $this->errors[ $elementName ];
      } else {
        return false;
      }
    }

    function displayErrors() {

    }

    function hasErrors() {
      if ( count( $this->errors ) > 0 ) {
        return true;
      } else {
        return false;
      }
    }

    function errorNumMessage() {
      if ( count( $this->errors ) > 1 ) {
        $message = "There were " . count( $this->errors ) . " errors submiting the form.";
      } else {
        $message = "There was an error submiting the form.";
      }
      return $message;
    }
  }
