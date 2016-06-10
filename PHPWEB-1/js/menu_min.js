(function($) {
    $.fn.menu = function(b) {
        var c,
        item,
        httpAdress;
        b = jQuery.extend({
            Speed: 800,
            //autostart: 1,
            autohide: 1
        },
        b);
        c = $(this);
        item = c.children("ul").parent("li").children("a");
        httpAdress = window.location;
        item.addClass("inactive");
        function _item() {
            var a = $(this);
            if (b.autohide) {
                a.parent().parent().find(".active").parent("li").children("ul").slideUp(b.Speed / 1.2,
                function() {
                    $(this).parent("li").children("a").removeAttr("class");
                    $(this).parent("li").children("a").attr("class", "inactive")
                })
            }
            if (a.attr("class") == "inactive" && !a.attr("id")) {
                a.removeAttr("class");
                a.addClass("active open");
                if(a.parent("li").children().length > 0)
                {
                    a.parent("li").children("ul").slideDown(b.Speed);
                }
            }
             //if(a.attr("class") == "active")
            else
            {
                a.removeAttr("class");
                a.addClass("inactive");
                if(a.parent("li").children().length > 0)
                {
                    a.parent("li").children("ul").slideUp(b.Speed);
                }

            }
        }
        item.unbind('click').click(_item);
        //if (b.autostart) {
        //    c.children("a").each(function() {
        //        if (this.href == httpAdress) {
        //            $(this).parent("li").parent("ul").slideDown(b.Speed,
        //            function() {
        //                $(this).parent("li").children(".inactive").removeAttr("class");
        //                $(this).parent("li").children("a").addClass("active")
        //            })
        //        }
        //    })
        //}
    }
})(jQuery);