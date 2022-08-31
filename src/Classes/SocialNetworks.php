<?php

  namespace MundoProgra\PageStructurePhp\Classes;

  class SocialNetworks {

    public static function getFacebook($fanPage) {
      return 'https://facebook.com/' . $fanPage;
    }
    public static function getInstagram($account) {
      return 'https://instagram.com/' . $account;
    }
  }