!function(t){var n={};function r(e){if(n[e])return n[e].exports;var o=n[e]={i:e,l:!1,exports:{}};return t[e].call(o.exports,o,o.exports,r),o.l=!0,o.exports}r.m=t,r.c=n,r.d=function(t,n,e){r.o(t,n)||Object.defineProperty(t,n,{enumerable:!0,get:e})},r.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},r.t=function(t,n){if(1&n&&(t=r(t)),8&n)return t;if(4&n&&"object"==typeof t&&t&&t.__esModule)return t;var e=Object.create(null);if(r.r(e),Object.defineProperty(e,"default",{enumerable:!0,value:t}),2&n&&"string"!=typeof t)for(var o in t)r.d(e,o,function(n){return t[n]}.bind(null,o));return e},r.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return r.d(n,"a",n),n},r.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},r.p="/",r(r.s=667)}({10:function(t,n,r){var e=r(11),o=r(23);t.exports=r(7)?function(t,n,r){return e.f(t,n,o(1,r))}:function(t,n,r){return t[n]=r,t}},101:function(t,n,r){"use strict";var e=r(8);t.exports=function(t,n){return!!t&&e((function(){n?t.call(null,(function(){}),1):t.call(null)}))}},105:function(t,n,r){"use strict";var e=r(12),o=r(43)(1);e(e.P+e.F*!r(101)([].map,!0),"Array",{map:function(t){return o(this,t,arguments[1])}})},11:function(t,n,r){var e=r(9),o=r(39),u=r(31),i=Object.defineProperty;n.f=r(7)?Object.defineProperty:function(t,n,r){if(e(t),n=u(n,!0),e(r),o)try{return i(t,n,r)}catch(t){}if("get"in r||"set"in r)throw TypeError("Accessors not supported!");return"value"in r&&(t[n]=r.value),t}},12:function(t,n,r){var e=r(4),o=r(15),u=r(10),i=r(16),c=r(28),f=function(t,n,r){var a,p,s,l,v=t&f.F,y=t&f.G,m=t&f.S,d=t&f.P,b=t&f.B,g=y?e:m?e[n]||(e[n]={}):(e[n]||{}).prototype,x=y?o:o[n]||(o[n]={}),h=x.prototype||(x.prototype={});for(a in y&&(r=n),r)s=((p=!v&&g&&void 0!==g[a])?g:r)[a],l=b&&p?c(s,e):d&&"function"==typeof s?c(Function.call,s):s,g&&i(g,a,s,t&f.U),x[a]!=s&&u(x,a,l),d&&h[a]!=s&&(h[a]=s)};e.core=o,f.F=1,f.G=2,f.S=4,f.P=8,f.B=16,f.W=32,f.U=64,f.R=128,t.exports=f},13:function(t,n){var r={}.hasOwnProperty;t.exports=function(t,n){return r.call(t,n)}},15:function(t,n){var r=t.exports={version:"2.6.12"};"number"==typeof __e&&(__e=r)},16:function(t,n,r){var e=r(4),o=r(10),u=r(13),i=r(17)("src"),c=r(62),f=(""+c).split("toString");r(15).inspectSource=function(t){return c.call(t)},(t.exports=function(t,n,r,c){var a="function"==typeof r;a&&(u(r,"name")||o(r,"name",n)),t[n]!==r&&(a&&(u(r,i)||o(r,i,t[n]?""+t[n]:f.join(String(n)))),t===e?t[n]=r:c?t[n]?t[n]=r:o(t,n,r):(delete t[n],o(t,n,r)))})(Function.prototype,"toString",(function(){return"function"==typeof this&&this[i]||c.call(this)}))},17:function(t,n){var r=0,e=Math.random();t.exports=function(t){return"Symbol(".concat(void 0===t?"":t,")_",(++r+e).toString(36))}},19:function(t,n){var r={}.toString;t.exports=function(t){return r.call(t).slice(8,-1)}},20:function(t,n,r){var e=r(15),o=r(4),u=o["__core-js_shared__"]||(o["__core-js_shared__"]={});(t.exports=function(t,n){return u[t]||(u[t]=void 0!==n?n:{})})("versions",[]).push({version:e.version,mode:r(24)?"pure":"global",copyright:"© 2020 Denis Pushkarev (zloirock.ru)"})},23:function(t,n){t.exports=function(t,n){return{enumerable:!(1&t),configurable:!(2&t),writable:!(4&t),value:n}}},24:function(t,n){t.exports=!1},25:function(t,n,r){var e=r(32),o=Math.min;t.exports=function(t){return t>0?o(e(t),9007199254740991):0}},26:function(t,n,r){var e=r(29);t.exports=function(t){return Object(e(t))}},28:function(t,n,r){var e=r(37);t.exports=function(t,n,r){if(e(t),void 0===n)return t;switch(r){case 1:return function(r){return t.call(n,r)};case 2:return function(r,e){return t.call(n,r,e)};case 3:return function(r,e,o){return t.call(n,r,e,o)}}return function(){return t.apply(n,arguments)}}},29:function(t,n){t.exports=function(t){if(null==t)throw TypeError("Can't call method on  "+t);return t}},31:function(t,n,r){var e=r(6);t.exports=function(t,n){if(!e(t))return t;var r,o;if(n&&"function"==typeof(r=t.toString)&&!e(o=r.call(t)))return o;if("function"==typeof(r=t.valueOf)&&!e(o=r.call(t)))return o;if(!n&&"function"==typeof(r=t.toString)&&!e(o=r.call(t)))return o;throw TypeError("Can't convert object to primitive value")}},32:function(t,n){var r=Math.ceil,e=Math.floor;t.exports=function(t){return isNaN(t=+t)?0:(t>0?e:r)(t)}},36:function(t,n,r){var e=r(6),o=r(4).document,u=e(o)&&e(o.createElement);t.exports=function(t){return u?o.createElement(t):{}}},37:function(t,n){t.exports=function(t){if("function"!=typeof t)throw TypeError(t+" is not a function!");return t}},39:function(t,n,r){t.exports=!r(7)&&!r(8)((function(){return 7!=Object.defineProperty(r(36)("div"),"a",{get:function(){return 7}}).a}))},4:function(t,n){var r=t.exports="undefined"!=typeof window&&window.Math==Math?window:"undefined"!=typeof self&&self.Math==Math?self:Function("return this")();"number"==typeof __g&&(__g=r)},40:function(t,n,r){var e=r(19);t.exports=Object("z").propertyIsEnumerable(0)?Object:function(t){return"String"==e(t)?t.split(""):Object(t)}},42:function(t,n,r){var e=r(19);t.exports=Array.isArray||function(t){return"Array"==e(t)}},43:function(t,n,r){var e=r(28),o=r(40),u=r(26),i=r(25),c=r(66);t.exports=function(t,n){var r=1==t,f=2==t,a=3==t,p=4==t,s=6==t,l=5==t||s,v=n||c;return function(n,c,y){for(var m,d,b=u(n),g=o(b),x=e(c,y,3),h=i(g.length),w=0,_=r?v(n,h):f?v(n,0):void 0;h>w;w++)if((l||w in g)&&(d=x(m=g[w],w,b),t))if(r)_[w]=d;else if(d)switch(t){case 3:return!0;case 5:return m;case 6:return w;case 2:_.push(m)}else if(p)return!1;return s?-1:a||p?p:_}}},5:function(t,n,r){var e=r(20)("wks"),o=r(17),u=r(4).Symbol,i="function"==typeof u;(t.exports=function(t){return e[t]||(e[t]=i&&u[t]||(i?u:o)("Symbol."+t))}).store=e},6:function(t,n){t.exports=function(t){return"object"==typeof t?null!==t:"function"==typeof t}},62:function(t,n,r){t.exports=r(20)("native-function-to-string",Function.toString)},66:function(t,n,r){var e=r(67);t.exports=function(t,n){return new(e(t))(n)}},667:function(t,n,r){t.exports=r(668)},668:function(t,n,r){"use strict";r.r(n);r(105);var e=wp.i18n.__,o=wp.blocks.registerBlockType,u=wp.components.SelectControl,i=wp.element.createElement("svg",{width:20,height:20},wp.element.createElement("path",{d:"M15.57,0H4.43A4.43,4.43,0,0,0,0,4.43V15.57A4.43,4.43,0,0,0,4.43,20H15.57A4.43,4.43,0,0,0,20,15.57V4.43A4.43,4.43,0,0,0,15.57,0ZM12.82,14a2.36,2.36,0,0,1-1.66.68H6.5A2.31,2.31,0,0,1,7.18,13a2.36,2.36,0,0,1,1.66-.68l4.66,0A2.34,2.34,0,0,1,12.82,14Zm3.3-3.46a2.36,2.36,0,0,1-1.66.68H3.21a2.25,2.25,0,0,1,.68-1.64,2.36,2.36,0,0,1,1.66-.68H16.79A2.25,2.25,0,0,1,16.12,10.53Zm0-3.73a2.36,2.36,0,0,1-1.66.68H3.21a2.25,2.25,0,0,1,.68-1.64,2.36,2.36,0,0,1,1.66-.68H16.79A2.25,2.25,0,0,1,16.12,6.81Z"}));o("wppayform/guten-block",{title:e("WP PayForm"),icon:i,category:"formatting",keywords:[e("WP PayForm"),e("Gutenberg Block"),e("wppayform-gutenberg-block")],attributes:{formId:{type:"string"}},edit:function(t){var n=t.attributes,r=t.setAttributes,o=window.wpf_tinymce_vars;return React.createElement("div",{className:"wppayform-guten-wrapper"},React.createElement("div",{className:"wppayform-logo"},React.createElement("img",{src:o.logo,alt:"WPPayForm"}),"WPPayForm"),React.createElement(u,{label:e("Select a Form"),value:n.formId,options:o.forms.map((function(t){return{value:t.value,label:t.text}})),onChange:function(t){return r({formId:t})}}))},save:function(t){return'[wppayform id="'+t.attributes.formId+'"]'}})},67:function(t,n,r){var e=r(6),o=r(42),u=r(5)("species");t.exports=function(t){var n;return o(t)&&("function"!=typeof(n=t.constructor)||n!==Array&&!o(n.prototype)||(n=void 0),e(n)&&null===(n=n[u])&&(n=void 0)),void 0===n?Array:n}},7:function(t,n,r){t.exports=!r(8)((function(){return 7!=Object.defineProperty({},"a",{get:function(){return 7}}).a}))},8:function(t,n){t.exports=function(t){try{return!!t()}catch(t){return!0}}},9:function(t,n,r){var e=r(6);t.exports=function(t){if(!e(t))throw TypeError(t+" is not an object!");return t}}});