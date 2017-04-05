function Templater(template, container){
  return {
    _template: $(template),
    _container: $(container),
    add: function(variables) {
      var content = this._template.html();
      for(var key in variables) {
        var value = variables[key];
        var id = "{"+key+"}";
        var re = new RegExp(id, "g");
        content = content.replace(re, value);
      }
      this._container.append(content);
    },
    clear: function(){
      this._container.html("");
    }
  }
}
