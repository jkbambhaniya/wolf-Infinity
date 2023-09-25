/* Define form element */
const form = document.getElementById('password_reset_form');

/* Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/ */
var validator = FormValidation.formValidation(
	form,
	{
		fields: {
			'email': {
				validators: {
					regexp: {
						regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
						message: 'The email must be a valid email address.',
					},
					notEmpty: {
						message: 'The email field is required.'
					},
					// Send { email: 'its value', type: 'email' } to the back-end
					/* remote: {
						async: false,
						method: 'POST',
						url: adminCheckEmailExistUrl,
						data: function () {
							return {
								email: form.querySelector('[name="email"]').value,
								_token: csrfToken,
								type:'email'
							};
						},
					}, */
				}
			},
		},

		plugins: {
			trigger: new FormValidation.plugins.Trigger(),
			submitButton: new FormValidation.plugins.SubmitButton(),
			icon: new FormValidation.plugins.Icon({
				valid: 'fa fa-check',
				invalid: 'fa fa-times',
				validating: 'fa fa-refresh',
			}),
			bootstrap: new FormValidation.plugins.Bootstrap5({
				rowSelector: '.fv-row',
			})
		},
	}
);

/* Submit button handler */
const submitButton = document.getElementById('password_reset_submit');
submitButton.addEventListener('click', function (e) {
	/* Prevent default button action */
	e.preventDefault();

	// Disable button to avoid multiple click 
	submitButton.disabled = true;

	/* Validate form before submit */
	if (validator) {
		validator.validate().then(function (status) {
			if (status == 'Valid') {
				form.submit(); /* Submit form */
			} else {
				// Disable button to avoid multiple click 
				submitButton.disabled = false;
			}
		});
	}
});