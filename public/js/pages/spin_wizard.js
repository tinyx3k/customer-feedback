/*
 *  Document   : be_forms_wizard.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Forms Wizard Page
 */

// Form Wizard, for more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard
class pageFormsWizard {
    /*
     * Init Wizard Defaults
     *
     */
    static initWizardDefaults() {
        jQuery.fn.bootstrapWizard.defaults.tabClass = 'nav nav-tabs';
        jQuery.fn.bootstrapWizard.defaults.nextSelector = '[data-wizard="next"]';
        jQuery.fn.bootstrapWizard.defaults.previousSelector = '[data-wizard="prev"]';
        jQuery.fn.bootstrapWizard.defaults.firstSelector = '[data-wizard="first"]';
        jQuery.fn.bootstrapWizard.defaults.lastSelector = '[data-wizard="lsat"]';
        jQuery.fn.bootstrapWizard.defaults.finishSelector = '[data-wizard="finish"]';
        jQuery.fn.bootstrapWizard.defaults.backSelector = '[data-wizard="back"]';
    }

    /*
     * Init Simple Wizard functionality
     *
     */
    static initWizardSimple() {
        jQuery('.js-wizard-simple').bootstrapWizard({
            onTabShow: (tab, nav, index) => {
                let percent = ((index + 1) / nav.find('li').length) * 100;

                // Get progress bar
                let progress = nav.parents('.block').find('[data-wizard="progress"] > .progress-bar');

                // Update progress bar if there is one
                if (progress.length) {
                    progress.css({
                        width: percent + 1 + '%'
                    });
                }
            }
        });
    }

    /*
     * Init Validation Wizard functionality
     *
     */
    static initWizardValidation() {
        // Get forms
        let formValidation2 = jQuery('.js-wizard-validation2-form');

        // Prevent forms from submitting on enter key press
        formValidation2.on('keyup keypress', (e) => {
            let code = e.keyCode || e.which;

            if (code === 13) {
                e.preventDefault();
                return false;
            }
        });

        // Init form validation on validation 2 wizard form
        let validator2 = formValidation2.validate({
            errorClass: 'invalid-feedback animated fadeIn',
            errorElement: 'div',
            errorPlacement: (error, el) => {
                jQuery(el).addClass('is-invalid');
                jQuery(el).parents('.form-group').append(error);
            },
            highlight: (el) => {
                jQuery(el).parents('.form-group').find('.is-invalid').removeClass('is-invalid').addClass('is-invalid');
            },
            success: (el) => {
                jQuery(el).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
                jQuery(el).remove();
            },
            rules: {
                'right_content': {
                    required: true
                },
                'wizard-validation2-lastname': {
                    required: true,
                    minlength: 2
                },
                'wizard-validation2-email': {
                    required: true,
                    email: true
                },
                'wizard-validation2-bio': {
                    required: true,
                    minlength: 5
                },
                'wizard-validation2-location': {
                    required: true
                },
                'wizard-validation2-skills': {
                    required: true
                },
                'wizard-validation2-terms': {
                    required: true
                }
            },
            messages: {
                'right_content': {
                    required: 'Please Choose Content'
                },
                'wizard-validation2-lastname': {
                    required: 'Please enter a lastname',
                    minlength: 'Your lastname must consist of at least 2 characters'
                },
                'wizard-validation2-email': 'Please enter a valid email address',
                'wizard-validation2-bio': 'Let us know a few thing about yourself',
                'wizard-validation2-skills': 'Please select a skill!',
                'wizard-validation2-terms': 'You must agree to the service terms!'
            }
        });

        // Init wizard with validation 2
        jQuery('.js-wizard-validation2').bootstrapWizard({
            tabClass: '',
            onTabShow: (tab, nav, index) => {
                let percent = ((index + 1) / nav.find('li').length) * 100;

                // Get progress bar
                let progress = nav.parents('.block').find('[data-wizard="progress"] > .progress-bar');

                // Update progress bar if there is one
                if (progress.length) {
                    progress.css({
                        width: percent + 1 + '%'
                    });
                }
            },
            onNext: (tab, nav, index) => {
                if (!formValidation2.valid()) {
                    validator2.focusInvalid();

                    return false;
                }
            },
            onTabClick: (tab, nav, index) => {
                jQuery('a', nav).blur();

                return false;
            }
        });
    }

    /*
     * Init functionality
     *
     */
    static init() {
        this.initWizardDefaults();
        this.initWizardSimple();
        this.initWizardValidation();
    }
}

// Initialize when page loads
jQuery(() => {
    pageFormsWizard.init();
});

//Keyword variable original
var keyword1_replace_word = null;
var keyword1_find_word = null;
var keyword1_find_word_2 = null;
var keyword1_find_word_3 = null;
var keyword1_link = null;

var keyword2_replace_word = null;
var keyword2_find_word = null;
var keyword2_link = null;

var keyword3_replace_word = null;
var keyword3_find_word = null;
var keyword3_link = null;

//keyword variables for spinmore_a
var keyword1_replace_word_a = null;
var keyword1_find_word_a = null;
var keyword1_find_word_2_a = null;
var keyword1_find_word_3_a = null;
var keyword1_link_a = null;

var keyword2_replace_word_a = null;
var keyword2_find_word_a = null;
var keyword2_link_a = null;

var keyword3_replace_word_a = null;
var keyword3_find_word_a = null;
var keyword3_link_a = null;

//keyword variables for spinmore_b
var keyword1_replace_word_b = null;
var keyword1_find_word_b = null;
var keyword1_find_word_2_b = null;
var keyword1_find_word_3_b = null;
var keyword1_link_b = null;

var keyword2_replace_word_b = null;
var keyword2_find_word_b = null;
var keyword2_link_b = null;

var keyword3_replace_word_b = null;
var keyword3_find_word_b = null;
var keyword3_link_b = null;

//keyword variables for spinmore_c
var keyword1_replace_word_c = null;
var keyword1_find_word_c = null;
var keyword1_find_word_2_c = null;
var keyword1_find_word_3_c = null;
var keyword1_link_c = null;

var keyword2_replace_word_c = null;
var keyword2_find_word_c = null;
var keyword2_link_c = null;

var keyword3_replace_word_c = null;
var keyword3_find_word_c = null;
var keyword3_link_c = null;

//keyword variables for spinmore_d
var keyword1_replace_word_d = null;
var keyword1_find_word_d = null;
var keyword1_find_word_2_d = null;
var keyword1_find_word_3_d = null;
var keyword1_link_d = null;

var keyword2_replace_word_d = null;
var keyword2_find_word_d = null;
var keyword2_link_d = null;

var keyword3_replace_word_d = null;
var keyword3_find_word_d = null;
var keyword3_link_d = null;

