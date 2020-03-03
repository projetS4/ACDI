<?php
Class Lang {

  // récupérer la langue choisie par l'utilisateur
  public static function get() {
    if(isset($_COOKIE["lang"])) return $_COOKIE["lang"];
    else return self::detect();
  }

  // détecter automatiquement la langue du navigateur
  public static function detect() {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $acceptLang = ['fr', 'en'];
    $lang = in_array($lang, $acceptLang) ? $lang : 'en';
    return $lang;
  }

}
?>
