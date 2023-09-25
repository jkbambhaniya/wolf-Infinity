/* Define form element */
const form = document.getElementById('reset_password_form');

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
					remote: {
						async: false,
						method: 'POST',
						url: adminCheckEmailExistUrl,
						data: function () {
							return {
								email: form.querySelector('[name="email"]').value,
								_token: csrfToken,
								type: 'email'
							};
						},
					},
				}
			},
			'password': {
				validators: {
					notEmpty: {
						message: 'The password field is required.'
					},
					stringLength: {
						message: 'The password must contain at least 8 characters',
						min: 8,
					},
					regexp: {
						regexp: /^\S*$/u,
						message: 'The password can’t accept the blank space.',
					},
					// Send { email: 'its value', type: 'email' } to the back-end
					/* remote: {
						async: false,
						method: 'POST',
						url: adminCheckEmailExistUrl,
						data: function () {
							return {
								password: form.querySelector('[name="password"]').value,
								_token: csrfToken,
								type: 'password'
							};
						},
					}, */
				}
			},
			'password_confirmation': {
				validators: {
					notEmpty: {
						message: 'The confirm password field is required.'
					},
					identical: {
						compare: function () {
							return form.querySelector('[name="password"]').value;
						},
						message: 'The password and confirm password should be the same',
					},
				},
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
const submitButton = document.getElementById('reset_password_submit');
submitButton.addEventListener('click', function (e) {
	/* Prevent default button action */
	e.preventDefault();

	/* Validate form before submit */
	if (validator) {
		validator.validate().then(function (status) {
			if (status == 'Valid') {
				form.submit(); /* Submit form */
			}
		});
	}
});