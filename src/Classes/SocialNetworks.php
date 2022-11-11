<?php

  namespace MundoProgra\PageStructurePhp\Classes;

  class SocialNetworks {

    /**
     * Función que regresa la URL de la red social Facebook.
     * 
     * @return string Regresa la url con la página de Facebook de la cuenta a la que pertenece.
     */
    public static function getFacebook($fanPage) {
      return 'https://facebook.com/' . $fanPage;
    }

    /**
     * Función que regresa la URL de la red social Instagram.
     * 
     * @return string Regresa la url con la página de Instagram de la cuenta a la que pertenece.
     */
    public static function getInstagram($account) {
      return 'https://instagram.com/' . $account;
    }

    /**
     * Función que regresa la URL de la red social Twitter.
     * 
     * @return string Regresa la url con la página de Twitter de la cuenta a la que pertenece.
     */
    public static function getTwitter($account) {
      return 'https://twitter.com/' . $account;
    }
  }