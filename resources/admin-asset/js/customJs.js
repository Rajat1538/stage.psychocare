
$(document).ready(function () {
	setTimeout(function () {
		$(".alert-success").hide()
	}, 10000);

	setTimeout(function () {
		$(".alert-danger").hide()
	}, 10000);

	$("#checkAll").change(function () {
		$("input[name='checkaction[]']").prop('checked', $(this).prop("checked"));
		if ($(this).prop("checked") == true) {
			$("#showmultiaction").show();
		} else if ($("input[name='checkaction[]']").prop("checked") == true) {
			$("#showmultiaction").show();
		} else {
			$("#showmultiaction").hide();
		}

	});



	$(".changeStatus").click(function () {
		if ($('#status').val() == 1) {
			$('#status').val(0);
		} else {
			$('#status').val(1);
		}
	});
	$('#viewEmailLog').on('show.bs.modal', function (e) {
		var rowid = $(e.relatedTarget).data('id');

		$.ajax({
			type: 'GET',
			url: base_url + "/admin/email/log/view/" + rowid,
			success: function (data) {
				$('#putEmailViewFormat').html(data);
			}
			// , beforeSend: function () {
			//     $("#addRepresentiveLoader").removeClass('hide');
			// },
			// complete: function () {
			//     $("#addRepresentiveLoader").addClass('hide');
			// },
			// error: function () {
			//     $("#addRepresentiveLoader").addClass('hide');
			//     $("#ajaxErrorMsg").removeClass('hide');
			// }
		});


	});


	/*$("#txtsearchable").keypress(function () {
		var keyword = $('#txtsearchable').val();
		var showPerRecode = $('#showPerRecode').val();
		var url = $("#site_redirect").val();        
	  
		if (keyword.length >= 0) {
			$.ajax({
				type: "POST",
				url: base_url + url,
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, //Add this <-----
				data: {
					keyword: keyword,
					showPerRecode: showPerRecode,
					ajaxLoad: 1
				},
				success: function (data) {
					$('#logTable').html(data);
				}
			});
		}
	});*/

	$("#txtsearchable").keyup(function () {
		// alert('dd');
		// return false;
		var keyword = $('#txtsearchable').val();
		var showPerRecode = $('#showPerRecode').val();
		var url = $("#site_redirect").val();

		var dataObj = {
			keyword: keyword,
			showPerRecode: showPerRecode,
			ajaxLoad: 1
		}

		if($("#select-search").length > 0) {
			dataObj.storeId = $('#select-search').val();
		}

		if($("#changeStoreName").length > 0) {
			dataObj.addressId = $('#changeStoreName').val();
		}

		if ($("#searchType").length > 0) {
			dataObj.searchType = $( "#searchType option:selected" ).val();
		}

		if (keyword.length >= 0) {
			$.ajax({
				type: "POST",
				url: base_url + url,
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, //Add this <-----
				data: dataObj,
				success: function (data) {
					$('#logTable').html(data);
				}
			});
		}
	});

	$("#showPerRecode, #searchType").change(function () {
		var keyword = $('#txtsearchable').val();
		var showPerRecode = $("#showPerRecode").val();
		var url = $("#site_redirect").val();

		var dataObj = {
			keyword: keyword,
			showPerRecode: showPerRecode,
			ajaxLoad: 1
		};
			
		if($("#select-search").length > 0) {
			dataObj.storeId = $('#select-search').val();
		}

		if($("#changeStoreName").length > 0) {
			dataObj.addressId = $('#changeStoreName').val();
		}

		if ($("#searchType").length > 0) {
			dataObj.searchType = $( "#searchType option:selected" ).val();
		}

		$.ajax({
			type: "POST",
			url: base_url + url,
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, //Add this <-----
			data: dataObj,
			success: function (data) {
				$('#logTable').html(data);
			}
		});

	});

	// All Product
	// $("#txtsearchableProduct").keypress(function () {
	// 	var keyword = $('#txtsearchableProduct').val();
	// 	var showPerRecodeProduct = $('#showPerRecodeProduct').val();
	// 	var changeBrand = $('#select-search').val();
	// 	var changeStoreName =  $('#changeStoreName').val();
	// 	var url = $("#site_redirect").val();        
	  
	// 	if (keyword.length >= 0) {
	// 		$.ajax({
	// 			type: "POST",
	// 			dataType: "html",
	// 			url: base_url + url,
	// 			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, //Add this <-----
	// 			data: {
	// 				keyword: keyword,
	// 				showPerRecodeProduct: showPerRecodeProduct,
	// 				changeBrand: changeBrand,
	// 				changeStoreName: changeStoreName,
	// 				ajaxLoad: 1,
	// 				is_product: 1
	// 			},
	// 			success: function (data) {
	// 				$('#logTable').html(data);
	// 			}
	// 		});
	// 	}
	// });
	// $("#txtsearchableProduct").keyup(function () {
	// 	var keyword = $('#txtsearchableProduct').val();
	// 	var showPerRecodeProduct = $('#showPerRecodeProduct').val();
	// 	var changeBrand = $('#select-search').val();
	// 	var changeStoreName =  $('#changeStoreName').val();
	// 	var url = $("#site_redirect").val();

	// 	if (keyword.length >= 0) {
	// 		$.ajax({
	// 			type: "POST",
	// 			dataType: "html",
	// 			url: base_url + url,
	// 			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, //Add this <-----
	// 			data: {
	// 				keyword: keyword,
	// 				showPerRecodeProduct: showPerRecodeProduct,
	// 				changeBrand: changeBrand,
	// 				changeStoreName: changeStoreName,
	// 				ajaxLoad: 1,
	// 				is_product: 1
	// 			},
	// 			success: function (data) {
	// 				$('#logTable').html(data);
	// 			}
	// 		});
	// 	}
	// });
	// $("#showPerRecodeProduct").change(function () {
	// 	var keyword = $('#txtsearchableProduct').val();
	// 	var changeBrand = $('#select-search').val();
	// 	var changeStoreName =  $('#changeStoreName').val();
	// 	var showPerRecodeProduct = $(this).val();
	// 	var url = $("#site_redirect").val();
	// 	$.ajax({
	// 		type: "POST",
	// 		dataType: "html",
	// 		url: base_url + url,
	// 		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, //Add this <-----
	// 		data: {
	// 			keyword: keyword,
	// 			showPerRecodeProduct: showPerRecodeProduct,
	// 			changeBrand: changeBrand,
	// 			changeStoreName: changeStoreName,
	// 			ajaxLoad: 1,
	// 			is_product: 1
	// 		},
	// 		success: function (data) {
	// 			$('#logTable').html(data);
	// 		}
	// 	});
	// });

	// $(".change").change(function () {
	// 	var keyword = $('#txtsearchableProduct').val();
	// 	var showPerRecodeProduct = $('#showPerRecodeProduct').val();
	// 	var changeStoreName =  $('#changeStoreName').val();
	// 	var changeBrand = $(this).val();
	// 	var url = $("#site_redirect_product").val();
	// 	$.ajax({
	// 		type: "POST",
	// 		dataType: "html",
	// 		url: base_url + url,
	// 		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, //Add this <-----
	// 		data: {
	// 			keyword: keyword,
	// 			showPerRecodeProduct: showPerRecodeProduct,
	// 			changeBrand: changeBrand,
	// 			changeStoreName: changeStoreName,
	// 			ajaxLoad: 1,
	// 			is_product: 1
	// 		},
	// 		success: function (data) {
	// 			$('#change_store').replaceWith(data);
	// 		}
	// 	});
	// });

	$('input[type=password]').keypress(function (e) {
		if (e.which === 32)
			return false;
	});

	$(".toggle-password2").click(function () {
		$(this).toggleClass("fa-eye-slash fa-eye");
		var input = $($(this).attr("toggle"));
		if ($('#password-field').attr("type") == "password") {
			$('#password-field').attr("type", "text");
		} else {
			$('#password-field').attr("type", "password");
		}
	});
});

