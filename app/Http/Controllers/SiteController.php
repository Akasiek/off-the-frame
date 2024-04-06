<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class SiteController
{
    public function home()
    {
        return Inertia::render('Home');
    }
}
