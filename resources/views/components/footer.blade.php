<footer class="footer-modern">
  <div class="container">
    <div class="footer-grid">
      
      <!-- Seção 1: Logo e Sobre a Empresa -->
      <div class="footer-col footer-col-about">
        <a href="{{ url('/') }}" class="footer-logo-link" aria-label="VegQuality Home">
          <img src="{{ asset('assets/logos/logo-colorida-sem-funddo.png') }}" alt="VegQuality" class="footer-logo-img-large" style="height: 8rem; width: auto; object-fit: contain; filter: none !important;">
          <span class="footer-logo-tagline">{{ __('Soluções FLV minimamente processados') }}</span>
        </a>
        <div class="footer-socials">
          <a href="https://www.instagram.com/veg_quality" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="Instagram">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
          </a>
          <a href="https://www.facebook.com/vegquality" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="Facebook">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
          </a>
          <a href="https://wa.me/5511978348438" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="WhatsApp">
            <i data-lucide="message-circle"></i>
          </a>
        </div>
      </div>

      <!-- Seção 2: Mapa do Site (Site Map) -->
      <div class="footer-col footer-col-links">
        <h3 class="footer-title">{{ __('Mapa do Site') }}</h3>
        <ul class="footer-links-list">
          <li><a href="{{ url('/') }}" class="footer-link">{{ __('Home') }}</a></li>
          <li><a href="{{ url('/empresa') }}" class="footer-link">{{ __('A Empresa') }}</a></li>
          <li><a href="{{ url('/servicos') }}" class="footer-link">{{ __('Serviços') }}</a></li>
          <li><a href="{{ url('/veg-oxi') }}" class="footer-link">{{ __('Veg Oxi 200') }}</a></li>
          <li><a href="{{ url('/insights') }}" class="footer-link">{{ __('Insights') }}</a></li>
          <li><a href="{{ url('/radar') }}" class="footer-link">{{ __('Radar FLV') }}</a></li>
          <li><a href="{{ url('/contato') }}" class="footer-link">{{ __('Contato') }}</a></li>
        </ul>
      </div>

      <!-- Seção 3: Contatos e Endereço -->
      <div class="footer-col footer-col-contact">
        <h3 class="footer-title">{{ __('Contato') }}</h3>
        <ul class="footer-contact-list">
          <li class="contact-item">
            <i data-lucide="phone-call" class="contact-icon"></i>
            <div class="contact-details">
              <span class="contact-label">{{ __('Telefone') }}</span>
              <a href="tel:+551151940325" class="contact-value">+55 11 5194-0325</a>
            </div>
          </li>
          <li class="contact-item">
            <i data-lucide="message-square" class="contact-icon"></i>
            <div class="contact-details">
              <span class="contact-label">{{ __('WhatsApp') }}</span>
              <a href="https://wa.me/5511978348438" target="_blank" rel="noopener noreferrer" class="contact-value">+55 11 97834-8438</a>
            </div>
          </li>
          <li class="contact-item">
            <i data-lucide="mail" class="contact-icon"></i>
            <div class="contact-details">
              <span class="contact-label">{{ __('E-mail') }}</span>
              <a href="mailto:vegquality@vegquality.com.br" class="contact-value">vegquality@vegquality.com.br</a>
            </div>
          </li>
          <li class="contact-item">
            <i data-lucide="map-pin" class="contact-icon"></i>
            <div class="contact-details">
              <span class="contact-label">{{ __('Endereço') }}</span>
              <div class="contact-value">
                Av. Paulista, 1471 - Conj 511<br>
                Bela Vista, São Paulo - SP<br>
                Brasil - CEP 01311-927
              </div>
            </div>
          </li>
        </ul>
      </div>

    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
      <p>&copy; 2026 VegQuality. {{ __('Todos os direitos reservados. Desenvolvido por @softystation') }}</p>
    </div>
  </div>
</footer>
