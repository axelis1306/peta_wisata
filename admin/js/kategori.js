$(document).ready(function(){

	var productList;

	function getKategori(){
		$.ajax({
			url : '../admin/classes/Kategori.php',
			method : 'POST',
			data : {GET_PRODUCT:1},
			success : function(response){
				//console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var productHTML = '';

					productList = resp.message.kategori;

					if (productList) {
						$.each(resp.message.kategori, function(index, value){

							productHTML += '<tr>'+
								              '<td>'+value.kat_id+'</td>'+
								              '<td>'+ value.kat_judul +'</td>'+
								              '<td>'+ value.kat_isi +'</td>'+
								              '<td><img width="60" height="60" src="../img/'+value.kat_ikon+'"></td>'+
								              
								              '<td><a class="btn btn-sm btn-info edit-product" style="color:#fff;"><span style="display:none;">'+JSON.stringify(value)+'</span><i class="fas fa-pencil-alt"></i></a>&nbsp;<a pid="'+value.kat_id+'" class="btn btn-sm btn-danger delete-product" style="color:#fff;"><i class="fas fa-trash-alt"></i></a></td>'+
								            '</tr>';

						});

						$("#product_list").html(productHTML);
					}

					


					

				}
			}

		});
	}

	getKategori();

	$(".add-product").on("click", function(){

		$.ajax({

			url : '../admin/classes/Kategori.php',
			method : 'POST',
			data : new FormData($("#add-product-form")[0]),
			contentType : false,
			cache : false,
			processData : false,
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#add-product-form").trigger("reset");
					$("#add_product_modal").modal('hide');
					getKategori();
					alert(resp.message);
				}else if(resp.status == 303){
					alert(resp.message);
				}
			}

		});

	});




	$(document.body).on('click', '.edit-product', function(){

		console.log($(this).find('span').text());

		var product = $.parseJSON($.trim($(this).find('span').text()));

		console.log(product);

		$("input[name='e_kat_judul']").val(product.kat_judul);
		
		
		$("textarea[name='e_kat_isi']").val(product.kat_isi);
		
		
		
		
		
		$("input[name='e_kat_ikon']").siblings("img").attr("src", "../img/"+product.kat_ikon);
		$("input[name='pid']").val(product.kat_id);
		$("#edit_product_modal").modal('show');

	});

	$(".submit-edit-product").on('click', function(){

		$.ajax({

			url : '../admin/classes/Kategori.php',
			method : 'POST',
			data : new FormData($("#edit-product-form")[0]),
			contentType : false,
			cache : false,
			processData : false,
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#edit-product-form").trigger("reset");
					$("#edit_product_modal").modal('hide');
					getKategori();
					alert(resp.message);
				}else if(resp.status == 303){
					alert(resp.message);
				}
			}

		});


	});

	$(document.body).on('click', '.delete-product', function(){

		var pid = $(this).attr('pid');
		if (confirm("Are you sure to delete this item ?")) {
			$.ajax({

				url : '../admin/classes/Kategori.php',
				method : 'POST',
				data : {DELETE_PRODUCT: 1, pid:pid},
				success : function(response){
					console.log(response);
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						getKategori();
					}else if (resp.status == 303) {
						alert(resp.message);
					}
				}

			});
		}else{
			alert('Cancelled');
		}
		

	});

});