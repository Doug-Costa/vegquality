@extends('layouts.app')

@section('title', 'Fale Conosco | VegQuality - Consultoria para Agroindústria')
@section('meta_description', 'Entre em contato com a VegQuality. Tire suas dúvidas, solicite orçamentos para consultoria, implementação do Veg Oxi 200 ou treinamentos.')

@section('content')
<!-- Hero Interno -->
    <section class="internal-hero">
      <div class="container">
        <div class="breadcrumb animate-fade-up">
          <a href="{{ url('/') }}">Início</a>
          <span class="breadcrumb-separator">/</span>
          <span>Contato</span>
        </div>
        <h1 class="internal-hero-title animate-fade-up delay-100">
          Fale Conosco
        </h1>
        <p class="internal-hero-desc animate-fade-up delay-200">
          Tire suas dúvidas ou envie uma solicitação para nossa equipe. Estamos prontos para ajudar sua agroindústria.
        </p>
      </div>
    </section>

    <!-- Seção de Contato -->
    <section class="contact-section">
      <div class="container">
        <div class="contact-grid">
          
          <!-- Coluna 1: Informações de Contato -->
          <div class="contact-info-panel animate-fade-up">
            <div>
              <h2 class="contact-info-title">Nossos Canais</h2>
              <p class="contact-info-desc">
                Escolha o canal de sua preferência para falar conosco. Se preferir, visite nossa sede administrativa ou envie uma mensagem no formulário ao lado.
              </p>
            </div>
            
            <div class="contact-cards-container">
              
              <!-- Telefone -->
              <div class="contact-card-item">
                <div class="contact-card-icon">
                  <i data-lucide="phone"></i>
                </div>
                <div class="contact-card-details">
                  <h4>Telefone</h4>
                  <p><a href="tel:+551151940325">+55 11 5194-0325</a></p>
                  <p style="font-size: 0.8rem; color: var(--color-text-muted); margin-top: 0.25rem;">Atendimento de Seg. a Sex. das 8h às 18h</p>
                </div>
              </div>
              
              <!-- WhatsApp -->
              <div class="contact-card-item">
                <div class="contact-card-icon">
                  <i data-lucide="message-circle"></i>
                </div>
                <div class="contact-card-details">
                  <h4>WhatsApp</h4>
                  <p><a href="https://wa.me/5511978348438" target="_blank" rel="noopener noreferrer">+55 11 97834-8438</a></p>
                  <p style="font-size: 0.8rem; color: var(--color-text-muted); margin-top: 0.25rem;">Fale diretamente com nossa equipe</p>
                </div>
              </div>
              
              <!-- E-mail -->
              <div class="contact-card-item">
                <div class="contact-card-icon">
                  <i data-lucide="mail"></i>
                </div>
                <div class="contact-card-details">
                  <h4>E-mail Comercial</h4>
                  <p><a href="mailto:vegquality@vegquality.com.br">vegquality@vegquality.com.br</a></p>
                  <p style="font-size: 0.8rem; color: var(--color-text-muted); margin-top: 0.25rem;">Respondemos em até 24 horas úteis</p>
                </div>
              </div>
              
              <!-- Endereço -->
              <div class="contact-card-item">
                <div class="contact-card-icon">
                  <i data-lucide="map-pin"></i>
                </div>
                <div class="contact-card-details">
                  <h4>Sede Administrativa</h4>
                  <p>
                    Av. Paulista, 1471 - Conj 511<br>
                    Bela Vista, São Paulo - SP - CEP 01311-927
                  </p>
                </div>
              </div>
              
            </div>

            <!-- Mapa Administrativo -->
            <div class="contact-map-card">
              <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.1975765792945!2d-46.65863868502224!3d-23.561349684682057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59c8da0aa315%3A0xd59f9431f2c9776a!2sAv.%20Paulista%2C%201471%20-%20Bela%20Vista%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2001311-927!5e0!3m2!1spt-BR!2sbr!4v1625123456789!5m2!1spt-BR!2sbr" 
                allowfullscreen="" 
                loading="lazy" 
                title="Sede VegQuality - Avenida Paulista">
              </iframe>
            </div>
            
          </div>

          <!-- Coluna 2: Formulário de Contato -->
          <div class="contact-form-panel animate-fade-up delay-100">
            
            <h2 class="contact-form-title">Envie uma Mensagem</h2>
            
            <form id="contact-form">
              
              <div class="form-group-grid">
                <div class="form-group">
                  <label for="contact-name" class="form-label">Nome Completo *</label>
                  <input type="text" id="contact-name" name="name" class="form-input" placeholder="Seu nome completo" required>
                </div>
                <div class="form-group">
                  <label for="contact-email" class="form-label">E-mail Corporativo *</label>
                  <input type="email" id="contact-email" name="email" class="form-input" placeholder="seuemail@empresa.com" required>
                </div>
              </div>

              <div class="form-group-grid">
                <div class="form-group">
                  <label for="contact-phone" class="form-label">Telefone / WhatsApp *</label>
                  <input type="tel" id="contact-phone" name="phone" class="form-input" placeholder="(00) 00000-0000" required>
                </div>
                <div class="form-group">
                  <label for="contact-company" class="form-label">Empresa / Agroindústria</label>
                  <input type="text" id="contact-company" name="company" class="form-input" placeholder="Nome da empresa">
                </div>
              </div>

              <div class="form-group">
                <label for="contact-subject" class="form-label">Assunto de Interesse *</label>
                <select id="contact-subject" name="subject" class="form-select" required>
                  <option value="" disabled selected>Selecione uma opção</option>
                  <option value="veg-oxi">Adquirir Veg Oxi 200</option>
                  <option value="consultoria">Consultoria e Projetos</option>
                  <option value="treinamento">Treinamento Direcionado</option>
                  <option value="parceria">Seja um Distribuidor</option>
                  <option value="outro">Outro Assunto</option>
                </select>
              </div>

              <div class="form-group">
                <label for="contact-message" class="form-label">Mensagem *</label>
                <textarea id="contact-message" name="message" class="form-textarea" placeholder="Descreva brevemente sua necessidade ou dúvida..." required></textarea>
              </div>

              <button type="submit" class="btn btn-primary form-submit-btn" id="submit-btn">
                <i data-lucide="send"></i>
                Enviar Mensagem
              </button>
              
            </form>

            <!-- Success Overlay Message (Controlada via JS inline) -->
            <div class="form-success-message" id="success-overlay">
              <div class="form-success-icon">
                <i data-lucide="check-circle-2"></i>
              </div>
              <h3 class="form-success-title">Mensagem Enviada!</h3>
              <p class="form-success-text">
                Obrigado pelo seu contato. Nossa equipe técnica analisará sua mensagem e entrará em contato em breve.
              </p>
              <button type="button" class="btn btn-primary" id="success-close-btn" style="padding: 0.75rem 2rem;">
                Voltar
              </button>
            </div>
            
          </div>
          
        </div>
      </div>
    </section>
@endsection
