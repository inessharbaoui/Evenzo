function showDashboard() {
    document.getElementById("dashboardContent").style.display = "block";
    document.getElementById("eventsContent").style.display = "none";
    document.getElementById("merchandiseContent").style.display = "none";
    document.getElementById("galleryContent").style.display = "none";
    document.getElementById("Users").style.display = "none";
}

function showEvents() {
    document.getElementById("dashboardContent").style.display = "none";
    document.getElementById("eventsContent").style.display = "block";
    document.getElementById("merchandiseContent").style.display = "none";
    document.getElementById("galleryContent").style.display = "none";
    document.getElementById("Users").style.display = "none";
}

function showMerchandise() {
    document.getElementById("dashboardContent").style.display = "none";
    document.getElementById("eventsContent").style.display = "none";
    document.getElementById("merchandiseContent").style.display = "block";
    document.getElementById("galleryContent").style.display = "none";
    document.getElementById("Users").style.display = "none";
}

function showGallery() {
    document.getElementById("dashboardContent").style.display = "none";
    document.getElementById("eventsContent").style.display = "none";
    document.getElementById("merchandiseContent").style.display = "none";
    document.getElementById("galleryContent").style.display = "block";
    document.getElementById("Users").style.display = "none";
}

function showUsers() {
    document.getElementById("dashboardContent").style.display = "none";
    document.getElementById("eventsContent").style.display = "none";
    document.getElementById("merchandiseContent").style.display = "none";
    document.getElementById("galleryContent").style.display = "none";
    document.getElementById("Users").style.display = "block";
}

function toggleForm() {
    const modal = document.getElementById("addEventModal");
    modal.style.display =
        modal.style.display === "none" || modal.style.display === ""
            ? "flex"
            : "none";
}

function handleFormSubmit(event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);

    fetch(form.action, {
        method: form.method,
        body: formData,
        headers: {
            "X-Requested-With": "XMLHttpRequest",
        },
    })
        .then((response) => {
            if (response.ok) {
                toggleForm();
                return response.json();
            } else {
                throw new Error(
                    "Error submitting form: " + response.statusText
                );
            }
        })
        .then((data) => {
            const tableBody = document.getElementById("eventTableBody");
            const newRow = document.createElement("tr");
            newRow.classList.add("highlight");
            newRow.innerHTML = `
        <td>${data.name}</td>
        <td>${data.type}</td>
        <td><span class="status">${data.status}</span></td>
    `;
            tableBody.appendChild(newRow);
        })
        .catch((error) => console.error("Fetch error:", error));

    return false;
}

window.onclick = function (event) {
    const modal = document.getElementById("addEventModal");
    if (event.target === modal) {
        toggleForm();
    }
};

function handleFormSubmit(event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);

    fetch(form.action, {
        method: form.method,
        body: formData,
        headers: {
            "X-Requested-With": "XMLHttpRequest",
        },
    })
        .then((response) => {
            if (response.ok) {
                toggleForm();
                return response.json();
            } else {
                throw new Error(
                    "Error submitting form: " + response.statusText
                );
            }
        })
        .then((data) => {
            if (data && data.name && data.type && data.status) {
                const tableBody = document.getElementById("eventTableBody");
                const newRow = document.createElement("tr");
                newRow.classList.add("highlight");
                newRow.innerHTML = `
        <td>${data.name}</td>
        <td>${data.type}</td>
        <td><span class="status">${data.status || "N/A"}</span></td>
    `;
                tableBody.appendChild(newRow);
            } else {
                console.error("Invalid event data received:", data);
            }
        })
        .catch((error) => {
            console.error("Error:", error);
        });

    return false;
}

