document.addEventListener("DOMContentLoaded", function() {
    const orderList = document.getElementById("order-list");

    // Sample orders data (you can fetch this data from an API)
    const orders = [
        { id: 1, items: ["Burger", "Fries"], table: 1 },
        { id: 2, items: ["Pizza", "Salad"], table: 2 },
        { id: 3, items: ["Pasta", "Garlic Bread"], table: 3 }
    ];

    // Display orders in the dashboard
    function displayOrders() {
        orderList.innerHTML = "";
        orders.forEach(order => {
            const listItem = document.createElement("li");
            listItem.textContent = `Order #${order.id} - Items: ${order.items.join(", ")} - Table: ${order.table}`;
            orderList.appendChild(listItem);
        });
    }

    // Call the function to display orders
    displayOrders();
});