$(document).ready(function() {
    Dashmix.helpers('ckeditor');
    $('.select2').select2();
    $("#reponse").val('');
    $('#copy_content').on('click', function() {
        copy_processed_text();
    });

    $('#example-sw-custom-success-lg1').on('click', function() {
        if ($(this).is(":checked")) {
            $('#original_submit_button').removeAttr('disabled');
            document.getElementById('sites').classList.remove('d-none');
        } else {
            $('#original_submit_button').attr('disabled', 'disabled');
            document.getElementById('sites').classList.add('d-none');
        }
    });

    $('#publish_more_1').on('click', function() {
        if ($(this).is(":checked")) {
            $('#submit_button_1').removeAttr('disabled');
            document.getElementById('sites_1').classList.remove('d-none');
        } else {
            $('#submit_button_1').attr('disabled', 'disabled');
            document.getElementById('sites_1').classList.add('d-none');
        }
    });

    $('#publish_more_2').on('click', function() {
        if ($(this).is(":checked")) {
            $('#submit_button_2').removeAttr('disabled');
            document.getElementById('sites_2').classList.remove('d-none');
        } else {
            $('#submit_button_2').attr('disabled', 'disabled');
            document.getElementById('sites_2').classList.add('d-none');
        }
    });

    $('#publish_more_3').on('click', function() {
        if ($(this).is(":checked")) {
            $('#submit_button_3').removeAttr('disabled');
            document.getElementById('sites_3').classList.remove('d-none');
        } else {
            $('#submit_button_b').attr('disabled', 'disabled');
            document.getElementById('sites_3').classList.add('d-none');
        }
    });

    $('#publish_more_4').on('click', function() {
        if ($(this).is(":checked")) {
            $('#submit_button_4').removeAttr('disabled');
            document.getElementById('sites_4').classList.remove('d-none');
        } else {
            $('#submit_button_4').attr('disabled', 'disabled');
            document.getElementById('sites_4').classList.add('d-none');
        }
    });

    $('#right_content').on('change', function() {
        if ($(this).val() === '1') {
            document.getElementById('niche').classList.add('d-none');
        } else {
            get_niche_by_category($(this).val());
        }
        $('#preview_niche_content').text(' ');
        $('#origText').val('');
        $('#title').val('');
        $('#orig_title_holder').val('');
        CKEDITOR.instances['js-ckeditor-0'].setData('');
        $('#niche_selection').empty().append('<option value="" selected disabled>SELECT NICHE TITLE</option>').find('option:first').attr("selected", "selected");
    });

    var niche_selection = $('#niche_selection').val();
    get_niche_article_data(niche_selection);
    $('#niche_selection').on('change', function() {
        var niche_selection = $(this).val();
        get_niche_article_data(niche_selection);

    });

    $('#next').on('click', function() {
        if (jQuery.trim($('#reponse').val()).length > 0) {
            CKEDITOR.instances['js-ckeditor-0'].setData($('#reponse').val());
        } else {
            CKEDITOR.instances['js-ckeditor-0'].setData($('#origText').val());
        }
    });

    $('#post_article').on('click', function() {
        var textContent = $('#reponse').val();
        var title = textContent.replace(/(([^\s]+\s\s*){5})(.*)/, "$1…");
        if (typeof(Storage) !== "undefined") {
            localStorage.setItem("processed_text", $('#reponse').val());
            localStorage.setItem("title_text", title);
        }
        window.open(blog_create_route);
    });

    $('#export_article').on('click', function() {
        $('#download_modal').modal();
    });

    $('.keyword_search').on('click', function() {
        $('#keyword_search_modal').modal();
        $('#keyword_number').val($(this).data('keyword'));
    });

    $('#search_keyword').on('click', function() {
        var keyword = $('#search_key').val();
        var keyword_number = $('#keyword_number').val();
        if (keyword && keyword_number) {
            if (keyword.length < 2) {
                dashmixAjxNotify('error', 'Minimum of 3 letters');
            } else {
                get_search_keyword(keyword, keyword_number);
            }
        } else {
            dashmixAjxNotify('error', 'Search key cannot be empty.');
        }

    });

    $('#apply_selected_keyword').on('click', function() {
        var selected_keyword = $("input[name='selected_keyword']:checked").val();
        var selected_keyword_number = $("input[name='selected_keyword']:checked").data('keyword');
        $('#keyword' + selected_keyword_number + '_btn').html(selected_keyword);
        $('#keyword' + selected_keyword_number + '_btn').data('suggestion', selected_keyword);
        $('#keyword_search_modal').modal('hide');
        $('#keyword_search_tbody').html('');
    });

    //spin more button
    $('#spin_more_modal_btn').on('click', function() {
        let originTextArea = 'js-ckeditor-' + spin_more_count;
        if (CKEDITOR.instances[originTextArea].getData() == '') {
            swal('Error', 'The latest content area cannot be blank!', 'error');
        } else {
            spin_more_count++;
            var spin_index = spin_more_count;
            var spin_limit = 4 - spin_more_count;
            spin_more_article(spin_index);
            $('#spin_more_count').empty();
        }
    });

    $('#niche_selection').on('change', function() {
        $('#next_button').removeAttr('disabled');
    });

    $('#own_content').on('change', function() {
        if ($(this).is(':checked')) {
            $('#next_button').removeAttr('disabled');
        } else {
            if ($('#niche_selection').val() == null) {
                $('#next_button').attr('disabled', 'disabled');
            }
        }
    });



    //keyword 1
    $('#keyword1').on('click', function() {
        var keyword_number = $(this).data('keyword');
        var keyword_replace = $('#keyword' + keyword_number + '_btn').html();
        if (
            $('#keyword1_find_word').val().trim() &&
            $('#keyword1_find_word_2').val().trim() &&
            $('#keyword1_find_word_3').val().trim() &&
            $('#keyword1_link').val().trim()
        ) {
            if (
                keyword1_find_word != $('#keyword1_find_word').val() &&
                keyword1_find_word_2 != $('#keyword1_find_word_2').val() &&
                keyword1_find_word_3 != $('#keyword1_find_word_2').val() &&
                keyword1_replace_word != keyword_replace &&
                keyword1_link != $('#keyword1_link').val()
            ) {
                var article_body = CKEDITOR.instances['js-ckeditor-0'].getData();
                keyword1_find_word = $('#keyword1_find_word').val();
                keyword1_find_word_2 = $('#keyword1_find_word_2').val();
                keyword1_find_word_3 = $('#keyword1_find_word_3').val();
                keyword1_replace_word = keyword_replace;
                keyword1_link = $('#keyword1_link').val();
                if (!keyword1_link.includes('http://') || !keyword1_link.includes('https://')) {
                    keyword1_link = 'http://' + $('#keyword1_link').val();
                }
                var a_tag = '<a href="' + keyword1_link + '">' + keyword1_replace_word.charAt(0).toLowerCase() + keyword1_replace_word.substr(1) + '</a>'

                // find the index of last time word was used
                var first_instance = article_body.toLowerCase().indexOf(keyword1_find_word_2.toLowerCase());
                var last_instance = article_body.toLowerCase().lastIndexOf(keyword1_find_word_3.toLowerCase());

                // slice the string in 2, one from the start to the lastIndexOf
                // and then replace the word in the rest
                var pat2 = new RegExp(keyword1_find_word_2, 'i');
                var pat3 = new RegExp(keyword1_find_word_3, 'i');
                article_body = article_body.slice(0, first_instance) + article_body.slice(first_instance).replace(pat2, a_tag);
                article_body = article_body.slice(0, last_instance) + article_body.slice(last_instance).replace(pat3, a_tag);

                // result abc def test xyz
                CKEDITOR.instances['js-ckeditor-0'].setData(article_body);

                //title
                var article_title = $('#title').val();
                var article_title = article_title.replace(keyword1_find_word, keyword1_replace_word.charAt(0).toLowerCase() + keyword1_replace_word.substr(1));
                $('#title').val(article_title);
                dashmixAjxNotify('success', 'Word replace.');
            } else {
                dashmixAjxNotify('error', 'Replace Words or Link already used.');
            }
        } else {
            dashmixAjxNotify('error', 'All field must be populated.');
        }
    });

    //keyword 2
    $('#keyword2').on('click', function() {
        var keyword_number = $(this).data('keyword');
        var keyword_replace = $('#keyword' + keyword_number + '_btn').html();
        if (
            $('#keyword2_find_word').val().trim() &&
            $('#keyword2_link').val().trim()
        ) {
            if (
                keyword_replace == keyword1_find_word
            ) {
                dashmixAjxNotify('error', 'Word already replaced.');
            } else {
                if (
                    keyword2_find_word != $('#keyword2_find_word').val() &&
                    keyword2_replace_word != keyword_replace &&
                    keyword2_link != $('#keyword2_link').val()
                ) {
                    var article_body = CKEDITOR.instances['js-ckeditor-0'].getData();
                    keyword2_find_word = $('#keyword2_find_word').val();
                    keyword2_replace_word = keyword_replace;
                    keyword2_link = $('#keyword2_link').val();
                    if (!keyword2_link.includes('http://') || !keyword2_link.includes('https://')) {
                        keyword2_link = 'http://' + $('#keyword2_link').val();
                    }
                    var a_tag = '<a href="' + keyword2_link + '">' + keyword2_replace_word.charAt(0).toLowerCase() + keyword2_replace_word.substr(1) + '</a>'
                        // find the index of last time word was used
                    var first_instance = article_body.toLowerCase().indexOf(keyword2_find_word.toLowerCase());

                    // slice the string in 2, one from the start to the indexOf
                    // and then replace the word in the rest
                    var pat = new RegExp(keyword2_find_word, 'i')
                    article_body = article_body.slice(0, first_instance) + article_body.slice(first_instance).replace(pat, a_tag);

                    // result abc def test xyz
                    CKEDITOR.instances['js-ckeditor-0'].setData(article_body);
                    dashmixAjxNotify('success', 'Word replace.');
                } else {
                    dashmixAjxNotify('error', 'Replace Word or Link already used.');
                }
            }
        } else {
            dashmixAjxNotify('error', 'All field must be populated.');
        }
    });

    //keyword 3
    $('#keyword3').on('click', function() {
        var keyword_number = $(this).data('keyword');
        var keyword_replace = $('#keyword' + keyword_number + '_btn').html();
        if (
            $('#keyword3_find_word').val().trim() &&
            $('#keyword3_link').val().trim()
        ) {
            if (
                keyword_replace == keyword1_find_word ||
                keyword_replace == keyword2_find_word
            ) {
                dashmixAjxNotify('error', 'Word already replaced.');
            } else {
                if (
                    keyword3_find_word != $('#keyword3_find_word').val() &&
                    keyword3_replace_word != keyword_replace &&
                    keyword3_link != $('#keyword3_link').val()
                ) {
                    var article_body = CKEDITOR.instances['js-ckeditor-0'].getData();
                    keyword3_find_word = $('#keyword3_find_word').val();
                    keyword3_replace_word = keyword_replace;
                    keyword3_link = $('#keyword3_link').val();
                    if (!keyword3_link.includes('http://') || !keyword3_link.includes('https://')) {
                        keyword3_link = 'http://' + $('#keyword3_link').val();
                    }
                    var a_tag = '<a href="' + keyword3_link + '">' + keyword3_replace_word.charAt(0).toLowerCase() + keyword3_replace_word.substr(1) + '</a>'
                        // find the index of last time word was used
                    var last_instance = article_body.toLowerCase().lastIndexOf(keyword3_find_word.toLowerCase());

                    // slice the string in 2, one from the start to the lastIndexOf
                    // and then replace the word in the rest
                    var pat = new RegExp(keyword3_find_word, 'i')
                    article_body = article_body.slice(0, last_instance) + article_body.slice(last_instance).replace(pat, a_tag);

                    // result abc def test xyz
                    CKEDITOR.instances['js-ckeditor-0'].setData(article_body);
                    dashmixAjxNotify('success', 'Word replace.');
                } else {
                    dashmixAjxNotify('error', 'Replace Word or Link already used.');
                }
            }
        } else {
            dashmixAjxNotify('error', 'All field must be populated.');
        }
    });

    $("#originalBtn").on('click', function() {
        swal({
            title: 'Are you sure?',
            text: 'This will cost token.',
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-danger m-1',
            cancelButtonClass: 'btn btn-secondary m-1',
            confirmButtonText: 'Yes, Submit it!',
            html: false,
        }).then((result) => {
            if (result.value) {
                LoadingBlockUI();
                var origText = $("#origText").val();
                var title = $("#niche_selection").val();
                // var spin_title = $('#spin_title').is(':checked') ? 'on' : 'off';
                var route = spin_route;
                if (origText === '') {
                    dashmixAjxNotify('error', 'Original message cannot be empty');
                    LoadingUnblockUI();
                } else {
                    $.ajax({
                        method: 'post',
                        url: route,
                        data: {
                            origText: origText,
                            title: title
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.status) {
                                var regex = /<\s*[\/]?br>/gi;
                                $("#reponse").val(result.content.replace(regex, "\n"));
                                CKEDITOR.instances['js-ckeditor-0'].setData(result.content);
                                if (result.title) {
                                    $('#title').val(result.title);
                                    $('#spin_title_holder').val(result.title);
                                } else {
                                    $('#spin_title_holder').val($('#orig_title_holder').val());
                                }
                                if (result.status == 'error') {
                                    swal('Failed!', 'You do not have enough credits left', 'error');
                                } else {
                                    swal('Success!', 'Request Completed', 'success');
                                }
                                $('#export_article').show();
                            } else {
                                if (result.message)
                                    swal('Error', result.message, 'error');
                                else
                                    swal('Error', 'Somthing went wrong!', 'error');
                            }
                            $("#originalBtn").attr('disabled', 'disabled');
                            LoadingUnblockUI();
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            swal('Error', 'Somthing went wrong!', 'error');
                            LoadingUnblockUI();
                        }
                    });

                }

            }
        });

    });

    $("#originalBtnWithTitle").on('click', function() {
        swal({
            title: 'Are you sure?',
            text: 'This will cost token.',
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-danger m-1',
            cancelButtonClass: 'btn btn-secondary m-1',
            confirmButtonText: 'Yes, Submit it!',
            html: false,
        }).then((result) => {
            if (result.value) {
                LoadingBlockUI();
                var origText = $("#origText").val();
                var title = $("#niche_selection").val();
                var spin_title = 'on';
                var route = spin_route;
                if (origText === '') {
                    dashmixAjxNotify('error', 'Original message cannot be empty');
                    LoadingUnblockUI();
                } else {
                    $.ajax({
                        method: 'post',
                        url: route,
                        data: {
                            origText: origText,
                            title: title,
                            spin_title: spin_title
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.status) {
                                var regex = /<\s*[\/]?br>/gi;
                                $("#reponse").val(result.content.replace(regex, "\n"));
                                CKEDITOR.instances['js-ckeditor-0'].setData(result.content);
                                if (result.title) {
                                    $('#title').val(result.title);
                                    $('#spin_title_holder').val(result.title);
                                } else {
                                    $('#spin_title_holder').val($('#orig_title_holder').val());
                                }
                                if (result.status == 'error') {
                                    swal('Failed!', 'You do not have enough credits left', 'error');
                                } else {
                                    swal('Success!', 'Request Completed', 'success');
                                }
                                $('#export_article').show();
                            } else {
                                if (result.message)
                                    swal('Error', result.message, 'error');
                                else
                                    swal('Error', 'Somthing went wrong!', 'error');
                            }
                            $("#originalBtn").attr('disabled', 'disabled');
                            LoadingUnblockUI();
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            swal('Error', 'Somthing went wrong!', 'error');
                            LoadingUnblockUI();
                        }
                    });

                }

            }
        });

    });

    //prevent form submit
    $("#search_key").bind("keypress", function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            $('#search_keyword').click();
        }
    });

    //use your own content
    $('#own_content').on('click', function() {
        removeContent();
    });
    removeContent();
});

