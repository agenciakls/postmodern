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
	var progress_bar_id = "#progress-wrp";
    var that = this;
    var formData = new FormData();

    // add assoc key values, this will be posts values
    formData.append("file", this.file, this.getName());
    formData.append("upload_file", true);
	var idPedido = $("#get-id-pedido").val();
	formData.append("id", idPedido);
    var ajaxPedido = $.ajax({
        type: "POST",
        url: window.basePrincipal + "script/fileclientes/",
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
			$(progress_bar_id + " .progress-bar").css("width", "0%");
			if (data == 'salvo') { alert('arquivo salvo com sucesso.'); }
			else { alert('Houve um erro ao enviar o arquivo'); }
			$(".mb-send").html('0'); $(".mb-total").html('0');
			$("#abort-button").fadeOut(0);
        },
        error: function (error) {
			console.log(error);
			$(progress_bar_id + " .progress-bar").css("width", "0%");
			alert('Houve um erro ao enviar o arquivo');
			$(".mb-send").html('0'); $(".mb-total").html('0');
			$("#abort-button").fadeOut(0);
		},
        async: true,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
		timeout: 6000000000,
		maxRequestLength: 3000000
	});
	ajaxPedido;
	$("#abort-button").on("click", function () {
		ajaxPedido.abort();
	});
};
$("#abort-button").fadeOut(0);

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
//    $(progress_bar_id + " .status").text(percent + "%");
};
	//Change id to your id
$("#send-file").on("click", function (e) {
	$("#abort-button").fadeIn(0);
    var file = $("#file-audio")[0].files[0];
	if (file != null) {
		var upload = new Upload(file);
		upload.doUpload();
		
	}
});
var listarArquivos = function () {
	var pedidoAtual = $("#pedido-atual").val();
	$.post(window.basePrincipal + 'script/fileclienteslistar/', {
		id: pedidoAtual
	}, function (retornoLista){
		$("#lista-arquivos").html(retornoLista);
		$("#file-audio").val('');
	});
}
listarArquivos();

/* ALTERAR DESCRI????O */
var setDescription = function (text, buttonText, action = 'mostrar') {
	if (action == 'mostrar') { var returnDescription = '<div class="card"><div class="card-body">' + text + '</div></div><button type="button" id="edit-description" onClick="editDescription()" class="btn-post right">' + buttonText + '</button>'; }
	else if (action == 'editar') { var returnDescription = '<textarea name="content-description" class="form-control" id="content-description" cols="30" rows="10">' + text + '</textarea><br /><button type="button" id="edit-description" onClick="updateDescription()" class="btn-post right">' + buttonText + '</button>'; }
	$("#descricao-pedido").html(returnDescription);
}


var listDescription = function () {
	var pedidoAtual = $("#pedido-atual").val();
	var retornoDados = $.post(window.basePrincipal + 'script/listardescricao/', {
		id: pedidoAtual
	}, function (retornoLista) {
		if (retornoLista == 'none') { setDescription('<small>Adicione uma descri????o</small>', 'Adicionar Descri????o'); }
		else { setDescription(retornoLista, 'Alterar Descri????o'); }
	});
}
listDescription();

var editDescription = function () {
	var pedidoAtual = $("#pedido-atual").val();
	var retornoDados = $.post(window.basePrincipal + 'script/listardescricao/', {
		id: pedidoAtual
	}, function (dadosDescription) {
		if (dadosDescription == 'none') { setDescription('', 'Salvar', action = 'editar'); }
		else { setDescription(dadosDescription, 'Salvar', action = 'editar'); }
	});
}

var updateDescription = function () {
	var contentDescription = $("#content-description").val();
	var pedidoAtual = $("#pedido-atual").val();
	$.post(window.basePrincipal + 'script/salvardescricao/', {
		id: pedidoAtual,
		descricao: contentDescription
	}, function (retornoLista){
		if (retornoDescription = 'salvo') {
			var retornoDados = $.post(window.basePrincipal + 'script/listardescricao/', {
				id: pedidoAtual
			}, function (retornoLista) {
				if (retornoLista == 'none') { setDescription('<small>Adicione uma descri????o</small>', 'Adicionar Descri????o'); }
				else { setDescription(retornoLista, 'Alterar Descri????o'); }
			});
		}
	});
}