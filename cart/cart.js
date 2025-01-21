function onRemoveFromCartClicked(productID) {
    fetch("remove_from_cart.php?" + productID).then(function(response) {
        return response.text();
    }).then(function(data) {
        window.location.href = window.location.href;
    });
}

function onUpdateItemAmountInCart(productID, sizeID, newAmount) {
    fetch("update_item_amount.php?" + productID + "&" + sizeID + "&" + newAmount).then(function(response) {
        return response.text();
    }).then(function(data) {
        window.location.href = window.location.href;
    });
}