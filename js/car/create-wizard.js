/**
 * Created with JetBrains PhpStorm.
 * User: f.bacher
 * Date: 09.08.13
 * Time: 08:54
 * To change this template use File | Settings | File Templates.
 */
var wizard;

var carOptionTemplate = "{{#carOptions}}" +
    "<li class='carOptionItem' value='{{id}}'>{{description}} - {{price}}</li>" +
"{{/carOptions}}";

$(document).ready(function() {
    // get container for the wizard and initialize its exposing
    wizard = $("#wizard_tabs").expose({lazy: false});

    // enable exposing on the wizard
    wizard.click(function() {
        //$(this).expose().load();
    });

    // enable tabs that are contained within the wizard
    $("ul.tabs", wizard).tabs("div.panes > div", function(event, index) {

        if (index == 1) {
            //we are at the "select-options" step
            loadCarOptions();
        }
        /* now we are inside the onBeforeClick event */

        // ensure that the "terms" checkbox is checked.
        /*
        var terms = $("#terms");
        if (index > 0 && !terms.get(0).checked)  {
            terms.parent().addClass("error");

            // when false is returned, the user cannot advance to the next tab
            return false;
        }

        // everything is ok. remove possible red highlight from the terms
        terms.parent().removeClass("error");
        */
    });

    //register event listeners for the Create-buttons
    $('input[name="yt0"]').click(submitCarVersion);
});

function submitCarVersion(e) {
    console.log("clicked Create car version button");
    //prevent default form submit -> we don't need no stinking page reload
    e.preventDefault();
    //submit the form with ajax instead
    $.ajax({
        url: window.location + '?isAjax=true&action=createCarVersion', //the current url, i.e., the car controller's create action
        type: 'POST',
        data: $('#car-version-form').serialize()
    }).done(function(data) { //gets called when the server's response is received
            console.log(data);
            data = $.parseJSON(data);
            if (data.success == true) {
                var carVersionId = data.carVersionId;
                $('input[name="Car[car_version_id]"]').val(carVersionId);   //set the car_version_id of the Car form
                progressWizard();
            } else {
                console.log(data.errors);
            }
        });
}

function loadCarOptions() {
    $.ajax({
        url: window.location + '?isAjax=true&action=getCarOptions', //the current url, i.e., the car controller's create action
        type: 'POST'
    }).done(function(data) {
            data = $.parseJSON(data);
            if (data.success) {
                console.log(data.carOptions);
                var carOptionsItems = Mustache.render(carOptionTemplate, data); //render the options and insert them into the list
                console.log(carOptionsItems);
                $('#optionsList').hide();
                $('#optionsList').html(carOptionsItems);
                $('#optionsList').fadeIn('slow', function() {
                    $('.carOptionItem').click(optionSelected);
                });
            }
        });
}

function progressWizard() {
    var api = $("ul.tabs", wizard).data("tabs");
    api.next();
}

function optionSelected() {
    var carOption = $(this);
    $('.carOptionItem').animate({opacity: 0.3}, 500, function() {
            carOption.animate({opacity: 1.0}, 500, function(){
                $('input[name="Car[car_option_id]"]').val(carOption.attr('value'));
            });
        }
    );

}
