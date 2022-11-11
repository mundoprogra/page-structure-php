<?php

  namespace MundoProgra\PageStructurePhp\Classes;

  abstract class Template {

    protected $SITE_URL = "";
    protected $version = "vb1.0.0";

    protected $IMAGES_URL = "";
    protected $CSS_URL = "";
    protected $JS_URL = "";
    protected $VIDEOS_URL = "";

    protected $lang = "en-US";


    abstract public function __construct();
    abstract public function cssFiles(string $file) : string;
    abstract public function jsFiles(string $file) : string;
    abstract public function getHeader() : string;
    abstract public function getFooter() : string;



    /**
     * @return string
     */
    public function getSITEURL() : string {
      return $this->SITE_URL;
    }
    
    /**
     * @return string
     */
    public function getVersion() : string {
      return $this->version;
    }

    /**
     * @return string
     */
    public function getIMAGESURL() : string {
      return $this->IMAGES_URL;
    }

    /**
     * @return string
     */
    public function getCSSURL() : string {
      return $this->CSS_URL;
    }

    /**
     * @return string
     */
    public function getJSURL() : string {
      return $this->JS_URL;
    }

    /**
     * @return string
     */
    public function getVIDEOSURL() : string {
      return $this->VIDEOS_URL;
    }

    /**
     * @return string
     */
    public function getLang() : string {
      return $this->lang;
    }

    /**
     * Función que regresa la estructura del favicon para el sitio web
     *
     * @return string Cadena del Favicon armada con la URL del sitio web.
     */
    public function getFavicon() : string {
      return '
        <link rel="apple-touch-icon" sizes="57x57" href="' . $this->getIMAGESURL() . 'favicon/apple-icon-57x57.png?v=' . $this->getVersion() . '">
        <link rel="apple-touch-icon" sizes="60x60" href="' . $this->getIMAGESURL() . 'favicon/apple-icon-60x60.png?v=' . $this->getVersion() . '">
        <link rel="apple-touch-icon" sizes="72x72" href="' . $this->getIMAGESURL() . 'favicon/apple-icon-72x72.png?v=' . $this->getVersion() . '">
        <link rel="apple-touch-icon" sizes="76x76" href="' . $this->getIMAGESURL() . 'favicon/apple-icon-76x76.png?v=' . $this->getVersion() . '">
        <link rel="apple-touch-icon" sizes="114x114" href="' . $this->getIMAGESURL() . 'favicon/apple-icon-114x114.png?v=' . $this->getVersion() . '">
        <link rel="apple-touch-icon" sizes="120x120" href="' . $this->getIMAGESURL() . 'favicon/apple-icon-120x120.png?v=' . $this->getVersion() . '">
        <link rel="apple-touch-icon" sizes="144x144" href="' . $this->getIMAGESURL() . 'favicon/apple-icon-144x144.png?v=' . $this->getVersion() . '">
        <link rel="apple-touch-icon" sizes="152x152" href="' . $this->getIMAGESURL() . 'favicon/apple-icon-152x152.png?v=' . $this->getVersion() . '">
        <link rel="apple-touch-icon" sizes="180x180" href="' . $this->getIMAGESURL() . 'favicon/apple-icon-180x180.png?v=' . $this->getVersion() . '">
        <link rel="icon" type="image/png" sizes="192x192"  href="' . $this->getIMAGESURL() . 'favicon/android-icon-192x192.png?v=' . $this->getVersion() . '">
        <link rel="icon" type="image/png" sizes="32x32" href="' . $this->getIMAGESURL() . 'favicon/favicon-32x32.png?v=' . $this->getVersion() . '">
        <link rel="icon" type="image/png" sizes="96x96" href="' . $this->getIMAGESURL() . 'favicon/favicon-96x96.png?v=' . $this->getVersion() . '">
        <link rel="icon" type="image/png" sizes="16x16" href="' . $this->getIMAGESURL() . 'favicon/favicon-16x16.png?v=' . $this->getVersion() . '">
        <link rel="manifest" href="' . $this->getIMAGESURL() . 'favicon/manifest.json?v=' . $this->getVersion() . '">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="' . $this->getIMAGESURL() . 'favicon/ms-icon-144x144.png?v=' . $this->getVersion() . '">
        <meta name="theme-color" content="#ffffff">
      ';
    }

    protected function createBreadcrumbs(array $breadcrumbs, string $classLink, string $classNoLink) : string {
      $totalItems = count($breadcrumbs) - 1;

      $breadcrumbItems = '';
      foreach ($breadcrumbs as $item => $bcItem){
        $href = "../";

        for($c = 0; $c < $totalItems && $item == $c; $c++){
          $href .= "../";
        }

        if($item != $totalItems){
          $breadcrumbItems .= '
            <a class="' . $classLink . '" href="' . $href . '">' . $bcItem . '</a>
          ';
        }
        else {
          $breadcrumbItems .= '
            <span class="' . $classNoLink . '">' . $bcItem . '</span>
          ';
        }
      }
      
      return $breadcrumbItems;
    }
    protected function createBreadcrumbsList(array $breadcrumbs, string $classItemLink = "", string $classItemNoLink = "", string $classLink = "", string $classNoLink = "") : string {
      $totalItems = count($breadcrumbs) - 1;

      $breadcrumbItems = '';
      foreach ($breadcrumbs as $item => $bcItem){
        $href = "../";

        for($c = 0; $c < $totalItems && $item == $c; $c++){
          $href .= "../";
        }

        if($item != $totalItems){
          $breadcrumbItems .= '
            <li class="' . $classItemLink . '">
              <a class="' . $classLink . '" href="' . $href . '">' . $bcItem . '</a>
            </li>
          ';
        }
        else {
          $breadcrumbItems .= '
            <li class="' . $classItemNoLink . '">
              <span class="' . $classNoLink . '">' . $bcItem . '</span>
            </li>
          ';
        }
      }
      
      return $breadcrumbItems;
    }

    /**
     * Verifica en que url nos encontramos para poder regresar la cadena "active" que nos permite a traves
     * de una clase CSS activar el enalce activo en el menu de navegación.
     *
     * @param string $url          Url que el que se quiere verificar para el correcto funcionamiento en el sitio.
     * @param string $customeClass Clase personalizada en caso de requierir una diferente a "active".
     *
     * @return string              Regresa la clase según la evaluación que hace respecto a la URL.
     */
    protected function currenctURL(string $url, string $customeClass = "active") : string {
      $lengthURL = strlen($url);

      if($lengthURL == 1) {
        if($_SERVER["REQUEST_URI"] == $url) {
          return $customeClass;
        }
      }
      if($lengthURL > 1 && strpos($_SERVER["REQUEST_URI"], $url) !== false) {
        return $customeClass;
      }
      return "";
    }
  }