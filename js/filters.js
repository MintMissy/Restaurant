const tableData = document.querySelectorAll('[role="table-data"]');

const filters = document.querySelectorAll('[role="filter"]');
filters.forEach((filter) => filter.addEventListener('click', changeTabPanel));

function changeTabPanel(event) {
  targetFilter = event.target;
  targetData = targetFilter.getAttribute('aria-controls');
  targetDataElement = document.getElementById(targetData);

  hideContent(tableData);
  showContent(targetDataElement);

  resetFiltersColors(filters, '');
  changeBtnColor(targetFilter, 'yellow');

  resetFiltersAriaSelected(filters);
  targetFilter.setAttribute('aria-selected', true);
}

function hideContent(content) {
  content.forEach((data) => data.setAttribute('hidden', true));
}

function showContent(content) {
  content.removeAttribute('hidden');
}

function resetFiltersColors(filters) {
  filters.forEach((filter) => changeBtnColor(filter));
}

function changeBtnColor(btn, color) {
  btn.classList.remove('btn--light-gray');
  btn.classList.remove('text-white');
  btn.classList.remove('text-dark');
  switch (color) {
    case 'yellow':
      btn.classList.add('text-dark');
      break;
    default:
      btn.classList.add('text-white');
      btn.classList.add('btn--light-gray');
      break;
  }
}

function resetFiltersAriaSelected(filters) {
  filters.forEach((filter) => filter.setAttribute('aria-selected', false));
}
