/**
 * Directory – Directory & Listing Bootstrap Theme v. 2.0.1
 * Homepage: https://themes.getbootstrap.com/product/directory-directory-listing-bootstrap-4-theme/
 * Copyright 2021, Bootstrapious - https://bootstrapious.com
 */

"use strict";


// var unavailableDate = ["2021-10-25", "2021-10-26", "2021-10-27"]

$(function () {
    var singleMonth = false;
    if ($(window).width() < 767) {
        singleMonth = true;
    }

    var dateRangeConfig = {
        autoClose: true,
        startDate: new Date(),
        selectForward: true,
        applyBtnClass: "btn btn-primary",
        container: ".datepicker-container",
        inline: true,
        singleMonth: singleMonth,
        showDateFilter: function (time, date) {
            return (
                '<div style="padding:0 5px;">\
                            <span style="font-weight:bold">' +
                date + '</div>'
            );
        },
        beforeShowDay: function (t) {
            let ymd = t.getFullYear() +"-"+ (t.getMonth() + 1) +"-"+ t.getDate()

        if($. inArray(ymd, arrResult) == -1){
            return [true, ""]
        }else {
            console.log('hello');
            return [false, "", "Booked"]
        }
        },
        customOpenAnimation: function (cb) {
            $(this).fadeIn(300, cb);
        },
        customCloseAnimation: function (cb) {
            $(this).fadeOut(300, cb);
        },
    };

    
    $("#bookingDate")
        .dateRangePicker(dateRangeConfig)
        .bind("datepicker-opened", function () {
            /* This event will be triggered after date range picker open animation */
            //$('.date-picker-wrapper').css('top', 0);
        });
});
