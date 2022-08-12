const $selects = $(".select-alt");
$selects.on('change', function(evt) {
    // create empty array to store the selected values
    const selectedValue = [];
    // get all selected options and filter them to get only options with value attr (to skip the default options). After that push the values to the array.
    $selects.find(':selected').filter(function(idx, el) {
        return $(el).attr('value');
    }).each(function(idx, el) {
        selectedValue.push($(el).attr('value'));
    });
    // loop all the options
    $selects.find('option').each(function(idx, option) { 
        // if the array contains the current option value otherwise we re-enable it.
        if (selectedValue.indexOf($(option).attr('value')) > -1) {
            // if the current option is the selected option, we skip it otherwise we disable it.
            if ($(option).is(':checked')) {
                return;
            } else {
                $(this).attr('disabled', true);
            }
        } else {
            $(this).attr('disabled', false);
        }
    });
});

/** Validasi form */
$("#quickForm").validate({
    rules: {
        username: {
            required: true,
            minlength: 5,
        },
        password: {
            required: true,
            minlength: 5,
        },
        nama: {
            required: true,
        },
        prodi: {
            required: true,
        },
        semester: {
            required: true,
        },
        alternatif1: {
            required: true,
        },
        alternatif2: {
            required: true,
        },
        kt_tif: {
            required: true,
        },
        kt_mif: {
            required: true,
        },
        kt_tkk: {
            required: true,
        },
        bb_tif: {
            required: true,
        },
        bb_mif: {
            required: true,
        },
        bb_tkk: {
            required: true,
        }
    },
    messages: {
        username: {
            required: "Wajib diisi!",
            minlength: "Masukkan minimal 5 karakter!",
        },
        password: {
            required: "Wajib diisi!",
            minlength: "Masukkan minimal 5 karakter!",
        },
        nama: {
            required: "Wajib diisi!",
        },
        prodi: {
            required: "Wajib diisi!",
        },
        semester: {
            required: "Wajib diisi!",
        },
        alternatif1: {
            required: "Wajib diisi!",
        },
        alternatif2: {
            required: "Wajib diisi!",
        },
        kt_tif: {
            required: "Wajib diisi!",
        },
        kt_mif: {
            required: "Wajib diisi!",
        },
        kt_tkk: {
            required: "Wajib diisi!",
        },
        bb_tif: {
            required: "Wajib diisi!",
        },
        bb_mif: {
            required: "Wajib diisi!",
        },
        bb_tkk: {
            required: "Wajib diisi!",
        }
    },
    errorElement: 'span',
    errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.input-group').append(error);
        element.closest('.form-group').append(error);
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        $(element).addClass('is-valid');
    }
});

$("#quickForm1").validate({
    rules: {
        kt_tif: {
            required: true,
        },
        kt_mif: {
            required: true,
        },
        kt_tkk: {
            required: true,
        },
        bb_tif: {
            required: true,
        },
        bb_mif: {
            required: true,
        },
        bb_tkk: {
            required: true,
        }
    },
    messages: {
        kt_tif: {
            required: "Wajib diisi!",
        },
        kt_mif: {
            required: "Wajib diisi!",
        },
        kt_tkk: {
            required: "Wajib diisi!",
        },
        bb_tif: {
            required: "Wajib diisi!",
        },
        bb_mif: {
            required: "Wajib diisi!",
        },
        bb_tkk: {
            required: "Wajib diisi!",
        }
    },
    errorElement: 'span',
    errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.input-group').append(error);
        element.closest('.form-group').append(error);
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        $(element).addClass('is-valid');
    }
});

$("#quickForm2").validate({
    rules: {
        kt_tif: {
            required: true,
        },
        kt_mif: {
            required: true,
        },
        kt_tkk: {
            required: true,
        },
        bb_tif: {
            required: true,
        },
        bb_mif: {
            required: true,
        },
        bb_tkk: {
            required: true,
        }
    },
    messages: {
        kt_tif: {
            required: "Wajib diisi!",
        },
        kt_mif: {
            required: "Wajib diisi!",
        },
        kt_tkk: {
            required: "Wajib diisi!",
        },
        bb_tif: {
            required: "Wajib diisi!",
        },
        bb_mif: {
            required: "Wajib diisi!",
        },
        bb_tkk: {
            required: "Wajib diisi!",
        }
    },
    errorElement: 'span',
    errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.input-group').append(error);
        element.closest('.form-group').append(error);
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        $(element).addClass('is-valid');
    }
});

