<?php

namespace App\Filament;

use Filament\Pages\Dashboard as PagesDashboard;

class Dashboard extends PagesDashboard
{
    /**
     * @var view-string
     */
    protected static string $view = 'filament.dashboard';

    public function getTitle(): string
    {
        return static::$title ?? __('Tablero de vinculación');
    }

}
