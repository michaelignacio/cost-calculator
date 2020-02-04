/**
 * Constructs the table row
 * @return html Table row that contains the elements
 */
function constructTableRow(data) {
  const row = document.createElement('tr');
  const { month, studies, cost } = data;
  row.appendChild(constructElement('td', month));
  row.appendChild(constructElement('td', studies));
  row.appendChild(constructElement('td', cost));

  return row;
}

/**
 * Constructs the table element
 * @return html Table element that contains the data
 */
function constructElement(tagName, text) {
  const el = document.createElement(tagName);
  const content = document.createTextNode(text);
  el.appendChild(content);

  return el;
}

const form = document.getElementById('form');

form.addEventListener('submit', function(e) {
  e.preventDefault();

  const formData = new FormData(this);
  const table = document.getElementById('table').getElementsByTagName('tbody')[0];
  table.innerHTML = "";

/**
 * Fetches resource using the user input
 * @return json JSON output from the fetch call
 */
  function fetchData(url) {
    return fetch(url, {
      method: 'post',
      body: formData
    }).then((resp) => resp.json());
  }

  fetchData('src/FormHandler.php').then((data) => {
    data.forEach(result => {
      const row = constructTableRow(result);
      table.appendChild(row);
    });
  });
});

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
