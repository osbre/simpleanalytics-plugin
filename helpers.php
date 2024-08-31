<?php

namespace SimpleAnalytics;

use SimpleAnalytics\Support\SvgIcon;

defined('\\ABSPATH') || exit;

function get_icon(string $name): SvgIcon
{
    return new SvgIcon((file_get_contents(SIMPLEANALYTICS_PLUGIN_PATH . "assets/icons/$name.svg")));
}