function removeContent() {
    if ($('#own_content').is(':checked')) {
        $('#origText').val('');
        CKEDITOR.instances['js-ckeditor-0'].setData('');
        $('#title').val('');
    } else {
        var niche_selection = $('#niche_selection').val();
        get_niche_article_data(niche_selection)
    }
}

function copy_processed_text() {
    var copyText = document.getElementById("reponse");
    copyText.select();
    document.execCommand("copy");
    dashmixAjxNotify('success', 'Copy success.');
}

function get_niche_article_data(niche_selection) {
    LoadingBlockUI();
    $.ajax({
        method: 'post',
        url: get_niche_article_route,
        data: {
            niche_selection: niche_selection
        },
        dataType: 'json',
        success: function(result) {
            if (result.status) {
                $('#preview_niche_content').html(result.article.content.replace(/\\n|\\r\\n|\\r/g, '<br>'));
                if (!$('#own_content').is(':checked')) {
                    $("#origText").val(result.article.content.replace(/\\n|\\r\\n|\\r/g, '\n'));
                    $("#title").val(result.article.title);
                    $("#orig_title_holder").val(result.article.title);
                    CKEDITOR.instances['js-ckeditor-0'].setData(result.article.content.replace(/\\n|\\r\\n|\\r/g, '<br>'));
                    if (!result.status) {
                        swal('Error!', result.message, 'success');
                    }
                }
            } else {
                swal('Error', 'Something went wrong!', 'error');
            }
            LoadingUnblockUI();
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            swal('Error', 'Something went wrong!', 'error');
            LoadingUnblockUI();
        }
    });

}

function get_niche_by_category(category) {
    LoadingBlockUI();
    $.ajax({
        method: 'post',
        url: get_niche_by_category_route,
        data: {
            category: category,
        },
        success: function(result) {
            for (i = 0; i < result.niche_articles.length; i++) {
                $('#niche_selection').append('<option value="' + result.niche_articles[i].title + '">' + result.niche_articles[i].title + '</option>');
            }
            document.getElementById('niche').classList.remove('d-none');
            LoadingUnblockUI();
        }
    });
}

