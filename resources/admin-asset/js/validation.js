function startLoader() {
	$(".loader-overlay").fadeIn("slow");
	$("#overlayer").fadeIn("slow", function () {
		$("body").addClass("overlayScroll");
	});
    // return true;
}
//only text allowed no number no special character
$(".txtOnly").keypress(function (e) {
	var key = e.keyCode;
	if (key == 44) {
		return true;
	}
	if (
		!((key >= 65 && key <= 90) || (key >= 97 && key <= 122)) &&
		key != 8 &&
		key != 32
	) {
		e.preventDefault();
	}
});
//no space
$(".input").on("keydown", function (event) {
	if (event.keyCode == 32) {
		return false;
	}
});
$(".noEnterSubmit").keypress(function (e) {
	if (e.which == 13) return false;
	if (e.which == 13) e.preventDefault();
});

// function ValidateImage(id, error) {
// 	var fuData = $("#" + id);
// 	var FileUploadPath = fuData.val();
// 	var old_imgUrl = $("#" + id + "_imgUrl").val();
// 	var reader = new FileReader();
// 	if (FileUploadPath == "") {
// 		$("#" + error).html("Please upload an image");
// 		$("#" + id + "_preview").attr("src", old_imgUrl);

// 		fuData.focus();
// 		return false;
// 	} else {
// 		if(FileUploadPath == undefined) {
// 			return true;
// 		}
// 		var Extension = FileUploadPath.substring(
// 			FileUploadPath.lastIndexOf(".") + 1
// 		).toLowerCase();
// 		if (Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
// 			if (fuData[0].files[0].size > 2 * 1024 * 1024) {
// 				$("#" + error).html("image size should be less than 2 MB.");
// 				fuData.val("");
// 				$("#" + id + "_preview").attr("src", old_imgUrl);
// 				fuData.focus();
// 				return false;
// 			}
// 			$("#" + error).html("");
// 			reader.onload = function (event) {
// 				$("#" + id + "_preview").attr("src", event.target.result);
// 			};
// 			reader.readAsDataURL(fuData[0].files[0]);
// 			return true;
// 		} else {
// 			$("#" + error).html("Image only allows file types of PNG, JPG, JPEG.");
// 			fuData.val("");
// 			$("#" + id + "_preview").attr("src", old_imgUrl);
// 			fuData.focus();
// 			return false;
// 		}
// 	}
// }

function ValidateImage(id, error, min_height, min_width) {
	var fuData = $("#" + id);
	var FileUploadPath = fuData.val();
	var old_imgUrl = $("#" + id + "_imgUrl").val();
	var reader = new FileReader();

	// Check if min_height and min_width are undefined, and if so, assign them default values
	min_height = typeof min_height !== 'undefined' ? min_height : null;
	min_width = typeof min_width !== 'undefined' ? min_width : null;

	if (FileUploadPath == "") {
		$("#" + error).html("Please upload an image");
		$("#" + id + "_preview").attr("src", old_imgUrl);
		fuData.focus();
		return false;
	} else {
		if (FileUploadPath == undefined) {
			return true;
		}
		var Extension = FileUploadPath.substring(
			FileUploadPath.lastIndexOf(".") + 1
		).toLowerCase();
		if (Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
			if (fuData[0].files[0].size > 2 * 1024 * 1024) {
				$("#" + error).html("Image size should be less than 2 MB.");
				fuData.val("");
				$("#" + id + "_preview").attr("src", old_imgUrl);
				fuData.focus();
				return false;
			}
			if (min_height !== null && min_width !== null) {
				var img = new Image();
				img.src = window.URL.createObjectURL(fuData[0].files[0]);
				img.onload = function () {
					var height = this.height;
					var width = this.width;
					if (height < min_height || width < min_width) {
						$("#" + error).html("Image dimensions should be at least " + min_width + "x" + min_height + " pixels.");
						fuData.val("");
						$("#" + id + "_preview").attr("src", old_imgUrl);
						fuData.focus();
						return false;
					} else {
						$("#" + error).html("");
						reader.onload = function (event) {
							$("#" + id + "_preview").attr("src", event.target.result);
						};
						reader.readAsDataURL(fuData[0].files[0]);
						return true;
					}
				};
			} else {
				$("#" + error).html("");
				reader.onload = function (event) {
					$("#" + id + "_preview").attr("src", event.target.result);
				};
				reader.readAsDataURL(fuData[0].files[0]);
				return true;
			}
		} else {
			$("#" + error).html("Image only allows file types of PNG, JPG, JPEG.");
			fuData.val("");
			$("#" + id + "_preview").attr("src", old_imgUrl);
			fuData.focus();
			return false;
		}
	}
}

function aboutUsValidateImage(id, error, min_height, min_width) {
	var fuData = $("#" + id);
	var FileUploadPath = fuData.val();
	var old_imgUrl = $("#" + id + "_imgUrl").val();
	var reader = new FileReader();

	// Check if min_height and min_width are undefined, and if so, assign them default values
	min_height = typeof min_height !== 'undefined' ? min_height : null;
	min_width = typeof min_width !== 'undefined' ? min_width : null;

	var Extension = FileUploadPath.substring(
		FileUploadPath.lastIndexOf(".") + 1
	).toLowerCase();
	if (Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
		if (fuData[0].files[0].size > 2 * 1024 * 1024) {
			$("#" + error).html("Image size should be less than 2 MB.");
			fuData.val("");
			$("#" + id + "_preview").attr("src", old_imgUrl);
			fuData.focus();
			return false;
		}
		if (min_height !== null && min_width !== null) {
			var img = new Image();
			img.src = window.URL.createObjectURL(fuData[0].files[0]);
			img.onload = function () {
				var height = this.height;
				var width = this.width;
				if (height < min_height || width < min_width) {
					$("#" + error).html("Image dimensions should be at least " + min_width + "x" + min_height + " pixels.");
					fuData.val("");
					$("#" + id + "_preview").attr("src", old_imgUrl);
					fuData.focus();
					return false;
				} else {
					$("#" + error).html("");
					reader.onload = function (event) {
						$("#" + id + "_preview").attr("src", event.target.result);
					};
					reader.readAsDataURL(fuData[0].files[0]);
					return true;
				}
			};
		} else {
			$("#" + error).html("");
			reader.onload = function (event) {
				$("#" + id + "_preview").attr("src", event.target.result);
			};
			reader.readAsDataURL(fuData[0].files[0]);
			return true;
		}
	} else {
		$("#" + error).html("Image only allows file types of PNG, JPG, JPEG.");
		fuData.val("");
		$("#" + id + "_preview").attr("src", old_imgUrl);
		fuData.focus();
		return false;
	}
}

// function ValidateImage_user(id, error, userType) {
// 	var fuData = $("#" + id);
// 	var FileUploadPath = fuData.val();
// 	var old_imgUrl = $("#" + id + "_imgUrl").val();
// 	var reader = new FileReader();
// 	var selectedUserType = $("#" + userType).val();

// 	var isImageCompulsory = selectedUserType === "speaker" || selectedUserType === "chief_guest" || selectedUserType === "vip_guest";

// 	if (!isImageCompulsory) {
// 		return true;
// 	}

// 	if (FileUploadPath == "") {
// 		$("#" + error).html("Please upload an image");
// 		$("#" + id + "_preview").attr("src", old_imgUrl);

// 		fuData.focus();
// 		return false;
// 	} else {
// 		if (FileUploadPath == undefined) {
// 			return true;
// 		}
// 		var Extension = FileUploadPath.substring(
// 			FileUploadPath.lastIndexOf(".") + 1
// 		).toLowerCase();
// 		if (Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
// 			if (fuData[0].files[0].size > 2 * 1024 * 1024) {
// 				$("#" + error).html("image size should be less than 2 MB.");
// 				fuData.val("");
// 				$("#" + id + "_preview").attr("src", old_imgUrl);
// 				fuData.focus();
// 				return false;
// 			}
// 			$("#" + error).html("");
// 			reader.onload = function(event) {
// 				$("#" + id + "_preview").attr("src", event.target.result);
// 			};
// 			reader.readAsDataURL(fuData[0].files[0]);
// 			return true;
// 		} else {
// 			$("#" + error).html("Image only allows file types of PNG, JPG, JPEG.");
// 			fuData.val("");
// 			$("#" + id + "_preview").attr("src", old_imgUrl);
// 			fuData.focus();
// 			return false;
// 		}
// 	}
// }

function ValidateImage_user(id, error, userType) {
	var fuData = $("#" + id);
	var FileUploadPath = fuData.val();
	var old_imgUrl = $("#" + id + "_imgUrl").val();
	var reader = new FileReader();

	// Get the selected user type directly from the function argument
	var selectedUserType = userType;

	var isImageCompulsory = selectedUserType === "Speaker" || selectedUserType === "chief_guest" || selectedUserType === "vip_guest";

	if (!isImageCompulsory) {
		$("#" + error).html("");
		return true;
	}

	if (FileUploadPath == "") {
		$("#" + error).html("Image is compulsory while user type is Speaker or VIP Guest or Chief Guest.");
		$("#" + id + "_preview").attr("src", old_imgUrl);

		fuData.focus();
		return false;
	} else {
		if (FileUploadPath == undefined) {
			return true;
		}
		var Extension = FileUploadPath.substring(
			FileUploadPath.lastIndexOf(".") + 1
		).toLowerCase();
		if (Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
			if (fuData[0].files[0].size > 2 * 1024 * 1024) {
				$("#" + error).html("Image size should be less than 2 MB.");
				fuData.val("");
				$("#" + id + "_preview").attr("src", old_imgUrl);
				fuData.focus();
				return false;
			}
			$("#" + error).html("");
			reader.onload = function (event) {
				$("#" + id + "_preview").attr("src", event.target.result);
			};
			reader.readAsDataURL(fuData[0].files[0]);
			return true;
		} else {
			$("#" + error).html("Image only allows file types of PNG, JPG, JPEG.");
			fuData.val("");
			$("#" + id + "_preview").attr("src", old_imgUrl);
			fuData.focus();
			return false;
		}
	}
}


function validateMedia(id, error) {
	var fuData = $("#" + id);
	var FileUploadPath = fuData.val();
	var old_mediaUrl = $("#" + id + "_mediaUrl").val();
	var reader = new FileReader();

	if (FileUploadPath == "") {
		$("#" + error).html("Please upload a media");
		$("#" + id + "_preview").attr("src", old_mediaUrl);
		fuData.focus();
		return false;
	} else {
		if (FileUploadPath == undefined) {
			return true;
		}

		var Extension = FileUploadPath
			.substring(FileUploadPath.lastIndexOf(".") + 1)
			.toLowerCase();

		var allowedImageExtensions = ["png", "jpeg", "jpg"];
		var allowedVideoExtensions = ["mp4", "mov", "ogg", "qt"];

		if (
			allowedImageExtensions.includes(Extension) ||
			allowedVideoExtensions.includes(Extension)
		) {
			var maxSize = allowedImageExtensions.includes(Extension)
				? 2 * 1024 * 1024 // 2 MB for images
				: 20 * 1024 * 1024; // 20 MB for videos

			if (fuData[0].files[0].size > maxSize) {
				$("#" + error).html(
					allowedImageExtensions.includes(Extension)
						? "Image size should be less than 2 MB."
						: "Video size should be less than 20 MB."
				);
				fuData.val("");
				$("#" + id + "_preview").attr("src", old_mediaUrl);
				fuData.focus();
				return false;
			}

			$("#" + error).html("");
			reader.onload = function (event) {
				$("#" + id + "_preview").attr("src", event.target.result);
			};
			reader.readAsDataURL(fuData[0].files[0]);
			return true;
		} else {
			$("#" + error).html(
				"Media file types allowed are: " +
				allowedImageExtensions.concat(allowedVideoExtensions).join(", ")
			);
			fuData.val("");
			$("#" + id + "_preview").attr("src", old_mediaUrl);
			fuData.focus();
			return false;
		}
	}
}


