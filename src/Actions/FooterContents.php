<?php

namespace SimpleAnalytics\Actions;

use SimpleAnalytics\Enums\SettingName;

class FooterContents extends Action
{
    protected string $hook = 'wp_footer';

    public function __construct(
        protected bool $shouldCollect,
    ) {
    }

    public function handle(): void
    {
        if ($this->shouldCollect) {
            echo '<noscript><img src="' . $this->getCustomDomain() . '" alt="" referrerpolicy="no-referrer-when-downgrade"></noscript>' . "\n";
        } else {
            echo "<!-- Simple Analytics: Not logging requests from admins -->\n";
        }
    }

    public function getCustomDomain(): string
    {
        // dd(get_option(SettingName::CUSTOM_DOMAIN, 'ok'));
        return esc_url('https://' . get_option(SettingName::CUSTOM_DOMAIN, 'queue.simpleanalyticscdn.com') . '/noscript.gif');
    }
}