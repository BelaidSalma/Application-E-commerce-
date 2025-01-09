<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Livraison</title>
    <style>
        /* Styles globaux */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ffd6a5, #ff7b00); /* Dégradé orange */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }
        .container {
            display: flex;
            width: 90%;
            max-width: 900px;
            background-color: #fff; /* Fond blanc élégant */
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15); /* Ombre douce */
            overflow: hidden;
            transform: scale(1);
            transition: transform 0.3s ease-in-out;
        }
        .container:hover {
            transform: scale(1.02); /* Effet au survol */
        }
        .image-container {
            flex: 1;
            background-size: cover;
            filter: brightness(0.9) saturate(1.2); /* Couleurs plus vives */
            animation: slide-in 1s ease-out; /* Animation d'entrée */
        }
        @keyframes slide-in {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        .form-container {
            flex: 1;
            padding: 40px 30px;
            background-color: #fffaf0; /* Fond crème doux */
            display: flex;
            flex-direction: column;
            justify-content: center;
            animation: fade-in 1.2s ease-in-out;
        }
        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .form-container h2 {
            margin-bottom: 20px;
            color: #e67e22; /* Orange vif */
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #d35400; /* Orange foncé */
            font-weight: 600;
            font-size: 0.95rem;
        }
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 2px solid #f39c12; /* Bordure orange clair */
            border-radius: 10px;
            font-size: 1rem;
            background-color: #fffaf2; /* Fond léger */
            transition: box-shadow 0.3s ease, border-color 0.3s ease;
        }
        .form-group input:focus {
            border-color: #e67e22;
            outline: none;
            box-shadow: 0 0 10px rgba(230, 126, 34, 0.6); /* Effet lumineux */
        }
        .submit-btn {
            width: 100%;
            background: linear-gradient(45deg, #e67e22, #f39c12); /* Dégradé orange */
            color: #ffffff;
            border: none;
            padding: 12px;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }
        .submit-btn:hover {
            background: linear-gradient(45deg, #d35400, #e67e22); /* Dégradé plus foncé */
            transform: translateY(-3px); /* Légère élévation */
        }
        .submit-btn:active {
            transform: translateY(0); /* Animation clic */
        }
        /* Pour les écrans plus petits */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .image-container {
                height: 200px;
            }
        }
        

    </style>
</head>
<body>
    <div class="container">
        <div   class="image-container"  style="background: url('{{ asset('images/image.png') }}') no-repeat center center; background-size: cover;">
        </div>      
        <div class="form-container">
                 <h2>Formulaire de Livraison</h2>
            <form action="{{ route('commande.store') }} " method="post" id="subscription-form">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="name"  value="{{ auth()->check() ? auth()->user()->name : '' }}" readonly >
                </div>
                <div class="form-group">
                    <label for="prenom">Email</label>
                    <input type="email"  name="email" value="{{ auth()->user()->email }}" readonly>
                </div>
                <div class="form-group">
                    <label for="prenom">Telephone</label>
                    <input type="text"  name="telephone" value="{{ auth()->user()->telephone }}" readonly>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse de Livraison</label>
                    <input type="text" id="adresse" name="adress_de_livraison" placeholder="Entrez votre adresse de livraison" required>
                </div>
                <div class="form-group">
                    <label for="card-element">Carte de Crédit</label>
                    <div id="card-element" ></div>
                </div>
               
                <button type="submit" class="submit-btn">Passer la commande</button>

            </form>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
