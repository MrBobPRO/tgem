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


//------------------------Simditor------------------------
var editors = document.getElementsByClassName('simditor-wysiwyg');
var textareas = [];

//change Simditor default locale
Simditor.locale = 'ru-RU';

for (i = 0; i < editors.length; i++) {
   textareas[i] = new Simditor({
      textarea: editors[i],
      toolbarFloatOffset: '60px',
      upload: {
        //  url: '/upload/simditor_photo',   //image upload url by server
        //  params: {
        //     folder: 'news' //used in store folder path
        //  },
        //  fileKey: 'simditor_photo', //name of input
        //  connectionCount: 10,
        //  leaveConfirm: 'Пожалуйста дождитесь окончания загрузки изображений на сервер! Вы уверены что хотите закрыть страницу?'
      },
    //   defaultImage: '/img/news/simditor/default/default.png', //default image thumb while uploading
      cleanPaste: true, //clear all styles while copy pasting,
      imageButton: 'upload',
      toolbar: ['title', 'bold', 'italic', 'underline', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'hr', '|', 'indent', 'outdent', 'alignment'] //image removed
   });
}
 //----------------------Simditor-----------------------


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

// -------------------Archive start-------------------
//on archive search
let archive_search_inputs = document.querySelectorAll("input[data-action='update_archive_list']");
archive_search_inputs.forEach(item => {
    item.addEventListener("keydown", update_archive_list);
    item.addEventListener("input", update_archive_list);
    item.addEventListener("paste", update_archive_list);
});

//update archive list on searh
function update_archive_list(event) {
    //get all elements of archive
    let archive_list = document.getElementById(event.target.dataset.archiveListId);
    let archive_elements = archive_list.getElementsByClassName("archive__list-item");
    //get searched keyword
    let keyword = event.target.value.toLowerCase();
    for (i = 0; i < archive_elements.length; i++) {
        let filename = archive_elements[i].dataset.archiveFilename.toLowerCase();
        if (filename.includes(keyword))
            archive_elements[i].classList.remove("hidden");
        else
            archive_elements[i].classList.add("hidden");
    }
}

// Validate acrhive input & nullify mirror input on archive item seleted
let archive_items_buttons = document.querySelectorAll("button[data-action='validate_archive_input']");
archive_items_buttons.forEach(item => {
    item.addEventListener("click", validate_archive_input);
});

function validate_archive_input(event) {
    let btn = event.target;
    // set value for archive input
    let value = btn.innerText;
    let archive_input = document.getElementById(btn.dataset.archiveInputId);
    archive_input.value = value;
    // nullify mirror input
    let mirror_input = document.getElementById(btn.dataset.mirrorInputId);
    mirror_input.value = null;
   // get archive modal as bootstrap modal instance & hide it
    let archive_modal = document.getElementById(btn.dataset.modalId);
    bootstrap.Modal.getInstance(archive_modal).hide();
}

//nullify archive input on mirror input select
let archive_mirror_inputs = document.querySelectorAll("input[data-action='nullify-archive-input']");
archive_mirror_inputs.forEach(item => {
    item.addEventListener("change", nullify_archive_input);
});

function nullify_archive_input(event) {
    let mirror_input = event.target;
    if (mirror_input.value != null)
        document.getElementById(mirror_input.dataset.archiveInputId).value = null;
}
// -------------------Archive end-------------------