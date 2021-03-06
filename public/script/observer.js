function Observer(){
  return {
    _value: {},
    listeners: [],
    set: function(val, index) {
      if(index == null) {
        index = "value";
      }
      if(this._value[index] != val) {
        this._value[index] = val;
        for(var i = 0; i < this.listeners.length; i++) {
          this.listeners[i](this._value, index);
        }
      }
    },
    get: function(index) {
      if(index == null) {
        index = "value";
      }
      return this._value[index];
    },
    addListener: function(listener) {
      this.listeners[this.listeners.length] = listener;
    }
  }
}
