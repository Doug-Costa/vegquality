# SYSTEM BLUEPRINT: VegQuality - Fase 2 (Motor Dinâmico Laravel)
**Alvo:** Agente Antigravity IDE (Instruções de Implementação Spec-Driven)
**Stack:** Laravel 11, PHP 8.2+, Tailwind CSS, Filament PHP v3, Alpine.js
**Ambiente de Produção:** Hospedagem Compartilhada (Hostinger)

## 1. Visão Geral e PRD (Product Requirements Document)
A Fase 1 entregou um frontend estático de alta performance (HTML/Tailwind) baseado em design orgânico/biotecnológico (estilo Gardenary). 
A **Fase 2** consiste em portar essa interface impecável para o Laravel Blade (sem perder classes CSS ou animações) e acoplar um painel administrativo poderoso usando Filament PHP para que o cliente possa:
1. Gerenciar textos e banners das páginas institucionais (Home, Serviços, Empresa).
2. Publicar artigos no módulo de blog denominado "Radar FLV".

### Regras de Negócio e Restrições (CRITICAL)
- **Zero Regressão Visual:** O layout compilado no Blade deve ser byte-a-byte visualmente idêntico ao protótipo HTML da Fase 1.
- **Deploy Hostinger:** O servidor de produção não rodará Node.js. O build de frontend (`npm run build`) será sempre local/ambiente de dev. O deploy utilizará um script PHP customizado para rodar comandos Artisan no servidor compartilhado.

---

## 2. SDD (Software Design Description) & Modelagem
Arquitetura baseada em Bounded Contexts simplificados para o ecossistema Laravel.

### 2.1. Modelos de Dados (Entities)
* **User:** Autenticação padrão Laravel + Filament.
* **Page:** Gestão de páginas institucionais (Campos: `id`, `slug`, `title`, `meta_description`).
* **Section:** EAV/JSON para os blocos das páginas (Campos: `id`, `page_id`, `key` (ex: 'hero'), `content` (JSON contendo titulo, subtitulo, cta_link, image_path)).
* **Article (Radar FLV):** Posts do blog (Campos: `id`, `title`, `slug`, `excerpt`, `content` (Rich Text), `cover_image`, `published_at`, `status`).

---

## 3. Épicos e Specs de Implementação (Spec-Driven Development)
*Instruções diretas para o Agente gerar o código.*

### Épico 1: Setup Foundation & Assets
* **Spec 1.1:** Inicializar a estrutura Laravel 11.
* **Spec 1.2:** Configurar o `vite.config.js` para processar `resources/css/app.css` e `resources/js/app.js`. Incluir a paleta de cores `veg-primary`, `veg-dark`, e `veg-light` no `tailwind.config.js` (conforme Guia de Estilo prévio).
* **Spec 1.3:** Migrar mapeamento de imagens estáticas. As pastas `/assets/hero`, `/assets/images` devem ser movidas para `public/assets/` para carregamento direto sem compilação.

### Épico 2: Portabilidade Blade (Frontend)
* **Spec 2.1:** Criar `resources/views/layouts/app.blade.php`. Configurar diretivas `@vite(['resources/css/app.css', 'resources/js/app.js'])`.
* **Spec 2.2:** Componentizar a Navbar e Footer. Extrair para `resources/views/components/navbar.blade.php` e `footer.blade.php`.
* **Spec 2.3:** Migrar o HTML da `index.html` para `resources/views/home.blade.php`. Manter todas as classes utilitárias do Tailwind.
* **Spec 2.4:** Criar a rota GET `/` apontando para o `HomeController` (que no futuro injetará os dados da tabela `Page`).

### Épico 3: Painel Administrativo (Filament PHP)
* **Spec 3.1:** Instalar dependências: `composer require filament/filament:"^3.2" -W`. Rodar o `filament:install`.
* **Spec 3.2:** Criar Migrations para `pages`, `sections`, e `articles`.
* **Spec 3.3:** Gerar os Filament Resources:
    * `php artisan make:filament-resource Article` (Módulo Radar FLV).
    * `php artisan make:filament-resource Page` (Gerenciador do Site).
