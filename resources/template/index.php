<?php include __DIR__ . '/inc/header.php'; ?>

<section class="section sf-hero has-text-centered">
  <div class="container">
    <h1 class="title is-2">Unified SDKs of popular services</h1>
    <p class="subtitle is-5 has-text-grey">SDK Fabric automatically manages and generates unified SDKs of popular services.</p>
    <div class="sf-lang-logos">
      <img src="<?php echo $base; ?>/img/sdk/client-typescript.png" alt="TypeScript" title="TypeScript">
      <img src="<?php echo $base; ?>/img/sdk/client-java.png" alt="Java" title="Java">
      <img src="<?php echo $base; ?>/img/sdk/client-php.png" alt="PHP" title="PHP">
      <img src="<?php echo $base; ?>/img/sdk/client-go.png" alt="Go" title="Go">
      <img src="<?php echo $base; ?>/img/sdk/client-csharp.png" alt="C#" title="C#">
      <img src="<?php echo $base; ?>/img/sdk/client-python.png" alt="Python" title="Python">
    </div>
  </div>
</section>

<section class="section sf-projects">
  <div class="container">
    <div class="sf-section-head">
      <div>
        <h2 class="title is-3 mb-1">Projects</h2>
        <p id="project-count" class="has-text-grey">&nbsp;</p>
      </div>
      <div class="sf-search">
        <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="currentColor" d="M10 2a8 8 0 0 1 6.32 12.9l5.39 5.4-1.41 1.41-5.4-5.39A8 8 0 1 1 10 2zm0 2a6 6 0 1 0 0 12 6 6 0 0 0 0-12z"/></svg>
        <input id="project-search" class="input" type="search" placeholder="Search projects..." aria-label="Search projects">
      </div>
    </div>

    <div id="projects-grid" class="sf-grid">
      <div class="sf-empty">Loading projects...</div>
    </div>
  </div>
</section>

<section class="section sf-contribute">
  <div class="container">
    <div class="sf-contribute-box">
      <div class="columns is-vcentered">
        <div class="column is-7">
          <h2 class="title is-3">Contribute</h2>
          <p class="mb-4">The SDK repositories listed above only contain the automatically generated client code, which means
          you should not change the code inside these repositories directly, since every change is overwritten
          on the next generation run. All SDKs are generated from a specification which is maintained at the
          <a href="https://github.com/sdk-fabric/specs" target="_blank" rel="noopener noreferrer">sdk-fabric/specs</a> repository.</p>
          <a class="button is-primary" href="https://github.com/sdk-fabric/specs" target="_blank" rel="noopener noreferrer">
            <span class="icon"><svg viewBox="0 0 16 16" width="16" height="16" aria-hidden="true"><path fill="currentColor" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"/></svg></span>
            <span>Go to the specs repository</span>
          </a>
        </div>
        <div class="column is-5">
          <div class="sf-step">
            <span class="sf-step-num">1</span>
            <div><strong>Change an existing SDK</strong><br>Update the corresponding spec at the specs repository, after
            the change is merged the SDKs for all languages are regenerated automatically.</div>
          </div>
          <div class="sf-step">
            <span class="sf-step-num">2</span>
            <div><strong>Add a new SDK</strong><br>Add a new spec for the service to the specs repository, once it is merged
            SDK Fabric generates the SDKs for all supported languages.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const grid = document.getElementById('projects-grid');
    const count = document.getElementById('project-count');
    const searchInput = document.getElementById('project-search');
    const base = <?php echo json_encode($base); ?>;
    const languages = [
        {key: 'csharp', label: 'C#', logo: 'client-csharp.png'},
        {key: 'go', label: 'Go', logo: 'client-go.png'},
        {key: 'java', label: 'Java', logo: 'client-java.png'},
        {key: 'javascript', label: 'JavaScript', logo: 'client-typescript.png'},
        {key: 'php', label: 'PHP', logo: 'client-php.png'},
        {key: 'python', label: 'Python', logo: 'client-python.png'},
    ];
    let debounceTimer;

    function escapeHtml(string) {
        if (!string) return '';
        return String(string).replace(/[&<>"']/g, match => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;'
        }[match]));
    }

    function formatDate(value) {
        const date = new Date(value);
        if (isNaN(date)) return '';
        return date.toLocaleDateString('en-US', {year: 'numeric', month: 'short', day: 'numeric'});
    }

    async function fetchProjects(query = '') {
        try {
            const url = new URL('https://api.sdk-fabric.org/explore');
            if (query.trim()) {
                url.searchParams.set('search', query.trim());
            }

            const response = await fetch(url.toString());
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const data = await response.json();
            renderProjects(data.entry || [], data.totalResults);
        } catch (error) {
            console.error('Error fetching projects:', error);
            count.innerHTML = '&nbsp;';
            grid.innerHTML = '<div class="sf-empty has-text-danger">Failed to load projects. Please try again later.</div>';
        }
    }

    function renderProjects(projects, total) {
        total = total ?? projects.length;
        count.textContent = `${total} ${total === 1 ? 'project' : 'projects'} available`;

        if (projects.length === 0) {
            grid.innerHTML = '<div class="sf-empty">No projects found.</div>';
            return;
        }

        grid.innerHTML = projects.map(project => {
            const configMap = (project.config || []).reduce((acc, item) => {
                acc[item.lang.toLowerCase()] = item;
                return acc;
            }, {});

            const typeHubUrl = `https://app.typehub.cloud/d/${encodeURIComponent(project.typeHubUser)}/${encodeURIComponent(project.typeHubDocument)}`;

            const langLinks = languages.map(lang => {
                const config = configMap[lang.key];
                const logo = `<img src="${base}/img/sdk/${lang.logo}" alt="">`;
                if (config && config.githubUser && config.githubRepository) {
                    const repoUrl = `https://github.com/${encodeURIComponent(config.githubUser)}/${encodeURIComponent(config.githubRepository)}`;
                    return `<a class="sf-lang" href="${repoUrl}" target="_blank" rel="noopener noreferrer" title="${lang.label} SDK on GitHub">${logo}<span>${lang.label}</span></a>`;
                }
                return `<span class="sf-lang is-disabled" title="No ${lang.label} SDK available">${logo}<span>${lang.label}</span></span>`;
            }).join('');

            const updated = formatDate(project.updateDate);

            return `
                <div class="sf-card">
                    <div class="sf-card-head">
                        <div>
                            <div class="sf-card-user">${escapeHtml(project.user)}</div>
                            <div class="sf-card-name">${escapeHtml(project.name)}</div>
                        </div>
                        <a class="sf-card-spec" href="${typeHubUrl}" target="_blank" rel="noopener noreferrer">View spec &rarr;</a>
                    </div>
                    <div class="sf-langs">${langLinks}</div>
                    ${updated ? `<div class="sf-card-meta">Updated ${escapeHtml(updated)}</div>` : ''}
                </div>
            `;
        }).join('');
    }

    searchInput.addEventListener('input', (e) => {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            fetchProjects(e.target.value);
        }, 300);
    });

    fetchProjects();
});
</script>

<?php include __DIR__ . '/inc/footer.php'; ?>
