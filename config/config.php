<?php

$dir = __DIR__ . '/../docs';

$iterator = Symfony\Component\Finder\Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('build')
    ->exclude('tests')
    ->in($dir);

$versions = Sami\Version\GitVersionCollection::create($dir)
    ->add('4.0', 'Master');

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