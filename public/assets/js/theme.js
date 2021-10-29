/**
 * Theme: Lunoz - Admin & Dashboard Template
 * Author: Myra Studio
 * File: Main Js
 */


(function ($) {

    'use strict';

    function initDropdownMenu() {
        $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
            if (!$(this).next().hasClass('show')) {
              $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            var $subMenu = $(this).next(".dropdown-menu");
            $subMenu.toggleClass('show');
    
            return false;
        });   
    }

    function initActiveMenu() {
        // === following js will activate the menu in left side bar based on url ====
        $(".topnav-menu .navbar-nav a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) {  
                $(this).addClass("active");
                $(this).parent().addClass("active"); // add active to li of the current link
                $(this).parent().parent().addClass("active");
                $(this).parent().parent().parent().parent().addClass("active");
            }
        });
    }

    function initComponents() {
        // Tooltips
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        // Popovers
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    }

    function init() {
        initDropdownMenu();
        initActiveMenu();
        initComponents();
        Waves.init();
    }

    init();



})(jQuery)

$(document).ready( function() {
    var mod = '';
    var href = '';
    $('[data-toggle="modal"]').on('click', function () {
        mod = $(String($(this).attr('data-target')));
        mod.find('.modal-body').html('<div class="d-flex justify-content-center align-items-center">\n' +
            '    <div class="spinner-border avatar-sm text-primary m-2" role="status"></div>\n'+
            '</div>');
        href = $(this).attr('href');
        if (href !== '#' && href !== undefined)
            mod.find('.modal-body').load(href);
    })

    $('[data-toggle="select2"]').select2();
    $('#add-item-app').on('click', function () {
        $.ajax({
            type: "POST",
            url: "/ajax/app/add-item",
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            success: function(msg){
                $('#app-bk').append(msg);
                $('[data-toggle="select2"]').select2();
            }
        });
    });
    $('#remove-item-app').on('click', function () {
        if($('.app-items').length !== 1) {
            $('.app-items:not(:first)').remove()
        }
    });
    $(document).on('click', '.del-app-item', function() {
        var ind = $(this).parents('.app-items').index();
        if($('.app-items').length !== 1) {
            $('.app-items').eq(ind).remove();
        }
        //console.log(ind);
    });
    $(document).on('change', 'select[name="id_gr[]"]', function() {
        var ind = $(this).parents('.app-items').index();
        $.ajax({
            type: "POST",
            url: "/ajax/app/select-cat",
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            data: {cat:$(this).val()},
            success: function(msg){
                var obj = jQuery.parseJSON( msg );
                if(obj.status === 'yes') {
                    $('#app-bk .app-items').eq(ind).find('select[name="name[]"]').removeAttr('disabled').html(obj.select);
                }
                else{
                    $('#app-bk .app-items').eq(ind).find('select[name="name[]"]').attr('disabled','disabled').html(obj.select);
                }
                $('[data-toggle="select2"]').select2();
            }
        });

    });

});