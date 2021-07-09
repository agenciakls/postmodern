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
        },
        error: function (error) {
            // handle error
        },
        async: true,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        timeout: 60000
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
//    $(progress_bar_id + " .status").text(percent + "%");
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