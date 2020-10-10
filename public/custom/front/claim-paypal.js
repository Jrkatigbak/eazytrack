    //PAYPAL SCRIPTS
	paypal.Button.render({
 
		
		env: 'production', // sandbox | production



		// PayPal Client IDs - replace with your own
		// Create a PayPal app: https://developer.paypal.com/developer/applications/create
		client: {
			sandbox:    'AVDIK7vJx9I9_K-NOMFbjUtwnCqH-kTVNnRIwfFfutprUnp0jSVYvtpFA0-qeyqYuonvJwswnhq2aa2s',
			production: 'ASF3tWZKhsTvSjjt_Ip6dW6ctP-ZUSOlkgCm1ORkXtaHyi_m4G20XsboZsI4h9GGgc6lZ0qXM8UUbVdb'
		},
 
		// Show the buyer a 'Pay Now' button in the checkout flow
		commit: true,

		// payment() is called when the button is clicked
		payment: function(data, actions) {
			// Make a call to the REST api to create the payment
			return actions.payment.create({
				payment: {
					transactions: [
						{
							amount: { total: 1, currency: 'GBP' }
						}
					]
				}
			});
		},

		// onAuthorize() is called when the buyer approves the payment
		onAuthorize: function(data, actions) {

			// Make a call to the REST api to execute the payment
			return actions.payment.execute().then(function() {
                checkout();
			});
		}


	}, '#paypal-button');
	//PAYPAL SCRIPTS