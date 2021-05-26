## Documentation

This is a fork of [Sage 10 by Roots](https://github.com/roots/sage). Additionally, we've installed and configured a workflow around [TailwindCss v2](https://tailwindcss.com/) and added a bit more boilerplate to get a further head start.

## Shortcodes

A `component` shortcode exists that maps directly to the components you have in `resources/components/*.blade.php`. These __must be anonymous__ components to work. Your shortcode attributes and slot content will automatically be passed.

Give it a try with the example component that already exists:
```
[component name="example" class="text-brand"]Slot content[/component]
```