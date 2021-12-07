<?php

namespace App\Traits;

use Spatie\SchemaOrg\Schema;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

trait MetaTags
{

    public function seoIndex()
    {
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addMeta('language', 'AR');
        SEOMeta::addMeta('url', url()->current());
        OpenGraph::addProperty('locale', 'ar-AR');
        OpenGraph::addImage(route('home') . '/uploads/site-cover.png');
        OpenGraph::setUrl(url()->current());
    }

    public function seoAuthorOrCategory($author, $metaDescription)
    {
        SEOMeta::setTitle($author->name);
        SEOMeta::setDescription($metaDescription);
        SEOMeta::addMeta('topic', $author->name);
        OpenGraph::setTitle($author->name);
        OpenGraph::setDescription($metaDescription);
        OpenGraph::addImage(route('home') . '/uploads/author/' . $author->pic);
    }

    public function seoSinglePage($book, $metaDescription, $category)
    {
        SEOMeta::setTitle($book->title);
        SEOMeta::setDescription($metaDescription);
        SEOMeta::addKeyword($book->tags->pluck('name'));
        SEOMeta::addMeta('topic', $book->title);
        OpenGraph::setTitle($book->title);
        OpenGraph::setDescription($metaDescription);
        OpenGraph::addImage(url($book->pic));

        echo Schema::book()->name($book->title)
            ->breadcrumb('Book > ' . $category->name)
            ->author(['@type' => 'person', 'name' => $book->authors[0]->name])
            ->workExample([
                '@type'  => 'Book',
                'bookFormat' => 'https://schema.org/EBook',
                'image'  => url($book->pic),
                'inLanguage' => 'Arabic',
                'name' => 'PDF of ' . $book->title,
                'fileFormat' => 'application/pdf',
            ]);
    }
}
