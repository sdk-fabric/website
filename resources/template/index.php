<?php include __DIR__ . '/inc/header.php'; ?>

<section class="hero has-text-centered">
  <div class="hero-body">
    <h1 class="title">Unified SDKs of popular services</h1>
    <p class="subtitle">SDK Fabric automatically manages and generates unified SDKs of popular services.</p>
    <div class="has-text-centered">
      <img src="<?php echo $base; ?>/img/sdk/client-typescript.png" width="100">
      <img src="<?php echo $base; ?>/img/sdk/client-java.png" width="100">
      <img src="<?php echo $base; ?>/img/sdk/client-php.png" width="100">
      <img src="<?php echo $base; ?>/img/sdk/client-go.png" width="100">
      <img src="<?php echo $base; ?>/img/sdk/client-csharp.png" width="100">
      <img src="<?php echo $base; ?>/img/sdk/client-python.png" width="100">
    </div>
  </div>
</section>

<hr>

<section class="section">
  <div class="container">
    <div class="level">
      <div class="level-left">
        <h2 class="title mb-0">Projects</h2>
      </div>
      <div class="level-right">
        <div class="field">
          <p class="control has-icons-left">
            <input id="project-search" class="input" type="text" placeholder="Search projects...">
            <span class="icon is-small is-left">
              <i class="fas fa-search"></i>
            </span>
          </p>
        </div>
      </div>
    </div>

    <div class="content">
      <table class="table is-fullwidth">
        <colgroup>
          <col width="*">
          <col width="150">
          <col width="150">
          <col width="150">
          <col width="150">
          <col width="150">
          <col width="150">
        </colgroup>
        <thead>
          <tr>
            <th>Name</th>
            <th>C#</th>
            <th>Go</th>
            <th>Java</th>
            <th>Javascript</th>
            <th>PHP</th>
            <th>Python</th>
          </tr>
        </thead>
        <tbody id="projects-table-body">
          <tr>
            <td colspan="7" class="has-text-centered">Loading projects...</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const tableBody = document.getElementById('projects-table-body');
    const searchInput = document.getElementById('project-search');
    const languages = ['csharp', 'go', 'java', 'javascript', 'php', 'python'];
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

    async function fetchProjects(query = '') {
        try {
            const url = new URL('http://dev.apioo.de/website/sdk-fabric.org/backend/public/index.php/explore');
            if (query.trim()) {
                url.searchParams.set('search', query.trim());
            }

            const response = await fetch(url.toString());
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const data = await response.json();
            renderTable(data.entry || []);
        } catch (error) {
            console.error('Error fetching projects:', error);
            tableBody.innerHTML = `
                <tr>
                    <td colspan="7" class="has-text-centered has-text-danger">
                        Failed to load projects. Please try again later.
                    </td>
                </tr>
            `;
        }
    }

    function renderTable(projects) {
        if (projects.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="7" class="has-text-centered">No projects found.</td>
                </tr>
            `;
            return;
        }

        tableBody.innerHTML = projects.map(project => {
            const configMap = (project.config || []).reduce((acc, item) => {
                acc[item.lang.toLowerCase()] = item;
                return acc;
            }, {});

            const langCells = languages.map(lang => {
                const config = configMap[lang];
                if (config && config.githubUser && config.githubRepository) {
                    const repoUrl = `https://github.com/${encodeURIComponent(config.githubUser)}/${encodeURIComponent(config.githubRepository)}`;
                    return `<td><a href="${repoUrl}" target="_blank" rel="noopener noreferrer">GitHub</a></td>`;
                }
                return `<td class="has-text-grey-light">-</td>`;
            }).join('');

            const fullName = project.user ? `${project.user}/${project.name}` : project.name;

            return `
                <tr>
                    <td><strong>${escapeHtml(fullName)}</strong></td>
                    ${langCells}
                </tr>
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