$("#loginForm").submit(function () {
	if (emailValidate() && passwordValidate()) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#forgetFormAdmin").submit(function () {
	if (emailPhoneValidate()) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#resetPassword").submit(function () {
	if (passwordValidate() && ConfirmpasswordValidate()) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#adminResetPassword").submit(function () {
	if (passwordValidate() && ConfirmpasswordValidate()) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

// $("#add_user_validation").submit(function () {
// 	var hiddenId = $("#hiddenId");
// 	let validation = true;
// 	if (hiddenId.val().trim() == "") {
// 		validation = ValidateImage_user("image", "errorImage","user_type");
// 	}
// 	var fileInput = document.getElementById("image");
// 	if (fileInput.files.length > 0) {
// 		validation = ValidateImage_user("image", "errorImage","user_type");
// 	}
// 	var allValidations = [
// 		// ValidateImage_user(),
// 		industrySectorValidate(),
// 		mobileValidate(),
// 		userEmailValidateUnique(),
// 		lastNameValidate(),
// 		firstNameValidate(),
// 		validateUserType(),
//         validation
// 	];
// 	if (
// 		allValidations.every(function (isValid) {
// 			return isValid;
// 		})
// 		) {
// 		startLoader();
// 		return true;
// 	} else {
// 		return false;
// 	}
// });

$("#add_user_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	var selectedUserType = $("#user_type").val();
	let validation = true;
	if (hiddenId.val().trim() == "") {
		validation = ValidateImage_user("image", "errorImage", selectedUserType);
	}

	var fileInput = document.getElementById("image");
	if (fileInput.files.length > 0) {
		validation = ValidateImage_user("image", "errorImage", selectedUserType);
	}

	var allValidations = [
		facebookLinkValidate(),
		twitterLinkValidate(),
		instagramLinkValidate(),
		linkedinLinkValidate(),
		industrySectorValidate(),
		mobileValidate(),
		userEmailValidateUnique(),
		lastNameValidate(),
		firstNameValidate(),
		validateUserType(),
		validation
	];

	if (allValidations.every(function (isValid) {
		return isValid;
	})) {
		startLoader();
		return true;
	} else {
		return false;
	}
});


function socialShareDescriptionValidate() {
    var description = $("#socialShareDescription");
    var descriptionValue = description.val().trim();

    if (descriptionValue === "") {
        var descriptionReqdMsg = translations.description_required;
        $("#errorSocialShareDescription").html(descriptionReqdMsg);
        description.focus();
        return false;
    } else if (descriptionValue.length < 2) {
        var descriptionMin = translations.description_min_length;
        $("#errorSocialShareDescription").html(descriptionMin);
        description.focus();
        return false;
    }  else {
        $("#errorSocialShareDescription").html("");
        return true;
    }
}

function socialShareTitleValidate() {
    var description = $("#socialShareTitle");
    var descriptionValue = description.val().trim();

    if (descriptionValue === "") {
        var descriptionReqdMsg = translations.share_title_required;
        $("#errorSocialShareTitle").html(descriptionReqdMsg);
        description.focus();
        return false;
    } else if (descriptionValue.length < 2) {
        var descriptionMin = translations.social_title_min_length;
        $("#errorSocialShareTitle").html(descriptionMin);
        description.focus();
        return false;
    }  else {
        $("#errorSocialShareTitle").html("");
        return true;
    }
}


$("#add_exhibitor_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	let validation = true;
	if (hiddenId.val().trim() == "") {
		validation = ValidateImage("image", "errorExhibitorImage");
	}
	var fileInput = document.getElementById("image");
	if (fileInput.files.length > 0) {
		validation = ValidateImage("image", "errorExhibitorImage");
	}
	var allValidations = [
		jobTitleValidate(),
		companyWebsiteValidate(),
		companyAddressValidate(),
		companyNameValidate(),
		passwordValidate(),
		mobileValidate(),
		emailValidate(),
		lastNameValidate(),
		firstNameValidate(),
		eventValidate(),
		validation
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_plans_validation").submit(function (event) {
	var allValidations = [
		amount_validate(),
		intervalCount_validate(),
		interval_validate()
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_menus_validation").submit(function (event) {
	var allValidations = [
		titleValidate(),
		indexValidate(),
		locationValidate()
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_blogs_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	let validationThumb = true;
	let validationMain = true;
	// var isNewRecord = $('#hiddenId').val() ? false : true;
	if (hiddenId.val().trim() == "") {
		validationThumb = ValidateImage("thumbnail", "errorThumbnailImage");
	}
	var fileInput = document.getElementById("thumbnail");
	if (fileInput.files.length > 0) {
		validationThumb = ValidateImage("thumbnail", "errorThumbnailImage");
	}
	if (hiddenId.val().trim() == "") {
		validationMain = ValidateImage("main_image", "errorMainImage");
	}
	var fileInput = document.getElementById("main_image");
	if (fileInput.files.length > 0) {
		validationMain = ValidateImage("main_image", "errorMainImage");
	}
	var allValidations = [
		longDescriptionValidate(),
		shortDescriptionValidate(),
		titleValidate(),
		validationMain,
		validationThumb
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

// $("#add_contactus_validation").submit(function () {
// 	var allValidations = [
// 		socialLinksValidate(),
// 		mobileValidate(),
// 		emailValidate(),
// 		addressValidate(),
// 		headingValidate(),
// 		eventValidate(),
// 	];
// 	if (
// 		allValidations.every(function (isValid) {
// 			return isValid;
// 		})
// 	) {
// 		startLoader();
// 		return true;
// 	} else {
// 		return false;
// 	}
// });

$("#add_contactus_validation").submit(function (event) {
	// Prevent the default form submission behavior
	event.preventDefault();

	// Perform all validations
	var allValidations = [

		facebookLinkValidate(),
		twitterLinkValidate(),
		instagramLinkValidate(),
		linkedinLinkValidate(),
		mobileValidate(),
		emailValidate(),
		addressValidate(),
		headingValidate(),
		eventValidate(),
	];

	// Check if all validations pass
	var isValid = allValidations.every(function (validation) {
		return validation;
	});

	// If all validations pass, proceed with form submission
	if (isValid) {
		startLoader();
		this.submit(); // Submit the form
	} else {
		// If any validation fails, do not submit the form
		return false;
	}
});


$("#add_inquiry_validation").submit(function () {
	var allValidations = [
		priceValidate(),
		endTimeValidate(),
		startTimeValidate(),
		inquiryemailValidate(),
		nameValidate()
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_aboutus_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	let validationMainAboutUs = true;
	if (hiddenId.val().trim() == "") {
		validationMainAboutUs = ValidateImage("image", "errorImage");
	}
	var fileInput = document.getElementById("image");
	if (fileInput.files.length > 0) {
		validationMainAboutUs = ValidateImage("image", "errorImage");
	}
	var allValidations = [
		aboutDescription_3Validate(),
		aboutTitle3Validate(),
		aboutDescription_2Validate(),
		aboutTitle2Validate(),
		slotLinkValidate(),
		aboutDescriptionValidate(),
		aboutTitleValidate(),
		validationMainAboutUs
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_organizer_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	let validationMainAboutUs = true;
	if (hiddenId.val().trim() == "") {
		validationMainAboutUs = ValidateImage("image", "errorImage");
	}
	var fileInput = document.getElementById("image");
	if (fileInput.files.length > 0) {
		validationMainAboutUs = ValidateImage("image", "errorImage");
	}
	var allValidations = [


		aboutDescription_2Validate(),
        visionDescriptionValidate(),
        missionDescriptionValidate(),
        objectiveDescriptionValidate(),


		aboutDescriptionValidate(),

		validationMainAboutUs
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_founder_validation").submit(function () {
    console.log("entered");
	var hiddenId = $("#hiddenId");

	let validationImage = true;
	let validationImage2 = true;
	// var isNewRecord = $('#hiddenId').val() ? false : true;
	if (hiddenId.val().trim() == "") {
		validationImage = ValidateImage("image", "errorImage");
	}
	var fileInput = document.getElementById("image");
	if (fileInput.files.length > 0) {
		validationImage = ValidateImage("image", "errorImage");
	}
    if (hiddenId.val().trim() == "") {
		validationImage2 = ValidateImage("image_2", "errorImage2");
	}
	var fileInput = document.getElementById("image_2");
	if (fileInput.files.length > 0) {
		validationImage2 = ValidateImage("image_2", "errorImage2");
	}
	var allValidations = [
        validationImage2,
        aboutDescription_2Validate_founder(),
		validationImage,
		aboutDescriptionValidate()
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});



$("#add_whyafrica_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	let validationMainAf = true;
	// var isNewRecord = $('#hiddenId').val() ? false : true;
	if (hiddenId.val().trim() == "") {
		validationMainAf = ValidateImage("image", "errorImage");
	}
	var fileInput = document.getElementById("image");
	if (fileInput.files.length > 0) {
		validationMainAf = ValidateImage("image", "errorImage");
	}
	var allValidations = [
		buttonTitleValidate(),
		buttonLinkValidate(),
		contentValidate(),
		titleValidate(),
		validationMainAf
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_stall_booking_plans_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	let validation = true;
	let floorPlanValidation = true;
	// // stall_dimension_image validation
	// if (hiddenId.val().trim() == "") {
	// 	validation = ValidateImage("stall_dimension_image", "errorStallBookingImage");
	// }
	// var fileInput = document.getElementById("stall_dimension_image");
	// if (fileInput.files.length > 0) {
	// 	validation = ValidateImage("stall_dimension_image", "errorStallBookingImage");
	// }
	// // floor_plan_image validation
	// if (hiddenId.val().trim() == "") {
	// 	floorPlanValidation = ValidateImage("floor_plan_image", "errorFloorPlanImage");
	// }
	// var fileInput = document.getElementById("floor_plan_image");
	// if (fileInput.files.length > 0) {
	// 	floorPlanValidation = ValidateImage("floor_plan_image", "errorFloorPlanImage");
	// }
	var allValidations = [
		amount_validate(),
		descriptionValidate(),
		nameValidate(),
		eventValidate(),
		floorPlanValidation,
		validation
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_tickets_validation").submit(function () {
	var allValidations = [
		eventValidate(),
		ticketTypeValidate(),
		ticketNameValidate(),
		ticket_amount_validate(),
		validateDaysCheckbox(),
		whyIfkaValidate(),
		whyIfkaDescriptionValidate()
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_sector_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	let validation = true;
	if (hiddenId.val().trim() == "") {
		validation = ValidateImage("image", "errorSectorImage");
	}
	var fileInput = document.getElementById("image");
	if (fileInput.files.length > 0) {
		validation = ValidateImage("image", "errorSectorImage");
	}
	var allValidations = [
		sort_order_validate(),
		ImageTitleValidate(),
		eventValidate(),
		validation
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_whyifka_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	let mainImgValidation = true;
	let imageValidation = true;
	// var isNewRecord = $('#hiddenId').val() ? false : true;
	// main_image validation
	if (hiddenId.val().trim() == "") {
		mainImgValidation = ValidateImage("main_image", "errorMainImage");
	}
	var fileInput = document.getElementById("main_image");
	if (fileInput.files.length > 0) {
		mainImgValidation = ValidateImage("main_image", "errorMainImage");
	}
	// image validation
	if (hiddenId.val().trim() == "") {
		imageValidation = ValidateImage("image", "errorImage");
	}
	var fileInput = document.getElementById("image");
	if (fileInput.files.length > 0) {
		imageValidation = ValidateImage("image", "errorImage");
	}
	var allValidations = [
		contentValidate(),
		titleValidate(),
		mainTitleValidate(),
		whyIfkaValidate(),
		whyIfkaDescriptionValidate(),
		imageValidation,
		mainImgValidation
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_whykenya_validation").submit(function () {
	var allValidations = [
		whyKenyaDescriptionValidate(),
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_whyvisit_validation").submit(function () {
	// e.preventDefault();
	var allValidations = [
		whyVisitMainTitleValidate(),
		whyVisitMainDescriptionValidate(),
		whyVisitLeftTitleValidate(),
		whyVisitRightTitleValidate(),
		whyVisitRightDescriptionValidate(),
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

function inquiryemailValidate() {
	var email = $("#email");
	var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

	if (email.val() == "") {
		var emailRequiredMessage = translations.email_required;
		$("#errorEmail").html(emailRequiredMessage);
		email.focus();
		return false;
	} else if (!emailPattern.test(email.val())) {
		var emailInvalidMessage = translations.email_invalid;
		$("#errorEmail").html(emailInvalidMessage);
		email.focus();
		return false;
	} else {
		$("#errorEmail").html("");
		return true;
	}
}

function startTimeValidate() {
	var startTime = $("#startTime");

	if (startTime.val() == "") {
		var startTimeRequiredMessage = translations.start_time_required;
		$("#errorStartTime").html(startTimeRequiredMessage);
		startTime.focus();
		return false;
	} else {
		$("#errorStartTime").html("");
		return true;
	}
}

function endTimeValidate() {
	var startTime = $("#startTime");
	var endTime = $("#endTime");
	console.log('<<<>>>', startTime.val());
	console.log('<<<end>>>', endTime.val());

	if (endTime.val() == "") {
		var endTimeRequiredMessage = translations.end_time_required;
		$("#errorEndTime").html(endTimeRequiredMessage);
		endTime.focus();
		return false;
	} else if (endTime.val() <= startTime.val()) {
		console.log('<<<hello>>>');
		var endTimeInvalidMessage = translations.end_time_invalid;
		$("#errorEndTime").html(endTimeInvalidMessage);
		console.log('end me', endTimeInvalidMessage);
		endTime.focus();
		return false;
	} else {
		$("#errorEndTime").html("");
		return true;
	}
}

// function priceValidate() {
// 	var priceInput = document.getElementById('price');
// 	var price = priceInput.value.trim();

// 	if (price === "") {
// 		var priceRequiredMessage = "Price is required.";
// 		// Display the error message
// 		$("#errorPrice").html(priceRequiredMessage);
// 		priceInput.focus();
// 		return false;
// 	} else if (isNaN(price) || parseFloat(price) <= 0) {
// 		var priceInvalidMessage = "Please enter a valid price greater than zero.";
// 		// Display the error message
// 		$("#errorPrice").html(priceInvalidMessage);
// 		priceInput.focus();
// 		return false;
// 	} else {
// 		// Clear the error message
// 		$("#errorPrice").html("");
// 		return true;
// 	}
// }

function priceKeyPress(event) {
	// Get the value of the key pressed
	var keyPressed = event.key;

	// Check if the key pressed is a digit or a decimal point
	if (!/[\d.]/.test(keyPressed)) {
		// Prevent the default action if the key pressed is not a digit or a decimal point
		event.preventDefault();
	}
}

function priceValidate() {
	var priceInput = document.getElementById('price');
	var price = priceInput.value.trim();

	if (price === "") {
		var priceRequiredMessage = "Price is required.";
		// Display the error message
		$("#errorPrice").html(priceRequiredMessage);
		priceInput.focus();
		return false;
	} else if (parseFloat(price) <= 0) {
		var priceInvalidMessage = "Please enter a price greater than zero.";
		// Display the error message
		$("#errorPrice").html(priceInvalidMessage);
		priceInput.focus();
		return false;
	} else {
		// Clear the error message
		$("#errorPrice").html("");
		return true;
	}
}

$(document).ready(function () {
	// Attach keypress event listener to the price input field
	$('#price').keypress(priceKeyPress);
});


function shortDescriptionValidate() {
	var editor = CKEDITOR.instances['ShortDescription'];
	var shortDescriptionContent = editor.getData().replace(/<[^>]*>/g, '').trim();
	if (shortDescriptionContent === "") {
		var shortDescriptionRequiredMessage = translations.short_description_required;
		$("#errorShortDescription").html(shortDescriptionRequiredMessage);
		editor.focus();
		return false;
	} else if (shortDescriptionContent.length < 20) {
		var shortDescriptionMin = translations.short_description_min_length;
		$("#errorShortDescription").html(shortDescriptionMin);
		editor.focus();
		return false;
	} else if (shortDescriptionContent.length > 500) {
		var shortDescriptionMax = translations.short_description_max_length;
		$("#errorShortDescription").html(shortDescriptionMax);
		editor.focus();
		return false;
	} else {
		$("#errorShortDescription").html("");
		return true;
	}
}

function longDescriptionValidate() {
	var editor = CKEDITOR.instances['LongDescription'];
	var longDescriptionContent = editor.getData().replace(/<[^>]*>/g, '').trim();
	if (longDescriptionContent === "") {
		var longDescriptionRequiredMessage = translations.long_description_required;
		$("#errorLongDescription").html(longDescriptionRequiredMessage);
		editor.focus();
		return false;
	} else if (longDescriptionContent.length < 255) {
		var longDescriptionMin = translations.long_description_min_length;
		$("#errorLongDescription").html(longDescriptionMin);
		editor.focus();
		return false;
	} else if (longDescriptionContent.length > 10000) {
		var longDescriptionMax = translations.long_description_max_length;
		$("#errorLongDescription").html(longDescriptionMax);
		editor.focus();
		return false;
	} else {
		$("#errorLongDescription").html("");
		return true;
	}
}


function aboutDescriptionValidate() {
	var editor = CKEDITOR.instances['description'];
	var descriptionContent = editor.getData().replace(/<[^>]*>/g, '').trim();
	if (descriptionContent === "") {
		var descriptionRequiredMessage = translations.description_required;
		$("#errorDescription").html(descriptionRequiredMessage);
		editor.focus();
		return false;
	// } else if (descriptionContent.length > 999) {
	// 	var descriptionMin = translations.description_max_length;
	// 	$("#errorDescription").html(descriptionMin);
	// 	editor.focus();
	// 	return false;
	} else {
		$("#errorDescription").html("");
		return true;
	}
}

function visionDescriptionValidate() {
	var editor = CKEDITOR.instances['vision_description'];
	var descriptionContent = editor.getData().replace(/<[^>]*>/g, '').trim();
	if (descriptionContent === "") {
		var descriptionRequiredMessage = translations.description_required;
		$("#errorVisionDescription").html(descriptionRequiredMessage);
		editor.focus();
		return false;
	// } else if (descriptionContent.length > 999) {
	// 	var descriptionMin = translations.description_max_length;
	// 	$("#errorVisionDescription").html(descriptionMin);
	// 	editor.focus();
	// 	return false;
	} else {
		$("#errorVisionDescription").html("");
		return true;
	}
}

function missionDescriptionValidate() {
	var editor = CKEDITOR.instances['mission_description'];
	var descriptionContent = editor.getData().replace(/<[^>]*>/g, '').trim();
	if (descriptionContent === "") {
		var descriptionRequiredMessage = translations.description_required;
		$("#errorMissionDescription").html(descriptionRequiredMessage);
		editor.focus();
		return false;
	// } else if (descriptionContent.length > 999) {
	// 	var descriptionMin = translations.description_max_length;
	// 	$("#errorMissionDescription").html(descriptionMin);
	// 	editor.focus();
	// 	return false;
	} else {
		$("#errorMissionDescription").html("");
		return true;
	}
}

function objectiveDescriptionValidate() {
	var editor = CKEDITOR.instances['objective_description'];
	var descriptionContent = editor.getData().replace(/<[^>]*>/g, '').trim();
	if (descriptionContent === "") {
		var descriptionRequiredMessage = translations.description_required;
		$("#errorObjectiveDescription").html(descriptionRequiredMessage);
		editor.focus();
		return false;
	// } else if (descriptionContent.length > 999) {
	// 	var descriptionMin = translations.description_max_length;
	// 	$("#errorObjectiveDescription").html(descriptionMin);
	// 	editor.focus();
	// 	return false;
	} else {
		$("#errorObjectiveDescription").html("");
		return true;
	}
}

function aboutDescription_2Validate() {
	var editor = CKEDITOR.instances['description_2'];
	var description_2Content = editor.getData().replace(/<[^>]*>/g, '').trim();
	if (description_2Content === "") {
		$("#errorDescription_2").html("");
		return true;
	// } else if (description_2Content.length > 999) {
	// 	var description_2Min = translations.description_2_max_length;
	// 	$("#errorDescription_2").html(description_2Min);
	// 	editor.focus();
	// 	return false;
	} else {
		$("#errorDescription_2").html("");
		return true;
	}
}

function aboutDescription_2Validate_founder() {
	var editor = CKEDITOR.instances['description_2'];
	var description_2Content = editor.getData().replace(/<[^>]*>/g, '').trim();
	if (description_2Content === "") {
        var description_2Req = translations.description_2_req_founder;
		$("#errorDescription_2").html(description_2Req);
		editor.focus();
		// $("#errorDescription_2").html("");
		return true;
	} else if (description_2Content.length > 999) {
		var description_2Min = translations.description_2_max_length;
		$("#errorDescription_2").html(description_2Min);
		editor.focus();
		return false;
	} else {
		$("#errorDescription_2").html("");
		return true;
	}
}

function aboutDescription_3Validate() {
	var editor = CKEDITOR.instances['description_3'];
	var description_3Content = editor.getData().replace(/<[^>]*>/g, '').trim();
	if (description_3Content === "") {
		$("#errorDescription_3").html("");
		return true;
	} else if (description_3Content.length > 999) {
		var description_3Min = translations.description_3_max_length;
		$("#errorDescription_3").html(description_3Min);
		editor.focus();
		return false;
	} else {
		$("#errorDescription_3").html("");
		return true;
	}
}

function contentValidate() {
	var editor = CKEDITOR.instances['content'];
	var descriptionContent = editor.getData().replace(/<[^>]*>/g, '').trim();
	if (descriptionContent === "") {
		var descriptionRequiredMessage = translations.content_required;
		$("#errorContent").html(descriptionRequiredMessage);
		editor.focus();
		return false;
	}
	// else if (descriptionContent.length < 255) {
	// 	var descriptionMin = translations.content_min_length;
	// 	$("#errorContent").html(descriptionMin);
	// 	editor.focus();
	// 	return false;
	// }
	else if (descriptionContent.length > 100000) {
		var descriptionMax = translations.content_max_length;
		$("#errorContent").html(descriptionMax);
		editor.focus();
		return false;
	} else {
		$("#errorContent").html("");
		return true;
	}
}

function advertiseWithUsContent_1Validate() {
	var editor = CKEDITOR.instances['content_1'];
	var descriptionContent = editor.getData().replace(/<[^>]*>/g, '').trim();
	if (descriptionContent === "") {
		var descriptionRequiredMessage = translations.content_1_required;
		$("#errorContent_1").html(descriptionRequiredMessage);
		editor.focus();
		return false;
	} else {
		$("#errorContent_1").html("");
		return true;
	}
}

function slotLinkValidate() {
	var slotLink = $("#slot_link");

	if (slotLink.val() == "") {
		slotLink.val("");
		var slotLinkRequiredMessage = translations.slot_link_required;
		$("#errorSlotLink").html(slotLinkRequiredMessage);
		return false;
	} else if (!validateLink(slotLink.val())) {
		// Call the validateLink function
		var invalidLinkMessage = translations.slot_link_invalid;
		$("#errorSlotLink").html(invalidLinkMessage);
		return false;
	} else {
		$("#errorSlotLink").html("");
		return true;
	}
}

function validateLink(link) {
	// Regular expression for basic URL validation
	var urlPattern = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i;

	// Test the link against the pattern
	return urlPattern.test(link);
}

function buttonLinkValidate() {
	var slotLink = $("#button_link");

	if (slotLink.val() == "") {
		slotLink.val("");
		var slotLinkRequiredMessage = translations.button_link_required;
		$("#errorButtonLink").html(slotLinkRequiredMessage);
		return false;
	} else {
		$("#errorButtonLink").html("");
		return true;
	}
}

// function ticketNameValidate() { old
// 	var ticketName = $("#ticketName");
// 	var errorTicketName = $("#errorTicketName");
// 	var ticketNameRequiredMessage = translations.ticket_name_required;
// 	var ticketNameMin = translations.ticket_name_min;
// 	var ticketNameMax = translations.ticket_name_max;

// 	if (ticketName.val() === "") {
// 		errorTicketName.html(ticketNameRequiredMessage);
// 		ticketName.focus();
// 		return false;
// 	} else if (ticketName.val().length < 5) {
// 		errorTicketName.html(ticketNameMin);
// 		ticketName.focus();
// 		return false;
// 	} else if (ticketName.val().length > 99) {
// 		errorTicketName.html(ticketNameMax);
// 		ticketName.focus();
// 		return false;
// 	} else {
// 		errorTicketName.html("");
// 		return true;
// 	}
// }

function ticketNameValidate() {
	var ticketName = $("#ticketName");
	var errorTicketName = $("#errorTicketName");
	var ticketNameRequiredMessage = translations.ticket_name_required;
	var ticketNameMin = translations.ticket_name_min;
	var ticketNameMax = translations.ticket_name_max;

	var regex = /^(?=.*[a-zA-Z0-9])[a-zA-Z0-9_!@#$%^&*()\-+=? ]+[a-zA-Z0-9_!@#$%^&*()\-+=? ][a-zA-Z0-9_!@#$%^&*()\-+=? ]*$/;
	var ticketNameValue = ticketName.val().trim();

	if (ticketNameValue === "") {
		errorTicketName.html(ticketNameRequiredMessage);
		ticketName.focus();
		return false;
	} else if (!regex.test(ticketNameValue)) {
		errorTicketName.html(ticketNameMin);
		ticketName.focus();
		return false;
	} else if (ticketNameValue.length > 99) {
		errorTicketName.html(ticketNameMax);
		ticketName.focus();
		return false;
	} else {
		errorTicketName.html("");
		return true;
	}
}




function validateDaysCheckbox() {
	$("#errorDays").html('');
	var checkboxes = document.querySelectorAll('input[name="days[]"]');
	var isChecked = Array.from(checkboxes).some(function (checkbox) {
		return checkbox.checked;
	});

	if (!isChecked) {
		$("#errorDays").html('At least one day must be selected.');
		return false;
	}

	return true;
}

function amount_validate() {
	var amount = $("#amount");
	var numericRegex = /^\d+(\.\d+)?$/;
	if (amount.val() == "") {
		var amountRequiredMessage = translations.amount_required;
		$("#errorAmount").html(amountRequiredMessage);
		amount.focus();
		return false;
	} else if (!numericRegex.test(amount.val())) {
		var amountValid = translations.amount_valid;
		$("#errorAmount").html(amountValid);
		amount.focus();
		return false;
	} else if (parseInt(amount.val()) === 0) {
		var amountZeroMsg = translations.amount_zero;
		$("#errorAmount").html(amountZeroMsg);
		amount.focus();
		return false;
	} else if (parseInt(amount.val()) < 0) {
		var amountZeroGre = translations.amount_zero_greater;
		$("#errorAmount").html(amountZeroGre);
		amount.focus();
		return false;
	} else if (parseInt(amount.val()) > 10000000 - 1) {
		var amountMaxMSg = translations.amount_maximium;
		$("#errorAmount").html(amountMaxMSg);
		amount.focus();
		return false;
	} else {
		$("#errorAmount").html("");
		return true;
	}
}

function ticket_amount_validate() {
	var amount = $("#amount");
	var ticketType = $("#ticketType").val(); // Get the selected ticket type
	var numericRegex = /^\d+(\.\d+)?$/;

	if (ticketType === 'paid') { // Check if the selected ticket type is "Paid"
		if (amount.val() == "") {
			var amountRequiredMessage = translations.amount_required;
			$("#errorAmount").html(amountRequiredMessage);
			amount.focus();
			return false;
		} else if (!numericRegex.test(amount.val())) {
			var amountValid = translations.amount_valid;
			$("#errorAmount").html(amountValid);
			amount.focus();
			return false;
		} else if (parseInt(amount.val()) === 0) {
			var amountZeroGre = translations.amount_min_length;
			$("#errorAmount").html(amountZeroGre);
			amount.focus();
			return false;
		} else if (parseInt(amount.val()) > 1000000) {
			var amountMaxMSg = translations.amount_max_length;
			$("#errorAmount").html(amountMaxMSg);
			amount.focus();
			return false;
		} else {
			$("#errorAmount").html("");
			return true;
		}
	} else { // If ticket type is not "Paid", no validation is needed for the amount field
		$("#errorAmount").html("");
		return true;
	}
}


function interval_validate() {
	var interval = $("#interval");
	if (interval.val() === "") {
		var intervalRequiredMessage = translations.interval_required;
		$("#errorInterval").html(intervalRequiredMessage);
		return false;
	} else {
		$("#errorInterval").html("");
		return true;
	}
}
function intervalCount_validate() {
	var intervalCount = $("#interval_count");
	var numericRegex = /^\d+$/;

	// Get the selected interval
	var selectedInterval = $("#interval").val();

	// Check for required validation only when the interval is "month"
	if (selectedInterval === "month" && (intervalCount.val() === "" || !numericRegex.test(intervalCount.val()))) {
		intervalCount.val("");
		var intervalCountRequiredMessage = translations.interval_count_required;
		$("#errorIntervalCount").html(intervalCountRequiredMessage);
		return false;
	}

	var countValue = parseInt(intervalCount.val());

	// Update validation based on the selected interval
	if (countValue < 1 || countValue > 12) {
		intervalCount.focus();
		var intervalCountMin = translations.interval_count_min;
		var intervalCountMax = translations.interval_count_max;
		$("#errorIntervalCount").html(countValue < 1 ? intervalCountMin : intervalCountMax);
		return false;
	} else {
		$("#errorIntervalCount").html("");
		return true;
	}
}

// function titleValidate() {
// 	var title = $("#title");
// 	var regex = /^[a-zA-Z0-9_& ]*$/;
// 	var titleValue = title.val();
// 	if (titleValue.trim() == "") {
// 		var titleRequiredMessage = translations.title_required;
// 		$("#errorTitle").html(titleRequiredMessage);
// 		title.focus();
// 		return false;
// 	} else if (titleValue.length < 2) {
// 		var titleMin = translations.title_min;
// 		$("#errorTitle").html(titleMin);
// 		title.focus();
// 		return false;
// 	} else if (titleValue.length > 99) {
// 		var titleMax = translations.title_max;
// 		$("#errorTitle").html(titleMax);
// 		title.focus();
// 		return false;
// 	} else if (!regex.test(titleValue)) {
// 		var titleValidMessage = translations.title_invalid;
// 		$("#errorTitle").html(titleValidMessage);
// 		title.focus();
// 		return false;
// 	} else {
// 		$("#errorTitle").html("");
// 		return true;
// 	}
// }

// function titleValidate() {
// 	var title = $("#title");
// 	var regex = /^(?=.*[a-zA-Z0-9])[a-zA-Z0-9_& ]*[a-zA-Z0-9_& ]*$/;
// 	var titleValue = title.val().trim();

// 	if (titleValue === "") {
// 		var titleRequiredMessage = translations.title_required;
// 		$("#errorTitle").html(titleRequiredMessage);
// 		title.focus();
// 		return false;
// 	} else if (titleValue.replace(/\s/g, "").length < 2) {
// 		var titleMin = translations.title_min;
// 		$("#errorTitle").html(titleMin);
// 		title.focus();
// 		return false;
// 	} else if (titleValue.length > 99) {
// 		var titleMax = translations.title_max;
// 		$("#errorTitle").html(titleMax);
// 		title.focus();
// 		return false;
// 	} else if (!regex.test(titleValue)) {
// 		var titleValidMessage = translations.title_invalid;
// 		$("#errorTitle").html(titleValidMessage);
// 		title.focus();
// 		return false;
// 	} else {
// 		$("#errorTitle").html("");
// 		return true;
// 	}
// }

function titleValidate() {
	var title = $("#title");
	var regex = /^(?=.*[a-zA-Z0-9])[a-zA-Z0-9_& !@#$%^*:"'~()\-+=]*[a-zA-Z0-9_& !@#$%^*:"'~()\-+=]*$/;
	var titleValue = title.val().trim();

	if (titleValue === "") {
		var titleRequiredMessage = translations.title_required;
		$("#errorTitle").html(titleRequiredMessage);
		title.focus();
		return false;
	} else if (titleValue.replace(/\s/g, "").length < 2) {
		var titleMin = translations.title_min;
		$("#errorTitle").html(titleMin);
		title.focus();
		return false;
	} else if (titleValue.length > 99) {
		var titleMax = translations.title_max;
		$("#errorTitle").html(titleMax);
		title.focus();
		return false;
	} else if (!regex.test(titleValue)) {
		var titleValidMessage = translations.title_invalid;
		$("#errorTitle").html(titleValidMessage);
		title.focus();
		return false;
	} else {
		$("#errorTitle").html("");
		return true;
	}
}

function title_1Validate() {
	var title = $("#title_1");
	var regex = /^(?=.*[a-zA-Z0-9])[a-zA-Z0-9_& !@#$%^*:"'~()\-+=]*[a-zA-Z0-9_& !@#$%^*:"'~()\-+=]*$/;
	var titleValue = title.val().trim();
	if (titleValue === "") {
		var titleRequiredMessage = translations.title_1_required;
		$("#errorTitle_1").html(titleRequiredMessage);
		title.focus();
		return false;
	} else if (titleValue.replace(/\s/g, "").length < 2) {
		var titleMin = translations.title_1_min;
		$("#errorTitle_1").html(titleMin);
		title.focus();
		return false;
	} else if (titleValue.length > 99) {
		var titleMax = translations.title_1_max;
		$("#errorTitle_1").html(titleMax);
		title.focus();
		return false;
	} else if (!regex.test(titleValue)) {
		var titleValidMessage = translations.title_1_invalid;
		$("#errorTitle_1").html(titleValidMessage);
		title.focus();
		return false;
	} else {
		$("#errorTitle_1").html("");
		return true;
	}
}

function title_2Validate() {
	var title = $("#title_2");
	var regex = /^(?=.*[a-zA-Z0-9])[a-zA-Z0-9_& !@#$%^*:"'~()\-+=]*[a-zA-Z0-9_& !@#$%^*:"'~()\-+=]*$/;
	var titleValue = title.val().trim();
	if (titleValue === "") {
		var titleRequiredMessage = translations.title_2_required;
		$("#errorTitle_2").html(titleRequiredMessage);
		title.focus();
		return false;
	} else if (titleValue.replace(/\s/g, "").length < 2) {
		var titleMin = translations.title_2_min;
		$("#errorTitle_2").html(titleMin);
		title.focus();
		return false;
	} else if (titleValue.length > 99) {
		var titleMax = translations.title_2_max;
		$("#errorTitle_2").html(titleMax);
		title.focus();
		return false;
	} else if (!regex.test(titleValue)) {
		var titleValidMessage = translations.title_2_invalid;
		$("#errorTitle_2").html(titleValidMessage);
		title.focus();
		return false;
	} else {
		$("#errorTitle_2").html("");
		return true;
	}
}

function titleValidate_button() {
	var title = $("#button_title_one");
	var regex = /^(?=.*[a-zA-Z0-9])[a-zA-Z0-9_& ]*[a-zA-Z0-9_& ]*$/;
	var titleValue = title.val().trim();

	if (titleValue.replace(/\s/g, "").length < 2) {
		var titleMin = translations.title_min;
		$("#errorTitle1").html(titleMin);
		title.focus();
		return false;
	} else if (titleValue.length > 99) {
		var titleMax = translations.title_max;
		$("#errorTitle1").html(titleMax);
		title.focus();
		return false;
	} else if (!regex.test(titleValue)) {
		var titleValidMessage = translations.title_invalid;
		$("#errorTitle1").html(titleValidMessage);
		title.focus();
		return false;
	} else {
		$("#errorTitle1").html("");
		return true;
	}
}

function titleValidate_button2() {
	var title = $("#button_title_two");
	var regex = /^(?=.*[a-zA-Z0-9])[a-zA-Z0-9_& ]*[a-zA-Z0-9_& ]*$/;
	var titleValue = title.val().trim();

	if (titleValue.replace(/\s/g, "").length < 2) {
		var titleMin = translations.title_min;
		$("#errorTitle2").html(titleMin);
		title.focus();
		return false;
	} else if (titleValue.length > 99) {
		var titleMax = translations.title_max;
		$("#errorTitle2").html(titleMax);
		title.focus();
		return false;
	} else if (!regex.test(titleValue)) {
		var titleValidMessage = translations.title_invalid;
		$("#errorTitle2").html(titleValidMessage);
		title.focus();
		return false;
	} else {
		$("#errorTitle2").html("");
		return true;
	}
}


function buttonTitleValidate() {
	var buttonTitle = $("#button_title");
	var buttonTitleValue = buttonTitle.val().trim();

	if (buttonTitleValue === "") {
		var buttonTitleRequiredMessage = translations.button_title_required;
		$("#errorButtonTitle").html(buttonTitleRequiredMessage);
		buttonTitle.focus();
		return false;
	} else if (buttonTitleValue.replace(/\s/g, "").length < 2) {
		var buttonTitleMin = translations.button_title_min;
		$("#errorButtonTitle").html(buttonTitleMin);
		buttonTitle.focus();
		return false;
	} else if (buttonTitleValue.length > 20) {
		var buttonTitleMax = translations.button_title_max;
		$("#errorButtonTitle").html(buttonTitleMax);
		buttonTitle.focus();
		return false;
	} else if (!/^(?=.*[a-zA-Z0-9])[a-zA-Z0-9_& ]+$/.test(buttonTitleValue)) {
		// Adjusted regex to allow special characters along with alphanumeric characters
		var buttonTitleValidMessage = translations.button_title_invalid;
		$("#errorButtonTitle").html(buttonTitleValidMessage);
		buttonTitle.focus();
		return false;
	} else {
		$("#errorButtonTitle").html("");
		return true;
	}
}

function nameValidate() {
	var name = $("#name");
	var regex = /^(?=.*[a-zA-Z])[a-zA-Z0-9_!@#$%^&*()\-+=? ]+[a-zA-Z0-9_!@#$%^&*()\-+=? ]*$/;
	var nameValue = name.val().trim();
	if (nameValue == "") {
		var nameRequiredMessage = translations.name_required;
		$("#errorName").html(nameRequiredMessage);
		name.focus();
		return false;
	} else if (!regex.test(nameValue)) {
		var nameMsgAlpha = translations.name_alphabetic;
		$("#errorName").html(nameMsgAlpha);
		name.focus();
		return false;
	} else if (nameValue.length <= 2 || (nameValue[1] === ' ')) {
		var nameMin = translations.name_min;
		$("#errorName").html(nameMin);
		name.focus();
		return false;
	} else if (nameValue.length > 255) {
		var nameMax = translations.name_max;
		$("#errorName").html(nameMax);
		name.focus();
		return false;
	} else {
		$("#errorName").html("");
		return true;
	}
}


function mainTitleValidate() {
	var editor = CKEDITOR.instances['main_title'];
	var titleContent = editor.getData();
	if (titleContent.trim() === "") {
		var mainTitleRequiredMessage = translations.main_title_required;
		$("#errorMainTitle").html(mainTitleRequiredMessage);
		editor.focus();
		return false;
	}
	// else if (titleContent.length < 255) {
	// 	var mainTitleMin = translations.main_title_min;
	// 	$("#errorMainTitle").html(mainTitleMin);
	// 	editor.focus();
	// 	return false;
	// }
	else {
		$("#errorMainTitle").html("");
		return true;
	}
}

function whyIfkaValidate() {
	var whyIfkEditor = CKEDITOR.instances['whyifka_title'];
	var whyIfkaTitleContent = whyIfkEditor.getData();
	if (whyIfkaTitleContent.trim() === "") {
		var whyIfkaTitleRequiredMessage = translations.inner_title_required;
		$("#errorInnertitle").html(whyIfkaTitleRequiredMessage);
		whyIfkEditor.focus();
		return false;
	}
	else {
		$("#errorInnertitle").html("");
		return true;
	}
}

function whyIfkaDescriptionValidate() {
	var whyIfkaDesEditor = CKEDITOR.instances['whyifka_description'];
	var whyIfkaDesTitleContent = whyIfkaDesEditor.getData();
	if (whyIfkaDesTitleContent.trim() === "") {
		var whyIfkaDesRequiredMessage = translations.whyifka_des_required;
		$("#errorWhyifkaDescription").html(whyIfkaDesRequiredMessage);
		whyIfkaDesEditor.focus();
		return false;
	}
	else {
		$("#errorWhyifkaDescription").html("");
		return true;
	}
}
function whyKenyaDescriptionValidate() {
	var whyKenyaDesEditor = CKEDITOR.instances['description1'];
	var whyKenyaDesTitleContent = whyKenyaDesEditor.getData();
	if (whyKenyaDesTitleContent.trim() === "") {
		var whyKenyaDesRequiredMessage = translations.description1_required;
		$("#errorDescription1").html(whyKenyaDesRequiredMessage);
		whyKenyaDesEditor.focus();
		return false;
	}
	else {
		$("#errorWhyifkaDescription").html("");
		return true;
	}
}
function whyVisitMainTitleValidate() {
	var whyvisitMainTitleEditor = CKEDITOR.instances['main_title'];
	var whyVisitMTitleTitleContent = whyvisitMainTitleEditor.getData();
	if (whyVisitMTitleTitleContent.trim() === "") {
		var whyVisitMtitleRequiredMessage = translations.main_title_required;
		$("#errorMainTitle").html(whyVisitMtitleRequiredMessage);
		whyvisitMainTitleEditor.focus();
		return false;
	}
	else {
		$("#errorMainTitle").html("");
		return true;
	}
}
function whyVisitMainDescriptionValidate() {
	var whyvisitDesEditor = CKEDITOR.instances['main_description'];
	var whyVisitDesTitleContent = whyvisitDesEditor.getData();
	if (whyVisitDesTitleContent.trim() === "") {
		var whyVisitDesRequiredMessage = translations.main_description_required;
		$("#errorMainDescription").html(whyVisitDesRequiredMessage);
		whyvisitDesEditor.focus();
		return false;
	}
	else {
		$("#errorMainDescription").html("");
		return true;
	}
}
function whyVisitLeftTitleValidate() {
	var whyvisitLeftTitleEditor = CKEDITOR.instances['left_title'];
	var whyVisitLeftTitleTitleContent = whyvisitLeftTitleEditor.getData();
	if (whyVisitLeftTitleTitleContent.trim() === "") {
		var whyVisitLefttitleRequiredMessage = translations.left_title_required;
		$("#errorLeftTitle").html(whyVisitLefttitleRequiredMessage);
		whyvisitLeftTitleEditor.focus();
		return false;
	}
	else {
		$("#errorLeftTitle").html("");
		return true;
	}
}

function whyVisitRightTitleValidate() {
	var whyvisitRightTitleEditor = CKEDITOR.instances['right_title'];
	var whyVisitRightTitleTitleContent = whyvisitRightTitleEditor.getData();
	if (whyVisitRightTitleTitleContent.trim() === "") {
		var whyVisitRightTitleRequiredMessage = translations.right_title_required;
		$("#errorRightTitle").html(whyVisitRightTitleRequiredMessage);
		whyvisitRightTitleEditor.focus();
		return false;
	}
	else {
		$("#errorRightTitle").html("");
		return true;
	}
}
function whyVisitRightDescriptionValidate() {
	var whyvisitRightDesEditor = CKEDITOR.instances['right_description'];
	var whyVisitRightDesTitleContent = whyvisitRightDesEditor.getData();
	if (whyVisitRightDesTitleContent.trim() === "") {
		var whyVisitRightDesRequiredMessage = translations.right_description_required;
		$("#errorRightDescription").html(whyVisitRightDesRequiredMessage);
		whyvisitRightDesEditor.focus();
		return false;
	}
	else {
		$("#errorRightDescription").html("");
		return true;
	}
}
function aboutTitleValidate() {
	var title = $("#title");
	var regex = /^(?=.*[a-zA-Z0-9])[a-zA-Z0-9_& !@#$%^*:"'~()\-+=]*[a-zA-Z0-9_& !@#$%^*:"'~()\-+=]*$/;
	if (title.val().trim() === "") {
		var titleRequiredMessage = translations.title_required;
		$("#errorTitle").html(titleRequiredMessage);
		title.focus();
		return false;
	} else if (!regex.test(title.val())) {
		var titleValidMessage = translations.about_title_invalid;
		$("#errorTitle").html(titleValidMessage);
		title.focus();
		return false;
	} else if (title.val().length > 249) {
		var titleMax = translations.about_title_max;
		$("#errorTitle").html(titleMax);
		title.focus();
		return false;
	} else {
		$("#errorTitle").html("");
		return true;
	}
}

function aboutTitle2Validate() {
	var title_2 = $("#title_2");
	var regex = /^(?=.*[a-zA-Z0-9])[a-zA-Z0-9_& !@#$%^*:"'~()\-+=]*[a-zA-Z0-9_& !@#$%^*:"'~()\-+=]*$/;
	if (title_2.val().trim() === "") {
		// Title is blank, no need to display an error message
		$("#errorTitle_2").html("");
		return true;
	} else if (!regex.test(title_2.val())) {
		var titleValidMessage = translations.about_title_2_invalid;
		$("#errorTitle_2").html(titleValidMessage);
		title_2.focus();
		return false;
	} else if (title_2.val().length > 249) {
		var titleMax = translations.about_title_2_max;
		$("#errorTitle_2").html(titleMax);
		title_2.focus();
		return false;
	} else {
		$("#errorTitle_2").html("");
		return true;
	}
}

function aboutTitle3Validate() {
	var title_3 = $("#title_3");
	var regex = /^(?=.*[a-zA-Z0-9])[a-zA-Z0-9_& !@#$%^*:"'~()\-+=]*[a-zA-Z0-9_& !@#$%^*:"'~()\-+=]*$/;
	if (title_3.val().trim() === "") {
		// Title is blank, no need to display an error message
		$("#errorTitle_3").html("");
		return true;
	} else if (!regex.test(title_3.val())) {
		var titleValidMessage = translations.about_title_3_invalid;
		$("#errorTitle_3").html(titleValidMessage);
		title_3.focus();
		return false;
	} else if (title_3.val().length > 249) {
		var titleMax = translations.about_title_3_max;
		$("#errorTitle_3").html(titleMax);
		title_3.focus();
		return false;
	} else {
		$("#errorTitle_3").html("");
		return true;
	}
}

function locationValidate() {
	var location = $("#location");
	if (location.val() === "") {
		var locationRequiredMessage = translations.location_required;
		$("#errorLocation").html(locationRequiredMessage);
		return false;
	} else {
		$("#errorLocation").html("");
		return true;
	}
}

function ticketTypeValidate() {
	var ticketType = $("#ticketType");
	if (ticketType.val() === "") {
		var tikcetTypeRequiredMessage = translations.ticket_type_required;
		$("#errorTicketType").html(tikcetTypeRequiredMessage);
		return false;
	} else {
		$("#errorTicketType").html("");
		return true;
	}
}

function eventValidate() {
	var eventValue = $("#select-searchEvent");
	if (eventValue.val() === "") {
		var eventRequiredMessage = translations.event_required;
		$("#errorEvent").html(eventRequiredMessage);
		eventValue.focus();
		return false;
	} else {
		$("#errorEvent").html("");
		return true;
	}
}

function guestValidate() {
	var eventValue = $("#guestDropDown");
	if (eventValue.val() === "") {
		var eventRequiredMessage = translations.guest_required;
		$("#errorGuest").html(eventRequiredMessage);
		eventValue.focus();
		return false;
	} else {
		$("#errorGuest").html("");
		return true;
	}
}

function typeValidate() {
	var type = $("#type");
	if (type.val() === "") {
		var typeRequiredMessage = translations.type_required;
		$("#errorType").html(typeRequiredMessage);
		return false;
	} else {
		$("#errorType").html("");
		return true;
	}
}

// function indexValidate() {
// 	var index = $("#index");
// 	var numericRegex = /^\d+$/;
// 	if (index.val() === "") {
// 		var indexRequiredMessage = translations.index_required;
// 		$("#errorIndex").html(indexRequiredMessage);
// 		return false;
// 	} else if (!numericRegex.test(index.val())) {
// 		var indexNumeric = translations.index_numeric;
// 		$("#errorIndex").html(indexNumeric);
// 		return false;
// 	} else {
// 		var indexValue = parseInt(index.val());
// 		if (indexValue < 1 || indexValue > 100) {
// 			index.focus();
// 			var indexBetween = translations.index_between;
// 			$("#errorIndex").html(indexBetween);
// 			return false;
// 		} else {
// 			$("#errorIndex").html("");
// 			return true;
// 		}
// 	}
// }

function indexValidate() {
	var index = $("#index");
	var numericRegex = /^\d+$/;

	if (index.val() === "") {
		var indexRequiredMessage = translations.index_required;
		$("#errorIndex").html(indexRequiredMessage);
		return false;
	} else if (!numericRegex.test(index.val())) {
		var indexNumeric = translations.index_numeric;
		$("#errorIndex").html(indexNumeric);
		return false;
	} else {
		var indexValue = parseInt(index.val());

		if (indexValue < 1 || indexValue > 100) {
			index.focus();
			var indexBetween = translations.index_between;
			$("#errorIndex").html(indexBetween);
			return false;
		} else {
			$("#errorIndex").html("");
			return true;
		}
	}
}


function orderValidate() {
	var order = $("#order");
	var numericRegex = /^\d+$/;
	if (order.val() === "") {
		var orderRequiredMessage = translations.order_required;
		$("#errorOrder").html(orderRequiredMessage);
		return false;
	} else if (!numericRegex.test(order.val())) {
		var orderNumeric = translations.order_numeric;
		$("#errorOrder").html(orderNumeric);
		return false;
	} else {
		var orderValue = parseInt(order.val());
		if (orderValue < 1 || orderValue > 100) {
			order.focus();
			var orderBetween = translations.order_between;
			$("#errorOrder").html(orderBetween);
			return false;
		} else {
			$("#errorOrder").html("");
			return true;
		}
	}
}



$("#add_category").submit(function () {
	var allValidations = [
		category_name_validate(),
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_gallery_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	let validation = true;
	if (hiddenId.val().trim() == "") {
		validation = ValidateImage("image", "errorImage");
	}
	var fileInput = document.getElementById("image");
	if (fileInput.files.length > 0) {
		validation = ValidateImage("image", "errorImage");
	}
	var allValidations = [
		eventValidate(),
		sort_order_validate(),
		validation
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_faq_validation").submit(function () {
	var allValidations = [
		questionValidate(),
		faqsAnswerValidate(),
		faqsModuleValidate()
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_policy_validation").submit(function () {
	var allValidations = [
		descriptionValidate(),
		// titleValidate()
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_event_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	let validation = true;
	let floorPlanValidation = true;
	// stall_dimension_image validation
	if (hiddenId.val().trim() == "") {
		validationStallImg = ValidateImage("stall_dimension_image", "errorStallBookingImage");
	}
	var fileInput = document.getElementById("stall_dimension_image");
	if (fileInput.files.length > 0) {
		validationStallImg = ValidateImage("stall_dimension_image", "errorStallBookingImage");
	}
	// floor_plan_image validation
	// if (hiddenId.val().trim() == "") {
	// 	floorPlanValidation = onlySvgImg("floor_plan_image", "errorFloorPlanImage");
	// }
	// var fileInput = document.getElementById("floor_plan_image");
	// if (fileInput.files.length > 0) {
	// 	floorPlanValidation = onlySvgImg("floor_plan_image", "errorFloorPlanImage");
	// }
	if (hiddenId.val().trim() == "") {
		validation = ValidateImage("image", "errorEventImage");
	}
	var fileInput = document.getElementById("image");
	if (fileInput.files.length > 0) {
		validation = ValidateImage("image", "errorEventImage");
	}
	var allValidations = [
		estimatedTurnoutValidate(),
		editionValidate(),
		validateEndTime(),
		validateStartTime(),
		highlightsValidate(),
		descriptionValidate(),
		placeValidate(),
		nameValidate(),
		floorPlanValidation,
		validation,
		validationStallImg
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});
$("#add_media_partners_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	let validationIm = true;
	// var isNewRecord = $('#hiddenId').val() ? false : true;
	if (hiddenId.val().trim() == "") {
		validationIm = ValidateImage("image", "errorImage");
	}
	var fileInput = document.getElementById("image");
	if (fileInput.files.length > 0) {
		validationIm = ValidateImage("image", "errorImage");
	}
	var allValidations = [
		eventValidate(),
		orderValidate(),
		validationIm
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_member_association_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	let validationImg = true;
	// var isNewRecord = $('#hiddenId').val() ? false : true;
	if (hiddenId.val().trim() == "") {
		validationImg = ValidateImage("image", "errorImage");
	}
	var fileInput = document.getElementById("image");
	if (fileInput.files.length > 0) {
		validationImg = ValidateImage("image", "errorImage");
	}
	var allValidations = [
		eventValidate(),
		orderValidate(),
		validationImg
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_sponsors_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	let validationSp = true;
	// var isNewRecord = $('#hiddenId').val() ? false : true;
	if (hiddenId.val().trim() == "") {
		validationSp = ValidateImage("image", "errorImage");
	}
	var fileInput = document.getElementById("image");
	if (fileInput.files.length > 0) {
		validationSp = ValidateImage("image", "errorImage");
	}
	var allValidations = [
		eventValidate(),
		typeValidate(),
		orderValidate(),
		validationSp
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_vip_validation").submit(function () {
	var allValidations = [
		eventValidate(),
		guestValidate()
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_speaker_validation").submit(function () {
	var allValidations = [
		eventValidate(),
		guestValidate()
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_social_validation").submit(function () {
	var allValidations = [
		instagramValidate(),
		linkedinValidate(),
		twitterValidate(),
		facebookValidate(),
		socialTextValidate(),
		socialTitleValidate(),
		eventValidate()
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_home_slide_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	let validation = true;
	// var isNewRecord = $('#hiddenId').val() ? false : true;
	if (hiddenId.val().trim() == "") {
		validation = validateMedia("media", "errorMedia");
	}
	var fileInput = document.getElementById("media");
	if (fileInput.files.length > 0) {
		validation = validateMedia("media", "errorMedia");
	}
	var allValidations = [
		eventValidate(),
		titleValidate(),
		validation
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

$("#add_user_event_validation").submit(function () {
	var allValidations = [
		radioValidation(),
		// userEmailValidate()
	];

	// console.log(allValidations)

	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {

		startLoader();
		return true;
	} else {
		return false;
	}
});
function radioValidation() {
	var existingUser = $("#existing_user").prop("checked");
	var newUser = $("#new_user").prop("checked");
	if (existingUser) {
		var allValidations = [
			userEmailValidate(),
			eventValidate()
		];
		if (
			allValidations.every(function (isValid) {
				return isValid;
			})
		) {
			startLoader();
			return true;
		} else {
			return false;
		}
	} else if (newUser) {
		var allValidations = [
			industrySectorValidate(),
			mobileValidate(),
			newUserEmailValidate(),
			lastNameValidate(),
			firstNameValidate(),
			eventValidate()
		];
		if (
			allValidations.every(function (isValid) {
				return isValid;
			})
		) {
			startLoader();
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
	return true;
}

function emailValidate() {
	var email_id = $("#loginemail");
	var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/;
	if (email_id.val().trim() == "") {
		var emailRequiredMessage = translations.email_required;
		$("#errorEmail").html(emailRequiredMessage);
		email_id.focus();
		return false;
	} else if (!regex.test(email_id.val())) {
		var emailValid = translations.email_valid;
		$("#errorEmail").html(emailValid);
		email_id.focus();
		return false;
	} else {
		$("#errorEmail").html("");
		return true;
	}
}

function passwordValidate() {
	var password = $("#password");
	var regex = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/;
	if (password.val() == "") {
		var passwordRequiredMessage = translations.password_required;
		$("#errorPassword").html(passwordRequiredMessage);
		password.focus();
		return false;
	} else if (password.val().length < 8) {
		var passwordMinDigit = translations.password_min_length;
		$("#errorPassword").html(passwordMinDigit);
		password.focus();
		return false;
	} else if (password.val().length >= 20) {
		var passwordMaxDigit = translations.password_max_length;
		$("#errorPassword").html(passwordMaxDigit);
		password.focus();
		return false;
	} else if (!regex.test(password.val())) {
		var passwordAllow = translations.password_allow;
		$("#errorPassword").html(passwordAllow);
		password.focus();
		return false;
	} else {
		$("#errorPassword").html("");
		return true;
	}
}
function emailPhoneValidate() {
	var email_id = $("#forgot_email_id");
	if (email_id.val().trim() == "") {
		var emailRequiredMessage = translations.email_required;
		$("#errorEmailPhone").html(emailRequiredMessage);
		email_id.focus();
		return false;
	}
	if (!isEmail(email_id.val())) {
		var emailInValid = translations.email_invalid;
		$("#errorEmailPhone").html(emailInValid);
		email_id.focus();
		return false;
	} else if (isMobileNumber(email_id.val())) {
		$("#errorEmailPhone").html("");
		return true;
	} else {
		$("#errorEmailPhone").html("Please enter valid email.");
		email_id.focus();
		return false;
	}
}
function isEmail(input) {
	var emailPattern = /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/;
	return emailPattern.test(input);
}
function ConfirmpasswordValidate() {
	var cnfrmPassword = $("#c_password");
	var password = $("#password");
	if (cnfrmPassword.val() == "") {
		var cnfrmPasswordReq = translations.comfirm_password_required;
		$("#c_errorPassword").html(cnfrmPasswordReq);
		cnfrmPassword.focus();
		return false;
	} else if (cnfrmPassword.val().length < 8) {
		var cnfrmPasswordMin = translations.comfirm_password_min_length;
		$("#c_errorPassword").html(cnfrmPasswordMin);
		cnfrmPassword.focus();
		return false;
	} else if (cnfrmPassword.val().length >= 20) {
		var cnfrmPasswordMax = translations.comfirm_password_max_length;
		$("#c_errorPassword").html(cnfrmPasswordMax);
		cnfrmPassword.focus();
		return false;
	} else if (password.val() != cnfrmPassword.val()) {
		var cnfrmPasswordMatch = translations.comfirm_password_dont_match;
		$("#c_errorPassword").html(cnfrmPasswordMatch);
		cnfrmPassword.focus();
		return false;
	} else {
		$("#c_errorPassword").html("");
		return true;
	}
}

// $("#first_name").keypress(function (event) {
// 	if (event.which === 32) {
// 		event.preventDefault();
// 	}
// });

// $("#last_name").keypress(function (event) {
// 	if (event.which === 32) {
// 		event.preventDefault();
// 	}
// });

function firstNameValidate() {
	var firstname = $("#first_name");
	var firstNameValue = firstname.val();

	var regex = /^[a-zA-Z_ ]*$/;
	if (firstNameValue.trim() == "") {
		var firstNameRequiredMessage = translations.first_name_required;
		$("#errorFName").html(firstNameRequiredMessage);
		firstname.focus();
		return false;
	} else if (!regex.test(firstNameValue)) {
		var firstNameAlphabeticMessage = translations.first_name_alphabetic;
		$("#errorFName").html(firstNameAlphabeticMessage);
		firstname.focus();
		return false;
	} else if (firstNameValue.length < 2) {
		var firstNameMin = translations.first_name_min_length;
		$("#errorFName").html(firstNameMin);
		firstname.focus();
		return false;
	} else if (firstNameValue.length > 24) {
		var firstNameMax = translations.first_name_max_length;
		$("#errorFName").html(firstNameMax);
		firstname.focus();
		return false;
	} else {
		$("#errorFName").html("");
		return true;
	}
}

function lastNameValidate() {
	var lastName = $("#last_name");
	var lastNameValue = lastName.val();
	var regex = /^[a-zA-Z_]*$/;
	if (lastNameValue.trim() == "") {
		var fullNameRequiredMessage = translations.last_name_required;
		$("#errorLName").html(fullNameRequiredMessage);
		lastName.focus();
		return false;
	} else if (!regex.test(lastNameValue)) {
		var lastNameAlphabeticMessage = translations.last_name_alphabetic;
		$("#errorLName").html(lastNameAlphabeticMessage);
		lastName.focus();
		return false;
	} else if (lastNameValue.length < 2) {
		var fullNameMin = translations.last_name_min_length;
		$("#errorLName").html(fullNameMin);
		lastName.focus();
		return false;
	} else if (lastNameValue.length > 24) {
		var lastNameMax = translations.last_name_max_length;
		$("#errorLName").html(lastNameMax);
		lastName.focus();
		return false;
	} else {
		$("#errorLName").html("");
		return true;
	}
}

function companyNameValidate() {
	var companyName = $("#company_name");
	var companyNameValue = companyName.val();
	if (companyNameValue === "") {
		var companyNameReqdMsg = translations.company_name_required;
		$("#errorCName").html(companyNameReqdMsg);
		companyName.focus();
		return false;
	} else if (companyNameValue.length < 5) {
		var companyNameMin = translations.company_name_min_length;
		$("#errorCName").html(companyNameMin);
		companyName.focus();
		return false;
	} else if (companyNameValue.length > 99) {
		var companyNameMax = translations.company_name_max_length;
		$("#errorCName").html(companyNameMax);
		companyName.focus();
		return false;
	} else {
		$("#errorCName").html("");
		return true;
	}
}
function questionValidate() {
	var question = $("#question");
	var questionValue = question.val();
	if (questionValue === "") {
		var questionReqdMsg = translations.question_required;
		$("#errorQuestion").html(questionReqdMsg);
		question.focus();
		return false;
	} else {
		$("#errorQuestion").html("");
		return true;
	}
}
function faqsAnswerValidate() {
	var faqsAnswerEditor = CKEDITOR.instances['answer'];
	var faqsAnswerContent = faqsAnswerEditor.getData();
	if (faqsAnswerContent.trim() === "") {
		var answerReqdMsg = translations.answer_required;
		$("#errorAnswer").html(answerReqdMsg);
		faqsAnswerEditor.focus();
		return false;
	}
	else {
		$("#errorAnswer").html("");
		return true;
	}
}

function placeValidate() {
	var place = $("#place");
	var placeValue = place.val();
	if (placeValue.trim() == "") {
		var placeRequiredMessage = translations.place_required;
		$("#errorPlace").html(placeRequiredMessage);
		place.focus();
		return false;
	}
	else if (placeValue.trim().length < 2) {
		var placeMin = translations.place_min_length;
		$("#errorPlace").html(placeMin);
		place.focus();
		return false;
	}
	else if (placeValue.length > 254) {
		var placeMax = translations.place_max_length;
		$("#errorPlace").html(placeMax);
		place.focus();
		return false;
	} else {
		$("#errorPlace").html("");
		return true;
	}
}

function highlightsValidate() {
	var editor = CKEDITOR.instances['highlights'];
	var highlightsContent = editor.getData().replace(/<[^>]*>/g, '').trim();
	if (highlightsContent === "") {
		var highlightsReq = translations.highlights_required;
		$("#errorHighlights").html(highlightsReq);
		editor.focus();
		return false;
	}
	// else if (highlightsContent.length < 255) {
	// 	var highlightsMin = translations.highlights_min;
	// 	$("#errorHighlights").html(highlightsMin);
	// 	editor.focus();
	// 	return false;
	// }
	else {
		$("#errorHighlights").html("");
		return true;
	}
}

function editionValidate() {
	var eventEdition = $("#event_edition");
	var eventEditionValue = eventEdition.val();
	if (eventEditionValue.trim() == "") {
		var eventEditionReqMsg = translations.edition_required;
		$("#errorEdition").html(eventEditionReqMsg);
		eventEdition.focus();
		return false;
	} else if (eventEditionValue.length < 5) {
		var eventEditionMin = translations.edition_min_length;
		$("#errorEdition").html(eventEditionMin);
		eventEdition.focus();
		return false;
	} else if (eventEditionValue.length > 149) {
		var eventEditionMax = translations.edition_max_length;
		$("#errorEdition").html(eventEditionMax);
		eventEdition.focus();
		return false;
	} else {
		$("#errorEdition").html("");
		return true;
	}
}

function estimatedTurnoutValidate() {
	var estimatedTurnout = $("#estimated_turnout");
	var estimatedTurnoutValue = estimatedTurnout.val();
	if (estimatedTurnoutValue.trim() == "") {
		var estimatedTurnoutReqMsg = translations.estimated_turnout_required;
		$("#errorEstimatedTurnout").html(estimatedTurnoutReqMsg);
		estimatedTurnout.focus();
		return false;
	} else if (estimatedTurnoutValue.length < 5) {
		var estimatedTurnoutMin = translations.estimated_turnout_min_length;
		$("#errorEstimatedTurnout").html(estimatedTurnoutMin);
		estimatedTurnout.focus();
		return false;
	} else if (estimatedTurnoutValue.length > 149) {
		var estimatedTurnoutMax = translations.estimated_turnout_max_length;
		$("#errorEstimatedTurnout").html(estimatedTurnoutMax);
		estimatedTurnout.focus();
		return false;
	} else {
		$("#errorEstimatedTurnout").html("");
		return true;
	}
}

function validateStartDate() {
	var startDate = $("#start_date");
	if (startDate.val() === "") {
		var start_dateReqMsg = translations.start_date_required;
		$("#errorStartDate").html(start_dateReqMsg);
		startDate.focus();
		return false;
	} else {
		$("#errorStartDate").html("");
		return true;
	}
}
function validateEndDate() {
	var startDate = $("#start_date");
	var endDate = $("#end_date");
	if (endDate.val() === "") {
		var end_dateReqMsg = translations.end_date_required;
		$("#errorEndDate").html(end_dateReqMsg);
		endDate.focus();
		return false;
	} else if (startDate.val() !== "" && endDate.val() <= startDate.val()) {
		var end_dateAfter = translations.end_dateAfterMsg;
		$("#errorEndDate").html(end_dateAfter);
		return false;
	} else {
		$("#errorEndDate").html("");
		return true;
	}
}

function restrictYearInput(event) {
	var input = event.target;
	var dateParts = input.value.split("-");
	var year = dateParts[0];
	// Restrict the year to four digits
	if (year.length > 4) {
		year = year.slice(0, 4);
		var month = dateParts[1] || "";
		var day = dateParts[2] || "";
		input.value = year + (month ? "-" + month : "") + (day ? "-" + day : "");
	}
}

function validateStartTime() {
	var startTime = $("#timing_start_time");
	if (startTime.val() === "" || startTime.val() == "00:00") {
		var startTimeReqMsg = translations.start_time_required;
		$("#errorStartTime").html(startTimeReqMsg);
		startTime.focus();
		return false;
	} else {
		$("#errorStartTime").html("");
		return true;
	}
}

function validateEndTime() {
	var startTime = $("#timing_start_time");
	var endTime = $("#timing_end_time");
	if (endTime.val() === "" || endTime.val() == "00:00") {
		var endTimeReqMsg = translations.end_time_required;
		$("#errorEndTime").html(endTimeReqMsg);
		endTime.focus();
		return false;
	} else if (
		startTime.val() !== "" &&
		startTime.val() !== "00:00" &&
		endTime.val() <= startTime.val()
	) {
		var endTimeafter = translations.end_time_after_msg;
		$("#errorEndTime").html(endTimeafter);
		return false;
	} else {
		$("#errorEndTime").html("");
		return true;
	}
}

function industrySectorValidate() {
	var industry_sector = $("#industry_sector");
	var industry_sectorValue = industry_sector.val();
	if (industry_sectorValue.trim() == "") {
		var industrySectorRequiredMessage = translations.industry_sector_required;
		$("#errorIndSecName").html(industrySectorRequiredMessage);
		industry_sector.focus();
		return false;
	} else if (industry_sectorValue.length < 2) {
		var industrySectorMin = translations.industry_sector_min_length;
		$("#errorIndSecName").html(industrySectorMin);
		industry_sector.focus();
		return false;
	} else if (industry_sectorValue.length > 254) {
		var industrySectorMax = translations.industry_sector_max_length;
		$("#errorIndSecName").html(industrySectorMax);
		industry_sector.focus();
		return false;
	} else {
		$("#errorIndSecName").html("");
		return true;
	}
}

function validateUserType() {
	var userType = $("#user_type").val();

	if (!userType) {
		var userTypeRequiredMessage = translations.user_type_required;
		$("#errorUserType").html(userTypeRequiredMessage);
		$("#user_type").focus();
		return false;
	} else {
		$("#errorUserType").html("");

		if (userType === "Buyer") {
			var buyerType = $("#buyer_type").val();

			if (!buyerType) {
				var buyerTypeRequiredMessage = translations.buyer_type_required;
				$("#errorBuyerType").html(buyerTypeRequiredMessage);
				$("#buyer_type").focus();
				return false;
			} else {
				$("#errorBuyerType").html("");
			}
		}
	}

	return true;
}

function companyAddressValidate() {
	var companyAddress = $("#company_address");
	if (companyAddress.val() == "") {
		var companyAddressReq = translations.company_address_required;
		$("#errorComAddress").html(companyAddressReq);
		companyAddress.focus();
		return false;
	} else if (companyAddress.val().length < 5) {
		var companyAddressMin = translations.company_address_min_length;
		$("#errorComAddress").html(companyAddressMin);
		companyAddress.focus();
		return false;
	} else if (companyAddress.val().length > 254) {
		var companyAddressMax = translations.company_address_max_length;
		$('#errorComAddress').html(companyAddressMax);
		companyAddress.focus();
		return false;
	} else {
		$("#errorComAddress").html("");
		return true;
	}
}

function companyWebsiteValidate() {
	var companyWebsite = $("#company_website");
	var companyWebsiteValue = companyWebsite.val();
	var urlRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w.-]*)*\/?$/;
	if (companyWebsiteValue == "") {
		var companyWebsiteReq = translations.company_website_required;
		$("#errorCompanyWebsite").html(companyWebsiteReq);
		companyWebsite.focus();
		return false;
	} else if (!urlRegex.test(companyWebsiteValue)) {
		var invalidUrlMsg = translations.invalidComUrl;
		$("#errorCompanyWebsite").html(invalidUrlMsg);
		companyWebsite.focus();
		return false;
	} else {
		$("#errorCompanyWebsite").html("");
		return true;
	}
}

function jobTitleValidate() {
	var jobTitle = $("#job_title");
	if (jobTitle.val() == "") {
		var jobTitleReqMsg = translations.jobTitleRequired;
		$("#errorJobTitle").html(jobTitleReqMsg);
		jobTitle.focus();
		return false;
	} else if (jobTitle.val().length < 5) {
		var jobTitleMin = translations.jobTitleMin;
		$("#errorJobTitle").html(jobTitleMin);
		jobTitle.focus();
		return false;
	} else if (jobTitle.val().length > 99) {
		var jobTitleMax = translations.jobTitleMax;
		$("#errorJobTitle").html(jobTitleMax);
		jobTitle.focus();
		return false;
	} else {
		$("#errorJobTitle").html("");
		return true;
	}
}

function mobileValidate() {
	$(".hideMobile").hide();
	var mobile_number = $("#phone_number");
	var code = $("#hidden_contact");
	var numbers = new RegExp("[^0-9.]");
	if (mobile_number.val() == "") {
		var mobileNoRequiredMessage = translations.mobile_no_required;
		$("#errorNumber").html(mobileNoRequiredMessage);
		mobile_number.focus();
		return false;
	} else if (numbers.test(mobile_number.val())) {
		$(
			mobile_number.val(
				mobile_number
					.val()
					.replace(/[\s~`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?\da-zA-Z]/g, "")
			)
		);
		mobile_number.focus();
		return false;
	} else if (mobile_number.val().length < 10) {
		var mobileNoMin = translations.mobile_no_min_length;
		$("#errorNumber").html(mobileNoMin);
		mobile_number.focus();
		return false;
	} else if (mobile_number.val().length > 13) {
		var mobileNoMax = translations.mobile_no_max_length;
		$("#errorNumber").html(mobileNoMax);
		mobile_number.focus();
		return false;
	} else {
		$("#errorNumber").html("");
		return true;
	}
}

function category_name_validate() {
	var categoryName = $("#category_name");
	if (categoryName.val() == "") {
		var categoryRequiredMessage = translations.category_required;
		$("#errorCategoryname").html(categoryRequiredMessage);
		categoryName.focus();
		return false;
	} else if (categoryName.val().length < 5) {
		var categoryMin = translations.category_min_required;
		$("#errorCategoryname").html(categoryMin);
		categoryName.focus();
		return false;
	} else if (categoryName.val().trim() == "") {
		var categorySpace = translations.category_space;
		$("#errorCategoryname").html(categorySpace);
		categoryName.focus();
		return false;
	} else if (categoryName.val().length > 99) {
		var categoryMax = translations.category_max_required;
		$("#errorCategoryname").html(categoryMax);
		categoryName.focus();
		return false;
	} else {
		$("#errorCategoryname").html("");
		return true;
	}
}

function sort_order_validate() {
	var sortOrder = $('#sort_order');
	var numericRegex = /[^0-9.]/;
	if (sortOrder.val() == "") {
		var sortOrderEnter = translations.sort_order_required;
		$('#errorSortOrder').html(sortOrderEnter);
		sortOrder.focus();
		return false;
	} else if (numericRegex.test(sortOrder.val())) {
		var sortOrderReg = translations.sort_order_valid;
		$('#errorSortOrder').html(sortOrderReg);
		sortOrder.focus();
		return false;
	} else if (parseInt(sortOrder.val()) === 0) {
		var sortOrderZero = translations.sort_order_zero;
		$("#errorSortOrder").html(sortOrderZero);
		sortOrder.focus();
		return false;
	} else {
		let field_url = $('#field_url').val();
		let old_order = $('#old_sort_order').val();
		if (field_url != undefined) {
			let currentOrder = sortOrder.val();
			checkOrder(currentOrder, field_url, old_order);
		}
		if ($("#sort_order_exists").val() == 0) {
			$("#errorSortOrder").html("");
			return true;
		} else {
			sortOrder.focus();
			return false;
		}
	}
}

function checkOrder(order_id, field_url, old_order = null) {
	var check = true;
	$.ajax({
		type: "POST",
		url: field_url,
		headers: {
			"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
		},
		data: {
			'order': order_id,
			'old_sort_order': old_order
		},
		success: function (data) {
			if (data == "failed") {
				var sortOrderExits = translations.sort_order_exists;
				$("#errorSortOrder").html(sortOrderExits);
				$("#sort_order_exists").val("1");
				check = false;
			} else if (data == "success") {
				check = true;
				$("#sort_order_exists").val("0");
				$("#errorSortOrder").html("");
			}
		}
	});
}

// function addressValidate() {
// 	var address = $("#address");
// 	if (address.val() == "") {
// 		var addressReq = translations.address_required;
// 		$("#errorAddress").html(addressReq);
// 		address.focus();
// 		return false;
// 	} else if (address.val().length < 5) {
// 		var addressMin = translations.address_min;
// 		$("#errorAddress").html(addressMin);
// 		address.focus();
// 		return false;
// 	} else if (address.val().length > 499) {
// 		var addressMax = translations.address_max;
// 		$('#errorAddress').html(addressMax);
// 		address.focus();
// 		return false;
// 	} else {
// 		$("#errorAddress").html("");
// 		return true;
// 	}
// }

function addressValidate() {
	var address = $("#address");
	var addressValue = address.val().trim();

	if (addressValue === "") {
		var addressReq = translations.address_required;
		$("#errorAddress").html(addressReq);
		address.focus();
		return false;
	} else if (addressValue.length < 5) {
		var addressMin = translations.address_min;
		$("#errorAddress").html(addressMin);
		address.focus();
		return false;
	} else if (addressValue.length > 499) {
		var addressMax = translations.address_max;
		$('#errorAddress').html(addressMax);
		address.focus();
		return false;
	} else {
		$("#errorAddress").html("");
		return true;
	}
}


// function headingValidate() {
// 	var heading = $("#heading");
// 	if (heading.val() == "") {
// 		var headingReq = translations.heading_required;
// 		$("#errorHeading").html(headingReq);
// 		heading.focus();
// 		return false;
// 	} else if (heading.val().length < 5) {
// 		var headingMin = translations.heading_min;
// 		$("#errorHeading").html(headingMin);
// 		heading.focus();
// 		return false;
// 	} else if (heading.val().length > 99) {
// 		var headingMax = translations.heading_max;
// 		$('#errorHeading').html(headingMax);
// 		heading.focus();
// 		return false;
// 	} else {
// 		$("#errorHeading").html("");
// 		return true;
// 	}
// }

function headingValidate() {
	var heading = $("#heading");
	var headingValue = heading.val().trim(); // Trim whitespace from the beginning and end

	if (headingValue === "") {
		var headingReq = translations.heading_required;
		$("#errorHeading").html(headingReq);
		heading.focus();
		return false;
	} else if (headingValue.length < 5) {
		var headingMin = translations.heading_min;
		$("#errorHeading").html(headingMin);
		heading.focus();
		return false;
	} else if (headingValue.length > 99) {
		var headingMax = translations.heading_max;
		$('#errorHeading').html(headingMax);
		heading.focus();
		return false;
	} else {
		$("#errorHeading").html("");
		return true;
	}
}


// function socialLinksValidate() {
// 	var socialLinks = $("#social_links");
// 	var socialLinksValue = socialLinks.val();
// 	var urlRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w.-]*)*\/?$/;

// 	if (socialLinksValue == "") {
// 		var socialLinksReq = translations.socialLinks_required;
// 		$("#errorSocialLinks").html(socialLinksReq);
// 		socialLinks.focus();
// 		return false;
// 	} else if (!urlRegex.test(socialLinksValue)) {
// 		var invalidUrlMsg = translations.invalidUrl;
// 		$("#errorSocialLinks").html(invalidUrlMsg);
// 		socialLinks.focus();
// 		return false;
// 	} else {
// 		$("#errorSocialLinks").html("");
// 		return true;
// 	}
// }

function facebookLinkValidate() {
	var socialLinks = $("#facebook_link");
	var socialLinksValue = socialLinks.val();
	var urlRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w.-]*)*\/?$/;

	if (socialLinksValue.trim() === "") {

		$("#errorFacebook").html("");
		return true;
	} else if (!urlRegex.test(socialLinksValue)) {
		var invalidUrlMsg = translations.facebookInvalidUrl;
		$("#errorFacebook").html(invalidUrlMsg);
		socialLinks.focus();
		return false;
	} else {
		$("#errorFacebook").html("");
		return true;
	}
}

function consentCheckboxValidate() {
	var consentCheckbox = $("#consent_checkbox");

	if (!consentCheckbox.prop('checked')) {
		var consentErrorMsg = translations.consent_required;
		$("#consent_checkboxError").html(consentErrorMsg);
		return false;
	} else {
		$("#consent_checkboxError").html("");
		return true;
	}
}


function buttonLinkValidate1() {
	var socialLinks = $("#button_link_one");
	var socialLinksValue = socialLinks.val();
	var urlRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w.-]*)*\/?$/;

	if (socialLinksValue.trim() === "") {

		$("#errorBtnLink1").html("");
		return true;
	} else if (!urlRegex.test(socialLinksValue)) {
		var invalidUrlMsg = translations.invalidUrl;
		$("#errorBtnLink1").html(invalidUrlMsg);
		socialLinks.focus();
		return false;
	} else {
		$("#errorBtnLink1").html("");
		return true;
	}
}

function buttonLinkValidate2() {
	var socialLinks = $("#button_link_two");
	var socialLinksValue = socialLinks.val();
	var urlRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w.-]*)*\/?$/;

	if (socialLinksValue.trim() === "") {

		$("#errorBtnLink2").html("");
		return true;
	} else if (!urlRegex.test(socialLinksValue)) {
		var invalidUrlMsg = translations.invalidUrl;
		$("#errorBtnLink2").html(invalidUrlMsg);
		socialLinks.focus();
		return false;
	} else {
		$("#errorBtnLink2").html("");
		return true;
	}
}

function twitterLinkValidate() {
	var socialLinks = $("#twitter_id");
	var socialLinksValue = socialLinks.val();
	var urlRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w.-]*)*\/?$/;

	if (socialLinksValue.trim() === "") {

		$("#errorTwitter").html("");
		return true;
	} else if (!urlRegex.test(socialLinksValue)) {
		var invalidUrlMsg = translations.twitterInvalidUrl;
		$("#errorTwitter").html(invalidUrlMsg);
		socialLinks.focus();
		return false;
	} else {
		$("#errorTwitter").html("");
		return true;
	}
}

function instagramLinkValidate() {
	var socialLinks = $("#instagram_id");
	var socialLinksValue = socialLinks.val();
	var urlRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w.-]*)*\/?$/;

	if (socialLinksValue.trim() === "") {

		$("#errorInstagram").html("");
		return true;
	} else if (!urlRegex.test(socialLinksValue)) {
		var invalidUrlMsg = translations.instagramInvalidUrl;
		$("#errorInstagram").html(invalidUrlMsg);
		socialLinks.focus();
		return false;
	} else {
		$("#errorInstagram").html("");
		return true;
	}
}

function linkedinLinkValidate() {
	var socialLinks = $("#linkedin_id");
	var socialLinksValue = socialLinks.val();
	var urlRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w.-]*)*\/?$/;

	if (socialLinksValue.trim() === "") {

		$("#errorLinkedin").html("");
		return true;
	} else if (!urlRegex.test(socialLinksValue)) {
		var invalidUrlMsg = translations.linkedinInvalidUrl;
		$("#errorLinkedin").html(invalidUrlMsg);
		socialLinks.focus();
		return false;
	} else {
		$("#errorLinkedin").html("");
		return true;
	}
}


function descriptionValidate() {
	var editor = CKEDITOR.instances['description'];
	var descriptionContent = editor.getData().replace(/<[^>]*>/g, '').trim();
	if (descriptionContent === "") {
		var descriptionReq = translations.description_required;
		$("#errorDescription").html(descriptionReq);
		editor.focus();
		return false;
	}
	// else if (descriptionContent.length < 255) {
	// 	var descriptionMin = translations.description_min;
	// 	$("#errorDescription").html(descriptionMin);
	// 	editor.focus();
	// 	return false;
	// }
	else {
		$("#errorDescription").html("");
		return true;
	}
}

function ImageTitleValidate() {
	var ImgTitle = $("#img_title");
	// var regex = /^(?=.*[a-zA-Z0-9])[a-zA-Z0-9!@#$%^&*_\-+=? ]+[a-zA-Z0-9!@#$%^&*_\-+=? ]*$/;
	var regex = /^(?=.*[a-zA-Z0-9])[a-zA-Z0-9_& !@#$%^*:"'~()\-+=]*[a-zA-Z0-9_& !@#$%^*:"'~()\-+=]*$/;
	var titleValue = ImgTitle.val().trim();
	if (titleValue == "") {
		var imgTitleReqdMsg = translations.img_title_required;
		$("#errorImageTitle").html(imgTitleReqdMsg);
		ImgTitle.focus();
		return false;
	} else if (!regex.test(titleValue)) {
		var imgTitleValid = translations.img_title_valid;
		$("#errorImageTitle").html(imgTitleValid);
		ImgTitle.focus();
		return false;
	} else if (titleValue.length < 2 || (titleValue[1] === ' ')) {
		var imgTitleMin = translations.img_title_min;
		$("#errorImageTitle").html(imgTitleMin);
		ImgTitle.focus();
		return false;
	} else if (titleValue.length > 99) {
		var imgTitleMax = translations.img_title_max;
		$("#errorImageTitle").html(imgTitleMax);
		ImgTitle.focus();
		return false;
	} else {
		$("#errorImageTitle").html("");
		return true;
	}
}

function socialTitleValidate() {
	var socialTitle = $("#social_title");
	var regex = /^(?=.*[a-zA-Z])[a-zA-Z0-9_!@#$%^&*()\-+=? ]+[a-zA-Z0-9_!@#$%^&*()\-+=? ]*$/;
	var socialTitleValue = socialTitle.val().trim();

	if (socialTitleValue === "") {
		var socialTitleRequiredMessage = translations.social_title_required;
		$("#errorSocialTitle").html(socialTitleRequiredMessage);
		socialTitle.focus();
		return false;
	}
	else if (!regex.test(socialTitleValue)) {
		var nameMsgAlpha = translations.social_title_alphabetic;
		$("#errorSocialTitle").html(nameMsgAlpha);
		socialTitle.focus();
		return false;
	}
	else if (socialTitleValue.length < 5) {
		var socialTitleMin = translations.social_title_min;
		$("#errorSocialTitle").html(socialTitleMin);
		socialTitle.focus();
		return false;
	}
	else if (socialTitleValue.length > 99) {
		var socialTitleMax = translations.social_title_max;
		$("#errorSocialTitle").html(socialTitleMax);
		socialTitle.focus();
		return false;
	}
	else {
		$("#errorSocialTitle").html("");
		return true;
	}
}

function socialTextValidate() {
	var socialText = $("#social_text");
	var socialTextValue = socialText.val().trim();

	if (socialTextValue === "") {
		var socialTextReqMsg = translations.social_text_required;
		$("#errorSocialText").html(socialTextReqMsg);
		socialText.focus();
		return false;
	} else if (socialTextValue.length < 5) {
		var socialTextMin = translations.social_text_min;
		$("#errorSocialText").html(socialTextMin);
		socialText.focus();
		return false;
	} else if (socialTextValue.length > 199) {
		var socialTextMax = translations.social_text_max;
		$("#errorSocialText").html(socialTextMax);
		socialText.focus();
		return false;
	} else {
		$("#errorSocialText").html("");
		return true;
	}
}


function facebookValidate() {
	var facebook = $("#facebook");
	var urlRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w.-]*)*\/?$/;
	if (facebook.val() == "") {
		var facebookReq = translations.facebook_required;
		$("#errorFacebook").html(facebookReq);
		facebook.focus();
		return false;
	} else if (!urlRegex.test(facebook.val())) {
		var invalidUrlMsg = translations.facebookInvalidUrl;
		$("#errorFacebook").html(invalidUrlMsg);
		facebook.focus();
		return false;
	} else {
		$("#errorFacebook").html("");
		return true;
	}
}

function twitterValidate() {
	var twitter = $("#twitter");
	var urlRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w.-]*)*\/?$/;
	if (twitter.val() == "") {
		var twitterReq = translations.twitter_required;
		$("#errorTwitter").html(twitterReq);
		twitter.focus();
		return false;
	} else if (!urlRegex.test(twitter.val())) {
		var invalidUrlMsg = translations.twitterInvalidUrl;
		$("#errorTwitter").html(invalidUrlMsg);
		twitter.focus();
		return false;
	} else {
		$("#errorTwitter").html("");
		return true;
	}
}

function linkedinValidate() {
	var linkedin = $("#linkedin");
	var urlRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w.-]*)*\/?$/;
	if (linkedin.val() == "") {
		var linkedinReq = translations.linkedin_required;
		$("#errorLinkedin").html(linkedinReq);
		linkedin.focus();
		return false;
	} else if (!urlRegex.test(linkedin.val())) {
		var invalidUrlMsg = translations.linkedinInvalidUrl;
		$("#errorLinkedin").html(invalidUrlMsg);
		linkedin.focus();
		return false;
	} else {
		$("#errorLinkedin").html("");
		return true;
	}
}

function instagramValidate() {
	var instagram = $("#instagram");
	var urlRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w.-]*)*\/?$/;
	if (instagram.val() == "") {
		var instagramReq = translations.instagram_required;
		$("#errorInstagram").html(instagramReq);
		instagram.focus();
		return false;
	} else if (!urlRegex.test(instagram.val())) {
		var invalidUrlMsg = translations.instagramInvalidUrl;
		$("#errorInstagram").html(invalidUrlMsg);
		instagram.focus();
		return false;
	} else {
		$("#errorInstagram").html("");
		return true;
	}
}
function userEmailValidate() {
	var userEmailVal = $("#changeUserEmail");
	if (userEmailVal.val() === "") {
		var userEmailReqMsg = translations.user_email_required;
		$("#errorUserEventEmail").html(userEmailReqMsg);
		userEmailVal.focus();
		return false;
	} else {
		$("#errorUserEventEmail").html("");
		return true;
	}
}

function newUserEmailValidate() {
	var email_id = $("#loginemail");
	if (email_id.val().trim() == "") {
		var emailRequiredMessage = translations.email_required;
		$("#errorEmail").html(emailRequiredMessage);
		email_id.focus();
		return false;
	} else if (!isEmail(email_id.val())) {
		var emailValid = translations.email_valid;
		$("#errorEmail").html(emailValid);
		email_id.focus();
		return false;
	} else {
		let field_url = $('#field_url').val();
		if (field_url != undefined) {
			let currentEmail = email_id.val();
			checkMail(currentEmail, field_url);
		}
		if ($("#email_exists").val() == 0) {
			$("#errorEmail").html("");
			return true;
		} else {
			return false;
		}
	}
}

function checkMail(email_id, field_url) {
	var check = true;
    var rrr = field_url;
    console.log("<<<>>>", rrr);
	$.ajax({
		type: "POST",
		url: field_url,
		headers: {
			"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
		},
		data: {
			'email': email_id
		},
		success: function (response) {
			if (response.status === false) {
				$("#errorEmail").html("The email has already been taken.");
				$("#email_exists").val("1");
				check = false;
			} else {
				check = true;
				$("#email_exists").val("0");
				$("#errorEmail").html("");
			}
		}
	});
}

function userEmailValidateUnique() {
	var email_id = $("#loginemail");
	if (email_id.val().trim() == "") {
		var emailRequiredMessage = translations.email_required;
		$("#errorEmail").html(emailRequiredMessage);
		email_id.focus();
		return false;
	} else if (!isEmail(email_id.val())) {
		var emailValid = translations.email_valid;
		$("#errorEmail").html(emailValid);
		email_id.focus();
		return false;
	} else {
		let field_url = $('#field_url').val();
		let old_email = $('#old_email').val();
		let id = $('#hiddenId').val();
		if (field_url != undefined) {
			let currentEmail = email_id.val();
			checkUserMail(currentEmail, field_url, old_email,id);
		}
		if ($("#email_exists").val() == 0) {
			$("#errorEmail").html("");
			return true;
		} else {
			return false;
		}
	}
}

function checkUserMail(email_id, field_url, old_email = null,id=null) {
	var check = true;
	$.ajax({
		type: "POST",
		url: field_url,
		headers: {
			"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
		},
		data: {
			'email': email_id,
			'old_email': old_email,
			'id':id
		},
		success: function (data) {
			if (data == "failed") {
				$("#errorEmail").html("The email has already been taken.");
				$("#email_exists").val("1");
				check = false;
			} else if (data == "success") {
				check = true;
				$("#email_exists").val("0");
				$("#errorEmail").html("");
			}
		}
	});
}

$("#add_site_setting").submit(function (event) {
	var validations = [
		registrationsLinkValidate(),
		registrationsTextValidate(),
		buyTicketsNowLinkValidate(),
		buyTicketsNowTextValidate(),
		headingTextValidate(),
		emailValidate(),
		mainHeadingTextValidate(),
		siteNameValidate()
	];
	if (
		validations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		event.preventDefault();
		return false;
	}
});

function siteNameValidate() {
	var siteName = $("#site_name");
	var siteNameValue = siteName.val();
	if (siteNameValue.trim() == "") {
		var siteNameRequiredMessage = translations.siteName_required;
		$("#errorsiteName").html(siteNameRequiredMessage);
		siteName.focus();
		return false;
	} else if (siteNameValue.length < 2) {
		var siteNameMin = translations.siteName_min;
		$("#errorsiteName").html(siteNameMin);
		siteName.focus();
		return false;
	} else if (siteNameValue.length > 99) {
		var siteNameMax = translations.siteName_max;
		$("#errorsiteName").html(siteNameMax);
		siteName.focus();
		return false;
	} else {
		$("#errorsiteName").html("");
		return true;
	}
}

function mainHeadingTextValidate() {
	var mainHeadingText = $("#main_heading_text");
	var mainHeadingTextValue = mainHeadingText.val();
	if (mainHeadingTextValue.trim() == "") {
		var mainHeadingTextRequiredMessage = translations.mainHeadingText_required;
		$("#errormainHeadingText").html(mainHeadingTextRequiredMessage);
		mainHeadingText.focus();
		return false;
	} else if (mainHeadingTextValue.length < 2) {
		var mainHeadingTextMin = translations.mainHeadingText_min;
		$("#errormainHeadingText").html(mainHeadingTextMin);
		mainHeadingText.focus();
		return false;
	} else if (mainHeadingTextValue.length > 199) {
		var mainHeadingTextMax = translations.mainHeadingText_max;
		$("#errormainHeadingText").html(mainHeadingTextMax);
		mainHeadingText.focus();
		return false;
	} else {
		$("#errormainHeadingText").html("");
		return true;
	}
}

function headingTextValidate() {
	var headingText = $("#heading_text");
	var headingTextValue = headingText.val();
	if (headingTextValue.trim() == "") {
		var headingTextRequiredMessage = translations.headingText_required;
		$("#errorHeadingText").html(headingTextRequiredMessage);
		headingText.focus();
		return false;
	} else if (headingTextValue.length < 2) {
		var headingTextMin = translations.headingText_min;
		$("#errorHeadingText").html(headingTextMin);
		headingText.focus();
		return false;
	} else if (headingTextValue.length > 199) {
		var headingTextMax = translations.headingText_max;
		$("#errorHeadingText").html(headingTextMax);
		headingText.focus();
		return false;
	} else {
		$("#errorHeadingText").html("");
		return true;
	}
}

function buyTicketsNowTextValidate() {
	var buyTicketsNowText = $("#buy_tickets_now_text");
	var buyTicketsNowTextValue = buyTicketsNowText.val();
	if (buyTicketsNowTextValue.trim() == "") {
		var buyTicketsNowTextRequiredMessage = translations.buyTicketsNowText_required;
		$("#errorbuyTicketsNowText").html(buyTicketsNowTextRequiredMessage);
		buyTicketsNowText.focus();
		return false;
	} else if (buyTicketsNowTextValue.length < 2) {
		var buyTicketsNowTextMin = translations.buyTicketsNowText_min;
		$("#errorbuyTicketsNowText").html(buyTicketsNowTextMin);
		buyTicketsNowText.focus();
		return false;
	} else if (buyTicketsNowTextValue.length > 99) {
		var buyTicketsNowTextMax = translations.buyTicketsNowText_max;
		$("#errorbuyTicketsNowText").html(buyTicketsNowTextMax);
		buyTicketsNowText.focus();
		return false;
	} else {
		$("#errorbuyTicketsNowText").html("");
		return true;
	}
}

function buyTicketsNowLinkValidate() {
	var buyTicketsNowLink = $("#buy_tickets_now_link");
	var buyTicketsNowLinkValue = buyTicketsNowLink.val();
	var urlRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w.-]*)*\/?$/;

	if (buyTicketsNowLinkValue == "") {
		var buyTicketsNowLinkReq = translations.buyTicketsNowLink_required;
		$("#errorBuyTicketsNowLink").html(buyTicketsNowLinkReq);
		buyTicketsNowLink.focus();
		return false;
	} else if (!urlRegex.test(buyTicketsNowLinkValue)) {
		var invalidUrlMsg = translations.buyTicketsNowLinkinvalidUrl;
		$("#errorBuyTicketsNowLink").html(invalidUrlMsg);
		buyTicketsNowLink.focus();
		return false;
	} else {
		$("#errorBuyTicketsNowLink").html("");
		return true;
	}
}

function registrationsTextValidate() {
	var registrationsText = $("#registrations_text");
	var registrationsTextValue = registrationsText.val();
	if (registrationsTextValue.trim() == "") {
		var registrationsTextRequiredMessage = translations.registrationsText_required;
		$("#errorRegistrationsText").html(registrationsTextRequiredMessage);
		registrationsText.focus();
		return false;
	} else if (registrationsTextValue.length < 2) {
		var registrationsTextMin = translations.registrationsText_min;
		$("#errorRegistrationsText").html(registrationsTextMin);
		registrationsText.focus();
		return false;
	} else if (registrationsTextValue.length > 99) {
		var registrationsTextMax = translations.registrationsText_max;
		$("#errorRegistrationsText").html(registrationsTextMax);
		registrationsText.focus();
		return false;
	} else {
		$("#errorRegistrationsText").html("");
		return true;
	}
}

function buyTicketsNowLinkValidate() {
	var buyTicketsNowLink = $("#buy_tickets_now_link");
	var buyTicketsNowLinkValue = buyTicketsNowLink.val();
	var urlRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w.-]*)*\/?$/;

	if (buyTicketsNowLinkValue == "") {
		var buyTicketsNowLinkReq = translations.buyTicketsNowLink_required;
		$("#errorBuyTicketsNowLink").html(buyTicketsNowLinkReq);
		buyTicketsNowLink.focus();
		return false;
	} else if (!urlRegex.test(buyTicketsNowLinkValue)) {
		var invalidUrlMsg = translations.buyTicketsNowLinkinvalidUrl;
		$("#errorBuyTicketsNowLink").html(invalidUrlMsg);
		buyTicketsNowLink.focus();
		return false;
	} else {
		$("#errorBuyTicketsNowLink").html("");
		return true;
	}
}

function registrationsLinkValidate() {
	var registrationsLink = $("#registrations_link");
	var registrationsLinkValue = registrationsLink.val();
	var urlRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w.-]*)*\/?$/;

	if (registrationsLinkValue == "") {
		var registrationsLinkReq = translations.registrationsLink_required;
		$("#errorRegistrationsLink").html(registrationsLinkReq);
		registrationsLink.focus();
		return false;
	} else if (!urlRegex.test(registrationsLinkValue)) {
		var invalidUrlMsg = translations.registrationsLinkinvalidUrl;
		$("#errorRegistrationsLink").html(invalidUrlMsg);
		registrationsLink.focus();
		return false;
	} else {
		$("#errorRegistrationsLink").html("");
		return true;
	}
}

$("#add_youtube_video_validation").submit(function () {
	var allValidations = [
		linkValidate(),
		eventValidate(),
	];
	if (allValidations.every(function (isValid) {
		return isValid;
	})) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

function linkValidate() {
	var linkValue = $("#link");
	var linkRegex = /^(https?:\/\/)?(www\.)?youtube\.com\/embed\/[\w-]+\??[\w=&-]*$/;
	if (linkValue.val() == "") {
		var linkRequiredMessage = translations.link_required;
		$("#errorLink").html(linkRequiredMessage);
		linkValue.focus();
		return false;
	} else if (!linkRegex.test(linkValue.val())) {
		var invalidlinkMsg = translations.linkinvalidUrl;
		$("#errorLink").html(invalidlinkMsg);
		linkValue.focus();
		return false;
	} else {
		$("#errorLink").html("");
		return true;
	}
}

// function onlySvgImg(id, error, min_height, min_width) {
// 	var fuDataSvg = $("#" + id);
// 	var FileUploadPathSvg = fuDataSvg.val();
// 	var old_imgUrlSvg = $("#" + id + "_imgUrl").val();
// 	var readerSvg = new FileReader();
// 	// Check if min_height and min_width are undefined, and if so, assign them default values
// 	min_height = typeof min_height !== 'undefined' ? min_height : null;
// 	min_width = typeof min_width !== 'undefined' ? min_width : null;

// 	if (FileUploadPathSvg == "") {
// 		$("#" + error).html("Please upload an image");
// 		$("#" + id + "_preview").attr("src", old_imgUrlSvg);
// 		fuDataSvg.focus();
// 		return false;
// 	} else {
// 		if (FileUploadPathSvg == undefined) {
// 			return true;
// 		}
// 		var Extension = FileUploadPathSvg.substring(
// 			FileUploadPathSvg.lastIndexOf(".") + 1
// 		).toLowerCase();
// 		if (Extension == "svg") {
// 			if (fuDataSvg[0].files[0].size > 2 * 1024 * 1024) {
// 				$("#" + error).html("Image size should be less than 2 MB.");
// 				fuDataSvg.val("");
// 				$("#" + id + "_preview").attr("src", old_imgUrlSvg);
// 				fuDataSvg.focus();
// 				return false;
// 			}
// 			if (min_height !== null && min_width !== null) {
// 				var img = new Image();
// 				img.src = window.URL.createObjectURL(fuDataSvg[0].files[0]);
// 				img.onload = function () {
// 					var height = this.height;
// 					var width = this.width;
// 					if (height < min_height || width < min_width) {
// 						$("#" + error).html("Image dimensions should be at least " + min_width + "x" + min_height + " pixels.");
// 						fuDataSvg.val("");
// 						$("#" + id + "_preview").attr("src", old_imgUrlSvg);
// 						fuDataSvg.focus();
// 						return false;
// 					} else {
// 						$("#" + error).html("");
// 						readerSvg.onload = function (event) {
// 							$("#" + id + "_preview").attr("src", event.target.result);
// 						};
// 						readerSvg.readAsDataURL(fuDataSvg[0].files[0]);
// 						return true;
// 					}
// 				};
// 			} else {
// 				$("#" + error).html("");
// 				readerSvg.onload = function (event) {
// 					$("#" + id + "_preview").attr("src", event.target.result);
// 				};
// 				readerSvg.readAsDataURL(fuDataSvg[0].files[0]);
// 				return true;
// 			}
// 		} else {
// 			$("#" + error).html("Image only allows file types of SVG.");
// 			fuDataSvg.val("");
// 			$("#" + id + "_preview").attr("src", old_imgUrlSvg);
// 			fuDataSvg.focus();
// 			return false;
// 		}
// 	}
// }

$("#add_chatbot_qa_validation").submit(function () {
	var allValidations = [
		answerValidate(),
		questionsValidate()
	];
	if (allValidations.every(function (isValid) {
		return isValid;
	})) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

function questionsValidate() {
	var questions = $("#questions");
	var questionsValue = questions.val();
	if (questionsValue.trim() == "") {
		var questionsReq = translations.questions_required;
		$("#errorQuestion").html(questionsReq);
		questions.focus();
		return false;
	} else {
		$("#errorQuestion").html("");
		return true;
	}
}

function answerValidate() {
	var answer = $("#answer");
	var answerValue = answer.val();
	if (answerValue.trim() == "") {
		var answerReq = translations.answer_required;
		$("#errorAnswer").html(answerReq);
		answer.focus();
		return false;
	} else {
		$("#errorAnswer").html("");
		return true;
	}
}

$("#add_potential_partner_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	let validation = true;
	if (hiddenId.val().trim() == "") {
		validation = ValidateImage("image", "errorImage");
	}
	var fileInput = document.getElementById("image");
	if (fileInput.files.length > 0) {
		validation = ValidateImage("image", "errorImage");
	}
	var allValidations = [
		potentialDescriptionValidate(),
		validation,
		buttonLinkValidate(),
		buttonTitleValidate(),
		potentialTitleContentValidate(),
		potentialHeadingValidate()
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});

function potentialHeadingValidate() {
	var heading = CKEDITOR.instances['heading'];
	var headingValue = heading.getData();
	if (headingValue.trim() === "") {
		var headingReq = translations.heading_required;
		$("#errorHeading").html(headingReq);
		heading.focus();
		return false;
	}
	else {
		$("#errorHeading").html("");
		return true;
	}
}

function potentialTitleContentValidate() {
	var title_content = CKEDITOR.instances['title_content'];
	var title_contentValue = title_content.getData();
	if (title_contentValue.trim() === "") {
		var title_contentReq = translations.title_required;
		$("#errorTitleContent").html(title_contentReq);
		title_content.focus();
		return false;
	} else {
		$("#errorTitleContent").html("");
		return true;
	}
}

function potentialDescriptionValidate() {
	var description = CKEDITOR.instances['description'];
	var descriptionValue = description.getData();
	if (descriptionValue.trim() === "") {
		var descriptionReq = translations.description_required;
		$("#errorDescription").html(descriptionReq);
		description.focus();
		return false;
	} else {
		$("#errorDescription").html("");
		return true;
	}
}

$("#add_visitor_profiles_first_half_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	let validationMain = true;

	if (hiddenId.val().trim() == "") {
		validationMain = ValidateImage("image", "errorImage");
	}
	var fileInput = document.getElementById("image");
	if (fileInput.files.length > 0) {
		validationMain = ValidateImage("image", "errorImage");
	}
	var allValidations = [
		headingValidate(),
		validationMain
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});


$("#add_sponsorship_opportunities_validation").submit(function () {
	var hiddenId = $("#hiddenId");

	let validationImage1SponsorshipOpportunity = true;
	if (hiddenId.val().trim() == "") {
		validationImage1SponsorshipOpportunity = ValidateImage("image_1", "errorImage1");
	}
	var fileInput = document.getElementById("image_1");
	if (fileInput.files.length > 0) {
		validationImage1SponsorshipOpportunity = ValidateImage("image_1", "errorImage1");
	}

	var allValidations = [
		sponsorshipOpportunitiesTitleValidate(),
		sponsorshipOpportunitiesContent1Validate(),
		sponsorshipOpportunitiesTableContentValidate(),
		validationImage1SponsorshipOpportunity,
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});


function sponsorshipOpportunitiesTitleValidate() {
	var editor = CKEDITOR.instances['title'];
	var titleContent = editor.getData().replace(/<[^>]*>/g, '').trim();
	if (titleContent === "") {
		var titleRequiredMessage = translations.title_required;
		$("#errorTitle").html(titleRequiredMessage);
		editor.focus();
		return false;
	} else if (titleContent.length > 999) {
		var titleMin = translations.title_max_length;
		$("#errorTitle").html(titleMin);
		editor.focus();
		return false;
	} else {
		$("#errorTitle").html("");
		return true;
	}
}

function sponsorshipOpportunitiesContent1Validate() {
	var editor = CKEDITOR.instances['content_1'];
	var content1Content = editor.getData().replace(/<[^>]*>/g, '').trim();
	if (content1Content === "") {
		var content1RequiredMessage = translations.content_1_required;
		$("#errorContent1").html(content1RequiredMessage);
		editor.focus();
		return false;
	} else {
		$("#errorContent1").html("");
		return true;
	}
}

function sponsorshipOpportunitiesTableContentValidate() {
	var editor = CKEDITOR.instances['table_content'];
	var tableContent = editor.getData().replace(/<[^>]*>/g, '').trim();
	if (tableContent === "") {
		var tableContentRequiredMessage = translations.table_content_required;
		$("#errorTableContent").html(tableContentRequiredMessage);
		editor.focus();
		return false;
	} else {
		$("#errorTableContent").html("");
		return true;
	}
}

$("#add_advertise_with_us_validation").submit(function () {
	var hiddenId = $("#hiddenId");
	// image
	let validationImage = true;

	if (hiddenId.val().trim() == "") {
		validationImage = ValidateImage("images", "errorImage_1");
	}
	var fileInput = document.getElementById("images");
	if (fileInput.files.length > 0) {
		validationImage = ValidateImage("images", "errorImage_1");
	}
	// image 1
	let validationImage_1 = true;
	if (hiddenId.val().trim() == "") {
		validationImage_1 = ValidateImage("image_1", "errorImage1");
	}
	var fileInput = document.getElementById("image_1");
	if (fileInput.files.length > 0) {
		validationImage_1 = ValidateImage("image_1", "errorImage1");
	}
	var allValidations = [
		validationImage_1,
		advertiseWithUsContent_1Validate(),
		title_2Validate(),
		validationImage,
		title_1Validate()
	];
	if (
		allValidations.every(function (isValid) {
			return isValid;
		})
	) {
		startLoader();
		return true;
	} else {
		return false;
	}
});


function faqsModuleValidate() {
	var module = $("#module");
	if (module.val() === "") {
		var moduleRequiredMessage = translations.module_required;
		$("#errorModule").html(moduleRequiredMessage);
		return false;
	} else {
		$("#errorModule").html("");
		return true;
	}
}
