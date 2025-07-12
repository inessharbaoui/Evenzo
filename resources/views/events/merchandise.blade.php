<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchandise</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f7f7f7;
            padding: 40px;
        }

        .merch-container {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 30px;
            justify-items: center;
        }

        .merch-item {
            width: 250px;
            height: 300px;
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            cursor: pointer;
        }

        .merch-item:hover {
            transform: scale(1.05);
        }

        .merch-image {
            width: 100%;
            height: 50%;
            object-fit: cover;
            border-bottom: 3px solid #ddd;
        }

        .merch-info {
            padding: 15px;
            text-align: center;
            flex-grow: 1;
        }

        .merch-info h3 {
            font-size: 1.5em;
            color: #333;
            margin: 10px 0;
        }

        .merch-info p {
            font-size: 1.1em;
            color: #666;
            margin: 8px 0;
        }

        .merch-price {
            font-size: 1.3em;
            font-weight: bold;
            color: #2C7A7B;
            margin-top: 15px;
        }

        .merch-stock {
            font-size: 1.2em;
            color: #FF5733;
            margin-top: 10px;
        }

        .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 50%;
    top: 46%;
    transform: translate(-50%, -50%);
    width: 50%;
    max-width: 500px;
    background-color: rgba(0, 0, 0, 0.5);
    padding-top: 60px;
}

.modal-content {
    background-color: #fff;
    padding: 15px;
    border-radius: 8px;
    text-align: center;
}

@media (max-width: 768px) {
    .modal {
        width: 80%;
    }

    .modal-content {
        width: 100%;
    }
}



        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 25px;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-buy {
            background-color: #2C7A7B;
            color: white;
            padding: 8px 15px;
            border: none;
            font-size: 1.1em;
            cursor: pointer;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .btn-buy:hover {
            background-color: #1c5956;
        }



.close-btn {
    background-color: #010101;
    color: white;
    padding: 10px 20px;
    border: none;
    font-size: 1em;
    font-weight: bold;
    cursor: pointer;
    border-radius: 6px;
    transition: background-color 0.3s ease;
    position: absolute;
    top: 70px;
    right: 10px;
}

.close-btn:hover {
    background-color: #010101;
}

    </style>
</head>
<body>
    <div class="merch-container">
        @foreach($merchandise as $item)
            <div class="merch-item" onclick="openModal('{{ $item->name }}', '{{ $item->price }}', '{{ $item->description }}', '{{ asset('storage/' . $item->photo_path) }}')">
                <img src="{{ asset('storage/' . $item->photo_path) }}" alt="Merchandise Image" class="merch-image">
                <div class="merch-info">
                    <h3>{{ $item->name }}</h3>
                    <p>{{ $item->description }}</p>
                    <p class="merch-price">${{ number_format($item->price, 2) }}</p>
                    <p class="merch-stock">Stock: {{ $item->stock }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div id="merchModal" class="modal">
        <div class="modal-content">
            <h2 id="modalTitle"></h2>
            <img id="modalImage" src="" alt="Merchandise Image" style="width:100%; height:auto; margin-bottom: 20px;">
            <p id="modalDescription"></p>
            <p id="modalPrice" class="merch-price"></p>
            <button class="btn-buy" onclick="thankYouMessage()">Buy Merchandise</button>
            <button class="close-btn" onclick="closeModal()">Close</button>

        </div>
    </div>

    <script>
function openModal(name, price, description, image) {
    document.getElementById('modalTitle').textContent = name;
    document.getElementById('modalDescription').textContent = description;
    document.getElementById('modalPrice').textContent = '$' + price;
    document.getElementById('modalImage').src = image;

    document.getElementById('merchModal').style.display = "block";
}


function thankYouMessage() {
    document.getElementById('modalTitle').textContent = "Thank You!";
    document.getElementById('modalDescription').textContent = "Thank you for your purchase!";
    document.getElementById('modalPrice').style.display = "none";
    document.querySelector('.btn-buy').style.display = "none";
}

window.addEventListener('click', function(event) {
    const modal = document.getElementById('merchModal');
    const modalContent = document.querySelector('.modal-content');

    if (event.target == modal) {
        closeModal();
    }
});
function closeModal() {
    document.getElementById('merchModal').style.display = "none";
}
    </script>
</body>
</html>
