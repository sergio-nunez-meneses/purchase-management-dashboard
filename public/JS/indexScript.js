let editBtns = getName('edit-btn'),
  submitBtns = getName('submit-btn');

function setSelector(column) {
  selector = '[class*="product-' + column + '"]';
  return getAll(selector)[0];
}

for (let i = 0; i < editBtns.length; i++) {
  editBtns[i].addEventListener('click', () => {
    let id = getName('product-id')[i].value,
      editName = getName('product-name-' + id)[0],
      editReference = getName('product-reference-' + id)[0],
      editCategory = getName('product-category-' + id + '[]')[0],
      editPrice = getName('product-price-' + id)[0],
      editDate = getName('purchase-date-' + id)[0],
      editWarranty = getName('warranty-date-' + id)[0],
      editPlace = getName('purchase-place-' + id + '[]')[0],
      editAddress = getName('place-address-' + id)[0],
      editMaintenance = getName('product-maintenance-' + id)[0],
      editReceipt = getName('purchase-receipt-' + id + '[]')[0],
      editManual = getName('user-manual-' + id)[0],
      storedNames = setSelector('name-' + id),
      storedReferences = setSelector('reference-' + id),
      storedCategories = setSelector('category-' + id),
      storedPrices = setSelector('price-' + id),
      storedDates = getAll('[class*="purchase-date-' + id + '"]')[0],
      storedWarranties = getAll('[class*="warranty-date-' + id + '"]')[0],
      storedPlaces = getAll('[class*="purchase-place-' + id + '"]')[0],
      storedAddresses = getAll('[class*="place-address-' + id + '"]')[0],
      storedMaintenances = setSelector('maintenance-' + id),
      storedReceipts = getAll('[class*="purchase-receipt-' + id + '"]')[0],
      storedManuals = getAll('[class*="user-manual-' + id + '"]')[0];

    if (editName.classList.contains('hidden')) {
      storedNames.classList.add('hidden');
      storedReferences.classList.add('hidden');
      storedCategories.classList.add('hidden');
      storedPrices.classList.add('hidden');
      storedDates.classList.add('hidden');
      storedWarranties.classList.add('hidden');
      storedPlaces.classList.add('hidden');
      storedAddresses.classList.add('hidden');
      storedMaintenances.classList.add('hidden');
      storedReceipts.classList.add('hidden');
      storedManuals.classList.add('hidden');
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
      storedNames.classList.remove('hidden');
      storedReferences.classList.remove('hidden');
      storedCategories.classList.remove('hidden');
      storedPrices.classList.remove('hidden');
      storedDates.classList.remove('hidden');
      storedWarranties.classList.remove('hidden');
      storedPlaces.classList.remove('hidden');
      storedAddresses.classList.remove('hidden');
      storedMaintenances.classList.remove('hidden');
      storedReceipts.classList.remove('hidden');
      storedManuals.classList.remove('hidden');
      submitBtns[i].classList.add('hidden');
      editBtns[i].innerHTML = '<i class="fa fa-pencil"></i>';
    }
  });
}
