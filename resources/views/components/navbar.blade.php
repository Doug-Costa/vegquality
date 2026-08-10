<header id="navbar" class="header">
  <div class="container">
    <div class="navbar-container">
      
      <!-- Logo -->
      <a href="{{ url('/') }}" class="logo-link" aria-label="VegQuality Home">
        <img src="{{ asset('assets/logos/logo-colorida-sem-funddo.png') }}" alt="VegQuality" class="logo-img" id="logo-img">
      </a>

      <!-- Desktop Navigation -->
      <nav class="nav-links">
        <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">{{ __('Home') }}</a>
        <a href="{{ url('/empresa') }}" class="nav-link {{ request()->is('empresa') ? 'active' : '' }}">{{ __('A Empresa') }}</a>
        <a href="{{ url('/servicos') }}" class="nav-link {{ request()->is('servicos') ? 'active' : '' }}">{{ __('Serviços') }}</a>
        <a href="{{ url('/veg-oxi') }}" class="nav-link {{ request()->is('veg-oxi') ? 'active' : '' }}">{{ __('Veg Oxi 200') }}</a>
        <a href="{{ url('/insights') }}" class="nav-link {{ request()->is('insights') ? 'active' : '' }}">{{ __('Insights') }}</a>
        <a href="{{ url('/radar') }}" class="nav-link {{ request()->is('radar') || request()->is('radar*') ? 'active' : '' }}">{{ __('Radar FLV') }}</a>
        <a href="{{ url('/contato') }}" class="nav-link {{ request()->is('contato') ? 'active' : '' }}">{{ __('Contato') }}</a>
      </nav>

      <!-- Desktop CTA & Lang Switcher -->
      <div class="nav-cta" style="display: flex; align-items: center; gap: 0.75rem;">
        <div class="lang-switcher" style="display: inline-flex; align-items: center; gap: 0.2rem; background: rgba(0,0,0,0.05); padding: 0.2rem 0.5rem; border-radius: 9999px; font-size: 0.8rem; font-weight: 800;">
          <a href="{{ url('/lang/pt') }}" style="color: {{ app()->getLocale() === 'pt_BR' ? 'var(--color-veg-primary)' : '#6b7280' }}; text-decoration: none; padding: 0.15rem 0.4rem; border-radius: 9999px; background: {{ app()->getLocale() === 'pt_BR' ? '#ffffff' : 'transparent' }}; box-shadow: {{ app()->getLocale() === 'pt_BR' ? '0 1px 3px rgba(0,0,0,0.1)' : 'none' }};">PT</a>
          <span style="color: #cbd5e1;">|</span>
          <a href="{{ url('/lang/en') }}" style="color: {{ app()->getLocale() === 'en' ? 'var(--color-veg-primary)' : '#6b7280' }}; text-decoration: none; padding: 0.15rem 0.4rem; border-radius: 9999px; background: {{ app()->getLocale() === 'en' ? '#ffffff' : 'transparent' }}; box-shadow: {{ app()->getLocale() === 'en' ? '0 1px 3px rgba(0,0,0,0.1)' : 'none' }};">EN</a>
        </div>
        
        <a href="{{ url('/contato') }}" class="btn btn-primary">
          {{ __('Fale Conosco') }}
        </a>
      </div>

      <!-- Mobile Menu Button -->
      <button id="menu-btn" class="menu-btn" aria-label="Abrir Menu">
        <i data-lucide="menu"></i>
      </button>

    </div>
  </div>

  <!-- Mobile Navigation Drawer -->
  <div id="mobile-menu" class="mobile-menu">
    <div class="mobile-menu-container">
      <div style="display: flex; justify-content: center; margin-bottom: 1rem;">
        <div class="lang-switcher" style="display: inline-flex; align-items: center; gap: 0.25rem; background: rgba(0,0,0,0.05); padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.9rem; font-weight: 800;">
          <a href="{{ url('/lang/pt') }}" style="color: {{ app()->getLocale() === 'pt_BR' ? 'var(--color-veg-primary)' : '#6b7280' }}; text-decoration: none; padding: 0.2rem 0.5rem; border-radius: 9999px; background: {{ app()->getLocale() === 'pt_BR' ? '#ffffff' : 'transparent' }};">PT (Português)</a>
          <span style="color: #cbd5e1;">|</span>
          <a href="{{ url('/lang/en') }}" style="color: {{ app()->getLocale() === 'en' ? 'var(--color-veg-primary)' : '#6b7280' }}; text-decoration: none; padding: 0.2rem 0.5rem; border-radius: 9999px; background: {{ app()->getLocale() === 'en' ? '#ffffff' : 'transparent' }};">EN (English)</a>
        </div>
      </div>
      <a href="{{ url('/') }}" class="mobile-nav-link {{ request()->is('/') ? 'active' : '' }}">{{ __('Home') }}</a>
      <a href="{{ url('/empresa') }}" class="mobile-nav-link {{ request()->is('empresa') ? 'active' : '' }}">{{ __('A Empresa') }}</a>
      <a href="{{ url('/servicos') }}" class="mobile-nav-link {{ request()->is('servicos') ? 'active' : '' }}">{{ __('Serviços') }}</a>
      <a href="{{ url('/veg-oxi') }}" class="mobile-nav-link {{ request()->is('veg-oxi') ? 'active' : '' }}">{{ __('Veg Oxi 200') }}</a>
      <a href="{{ url('/insights') }}" class="mobile-nav-link {{ request()->is('insights') ? 'active' : '' }}">{{ __('Insights') }}</a>
      <a href="{{ url('/radar') }}" class="mobile-nav-link {{ request()->is('radar') || request()->is('radar*') ? 'active' : '' }}">{{ __('Radar FLV') }}</a>
      <a href="{{ url('/contato') }}" class="mobile-nav-link {{ request()->is('contato') ? 'active' : '' }}">{{ __('Contato') }}</a>
      <div class="mobile-cta-wrapper">
        <a href="{{ url('/contato') }}" class="btn btn-primary mobile-cta">
          {{ __('Fale Conosco') }}
        </a>
      </div>
    </div>
  </div>
</header>
