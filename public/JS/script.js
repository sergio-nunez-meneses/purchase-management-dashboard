const ACTION_TAB = getId('actionTab'),
  CREATE_DIV = getId('createFormContainer'),
  CREATE_FORM = getId('createForm'),
  EDIT_DIV = getId('editFormContainer'),
  EDIT_FORM = getId('editForm'),
  CREATE_BTN = getName('create-product'),
  EDIT_BTN = getName('edit-product'),
  DELETE_BTN = getName('delete-product'),
  ERROR_DIV = getId('errorContainer');

function getId(id) {
  return document.getElementById(id);
}

function getName(name) {
  return document.getElementsByName(name)[0];
}

function displayForms() {
  if (EDIT_DIV.classList.contains('hidden')) {
    EDIT_DIV.classList.remove('hidden');
    CREATE_DIV.classList.add('hidden');
    ACTION_TAB.innerHTML = 'Create';
  } else {
    CREATE_DIV.classList.remove('hidden');
    EDIT_DIV.classList.add('hidden');
    ACTION_TAB.innerHTML = 'Edit';
  }
}

ACTION_TAB.addEventListener('click', displayForms);
