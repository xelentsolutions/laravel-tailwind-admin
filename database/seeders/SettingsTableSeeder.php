<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    protected $settings = [
        [
            'key'                       =>  'site_name',
            'value'                     =>  'Invoicing Application',
        ],
        [
            'key'                       =>  'site_title',
            'value'                     =>  'Invoicing',
        ],
        [
            'key'                       =>  'site_address',
            'value'                     =>  'P-58 Usman Colony',
        ],
        [
            'key'                       =>  'site_city',
            'value'                     =>  'Faisalabad',
        ],
        [
            'key'                       =>  'site_state',
            'value'                     =>  'Punjab',
        ],
        [
            'key'                       =>  'site_country',
            'value'                     =>  'Pakistan',
        ],
        [
            'key'                       =>  'site_website',
            'value'                     =>  'https://xelent.pk',
        ],
        [
            'key'                       =>  'email_address',
            'value'                     =>  'info@xelent.pk',
        ],
        [
            'key'                       =>  'phone',
            'value'                     =>  '+923220008788',
        ],
        [
            'key'                       =>  'mobile',
            'value'                     =>  '+923220008788',
        ],
        [
            'key'                       =>  'currency_code',
            'value'                     =>  'PKR',
        ],
        [
            'key'                       =>  'currency_symbol',
            'value'                     =>  'Rs',
        ],
        [
            'key'                       =>  'site_ntn',
            'value'                     =>  '12345678',
        ],
        [
            'key'                       =>  'site_srtn',
            'value'                     =>  '87543216',
        ],
        [
            'key'                       =>  'site_logo',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'site_favicon',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'footer_copyright_text',
            'value'                     =>  'Copyright &copy; 2021',
        ],
        [
            'key'                       =>  'seo_meta_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'seo_meta_description',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_facebook',
            'value'                     =>  'https://facebook.com/xelentsolutions',
        ],
        [
            'key'                       =>  'social_twitter',
            'value'                     =>  'https://twitter.com/xelentsolutions',
        ],
        [
            'key'                       =>  'social_instagram',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_linkedin',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'google_analytics',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'facebook_pixels',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'stripe_payment_method',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'stripe_key',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'stripe_secret_key',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'paypal_payment_method',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'paypal_client_id',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'paypal_secret_id',
            'value'                     =>  '',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting)
        {
            $result = Setting::create($setting);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->settings). ' records');
    }
}
