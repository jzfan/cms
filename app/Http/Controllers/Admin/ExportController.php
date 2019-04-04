<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;

class ExportController extends Controller
{
    public function users()
    {
        return \Excel::download(new UsersExport, 'users.xlsx');
    }
}