$("#quickForm3").validate({
    rules: {
        kt_tif: {
            required: true,
        },
        kt_mif: {
            required: true,
        },
        kt_tkk: {
            required: true,
        },
        bb_tif: {
            required: true,
        },
        bb_mif: {
            required: true,
        },
        bb_tkk: {
            required: true,
        }
    },
    messages: {
        kt_tif: {
            required: "Wajib diisi!",
        },
        kt_mif: {
            required: "Wajib diisi!",
        },
        kt_tkk: {
            required: "Wajib diisi!",
        },
        bb_tif: {
            required: "Wajib diisi!",
        },
        bb_mif: {
            required: "Wajib diisi!",
        },
        bb_tkk: {
            required: "Wajib diisi!",
        }
    },
    errorElement: 'span',
    errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.input-group').append(error);
        element.closest('.form-group').append(error);
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        $(element).addClass('is-valid');
    }
});

$("#quickForm4").validate({
    rules: {
        kt_tif: {
            required: true,
        },
        kt_mif: {
            required: true,
        },
        kt_tkk: {
            required: true,
        },
        bb_tif: {
            required: true,
        },
        bb_mif: {
            required: true,
        },
        bb_tkk: {
            required: true,
        }
    },
    messages: {
        kt_tif: {
            required: "Wajib diisi!",
        },
        kt_mif: {
            required: "Wajib diisi!",
        },
        kt_tkk: {
            required: "Wajib diisi!",
        },
        bb_tif: {
            required: "Wajib diisi!",
        },
        bb_mif: {
            required: "Wajib diisi!",
        },
        bb_tkk: {
            required: "Wajib diisi!",
        }
    },
    errorElement: 'span',
    errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.input-group').append(error);
        element.closest('.form-group').append(error);
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        $(element).addClass('is-valid');
    }
});

$("#quickForm5").validate({
    rules: {
        kt_tif: {
            required: true,
        },
        kt_mif: {
            required: true,
        },
        kt_tkk: {
            required: true,
        },
        bb_tif: {
            required: true,
        },
        bb_mif: {
            required: true,
        },
        bb_tkk: {
            required: true,
        }
    },
    messages: {
        kt_tif: {
            required: "Wajib diisi!",
        },
        kt_mif: {
            required: "Wajib diisi!",
        },
        kt_tkk: {
            required: "Wajib diisi!",
        },
        bb_tif: {
            required: "Wajib diisi!",
        },
        bb_mif: {
            required: "Wajib diisi!",
        },
        bb_tkk: {
            required: "Wajib diisi!",
        }
    },
    errorElement: 'span',
    errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.input-group').append(error);
        element.closest('.form-group').append(error);
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        $(element).addClass('is-valid');
    }
});

/** Flash Data */
toastr.options = {
    "closeButton": false,
    "timeOut": "3000",
    "progressBar": true,
}

const flashData = $('.flash-data').data('flashdata');

if (flashData == 'login') {
    toastr.success('Selamat datang di aplikasi SPK GARIS');
} else if (flashData == 'logout') {
    toastr.info('Anda telah keluar dari aplikasi');
} else if (flashData == 'save') {
    toastr.success('Data berhasil disimpan!');
} else if (flashData == 'update') {
    toastr.info('Data berhasil diubah!');
} else if (flashData == 'delete') {
    toastr.success('Data berhasil dihapus!');
} else if (flashData == 'over') {
    toastr.error('Bobot diatur default, karena jumlah bobot yang dimasukkan melebihi satu!');
}


/** Chekbox is checked */ 
$('#form-unggul').on('click', '.triger', function() {
    var id = $(this).attr('data');
    if ($(this).is(':checked')) {
        $(`input[name=unggul${id}]`).val("u");
    } else {
        $(`input[name=unggul${id}]`).val("t");
    }
});


/** Data Tables */
$(function () {
    $("#tb_role, #tb_role1, #tb_role2").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": true,
    })
});