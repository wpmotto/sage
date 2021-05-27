<header class="banner bg-brand-dark py-4">
  <div class="wrap flex justify-between">
    <a class="font-bold text-brand inline-block" href="{{ home_url('/') }}">
      <x-logo class="h-12 text-brand">{{ get_bloginfo('title') }}</x-logo>
    </a>

    <div class="text-right">
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

      @if (has_nav_menu('mobile_navigation'))
      <slide-over class="md:hidden">
        <template v-slot:button>
          <x-icons.menu class="text-white h-8"></x-icons.menu>
        </template>
        {!! wp_nav_menu([
          'container' => 'nav',
          'theme_location' => 'mobile_navigation', 
          'menu_class' => 'nav-mobile', 
          'echo' => false
        ]) !!}
      </slide-over>
      @endif
      
    </div>
  </div>
</header>

  

