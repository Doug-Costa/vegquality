# PRD e Guia de Estilo: VegQuality - Refatoração UI/UX (Vanilla CSS)

## 1. Visão Geral e Tema Visual
* **Conceito:** "Biotecnologia Orgânica" (Inspirado na estética *Gardenary*).
* **Sensação:** Limpo, científico, autoritário, mas com forte apelo natural e sustentável.
* **Características Chave:** Muito espaço em branco (respiro/whitespace), bordas arredondadas e assimétricas (trazendo o aspecto orgânico de folhas e células), uso estratégico de sombras (depth) e elementos flutuantes.

---

## 2. Paleta de Cores e Configuração (Vanilla CSS)
As cores devem refletir o frescor dos vegetais e a seriedade do setor B2B.

| Nome (Variável CSS) | Hexadecimal | Uso Principal |
| :--- | :--- | :--- |
| `--color-veg-primary` | `#2e7d32` | Botões principais, ícones de destaque, links em hover, selos. |
| `--color-veg-dark` | `#1b5e20` | Títulos (h1, h2, h3), textos de alto contraste, rodapé. |
| `--color-veg-light` | `#e8f5e9` | Fundos de seções alternadas (zebra stripes), cards secundários. |
| `--color-veg-accent` | `#f59e0b` | (Âmbar) Alertas, badges de "Novo", estrelas de review. |
| `--color-text-base` | `#374151` | (Gray 700) Texto de parágrafos gerais. |
| `--color-bg-base` | `#ffffff` | Fundo principal da página. |

**Definição no `:root` do CSS (`index.css`):**
```css
:root {
  --color-veg-primary: #2e7d32;
  --color-veg-dark: #1b5e20;
  --color-veg-light: #e8f5e9;
  --color-veg-accent: #f59e0b;
  --color-text-base: #374151;
  --color-bg-base: #ffffff;
  
  --font-sans: 'Inter', sans-serif;
}
```
