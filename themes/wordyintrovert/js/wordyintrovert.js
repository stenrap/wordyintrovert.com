var WI = WI || {};

$(function() {

    'use strict';

    /* ===== Mobile Nav ===== */
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

});