<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: #ddd;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: sans-serif;
        }
        .card {
            max-width: 950px;
            width: 90%;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
        }
        .cart {
            background-color: #fff;
            padding: 20px;
            border-radius: 1rem 0 0 1rem;
        }
        .summary {
            background-color: #f5f5f5;
            border-radius: 0 1rem 1rem 0;
            padding: 20px;
        }
        .title {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .item-row {
            display: grid;
            grid-template-columns: 1fr 80px 80px 150px auto;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding: 15px 0;
            gap: 25px;
        }
        
        .item-row .name {
            font-weight: bold;
        }
        .item-row .quantity {
            display: flex;
            margin-left: 15px;
            margin-right: 15px;
            align-items: center;
        }
        .item-row .quantity input {
            width: 70px;
            text-align: center;
            padding: 5px;
            margin-right: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .item-row .price {
            font-weight: bold;
            color: #28a745;
            white-space: nowrap;
            flex-shrink: 0;
            margin-right: 30px;
        }
        .item-row .actions {
            display: flex;
            align-items: center;
        }
        .item-row .actions i {
            font-size: 1.5rem;
            cursor: pointer;
            transition: color 0.3s, transform 0.2s;
        }
        .item-row .actions i:hover {
            color: #007bff;
            transform: scale(1.2);
        }
        .item-row .actions .fa-trash:hover {
            color: #dc3545;
        }
        .summary p {
            margin: 10px 0;
        }
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
        }
        .btn-back:hover {
            background-color: transparent;
            color: black;
            border: 1px solid #007bff;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="row">
            <!-- Cart Section -->
            <div class="col-md-8 cart">
                <h4 class="title">Shopping Cart</h4>
                @foreach ($paniers as $panier)
                <div class="item-row">
                    
                    <div class="product-image">
                        <img src="{{ asset($panier->attributes->image )}}" alt="">
                    </div>
                    
                    <div class="name">{{ $panier->name }}</div>
                    <div class="price">{{ Number::currency($panier->price, 'MAD') }}</div>
                    
                    <!-- Formulaire pour modifier la quantité -->
                    <form action="{{ route('panier.update', $panier->id) }}" method="POST" class="quantity-form">
                        @csrf
                        @method('PUT')
                        <div class="quantity">
                            <input type="number" name="quantity" value="{{ $panier->quantity }}" min="1" required>
                            <button type="submit" style="border: none; background: none;">
                                <i class="fas fa-edit text-primary"></i>
                            </button>
                        </div>
                    </form>

                    <!-- Formulaire pour supprimer -->
                    <form action="{{ route('panier.destroy', $panier->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link">
                            <i class="fas fa-trash text-danger"></i>
                        </button>
                    </form>
                </div>
                @endforeach

                <a href="{{ route('home.accueil') }}" class="btn-back">&larr; Back to Shop</a>
            </div>

            <!-- Summary Section -->
            <div class="col-md-4 summary">
                <h5><b>Summary</b></h5>
                <p><strong>Total :</strong> {{ number_format($total, 2, ',', ' ') }} MAD</p>
                <hr>
                <a href="{{ route('commande.create')}}">
                     <button class="btn btn-dark btn-block">CHECKOUT</button>
                </a>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
       document.addEventListener('DOMContentLoaded', () => {
           const quantiteInputs = document.querySelectorAll('input[name="quantity"]');
           quantiteInputs.forEach(input => {
               input.addEventListener('input', e => {
                   if (e.target.value < 1) {
                       e.target.value = 1;
                   }
               });
           });
       });
    </script>
    @endpush

    <!-- Script pour la gestion des modals -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
