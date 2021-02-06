// JavaScript Document
$(document).ready(function() {
	if (!jQuery().ajaxForm)
		return;
	if($("form.form_ajax").length){
		$("form.form_ajax").on('submit', function(e){
			e.preventDefault();
			var form = $(this);
			form.ajaxSubmit({
				type: 'POST',
				dataType: 'json',
				success: function(json){
					if (json.status != 0) {
						window.location = json.redirecionar;
					}else{
						alert(json.msg);
					}
				}
			});
		});
	}
});
// JavaScript Document
$(document).ready(function() {
	$("form .addPhone").on('click', function(e){
		e.preventDefault();
		var html = '<div class="linha telefone"><label>Telefone:<input type="tel" name="phone[]"></label><span class="botao remover menor">Excluir</span></div>';
		$('form .lista').append(html);

		reload();
	});

	reload();	
});

function reload() {
	$('form input[type="tel"]').inputmask({
		mask: ["(99) 9999-9999", "(99) 99999-9999"],
		keepStatic: true
	});

	$("form .remover").on('click', function(e){
		e.preventDefault();
		$(this).parent().remove();
	});
}

function deletar(btn, id) {
	var idContact = id;
	var name=confirm("Tem certeza que deseja excluir?")
	if (name==true)
	{
		var form = $(this);
		form.ajaxSubmit({
			type: 'POST',
			dataType: 'json',
			url: 'delete',
			data: {idContact : idContact},
			success: function(json){
				if (json.status != 0) {
					window.location = json.redirecionar;
				}else{
					alert(json.msg);
				}
			}
		});
	}
	else
	{
		return;
	}
}