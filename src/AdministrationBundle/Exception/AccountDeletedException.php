<?php

namespace AdministrationBundle\Exception;

use Symfony\Component\Security\Core\Exception\AccountStatusException;

/**
 * AccountExpiredException is thrown when the user account has been deleted.
 */

class AccountDeletedException extends AccountStatusException
{
    /**
     * {@inheritdoc}
     */
    public function getMessageKey()
    {
        return 'Account has been deleted.';
    }
}