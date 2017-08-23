<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

Breadcrumbs::register('item-single', function($breadcrumbs, $post)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($post->title, url($post->slug));

});

Breadcrumbs::register('popular-ads', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Popular Ads', route('popular-ads'));

});

Breadcrumbs::register('recent-ads', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Recent Ads', route('recent-ads'));

});

Breadcrumbs::register('search', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Search', route('search'));

});

Breadcrumbs::register('member-area', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Member Area', route('member-area'));

});

Breadcrumbs::register('my-ads', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Member Area', route('member-area'));
    $breadcrumbs->push('My ads', route('my-ads'));

});
Breadcrumbs::register('edit-ads', function($breadcrumbs, $post)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Member Area', route('member-area'));
    $breadcrumbs->push('Edit ad', route('ad-edit',$post->id));

});
Breadcrumbs::register('my-wishlist', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Member Area', route('member-area'));
    $breadcrumbs->push('My Wishlists', route('my-wishlist'));

});

Breadcrumbs::register('my-profile', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Member Area', route('member-area'));
    $breadcrumbs->push('My Profile', route('my-profile'));

});

Breadcrumbs::register('edit-company-profile', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Member Area', route('member-area'));
    $breadcrumbs->push('Company Profile', route('edit-company-profile'));

});

Breadcrumbs::register('change-password', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Member Area', route('member-area'));
    $breadcrumbs->push('Change Password', route('change-password'));

});


Breadcrumbs::register('select-category', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Member Area', route('member-area'));
    $breadcrumbs->push('Select Category', route('select-category'));

});
