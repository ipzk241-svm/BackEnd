<?php
/**
 * Class UserView
 *
 * Цей клас відповідає за відображення профілю користувача.
 *
 * @package Views
 */

 namespace Views;

use Models\UserModel;

class UserView
{
    public function render(UserModel $user)
    {
        echo "<h1>User Profile</h1>";
        echo "<p>Name: " . htmlspecialchars($user->getName()) . "</p>";
        echo "<p>Email: " . htmlspecialchars($user->getEmail()) . "</p>";
    }
}
