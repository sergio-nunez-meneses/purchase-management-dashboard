let editBtns = getName('edit-btn'),
  submitBtns = getName('submit-btn');

function setSelector(column) {
  selector = '[class*="product-' + column + '"]';
  return getAll(selector);
}

for (let i = 0; i < editBtns.length; i++) {
  editBtns[i].addEventListener('click', () => {
    let editName = getName('product-name')[i],
      editReference = getName('product-reference')[i],
      editCategory = getName('product-category[]')[i],
      editPrice = getName('product-price')[i],
      editDate = getName('purchase-date')[i],
      editWarranty = getName('warranty-date')[i],
      editPlace = getName('purchase-place[]')[i],
      editAddress = getName('place-address')[i],
      editMaintenance = getName('product-maintenance')[i],
      editReceipt = getName('purchase-receipt[]')[i],
      editManual = getName('user-manual')[i],
      storedNames = setSelector('name'),
      storedReferences = setSelector('reference'),
      storedCategories = setSelector('category'),
      storedPrices = setSelector('price'),
      storedDates = getAll('[class*="purchase-date"]'),
      storedWarranties = getAll('[class*="warranty-date"]'),
      storedPlaces = getAll('[class*="purchase-place"]'),
      storedAddresses = getAll('[class*="place-address"]'),
      storedMaintenances = setSelector('maintenance'),
      storedReceipts = getAll('[class*="purchase-receipt"]'),
      storedManuals = getAll('[class*="user-manual"]');

    if (editName.classList.contains('hidden')) {
      storedNames[i].classList.add('hidden');
      storedReferences[i].classList.add('hidden');
      storedCategories[i].classList.add('hidden');
      storedPrices[i].classList.add('hidden');
      storedDates[i].classList.add('hidden');
      storedWarranties[i].classList.add('hidden');
      storedPlaces[i].classList.add('hidden');
      storedAddresses[i].classList.add('hidden');
      storedMaintenances[i].classList.add('hidden');
      storedReceipts[i].classList.add('hidden');
      storedManuals[i].classList.add('hidden');
      editName.classList.remove('hidden');
      editReference.classList.remove('hidden');
      editCategory.classList.remove('hidden');
      editPrice.classList.remove('hidden');
      editDate.classList.remove('hidden');
      editWarranty.classList.remove('hidden');
      editPlace.classList.remove('hidden');
      editAddress.classList.remove('hidden');
      editMaintenance.classList.remove('hidden');
      editReceipt.classList.remove('hidden');
      editManual.classList.remove('hidden');
      submitBtns[i].classList.remove('hidden');
      editBtns[i].innerHTML = 'hide';
    } else {
      editName.classList.add('hidden');
      editReference.classList.add('hidden');
      editCategory.classList.add('hidden');
      editPrice.classList.add('hidden');
      editDate.classList.add('hidden');
      editWarranty.classList.add('hidden');
      editPlace.classList.add('hidden');
      editAddress.classList.add('hidden');
      editMaintenance.classList.add('hidden');
      editReceipt.classList.add('hidden');
      editManual.classList.add('hidden');
      storedNames[i].classList.remove('hidden');
      storedReferences[i].classList.remove('hidden');
      storedCategories[i].classList.remove('hidden');
      storedPrices[i].classList.remove('hidden');
      storedDates[i].classList.remove('hidden');
      storedWarranties[i].classList.remove('hidden');
      storedPlaces[i].classList.remove('hidden');
      storedAddresses[i].classList.remove('hidden');
      storedMaintenances[i].classList.remove('hidden');
      storedReceipts[i].classList.remove('hidden');
      storedManuals[i].classList.remove('hidden');
      submitBtns[i].classList.add('hidden');
      editBtns[i].innerHTML = '<i class="fa fa-pencil"></i>';
    }
  });
}