function onclickcheck(id) {
	var a = $("input[name='checkaction[]']");
	if (a.filter(":checked").length > 0) {
		$("#showmultiaction").show();
	} else {
		$("#showmultiaction").hide();
	}
}

$(document).on('click','.sidebar-toggle',function(e) {
	e.preventDefault();
	if($('.sidebar').hasClass("collapsed") == false) {
		$('#overlay_div').addClass('overlay');
	} else {
		$('#overlay_div').removeClass('overlay');
	}
});

/*$.fn.dataTable.ext.order['dom-checkbox'] = function  ( settings, col )
{
	return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
		return $('input', td).prop('checked') ? '1' : '0';
	} );
};*/

$(document).on('keypress','.without_space',function(e) {
	if(e.which === 32) 
		return false;
});

//create password show hide
if($('#togglePassword').length){
	const togglePassword = document.querySelector('#togglePassword');
	const password = document.querySelector('#password');
	togglePassword.addEventListener('click', function (e) {
		const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
		password.setAttribute('type', type);
	});
}

//confirm password show hide
if($('#confirmtogglePassword').length){
	const togglePassword = document.querySelector('#confirmtogglePassword');
	const password = document.querySelector('#c_password');
	togglePassword.addEventListener('click', function (e) {
		const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
		password.setAttribute('type', type);
	});
}
