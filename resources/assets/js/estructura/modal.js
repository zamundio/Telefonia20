    var options = {
        ajax: {
            url: '/ajax/ajax.php',
            type: 'POST',
            dataType: 'json',

            data: {
                q: 'a'
            }
        },
        locale: {
            emptyTitle: 'Select and Begin Typing'
        },
        log: 3,
        preprocessData: function(data) {
            var i, l = data.length,
                array = [];
            if (l) {
                for (i = 0; i < l; i++) {
                    array.push($.extend(true, data[i], {
                        text: data[i].Name,
                        value: data[i].Email,
                        data: {
                            subtext: data[i].Email
                        }
                    }));
                }
            }
            // You must always return a valid array when processing data. The
            // data argument passed is a clone and cannot be modified directly.
            return array;
        }
    };

    jQuery('selectpicker with-ajax').selectpicker({
        liveSearch: true
    }).ajaxSelectPicker(options);
    jQuery('select.after-init').append('<option value="neque.venenatis.lacus@neque.com" data-subtext="neque.venenatis.lacus@neque.com" selected="selected">Chancellor</option>').selectpicker('refresh');
    jQuery('select').trigger('change');
