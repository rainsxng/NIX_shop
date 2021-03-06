<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 30.01.19
 * Time: 16:20
 */

namespace Controllers;

use Core\Controller;
use Core\Response;
use Models\Order;
use Models\User;
use Validators\UserValidator;

class UserController extends Controller
{
    /**
     * @var User $user
     */
    private $user;
    /**
     * @var Order $order
     */
    private $order;

    public function __construct()
    {
        $this->user = new User();
        $this->order = new Order();
    }

    /**
     * Get all info about user including info about orders
     * @throws \Exception
     */
    public function getUser()
    {
        if ($_SESSION['isLogged'] === false) {
            self::render('404');
        }
        else {
            $this->user = $this->user->getUserById($_SESSION['user_id']);
            $orders = $this->order->getAllOrdersByUser($this->user);
            foreach ($orders as $order) {
                $order->setSum($this->order->getSumForOrder($order));
            }
            $sum = $this->order->getSumForOrder($this->order);
            self::render('user', ['user'=>$this->user,'orders'=>$orders,'sum'=>$sum]);
        }
    }

    /**
     * Change password for user
     */
    public function changePassword()
    {
        $this->user = $this->user->getUserById($_SESSION['user_id']);
        if (password_verify($_POST['oldPassword'], $this->user->getPassword())) {
            $this->user->setPassword($_POST['newPassword']);
            $this->user->changePassword($this->user);
                Response::setResponseCode(200);
                Response::setContent("Успешно изменено", "");
                Response::send();
        }
        else {
            Response::setResponseCode(403);
            Response::setContent("Неверный пароль", "");
            Response::send();
        }
    }

    /**
     * Change email for user
     */
    public function changeEmail()
    {
        $this->user = $this->user->getUserById($_SESSION['user_id']);
        if (UserValidator::validateEmail($_POST['newEmail'])) {
            $this->user->setEmail($_POST['newEmail']);
            $this->user->changeEmail($this->user);
            Response::setResponseCode(200);
            Response::setContent("Успешно изменено", "");
            Response::send();
        }
    }

    /**
     * Logout user and delete his account
     */
    public function logoutAndDelete()
    {
        $this->user = $this->user->getUserById($_SESSION['user_id']);
        $this->user->logOut();
        $this->user->delete($this->user);
        Response::setResponseCode(200);
        Response::send();
    }
}
