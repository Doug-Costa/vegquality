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
                Escolha o canal de sua preferência para falar conosco ou envie uma mensagem no formulário ao lado.
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
                  <p style="font-size: 0.8rem; color: var(--color-text-muted); margin-top: 0.25rem;">Nós respondemos em até um dia útil</p>
                </div>
              </div>
              
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
                  <option value="veg-oxi">Veg Oxi 200</option>
                  <option value="consultoria">Consultoria</option>
                  <option value="plano-de-negocios">Plano de Negócios</option>
                  <option value="treinamento">Treinamento</option>
                  <option value="seja-distribuidor">Seja um Distribuidor</option>
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

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        // 1. Auto-select subject from URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const subjectParam = urlParams.get('subject');
        if (subjectParam) {
          const subjectSelect = document.getElementById('contact-subject');
          if (subjectSelect) {
            for (let i = 0; i < subjectSelect.options.length; i++) {
              if (subjectSelect.options[i].value === subjectParam) {
                subjectSelect.options[i].selected = true;
                break;
              }
            }
          }
        }

        // 2. Local contact form submit validation and success overlay
        const contactForm = document.getElementById('contact-form');
        const successOverlay = document.getElementById('success-overlay');
        const successCloseBtn = document.getElementById('success-close-btn');

        if (contactForm && successOverlay) {
          contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            
            // Simular envio
            const submitBtn = document.getElementById('submit-btn');
            if (submitBtn) {
              submitBtn.disabled = true;
              submitBtn.innerHTML = '<i class="animate-spin" data-lucide="loader"></i> Enviando...';
              if (window.lucide) window.lucide.createIcons();
            }

            setTimeout(function () {
              // Reset form
              contactForm.reset();
              
              // Reset submit button
              if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i data-lucide="send"></i> Enviar Mensagem';
              }
              
              // Show overlay
              successOverlay.classList.add('active');
              if (window.lucide) window.lucide.createIcons();
            }, 1000);
          });
        }

        if (successCloseBtn && successOverlay) {
          successCloseBtn.addEventListener('click', function () {
            successOverlay.classList.remove('active');
          });
        }
      });
    </script>
@endsection