function get_search_keyword(keyword, keyword_number) {
    LoadingBlockUI();
    $.ajax({
        method: 'post',
        url: get_search_keyword_route,
        data: {
            keyword: keyword,
            keyword_number: keyword_number
        },
        dataType: 'json',
        success: function(result) {
            if (result.status) {
                if (result.tbody) {
                    $('#keyword_search_tbody').html(result.tbody);
                } else {
                    dashmixAjxNotify('error', 'Something went wrong, Please try again later.');
                }
                LoadingUnblockUI();
            } else {
                LoadingUnblockUI();
                if (result.message)
                    swal('Error', result.message, 'error');
                else
                    swal('Error', 'Somthing went wrong!', 'error');
                return false;
            }

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            swal('Error', 'Somthing went wrong!', 'error');
            LoadingUnblockUI();
        }
    });
}

function spin_more_article(number) {
    swal({
        title: 'Are you sure?',
        text: 'This will cost extra tokens.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-danger m-1',
        cancelButtonClass: 'btn btn-secondary m-1',
        confirmButtonText: 'Yes, Submit it!',
        html: false,
    }).then((result) => {
        if (result.value) {
            LoadingBlockUI();
            let spinBlock = document.querySelectorAll('.spinmore.d-none');
            let tableRow = document.querySelectorAll('.tableitem.d-none');
            spinBlock[0].classList.remove('d-none');
            tableRow[0].classList.remove('d-none');
            let originId = number - 1;
            let targetTextArea = 'js-ckeditor-' + number;
            let originTextArea = 'js-ckeditor-' + originId;
            let targetTitle = '#title_' + number;
            let origText = CKEDITOR.instances[originTextArea].getData();
            let title = $("#title").val();
            let route = spin_route;
            $.ajax({
                method: 'post',
                url: route,
                data: {
                    origText: origText,
                },
                dataType: 'json',
                success: function(result) {
                    if (result.status) {
                        var regex = /<\s*[\/]?br>/gi;
                        CKEDITOR.instances[targetTextArea].setData(result.content.replace(regex, '\n'));
                        $(targetTitle).val(title);
                        if (result.status == 'error') {
                            swal('Failed!', 'You do not have enough credits left', 'error');
                        } else {
                            swal('Success!', 'Request Completed', 'success');
                            let spin_limit = 4 - number;
                            $('#spin_left').text(spin_limit);
                        }
                    } else {
                        if (result.message)
                            swal('Error', result.message, 'error');
                        else
                            swal('Error', 'Something went wrong!1', 'error');
                    }
                    LoadingUnblockUI();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    swal('Error', 'Something went wrong!2', 'error');
                    LoadingUnblockUI();
                }
            });
            if (number >= 4) {
                $('#spin_more_modal_btn').attr('disabled', 'disabled');
            }
        }
    });
}

//SUBMISSION BUTTONS START
$('#original_submit_button').on('click', function() {
    var selected_sites = new Array();
    $("input:checkbox[name=sites]:checked").each(function() {
        selected_sites.push($(this).val());
    });
    if (selected_sites.length == 0) {
        swal("Warning", "Please select at least 1 submission site.", "warning");
    } else {
        var originalData = {
            'title': $('input[name=title]').val(),
            'body': CKEDITOR.instances['js-ckeditor-0'].getData(),
            'sites': selected_sites
        };
        swal({
            title: 'Are you sure you want to submit?',
            text: 'This will cost tokens.',
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-danger m-1',
            cancelButtonClass: 'btn btn-secondary m-1',
            confirmButtonText: 'Yes, Submit it!',
            html: false,
        }).then((result) => {
            if (result.value) {
                LoadingBlockUI();
                $.ajax({
                    method: 'post',
                    url: submit_route,
                    data: originalData,
                    dataType: 'json',
                    success: function(result) {
                        if (result.status) {
                            if (result.status == 'error') {
                                swal('Failed!', 'An error has occured, please try again!', 'error');
                            } else {
                                // $('#example-sw-custom-success-lg1').attr('disabled', true);
                                // CKEDITOR.instances['js-ckeditor-0'].setReadOnly(true);
                                // $('#first_spin *').prop('disabled', true);
                                swal('Success!', 'Submission Completed', 'success');
                            }
                        } else {
                            if (result.message)
                                swal('Error', result.message, 'error');
                            else
                                swal('Error', 'Something went wrong!', 'error');
                        }
                        LoadingUnblockUI();
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        swal('Error', 'Something went wrong!', 'error');
                        LoadingUnblockUI();
                    },
                })
            }
        });
    }
});

$('#submit_button_1').on('click', function() {
    var originalData = {
        'title': $('input[name=title_1]').val(),
        'body': CKEDITOR.instances['js-ckeditor-1'].getData(),
        'sites': $('#sites_select_1').val()
    };
    swal({
        title: 'Are you sure you want to submit?',
        text: 'This will cost tokens.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-danger m-1',
        cancelButtonClass: 'btn btn-secondary m-1',
        confirmButtonText: 'Yes, Submit it!',
        html: false,
    }).then((result) => {
        LoadingBlockUI();
        if (result.value) {
            $.ajax({
                method: 'post',
                url: submit_route,
                data: originalData,
                dataType: 'json',
                success: function(result) {
                    if (result.status) {
                        if (result.status == 'error') {
                            swal('Failed!', 'An error has occured, please try again!', 'error');
                        } else {
                            $('#publish_more_1').attr('disabled', true);
                            CKEDITOR.instances['js-ckeditor-1'].setReadOnly(true);
                            $('#spin_more_1 *').prop('disabled', true);
                            swal('Success!', 'Submission Completed', 'success');
                        }
                    } else {
                        if (result.message)
                            swal('Error', result.message, 'error');
                        else
                            swal('Error', 'Something went wrong!', 'error');
                    }
                    LoadingUnblockUI();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    swal('Error', 'Something went wrong!', 'error');
                    LoadingUnblockUI();
                },
            })
        }
    });
});
$('#sites_select_1').on('change', function() {
    var selected = [];
    if ($("#sites_select_1").select2('data').length) {
        $.each($("#sites_select_1").select2('data'), function(key, item) {
            selected.push(item.text);
        });
    }
    selected = selected.toString().split(',').join(', ');
    $('#table_title_2').html($('#title_1').val());
    $('#table_sites_2').html(selected);
});

$('#submit_button_2').on('click', function() {
    var originalData = {
        'title': $('input[name=title_2]').val(),
        'body': CKEDITOR.instances['js-ckeditor-2'].getData(),
        'sites': $('#sites_select_2').val()
    };
    swal({
        title: 'Are you sure you want to submit?',
        text: 'This will cost tokens.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-danger m-1',
        cancelButtonClass: 'btn btn-secondary m-1',
        confirmButtonText: 'Yes, Submit it!',
        html: false,
    }).then((result) => {
        LoadingBlockUI();
        if (result.value) {
            $.ajax({
                method: 'post',
                url: submit_route,
                data: originalData,
                dataType: 'json',
                success: function(result) {
                    if (result.status) {
                        if (result.status == 'error') {
                            swal('Failed!', 'An error has occured, please try again!', 'error');
                        } else {
                            $('#publish_more_2').attr('disabled', true);
                            CKEDITOR.instances['js-ckeditor-2'].setReadOnly(true);
                            $('#spin_more_2 *').prop('disabled', true);
                            swal('Success!', 'Submission Completed', 'success');
                        }
                    } else {
                        if (result.message)
                            swal('Error', result.message, 'error');
                        else
                            swal('Error', 'Something went wrong!', 'error');
                    }
                    LoadingUnblockUI();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    swal('Error', 'Something went wrong!', 'error');
                    LoadingUnblockUI();
                },
            })
        }
    });
});
$('#sites_select_2').on('change', function() {
    var selected = [];
    if ($("#sites_select_2").select2('data').length) {
        $.each($("#sites_select_2").select2('data'), function(key, item) {
            selected.push(item.text);
        });
    }
    selected = selected.toString().split(',').join(', ');
    $('#table_title_3').html($('#title_2').val());
    $('#table_sites_3').html(selected);
});

