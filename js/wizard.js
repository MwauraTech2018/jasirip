﻿//$(document).ready(function () {
//
//    var navListItems = $('div.setup-panel div a'),
//            allWells = $('.setup-content'),
//            allNextBtn = $('.nextBtn');
//
//    allWells.hide();
//
//    navListItems.click(function (e) {
//        e.preventDefault();
//        var $target = $($(this).attr('href')),
//                $item = $(this);
//
//        if (!$item.hasClass('disabled')) {
//            navListItems.removeClass('btn-primary').addClass('btn-default');
//            $item.addClass('btn-primary');
//            allWells.hide();
//            $target.show();
//            $target.find('input:eq(0)').focus();
//        }
//    });
//
//    allNextBtn.click(function(){
//        var curStep = $(this).closest(".setup-content"),
//            curStepBtn = curStep.attr("id"),
//            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
//            curInputs = curStep.find("input[type='text'],input[type='url']"),
//            isValid = true;
//
//        $(".form-group").removeClass("has-error");
//        for(var i=0; i<curInputs.length; i++){
//            if (!curInputs[i].validity.valid){
//                isValid = false;
//                $(curInputs[i]).closest(".form-group").addClass("has-error");
//            }
//        }
//
//        if (isValid)
//            nextStepWizard.removeAttr('disabled').trigger('click');
//    });
//
//    $('div.setup-panel div a.btn-primary').trigger('click');
//});

//$(document).ready(function () {
//    //Initialize tooltips
//    $('.nav-tabs > li a[title]').tooltip();
//
//    //Wizard
//    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
//
//        var $target = $(e.target);
//
//        if ($target.parent().hasClass('disabled')) {
//            return false;
//        }
//    });
//
//    $(".next-step").click(function (e) {
//
//        var $active = $('.wizard .nav-tabs li.active');
//        $active.next().removeClass('disabled');
//        nextTab($active);
//
//    });
//    $(".prev-step").click(function (e) {
//
//        var $active = $('.wizard .nav-tabs li.active');
//        prevTab($active);
//
//    });
//});
//
//function nextTab(elem) {
//    $(elem).next().find('a[data-toggle="tab"]').click();
//}
//function prevTab(elem) {
//    $(elem).prev().find('a[data-toggle="tab"]').click();
//}

/*!
 * jQuery twitter bootstrap wizard plugin
 * Examples and documentation at: http://github.com/VinceG/twitter-bootstrap-wizard
 * version 1.3.1
 * Requires jQuery v1.3.2 or later
 * Supports Bootstrap 2.2.x, 2.3.x, 3.0
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 * Authors: Vadim Vincent Gabriel (http://vadimg.com), Jason Gill (www.gilluminate.com)
 */
