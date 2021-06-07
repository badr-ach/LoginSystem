<?php
  /*
   * Gère les URLS et la partie des controlleurs
   */
  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      $url = $this->getUrl();

      // premier valeur dans le lien
      if(file_exists('../mvc/controllers/' . ucwords($url[0]). '.php')){
      // on la passe au controller adéquat
        $this->currentController = ucwords($url[0]);
        unset($url[0]);
      } // si la page demandé n'existe pas on reste toujours dans l'index

      // appel au controleur
      require_once '../mvc/controllers/'. $this->currentController . '.php';

      // utilisation du controler aproprié
      $this->currentController = new $this->currentController;

      // vérification de la deuxième valeur dans le lien
      if(isset($url[1])){
        // si elle existe on cherche la méthode adéquate
        if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];
          unset($url[1]);
        }
      }
      // les paramètres sont aquises ici
      $this->params = $url ? array_values($url) : [];

      // un call back avec un tableau des paramètres
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
  }