* **Spec 3.4:** No `ArticleResource`, configurar o Form com `TextInput` para Título, `FileUpload` para Capa (salvando em `public/storage`), e `RichEditor` para o Conteúdo.

### Épico 4: Integração de Dados (Dynamic Frontend)
* **Spec 4.1:** Refatorar `home.blade.php` para consumir a variável `$page` passada pelo Controller. Substituir textos *hardcoded* (ex: "Consultoria que gera resultados") por `{{ data_get($page->sections->where('key', 'hero')->first()->content, 'title') }}`.
* **Spec 4.2:** Criar rota e view para o Radar FLV (`/radar`). Construir o grid de leitura de artigos usando a estrutura de Cards definida na Fase 1.

---

## 4. Estratégia de Deploy Hostinger (O "Script de Compilação")
O ambiente de produção possui estrutura restrita. A pasta `/public` do Laravel deve ser o document root (public_html).

### 4.1. Fluxo de Build (Local para Produção)
O Antigravity (ou o desenvolvedor) deve seguir este fluxo antes de sincronizar os arquivos via FTP/Git:
1. Rodar `npm run build` localmente para gerar a pasta `public/build/`.
2. Fazer o upload dos arquivos ignorando `/node_modules`, e `/tests`. Subir a pasta `vendor` (caso não tenha SSH para composer na Hostinger) ou utilizar o script abaixo para instalar dependências.

### 4.2. Script de Execução Remota (Deploy Automation)
O arquivo `deploy-vegquality.php` deve ser colocado EXCLUSIVAMENTE dentro da pasta `/public` (ou `public_html` na Hostinger) para executar os comandos Artisan que o usuário não tem permissão para rodar via painel.

**Código Fonte do Script (`public/deploy-vegquality.php`):**

```php
<?php
/**
 * VegQuality - Hostinger Remote Deploy Script
 * Uso: [https://www.vegquality.com.br/deploy-vegquality.php?key=SUA_CHAVE_AQUI](https://www.vegquality.com.br/deploy-vegquality.php?key=SUA_CHAVE_AQUI)
 */

$securityKey = $_GET['key'] ?? '';
$definedKey = 'VegDeploy2026Secure'; // Alterar para a chave de produção

if ($securityKey !== $definedKey) {
    http_response_code(403);
    die('Acesso negado. Chave de deploy inválida.');
}

echo "<html><body style='font-family: monospace; background: #1b5e20; color: #e8f5e9; padding: 20px;'>";
echo "<h2>🚀 VegQuality Deploy Pipeline Started...</h2>";
echo "<pre style='background: #000; color: #0f0; padding: 15px; border-radius: 5px;'>";

// Ajusta o diretório para a raiz do Laravel (um nível acima da public)
$basePath = realpath(__DIR__ . '/..');

$commands = [
    // Instala dependências PHP otimizadas (Descomente se a Hostinger permitir exec do composer)
    // "cd {$basePath} && composer install --optimize-autoloader --no-dev 2>&1",
    
    // Limpa os caches da aplicação
    "cd {$basePath} && php artisan optimize:clear 2>&1",
    "cd {$basePath} && php artisan config:cache 2>&1",
    "cd {$basePath} && php artisan route:cache 2>&1",
    "cd {$basePath} && php artisan view:cache 2>&1",
    
    // Roda migrations pendentes em produção
    "cd {$basePath} && php artisan migrate --force 2>&1",
    
    // Garante o link simbólico para os uploads do Filament (Rodar apenas 1x, pode falhar se já existir)
    "cd {$basePath} && php artisan storage:link 2>&1",
];

foreach ($commands as $cmd) {
    echo "<b>> {$cmd}</b>\n";
    $output = shell_exec($cmd);
    echo htmlspecialchars($output) . "\n\n";
}

echo "</pre>";
echo "<h3>✅ Pipeline Finalizado!</h3>";
echo "</body></html>";