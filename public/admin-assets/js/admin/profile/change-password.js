/* Define form element */
const form = document.getElementById('change_password_form');

/* Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/ */
var validator = FormValidation.formValidation(
	form,
	{
		fields: {
			'current_password': {
				validators: {
					regexp: {
						regexp: /^\S*$/u,
						message: 'The current password can’t accept the blank space.',
					},
					notEmpty: {
						message: 'The current password field is required.'
					},
				},
			},
			'new_password': {
				validators: {
					regexp: {
						regexp: /^\S*$/u,
						message: 'The new password can’t accept the blank space.',
					},
					notEmpty: {
						message: 'The new password field is required.'
					},
					callback: {
						message: 'Please enter valid password',
						callback: function (input) {
							if (input.value.length > 0) {
								return validatePassword();
							}
						}
					}
				},
			},
			'new_password_confirmation': {
				validators: {
					regexp: {
						regexp: /^\S*$/u,
						message: 'The new password confirmation can’t accept the blank space.',
					},
					notEmpty: {
						message: 'The new password confirmation field is required.'
					},
					identical: {
						compare: function () {
							return form.querySelector('[name="new_password"]').value;
						},
						message: 'The password and its confirm are not the same'
					}
				}
			},
		},

		plugins: {
			trigger: new FormValidation.plugins.Trigger(),
			submitButton: new FormValidation.plugins.SubmitButton(),
			bootstrap: new FormValidation.plugins.Bootstrap5({
				rowSelector: '.fv-row',
				eleInvalidClass: '',
				eleValidClass: ''
			})
		},
	}
);

/* Submit button handler */
const submitButton = document.getElementById('change_password_submit');
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