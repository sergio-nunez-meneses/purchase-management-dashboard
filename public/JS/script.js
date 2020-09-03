const ACTION_TAB = getId('actionTab'),
  CREATE_FORM = getId('creationForm'),
  EDIT_FORM = getId('editionForm'),
  CREATE_BTN = getName('create-product'),
  EDIT_BTN = getName('edit-product'),
  DELETE_BTN = getName('delete-product');
  console.log(ACTION_TAB, CREATE_FORM, EDIT_FORM);

function getId(id) {
  return document.getElementById(id);
}

function getName(name) {
  return document.getElementsByName(name)[0];
}

function displayForms() {
  if (EDIT_FORM.classList.contains('hidden')) {
    EDIT_FORM.classList.remove('hidden');
    CREATE_FORM.classList.add('hidden');
    ACTION_TAB.innerHTML = 'Create';
  } else {
    CREATE_FORM.classList.remove('hidden');
    EDIT_FORM.classList.add('hidden');
    ACTION_TAB.innerHTML = 'Edit';
  }
}

ACTION_TAB.addEventListener('click', displayForms);
