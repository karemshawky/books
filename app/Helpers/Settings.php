<?php

function siteSettings()
{
    return \App\Setting::first();
}
function siteCategories()
{
    return \App\Category::all();
}
