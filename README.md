# ComposePress Starter

A clean-slate starter plugin for building WordPress plugins on
[ComposePress](https://github.com/ComposePress/core). The core exposes an
explicit composition API (`Plugin`, `PluginContext`, `HookSubscriber`, `Hooks`,
`WordPressHooks`, `PluginLifecycle`, `PluginUninstall`) with no container, no
settings, and no UI layer. This starter shows how a real plugin wires those
contracts together.

## Requirements

- PHP 8.2 or newer
- Composer 2
- WordPress 6.4 or newer

## Setup

Clone this repository and install dependencies:

```sh
composer install
```

> **Dependency note.** The core is not yet tagged or published to
> Packagist, so this package resolves it from the `ComposePress/core`
> repository through a Composer **VCS repository**. Once a tagged release is
> published, replace the `"composepress/core": "dev-master"` requirement with
> the published constraint (for example `^1.0`).

Activate the plugin from **Plugins → Installed Plugins**. The plugin head is
`composepress-starter.php`; its `Plugin` header block and the `VERSION`/`SLUG`
constants in `src/StarterPlugin.php` must change if you rename it.

## Structure

```
composepress-starter.php   Plugin header, autoload guard, and boot call
src/
  StarterPlugin.php        Composition root: builds and boots the core Plugin
  ExampleSubscriber.php    A HookSubscriber demonstrating hook registration
  StarterActivator.php     Activation behaviour
  StarterDeactivator.php   Deactivation behaviour
  Uninstall.php            Static uninstall behaviour
tests/                     PHPUnit tests; boundaries use core Testing doubles
phpunit.xml.dist           PHPUnit configuration
phpstan.neon               PHPStan configuration (level 8)
.phpcs.xml.dist            PHPCS configuration (PSR-12)
```

## How it boots

`composepress-starter.php` guards against a missing `vendor/` directory,
loads Composer's autoloader, then calls `StarterPlugin::boot(__FILE__)`
immediately during plugin-file inclusion. Booting at include time is required so
WordPress registers the activation, deactivation, and uninstall hooks before it
finishes loading the plugin. `StarterPlugin` constructs every collaborator
explicitly and hands them to the core `Plugin`; subscribers only register their
callbacks, and their work runs when WordPress fires the hooks.

## Extension points

- **Add a subscriber.** Implement `ComposePress\Core\HookSubscriber` (register
  actions/filters through the `Hooks` argument) and register an instance in the
  subscribers array inside `StarterPlugin::boot()`. Keep business logic in plain
  methods on the subscriber so it stays testable without WordPress.
- **Add lifecycle work.** Implement `ComposePress\Core\PluginActivator`
  and/or `ComposePress\Core\PluginDeactivator` with real work (schema,
  options, cron) and pass instances to `Plugin`.
- **Add uninstall work.** Implement `ComposePress\Core\PluginUninstall::uninstall()`
  as a `static` method and pass the class string to `Plugin`.
- **Add a dependency.** Construct it and inject it in `StarterPlugin::boot()`
  rather than locating services at runtime.

## Verification

```sh
composer lint      # PHP syntax check
composer test      # PHPUnit unit tests (WordPress functions are shimmed)
composer analyse   # PHPStan level 8
composer style     # PHPCS PSR-12
```

## License

GPL-3.0-or-later. See `LICENSE`.
