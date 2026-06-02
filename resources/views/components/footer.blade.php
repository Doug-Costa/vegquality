<footer class="footer-modern">
  <div class="container">
    <div class="footer-grid">
      
      <!-- Seção 1: Logo e Sobre a Empresa -->
      <div class="footer-col footer-col-about">
        <a href="{{ url('/') }}" class="footer-logo-link" aria-label="VegQuality Home">
          <img src="{{ asset('assets/logos/logo-colorida-sem-funddo.png') }}" alt="VegQuality" class="footer-logo-img-large">
        </a>
        <p class="footer-about-text">
          Biotecnologia inovadora e consultoria de alto impacto para a extensão natural do shelf-life e a máxima segurança dos alimentos na agroindústria.
        </p>
        <div class="footer-socials">
          <a href="https://instagram.com/vegquality" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="Instagram">
            <i data-lucide="instagram"></i>
          </a>
          <a href="https://facebook.com/vegquality" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="Facebook">
            <i data-lucide="facebook"></i>
          </a>
          <a href="https://wa.me/551151940325" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="WhatsApp">
            <i data-lucide="message-square"></i>
          </a>
        </div>
      </div>

      <!-- Seção 2: Mapa do Site (Site Map) -->
      <div class="footer-col footer-col-links">
        <h3 class="footer-title">Mapa do Site</h3>
        <ul class="footer-links-list">
          <li><a href="{{ url('/') }}" class="footer-link">Home</a></li>
          <li><a href="{{ url('/empresa') }}" class="footer-link">A Empresa</a></li>
          <li><a href="{{ url('/servicos') }}" class="footer-link">Serviços</a></li>
          <li><a href="{{ url('/radar') }}" class="footer-link">Blog</a></li>
          <li><a href="{{ url('/contato') }}" class="footer-link">Contato</a></li>
        </ul>
      </div>

      <!-- Seção 3: Contatos e Endereço -->
      <div class="footer-col footer-col-contact">
        <h3 class="footer-title">Contato</h3>
        <ul class="footer-contact-list">
          <li class="contact-item">
            <i data-lucide="phone-call" class="contact-icon"></i>
            <div class="contact-details">
              <span class="contact-label">Telefone</span>
              <a href="tel:+551151940325" class="contact-value">+55 11 5194 0325</a>
            </div>
          </li>
          <li class="contact-item">
            <i data-lucide="mail" class="contact-icon"></i>
            <div class="contact-details">
              <span class="contact-label">E-mail</span>
              <a href="mailto:contato@vegquality.com.br" class="contact-value">contato@vegquality.com.br</a>
            </div>
          </li>
          <li class="contact-item">
            <i data-lucide="map-pin" class="contact-icon"></i>
            <div class="contact-details">
              <span class="contact-label">Endereço</span>
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
      <p>&copy; 2026 VegQuality. Todos os direitos reservados. Desenvolvido com foco em Biotecnologia & Sustentabilidade.</p>
    </div>
  </div>
</footer>
