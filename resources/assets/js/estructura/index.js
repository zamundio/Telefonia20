$(document).ready(function() {


    var $cod = null;
    var isTreeOpen = true;
    $("#shollallnodes").on("click", function() {

        if (isTreeOpen) {
            $("#tree-container").jstree('close_all');
            document.getElementById('shollallnodes').innerHTML = "Abrir";
        } else {
            $("#tree-container").jstree('open_all');
            document.getElementById('shollallnodes').innerHTML = "Cerrar";
        }
        isTreeOpen = !isTreeOpen;
    });

    $("#formdatos").toggle(true);

    $('#tree-container').slimScroll({
        height: '640px',
    })

    //plugins para la busqueda en el arbol
    $('#tree-container').jstree({

        plugins: ['search', 'changed', 'state'],
        'state': {
            'key': 'id',
            'events': 'activate_node.jstree',
            'opened': true,
        },
        search: {
            "case_insensitive": true,
            "show_only_matches": true
        },
        'core': {
            'data': {
                type: "get",
                url: load_urlTree,
                contentType: "json",
                success: function(data) {
                    data.d;
                    $(data).each(function() {
                        return {
                            "id": this.id
                        };
                    });
                }
            },


        }



    })


});


$("#tree-container").on("click.jstree", function(e, data) {
    event.preventDefault();
    $CurrentNode = $("#tree-container").jstree("get_selected");



    //recupera la informacion de la ficha del delegado

    $cod = $CurrentNode[0];

    $.ajax({
        url: "ajaxGetNodeInfoStructTree",
        type: "GET",
        dataType: "json",
        data: {
            "id": $cod
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {



            $('#content2').html(data).fadeIn();
        },
        error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");

            $('#content2').html(data).fadeOut();
        }
    });



});
var to = false;

//funcion que busca en el arbol al introducir un caracter(es) en el textbox
$('#busqueda_tree').keyup(function() {
    if (event.keyCode == 13) {
        event.preventDefault();
    } else {
        if (to) {
            clearTimeout(to);
        }
        to = setTimeout(function() {
            var v = $('#busqueda_tree').val();

            $('#tree-container').jstree(true).search(v);
        }, 250);
    }
});
$('busqueda_tree').keypress(function(event) {
    if (event.keyCode == 13) {
        event.preventDefault();
    }
});