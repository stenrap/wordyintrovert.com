var WI = WI || {};

$(function() {

    'use strict';

    /* ----- Mobile Nav ----- */

    WI.MobileMenuButton = Backbone.View.extend({

        toggleMenu: function() {
            if ($("#menu-button").css("display") === "none") {
                $("#menu-items").removeClass("displayNone");
            } else {
                if ($("#menu-items").hasClass("displayNone")) {
                    $("#menu-items").removeClass("displayNone");
                } else {
                    $("#menu-items").addClass("displayNone");
                }
            }
        },

        onResizeWindow: function(event) {
            if ($("#menu-button").css("display") === "none") {
                $("#menu-items").removeClass("displayNone");
            } else {
                $("#menu-items").addClass("displayNone");
            }
        },

        initialize: function() {
            if ($("#menu-button").css("display") === "none") {
                $("#menu-items").removeClass("displayNone");
            }
            $(window).resize(this.onResizeWindow);
        },

        events: {
            "click": "toggleMenu"
        }

    });

    new WI.MobileMenuButton({
        el: "#menu-button"
    });


    /* ----- Email Subscription ----- */

    WI.NewsLetterSubmit = Backbone.View.extend({

        doSubmit: function() {
            var emailAddress = $("#newsletter-email-input").val();
            $("#newsletter-email-input").val("");
            $.ajax({
                data: {email: emailAddress},
                type: "POST",
                url: "/wp-content/themes/wordyintrovert/subscribe.php"
            });
            alert("Thank you for subscribing."); // TODO: Make this not an alert? (Although pink peonies uses an alert here...)
        },

        submitEnter: function(event) {
            if (event.keyCode == 13) {
                this.doSubmit();
            }
        },

        events : {
            "click #newsletter-submit": "doSubmit",
            "keyup #newsletter-email-input": "submitEnter"
        }

    });

    new WI.NewsLetterSubmit({
        el: "#subscribe-box"
    });

});