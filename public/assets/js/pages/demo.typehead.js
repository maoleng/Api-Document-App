$(document).ready(function() {
var a = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: "https://raw.githubusercontent.com/twitter/typeahead.js/gh-pages/data/countries.json"
    });
    $("#prefetch").typeahead(null, {
        name: "countries",
        source: a
    });

});