$('#submit_button_3').on('click', function() {
    var originalData = {
        'title': $('input[name=title_3]').val(),
        'body': CKEDITOR.instances['js-ckeditor-3'].getData(),
        'sites': $('#sites_select_3').val()
    };
    swal({
        title: 'Are you sure you want to submit?',
        text: 'This will cost tokens.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-danger m-1',
        cancelButtonClass: 'btn btn-secondary m-1',
        confirmButtonText: 'Yes, Submit it!',
        html: false,
    }).then((result) => {
        LoadingBlockUI();
        if (result.value) {
            $.ajax({
                method: 'post',
                url: submit_route,
                data: originalData,
                dataType: 'json',
                success: function(result) {
                    if (result.status) {
                        if (result.status == 'error') {
                            swal('Failed!', 'An error has occured, please try again!', 'error');
                        } else {
                            $('#publish_more_3').attr('disabled', true);
                            CKEDITOR.instances['js-ckeditor-3'].setReadOnly(true);
                            $('#spin_more_3 *').prop('disabled', true);
                            swal('Success!', 'Submission Completed', 'success');
                        }
                    } else {
                        if (result.message)
                            swal('Error', result.message, 'error');
                        else
                            swal('Error', 'Something went wrong!', 'error');
                    }
                    LoadingUnblockUI();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    swal('Error', 'Something went wrong!', 'error');
                    LoadingUnblockUI();
                },
            })
        }
    });
});
$('#sites_select_3').on('change', function() {
    var selected = [];
    if ($("#sites_select_3").select2('data').length) {
        $.each($("#sites_select_3").select2('data'), function(key, item) {
            selected.push(item.text);
        });
    }
    selected = selected.toString().split(',').join(', ');
    $('#table_title_4').html($('#title_3').val());
    $('#table_sites_4').html(selected);
});

$('#submit_button_4').on('click', function() {
    var originalData = {
        'title': $('input[name=title_4]').val(),
        'body': CKEDITOR.instances['js-ckeditor-4'].getData(),
        'sites': $('#sites_select_4').val()
    };
    swal({
        title: 'Are you sure you want to submit?',
        text: 'This will cost tokens.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-danger m-1',
        cancelButtonClass: 'btn btn-secondary m-1',
        confirmButtonText: 'Yes, Submit it!',
        html: false,
    }).then((result) => {
        LoadingBlockUI();
        if (result.value) {
            $.ajax({
                method: 'post',
                url: submit_route,
                data: originalData,
                dataType: 'json',
                success: function(result) {
                    if (result.status) {
                        if (result.status == 'error') {
                            swal('Failed!', 'An error has occured, please try again!', 'error');
                        } else {
                            $('#publish_more_4').attr('disabled', true);
                            CKEDITOR.instances['js-ckeditor-4'].setReadOnly(true);
                            $('#spin_more_4 *').prop('disabled', true);
                            swal('Success!', 'Submission Completed', 'success');
                        }
                    } else {
                        if (result.message)
                            swal('Error', result.message, 'error');
                        else
                            swal('Error', 'Something went wrong!', 'error');
                    }
                    LoadingUnblockUI();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    swal('Error', 'Something went wrong!', 'error');
                    LoadingUnblockUI();
                },
            })
        }
    });
});
$('#sites_select_4').on('change', function() {
    var selected = [];
    if ($("#sites_select_4").select2('data').length) {
        $.each($("#sites_select_4").select2('data'), function(key, item) {
            selected.push(item.text);
        });
    }
    selected = selected.toString().split(',').join(', ');
    $('#table_title_5').html($('#title_4').val());
    $('#table_sites_5').html(selected);
});
//SUBMISSION BUTTONS END

//keywords for spinmore 1
//keyword 1
$('#keyword1_a').on('click', function() {
    var keyword_number = $(this).data('keyword');
    var keyword_replace = $('#keyword' + keyword_number + '_btn').html();
    if (
        $('#keyword1_find_word_a').val().trim() &&
        $('#keyword1_find_word_2_a').val().trim() &&
        $('#keyword1_find_word_3_a').val().trim() &&
        $('#keyword1_link_a').val().trim()
    ) {
        if (
            keyword1_find_word_a != $('#keyword1_find_word_a').val() &&
            keyword1_find_word_2_a != $('#keyword1_find_word_2_a').val() &&
            keyword1_find_word_3_a != $('#keyword1_find_word_2_a').val() &&
            keyword1_replace_word_a != keyword_replace &&
            keyword1_link_a != $('#keyword1_link_a').val()
        ) {
            var article_body = CKEDITOR.instances['js-ckeditor-1'].getData();
            keyword1_find_word_a = $('#keyword1_find_word_a').val();
            keyword1_find_word_2_a = $('#keyword1_find_word_2_a').val();
            keyword1_find_word_3_a = $('#keyword1_find_word_3_a').val();
            keyword1_replace_word_a = keyword_replace;
            keyword1_link_a = $('#keyword1_link_a').val();
            if (!keyword1_link_a.includes('http://') || !keyword1_link_a.includes('https://')) {
                keyword1_link_a = 'http://' + $('#keyword1_link_a').val();
            }
            var a_tag = '<a href="' + keyword1_link_a + '">' + keyword1_replace_word_a.charAt(0).toLowerCase() + keyword1_replace_word_a.substr(1) + '</a>'

            // find the index of last time word was used
            var first_instance = article_body.toLowerCase().indexOf(keyword1_find_word_2_a.toLowerCase());
            var last_instance = article_body.toLowerCase().lastIndexOf(keyword1_find_word_3_a.toLowerCase());

            // slice the string in 2, one from the start to the lastIndexOf
            // and then replace the word in the rest
            var pat2 = new RegExp(keyword1_find_word_2_a, 'i');
            var pat3 = new RegExp(keyword1_find_word_3_a, 'i');
            article_body = article_body.slice(0, first_instance) + article_body.slice(first_instance).replace(pat2, a_tag);
            article_body = article_body.slice(0, last_instance) + article_body.slice(last_instance).replace(pat3, a_tag);

            // result abc def test xyz
            CKEDITOR.instances['js-ckeditor-1'].setData(article_body);

            //title
            var article_title = $('#title_1').val();
            var article_title = article_title.replace(keyword1_find_word_a, keyword1_replace_word_a.charAt(0).toLowerCase() + keyword1_replace_word_a.substr(1));
            $('#title_1').val(article_title);
            dashmixAjxNotify('success', 'Word replace.');
        } else {
            dashmixAjxNotify('error', 'Replace Words or Link already used.');
        }
    } else {
        dashmixAjxNotify('error', 'All field must be populated.');
    }
});

//keyword 2
$('#keyword2_a').on('click', function() {
    var keyword_number = $(this).data('keyword');
    var keyword_replace = $('#keyword' + keyword_number + '_btn').html();
    if (
        $('#keyword2_find_word_a').val().trim() &&
        $('#keyword2_link_a').val().trim()
    ) {
        if (
            keyword_replace == keyword1_find_word_a
        ) {
            dashmixAjxNotify('error', 'Word already replaced.');
        } else {
            if (
                keyword2_find_word_a != $('#keyword2_find_word_a').val() &&
                keyword2_replace_word_a != keyword_replace &&
                keyword2_link_a != $('#keyword2_link_a').val()
            ) {
                var article_body = CKEDITOR.instances['js-ckeditor-1'].getData();
                keyword2_find_word_a = $('#keyword2_find_word_a').val();
                keyword2_replace_word_a = keyword_replace;
                keyword2_link_a = $('#keyword2_link_a').val();
                if (!keyword2_link_a.includes('http://') || !keyword2_link_a.includes('https://')) {
                    keyword2_link_a = 'http://' + $('#keyword2_link_a').val();
                }
                var a_tag = '<a href="' + keyword2_link_a + '">' + keyword2_replace_word_a.charAt(0).toLowerCase() + keyword2_replace_word_a.substr(1) + '</a>'
                    // find the index of last time word was used
                var first_instance = article_body.toLowerCase().indexOf(keyword2_find_word_a.toLowerCase());

                // slice the string in 2, one from the start to the indexOf
                // and then replace the word in the rest
                var pat = new RegExp(keyword2_find_word_a, 'i')
                article_body = article_body.slice(0, first_instance) + article_body.slice(first_instance).replace(pat, a_tag);

                // result abc def test xyz
                CKEDITOR.instances['js-ckeditor-1'].setData(article_body);
                dashmixAjxNotify('success', 'Word replace.');
            } else {
                dashmixAjxNotify('error', 'Replace Word or Link already used.');
            }
        }
    } else {
        dashmixAjxNotify('error', 'All field must be populated.');
    }
});

