// -------------------Russian translations for select2 messages start-------------------
$.fn.select2.amd.define('select2/i18n/ru', [], function () {
    return {
        errorLoading: function () {
            return 'Результат не может быть загружен.';
        },
        inputTooLong: function (args) {
            var overChars = args.input.length - args.maximum;
            var message = 'Пожалуйста, удалите ' + overChars + ' символ';
            if (overChars >= 2 && overChars <= 4) {
                message += 'а';
            } else if (overChars >= 5) {
                message += 'ов';
            }
            return message;
        },
        inputTooShort: function (args) {
            var remainingChars = args.minimum - args.input.length;

            var message = 'Пожалуйста, введите ' + remainingChars + ' или более символов';

            return message;
        },
        loadingMore: function () {
            return 'Загружаем ещё ресурсы…';
        },
        maximumSelected: function (args) {
            var message = 'Вы можете выбрать ' + args.maximum + ' элемент';

            if (args.maximum >= 2 && args.maximum<= 4) {
                message += 'а';
            } else if (args.maximum >= 5) {
                message += 'ов';
            }

            return message;
        },
        noResults: function () {
            return 'Ничего не найдено';
        },
        searching: function () {
            return 'Поиск…';
        }
    };
});
// -------------------Russian translations for select2 messages end-------------------


// -------------------Ajax request setup start-------------------
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// -------------------Ajax request setup end-------------------


// -------------------Enable Bootstrap v5 tooltips everywhere start------------------
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})
// -------------------Enable Bootstrap 5 tooltips everywhere end------------------


// -------------------Initializing component on document ready start-------------------
$(document).ready(function () {
    $('.jq-select').styler(); // JQ FORM STYLER
    $('.jq-radio').styler(); // JQ Radio
    $('.jq-file').styler();
    // JQ FORM STYLER

    // Select2
    $('.select2_single').select2({allowClear: true, language: 'ru'});
    // MultiSelect2
    $('.select2_multiple').select2({
        closeOnSelect: false, language: 'ru', width: '100%'
        // tags: true, means that user can create new option
        // tokenSeparators: [',', ' '], Automatic tokenization into tags
    });
});
// -------------------Initializing component on document ready end-------------------


// -------------------Fixing select2 start-------------------
// Chaange search placeholder on select2 show and focus on it
$('.select2_single').on('select2:open', function (e) {
    $('.select2-search__field')[0].placeholder = 'Поиск...';
    $('.select2-search__field')[0].focus();
});
// Change clear buttons title on select2 single select
$('.select2_single').on('select2:select', function (e) {
    $('.select2-selection__clear')[0].title = 'Очистить';
});
// Change clear buttons title on select2 multiselect
$('.select2_multiple').on('select2:select', function (e) {
    var btns = $('.select2-selection__choice__remove');
    for (var i = 0; i < btns.length; i++) {
        btns[i].title = 'Очистить';
    }
});
// Change window url on linked selects
$('.select2_single_linked').on('select2:select', function (e) {
    window.location = e.params.data.id;
});
// -------------------Fixing select2 end-------------------


// -------------------Toogle Aside visibility start-------------------
let content = document.getElementById("content")
let aside_toggler = document.getElementById("aside_toggler");
aside_toggler.addEventListener("click", event => {
    content.classList.toggle("content--max");
})
// -------------------Toogle Aside visibility end-------------------


// -------------------Single Item Remove Modal start-------------------
// Only one modal is used for all list items remove
if (document.getElementById("remove_single_modal")) {
    let remove_single_modal = new bootstrap.Modal(document.getElementById('remove_single_modal'));
    let remove_single_modal_input = document.getElementById("remove_single_modal_input");

    document.querySelectorAll("button[data-action='show_single_remove_modal'").forEach(item => {
        item.addEventListener("click", event => {
            remove_single_modal.show();
            remove_single_modal_input.value = item.dataset.itemId;
        })
    });
}
// -------------------Single Item Remove Modal end-------------------


// -------------------Multiple Item Remove Modal start-------------------
let remove_multiple_modal_button = document.getElementById("remove_multiple_modal_button");
let multiple_items_form = document.getElementById("multiple_items_form");
if (remove_multiple_modal_button) {
    remove_multiple_modal_button.addEventListener("click", event => {
        multiple_items_form.submit();
    })
}
// -------------------Multiple Item Remove Modal end-------------------