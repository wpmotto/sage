<header class="banner bg-brand-dark py-4">
  <div class="container mx-auto flex justify-between">
    <a class="font-bold text-brand" href="{{ home_url('/') }}">
      {{ $siteName }}
    </a>

    <modal title="Example Modal">
      <template v-slot:button>
        <span class="text-white">Open a modal</span>
      </template>
      <template v-slot:body>
        <div class="p-12">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quod et minima quam a molestias cum non rerum enim laborum ipsum, ratione eius consequuntur dolorum odit assumenda pariatur autem at.</p>
        </div>
      </template>
    </modal>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
      @endif
    </nav>
  </div>
</header>
