// Fulfill Order
document.getElementById("fulfill-order-btn").addEventListener("click", function () {
    const orderStatus = document.getElementById("order-status").value;
    const trackingNo = document.getElementById("tracking-no").value;

    alert(`Order Status: ${orderStatus}\nTracking No.: ${trackingNo}`);

    document.querySelector(".status-shipped").innerText = orderStatus;
});
