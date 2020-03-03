<?php
class Security {

  private static $seed = 'DSMrbDSa4W';

  // getter
  static public function getSeed() {
     return self::$seed;
  }

  // chiffrer une chaîne de caractères
  static public function chiffrer($texte_en_clair) {
    $texte_chiffre = hash('sha256', self::getSeed().$texte_en_clair);
    return $texte_chiffre;
  }

  // Génère un nombre hexadécimal de 32 chiffres
  static public function generateRandomHex() {
    $numbytes = 16; // 32 chiffres hexadécimaux = 16 bytes
    $bytes = openssl_random_pseudo_bytes($numbytes);
    $hex   = bin2hex($bytes);
    return $hex;
  }
}
?>