!function (a) { var b = function (b, c) { var b = a(b), d = this, e = 'li:has([data-toggle="tab"])', f = [], g = a.extend({}, a.fn.bootstrapWizard.defaults, c), h = null, i = null; this.rebindClick = function (a, b) { a.unbind("click", b).bind("click", b) }, this.fixNavigationButtons = function () { return h.length || (i.find("a:first").tab("show"), h = i.find(e + ":first")), a(g.previousSelector, b).toggleClass("disabled", d.firstIndex() >= d.currentIndex()), a(g.nextSelector, b).toggleClass("disabled", d.currentIndex() >= d.navigationLength()), a(g.nextSelector, b).toggleClass("hidden", d.currentIndex() >= d.navigationLength() && a(g.finishSelector, b).length > 0), a(g.lastSelector, b).toggleClass("hidden", d.currentIndex() >= d.navigationLength() && a(g.finishSelector, b).length > 0), a(g.finishSelector, b).toggleClass("hidden", d.currentIndex() < d.navigationLength()), a(g.backSelector, b).toggleClass("disabled", 0 == f.length), a(g.backSelector, b).toggleClass("hidden", d.currentIndex() >= d.navigationLength() && a(g.finishSelector, b).length > 0), d.rebindClick(a(g.nextSelector, b), d.next), d.rebindClick(a(g.previousSelector, b), d.previous), d.rebindClick(a(g.lastSelector, b), d.last), d.rebindClick(a(g.firstSelector, b), d.first), d.rebindClick(a(g.finishSelector, b), d.finish), d.rebindClick(a(g.backSelector, b), d.back), g.onTabShow && "function" == typeof g.onTabShow && g.onTabShow(h, i, d.currentIndex()) === !1 ? !1 : void 0 }, this.next = function (a) { if (b.hasClass("last")) return !1; if (g.onNext && "function" == typeof g.onNext && g.onNext(h, i, d.nextIndex()) === !1) return !1; var c = d.currentIndex(), j = d.nextIndex(); j > d.navigationLength() || (f.push(c), i.find(e + (g.withVisible ? ":visible" : "") + ":eq(" + j + ") a").tab("show")) }, this.previous = function (a) { if (b.hasClass("first")) return !1; if (g.onPrevious && "function" == typeof g.onPrevious && g.onPrevious(h, i, d.previousIndex()) === !1) return !1; var c = d.currentIndex(), j = d.previousIndex(); 0 > j || (f.push(c), i.find(e + (g.withVisible ? ":visible" : "") + ":eq(" + j + ") a").tab("show")) }, this.first = function (a) { return g.onFirst && "function" == typeof g.onFirst && g.onFirst(h, i, d.firstIndex()) === !1 ? !1 : b.hasClass("disabled") ? !1 : (f.push(d.currentIndex()), void i.find(e + ":eq(0) a").tab("show")) }, this.last = function (a) { return g.onLast && "function" == typeof g.onLast && g.onLast(h, i, d.lastIndex()) === !1 ? !1 : b.hasClass("disabled") ? !1 : (f.push(d.currentIndex()), void i.find(e + ":eq(" + d.navigationLength() + ") a").tab("show")) }, this.finish = function (a) { g.onFinish && "function" == typeof g.onFinish && g.onFinish(h, i, d.lastIndex()) }, this.back = function () { if (0 == f.length) return null; var a = f.pop(); return g.onBack && "function" == typeof g.onBack && g.onBack(h, i, a) === !1 ? (f.push(a), !1) : void b.find(e + ":eq(" + a + ") a").tab("show") }, this.currentIndex = function () { return i.find(e).index(h) }, this.firstIndex = function () { return 0 }, this.lastIndex = function () { return d.navigationLength() }, this.getIndex = function (a) { return i.find(e).index(a) }, this.nextIndex = function () { return i.find(e).index(h) + 1 }, this.previousIndex = function () { return i.find(e).index(h) - 1 }, this.navigationLength = function () { return i.find(e).length - 1 }, this.activeTab = function () { return h }, this.nextTab = function () { return i.find(e + ":eq(" + (d.currentIndex() + 1) + ")").length ? i.find(e + ":eq(" + (d.currentIndex() + 1) + ")") : null }, this.previousTab = function () { return d.currentIndex() <= 0 ? null : i.find(e + ":eq(" + parseInt(d.currentIndex() - 1) + ")") }, this.show = function (a) { var c = isNaN(a) ? b.find(e + " a[href=#" + a + "]") : b.find(e + ":eq(" + a + ") a"); c.length > 0 && (f.push(d.currentIndex()), c.tab("show")) }, this.disable = function (a) { i.find(e + ":eq(" + a + ")").addClass("disabled") }, this.enable = function (a) { i.find(e + ":eq(" + a + ")").removeClass("disabled") }, this.hide = function (a) { i.find(e + ":eq(" + a + ")").hide() }, this.display = function (a) { i.find(e + ":eq(" + a + ")").show() }, this.remove = function (b) { var c = b[0], d = "undefined" != typeof b[1] ? b[1] : !1, f = i.find(e + ":eq(" + c + ")"); if (d) { var g = f.find("a").attr("href"); a(g).remove() } f.remove() }; var j = function (b) { var c = i.find(e), f = c.index(a(b.currentTarget).parent(e)), j = a(c[f]); return g.onTabClick && "function" == typeof g.onTabClick && g.onTabClick(h, i, d.currentIndex(), f, j) === !1 ? !1 : void 0 }, k = function (b) { var c = a(b.target).parent(), f = i.find(e).index(c); return c.hasClass("disabled") ? !1 : g.onTabChange && "function" == typeof g.onTabChange && g.onTabChange(h, i, d.currentIndex(), f) === !1 ? !1 : (h = c, void d.fixNavigationButtons()) }; this.resetWizard = function () { a('a[data-toggle="tab"]', i).off("click", j), a('a[data-toggle="tab"]', i).off("shown shown.bs.tab", k), i = b.find("ul:first", b), h = i.find(e + ".active", b), a('a[data-toggle="tab"]', i).on("click", j), a('a[data-toggle="tab"]', i).on("shown shown.bs.tab", k), d.fixNavigationButtons() }, i = b.find("ul:first", b), h = i.find(e + ".active", b), i.hasClass(g.tabClass) || i.addClass(g.tabClass), g.onInit && "function" == typeof g.onInit && g.onInit(h, i, 0), g.onShow && "function" == typeof g.onShow && g.onShow(h, i, d.nextIndex()), a('a[data-toggle="tab"]', i).on("click", j), a('a[data-toggle="tab"]', i).on("shown shown.bs.tab", k) }; a.fn.bootstrapWizard = function (c) { if ("string" == typeof c) { var d = Array.prototype.slice.call(arguments, 1); return 1 === d.length && d.toString(), this.data("bootstrapWizard")[c](d) } return this.each(function (d) { var e = a(this); if (!e.data("bootstrapWizard")) { var f = new b(e, c); e.data("bootstrapWizard", f), f.fixNavigationButtons() } }) }, a.fn.bootstrapWizard.defaults = { "withVisible": !0, "tabClass": "nav nav-pills", "nextSelector": ".wizard li.next", "previousSelector": ".wizard li.previous", "firstSelector": ".wizard li.first", "lastSelector": ".wizard li.last", "finishSelector": ".wizard li.finish", "backSelector": ".wizard li.back", "onShow": null, "onInit": null, "onNext": null, "onPrevious": null, "onLast": null, "onFirst": null, "onFinish": null, "onBack": null, "onTabChange": null, "onTabClick": null, "onTabShow": null } }(jQuery);