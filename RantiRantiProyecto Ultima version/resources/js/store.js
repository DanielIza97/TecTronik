import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);
/*
export default {
    state:{
      descripcioncarrito: [7],
    },
    mutations:{
      agregarAlCarrito(state,product){
        state.descripcioncarrito.push(product);
      },
      eliminar:function(state,index){
          var producto = state.descripcioncarrito[index];
          state.descripcioncarrito.splice(index,1);
      }
    },
    getters:{
      items (state) {
        return state.descripcioncarrito;
      }
    },
    actions:{
      agregar({state,commit},descripcioncarrito){
        commit('agregar',descripcioncarrito);
      },
      eliminar({state,commit},descripcioncarrito){
        commit('eliminar',descripcioncarrito);
      }
    },
};*/
/*
const state=()=>({
  descripcioncarrito: [7],
});
const mutations={
  agregarAlCarrito:function(state,product){
    state.descripcioncarrito.push(product);
  },
  eliminar:function(state,index){
      var producto = state.descripcioncarrito[index];
      state.descripcioncarrito.splice(index,1);
  }
}
const getters={
  items (state) {
    return state.descripcioncarrito;
  }
}
const actions={
  agregar({state,commit},descripcioncarrito){
    commit('agregar',descripcioncarrito);
  },
  eliminar({state,commit},descripcioncarrito){
    commit('eliminar',descripcioncarrito);
  }
}
export default new Vuex.Store({
  namespaced: true,
  state,
  getters,
  actions,
  mutations
});*/

export default new Vuex.Store({
    state:{
      descripcioncarrito:0,
      carritocatidad:[]
    },
    mutations:{
      agregar1:function(state,product){
        state.descripcioncarrito=product;
      },
      agregar2:function(state,cantidad){
        state.carritocatidad.push(cantidad);
      },
      eliminar1:function(state,index){
        var producto = state.descripcioncarrito[index];
        state.descripcioncarrito.splice(index,1);
      },
      eliminar2:function(state,index){
        var cantidad=state.carritocatidad[index];
        state.carritocatidad.splice(index,1);
      }
    },
    getters:{
      items (state) {
        return state.descripcioncarrito;
      }
    },
    actions:{
      agregar1({state,commit},descripcioncarrito){
        commit('agregar1',descripcioncarrito);
      },
      agregar2({state,commit},carritocatidad){
        commit('agregar2',carritocatidad);
      },
      eliminar1({state,commit},descripcioncarrito){
        commit('eliminar1',descripcioncarrito);
      },
      eliminar2({state,commit},carritocatidad){
        commit('eliminar2',carritocatidad);
      }
    },
});
/*
export default new Vuex.Store({
  state:{
    items: [1],
  },
  mutations:{
    agregar:function(state,producto){
      state.descripcioncarrito.push(producto);
    },
    eliminar:function(state,index){
        var producto = state.descripcioncarrito[index];
        state.descripcioncarrito.splice(index,1);
    }
  },
  getters:{
    items (state) {
      return state.items;
    }
  },
  actions:{
    agregar({state,commit},descripcioncarrito){
      commit('agregar',descripcioncarrito);
    },
    eliminar({state,commit},descripcioncarrito){
      commit('eliminar',descripcioncarrito);
    }
  },
});*/