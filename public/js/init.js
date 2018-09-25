document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems);
    elems = document.querySelectorAll('.materialboxed');
    instances = M.Materialbox.init(elems);
    if (typeof message !== 'undefined') {
        M.toast({html: message});
    }
});