function Promise(){
  return {
    _chain: [],
    _error: null,
    _index: -1,
    _invalid: false,
    next: null,
    then: function(f) {
      this._chain.push(f);
      return this;
    },

    error: function(f) {
      this._error = f;
      return this;
    },

    call: function(d) {
      this.next = this.next_builder(this);
      this.next(d);
    },

    next_builder: function(t) {
      return function(d){
        t._index ++;
        if(t._index < t._chain.length && !t._invalid) {
          t._chain[t._index](d, t.next, t.on_error(t));
        } else {
          t._invalid = true;
        }
      }
    },

    on_error: function(t) { return function(e) {
        if(! t._invalid) {
          t._invalid = true;
          t._error(e);
        }
      }
    },

  }
}
