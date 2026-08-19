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
        <a href="{{ url('/servicos') }}" class="nav-link {{ request()->is('servicos') ? 'active' : '' }}">{{ __('Soluções') }}</a>
        <a href="{{ url('/veg-oxi') }}" class="nav-link {{ request()->is('veg-oxi') ? 'active' : '' }}">{{ __('Veg Oxi 200') }}</a>
        <a href="{{ url('/empresa') }}" class="nav-link {{ request()->is('empresa') ? 'active' : '' }}">{{ __('Sobre Nós') }}</a>
        <a href="{{ url('/radar') }}" class="nav-link {{ request()->is('radar') || request()->is('radar*') || request()->is('insights') ? 'active' : '' }}">{{ __('Conteúdos') }}</a>
        <a href="{{ url('/contato') }}" class="nav-link {{ request()->is('contato') ? 'active' : '' }}">{{ __('Contato') }}</a>
      </nav>

      <!-- Right Actions (Flags, CTA Desktop, Hamburger) -->
      <div class="nav-right">
        <!-- Seletor de Idiomas com Bandeiras (Visível em Desktop e Mobile à direita) -->
        <div class="lang-switcher">
          <a href="{{ url('/lang/pt') }}" class="lang-btn {{ app()->getLocale() === 'pt_BR' ? 'active' : '' }}" title="Português (Brasil)">
            <img src="{{ asset('assets/images/ilustracao-de-bandeira-brasil_53876-27017.avif') }}" alt="Brasil" class="flag-icon">
            <span>PT</span>
          </a>
          <span class="lang-divider">|</span>
          <a href="{{ url('/lang/en') }}" class="lang-btn {{ app()->getLocale() === 'en' ? 'active' : '' }}" title="English (Australia)">
            <img src="{{ asset('assets/images/Flag_of_Australia.svg') }}" alt="Australia" class="flag-icon">
            <span>EN</span>
          </a>
        </div>
        
        <!-- CTA Fale Conosco (Apenas Desktop) -->
        <a href="{{ url('/contato') }}" class="btn btn-primary desktop-cta">
          {{ __('Fale Conosco') }}
        </a>

        <!-- Botão Hambúrguer (Mobile e Resoluções Intermediárias) -->
        <button id="menu-btn" class="menu-btn" aria-label="Abrir Menu">
          <i data-lucide="menu"></i>
        </button>
      </div>

    </div>
  </div>

  <!-- Mobile Off-Canvas Overlay & Drawer -->
  <div id="mobile-menu-overlay" class="mobile-menu-overlay"></div>
  <div id="mobile-menu" class="mobile-menu-drawer">
    
    <!-- Drawer Header -->
    <div class="mobile-drawer-header">
      <a href="{{ url('/') }}" class="logo-link">
        <img src="{{ asset('assets/logos/logo-colorida-sem-funddo.png') }}" alt="VegQuality" style="height: 2.8rem; width: auto;">
      </a>
      <button id="menu-close-btn" class="menu-close-btn" aria-label="Fechar Menu">
        <i data-lucide="x"></i>
      </button>
    </div>

    <!-- Drawer Links -->
    <nav class="mobile-drawer-nav">
      <a href="{{ url('/') }}" class="mobile-nav-link {{ request()->is('/') ? 'active' : '' }}">{{ __('Home') }}</a>
      <a href="{{ url('/servicos') }}" class="mobile-nav-link {{ request()->is('servicos') ? 'active' : '' }}">{{ __('Soluções') }}</a>
      <a href="{{ url('/veg-oxi') }}" class="mobile-nav-link {{ request()->is('veg-oxi') ? 'active' : '' }}">{{ __('Veg Oxi 200') }}</a>
      <a href="{{ url('/empresa') }}" class="mobile-nav-link {{ request()->is('empresa') ? 'active' : '' }}">{{ __('Sobre Nós') }}</a>
      <a href="{{ url('/radar') }}" class="mobile-nav-link {{ request()->is('radar') || request()->is('radar*') || request()->is('insights') ? 'active' : '' }}">{{ __('Conteúdos') }}</a>
      <a href="{{ url('/contato') }}" class="mobile-nav-link {{ request()->is('contato') ? 'active' : '' }}">{{ __('Contato') }}</a>
    </nav>

    <!-- Drawer Footer (CTA & Flag Language Switcher) -->
    <div class="mobile-drawer-footer">
      <a href="{{ url('/contato') }}" class="btn btn-primary mobile-cta">
        {{ __('Fale Conosco') }}
      </a>
      <div class="lang-switcher mobile-lang-switcher">
        <a href="{{ url('/lang/pt') }}" class="lang-btn {{ app()->getLocale() === 'pt_BR' ? 'active' : '' }}">
          <img src="{{ asset('assets/images/ilustracao-de-bandeira-brasil_53876-27017.avif') }}" alt="Brasil" class="flag-icon">
          <span>PT (Brasil)</span>
        </a>
        <span class="lang-divider">|</span>
        <a href="{{ url('/lang/en') }}" class="lang-btn {{ app()->getLocale() === 'en' ? 'active' : '' }}">
          <img src="{{ asset('assets/images/Flag_of_Australia.svg') }}" alt="Australia" class="flag-icon">
          <span>EN (Australia)</span>
        </a>
      </div>
    </div>

  </div>
</header>

