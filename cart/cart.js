function onRemoveFromCartClicked(productID) {
    fetch("remove_from_cart.php?" + productID).then(function(response) {
        return response.text();
    }).then(function(data) {
        window.location.href = window.location.href;
    });
}

function onUpdateItemAmountInCart(productID, newAmount) {
    fetch("update_item_amount.php?" + productID + "&" + newAmount).then(function(response) {
        return response.text();
    }).then(function(data) {
        window.location.href = window.location.href;
    });
}