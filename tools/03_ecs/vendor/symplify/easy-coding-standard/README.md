# The Easiest Way to Use Any Coding Standard

[![Downloads total](https://img.shields.io/packagist/dt/symplify/easy-coding-standard.svg?style=flat-square)](https://packagist.org/packages/symplify/easy-coding-standard/stats)

![ECS-Run](docs/run-and-fix.gif)

## Features

- Use [PHP_CodeSniffer || PHP-CS-Fixer](https://tomasvotruba.com/blog/2017/05/03/combine-power-of-php-code-sniffer-and-php-cs-fixer-in-3-lines/) - anything you like
- **2nd run under few seconds** with un-changed file cache
- Skipping files for specific checkers
- Prepared sets - PSR12, Symfony, Common, Array, Symplify and more...
- [Prefixed version](https://github.com/symplify/easy-coding-standard-prefixed) in case of conflicts on install

Are you already using another tool?

- [How to Migrate From PHP_CodeSniffer to EasyCodingStandard in 7 Steps](https://tomasvotruba.com/blog/2018/06/04/how-to-migrate-from-php-code-sniffer-to-easy-coding-standard/)
- [How to Migrate From PHP CS Fixer to EasyCodingStandard in 6 Steps](https://tomasvotruba.com/blog/2018/06/07/how-to-migrate-from-php-cs-fixer-to-easy-coding-standard/)

## Install

```bash
composer require symplify/easy-coding-standard --dev
```

## Usage

### 1. Create Configuration and Setup Checkers

- Create an `ecs.php` in your root directory
- Add [Sniffs](https://github.com/squizlabs/PHP_CodeSniffer)
- ...or [Fixers](https://github.com/FriendsOfPHP/PHP-CS-Fixer) you'd love to use

```php
// ecs.php
use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ContainerConfigurator $containerConfigurator): void {
    // A. standalone rule
    $services = $containerConfigurator->services();
    $services->set(ArraySyntaxFixer::class)
        ->call('configure', [[
            'syntax' => 'short',
        ]]);

    // B. full sets
    $containerConfigurator->import(SetList::PSR_12);
};
```

### 2. Run in CLI

```bash
# dry
vendor/bin/ecs check src

# fix
vendor/bin/ecs check src --fix
```

## Features

How to load own config?

```bash
vendor/bin/ecs check src --config another-config.php
```

<br>

## Configuration

Configuration can be extended with many options. Here is list of them with example values and little description what are they for:

```php
use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    // alternative to CLI arguments, easier to maintain and extend
    $parameters->set(Option::PATHS, [__DIR__ . '/src', __DIR__ . '/tests']);

    // run single rule only on specific path
    $parameters->set(Option::ONLY, [
        ArraySyntaxFixer::class => [__DIR__ . '/src/NewCode'],
    ]);

    $parameters->set(Option::SKIP, [
        // skip paths with legacy code
        __DIR__ . '/packages/*/src/Legacy',

        ArraySyntaxFixer::class => [
            // path to file (you can copy this from error report)
            __DIR__ . '/packages/EasyCodingStandard/packages/SniffRunner/src/File/File.php',

            // or multiple files by path to match against "fnmatch()"
            __DIR__ . '/packages/*/src/Command',
        ],

        // skip rule completely
        ArraySyntaxFixer::class,

        // just single one part of the rule?
        ArraySyntaxFixer::class . '.SomeSingleOption',

        // ignore specific error message
        'Cognitive complexity for method "addAction" is 13 but has to be less than or equal to 8.',
    ]);

    // scan other file extendsions; [default: [php]]
    $parameters->set(Option::FILE_EXTENSIONS, ['php', 'phpt']);

    // configure cache paths & namespace - useful for Gitlab CI caching, where getcwd() produces always different path
    // [default: sys_get_temp_dir() . '/_changed_files_detector_tests']
    $parameters->set(Option::CACHE_DIRECTORY, '.ecs_cache');

    // [default: \Nette\Utils\Strings::webalize(getcwd())']
    $parameters->set(Option::CACHE_NAMESPACE, 'my_project_namespace');

    // indent and tabs/spaces
    // [default: spaces]
    $parameters->set(Option::INDENTATION, 'tab');

    // [default: PHP_EOL]; other options: "\n"
    $parameters->set(Option::LINE_ENDING, "\r\n");
};
```

<br>

## Coding Standards in Markdown

![ECS-Run](docs/check_markdown.gif)

<br>

How to correct PHP snippets in Markdown files?

```bash
vendor/bin/ecs check-markdown README.md
vendor/bin/ecs check-markdown README.md docs/rules.md

# to fix them, add --fix
vendor/bin/ecs check-markdown README.md docs/rules.md --fix
```

Do you have already paths defined in `ecs.php` config? Drop them from CLI and let ECS use those:

```bash
vendor/bin/ecs check-markdown --fix
```

<br>

## FAQ

### How can I see all loaded checkers?

```bash
vendor/bin/ecs show
vendor/bin/ecs show --config ...
```

### How do I clear cache?

```bash
vendor/bin/ecs check src --clear-cache
```

### Run on Git Diff Changed Files Only

Execution can be limited to changed files using the `process` option `--match-git-diff`:

```bash
vendor/bin/ecs check src --match-git-diff
```

This option will filter the files included by the configuration, creating an intersection with the files listed in `git diff`.

<br>

## Report Issues

In case you are experiencing a bug or want to request a new feature head over to the [Symplify monorepo issue tracker](https://github.com/symplify/symplify/issues)

## Contribute

The sources of this package are contained in the Symplify monorepo. We welcome contributions for this package on [symplify/symplify](https://github.com/symplify/symplify).
