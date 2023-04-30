<footer>
    <div class="footer-content container">
        <div class="made-with">Made with <i class="fa fa-heart heart"></i> by Andre Madarang</div>
        <ul>
            <li>Follow Me: </li>
            <li><a href="https://andremadarang.com"><i class="fa fa-globe"></i></a></li>
            <li><a href="https://www.youtube.com/drehimself"><i class="fa fa-youtube"></i></a></li>
            <li><a href="https://github.com/drehimself"><i class="fa fa-github"></i></a></li>
            <li><a href="https://twitter.com/drehimself"><i class="fa fa-twitter"></i></a></li>
        </ul>
    </div> <!-- end footer-content -->
</footer>
{{-- Stripe JS --}}
{{-- TODO add route check for /checkout --}}
<script>
// This is your test publishable API key.
var stripe = Stripe("pk_test_51KQjhVDURkeweLmSI8rh9RvBqatiAJTsCEMLQ0pNvT636Dp0D5ewgHoM7kQxpWtPbZaeRWnOksl7mP8hw7CIQc1y002tprjIwQ");
// The items the customer wants to buy
var purchase = {
  items: [{ id: "xl-tshirt" }]
};
// Disable the button until we have Stripe set up on the page
document.querySelector("#submit").disabled = true;
fetch("/checkout", {
  method: "POST",
  headers: {
    "Content-Type": "application/json",
    "X-CSRF-TOKEN": "{{ csrf_token() }}"
  },
  body: JSON.stringify(purchase)
})
  .then(function(result) {
    return result.json();
  })
  .then(function(data) {
    var elements = stripe.elements();
    var style = {
      base: {
        color: "#32325d",
        fontFamily: 'Arial, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder": {
          color: "#32325d"
        }
      },
      invalid: {
        fontFamily: 'Roboto, sans-serif',
        color: "#fa755a",
        iconColor: "#fa755a"
      }
    };
    var card = elements.create("card", { style: style });
    // Stripe injects an iframe into the DOM
    card.mount("#card-element");
    card.on("change", function (event) {
      // Disable the Pay button if there are no card details in the Element
      document.querySelector("#submit").disabled = event.empty;
      document.querySelector("#card-error").textContent = event.error ? event.error.message : "";
    });
    var form = document.getElementById("payment-form");
    form.addEventListener("submit", function(event) {
      event.preventDefault();
      // Complete payment when the submit button is clicked
      payWithCard(stripe, card, data.clientSecret);
    });
  });
// Calls stripe.confirmCardPayment
// If the card requires authentication Stripe shows a pop-up modal to
// prompt the user to enter authentication details without leaving your page.
var payWithCard = function(stripe, card, clientSecret) {
  loading(true);
  stripe
    .confirmCardPayment(clientSecret, {
      payment_method: {
        card: card
      }
    })
    .then(function(result) {
      if (result.error) {
        // Show error to your customer
        showError(result.error.message);
      } else {
        // The payment succeeded!
        orderComplete(result.paymentIntent.id);
        window.location.href = "/thankyou"
      }
    });
};
/* ------- UI helpers ------- */
// Shows a success message when the payment is complete
var orderComplete = function(paymentIntentId) {
  loading(false);
  document
    .querySelector(".result-message a")
    .setAttribute(
      "href",
      "https://dashboard.stripe.com/test/payments/" + paymentIntentId
    );
  document.querySelector("#submit").disabled = true;
};
// Show the customer the error from Stripe if their card fails to charge
var showError = function(errorMsgText) {
  loading(false);
  var errorMsg = document.querySelector("#card-error");
  errorMsg.textContent = errorMsgText;
  setTimeout(function() {
    errorMsg.textContent = "";
  }, 4000);
};
// Show a spinner on payment submission
var loading = function(isLoading) {
  if (isLoading) {
    // Disable the button and show a spinner
    document.querySelector("#submit").disabled = true;
    document.querySelector("#spinner").classList.remove("hidden");
    document.querySelector("#button-text").classList.add("hidden");
  } else {
    document.querySelector("#submit").disabled = false;
    document.querySelector("#spinner").classList.add("hidden");
    document.querySelector("#button-text").classList.remove("hidden");
  }
};
</script>