document.addEventListener("DOMContentLoaded", function() {
    const waiterList = document.getElementById("waiter-list");
    const orderTableBody = document.querySelector("#order-table tbody");
    const waiterSelect = document.getElementById("waiter-select");
    const assignWaiterBtn = document.getElementById("assignWaiterBtn");

    // Dummy data for waiters and orders
    const waiters = ["Waiter 1", "Waiter 2", "Waiter 3"];
    const orders = [
        { id: 1, customerName: "Customer 1", assignedWaiter: "" },
        { id: 2, customerName: "Customer 2", assignedWaiter: "" },
        // Add more orders as needed
    ];

    // Function to display waiters and orders
    function displayWaitersAndOrders() {
        waiterList.innerHTML = waiters.map(waiter => `<li>${waiter}</li>`).join("");
        
        orderTableBody.innerHTML = "";
        orders.forEach(order => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${order.id}</td>
                <td>${order.customerName}</td>
                <td>${order.assignedWaiter}</td>
            `;
            orderTableBody.appendChild(row);
        });

        // Populate waiter selection dropdown
        waiterSelect.innerHTML = waiters.map(waiter => `<option value="${waiter}">${waiter}</option>`).join("");
    }

    // Function to assign a waiter to an order
    function assignWaiter(orderId, selectedWaiter) {
        const order = orders.find(order => order.id === orderId);
        if (order) {
            order.assignedWaiter = selectedWaiter;
        }
    }

    // Event listener for the "Assign Waiter" button
    assignWaiterBtn.addEventListener("click", function() {
        const selectedWaiter = waiterSelect.value;
        const selectedOrderId = parseInt(prompt("Enter the order ID:"));
        if (selectedOrderId && !isNaN(selectedOrderId)) {
            assignWaiter(selectedOrderId, selectedWaiter);
            displayWaitersAndOrders();
        } else {
            alert("Invalid order ID. Please try again.");
        }
    });

    // Initial display of waiters and orders
    displayWaitersAndOrders();
});
