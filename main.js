// Inicializar os ícones do Lucide carregados via CDN global
if (typeof lucide !== 'undefined') {
  lucide.createIcons();
}

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
    if (typeof lucide !== 'undefined') {
      lucide.createIcons();
    }
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

// Executa imediatamente e também nos eventos para garantir que rode sempre
if (document.readyState === "complete" || document.readyState === "interactive") {
  initCarousel();
} else {
  document.addEventListener("DOMContentLoaded", initCarousel);
  window.addEventListener("load", initCarousel);
}

