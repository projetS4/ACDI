<?php
class Session {
  // L'utilisateur est-il connecté ?
  public static function is_connected() {
    return (isset($_SESSION['admin']) && !empty($_SESSION['admin']));
  }

  // supprime les variables sessions et cookies
  public static function destroy() {
    session_unset();
    session_destroy();
  }

}

?>
