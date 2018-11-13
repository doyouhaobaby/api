<?php

$dir = '/data/codes/queryphp/vendor/hunzhiwange/framework/src';

$iterator = Symfony\Component\Finder\Finder::create()
    ->files()
    ->name('*.php')
    ->in($dir);

// $versions = Sami\Version\GitVersionCollection::create($dir)
//     ->add('1.0', 'Master');

$options = [
    'theme'                => 'queryphp', // default
    'title'                => 'QueryPHP API Documentation',
    'build_dir'            => __DIR__ . '/../.deploy_git/%version%',
    'cache_dir'            => __DIR__ . '/../cache/%version%',
];

$sami = new Sami\Sami($iterator, $options);

$templates = $sami['template_dirs'];
$templates[] = __DIR__ . '/../themes/';
$sami['template_dirs'] = $templates;

return $sami;