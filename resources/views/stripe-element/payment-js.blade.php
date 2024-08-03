<script>
    const stripe = Stripe("{{config('services.stripe.key')}}");

    let elements;

    initialize();
    checkStatus();

    document
        .querySelector("#payment-form")
        .addEventListener("submit", handleSubmit);

    // Fetches a payment intent and captures the client secret
    async function initialize() {

        const {
            clientSecret
        } = await fetch("{{route('api.stripe.client.secret')}}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
        }).then((r) => r.json());

        // set payment form theme
        const appearance = {
            theme: 'night',
            variables: {
                colorPrimaryText: '#fff'
            }
        };

        elements = stripe.elements({
            clientSecret,
            appearance
        });

        // set layout of the form
        const paymentElementOptions = {
            layout: "tabs",
        };

        const paymentElement = elements.create("payment", paymentElementOptions);
        paymentElement.mount("#payment-element");
    }

    async function handleSubmit(e) {
        e.preventDefault();
        setLoading(true);

        const {
            error
        } = await stripe.confirmPayment({
            elements,
            confirmParams: {
                // Change this to your payment completion page
                return_url: "{{ route('stripe.element.show') }}",
            },
        });

        if (error.type === "card_error" || error.type === "validation_error") {
            showMessage(error.message);
        } else {
            showMessage("An unexpected error occurred.");
        }

        setLoading(false);
    }

    // Fetches the payment intent status after payment submission
    async function checkStatus() {
        const clientSecret = new URLSearchParams(window.location.search).get(
            "payment_intent_client_secret"
        );

        if (!clientSecret) {
            return;
        }

        const {
            paymentIntent
        } = await stripe.retrievePaymentIntent(clientSecret);

        switch (paymentIntent.status) {
            case "succeeded":
                showMessage("Payment succeeded!");
                break;
            case "processing":
                showMessage("Your payment is processing.");
                break;
            case "requires_payment_method":
                showMessage("Your payment was not successful, please try again.");
                break;
            default:
                showMessage("Something went wrong.");
                break;
        }
    }

    // ------- UI helpers -------
    function showMessage(messageText) {
        const messageContainer = document.querySelector("#payment-contaainer");
        const messageDiv = document.querySelector("#payment-message");

        messageContainer.classList.remove("hidden");
        messageDiv.textContent = messageText;

        setTimeout(function() {
            messageContainer.classList.add("hidden");
            messageDiv.textContent = "";
        }, 4000);
    }

    // Show a spinner on payment submission
    function setLoading(isLoading) {
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
    }
</script>