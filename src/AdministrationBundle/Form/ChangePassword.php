<?php
/**
 * Created by PhpStorm.
 * User: eejova
 * Date: 12/5/18
 * Time: 4:23 PM
 */

namespace AdministrationBundle\Form;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ChangePassword extends Controller
{
    public static function match($password1, $password2)
    {
        if ($password1 != $password2)
        {
            throw new \Exception('Password does not match the confirm password.');
        }
        return true;
    }

    public static function passwordVerify($password, $password_hash)
    {
        if (!password_verify($password, $password_hash))
            /**
        /**password_verify — Verifies that a password matches a hash
             *  password_hash() returns the algorithm.
             **/
        {
            throw new \Exception('Invalid password.');
        }
        return true;
    }

    public static function minLenght($password, $minLenght)
    {
        if ( strlen(trim($password)) < $minLenght)
        /**
         *strlen — Get string length; trim — Strip whitespace (or other characters) from the beginning and end of a string.
         */
        {
            throw new \Exception('Password must be at least 8 characters.');
        }
        return true;
    }

    public static function maxLenght($password, $maxLenght)
    {
        if (strlen(trim($password)) > maxLenght)
        {
            throw new \Exception('Passsword too long');
        }
        return true;
    }

    public static function isValidUser($user)
    {
        if (empty($user))
        {
            throw new \Exception('Invalid country user name.');
        }
        return true;
    }

    public static function checkUsername($username)
    {
        if (!$username)
        {
            throw new \Exception('Invalid username');
        }
        if (!empty(Database::getRow("users", array('username' => $username))))
        /**
         * DB_common::getRow() – Runs a query and returns the first row.
         */
        {
            throw new \Exception('This user name alredy exists!');
        }
        return true;
    }


}