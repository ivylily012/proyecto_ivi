  // Shared Tailwind CSS classes
  const orangeBg = "bg-orange-500";
  const zincBg = "bg-zinc-200 dark:bg-zinc-700";
  const zincText = "text-zinc-800 dark:text-zinc-100";
  const zincLightText = "text-zinc-600 dark:text-zinc-400";


  // Profile Card Component
  customElements.define('profile-card', class extends HTMLElement {
    connectedCallback() {
      const template = document.getElementById('profile-card-template');
      const content = template.content.cloneNode(true);
      this.appendChild(content);
    }
  });

  // Resume Content Component
  customElements.define('resume-content', class extends HTMLElement {
    connectedCallback() {
      const template = document.getElementById('resume-content-template');
      const content = template.content.cloneNode(true);
      this.appendChild(content);
    }
  });

  // Education Section Component
  customElements.define('education-section', class extends HTMLElement {
    connectedCallback() {
      const template = document.getElementById('education-section-template');
      const content = template.content.cloneNode(true);
      this.appendChild(content);
    }
  });

  // Experience Section Component
  customElements.define('experience-section', class extends HTMLElement {
    connectedCallback() {
      const template = document.getElementById('experience-section-template');
      const content = template.content.cloneNode(true);
      this.appendChild(content);
    }
  });

  // Skills Section Component
  customElements.define('skills-section', class extends HTMLElement {
    connectedCallback() {
      const template = document.getElementById('skills-section-template');
      const title = this.getAttribute('title');
      template.content.querySelector('h2').textContent = title;
      const content = template.content.cloneNode(true);
      this.appendChild(content);
    }
  });
