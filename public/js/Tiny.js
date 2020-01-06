class TinyMce
{
    constructor()
    {

    }

    loadTiny()
    {
        tinymce.init({
            selector: '#Article',
            resize: false,
            content_css : "../css/Style.css"
        });
    }
}

let tiny = new TinyMce();
tiny.loadTiny();