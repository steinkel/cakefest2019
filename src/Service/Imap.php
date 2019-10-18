<?php

namespace App\Service;

use App\Model\Entity\Email;
use Cake\Cache\Cache;
use Cake\Cache\Engine\FileEngine;
use Cake\Core\InstanceConfigTrait;
use Cake\Datasource\ModelAwareTrait;
use Cake\Log\Log;
use PhpImap\IncomingMail;

class Imap
{
    use InstanceConfigTrait;
    use ModelAwareTrait;

    protected $_defaultConfig = [
        'mailbox' => [
            'server' => '{172.17.0.2:143/imap/notls}INBOX',
            'user' => 'user01@james.local',
            'password' => '1234',
        ]
    ];

    public function __construct(array $config = [])
    {
        $this->setConfig($config);
        $this->loadModel('Emails');
    }

    public function readMailbox(): void
    {
        $mailbox = new \PhpImap\Mailbox(
            $this->getConfig('mailbox.server'),
            $this->getConfig('mailbox.user'),
            $this->getConfig('mailbox.password')
        );
        $mailsIds = $mailbox->searchMailbox('UNSEEN');

        foreach ($mailsIds as $mailId) {
            $mail = $mailbox->getMail($mailId);
            $this->saveEmail($mail);
        }
    }

    protected function saveEmail(IncomingMail $mail): void
    {
        $emailEntity = new Email([
            'from_email' => $mail->fromAddress,
            'to_email' => array_keys($mail->to)[0] ?? null,
            'subject' => $mail->subject,
            'body' => $mail->textPlain,
        ]);

        $this->Emails->classify($emailEntity);

        if (!$this->Emails->save($emailEntity)) {
            Log::warning(sprintf('Unable to save email: %s', json_encode($emailEntity->getErrors())));
        }
    }
}
