/* Define form element */
const form = document.getElementById('user_edit_form');
/* Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/ */
var validator = FormValidation.formValidation(
	form,
	{
		fields: {
			'first_name': {
				validators: {
					regexp: {
						regexp: /^\S*$/u,
						message: 'The first name can’t accept the blank space.',
					},
					notEmpty: {
						message: 'The first name field is required.'
					},
				},
			},
			'last_name': {
				validators: {
					regexp: {
						regexp: /^\S*$/u,
						message: 'The last name can’t accept the blank space.',
					},
					notEmpty: {
						message: 'The last name field is required.'
					},
				},
			},
			'email': {
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
					regexp: {
						regexp: /^\S*$/u,
						message: 'The password can’t accept the blank space.',
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
			'password_confirmation': {
				validators: {
					regexp: {
						regexp: /^\S*$/u,
						message: 'The password confirmation can’t accept the blank space.',
					},
					identical: {
						compare: function () {
							return form.querySelector('[name="password"]').value;
						},
						message: 'The password and its confirm are not the same'
					}
				}
			},
			'phone': {
				validators: {
					notEmpty: {
						message: 'The mobile number field is required.'
					},
				},
			},
			'date_of_birth': {
				validators: {
					notEmpty: {
						message: 'The date of birth field is required.'
					},
				},
			}
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
const submitButton = document.getElementById('user_edit_submit');
submitButton.addEventListener('click', function (e) {
	/* Prevent default button action */
	e.preventDefault();

	/* Validate form before submit */
	phoneValidate = validate();
	if (validator) {
		validator.validate().then(function (status) {
			if (status == 'Valid' && phoneValidate == true) {
				form.submit(); /* Submit form */
			}
		});
	}
});

/* Phone number validation and intltelinput */
var error_array = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
function reset_intltelinput() {
	jQuery("#phone").removeClass("text-danger");
	jQuery("#phone").removeClass("is-invalid");
}

jQuery("#phone").on("blur, change, keyup", function () {
	reset_intltelinput();
	if (jQuery(this).val().trim()) {
		if (intltelinput.isValidNumber()) {
			jQuery("#phone").removeClass("text-danger");
			jQuery("#phone").removeClass("is-invalid");
		} else {
			jQuery("#phone").addClass("text-danger");
			jQuery("#phone").addClass("is-invalid");
			var error = intltelinput.getValidationError();
			(typeof error_array[error] !== "undefined") ? console.log(error_array[error]) : "";
		}
		if (typeof intlTelInputUtils !== "undefined") {
			var selectedCountryData = intltelinput.getSelectedCountryData();
			newPlaceholder = intlTelInputUtils.getExampleNumber(selectedCountryData.iso2, true, intlTelInputUtils.numberFormat.INTERNATIONAL);
			mask = newPlaceholder.replace(/[1-9]/g, "0");
			$("#phone").mask(mask);
			$('#phone_code').val('+' + selectedCountryData.dialCode);
		}
	}
});

//var input = document.querySelector("#phone");
var intltelinput = window.intlTelInput(document.querySelector("#phone"), {
	geoIpLookup: function (callback) {
		fetch("https://ipapi.co/json")
			.then(function (res) { return res.json(); })
			.then(function (data) { callback(data.country_code); })
			.catch(function () { callback("us"); });
	},
	initialCountry: "auto",
	separateDialCode: true,
	autoFormat: true,
	utilsScript: utilsScript
});
intltelinput.setNumber(phoneValue);
$('#phone_code').val('+' + intltelinput.getSelectedCountryData().dialCode);
$('#phone').on('countrychange', function (e) {
	$(this).val('');
});

function validate() {
	var number = intltelinput.getNumber();
	iso = intltelinput.getSelectedCountryData().iso2;

	var exampleNumber = intlTelInputUtils.getExampleNumber(iso, 0, 0);
	if (number == '')
		number = exampleNumber;

	var isValidNumber = intlTelInputUtils.isValidNumber(number, iso);
	return isValidNumber;
}