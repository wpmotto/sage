<header class="banner bg-brand-dark py-4">
  <div class="container mx-auto flex justify-between">
    <a class="font-bold text-brand" href="{{ home_url('/') }}">
      {{ $siteName }}
    </a>

    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
      @endif
    </nav>
  </div>
</header>