//keyword 3
$('#keyword3_a').on('click', function() {
    var keyword_number = $(this).data('keyword');
    var keyword_replace = $('#keyword' + keyword_number + '_btn').html();
    if (
        $('#keyword3_find_word_a').val().trim() &&
        $('#keyword3_link_a').val().trim()
    ) {
        if (
            keyword_replace == keyword1_find_word_a ||
            keyword_replace == keyword2_find_word_a
        ) {
            dashmixAjxNotify('error', 'Word already replaced.');
        } else {
            if (
                keyword3_find_word_a != $('#keyword3_find_word_a').val() &&
                keyword3_replace_word_a != keyword_replace &&
                keyword3_link_a != $('#keyword3_link_a').val()
            ) {
                var article_body = CKEDITOR.instances['js-ckeditor-1'].getData();
                keyword3_find_word_a = $('#keyword3_find_word_a').val();
                keyword3_replace_word_a = keyword_replace;
                keyword3_link_a = $('#keyword3_link_a').val();
                if (!keyword3_link_a.includes('http://') || !keyword3_link_a.includes('https://')) {
                    keyword3_link_a = 'http://' + $('#keyword3_link_a').val();
                }
                var a_tag = '<a href="' + keyword3_link_a + '">' + keyword3_replace_word_a.charAt(0).toLowerCase() + keyword3_replace_word_a.substr(1) + '</a>'
                    // find the index of last time word was used
                var last_instance = article_body.toLowerCase().lastIndexOf(keyword3_find_word_a.toLowerCase());

                // slice the string in 2, one from the start to the lastIndexOf
                // and then replace the word in the rest
                var pat = new RegExp(keyword3_find_word_a, 'i')
                article_body = article_body.slice(0, last_instance) + article_body.slice(last_instance).replace(pat, a_tag);

                // result abc def test xyz
                CKEDITOR.instances['js-ckeditor-1'].setData(article_body);
                dashmixAjxNotify('success', 'Word replace.');
            } else {
                dashmixAjxNotify('error', 'Replace Word or Link already used.');
            }
        }
    } else {
        dashmixAjxNotify('error', 'All field must be populated.');
    }
});

//keywords for spinmore 2
//keyword 1
$('#keyword1_b').on('click', function() {
    var keyword_number = $(this).data('keyword');
    var keyword_replace = $('#keyword' + keyword_number + '_btn').html();
    console.log($('#keyword1_find_word_b').val());
    console.log($('#keyword1_find_word_2_b').val());
    console.log($('#keyword1_find_word_3_b').val());
    console.log($('#keyword1_link_b').val());
    if (
        $('#keyword1_find_word_b').val().trim() &&
        $('#keyword1_find_word_2_b').val().trim() &&
        $('#keyword1_find_word_3_b').val().trim() &&
        $('#keyword1_link_b').val().trim()
    ) {
        if (
            keyword1_find_word_b != $('#keyword1_find_word_b').val() &&
            keyword1_find_word_2_b != $('#keyword1_find_word_2_b').val() &&
            keyword1_find_word_3_b != $('#keyword1_find_word_2_b').val() &&
            keyword1_replace_word_b != keyword_replace &&
            keyword1_link_b != $('#keyword1_link_b').val()
        ) {
            var article_body = CKEDITOR.instances['js-ckeditor-2'].getData();
            keyword1_find_word_b = $('#keyword1_find_word_b').val();
            keyword1_find_word_2_b = $('#keyword1_find_word_2_b').val();
            keyword1_find_word_3_b = $('#keyword1_find_word_3_b').val();
            keyword1_replace_word_b = keyword_replace;
            keyword1_link_b = $('#keyword1_link_b').val();
            if (!keyword1_link_b.includes('http://') || !keyword1_link_b.includes('https://')) {
                keyword1_link_b = 'http://' + $('#keyword1_link_b').val();
            }
            var a_tag = '<a href="' + keyword1_link_b + '">' + keyword1_replace_word_b.charAt(0).toLowerCase() + keyword1_replace_word_b.substr(1) + '</a>'

            // find the index of last time word was used
            var first_instance = article_body.toLowerCase().indexOf(keyword1_find_word_2_b.toLowerCase());
            var last_instance = article_body.toLowerCase().lastIndexOf(keyword1_find_word_3_b.toLowerCase());

            // slice the string in 2, one from the start to the lastIndexOf
            // and then replace the word in the rest
            var pat2 = new RegExp(keyword1_find_word_2_b, 'i');
            var pat3 = new RegExp(keyword1_find_word_3_b, 'i');
            article_body = article_body.slice(0, first_instance) + article_body.slice(first_instance).replace(pat2, a_tag);
            article_body = article_body.slice(0, last_instance) + article_body.slice(last_instance).replace(pat3, a_tag);

            // result abc def test xyz
            CKEDITOR.instances['js-ckeditor-2'].setData(article_body);

            //title
            var article_title = $('#title_2').val();
            var article_title = article_title.replace(keyword1_find_word_b, keyword1_replace_word_b.charAt(0).toLowerCase() + keyword1_replace_word_b.substr(1));
            $('#title_2').val(article_title);
            dashmixAjxNotify('success', 'Word replace.');
        } else {
            dashmixAjxNotify('error', 'Replace Words or Link already used.');
        }
    } else {
        dashmixAjxNotify('error', 'All field must be populated.');
    }
});

//keyword 2
$('#keyword2_b').on('click', function() {
    var keyword_number = $(this).data('keyword');
    var keyword_replace = $('#keyword' + keyword_number + '_btn').html();
    if (
        $('#keyword2_find_word_b').val().trim() &&
        $('#keyword2_link_b').val().trim()
    ) {
        if (
            keyword_replace == keyword1_find_word_b
        ) {
            dashmixAjxNotify('error', 'Word already replaced.');
        } else {
            if (
                keyword2_find_word_b != $('#keyword2_find_word_b').val() &&
                keyword2_replace_word_b != keyword_replace &&
                keyword2_link_b != $('#keyword2_link_b').val()
            ) {
                var article_body = CKEDITOR.instances['js-ckeditor-2'].getData();
                keyword2_find_word_b = $('#keyword2_find_word_b').val();
                keyword2_replace_word_b = keyword_replace;
                keyword2_link_b = $('#keyword2_link_b').val();
                if (!keyword2_link_b.includes('http://') || !keyword2_link_b.includes('https://')) {
                    keyword2_link_b = 'http://' + $('#keyword2_link_b').val();
                }
                var a_tag = '<a href="' + keyword2_link_b + '">' + keyword2_replace_word_b.charAt(0).toLowerCase() + keyword2_replace_word_b.substr(1) + '</a>'
                    // find the index of last time word was used
                var first_instance = article_body.toLowerCase().indexOf(keyword2_find_word_b.toLowerCase());

                // slice the string in 2, one from the start to the indexOf
                // and then replace the word in the rest
                var pat = new RegExp(keyword2_find_word_b, 'i')
                article_body = article_body.slice(0, first_instance) + article_body.slice(first_instance).replace(pat, a_tag);

                // result abc def test xyz
                CKEDITOR.instances['js-ckeditor-2'].setData(article_body);
                dashmixAjxNotify('success', 'Word replace.');
            } else {
                dashmixAjxNotify('error', 'Replace Word or Link already used.');
            }
        }
    } else {
        dashmixAjxNotify('error', 'All field must be populated.');
    }
});

