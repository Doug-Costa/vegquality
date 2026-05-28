# MAPEAMENTO DE CONTEÚDO: VEGQUALITY

## PÁGINA: A EMPRESA (/empresa)

### SEÇÃO 1: Hero Interno (Cabeçalho da Página)
*   **Tag:** `h1`
*   **Texto:** Sobre a VegQuality
*   **Breadcrumb:** Início > A Empresa
*   **Imagem_Fundo:** [Banner institucional]

### SEÇÃO 2: História e Propósito
*   **Tag:** `h2`
*   **Texto:** Nossa História / Quem Somos
*   **Tag:** `p` (Múltiplos parágrafos)
*   **Texto:** [Texto detalhando a fundação, o foco em vegetais frescos e o combate à oxidação]
*   **Imagem_Apoio:** [Foto da equipe, laboratório ou campo]

### SEÇÃO 3: Especialista / Autoridade
*   **Tag:** `h2`
*   **Texto:** Conheça nossa Especialista
*   **Nome:** Dra. Roseane Bob (ou equipe principal)
*   **Minicurrículo (p):** [Formação, experiência na agroindústria, CRQ, etc.]

### SEÇÃO 4: Pilares (Missão, Visão, Valores)
*   **Estrutura_Grid:**
    *   **Card 1 (h3):** Missão + `p` [Texto]
    *   **Card 2 (h3):** Visão + `p` [Texto]
    *   **Card 3 (h3):** Valores + `p` [Texto]

---

## PÁGINA: SERVIÇOS (/servicos)

### SEÇÃO 1: Hero Interno
*   **Tag:** `h1`
*   **Texto:** Nossos Serviços e Soluções
*   **Breadcrumb:** Início > Serviços

### SEÇÃO 2: Catálogo de Soluções (Repetição Dinâmica)
*   **Estrutura_Servico_1 (Consultoria):**
    *   **Tag:** `h2` ou `h3`
    *   **Texto:** Consultoria Técnica para Agroindústria
    *   **Descrição (p):** [Como funciona a consultoria]
    *   **Botão_CTA:** Solicitar Orçamento
*   **Estrutura_Servico_2 (Veg Oxi 200):**
    *   **Tag:** `h2` ou `h3`
    *   **Texto:** Implementação do Veg Oxi 200
    *   **Descrição (p):** [Treinamento e substituição de sulfitos]
    *   **Botão_CTA:** Falar com Consultor
*   *(Repetir estrutura para Treinamentos, Auditorias, etc., caso existam)*

---

## PÁGINA: BLOG (/blog)
*(Esta é a página de listagem, o "Archive" do CMS)*

### SEÇÃO 1: Hero Interno
*   **Tag:** `h1`
*   **Texto:** Notícias e Atualizações
*   **Tag:** `p`
*   **Texto:** Fique por dentro das novidades da agroindústria e tecnologia alimentar.

### SEÇÃO 2: Grid de Postagens (Loop de Banco de Dados)
*   **Filtros/Categorias:** [Botões para filtrar por: "Tecnologia", "Legislação", "Eventos"]
*   **Componente_Card_Post:**
    *   **Thumbnail:** [URL da Imagem]
    *   **Meta_Info:** [Data] | [Categoria]
    *   **Tag:** `h3` (Título do Post)
    *   **Resumo (Excerpt):** [150 caracteres do texto]
    *   **Link:** Ler mais... (/blog/slug)
*   **Paginação:** [1, 2, 3, Próxima]

---

## PÁGINA: CONTATO (/contato)

### SEÇÃO 1: Hero Interno
*   **Tag:** `h1`
*   **Texto:** Fale Conosco
*   **Breadcrumb:** Início > Contato

### SEÇÃO 2: Formulário e Informações (Split Screen)
*   **Lado Esquerdo (Informações):**
    *   **Tag:** `h2`
    *   **Texto:** Informações de Contato
    *   **Item_Email:** [contato@vegquality.com.br]
    *   **Item_Telefone/WhatsApp:** [Número com DDD]
    *   **Item_Endereço:** [Endereço físico, se houver]
*   **Lado Direito (Formulário):**
    *   **Input_Text:** Nome Completo
    *   **Input_Email:** E-mail Corporativo
    *   **Input_Text:** Empresa / Indústria
    *   **Input_Select:** Assunto (Comprar Veg Oxi, Consultoria, Ser Distribuidor, Outros)
    *   **Textarea:** Mensagem
    *   **Botão_Submit:** Enviar Mensagem

### SEÇÃO 3: Mapa (Opcional)
*   **Componente:** Iframe do Google Maps (se houver sede física aberta a clientes).