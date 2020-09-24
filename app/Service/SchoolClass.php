<?php
/**
 * Whoops - php errors for cool kids
 * @author Filipe Dobreira <http://github.com/filp>
 */

namespace App\Service;

use App\Repositories\SchoolRepository;
use App\Schools;

class SchoolClass implements SchoolRepository
{
    public function listAll()
    {
        return Schools::paginate(10);
    }
}
