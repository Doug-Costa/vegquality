import { createIcons, icons } from 'lucide';

// Disponibilizar globalmente para scripts inline legados (compatibilidade com a home)
window.lucide = {
  createIcons: (options = {}) => createIcons({ icons, ...options })
};

// Comportamento do menu hambúrguer no mobile
const menuBtn = document.getElementById('menu-btn');
const mobileMenu = document.getElementById('mobile-menu');

if (menuBtn && mobileMenu) {
  menuBtn.addEventListener('click', () => {
    const isActive = mobileMenu.classList.toggle('active');
    
    if (isActive) {
      menuBtn.innerHTML = `<i data-lucide="x"></i>`;
    } else {
      menuBtn.innerHTML = `<i data-lucide="menu"></i>`;
    }
    
    // Recriar ícones após atualizar o HTML interno
    createIcons({ icons });
  });
}

// Alteração visual da Navbar ao rolar a página
const navbar = document.getElementById('navbar');

if (navbar) {
  window.addEventListener('scroll', () => {
    if (window.scrollY > 20) {
      navbar.classList.add('header-scrolled');
    } else {
      navbar.classList.remove('header-scrolled');
    }
  });
}

// Lógica de Modais de Fatos
const modalTriggers = document.querySelectorAll('[data-modal-target]');
const modalCloses = document.querySelectorAll('.modal-close');
const modalOverlays = document.querySelectorAll('.modal-overlay');

modalTriggers.forEach(trigger => {
  trigger.addEventListener('click', () => {
    const targetId = trigger.getAttribute('data-modal-target');
    const modal = document.getElementById(targetId);
    if (modal) {
      modal.classList.add('active');
      document.body.style.overflow = 'hidden'; // block scrolling when active
    }
  });
});

const closeModal = (modal) => {
  modal.classList.remove('active');
  document.body.style.overflow = ''; // restore scrolling
};

modalCloses.forEach(closeBtn => {
  closeBtn.addEventListener('click', () => {
    const modal = closeBtn.closest('.modal-overlay');
    closeModal(modal);
  });
});

// Close modal when clicking outside container
modalOverlays.forEach(overlay => {
  overlay.addEventListener('click', (e) => {
    if (e.target === overlay) {
      closeModal(overlay);
    }
  });
});

// Lógica do Carrossel do Hero
const initCarousel = () => {
  const slides = document.querySelectorAll(".carousel-slide");
  const dots = document.querySelectorAll(".carousel-dot");
  
  if (slides.length === 0) return;

  let currentSlide = 0;
  let carouselInterval;

  const showSlide = (index) => {
    // Garantir índice correto
    if (index >= slides.length) index = 0;
    if (index < 0) index = slides.length - 1;

    // Remover classe ativa de todos
    slides.forEach(slide => slide.classList.remove("active"));
    dots.forEach(dot => dot.classList.remove("active"));

    // Adicionar classe ativa no atual
    slides[index].classList.add("active");
    dots[index].classList.add("active");
    currentSlide = index;
  };

  const nextSlide = () => {
    showSlide(currentSlide + 1);
  };

  const startInterval = () => {
    clearInterval(carouselInterval);
    carouselInterval = setInterval(nextSlide, 5000); // Muda a cada 5 segundos
  };

  // Clique nos pontos/dots
  dots.forEach(dot => {
    dot.addEventListener("click", () => {
      const slideIndex = parseInt(dot.getAttribute("data-slide"), 10);
      showSlide(slideIndex);
      startInterval(); // Reiniciar cronômetro após clique manual
    });
  });

  // Inicializar rotação
  startInterval();
};

// Lógica de Acordeão do FAQ (Suporte a animação de altura com scrollHeight)
const initAccordions = () => {
  const faqQuestions = document.querySelectorAll('.faq-question');
  
  faqQuestions.forEach(question => {
    question.addEventListener('click', () => {
      const item = question.closest('.faq-item');
      const answer = item.querySelector('.faq-answer');
      if (!item || !answer) return;
      
      const isActive = item.classList.contains('active');
      
      // Fechar outros acordeões no mesmo grupo para visual limpo (opcional)
      const group = question.closest('.faq-group');
      if (group) {
        const activeItems = group.querySelectorAll('.faq-item.active');
        activeItems.forEach(activeItem => {
          if (activeItem !== item) {
            activeItem.classList.remove('active');
            const activeAnswer = activeItem.querySelector('.faq-answer');
            if (activeAnswer) {
              activeAnswer.style.maxHeight = null;
            }
          }
        });
      }
      
      // Toggle do acordeão atual
      if (isActive) {
        item.classList.remove('active');
        answer.style.maxHeight = null;
      } else {
        item.classList.add('active');
        answer.style.maxHeight = answer.scrollHeight + 'px';
      }
    });
  });
};

// Executa imediatamente e também nos eventos para garantir que rode sempre
const runAllInits = () => {
  console.log("VegQuality: Iniciando carregamento dos componentes...");
  try {
    if (typeof createIcons !== 'undefined' && typeof icons !== 'undefined') {
      createIcons({ icons });
      console.log("VegQuality: Ícones Lucide inicializados com sucesso.");
    } else {
      console.warn("VegQuality: Lucide ou Ícones não estão definidos no escopo.");
    }
  } catch (error) {
    console.error("VegQuality: Erro ao inicializar ícones Lucide:", error);
  }
  initCarousel();
  initAccordions();
};

if (document.readyState === "complete" || document.readyState === "interactive") {
  runAllInits();
} else {
  document.addEventListener("DOMContentLoaded", runAllInits);
  window.addEventListener("load", runAllInits);
}

