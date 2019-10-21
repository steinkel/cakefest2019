<?php
declare(strict_types=1);

namespace App\Mailer;

use App\Model\Entity\User;
use Cake\Mailer\Mailer;

/**
 * User mailer.
 */
class UserMailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static $name = 'User';

    public function welcome(User $user) : void
    {
        $this
            ->setTo($user->get('email'))
            ->setSubject(__('Welcome!'))
            ->setViewVars(compact('user'));
    }
}
