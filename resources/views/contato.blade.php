@extends('layouts.app')

@section('title', 'Fale Conosco | VegQuality - Consultoria para Agroindústria')
@section('meta_description', 'Entre em contato com a VegQuality. Tire suas dúvidas, solicite orçamentos para consultoria, implementação do Veg Oxi 200 ou treinamentos.')

@section('content')
@php
    $hero = $page?->sections->where('key', 'contato_hero')->first()?->content;
    $info = $page?->sections->where('key', 'contato_info')->first()?->content;
    $form = $page?->sections->where('key', 'contato_form')->first()?->content;
@endphp
<!-- Hero Interno -->
    <section class="internal-hero">
      <div class="container">
        <div class="breadcrumb animate-fade-up">
          <a href="{{ url('/') }}">{{ __('Início') }}</a>
          <span class="breadcrumb-separator">/</span>
          <span>{{ __('Contato') }}</span>
        </div>
        <h1 class="internal-hero-title animate-fade-up delay-100">
          {{ trans_content($hero, 'title', 'Fale Conosco') }}
        </h1>
        <p class="internal-hero-desc animate-fade-up delay-200">
          {{ trans_content($hero, 'subtitle', 'Tire suas dúvidas ou envie uma solicitação para nossa equipe. Estamos prontos para ajudar sua agroindústria.') }}
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
              <h2 class="contact-info-title">{{ trans_content($info, 'title', 'Nossos Canais') }}</h2>
              <p class="contact-info-desc">
                {{ trans_content($info, 'description', 'Escolha o canal de sua preferência para falar conosco ou envie uma mensagem no formulário ao lado.') }}
              </p>
            </div>
            
            <div class="contact-cards-container">
              
              <!-- Telefone -->
              @if(data_get($info, 'phone', '+55 11 5194-0325'))
              <div class="contact-card-item">
                <div class="contact-card-icon">
                  <i data-lucide="phone"></i>
                </div>
                <div class="contact-card-details">
                  <h4>{{ __('Telefone') }}</h4>
                  <p><a href="tel:{{ preg_replace('/[^0-9+]/', '', data_get($info, 'phone', '+55 11 5194-0325')) }}">{{ data_get($info, 'phone', '+55 11 5194-0325') }}</a></p>
                  @if(trans_content($info, 'phone_hours'))
                    <p style="font-size: 0.8rem; color: var(--color-text-muted); margin-top: 0.25rem;">{{ trans_content($info, 'phone_hours') }}</p>
                  @endif
                </div>
              </div>
              @endif
              
              <!-- WhatsApp -->
              @if(data_get($info, 'whatsapp', '+55 11 97834-8438'))
              <div class="contact-card-item">
                <div class="contact-card-icon">
                  <i data-lucide="message-circle"></i>
                </div>
                <div class="contact-card-details">
                  <h4>WhatsApp</h4>
                  <p><a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', data_get($info, 'whatsapp', '5511978348438')) }}" target="_blank" rel="noopener noreferrer">{{ data_get($info, 'whatsapp', '+55 11 97834-8438') }}</a></p>
                  @if(trans_content($info, 'whatsapp_desc'))
                    <p style="font-size: 0.8rem; color: var(--color-text-muted); margin-top: 0.25rem;">{{ trans_content($info, 'whatsapp_desc') }}</p>
                  @endif
                </div>
              </div>
              @endif
              
              <!-- E-mail -->
              @if(data_get($info, 'email', 'vegquality@vegquality.com.br'))
              <div class="contact-card-item">
                <div class="contact-card-icon">
                  <i data-lucide="mail"></i>
                </div>
                <div class="contact-card-details">
                  <h4>{{ __('E-mail Comercial') }}</h4>
                  <p><a href="mailto:{{ data_get($info, 'email', 'vegquality@vegquality.com.br') }}">{{ data_get($info, 'email', 'vegquality@vegquality.com.br') }}</a></p>
                  @if(trans_content($info, 'email_desc'))
                    <p style="font-size: 0.8rem; color: var(--color-text-muted); margin-top: 0.25rem;">{{ trans_content($info, 'email_desc') }}</p>
                  @endif
                </div>
              </div>
              @endif
              
            </div>
            
          </div>

          <!-- Coluna 2: Formulário de Contato -->
          <div class="contact-form-panel animate-fade-up delay-100">
            
            <h2 class="contact-form-title">{{ trans_content($form, 'title', 'Envie uma Mensagem') }}</h2>
            
            <form id="contact-form">
              @csrf
              
              <div class="form-group-grid">
                <div class="form-group">
                  <label for="contact-name" class="form-label">{{ __('Nome Completo *') }}</label>
                  <input type="text" id="contact-name" name="name" class="form-input" placeholder="{{ __('Seu nome completo') }}" required>
                </div>
                <div class="form-group">
                  <label for="contact-email" class="form-label">{{ __('E-mail Corporativo *') }}</label>
                  <input type="email" id="contact-email" name="email" class="form-input" placeholder="{{ __('seuemail@empresa.com') }}" required>
                </div>
              </div>

              <div class="form-group-grid">
                <div class="form-group">
                  <label for="contact-phone" class="form-label">{{ __('Telefone / WhatsApp *') }}</label>
                  <input type="tel" id="contact-phone" name="phone" class="form-input" placeholder="{{ app()->getLocale() === 'en' ? '+00 000 000 000' : '(00) 00000-0000' }}" required>
                </div>
                <div class="form-group">
                  <label for="contact-company" class="form-label">{{ __('Empresa / Agroindústria') }}</label>
                  <input type="text" id="contact-company" name="company" class="form-input" placeholder="{{ __('Nome da empresa') }}">
                </div>
              </div>

              <div class="form-group">
                <label for="contact-subject" class="form-label">{{ __('Assunto de Interesse *') }}</label>
                <select id="contact-subject" name="subject" class="form-select" required>
                  <option value="" disabled selected>{{ __('Selecione uma opção') }}</option>
                  <option value="veg-oxi">Veg Oxi 200</option>
                  <option value="consultoria">{{ __('Consultoria') }}</option>
                  <option value="plano-de-negocios">{{ __('Plano de Negócios') }}</option>
                  <option value="treinamento">{{ __('Treinamento') }}</option>
                  <option value="seja-distribuidor">{{ __('Seja um Distribuidor') }}</option>
                  <option value="outro">{{ __('Outro Assunto') }}</option>
                </select>
              </div>

              <div class="form-group">
                <label for="contact-message" class="form-label">{{ __('Mensagem *') }}</label>
                <textarea id="contact-message" name="message" class="form-textarea" placeholder="{{ __('Descreva brevemente sua necessidade ou dúvida...') }}" required></textarea>
              </div>

              <button type="submit" class="btn btn-primary form-submit-btn" id="submit-btn">
                <i data-lucide="send"></i>
                {{ trans_content($form, 'submit_text', 'Enviar Mensagem') }}
              </button>
              
            </form>

            <!-- Success Overlay Message (Controlada via JS inline) -->
            <div class="form-success-message" id="success-overlay">
              <div class="form-success-icon">
                <i data-lucide="check-circle-2"></i>
              </div>
              <h3 class="form-success-title">{{ trans_content($form, 'success_title', 'Mensagem Enviada!') }}</h3>
              <p class="form-success-text">
                {{ trans_content($form, 'success_message', 'Obrigado pelo seu contato. Nossa equipe técnica analisará sua mensagem e entrará em contato em breve.') }}
              </p>
              <button type="button" class="btn btn-primary" id="success-close-btn" style="padding: 0.75rem 2rem;">
                {{ __('Voltar') }}
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
            
            const submitBtn = document.getElementById('submit-btn');
            if (submitBtn) {
              submitBtn.disabled = true;
              submitBtn.innerHTML = '<i class="animate-spin" data-lucide="loader"></i> {{ __("Enviando...") }}';
              if (window.lucide) window.lucide.createIcons();
            }

            const formData = new FormData(contactForm);

            fetch('{{ route('contato.submit') }}', {
              method: 'POST',
              body: formData,
              headers: {
                'X-Requested-With': 'XMLHttpRequest'
              }
            })
            .then(response => response.json())
            .then(data => {
              if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i data-lucide="send"></i> {{ trans_content($form, "submit_text", "Enviar Mensagem") }}';
                if (window.lucide) window.lucide.createIcons();
              }

              if (data.success) {
                // Reset form
                contactForm.reset();
                // Show overlay
                successOverlay.classList.add('active');
                if (window.lucide) window.lucide.createIcons();
              } else {
                alert(data.error || 'Ocorreu um erro ao enviar o contato. Por favor, tente novamente.');
              }
            })
            .catch(error => {
              if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i data-lucide="send"></i> {{ trans_content($form, "submit_text", "Enviar Mensagem") }}';
                if (window.lucide) window.lucide.createIcons();
              }
              alert('Erro de conexão. Por favor, verifique seu acesso à internet e tente novamente.');
              console.error(error);
            });
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
