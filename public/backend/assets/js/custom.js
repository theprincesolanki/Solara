$(document).ready(function () {

    // Flash Messages (Session se aaye hue)
    var $flash = $('#flash-messages');
    var successMsg = $flash.data('success');
    var errorMsg = $flash.data('error');

    if (successMsg) {
        toastr.success(successMsg);
    }

    if (errorMsg) {
        toastr.error(errorMsg);
    }

    // Password toggle functionality
    $('.password-addon').on('click', function () {
        var $input = $(this).closest('.position-relative').find('.password-input');
        var $icon = $(this).find('i');
        var type = $input.attr('type') === 'password' ? 'text' : 'password';

        $input.attr('type', type);

        if (type === 'text') {
            $icon.removeClass('ri-eye-fill').addClass('ri-eye-off-fill');
        } else {
            $icon.removeClass('ri-eye-off-fill').addClass('ri-eye-fill');
        }
    });

    // Back to top button
    var $backToTopBtn = $('#back-to-top');

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 100) {
            $backToTopBtn.fadeIn();
        } else {
            $backToTopBtn.fadeOut();
        }
    });

    $backToTopBtn.on('click', function () {
        $('html, body').animate({ scrollTop: 0 }, 500);
    });

    // Hide preloader
    $(window).on('load', function () {
        $('#preloader').fadeOut('slow');
    });

    // Reload page function
    window.reloadPage = function () {
        setTimeout(function () {
            location.reload();
        }, 1500);
    };


    var $flash = $('#flash-messages');
    var successMsg = $flash.data('success');
    var errorMsg = $flash.data('error');

    if (successMsg) {
        toastr.success(successMsg);
    }
    if (errorMsg) {
        toastr.error(errorMsg);
    }

    // CKEditor Initialization
    $('.ckeditor').each(function () {
        var textarea = this;

        ClassicEditor
            .create(textarea, {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'underline', 'strikethrough', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                        'alignment', '|',
                        'bulletedList', 'numberedList', 'outdent', 'indent', '|',
                        'link', 'blockQuote', 'insertTable', 'imageInsert', '|',
                        'code', 'codeBlock', '|',
                        'removeFormat', 'undo', 'redo', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' }
                    ]
                },
                fontSize: { options: [9, 10, 11, 12, 13, 14, 16, 18, 24, 30, 36, 48, 60, 72] },
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ]
                },
                fontColor: {
                    colors: [
                        { color: 'hsl(0, 0%, 0%)', label: 'Black' },
                        { color: 'hsl(0, 0%, 30%)', label: 'Dim grey' },
                        { color: 'hsl(0, 0%, 60%)', label: 'Grey' },
                        { color: 'hsl(0, 0%, 90%)', label: 'Light grey' },
                        { color: 'hsl(0, 0%, 100%)', label: 'White', hasBorder: true },
                        { color: 'hsl(0, 75%, 60%)', label: 'Red' },
                        { color: 'hsl(30, 75%, 60%)', label: 'Orange' },
                        { color: 'hsl(60, 75%, 60%)', label: 'Yellow' },
                        { color: 'hsl(90, 75%, 60%)', label: 'Light green' },
                        { color: 'hsl(120, 75%, 60%)', label: 'Green' },
                        { color: 'hsl(180, 75%, 60%)', label: 'Aquamarine' },
                        { color: 'hsl(210, 75%, 60%)', label: 'Turquoise' },
                        { color: 'hsl(240, 75%, 60%)', label: 'Light blue' },
                        { color: 'hsl(270, 75%, 60%)', label: 'Blue' },
                        { color: 'hsl(300, 75%, 60%)', label: 'Purple' }
                    ]
                },
                fontBackgroundColor: {
                    colors: [
                        { color: 'hsl(0, 0%, 100%)', label: 'White' },
                        { color: 'hsl(0, 0%, 90%)', label: 'Light grey' },
                        { color: 'hsl(0, 0%, 80%)', label: 'Grey' },
                        { color: 'hsl(0, 75%, 60%)', label: 'Red' },
                        { color: 'hsl(30, 75%, 60%)', label: 'Orange' },
                        { color: 'hsl(60, 75%, 60%)', label: 'Yellow' },
                        { color: 'hsl(90, 75%, 60%)', label: 'Light green' },
                        { color: 'hsl(120, 75%, 60%)', label: 'Green' },
                        { color: 'hsl(210, 75%, 60%)', label: 'Turquoise' },
                        { color: 'hsl(270, 75%, 60%)', label: 'Blue' },
                        { color: 'hsl(300, 75%, 60%)', label: 'Purple' }
                    ]
                },
                alignment: { options: ['left', 'right', 'center', 'justify'] },
                image: { toolbar: ['imageTextAlternative', 'imageStyle:inline', 'imageStyle:block', 'imageStyle:side'] },
                table: { contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells', 'tableCellProperties', 'tableProperties'] },
                link: {
                    decorators: {
                        openInNewTab: {
                            mode: 'manual',
                            label: 'Open in a new tab',
                            attributes: { target: '_blank', rel: 'noopener noreferrer' }
                        }
                    }
                },
                htmlSupport: {
                    allow: [{ name: /.*/, attributes: true, classes: true, styles: true }]
                }
            })
            .then(function (editor) {
                console.log('CKEditor 5 initialized with full features:', textarea);
                textarea.editorInstance = editor;
                editor.model.document.on('change:data', () => { textarea.value = editor.getData(); });
            })
            .catch(function (error) {
                console.error('CKEditor 5 Error:', error);
            });
    });

});