function showEventDetails(event) {
    const modal = document.getElementById("eventDetailsModal");
    const content = document.getElementById("eventDetailsContent");

    console.log("Event Details:", event);
    console.log("Event Photo Path:", event.photo_path);

    const imageUrl = event.photo_path
        ? `http://127.0.0.1:8000/storage/${event.photo_path}`
        : null;
    console.log("Image URL:", imageUrl);

    content.innerHTML = `
        <p><strong>Event Name:</strong> ${event.name}</p>
        <p><strong>Artist:</strong> ${
            event.artist || "Not specified"
        }</p> <!-- Added Artist -->
        <p><strong>Location:</strong> ${event.location || "Not specified"}</p>
        <p><strong>Duration:</strong> ${
            event.duration || "Not specified"
        } hours</p>
        <p><strong>Type:</strong> ${event.type}</p>
        <p><strong>Max Attendees:</strong> ${
            event.max_attendees || "Not specified"
        }</p>
        <p><strong>Price:</strong> $${event.price || "Free"}</p>
        <p><strong>Status:</strong> ${event.status}</p>
        ${
            imageUrl
                ? `<img src="${imageUrl}" alt="Event Image" style="max-width: 100%;">`
                : ""
        }
    `;

    modal.style.display = "block";
}

function toggleDetailsModal() {
    const modal = document.getElementById("eventDetailsModal");
    modal.style.display = "none";
}
function showUpdateForm(eventData) {
    if (!eventData || !eventData._id) {
        console.error("Event data is missing or invalid.");
        return;
    }

    document.getElementById("updateEventModal").style.display = "block";

    document.getElementById("updateEventId").value = eventData._id;
    document.getElementById("update_name").value = eventData.name;
    document.getElementById("update_artist").value = eventData.artist;
    document.getElementById("update_location").value = eventData.location;
    document.getElementById("update_duration").value = eventData.duration;
    document.getElementById("update_type").value = eventData.type;
    document.getElementById("update_max_attendees").value =
        eventData.max_attendees;
    document.getElementById("update_price").value = eventData.price;

    document.getElementById("updateEventForm").action =
        "/events/" + eventData._id;
}

function toggleUpdateForm() {
    document.getElementById("updateEventModal").style.display = "none";
}

function toggleModal() {
    const modal = document.getElementById("addMerchModal");
    modal.style.display =
        modal.style.display === "none" || modal.style.display === ""
            ? "block"
            : "none";
}
function openModal(details) {
    const modal = document.getElementById("merchandiseModal");
    document.getElementById("modalImage").src = details.photoPath;
    document.getElementById("modalName").textContent = details.name;
    document.getElementById("modalDescription").textContent =
        details.description || "No description available.";
    document.getElementById("modalPrice").textContent =
        "Price: $" + details.price;
    document.getElementById("modalStock").textContent =
        "Stock: " + details.stock;

    modal.style.display = "flex";
}

function closeModal() {
    const modal = document.getElementById("merchandiseModal");
    modal.style.display = "none";
}

function openUpdateModal(details) {
    const form = document.getElementById("updateMerchandiseForm");
    form.action = "/merchandise/" + details.id;

    document.getElementById("updateMerchId").value = details.id;
    document.getElementById("update_name").value = details.name;
    document.getElementById("update_description").value = details.description;
    document.getElementById("update_price").value = details.price;
    document.getElementById("update_stock").value = details.stock;

    const modal = document.getElementById("updateMerchandiseModal");
    modal.style.display = "flex";
}

function closeUpdateModal() {
    const modal = document.getElementById("updateMerchandiseModal");
    modal.style.display = "none";
}
function toggleConcertModal() {
    const modal = document.getElementById("addConcertModal");
    modal.style.display =
        modal.style.display === "none" || modal.style.display === ""
            ? "block"
            : "none";
}
function openUpdateConcertModal({ id, name, artist, date, photos }) {
    const modal = document.getElementById("updateConcertModal");

    document.getElementById("update_concert_name").value = name;
    document.getElementById("update_concert_artist").value = artist;
    document.getElementById("update_concert_date").value = date;
    document.querySelector("#updateConcertForm input[name='id']").value = id;

    console.log("Photos for the concert:", photos);

    modal.style.display = "block";
}

function closeUpdateConcertModal() {
    const modal = document.getElementById("updateConcertModal");
    modal.style.display = "none";
}

fetch("/comments")
    .then((response) => {
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        return response.json();
    })
    .then((comments) => {
        const commentsBody = document.getElementById("comments-body");
        commentsBody.innerHTML = "";

        comments.forEach((comment) => {
            const row = document.createElement("tr");
            const commentCell = document.createElement("td");
            commentCell.textContent = comment.text;
            row.appendChild(commentCell);
            commentsBody.appendChild(row);
        });
    })
    .catch((error) => {
        console.error("Error fetching comments:", error);
    });
