<?php
/**
 * @copyright 2018 City of Bloomington, Indiana
 * @license http://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE.txt
 */
declare (strict_types=1);
namespace Application\Views\Account;

use Application\Block;
use Application\Template;

use Domain\People\UseCases\Info\InfoResponse;

class InfoView extends Template
{
    public function __construct(InfoResponse $response)
    {
        parent::__construct('admin', 'html');

        if (count($response->errors)) {
            $_SESSION['errorMessages'] = $response->errors;
        }

        $this->vars['title'] = $this->_('account');
        $vars = [
            'fullname'   => parent::escape($response->person->fullname()),
            'username'   => parent::escape($_SESSION['USER']->username),
            'email'      => parent::escape($response->person->email),
            'phone'      => parent::escape($response->person->phone),
            'notify_updates'   => $response->person->notify_updates,
            'notify_emergency' => $response->person->notify_emergency
        ];
		$this->blocks[] = new Block('account/info.inc', $vars);
    }
}
