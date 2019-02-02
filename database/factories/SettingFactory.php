<?php

use Faker\Generator as Faker;

$factory->define(App\Setting::class, function (Faker $faker) {
    return [
        'title'       => 'Maktabet El PDF',
        'description' => 'موقع عربى يهتم بالمحتوى المقروأ فى الوطن العربي يحتوى على مئات الكتب فى مجالات متعدده ويهتم بما تنشره دور النشر والطباعه وما يبحث عنه القارئ العربي نتمنى أن تجد ما تبحث عنه',
        'tags'        => 'كتب , مكتبة , pdf , قراءة , قراءة أون لاين , تحميل كتب , قراءة كتب , اقرأ',
        'pic'         => 'cover.jpg',
        'facebook'    => 'https://www.fb.com/',
        'twitter'     => 'https://twitter.com/',
        'instagram'   => 'https://www.instagram.com/',
        'mail'        => 'email@website.com',
        'pintrest'    => 'https://www.pinterest.com/',
    ];
});
