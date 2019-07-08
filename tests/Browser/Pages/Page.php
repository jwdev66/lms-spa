<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Page as BasePage;

abstract class Page extends BasePage
{
    public function dashboardUrl()
    {
        return '/dashboard';
    }

    public static function siteElements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
