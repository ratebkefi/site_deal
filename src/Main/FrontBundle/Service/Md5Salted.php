<?php
/**
 * Created by PhpStorm.
 * User: G50
 * Date: 04/05/2015
 * Time: 11:22
 */
namespace Main\FrontBundle\Service;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class Md5Salted implements PasswordEncoderInterface{
    public function encodePassword($raw, $salt)
    {
        return hash('md5', $salt . $raw); // Custom function for password encrypt
    }

    public function isPasswordValid($encoded, $raw, $salt)
    {
        return $encoded === $this->encodePassword($raw, $salt);
    }
}