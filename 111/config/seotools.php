<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Maktabet PDF", // set false to total remove
            'description'  => 'موقع عربى يهتم بالمحتوى المقروأ فى الوطن العربي يحتوى على مئات الكتب فى مجالات متعدده ويهتم بما تنشره دور النشر والطباعه وما يبحث عنه القارئ العربي نتمنى أن تجد ما تبحث عنه', // set false to total remove
            'separator'    => ' | ',
            'keywords'     => ['كتب , مكتبة , pdf , قراءة , قراءة أون لاين , تحميل كتب , قراءة كتب , اقرأ'],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Maktabet PDF', // set false to total remove
            'description' => 'موقع عربى يهتم بالمحتوى المقروأ فى الوطن العربي يحتوى على مئات الكتب فى مجالات متعدده ويهتم بما تنشره دور النشر والطباعه وما يبحث عنه القارئ العربي نتمنى أن تجد ما تبحث عنه', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'book',
            'site_name'   => 'Maktabet PDF',
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
          //'card'        => 'summary',
          //'site'        => '@LuizVinicius73',
        ],
    ],
];
