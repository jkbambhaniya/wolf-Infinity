/* Define form element */
const form = document.getElementById('sign_in_form');

/* Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/ */
var validator = FormValidation.formValidation(
	form,
	{
		fields: {
			'username': {
				validators: {
					regexp: {
						regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
						message: 'The email must be a valid email address.',
					},
					notEmpty: {
						message: 'The email field is required.'
					},
				}
			},
			'password': {
				validators: {
					notEmpty: {
						message: 'The password field is required.'
					},
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
const submitButton = document.getElementById('login_submit');
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