(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[9],{"28c2":function(t,e,r){"use strict";r.r(e);var a=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",[r("q-card",[r("q-card-section",{staticClass:"q-pa-none"},[r("div",{staticClass:"row wrap"},[r("div",{staticClass:"col col-12 items-center q-pa-none"},[r("create-form")],1)])])],1)],1)},o=[],s=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("q-card",{staticClass:"my-card"},[r("q-card-section",{staticClass:"bg-primary text-white"},[r("div",{staticClass:"text-h6"},[t._v("Nueva Categoria")]),r("div",{staticClass:"text-subtitle3"},[t._v("Los campos con (*) son obligatorios")])]),r("q-separator"),r("q-card-section",{staticClass:"col-12 full-width"},[r("ValidationObserver",{ref:"observer",scopedSlots:t._u([{key:"default",fn:function(e){var a=e.passes,o=e.invalid;return[r("form",[r("div",{staticClass:"row"},[r("div",{staticClass:"col col-12 q-px-xs "},[r("ValidationProvider",{attrs:{rules:"required|min:4 |max:20",name:"nombre"},scopedSlots:t._u([{key:"default",fn:function(e){var a=e.errors,o=e.invalid,s=e.validated;return[r("q-input",{staticClass:"q-mb-md",attrs:{color:"blue-grey-10",type:"text",label:"Nombre (*)",error:o&&s,"error-message":a[0]},model:{value:t.category.name,callback:function(e){t.$set(t.category,"name",e)},expression:"category.name"}})]}}],null,!0)})],1),r("div",{staticClass:"col col-12 q-px-xs "},[r("ValidationProvider",{attrs:{rules:"min: 3|max: 100",name:"descripcion"},scopedSlots:t._u([{key:"default",fn:function(e){var a=e.errors,o=e.invalid,s=e.validated;return[r("q-input",{staticClass:"q-mb-md",attrs:{color:"blue-grey-10",type:"text",label:"Descripcion",error:o&&s,"error-message":a[0]},model:{value:t.category.description,callback:function(e){t.$set(t.category,"description",e)},expression:"category.description"}})]}}],null,!0)})],1),r("div",{staticClass:"row justify-center items-center fit q-gutter-md"},[r("div",{staticClass:"col-5"},[r("q-btn",{staticClass:"q-mt-md full-width",attrs:{type:"submit",color:o?"grey":"primary",label:"Crear"},on:{click:function(e){return e.preventDefault(),a(t.crearCategorias)}}})],1),r("div",{staticClass:"col-5"},[r("q-btn",{staticClass:"q-mt-md full-width",attrs:{type:"button",color:"negative",label:"Cancelar"},on:{click:function(e){return t.$router.go(-1)}}})],1)])])])]}}])})],1)],1)},n=[],c=(r("8e6e"),r("8a81"),r("ac6a"),r("cadf"),r("06db"),r("456d"),r("c47a")),i=r.n(c),l=r("7bb1"),u=r("2f62");function d(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);e&&(a=a.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,a)}return r}function p(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?d(Object(r),!0).forEach((function(e){i()(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):d(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}var f={name:"CreateForm",components:{ValidationObserver:l["a"]},data:function(){return{category:{nombre:"",descripcion:""}}},methods:p(p({},Object(u["c"])("category",["storeCategory"])),{},{crearCategorias:function(){var t=this;return this.storeCategory(this.category).then((function(){t.$router.push({path:"/categories"})})).catch((function(t){}))}})},b=f,m=r("2877"),v=r("f09f"),y=r("a370"),g=r("eb85"),C=r("27f9"),O=r("9c40"),h=r("eebe"),q=r.n(h),w=Object(m["a"])(b,s,n,!1,null,null,null),j=w.exports;q()(w,"components",{QCard:v["a"],QCardSection:y["a"],QSeparator:g["a"],QInput:C["a"],QBtn:O["a"]});var x={components:{CreateForm:j}},k=x,P=Object(m["a"])(k,a,o,!1,null,null,null);e["default"]=P.exports;q()(P,"components",{QCard:v["a"],QCardSection:y["a"]})}}]);