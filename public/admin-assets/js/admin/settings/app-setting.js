/* Define form element */
const form = document.getElementById('app_update_form');

const checkPassword = function () {
	return {
		validate: function (input) {
			const value = input.value;
			if (value == pass) {
				return {
					valid: true,
				};
			}

			return {
				valid: false,
			};
		},
	};
};

/* Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/ */
var validator = FormValidation.formValidation(
	form,
	{
		fields: {
			'setting[android_customers]': {
				validators: {
					regexp: {
						regexp: /^([0-9.]{1})+$/,
						message: 'The setting password can’t accept the blank space.',
					},
					notEmpty: {
						message: 'This field is required.'
					},
				},
			},
			'setting[android_service_providers]': {
				validators: {
					regexp: {
						regexp: /^([0-9.]{1})+$/,
						message: 'The setting password can’t accept the blank space.',
					},
					notEmpty: {
						message: 'This field is required.'
					},
				},
			},
			'setting[ios_customers]': {
				validators: {
					regexp: {
						regexp: /^([0-9.]{1})+$/,
						message: 'The setting password can’t accept the blank space.',
					},
					notEmpty: {
						message: 'This field is required.'
					},
				},
			},
			'setting[ios_service_providers]': {
				validators: {
					regexp: {
						regexp: /^([0-9.]{1})+$/,
						message: 'The setting password can’t accept the blank space.',
					},
					notEmpty: {
						message: 'This field is required.'
					},
				},
			},
			'setting_password': {
				validators: {
					regexp: {
						regexp: /^\S*$/u,
						message: 'The setting password can’t accept the blank space.',
					},
					notEmpty: {
						message: 'The setting password field is required.'
					},
					// checkPassword is name of new validator
					checkPassword: {
						message: 'The password is incrrect.'
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
).registerValidator('checkPassword', checkPassword);

/* Submit button handler */
const submitButton = document.getElementById('app_update_submit');
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

$('#password_modal').on('hidden.bs.modal', function () {
	$("#setting_password").val('');
	$(this).closest('i[data-field="setting_password"]').removeClass('fa fa-times');
})