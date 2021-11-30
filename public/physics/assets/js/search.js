var path = location.origin+"/search";
console.log(path);

$('input.typeahead').typeahead({
  source:  function (query, process) {
    return jQuery.get(path, { query: query }, function (data) {
            return process(data);
        });
    },
    updater: function (data) {
        console.log(window.location.href ="/search-result/"+data);
    }
});