//keyword 3
$('#keyword3_b').on('click', function() {
    var keyword_number = $(this).data('keyword');
    var keyword_replace = $('#keyword' + keyword_number + '_btn').html();
    if (
        $('#keyword3_find_word_b').val().trim() &&
        $('#keyword3_link_b').val().trim()
    ) {
        if (
            keyword_replace == keyword1_find_word_b ||
            keyword_replace == keyword2_find_word_b
        ) {
            dashmixAjxNotify('error', 'Word already replaced.');
        } else {
            if (
                keyword3_find_word_b != $('#keyword3_find_word_b').val() &&
                keyword3_replace_word_b != keyword_replace &&
                keyword3_link_b != $('#keyword3_link_b').val()
            ) {
                var article_body = CKEDITOR.instances['js-ckeditor-2'].getData();
                keyword3_find_word_b = $('#keyword3_find_word_b').val();
                keyword3_replace_word_b = keyword_replace;
                keyword3_link_b = $('#keyword3_link_b').val();
                if (!keyword3_link_b.includes('http://') || !keyword3_link_b.includes('https://')) {
                    keyword3_link_b = 'http://' + $('#keyword3_link_b').val();
                }
                var a_tag = '<a href="' + keyword3_link_b + '">' + keyword3_replace_word_b.charAt(0).toLowerCase() + keyword3_replace_word_b.substr(1) + '</a>'
                    // find the index of last time word was used
                var last_instance = article_body.toLowerCase().lastIndexOf(keyword3_find_word_b.toLowerCase());

                // slice the string in 2, one from the start to the lastIndexOf
                // and then replace the word in the rest
                var pat = new RegExp(keyword3_find_word_b, 'i')
                article_body = article_body.slice(0, last_instance) + article_body.slice(last_instance).replace(pat, a_tag);

                // result abc def test xyz
                CKEDITOR.instances['js-ckeditor-2'].setData(article_body);
                dashmixAjxNotify('success', 'Word replace.');
            } else {
                dashmixAjxNotify('error', 'Replace Word or Link already used.');
            }
        }
    } else {
        dashmixAjxNotify('error', 'All field must be populated.');
    }
});

//keywords for spinmore 3
//keyword 1
$('#keyword1_c').on('click', function() {
    var keyword_number = $(this).data('keyword');
    var keyword_replace = $('#keyword' + keyword_number + '_btn').html();
    console.log($('#keyword1_find_word_c').val());
    console.log($('#keyword1_find_word_2_c').val());
    console.log($('#keyword1_find_word_3_c').val());
    console.log($('#keyword1_link_c').val());
    if (
        $('#keyword1_find_word_c').val().trim() &&
        $('#keyword1_find_word_2_c').val().trim() &&
        $('#keyword1_find_word_3_c').val().trim() &&
        $('#keyword1_link_c').val().trim()
    ) {
        if (
            keyword1_find_word_c != $('#keyword1_find_word_c').val() &&
            keyword1_find_word_2_c != $('#keyword1_find_word_2_c').val() &&
            keyword1_find_word_3_c != $('#keyword1_find_word_2_c').val() &&
            keyword1_replace_word_c != keyword_replace &&
            keyword1_link_c != $('#keyword1_link_c').val()
        ) {
            var article_cody = CKEDITOR.instances['js-ckeditor-3'].getData();
            keyword1_find_word_c = $('#keyword1_find_word_c').val();
            keyword1_find_word_2_c = $('#keyword1_find_word_2_c').val();
            keyword1_find_word_3_c = $('#keyword1_find_word_3_c').val();
            keyword1_replace_word_c = keyword_replace;
            keyword1_link_c = $('#keyword1_link_c').val();
            if (!keyword1_link_c.includes('http://') || !keyword1_link_c.includes('https://')) {
                keyword1_link_c = 'http://' + $('#keyword1_link_c').val();
            }
            var a_tag = '<a href="' + keyword1_link_c + '">' + keyword1_replace_word_c.charAt(0).toLowerCase() + keyword1_replace_word_c.substr(1) + '</a>'

            // find the index of last time word was used
            var first_instance = article_cody.toLowerCase().indexOf(keyword1_find_word_2_c.toLowerCase());
            var last_instance = article_cody.toLowerCase().lastIndexOf(keyword1_find_word_3_c.toLowerCase());

            // slice the string in 2, one from the start to the lastIndexOf
            // and then replace the word in the rest
            var pat2 = new RegExp(keyword1_find_word_2_c, 'i');
            var pat3 = new RegExp(keyword1_find_word_3_c, 'i');
            article_cody = article_cody.slice(0, first_instance) + article_cody.slice(first_instance).replace(pat2, a_tag);
            article_cody = article_cody.slice(0, last_instance) + article_cody.slice(last_instance).replace(pat3, a_tag);

            // result abc def test xyz
            CKEDITOR.instances['js-ckeditor-3'].setData(article_cody);

            //title
            var article_title = $('#title_3').val();
            var article_title = article_title.replace(keyword1_find_word_c, keyword1_replace_word_c.charAt(0).toLowerCase() + keyword1_replace_word_c.substr(1));
            $('#title_3').val(article_title);
            dashmixAjxNotify('success', 'Word replace.');
        } else {
            dashmixAjxNotify('error', 'Replace Words or Link already used.');
        }
    } else {
        dashmixAjxNotify('error', 'All field must be populated.');
    }
});

//keyword 2
$('#keyword2_c').on('click', function() {
    var keyword_number = $(this).data('keyword');
    var keyword_replace = $('#keyword' + keyword_number + '_btn').html();
    if (
        $('#keyword2_find_word_c').val().trim() &&
        $('#keyword2_link_c').val().trim()
    ) {
        if (
            keyword_replace == keyword1_find_word_c
        ) {
            dashmixAjxNotify('error', 'Word already replaced.');
        } else {
            if (
                keyword2_find_word_c != $('#keyword2_find_word_c').val() &&
                keyword2_replace_word_c != keyword_replace &&
                keyword2_link_c != $('#keyword2_link_c').val()
            ) {
                var article_cody = CKEDITOR.instances['js-ckeditor-3'].getData();
                keyword2_find_word_c = $('#keyword2_find_word_c').val();
                keyword2_replace_word_c = keyword_replace;
                keyword2_link_c = $('#keyword2_link_c').val();
                if (!keyword2_link_c.includes('http://') || !keyword2_link_c.includes('https://')) {
                    keyword2_link_c = 'http://' + $('#keyword2_link_c').val();
                }
                var a_tag = '<a href="' + keyword2_link_c + '">' + keyword2_replace_word_c.charAt(0).toLowerCase() + keyword2_replace_word_c.substr(1) + '</a>'
                    // find the index of last time word was used
                var first_instance = article_cody.toLowerCase().indexOf(keyword2_find_word_c.toLowerCase());

                // slice the string in 2, one from the start to the indexOf
                // and then replace the word in the rest
                var pat = new RegExp(keyword2_find_word_c, 'i')
                article_cody = article_cody.slice(0, first_instance) + article_cody.slice(first_instance).replace(pat, a_tag);

                // result abc def test xyz
                CKEDITOR.instances['js-ckeditor-3'].setData(article_cody);
                dashmixAjxNotify('success', 'Word replace.');
            } else {
                dashmixAjxNotify('error', 'Replace Word or Link already used.');
            }
        }
    } else {
        dashmixAjxNotify('error', 'All field must be populated.');
    }
});

//keyword 3
$('#keyword3_c').on('click', function() {
    var keyword_number = $(this).data('keyword');
    var keyword_replace = $('#keyword' + keyword_number + '_btn').html();
    if (
        $('#keyword3_find_word_c').val().trim() &&
        $('#keyword3_link_c').val().trim()
    ) {
        if (
            keyword_replace == keyword1_find_word_c ||
            keyword_replace == keyword2_find_word_c
        ) {
            dashmixAjxNotify('error', 'Word already replaced.');
        } else {
            if (
                keyword3_find_word_c != $('#keyword3_find_word_c').val() &&
                keyword3_replace_word_c != keyword_replace &&
                keyword3_link_c != $('#keyword3_link_c').val()
            ) {
                var article_cody = CKEDITOR.instances['js-ckeditor-3'].getData();
                keyword3_find_word_c = $('#keyword3_find_word_c').val();
                keyword3_replace_word_c = keyword_replace;
                keyword3_link_c = $('#keyword3_link_c').val();
                if (!keyword3_link_c.includes('http://') || !keyword3_link_c.includes('https://')) {
                    keyword3_link_c = 'http://' + $('#keyword3_link_c').val();
                }
                var a_tag = '<a href="' + keyword3_link_c + '">' + keyword3_replace_word_c.charAt(0).toLowerCase() + keyword3_replace_word_c.substr(1) + '</a>'
                    // find the index of last time word was used
                var last_instance = article_cody.toLowerCase().lastIndexOf(keyword3_find_word_c.toLowerCase());

                // slice the string in 2, one from the start to the lastIndexOf
                // and then replace the word in the rest
                var pat = new RegExp(keyword3_find_word_c, 'i')
                article_cody = article_cody.slice(0, last_instance) + article_cody.slice(last_instance).replace(pat, a_tag);

                // result abc def test xyz
                CKEDITOR.instances['js-ckeditor-3'].setData(article_cody);
                dashmixAjxNotify('success', 'Word replace.');
            } else {
                dashmixAjxNotify('error', 'Replace Word or Link already used.');
            }
        }
    } else {
        dashmixAjxNotify('error', 'All field must be populated.');
    }
});

