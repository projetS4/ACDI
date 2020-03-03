<?php

class ModelContact extends Model {
  protected $mail;

  protected static $table = "`MON-contact`";
  protected static $class = "ModelContact";
  protected static $primary = "mail";
  protected static $dir = NULL;
}

?>
