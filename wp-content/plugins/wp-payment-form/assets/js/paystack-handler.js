!function(t){var n={};function r(e){if(n[e])return n[e].exports;var o=n[e]={i:e,l:!1,exports:{}};return t[e].call(o.exports,o,o.exports,r),o.l=!0,o.exports}r.m=t,r.c=n,r.d=function(t,n,e){r.o(t,n)||Object.defineProperty(t,n,{enumerable:!0,get:e})},r.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},r.t=function(t,n){if(1&n&&(t=r(t)),8&n)return t;if(4&n&&"object"==typeof t&&t&&t.__esModule)return t;var e=Object.create(null);if(r.r(e),Object.defineProperty(e,"default",{enumerable:!0,value:t}),2&n&&"string"!=typeof t)for(var o in t)r.d(e,o,function(n){return t[n]}.bind(null,o));return e},r.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return r.d(n,"a",n),n},r.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},r.p="/",r(r.s=661)}({10:function(t,n,r){var e=r(11),o=r(23);t.exports=r(7)?function(t,n,r){return e.f(t,n,o(1,r))}:function(t,n,r){return t[n]=r,t}},101:function(t,n,r){"use strict";var e=r(8);t.exports=function(t,n){return!!t&&e((function(){n?t.call(null,(function(){}),1):t.call(null)}))}},11:function(t,n,r){var e=r(9),o=r(39),i=r(31),u=Object.defineProperty;n.f=r(7)?Object.defineProperty:function(t,n,r){if(e(t),n=i(n,!0),e(r),o)try{return u(t,n,r)}catch(t){}if("get"in r||"set"in r)throw TypeError("Accessors not supported!");return"value"in r&&(t[n]=r.value),t}},12:function(t,n,r){var e=r(4),o=r(15),i=r(10),u=r(16),f=r(28),c=function(t,n,r){var a,s,p,l,y=t&c.F,v=t&c.G,b=t&c.S,h=t&c.P,m=t&c.B,d=v?e:b?e[n]||(e[n]={}):(e[n]||{}).prototype,g=v?o:o[n]||(o[n]={}),O=g.prototype||(g.prototype={});for(a in v&&(r=n),r)p=((s=!y&&d&&void 0!==d[a])?d:r)[a],l=m&&s?f(p,e):h&&"function"==typeof p?f(Function.call,p):p,d&&u(d,a,p,t&c.U),g[a]!=p&&i(g,a,l),h&&O[a]!=p&&(O[a]=p)};e.core=o,c.F=1,c.G=2,c.S=4,c.P=8,c.B=16,c.W=32,c.U=64,c.R=128,t.exports=c},13:function(t,n){var r={}.hasOwnProperty;t.exports=function(t,n){return r.call(t,n)}},135:function(t,n,r){var e=r(18),o=r(25),i=r(84);t.exports=function(t){return function(n,r,u){var f,c=e(n),a=o(c.length),s=i(u,a);if(t&&r!=r){for(;a>s;)if((f=c[s++])!=f)return!0}else for(;a>s;s++)if((t||s in c)&&c[s]===r)return t||s||0;return!t&&-1}}},136:function(t,n,r){var e=r(12),o=r(15),i=r(8);t.exports=function(t,n){var r=(o.Object||{})[t]||Object[t],u={};u[t]=n(r),e(e.S+e.F*i((function(){r(1)})),"Object",u)}},138:function(t,n,r){var e=r(17)("meta"),o=r(6),i=r(13),u=r(11).f,f=0,c=Object.isExtensible||function(){return!0},a=!r(8)((function(){return c(Object.preventExtensions({}))})),s=function(t){u(t,e,{value:{i:"O"+ ++f,w:{}}})},p=t.exports={KEY:e,NEED:!1,fastKey:function(t,n){if(!o(t))return"symbol"==typeof t?t:("string"==typeof t?"S":"P")+t;if(!i(t,e)){if(!c(t))return"F";if(!n)return"E";s(t)}return t[e].i},getWeak:function(t,n){if(!i(t,e)){if(!c(t))return!0;if(!n)return!1;s(t)}return t[e].w},onFreeze:function(t){return a&&p.NEED&&c(t)&&!i(t,e)&&s(t),t}}},139:function(t,n,r){var e=r(4),o=r(15),i=r(24),u=r(80),f=r(11).f;t.exports=function(t){var n=o.Symbol||(o.Symbol=i?{}:e.Symbol||{});"_"==t.charAt(0)||t in n||f(n,t,{value:u.f(t)})}},140:function(t,n,r){var e=r(30),o=r(64),i=r(41);t.exports=function(t){var n=e(t),r=o.f;if(r)for(var u,f=r(t),c=i.f,a=0;f.length>a;)c.call(t,u=f[a++])&&n.push(u);return n}},141:function(t,n,r){var e=r(11),o=r(9),i=r(30);t.exports=r(7)?Object.defineProperties:function(t,n){o(t);for(var r,u=i(n),f=u.length,c=0;f>c;)e.f(t,r=u[c++],n[r]);return t}},142:function(t,n,r){var e=r(18),o=r(57).f,i={}.toString,u="object"==typeof window&&window&&Object.getOwnPropertyNames?Object.getOwnPropertyNames(window):[];t.exports.f=function(t){return u&&"[object Window]"==i.call(t)?function(t){try{return o(t)}catch(t){return u.slice()}}(t):o(e(t))}},143:function(t,n,r){"use strict";var e=r(12),o=r(43)(2);e(e.P+e.F*!r(101)([].filter,!0),"Array",{filter:function(t){return o(this,t,arguments[1])}})},144:function(t,n,r){var e=r(18),o=r(65).f;r(136)("getOwnPropertyDescriptor",(function(){return function(t,n){return o(e(t),n)}}))},145:function(t,n,r){var e=r(12),o=r(419),i=r(18),u=r(65),f=r(420);e(e.S,"Object",{getOwnPropertyDescriptors:function(t){for(var n,r,e=i(t),c=u.f,a=o(e),s={},p=0;a.length>p;)void 0!==(r=c(e,n=a[p++]))&&f(s,n,r);return s}})},15:function(t,n){var r=t.exports={version:"2.6.12"};"number"==typeof __e&&(__e=r)},16:function(t,n,r){var e=r(4),o=r(10),i=r(13),u=r(17)("src"),f=r(62),c=(""+f).split("toString");r(15).inspectSource=function(t){return f.call(t)},(t.exports=function(t,n,r,f){var a="function"==typeof r;a&&(i(r,"name")||o(r,"name",n)),t[n]!==r&&(a&&(i(r,u)||o(r,u,t[n]?""+t[n]:c.join(String(n)))),t===e?t[n]=r:f?t[n]?t[n]=r:o(t,n,r):(delete t[n],o(t,n,r)))})(Function.prototype,"toString",(function(){return"function"==typeof this&&this[u]||f.call(this)}))},17:function(t,n){var r=0,e=Math.random();t.exports=function(t){return"Symbol(".concat(void 0===t?"":t,")_",(++r+e).toString(36))}},18:function(t,n,r){var e=r(40),o=r(29);t.exports=function(t){return e(o(t))}},19:function(t,n){var r={}.toString;t.exports=function(t){return r.call(t).slice(8,-1)}},20:function(t,n,r){var e=r(15),o=r(4),i=o["__core-js_shared__"]||(o["__core-js_shared__"]={});(t.exports=function(t,n){return i[t]||(i[t]=void 0!==n?n:{})})("versions",[]).push({version:e.version,mode:r(24)?"pure":"global",copyright:"© 2020 Denis Pushkarev (zloirock.ru)"})},23:function(t,n){t.exports=function(t,n){return{enumerable:!(1&t),configurable:!(2&t),writable:!(4&t),value:n}}},24:function(t,n){t.exports=!1},25:function(t,n,r){var e=r(32),o=Math.min;t.exports=function(t){return t>0?o(e(t),9007199254740991):0}},26:function(t,n,r){var e=r(29);t.exports=function(t){return Object(e(t))}},28:function(t,n,r){var e=r(37);t.exports=function(t,n,r){if(e(t),void 0===n)return t;switch(r){case 1:return function(r){return t.call(n,r)};case 2:return function(r,e){return t.call(n,r,e)};case 3:return function(r,e,o){return t.call(n,r,e,o)}}return function(){return t.apply(n,arguments)}}},29:function(t,n){t.exports=function(t){if(null==t)throw TypeError("Can't call method on  "+t);return t}},30:function(t,n,r){var e=r(79),o=r(49);t.exports=Object.keys||function(t){return e(t,o)}},31:function(t,n,r){var e=r(6);t.exports=function(t,n){if(!e(t))return t;var r,o;if(n&&"function"==typeof(r=t.toString)&&!e(o=r.call(t)))return o;if("function"==typeof(r=t.valueOf)&&!e(o=r.call(t)))return o;if(!n&&"function"==typeof(r=t.toString)&&!e(o=r.call(t)))return o;throw TypeError("Can't convert object to primitive value")}},32:function(t,n){var r=Math.ceil,e=Math.floor;t.exports=function(t){return isNaN(t=+t)?0:(t>0?e:r)(t)}},36:function(t,n,r){var e=r(6),o=r(4).document,i=e(o)&&e(o.createElement);t.exports=function(t){return i?o.createElement(t):{}}},37:function(t,n){t.exports=function(t){if("function"!=typeof t)throw TypeError(t+" is not a function!");return t}},39:function(t,n,r){t.exports=!r(7)&&!r(8)((function(){return 7!=Object.defineProperty(r(36)("div"),"a",{get:function(){return 7}}).a}))},4:function(t,n){var r=t.exports="undefined"!=typeof window&&window.Math==Math?window:"undefined"!=typeof self&&self.Math==Math?self:Function("return this")();"number"==typeof __g&&(__g=r)},40:function(t,n,r){var e=r(19);t.exports=Object("z").propertyIsEnumerable(0)?Object:function(t){return"String"==e(t)?t.split(""):Object(t)}},41:function(t,n){n.f={}.propertyIsEnumerable},419:function(t,n,r){var e=r(57),o=r(64),i=r(9),u=r(4).Reflect;t.exports=u&&u.ownKeys||function(t){var n=e.f(i(t)),r=o.f;return r?n.concat(r(t)):n}},42:function(t,n,r){var e=r(19);t.exports=Array.isArray||function(t){return"Array"==e(t)}},420:function(t,n,r){"use strict";var e=r(11),o=r(23);t.exports=function(t,n,r){n in t?e.f(t,n,o(0,r)):t[n]=r}},43:function(t,n,r){var e=r(28),o=r(40),i=r(26),u=r(25),f=r(66);t.exports=function(t,n){var r=1==t,c=2==t,a=3==t,s=4==t,p=6==t,l=5==t||p,y=n||f;return function(n,f,v){for(var b,h,m=i(n),d=o(m),g=e(f,v,3),O=u(d.length),w=0,x=r?y(n,O):c?y(n,0):void 0;O>w;w++)if((l||w in d)&&(h=g(b=d[w],w,m),t))if(r)x[w]=h;else if(h)switch(t){case 3:return!0;case 5:return b;case 6:return w;case 2:x.push(b)}else if(s)return!1;return p?-1:a||s?s:x}}},44:function(t,n,r){"use strict";var e=r(12),o=r(43)(5),i=!0;"find"in[]&&Array(1).find((function(){i=!1})),e(e.P+e.F*i,"Array",{find:function(t){return o(this,t,arguments.length>1?arguments[1]:void 0)}}),r(70)("find")},49:function(t,n){t.exports="constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf".split(",")},5:function(t,n,r){var e=r(20)("wks"),o=r(17),i=r(4).Symbol,u="function"==typeof i;(t.exports=function(t){return e[t]||(e[t]=u&&i[t]||(u?i:o)("Symbol."+t))}).store=e},50:function(t,n,r){"use strict";var e=r(4),o=r(13),i=r(7),u=r(12),f=r(16),c=r(138).KEY,a=r(8),s=r(20),p=r(56),l=r(17),y=r(5),v=r(80),b=r(139),h=r(140),m=r(42),d=r(9),g=r(6),O=r(26),w=r(18),x=r(31),j=r(23),_=r(81),S=r(142),P=r(65),E=r(64),k=r(11),F=r(30),M=P.f,N=k.f,T=S.f,A=e.Symbol,D=e.JSON,I=D&&D.stringify,C=y("_hidden"),W=y("toPrimitive"),$={}.propertyIsEnumerable,J=s("symbol-registry"),K=s("symbols"),R=s("op-symbols"),z=Object.prototype,G="function"==typeof A&&!!E.f,H=e.QObject,Q=!H||!H.prototype||!H.prototype.findChild,B=i&&a((function(){return 7!=_(N({},"a",{get:function(){return N(this,"a",{value:7}).a}})).a}))?function(t,n,r){var e=M(z,n);e&&delete z[n],N(t,n,r),e&&t!==z&&N(z,n,e)}:N,U=function(t){var n=K[t]=_(A.prototype);return n._k=t,n},Y=G&&"symbol"==typeof A.iterator?function(t){return"symbol"==typeof t}:function(t){return t instanceof A},L=function(t,n,r){return t===z&&L(R,n,r),d(t),n=x(n,!0),d(r),o(K,n)?(r.enumerable?(o(t,C)&&t[C][n]&&(t[C][n]=!1),r=_(r,{enumerable:j(0,!1)})):(o(t,C)||N(t,C,j(1,{})),t[C][n]=!0),B(t,n,r)):N(t,n,r)},q=function(t,n){d(t);for(var r,e=h(n=w(n)),o=0,i=e.length;i>o;)L(t,r=e[o++],n[r]);return t},V=function(t){var n=$.call(this,t=x(t,!0));return!(this===z&&o(K,t)&&!o(R,t))&&(!(n||!o(this,t)||!o(K,t)||o(this,C)&&this[C][t])||n)},X=function(t,n){if(t=w(t),n=x(n,!0),t!==z||!o(K,n)||o(R,n)){var r=M(t,n);return!r||!o(K,n)||o(t,C)&&t[C][n]||(r.enumerable=!0),r}},Z=function(t){for(var n,r=T(w(t)),e=[],i=0;r.length>i;)o(K,n=r[i++])||n==C||n==c||e.push(n);return e},tt=function(t){for(var n,r=t===z,e=T(r?R:w(t)),i=[],u=0;e.length>u;)!o(K,n=e[u++])||r&&!o(z,n)||i.push(K[n]);return i};G||(f((A=function(){if(this instanceof A)throw TypeError("Symbol is not a constructor!");var t=l(arguments.length>0?arguments[0]:void 0),n=function(r){this===z&&n.call(R,r),o(this,C)&&o(this[C],t)&&(this[C][t]=!1),B(this,t,j(1,r))};return i&&Q&&B(z,t,{configurable:!0,set:n}),U(t)}).prototype,"toString",(function(){return this._k})),P.f=X,k.f=L,r(57).f=S.f=Z,r(41).f=V,E.f=tt,i&&!r(24)&&f(z,"propertyIsEnumerable",V,!0),v.f=function(t){return U(y(t))}),u(u.G+u.W+u.F*!G,{Symbol:A});for(var nt="hasInstance,isConcatSpreadable,iterator,match,replace,search,species,split,toPrimitive,toStringTag,unscopables".split(","),rt=0;nt.length>rt;)y(nt[rt++]);for(var et=F(y.store),ot=0;et.length>ot;)b(et[ot++]);u(u.S+u.F*!G,"Symbol",{for:function(t){return o(J,t+="")?J[t]:J[t]=A(t)},keyFor:function(t){if(!Y(t))throw TypeError(t+" is not a symbol!");for(var n in J)if(J[n]===t)return n},useSetter:function(){Q=!0},useSimple:function(){Q=!1}}),u(u.S+u.F*!G,"Object",{create:function(t,n){return void 0===n?_(t):q(_(t),n)},defineProperty:L,defineProperties:q,getOwnPropertyDescriptor:X,getOwnPropertyNames:Z,getOwnPropertySymbols:tt});var it=a((function(){E.f(1)}));u(u.S+u.F*it,"Object",{getOwnPropertySymbols:function(t){return E.f(O(t))}}),D&&u(u.S+u.F*(!G||a((function(){var t=A();return"[null]"!=I([t])||"{}"!=I({a:t})||"{}"!=I(Object(t))}))),"JSON",{stringify:function(t){for(var n,r,e=[t],o=1;arguments.length>o;)e.push(arguments[o++]);if(r=n=e[1],(g(n)||void 0!==t)&&!Y(t))return m(n)||(n=function(t,n){if("function"==typeof r&&(n=r.call(this,t,n)),!Y(n))return n}),e[1]=n,I.apply(D,e)}}),A.prototype[W]||r(10)(A.prototype,W,A.prototype.valueOf),p(A,"Symbol"),p(Math,"Math",!0),p(e.JSON,"JSON",!0)},55:function(t,n,r){var e=r(20)("keys"),o=r(17);t.exports=function(t){return e[t]||(e[t]=o(t))}},56:function(t,n,r){var e=r(11).f,o=r(13),i=r(5)("toStringTag");t.exports=function(t,n,r){t&&!o(t=r?t:t.prototype,i)&&e(t,i,{configurable:!0,value:n})}},57:function(t,n,r){var e=r(79),o=r(49).concat("length","prototype");n.f=Object.getOwnPropertyNames||function(t){return e(t,o)}},6:function(t,n){t.exports=function(t){return"object"==typeof t?null!==t:"function"==typeof t}},62:function(t,n,r){t.exports=r(20)("native-function-to-string",Function.toString)},64:function(t,n){n.f=Object.getOwnPropertySymbols},65:function(t,n,r){var e=r(41),o=r(23),i=r(18),u=r(31),f=r(13),c=r(39),a=Object.getOwnPropertyDescriptor;n.f=r(7)?a:function(t,n){if(t=i(t),n=u(n,!0),c)try{return a(t,n)}catch(t){}if(f(t,n))return o(!e.f.call(t,n),t[n])}},66:function(t,n,r){var e=r(67);t.exports=function(t,n){return new(e(t))(n)}},661:function(t,n,r){t.exports=r(662)},662:function(t,n,r){"use strict";r.r(n);r(72),r(50),r(143),r(144),r(145),r(44);function e(t,n){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var e=Object.getOwnPropertySymbols(t);n&&(e=e.filter((function(n){return Object.getOwnPropertyDescriptor(t,n).enumerable}))),r.push.apply(r,e)}return r}function o(t,n,r){return n in t?Object.defineProperty(t,n,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[n]=r,t}function i(t,n){for(var r=0;r<n.length;r++){var e=n[r];e.enumerable=e.enumerable||!1,e.configurable=!0,"value"in e&&(e.writable=!0),Object.defineProperty(t,e.key,e)}}var u,f=function(){function t(n,r){!function(t,n){if(!(t instanceof n))throw new TypeError("Cannot call a class as a function")}(this,t),this.$form=n.form,this.payformHandler=n,this.config=r,this.formId=r.form_id,this.generalConfig=window.wp_payform_general}var n,r,u;return n=t,(r=[{key:"init",value:function(){var t=this;this.$form.on("wppayform_next_action_paystack",(function(n,r){var e=r.response;jQuery("<div/>",{id:"form_success",class:"wpf_form_notice_success wpf_paystack_text"}).html(e.data.message).insertAfter(t.$form),"initPaystackModal"===e.data.actionName?t.initPaystackModal(e.data):alert("No method found")}))}},{key:"initPaystackModal",value:function(t){var n=this,r=t.modal_data;r.callback=function(t){var r=function(t){for(var n=1;n<arguments.length;n++){var r=null!=arguments[n]?arguments[n]:{};n%2?e(Object(r),!0).forEach((function(n){o(t,n,r[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):e(Object(r)).forEach((function(n){Object.defineProperty(t,n,Object.getOwnPropertyDescriptor(r,n))}))}return t}({action:"wppayform_paystack_confirm_payment",form_id:n.formId},t);n.$form.parent().find(".wpf_paystack_text").remove(),n.payformHandler.handleStripePaymentConfirm(r)},n.payformHandler.buttonState("loading","",!1),r.onClose=function(t){n.$form.parent().find(".wpf_paystack_text").remove()},PaystackPop.setup(r).openIframe()}}])&&i(n.prototype,r),u&&i(n,u),t}();(u=jQuery).each(u("form.wppayform_has_payment"),(function(){u(this).on("wppayform_init_single",(function(t,n,r){new f(n,r).init()}))}))},67:function(t,n,r){var e=r(6),o=r(42),i=r(5)("species");t.exports=function(t){var n;return o(t)&&("function"!=typeof(n=t.constructor)||n!==Array&&!o(n.prototype)||(n=void 0),e(n)&&null===(n=n[i])&&(n=void 0)),void 0===n?Array:n}},7:function(t,n,r){t.exports=!r(8)((function(){return 7!=Object.defineProperty({},"a",{get:function(){return 7}}).a}))},70:function(t,n,r){var e=r(5)("unscopables"),o=Array.prototype;null==o[e]&&r(10)(o,e,{}),t.exports=function(t){o[e][t]=!0}},72:function(t,n,r){var e=r(26),o=r(30);r(136)("keys",(function(){return function(t){return o(e(t))}}))},77:function(t,n,r){var e=r(4).document;t.exports=e&&e.documentElement},79:function(t,n,r){var e=r(13),o=r(18),i=r(135)(!1),u=r(55)("IE_PROTO");t.exports=function(t,n){var r,f=o(t),c=0,a=[];for(r in f)r!=u&&e(f,r)&&a.push(r);for(;n.length>c;)e(f,r=n[c++])&&(~i(a,r)||a.push(r));return a}},8:function(t,n){t.exports=function(t){try{return!!t()}catch(t){return!0}}},80:function(t,n,r){n.f=r(5)},81:function(t,n,r){var e=r(9),o=r(141),i=r(49),u=r(55)("IE_PROTO"),f=function(){},c=function(){var t,n=r(36)("iframe"),e=i.length;for(n.style.display="none",r(77).appendChild(n),n.src="javascript:",(t=n.contentWindow.document).open(),t.write("<script>document.F=Object<\/script>"),t.close(),c=t.F;e--;)delete c.prototype[i[e]];return c()};t.exports=Object.create||function(t,n){var r;return null!==t?(f.prototype=e(t),r=new f,f.prototype=null,r[u]=t):r=c(),void 0===n?r:o(r,n)}},84:function(t,n,r){var e=r(32),o=Math.max,i=Math.min;t.exports=function(t,n){return(t=e(t))<0?o(t+n,0):i(t,n)}},9:function(t,n,r){var e=r(6);t.exports=function(t){if(!e(t))throw TypeError(t+" is not an object!");return t}}});