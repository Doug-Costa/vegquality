<header id="navbar" class="header">
  <div class="container">
    <div class="navbar-container">
      
      <!-- Logo -->
      <a href="{{ url('/') }}" class="logo-link" aria-label="VegQuality Home">
        <img src="{{ asset('assets/logos/logo-colorida-sem-funddo.png') }}" alt="VegQuality" class="logo-img" id="logo-img">
      </a>

      <!-- Desktop Navigation -->
      <nav class="nav-links">
        <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
        <a href="{{ url('/empresa') }}" class="nav-link {{ request()->is('empresa') ? 'active' : '' }}">A Empresa</a>
        <a href="{{ url('/servicos') }}" class="nav-link {{ request()->is('servicos') ? 'active' : '' }}">Serviços</a>
        <a href="{{ url('/veg-oxi') }}" class="nav-link {{ request()->is('veg-oxi') ? 'active' : '' }}">Veg Oxi 200</a>
        <a href="{{ url('/insights') }}" class="nav-link {{ request()->is('insights') ? 'active' : '' }}">Insights</a>
        <a href="{{ url('/radar') }}" class="nav-link {{ request()->is('radar') || request()->is('radar*') ? 'active' : '' }}">Radar FLV</a>
        <a href="{{ url('/contato') }}" class="nav-link {{ request()->is('contato') ? 'active' : '' }}">Contato</a>
      </nav>

      <!-- Desktop CTA -->
      <div class="nav-cta">
        <a href="{{ url('/contato') }}" class="btn btn-primary">
          Fale Conosco
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
      <a href="{{ url('/') }}" class="mobile-nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
      <a href="{{ url('/empresa') }}" class="mobile-nav-link {{ request()->is('empresa') ? 'active' : '' }}">A Empresa</a>
      <a href="{{ url('/servicos') }}" class="mobile-nav-link {{ request()->is('servicos') ? 'active' : '' }}">Serviços</a>
      <a href="{{ url('/veg-oxi') }}" class="mobile-nav-link {{ request()->is('veg-oxi') ? 'active' : '' }}">Veg Oxi 200</a>
      <a href="{{ url('/insights') }}" class="mobile-nav-link {{ request()->is('insights') ? 'active' : '' }}">Insights</a>
      <a href="{{ url('/radar') }}" class="mobile-nav-link {{ request()->is('radar') || request()->is('radar*') ? 'active' : '' }}">Radar FLV</a>
      <a href="{{ url('/contato') }}" class="mobile-nav-link {{ request()->is('contato') ? 'active' : '' }}">Contato</a>
      <div class="mobile-cta-wrapper">
        <a href="{{ url('/contato') }}" class="btn btn-primary mobile-cta">
          Fale Conosco
        </a>
      </div>
    </div>
  </div>
</header>
