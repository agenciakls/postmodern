var Upload = function (file) {
    this.file = file;
};

Upload.prototype.getType = function() {
    return this.file.type;
};
Upload.prototype.getSize = function() {
    return this.file.size;
};
Upload.prototype.getName = function() {
    return this.file.name;
};
Upload.prototype.doUpload = function () {
    var that = this;
    var formData = new FormData();

    // add assoc key values, this will be posts values
    formData.append("file", this.file, this.getName());
    formData.append("upload_file", true);
	var idPedido = $("#get-id-pedido").val();
	var idCliente = $("#get-id-cliente").val();
	formData.append("id", idPedido);
	formData.append("id_cliente", idCliente);
    $.ajax({
        type: "POST",
        url: window.basePrincipal + "script/admin_enviar_arquivos/",
        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                myXhr.upload.addEventListener('progress', that.progressHandling, false);
            }
            return myXhr;
        },
        success: function (data) {
			listarArquivos();
            console.log(data);
			$("#progress-wrp .progress-bar").css("width", "0%");
			$(".mb-send").html('0'); $(".mb-total").html('0');
        },
        error: function (error) {
            $("#progress-wrp .progress-bar").css("width", "0%");
			$(".mb-send").html('0'); $(".mb-total").html('0');
        },
        async: true,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        timeout: 6000000000
    });
};

Upload.prototype.progressHandling = function (event) {
    var percent = 0;
    var position = event.loaded || event.position;
    var total = event.total;
    var progress_bar_id = "#progress-wrp";
    if (event.lengthComputable) {
        percent = Math.ceil(position / total * 100);
    }
    // update progressbars classes so it fits your code
    $(progress_bar_id + " .progress-bar").css("width", +percent + "%");
	positionMb = position / 1024 / 1024;
	totalMb = total / 1024 / 1024;
	$(".mb-send").html(positionMb.toFixed(2) + 'mb');
	$(".mb-total").html(totalMb.toFixed(2) + 'mb');
    // $(progress_bar_id + " .status").text(percent + "%");
};
	//Change id to your id
$("#send-file").on("click", function (e) {
    var file = $("#file-audio")[0].files[0];
	if (file != null) {
		var upload = new Upload(file);
		upload.doUpload();
		
	}
});
var listarArquivos = function () {
	var pedidoAtual = $("#pedido-atual").val();
	$.post(window.basePrincipal + 'script/admin_listar_arquivos/', {
		id: pedidoAtual
	}, function (retornoLista){
		$("#lista-arquivos").html(retornoLista);
		$("#file-audio").val('');
	});
}
listarArquivos();

$("#get-pedido-pagamento").on('change', function () {
	var pedidoAtual = $("#pedido-atual").val();
	$("#get-pedido-pagamento option:selected").each(function() {
		var valorAtual = $( this ).val();
		$.post(window.basePrincipal + 'script/admin_select_status/', {
			id: pedidoAtual,
			status: valorAtual,
			action: 'pagamento_status'
		}, function (retornoStatus){
			console.log(retornoStatus);
		});
	});
});
$("#get-pedido-situacao").on('change', function () {
	var pedidoAtual = $("#pedido-atual").val();
	$("#get-pedido-situacao option:selected").each(function() {
		var valorAtual = $( this ).val();
		$.post(window.basePrincipal + 'script/admin_select_status/', {
			id: pedidoAtual,
			status: valorAtual,
			action: 'situacao'
		}, function (retornoStatus){
			console.log(retornoStatus);
		});
	});
});


/* ALTERAR DESCRIÇÃO */
var setDescription = function (text, buttonText, action = 'mostrar') {
	if (action == 'mostrar') { var returnDescription = '<div class="card"><div class="card-body">' + text + '</div></div><button type="button" id="edit-informacao" onClick="editDescription()" class="btn btn-primary btn-sm">' + buttonText + '</button>'; }
	else if (action == 'editar') { var returnDescription = '<textarea name="content-informacao" class="form-control" id="content-informacao" cols="30" rows="10">' + text + '</textarea><br /> <button type="button" id="edit-informacao" onClick="updateDescription()" class="btn btn-primary btn-sm">' + buttonText + '</button>'; }
	$("#descricao-pedido").html(returnDescription);
}


var listDescription = function () {
	var pedidoAtual = $("#pedido-atual").val();
	var retornoDados = $.post(window.basePrincipal + 'script/listarinformacoes/', {
		id: pedidoAtual
	}, function (retornoLista) {
		if (retornoLista == 'none') { setDescription('<small>Adicione uma informação</small>', 'Adicionar Informação'); }
		else { setDescription(retornoLista, 'Alterar Informação'); }
	});
}
listDescription();

var editDescription = function () {
	var pedidoAtual = $("#pedido-atual").val();
	var retornoDados = $.post(window.basePrincipal + 'script/listarinformacoes/', {
		id: pedidoAtual
	}, function (dadosDescription) {
		if (dadosDescription == 'none') { setDescription('', 'Salvar', action = 'editar'); }
		else { setDescription(dadosDescription, 'Salvar', action = 'editar'); }
	});
}

var updateDescription = function () {
	var contentDescription = $("#content-informacao").val();
	var pedidoAtual = $("#pedido-atual").val();
	$.post(window.basePrincipal + 'script/salvarinformacoes/', {
		id: pedidoAtual,
		informacoes: contentDescription
	}, function (retornoLista){
		if (retornoDescription = 'salvo') {
			var retornoDados = $.post(window.basePrincipal + 'script/listarinformacoes/', {
				id: pedidoAtual
			}, function (retornoLista) {
				if (retornoLista == 'none') { setDescription('<small>Adicione uma informação</small>', 'Adicionar Informação'); }
				else { setDescription(retornoLista, 'Alterar Informação'); }
			});
		}
	});
}