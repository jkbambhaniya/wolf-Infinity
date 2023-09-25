/* Define form element */
const form = document.getElementById('site_setting_form');

/* Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/ */
var validator = FormValidation.formValidation(
	form,
	{
		fields: {
			"value[site_address]": {
				validators: {
					notEmpty: {
						message: 'The first name field is required.'
					},
				},
			},
			'value[site_email]': {
				validators: {
					regexp: {
						regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
						message: 'The email must be a valid email address.',
					},
					notEmpty: {
						message: 'This field is required.'
					},
				},
			},
			'value[site_phone]': {
				validators: {
					regexp: {
						regexp: /^\S*$/u,
						message: 'This field can’t accept the blank space.',
					},
					notEmpty: {
						message: 'This field is required.'
					},
				},
			},
			'value[twitter_url]': {
				validators: {
					regexp: {
						regexp: /^\S*$/u,
						message: 'This field can’t accept the blank space.',
					},
					notEmpty: {
						message: 'This field is required.'
					},
				},
			},
			'value[facebook_url]': {
				validators: {
					regexp: {
						regexp: /^\S*$/u,
						message: 'This field can’t accept the blank space.',
					},
					notEmpty: {
						message: 'This field is required.'
					},
				},
			},
			'value[instagram_url]': {
				validators: {
					regexp: {
						regexp: /^\S*$/u,
						message: 'This field can’t accept the blank space.',
					},
					notEmpty: {
						message: 'This field is required.'
					},
				},
			},
			'value[linkdin_url]': {
				validators: {
					regexp: {
						regexp: /^\S*$/u,
						message: 'This field can’t accept the blank space.',
					},
					notEmpty: {
						message: 'This field is required.'
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
const submitButton = document.getElementById('site_setting_submit');
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