//keywords for spinmore 4
//keyword 1
$('#keyword1_d').on('click', function() {
    var keyword_number = $(this).data('keyword');
    var keyword_replace = $('#keyword' + keyword_number + '_btn').html();
    console.log($('#keyword1_find_word_d').val());
    console.log($('#keyword1_find_word_2_d').val());
    console.log($('#keyword1_find_word_3_d').val());
    console.log($('#keyword1_link_d').val());
    if (
        $('#keyword1_find_word_d').val().trim() &&
        $('#keyword1_find_word_2_d').val().trim() &&
        $('#keyword1_find_word_3_d').val().trim() &&
        $('#keyword1_link_d').val().trim()
    ) {
        if (
            keyword1_find_word_d != $('#keyword1_find_word_d').val() &&
            keyword1_find_word_2_d != $('#keyword1_find_word_2_d').val() &&
            keyword1_find_word_3_d != $('#keyword1_find_word_2_d').val() &&
            keyword1_replace_word_d != keyword_replace &&
            keyword1_link_d != $('#keyword1_link_d').val()
        ) {
            var article_dody = CKEDITOR.instances['js-ckeditor-4'].getData();
            keyword1_find_word_d = $('#keyword1_find_word_d').val();
            keyword1_find_word_2_d = $('#keyword1_find_word_2_d').val();
            keyword1_find_word_3_d = $('#keyword1_find_word_3_d').val();
            keyword1_replace_word_d = keyword_replace;
            keyword1_link_d = $('#keyword1_link_d').val();
            if (!keyword1_link_d.includes('http://') || !keyword1_link_d.includes('https://')) {
                keyword1_link_d = 'http://' + $('#keyword1_link_d').val();
            }
            var a_tag = '<a href="' + keyword1_link_d + '">' + keyword1_replace_word_d.charAt(0).toLowerCase() + keyword1_replace_word_d.substr(1) + '</a>'

            // find the index of last time word was used
            var first_instance = article_dody.toLowerCase().indexOf(keyword1_find_word_2_d.toLowerCase());
            var last_instance = article_dody.toLowerCase().lastIndexOf(keyword1_find_word_3_d.toLowerCase());

            // slice the string in 2, one from the start to the lastIndexOf
            // and then replace the word in the rest
            var pat2 = new RegExp(keyword1_find_word_2_d, 'i');
            var pat3 = new RegExp(keyword1_find_word_3_d, 'i');
            article_dody = article_dody.slice(0, first_instance) + article_dody.slice(first_instance).replace(pat2, a_tag);
            article_dody = article_dody.slice(0, last_instance) + article_dody.slice(last_instance).replace(pat3, a_tag);

            // result abc def test xyz
            CKEDITOR.instances['js-ckeditor-4'].setData(article_dody);

            //title
            var article_title = $('#title_4').val();
            var article_title = article_title.replace(keyword1_find_word_d, keyword1_replace_word_d.charAt(0).toLowerCase() + keyword1_replace_word_d.substr(1));
            $('#title_4').val(article_title);
            dashmixAjxNotify('success', 'Word replace.');
        } else {
            dashmixAjxNotify('error', 'Replace Words or Link already used.');
        }
    } else {
        dashmixAjxNotify('error', 'All field must be populated.');
    }
});

//keyword 2
$('#keyword2_d').on('click', function() {
    var keyword_number = $(this).data('keyword');
    var keyword_replace = $('#keyword' + keyword_number + '_btn').html();
    if (
        $('#keyword2_find_word_d').val().trim() &&
        $('#keyword2_link_d').val().trim()
    ) {
        if (
            keyword_replace == keyword1_find_word_d
        ) {
            dashmixAjxNotify('error', 'Word already replaced.');
        } else {
            if (
                keyword2_find_word_d != $('#keyword2_find_word_d').val() &&
                keyword2_replace_word_d != keyword_replace &&
                keyword2_link_d != $('#keyword2_link_d').val()
            ) {
                var article_dody = CKEDITOR.instances['js-ckeditor-4'].getData();
                keyword2_find_word_d = $('#keyword2_find_word_d').val();
                keyword2_replace_word_d = keyword_replace;
                keyword2_link_d = $('#keyword2_link_d').val();
                if (!keyword2_link_d.includes('http://') || !keyword2_link_d.includes('https://')) {
                    keyword2_link_d = 'http://' + $('#keyword2_link_d').val();
                }
                var a_tag = '<a href="' + keyword2_link_d + '">' + keyword2_replace_word_d.charAt(0).toLowerCase() + keyword2_replace_word_d.substr(1) + '</a>'
                    // find the index of last time word was used
                var first_instance = article_dody.toLowerCase().indexOf(keyword2_find_word_d.toLowerCase());

                // slice the string in 2, one from the start to the indexOf
                // and then replace the word in the rest
                var pat = new RegExp(keyword2_find_word_d, 'i')
                article_dody = article_dody.slice(0, first_instance) + article_dody.slice(first_instance).replace(pat, a_tag);

                // result abc def test xyz
                CKEDITOR.instances['js-ckeditor-4'].setData(article_dody);
                dashmixAjxNotify('success', 'Word replace.');
            } else {
                dashmixAjxNotify('error', 'Replace Word or Link already used.');
            }
        }
    } else {
        dashmixAjxNotify('error', 'All field must be populated.');
    }
});

//keyword 3
$('#keyword3_d').on('click', function() {
    var keyword_number = $(this).data('keyword');
    var keyword_replace = $('#keyword' + keyword_number + '_btn').html();
    if (
        $('#keyword3_find_word_d').val().trim() &&
        $('#keyword3_link_d').val().trim()
    ) {
        if (
            keyword_replace == keyword1_find_word_d ||
            keyword_replace == keyword2_find_word_d
        ) {
            dashmixAjxNotify('error', 'Word already replaced.');
        } else {
            if (
                keyword3_find_word_d != $('#keyword3_find_word_d').val() &&
                keyword3_replace_word_d != keyword_replace &&
                keyword3_link_d != $('#keyword3_link_d').val()
            ) {
                var article_dody = CKEDITOR.instances['js-ckeditor-4'].getData();
                keyword3_find_word_d = $('#keyword3_find_word_d').val();
                keyword3_replace_word_d = keyword_replace;
                keyword3_link_d = $('#keyword3_link_d').val();
                if (!keyword3_link_d.includes('http://') || !keyword3_link_d.includes('https://')) {
                    keyword3_link_d = 'http://' + $('#keyword3_link_d').val();
                }
                var a_tag = '<a href="' + keyword3_link_d + '">' + keyword3_replace_word_d.charAt(0).toLowerCase() + keyword3_replace_word_d.substr(1) + '</a>'
                    // find the index of last time word was used
                var last_instance = article_dody.toLowerCase().lastIndexOf(keyword3_find_word_d.toLowerCase());

                // slice the string in 2, one from the start to the lastIndexOf
                // and then replace the word in the rest
                var pat = new RegExp(keyword3_find_word_d, 'i')
                article_dody = article_dody.slice(0, last_instance) + article_dody.slice(last_instance).replace(pat, a_tag);

                // result abc def test xyz
                CKEDITOR.instances['js-ckeditor-4'].setData(article_dody);
                dashmixAjxNotify('success', 'Word replace.');
            } else {
                dashmixAjxNotify('error', 'Replace Word or Link already used.');
            }
        }
    } else {
        dashmixAjxNotify('error', 'All field must be populated.');
    }
});
