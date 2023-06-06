<?php

  // Initialiser la session
  session_start();
  
  // Détruire la session.
  if(session_destroy())
  {
    // Redirection vers la page de connexion
    header("Location: ../index.php");
      // Logger::global("l'utilisateur s'est bien déconnecté","Info");
  }
?>