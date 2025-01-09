// Initialiser Stripe et les éléments
var stripe = Stripe('pk_test_51QU96hHJp3zqqbsiGC8C2UZ8fMZfBKkq8y6lb6cYgT072wCUNl5XDq7OKJbyUNe46TPEvbw14brHOg30kVklXZ8j00eOwgJ819');
var elements = stripe.elements();
var card = elements.create('card');
card.mount('#card-element');

// Gérer la soumission du formulaire
var form = document.getElementById('subscription-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
        if (result.error) {
            // Informer l'utilisateur s'il y a eu une erreur.
            alert(result.error.message);
        } else {
            // Envoyer le jeton à votre serveur.
            stripeTokenHandler(result.token);
        }
    });
});

function stripeTokenHandler(token) {
    // Insérez l'ID du jeton dans le formulaire afin qu'il soit soumis au serveur
    var form = document.getElementById('subscription-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    // Soumettre le formulaire
    form.submit();
}
