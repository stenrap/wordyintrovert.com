var WI = WI || {};

$(function() {

    'use strict';

    /* ===== Mobile Nav ===== */
    WI.MobileMenuButton = Backbone.View.extend({

        /* WYLO: This is a freaking mess. Come up with something that doesn't suck. */

        toggleMenu: function() {
            if ($("#menu-items").hasClass("visible")) {
                if ($("#menu-items").hasClass("displayNone")) {
                    $("#menu-items").removeClass("displayNone");
                }
            } else {
                if (!$("#menu-items").hasClass("displayNone")) {
                    $("#menu-items").addClass("displayNone");
                }
            }
        },

        onResizeWindow: function(event) {
            if ($("#menu-button").css("display") === "none") {
                $("#menu-items").removeClass("displayNone");
            }
        },

        initialize: function() {
            $("#menu-items").addClass("displayNone");
            if ($("#menu-button").css("display") === "none") {
                $("#menu-items").addClass("visible");
                this.toggleMenu();
            }
            $(window).resize(this.onResizeWindow);
        },

        onMenuClick: function() {
            if ($("#menu-items").hasClass("visible")) {
                $("#menu-items").removeClass("visible");
            } else {
                $("#menu-items").addClass("visible");
            }
            this.toggleMenu();
        },

        events: {
            "click #menu-button": "onMenuClick"
        }

    });

    new WI.MobileMenuButton();

});