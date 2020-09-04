const ACTION_TAB = getId('actionTab'),
  CREATE_DIV = getId('createFormContainer'),
  CREATE_FORM = getId('createForm'),
  EDIT_DIV = getId('editFormContainer'),
  EDIT_FORM = getId('editForm'),
  CREATE_BTN = getName('create-product'),
  EDIT_BTN = getName('edit-product'),
  DELETE_BTN = getName('delete-product');
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

function validateForm() {
  let id = getName('product-id').value,
    name = getName('product-name').value,
    reference = getName('product-reference').value,
    // category = getName('product-category').value,
    price = getName('product-price').value,
    date = getName('purchase-date').value,
    warranty = getName('warranty-date').value,
    // saleType = getName('purchase-place').value,
    sellerAddress = getName('place-address').value,
    maintenance = getName('product-maintenance').value,
    userId = getName('user-id').value,
    errorDisplay = getId('displayErrors'),
    error = false,
    errorMsg = '';

  if (id.length == 0) {
    error = true;
    errorMsg += 'Id cannot be empty <br>';
  }

  if (name.length == 0) {
    error = true;
    errorMsg += 'Name cannot be empty <br>';
  } else if (name.length < 10) {
    error = true;
    errorMsg += 'Name must contain more than 10 characters <br>';
  }

  if (reference.length == 0) {
    error = true;
    errorMsg += 'Reference cannot be empty <br>';
  } else if (reference.length < 4) {
    error = true;
    errorMsg += 'Reference must contain more than 4 characters <br>';
  }

  // if (category.length == 0) {
  //   error = true;
  //   errorMsg += 'Category cannot be empty <br>';
  // }

  if (price.length == 0) {
    error = true;
    errorMsg += 'Price cannot be empty <br>';
  } else if (price.value % 1 == 0) {
    error = true;
    errorMsg += 'Price must be decimal number <br>';
  }

  if (date.length == 0) {
    error = true;
    errorMsg += 'Date cannot be empty <br>';
  }

  // if (warranty.length == 0) {
  //   error = true;
  //   errorMsg += 'Warranty cannot be empty <br>';
  // } else if (date <= warranty) {
  //   error = true;
  //   errorMsg += 'Warranty cannot be the same as the purchase date <br>';
  // }

  // if (saleType.length == 0) {
  //   error = true;
  //   errorMsg += 'Sale type cannot be empty <br>';
  // }

  if (sellerAddress.length == 0) {
    error = true;
    errorMsg += 'Seller\'s address cannot be empty <br>';
  }

  if (maintenance.length == 0) {
    error = true;
    errorMsg += 'Maintenance cannot be empty <br>';
  } else if (maintenance.length < 10) {
    error = true;
    errorMsg += 'Maintenance must contain more than 10 characters <br>';
  }

  if (userId.length == 0) {
    error = true;
    errorMsg += 'User id address cannot be empty <br>';
  }

  if (error === true) {
    errorContainer.classList.remove('hidden');
    displayErrors.innerHTML = errorMsg;
    return false;
  } else {
    CREATE_FORM.submit();
  }
}

ACTION_TAB.addEventListener('click', displayForms);
// CREATE_BTN.addEventListener('click', (e) => {
//   e.preventDefault();
//   validateForm();
// });
ERROR_DIV.addEventListener('click', () => {
  errorContainer.classList.add('hidden');
});
