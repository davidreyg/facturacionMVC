(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[10],{"188a":function(t,e,a){"use strict";a.r(e);var r=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("q-card",[a("q-card-section",{staticClass:"q-pa-none"},[a("div",{staticClass:"row wrap"},[a("div",{staticClass:"col col-12 items-center q-pa-none"},[a("edit-form")],1)])])],1)],1)},n=[],o=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("q-card",{staticClass:"my-card"},[a("q-card-section",{staticClass:"bg-primary text-white"},[a("div",{staticClass:"text-h6"},[t._v("Actualizar Categoria")]),a("div",{staticClass:"text-subtitle3"},[t._v("Los campos con (*) son obligatorios")])]),a("q-separator"),a("q-card-section",{staticClass:"collumn col-12 full-width"},[a("ValidationObserver",{ref:"observer",scopedSlots:t._u([{key:"default",fn:function(e){var r=e.passes,n=e.invalid;return[a("form",[a("div",{staticClass:"row"},[a("div",{staticClass:"col col-12 q-px-xs "},[a("ValidationProvider",{attrs:{rules:"required|min:4 |max:20",name:"nombre"},scopedSlots:t._u([{key:"default",fn:function(e){var r=e.errors,n=e.invalid,o=e.validated;return[a("q-input",{staticClass:"q-mb-md",attrs:{color:"blue-grey-10",type:"text",label:"Nombre (*)",error:n&&o,"error-message":r[0]},model:{value:t.name,callback:function(e){t.name=e},expression:"name"}})]}}],null,!0)})],1),a("div",{staticClass:"col col-12 q-px-xs "},[a("ValidationProvider",{attrs:{rules:"min: 3|max: 100",name:"descripcion"},scopedSlots:t._u([{key:"default",fn:function(e){var r=e.errors,n=e.invalid,o=e.validated;return[a("q-input",{staticClass:"q-mb-md",attrs:{color:"blue-grey-10",type:"text",label:"Descripcion",error:n&&o,"error-message":r[0]},model:{value:t.description,callback:function(e){t.description=e},expression:"description"}})]}}],null,!0)})],1),a("div",{staticClass:"row justify-center items-center fit q-gutter-md"},[a("div",{staticClass:"col-5"},[a("q-btn",{staticClass:"q-mt-md full-width",attrs:{type:"submit",label:"Actualizar",color:n?"grey":"primary"},on:{click:function(e){return e.preventDefault(),r(t.actualizarCategoria)}}})],1),a("div",{staticClass:"col-5"},[a("q-btn",{staticClass:"q-mt-md full-width",attrs:{type:"button",color:"negative",label:"Cancelar"},on:{click:function(e){return t.$router.go(-1)}}})],1)])])])]}}])})],1)],1)},i=[],c=(a("8e6e"),a("8a81"),a("ac6a"),a("cadf"),a("06db"),a("456d"),a("c47a")),s=a.n(c),l=a("967e"),u=a.n(l),d=(a("96cf"),a("fa84")),p=a.n(d),f=a("7bb1"),m=a("2f62"),b=a("5935");function v(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);e&&(r=r.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,r)}return a}function g(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?v(Object(a),!0).forEach((function(e){s()(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):v(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}var y=Object(m["a"])("category"),C=y.mapActions,O=y.mapGetters,w=Object(b["a"])({getterType:"category/getCategoryField",mutationType:"category/updateCategoryField"}),h=w.mapFields,q={name:"EditForm",components:{ValidationObserver:f["a"]},data:function(){return{}},created:function(){var t=this;return p()(u.a.mark((function e(){return u.a.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,t.fetchOneCategory(t.$route.params.id);case 2:case"end":return e.stop()}}),e)})))()},methods:g(g({},C({updateCategoria:"updateCategoria",fetchOneCategory:"fetchOneCategory"})),{},{actualizarCategoria:function(){return this.updateCategoria(this.categoria)}}),computed:g(g({},O({categoria:"getCategory"})),h(["name","description"]))},x=q,j=a("2877"),k=a("f09f"),P=a("a370"),_=a("eb85"),S=a("27f9"),Q=a("9c40"),D=a("eebe"),E=a.n(D),F=Object(j["a"])(x,o,i,!1,null,null,null),z=F.exports;E()(F,"components",{QCard:k["a"],QCardSection:P["a"],QSeparator:_["a"],QInput:S["a"],QBtn:Q["a"]});var V={components:{EditForm:z}},$=V,A=Object(j["a"])($,r,n,!1,null,null,null);e["default"]=A.exports;E()(A,"components",{QCard:k["a"],QCardSection:P["a"]})}}]);