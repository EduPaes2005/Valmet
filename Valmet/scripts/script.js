const API_URL = '../src/config/fetch.php';
const UPDATE_URL = '../src/config/update.php';

const table = document.getElementById('dashboardTable');
const counters = document.getElementById('counters');
const semanaInput = document.getElementById('semanaFiltro');

function loadData(semana = '', status = '') {
  fetch(`${API_URL}?semana=${semana}&status=${status}`)
    .then(res => res.json())
    .then(data => {
      renderCounters(data);
      renderTable(data);
    });
}

function renderCounters(data) {
  const statuses = ['Em espera', 'Em andamento', 'Revisão', 'Concluído', 'Em alerta'];
  const counts = {};
  statuses.forEach(s => counts[s] = 0);
  data.forEach(d => counts[d.status]++);

  counters.innerHTML = statuses.map(status =>
    `<div class="counter" onclick="loadData('${semanaInput.value}','${status}')">
      ${status} <span>${counts[status] || 0}</span>
    </div>`
  ).join('');
}

function renderTable(data) {
  const headers = Object.keys(data[0] || {}).filter(h => h !== 'id');
  const headerHTML = `<tr><th>ID</th>${headers.map(h => `<th>${h}</th>`).join('')}</tr>`;
  const rows = data.map(row => {
    const tds = headers.map(h => `
      <td contenteditable="true" 
          data-id="${row.id}" 
          data-field="${h}" 
          onblur="saveEdit(this)">
        ${row[h] || ''}
      </td>`).join('');
    return `<tr><td>${row.id}</td>${tds}</tr>`;
  }).join('');
  table.innerHTML = headerHTML + rows;
}

function saveEdit(cell) {
  const id = cell.dataset.id;
  const field = cell.dataset.field;
  const value = cell.innerText;

  fetch(UPDATE_URL, {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `id=${id}&campo=${field}&valor=${encodeURIComponent(value)}`
  });
}

semanaInput.addEventListener('input', () => loadData(semanaInput.value));

window.onload = () => loadData();