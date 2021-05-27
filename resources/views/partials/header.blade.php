<header class="banner bg-brand-dark py-4">
  <div class="wrap flex justify-between">
    <a class="font-bold text-brand inline-block" href="{{ home_url('/') }}">
      {{ $siteName }}
    </a>

    <div>
      @include('partials.example-modal')
  
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu([
          'container' => 'nav',
          'container_class' => 'hidden md:block',            
          'theme_location' => 'primary_navigation', 
          'menu_class' => 'nav-primary flex space-x-6', 
          'echo' => false
        ]) !!}
      @endif
    </div>
  </div>
</header>
