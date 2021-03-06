<?php
/**
 * @copyright 2018 City of Bloomington, Indiana
 * @license http://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE.txt
 */
declare (strict_types=1);
namespace Domain\Users\UseCases\Load;

use Domain\Users\DataStorage\UsersRepository;

class Load
{
    private $repo;

    public function __construct(UsersRepository $repository)
    {
        $this->repo = $repository;
    }

    public function __invoke(int $id): LoadResponse
    {
        try {
            return new LoadResponse($this->repo->loadById($id));
        }
        catch (\Exception $e) {
            return new LoadResponse(null, [$e->getMessage()]);
        }
    }
}
