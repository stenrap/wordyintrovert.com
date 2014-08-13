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
            if (emailAddress.indexOf("@") == -1) {
                return;
            }
            $("#newsletter-email-input").val("");
            $.ajax({
                data: {email: emailAddress},
                type: "POST",
                url: "/wp-content/themes/wordyintrovert/subscribe.php"
            });
            $("#subscribed-dialog").dialog("open");
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

    $("#subscribed-dialog").dialog({
        autoOpen:      false,
        buttons:       [ { text:"OK", click:function() { $(this).dialog("close"); } } ],
        closeOnEscape: false,
        draggable:     false,
        modal:         true,
        resizable:     false,
        title:         "Subscribed!"
    });


    /* ----- The donate.ly Dialog ----- */

    $("#donate-dialog").dialog({
        autoOpen:      false,
        closeOnEscape: false,
        draggable:     false,
        modal:         true,
        resizable:     false,
        title:         "Thank You!"
    });

    $("#donate-button").click(function() {
        $("#donate-dialog").dialog("open");
    });

    $("#donate-link").click(function(event) {
        event.preventDefault();
        $("#donate-dialog").dialog("open");
    });


    /* ----- Facebook Share Button ----- */

    WI.FacebookShare = Backbone.View.extend({

        openShareDialog: function() {
            var urlToShare = this.$el.data("url");
            FB.ui({
                method: 'share',
                href: urlToShare
            }, function (response){});
        },

        events: {
            "click": "openShareDialog"
        }

    });

    new WI.FacebookShare({
        el: "#facebook-share"
    });

});