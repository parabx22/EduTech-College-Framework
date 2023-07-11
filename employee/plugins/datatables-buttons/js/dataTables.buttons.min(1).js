/*!
 Buttons for DataTables 1.6.1
 ©2016-2019 SpryMedia Ltd - datatables.net/license
*/
(function(d){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(q){return d(q,window,document)}):"object"===typeof exports?module.exports=function(q,p){q||(q=window);if(!p||!p.fn.dataTable)p=require("datatables.net")(q,p).$;return d(p,q,q.document)}:d(jQuery,window,document)})(function(d,q,p,m){function t(a){var a=new i.Api(a),b=a.init().buttons||i.defaults.buttons;return(new n(a,b)).container()}var i=d.fn.dataTable,w=0,x=0,k=i.ext.buttons,n=function(a,b){if(!(this instanceof
n))return function(b){return(new n(b,a)).container()};"undefined"===typeof b&&(b={});!0===b&&(b={});d.isArray(b)&&(b={buttons:b});this.c=d.extend(!0,{},n.defaults,b);b.buttons&&(this.c.buttons=b.buttons);this.s={dt:new i.Api(a),buttons:[],listenKeys:"",namespace:"dtb"+w++};this.dom={container:d("<"+this.c.dom.container.tag+"/>").addClass(this.c.dom.container.className)};this._constructor()};d.extend(n.prototype,{action:function(a,b){var c=this._nodeToButton(a);if(b===m)return c.conf.action;c.conf.action=
b;return this},active:function(a,b){var c=this._nodeToButton(a),e=this.c.dom.button.active,c=d(c.node);if(b===m)return c.hasClass(e);c.toggleClass(e,b===m?!0:b);return this},add:function(a,b){var c=this.s.buttons;if("string"===typeof b){for(var e=b.split("-"),d=this.s,c=0,f=e.length-1;c<f;c++)d=d.buttons[1*e[c]];c=d.buttons;b=1*e[e.length-1]}this._expandButton(c,a,d!==m,b);this._draw();return this},container:function(){return this.dom.container},disable:function(a){a=this._nodeToButton(a);d(a.node).addClass(this.c.dom.button.disabled);
return this},destroy:function(){d("body").off("keyup."+this.s.namespace);var a=this.s.buttons.slice(),b,c;b=0;for(c=a.length;b<c;b++)this.remove(a[b].node);this.dom.container.remove();a=this.s.dt.settings()[0];b=0;for(c=a.length;b<c;b++)if(a.inst===this){a.splice(b,1);break}return this},enable:function(a,b){if(!1===b)return this.disable(a);var c=this._nodeToButton(a);d(c.node).removeClass(this.c.dom.button.disabled);return this},name:function(){return this.c.name},node:function(a){if(!a)return this.dom.container;
a=this._nodeToButton(a);return d(a.node)},processing:function(a,b){var c=this.s.dt,e=this._nodeToButton(a);if(b===m)return d(e.node).hasClass("processing");d(e.node).toggleClass("processing",b);d(c.table().node()).triggerHandler("buttons-processing.dt",[b,c.button(a),c,d(a),e.conf]);return this},remove:function(a){var b=this._nodeToButton(a),c=this._nodeToHost(a),e=this.s.dt;if(b.buttons.length)for(var g=b.buttons.length-1;0<=g;g--)this.remove(b.buttons[g].node);b.conf.destroy&&b.conf.destroy.call(e.button(a),
e,d(a),b.conf);this._removeKey(b.conf);d(b.node).remove();a=d.inArray(b,c);c.splice(a,1);return this},text:function(a,b){var c=this._nodeToButton(a),e=this.c.dom.collection.buttonLiner,e=c.inCollection&&e&&e.tag?e.tag:this.c.dom.buttonLiner.tag,g=this.s.dt,f=d(c.node),h=function(a){return"function"===typeof a?a(g,f,c.conf):a};if(b===m)return h(c.conf.text);c.conf.text=b;e?f.children(e).html(h(b)):f.html(h(b));return this},_constructor:function(){var a=this,b=this.s.dt,c=b.settings()[0],e=this.c.buttons;
c._buttons||(c._buttons=[]);c._buttons.push({inst:this,name:this.c.name});for(var g=0,f=e.length;g<f;g++)this.add(e[g]);b.on("destroy",function(b,e){e===c&&a.destroy()});d("body").on("keyup."+this.s.namespace,function(b){if(!p.activeElement||p.activeElement===p.body){var c=String.fromCharCode(b.keyCode).toLowerCase();a.s.listenKeys.toLowerCase().indexOf(c)!==-1&&a._keypress(c,b)}})},_addKey:function(a){a.key&&(this.s.listenKeys+=d.isPlainObject(a.key)?a.key.key:a.key)},_draw:function(a,b){a||(a=this.dom.container,
b=this.s.buttons);a.children().detach();for(var c=0,e=b.length;c<e;c++)a.append(b[c].inserter),a.append(" "),b[c].buttons&&b[c].buttons.length&&this._draw(b[c].collection,b[c].buttons)},_expandButton:function(a,b,c,e){for(var g=this.s.dt,f=0,b=!d.isArray(b)?[b]:b,h=0,l=b.length;h<l;h++){var o=this._resolveExtends(b[h]);if(o)if(d.isArray(o))this._expandButton(a,o,c,e);else{var j=this._buildButton(o,c);j&&(e!==m?(a.splice(e,0,j),e++):a.push(j),j.conf.buttons&&(j.collection=d("<"+this.c.dom.collection.tag+
"/>"),j.conf._collection=j.collection,this._expandButton(j.buttons,j.conf.buttons,!0,e)),o.init&&o.init.call(g.button(j.node),g,d(j.node),o),f++)}}},_buildButton:function(a,b){var c=this.c.dom.button,e=this.c.dom.buttonLiner,g=this.c.dom.collection,f=this.s.dt,h=function(b){return"function"===typeof b?b(f,j,a):b};b&&g.button&&(c=g.button);b&&g.buttonLiner&&(e=g.buttonLiner);if(a.available&&!a.available(f,a))return!1;var l=function(a,b,c,e){e.action.call(b.button(c),a,b,c,e);d(b.table().node()).triggerHandler("buttons-action.dt",
[b.button(c),b,c,e])},g=a.tag||c.tag,o=a.clickBlurs===m?!0:a.clickBlurs,j=d("<"+g+"/>").addClass(c.className).attr("tabindex",this.s.dt.settings()[0].iTabIndex).attr("aria-controls",this.s.dt.table().node().id).on("click.dtb",function(b){b.preventDefault();!j.hasClass(c.disabled)&&a.action&&l(b,f,j,a);o&&j.blur()}).on("keyup.dtb",function(b){b.keyCode===13&&!j.hasClass(c.disabled)&&a.action&&l(b,f,j,a)});"a"===g.toLowerCase()&&j.attr("href","#");"button"===g.toLowerCase()&&j.attr("type","button");
e.tag?(g=d("<"+e.tag+"/>").html(h(a.text)).addClass(e.className),"a"===e.tag.toLowerCase()&&g.attr("href","#"),j.append(g)):j.html(h(a.text));!1===a.enabled&&j.addClass(c.disabled);a.className&&j.addClass(a.className);a.titleAttr&&j.attr("title",h(a.titleAttr));a.attr&&j.attr(a.attr);a.namespace||(a.namespace=".dt-button-"+x++);e=(e=this.c.dom.buttonContainer)&&e.tag?d("<"+e.tag+"/>").addClass(e.className).append(j):j;this._addKey(a);this.c.buttonCreated&&(e=this.c.buttonCreated(a,e));return{conf:a,
node:j.get(0),inserter:e,buttons:[],inCollection:b,collection:null}},_nodeToButton:function(a,b){b||(b=this.s.buttons);for(var c=0,e=b.length;c<e;c++){if(b[c].node===a)return b[c];if(b[c].buttons.length){var d=this._nodeToButton(a,b[c].buttons);if(d)return d}}},_nodeToHost:function(a,b){b||(b=this.s.buttons);for(var c=0,e=b.length;c<e;c++){if(b[c].node===a)return b;if(b[c].buttons.length){var d=this._nodeToHost(a,b[c].buttons);if(d)return d}}},_keypress:function(a,b){if(!b._buttonsHandled){var c=
function(e){for(var g=0,f=e.length;g<f;g++){var h=e[g].conf,l=e[g].node;if(h.key)if(h.key===a)b._buttonsHandled=!0,d(l).click();else if(d.isPlainObject(h.key)&&h.key.key===a&&(!h.key.shiftKey||b.shiftKey))if(!h.key.altKey||b.altKey)if(!h.key.ctrlKey||b.ctrlKey)if(!h.key.metaKey||b.metaKey)b._buttonsHandled=!0,d(l).click();e[g].buttons.length&&c(e[g].buttons)}};c(this.s.buttons)}},_removeKey:function(a){if(a.key){var b=d.isPlainObject(a.key)?a.key.key:a.key,a=this.s.listenKeys.split(""),b=d.inArray(b,
a);a.splice(b,1);this.s.listenKeys=a.join("")}},_resolveExtends:function(a){for(var b=this.s.dt,c,e,g=function(c){for(var e=0;!d.isPlainObject(c)&&!d.isArray(c);){if(c===m)return;if("function"===typeof c){if(c=c(b,a),!c)return!1}else if("string"===typeof c){if(!k[c])throw"Unknown button type: "+c;c=k[c]}e++;if(30<e)throw"Buttons: Too many iterations";}return d.isArray(c)?c:d.extend({},c)},a=g(a);a&&a.extend;){if(!k[a.extend])throw"Cannot extend unknown button type: "+a.extend;var f=g(k[a.extend]);
if(d.isArray(f))return f;if(!f)return!1;c=f.className;a=d.extend({},f,a);c&&a.className!==c&&(a.className=c+" "+a.className);var h=a.postfixButtons;if(h){a.buttons||(a.buttons=[]);c=0;for(e=h.length;c<e;c++)a.buttons.push(h[c]);a.postfixButtons=null}if(h=a.prefixButtons){a.buttons||(a.buttons=[]);c=0;for(e=h.length;c<e;c++)a.buttons.splice(c,0,h[c]);a.prefixButtons=null}a.extend=f.extend}return a},_popover:function(a,b,c){var e=this.c,g=d.extend({align:"button-left",autoClose:!1,background:!0,backgroundClassName:"dt-button-background",
contentClassName:e.dom.collection.className,collectionLayout:"",collectionTitle:"",dropup:!1,fade:400,rightAlignClassName:"dt-button-right",tag:e.dom.collection.tag},c),f=b.node(),h=function(){d(".dt-button-collection").stop().fadeOut(g.fade,function(){d(this).detach()});d(b.buttons('[aria-haspopup="true"][aria-expanded="true"]').nodes()).attr("aria-expanded","false");d("div.dt-button-background").off("click.dtb-collection");n.background(!1,g.backgroundClassName,g.fade,f);d("body").off(".dtb-collection");
b.off("buttons-action.b-internal")};!1===a&&h();c=d(b.buttons('[aria-haspopup="true"][aria-expanded="true"]').nodes());c.length&&(f=c.eq(0),h());c=d("<div/>").addClass("dt-button-collection").addClass(g.collectionLayout).css("display","none");a=d(a).addClass(g.contentClassName).attr("role","menu").appendTo(c);f.attr("aria-expanded","true");f.parents("body")[0]!==p.body&&(f=p.body.lastChild);g.collectionTitle&&c.prepend('<div class="dt-button-collection-title">'+g.collectionTitle+"</div>");c.insertAfter(f).fadeIn(g.fade);
var l=d(b.table().container()),e=c.css("position");"dt-container"===g.align&&(f=f.parent(),c.css("width",l.width()));if("absolute"===e){e=f.position();c.css({top:e.top+f.outerHeight(),left:e.left});var o=c.outerHeight(),j=c.outerWidth(),i=l.offset().top+l.height(),i=e.top+f.outerHeight()+o-i,m=e.top-o,k=l.offset().top,o=e.top-o-5;(i>k-m||g.dropup)&&-o<k&&c.css("top",o);(c.hasClass(g.rightAlignClassName)||"button-right"===g.align)&&c.css("left",e.left+f.outerWidth()-j);o=e.left+j;l=l.offset().left+
l.width();o>l&&c.css("left",e.left-(o-l));l=f.offset().left+j;l>d(q).width()&&c.css("left",e.left-(l-d(q).width()))}else e=c.height()/2,e>d(q).height()/2&&(e=d(q).height()/2),c.css("marginTop",-1*e);g.background&&n.background(!0,g.backgroundClassName,g.fade,f);d("div.dt-button-background").on("click.dtb-collection",function(){});d("body").on("click.dtb-collection",function(b){var c=d.fn.addBack?"addBack":"andSelf";d(b.target).parents()[c]().filter(a).length||h()}).on("keyup.dtb-collection",function(a){a.keyCode===
27&&h()});g.autoClose&&setTimeout(function(){b.on("buttons-action.b-internal",function(a,b,c,e){e[0]!==f[0]&&h()})},0)}});n.background=function(a,b,c,e){c===m&&(c=400);e||(e=p.body);a?d("<div/>").addClass(b).css("display","none").insertAfter(e).stop().fadeIn(c):d("div."+b).stop().fadeOut(c,function(){d(this).removeClass(b).remove()})};n.instanceSelector=function(a,b){if(a===m||null===a)return d.map(b,function(a){return a.inst});var c=[],e=d.map(b,function(a){return a.name}),g=function(a){if(d.isArray(a))for(var h=
0,l=a.length;h<l;h++)g(a[h]);else"string"===typeof a?-1!==a.indexOf(",")?g(a.split(",")):(a=d.inArray(d.trim(a),e),-1!==a&&c.push(b[a].inst)):"number"===typeof a&&c.push(b[a].inst)};g(a);return c};n.buttonSelector=function(a,b){for(var c=[],e=function(a,b,c){for(var d,g,f=0,h=b.length;f<h;f++)if(d=b[f])g=c!==m?c+f:f+"",a.push({node:d.node,name:d.conf.name,idx:g}),d.buttons&&e(a,d.buttons,g+"-")},g=function(a,b){var f,h,i=[];e(i,b.s.buttons);f=d.map(i,function(a){return a.node});if(d.isArray(a)||a instanceof
d){f=0;for(h=a.length;f<h;f++)g(a[f],b)}else if(null===a||a===m||"*"===a){f=0;for(h=i.length;f<h;f++)c.push({inst:b,node:i[f].node})}else if("number"===typeof a)c.push({inst:b,node:b.s.buttons[a].node});else if("string"===typeof a)if(-1!==a.indexOf(",")){i=a.split(",");f=0;for(h=i.length;f<h;f++)g(d.trim(i[f]),b)}else if(a.match(/^\d+(\-\d+)*$/))f=d.map(i,function(a){return a.idx}),c.push({inst:b,node:i[d.inArray(a,f)].node});else if(-1!==a.indexOf(":name")){var k=a.replace(":name","");f=0;for(h=
i.length;f<h;f++)i[f].name===k&&c.push({inst:b,node:i[f].node})}else d(f).filter(a).each(function(){c.push({inst:b,node:this})});else"object"===typeof a&&a.nodeName&&(i=d.inArray(a,f),-1!==i&&c.push({inst:b,node:f[i]}))},f=0,h=a.length;f<h;f++)g(b,a[f]);return c};n.defaults={buttons:["copy","excel","csv","pdf","print"],name:"main",tabIndex:0,dom:{container:{tag:"div",className:"dt-buttons"},collection:{tag:"div",className:""},button:{tag:"ActiveXObject"in q?"a":"button",className:"dt-button",active:"active",
disabled:"disabled"},buttonLiner:{tag:"span",className:""}}};n.version="1.6.1";d.extend(k,{collection:{text:function(a){return a.i18n("buttons.collection","Collection")},className:"buttons-collection",init:function(a,b){b.attr("aria-expanded",!1)},action:function(a,b,c,e){a.stopPropagation();e._collection.parents("body").length?this.popover(!1,e):this.popover(e._collection,e)},attr:{"aria-haspopup":!0}},copy:function(a,b){if(k.copyHtml5)return"copyHtml5";if(k.copyFlash&&k.copyFlash.available(a,b))return"copyFlash"},
csv:function(a,b){if(k.csvHtml5&&k.csvHtml5.available(a,b))return"csvHtml5";if(k.csvFlash&&k.csvFlash.available(a,b))return"csvFlash"},excel:function(a,b){if(k.excelHtml5&&k.excelHtml5.available(a,b))return"excelHtml5";if(k.excelFlash&&k.excelFlash.available(a,b))return"excelFlash"},pdf:function(a,b){if(k.pdfHtml5&&k.pdfHtml5.available(a,b))return"pdfHtml5";if(k.pdfFlash&&k.pdfFlash.available(a,b))return"pdfFlash"},pageLength:function(a){var a=a.settings()[0].aLengthMenu,b=d.isArray(a[0])?a[0]:a,
c=d.isArray(a[0])?a[1]:a;return{extend:"collection",text:function(a){return a.i18n("buttons.pageLength",{"-1":"Show all rows",_:"Show %d rows"},a.page.len())},className:"buttons-page-length",autoClose:!0,buttons:d.map(b,function(a,b){return{text:c[b],className:"button-page-length",action:function(b,c){c.page.len(a).draw()},init:function(b,c,d){var g=this,c=function(){g.active(b.page.len()===a)};b.on("length.dt"+d.namespace,c);c()},destroy:function(a,b,c){a.off("length.dt"+c.namespace)}}}),init:function(a,
b,c){var d=this;a.on("length.dt"+c.namespace,function(){d.text(c.text)})},destroy:function(a,b,c){a.off("length.dt"+c.namespace)}}}});i.Api.register("buttons()",function(a,b){b===m&&(b=a,a=m);this.selector.buttonGroup=a;var c=this.iterator(!0,"table",function(c){if(c._buttons)return n.buttonSelector(n.instanceSelector(a,c._buttons),b)},!0);c._groupSelector=a;return c});i.Api.register("button()",function(a,b){var c=this.buttons(a,b);1<c.length&&c.splice(1,c.length);return c});i.Api.registerPlural("buttons().active()",
"button().active()",function(a){return a===m?this.map(function(a){return a.inst.active(a.node)}):this.each(function(b){b.inst.active(b.node,a)})});i.Api.registerPlural("buttons().action()","button().action()",function(a){return a===m?this.map(function(a){return a.inst.action(a.node)}):this.each(function(b){b.inst.action(b.node,a)})});i.Api.register(["buttons().enable()","button().enable()"],function(a){return this.each(function(b){b.inst.enable(b.node,a)})});i.Api.register(["buttons().disable()",
"button().disable()"],function(){return this.each(function(a){a.inst.disable(a.node)})});i.Api.registerPlural("buttons().nodes()","button().node()",function(){var a=d();d(this.each(function(b){a=a.add(b.inst.node(b.node))}));return a});i.Api.registerPlural("buttons().processing()","button().processing()",function(a){return a===m?this.map(function(a){return a.inst.processing(a.node)}):this.each(function(b){b.inst.processing(b.node,a)})});i.Api.registerPlural("buttons().text()","button().text()",function(a){return a===
m?this.map(function(a){return a.inst.text(a.node)}):this.each(function(b){b.inst.text(b.node,a)})});i.Api.registerPlural("buttons().trigger()","button().trigger()",function(){return this.each(function(a){a.inst.node(a.node).trigger("click")})});i.Api.register("button().popover()",function(a,b){return this.map(function(c){return c.inst._popover(a,this.button(this[0].node),b)})});i.Api.register("buttons().containers()",function(){var a=d(),b=this._groupSelector;this.iterator(!0,"table",function(c){if(c._buttons)for(var c=
n.instanceSelector(b,c._buttons),d=0,g=c.length;d<g;d++)a=a.add(c[d].container())});return a});i.Api.register("buttons().container()",function(){return this.containers().eq(0)});i.Api.register("button().add()",function(a,b){var c=this.context;c.length&&(c=n.instanceSelector(this._groupSelector,c[0]._buttons),c.length&&c[0].add(b,a));return this.button(this._groupSelector,a)});i.Api.register("buttons().destroy()",function(){this.pluck("inst").unique().each(function(a){a.destroy()});return this});i.Api.registerPlural("buttons().remove()",
"buttons().remove()",function(){this.each(function(a){a.inst.remove(a.node)});return this});var r;i.Api.register("buttons.info()",function(a,b,c){var e=this;if(!1===a)return this.off("destroy.btn-info"),d("#datatables_buttons_info").fadeOut(function(){d(this).remove()}),clearTimeout(r),r=null,this;r&&clearTimeout(r);d("#datatables_buttons_info").length&&d("#datatables_buttons_info").remove();d('<div id="datatables_buttons_info" class="dt-button-info"/>').html(a?"<h2>"+a+"</h2>":"").append(d("<div/>")["string"===
typeof b?"html":"append"](b)).css("display","none").appendTo("body").fadeIn();c!==m&&0!==c&&(r=setTimeout(function(){e.buttons.info(!1)},c));this.on("destroy.btn-info",function(){e.buttons.info(!1)});return this});i.Api.register("buttons.exportData()",function(a){if(this.context.length){var b=new i.Api(this.context[0]),c=d.extend(!0,{},{rows:null,columns:"",modifier:{search:"applied",order:"applied"},orthogonal:"display",stripHtml:!0,stripNewlines:!0,decodeEntities:!0,trim:!0,format:{header:function(a){return e(a)},
footer:function(a){return e(a)},body:function(a){return e(a)}},customizeData:null},a),e=function(a){if("string"!==typeof a)return a;a=a.replace(/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,"");a=a.replace(/<!\-\-.*?\-\->/g,"");c.stripHtml&&(a=a.replace(/<[^>]*>/g,""));c.trim&&(a=a.replace(/^\s+|\s+$/g,""));c.stripNewlines&&(a=a.replace(/\n/g," "));c.decodeEntities&&(u.innerHTML=a,a=u.value);return a},a=b.columns(c.columns).indexes().map(function(a){var d=b.column(a).header();return c.format.header(d.innerHTML,
a,d)}).toArray(),g=b.table().footer()?b.columns(c.columns).indexes().map(function(a){var d=b.column(a).footer();return c.format.footer(d?d.innerHTML:"",a,d)}).toArray():null,f=d.extend({},c.modifier);b.select&&"function"===typeof b.select.info&&f.selected===m&&b.rows(c.rows,d.extend({selected:!0},f)).any()&&d.extend(f,{selected:!0});for(var f=b.rows(c.rows,f).indexes().toArray(),h=b.cells(f,c.columns),f=h.render(c.orthogonal).toArray(),h=h.nodes().toArray(),l=a.length,k=[],j=0,n=0,q=0<l?f.length/
l:0;n<q;n++){for(var p=[l],r=0;r<l;r++)p[r]=c.format.body(f[j],n,r,h[j]),j++;k[n]=p}a={header:a,footer:g,body:k};c.customizeData&&c.customizeData(a);return a}});i.Api.register("buttons.exportInfo()",function(a){a||(a={});var b;var c=a;b="*"===c.filename&&"*"!==c.title&&c.title!==m&&null!==c.title&&""!==c.title?c.title:c.filename;"function"===typeof b&&(b=b());b===m||null===b?b=null:(-1!==b.indexOf("*")&&(b=d.trim(b.replace("*",d("head > title").text()))),b=b.replace(/[^a-zA-Z0-9_\u00A1-\uFFFF\.,\-_ !\(\)]/g,
""),(c=s(c.extension))||(c=""),b+=c);c=s(a.title);c=null===c?null:-1!==c.indexOf("*")?c.replace("*",d("head > title").text()||"Exported data"):c;return{filename:b,title:c,messageTop:v(this,a.message||a.messageTop,"top"),messageBottom:v(this,a.messageBottom,"bottom")}});var s=function(a){return null===a||a===m?null:"function"===typeof a?a():a},v=function(a,b,c){b=s(b);if(null===b)return null;a=d("caption",a.table().container()).eq(0);return"*"===b?a.css("caption-side")!==c?null:a.length?a.text():"":
b},u=d("<textarea/>")[0];d.fn.dataTable.Buttons=n;d.fn.DataTable.Buttons=n;d(p).on("init.dt plugin-init.dt",function(a,b){if("dt"===a.namespace){var c=b.oInit.buttons||i.defaults.buttons;c&&!b._buttons&&(new n(b,c)).container()}});i.ext.feature.push({fnInit:t,cFeature:"B"});i.ext.features&&i.ext.features.register("buttons",t);return n});
