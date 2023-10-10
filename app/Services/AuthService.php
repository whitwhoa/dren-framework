<?php

namespace App\Services;

use App\DAOs\UserDAO;
use Dren\ViewCompiler;
use Exception;


class AuthService extends \Dren\Services\AuthService
{
    /**
     * This method is called from base AuthService directly after new session has been
     * generated.
     *
     * Use this method to appending data to the default session.
     *
     * The framework only provides the concept of an "Account" which contains a "username" and "password"
     * for authentication. These accounts can have multiple roles. It is up to you to implement any other
     * functionality. For example if you wanted to have "Users", you would create a "Users" table where
     * each user would have an association with an account, etc. This allows for greater flexibility and
     * maintainability.
     *
     * @param int $accountId
     * @param string $username
     * @param array<string> $roles
     * @return void
     * @throws Exception
     */
    public function onSessionUpgrade(int $accountId, string $username, array $roles) : void
    {
        
    }

    /**
     * Implement forgotPassword functionality if so desired
     *
     * @param string $username
     * @return void
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function forgotPassword(string $username) : void
    {
		// check if user exists


		// generate reset key


        // send email
		
		
		// etc
    }


}