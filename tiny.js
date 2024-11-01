(function() {
    tinymce.create("tinymce.plugins.stylnkz_button", {

        //url argument holds the absolute url of our plugin directory
        init : function(ed, url) {

            //add new button
            ed.addButton("stylishinternallinks", {
                title : "Insert New Stylish Internal Links",
                cmd : "stylelnks",
                image : "https://www.mskian.com/plugins/stylnk-srtbutton.png"
            });

            //button functionality.
            ed.addCommand("stylelnks", function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '[mlink subhd="SUB HEADING" link="YOUR POST LINK"]YOUR POST TITLE[/mlink]';
                ed.execCommand("mceInsertContent", 0, return_text);
            });

        },

        createControl : function(n, cm) {
            return null;
        },

        getInfo : function() {
            return {
                longname : "Stylish Internal Links",
                author : "santhosh veer",
                version : "1.9"
            };
        }
    });

    tinymce.PluginManager.add("Stylish_Internallink_button", tinymce.plugins.stylnkz_button);
})();
