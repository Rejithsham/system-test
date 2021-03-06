! function(a) {
    "use strict";
    a.fn.bsPhotoGallery = function(s) {
        var i = a.extend({}, a.fn.bsPhotoGallery.defaults, s),
            l = function() {
                for (var a = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", s = "", i = 0; i < 4; i++) s += a.charAt(Math.floor(Math.random() * a.length));
                return "bsp-" + s
            }(),
            d = i.classes,
            t = (d.split(" "), {});

        function M() {
            return 'ul[data-bsp-ul-id="' + t.ulId + '"][data-bsp-ul-index="' + t.ulIndex + '"]'
        }

        function e() {
            a(M() + " li[data-bsp-li-index]").length === t.nextImg ? a("a.next").hide() : a("a.next").show(), -1 === t.prevImg ? a("a.previous").hide() : a("a.previous").show()
        }

        function n(a) {
            return a.replace('"', "").replace("'", "").replace('"', "").replace("'", "").replace("url(", "").replace(")", "")
        }

        function c() {
            var s = n(a(this).find(".bspImgWrapper")[0].style.backgroundImage),
                l = a(this).attr("data-bsp-li-index"),
                d = a(this).parent("ul").attr("data-bsp-ul-index"),
                M = a(this).parent("ul").attr("data-bsp-ul-id"),
                c = a(this).find("p").html();
            t.img = s, t.prevImg = parseInt(l) - parseInt(1), t.nextImg = parseInt(l) + parseInt(1), t.ulIndex = d, t.ulId = M, a("#bsPhotoGalleryModal").modal();
            var I = "";
            I += '<img src="' + t.img + '" class="img-responsive bsp-modal-main-image"/>', I += '<span class="bsp-close"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSLQodC70L7QuV8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxwb2x5Z29uIGZpbGw9IiMzNzM3MzciIHBvaW50cz0iMTIzLjU0Mjk2ODgsMTEuNTkzNzUgMTE2LjQ3NjU2MjUsNC41MTg1NTQ3IDY0LjAwMTk1MzEsNTYuOTMwNjY0MSAxMS41NTk1NzAzLDQuNDg4MjgxMyAgICAgNC40ODgyODEzLDExLjU1OTU3MDMgNTYuOTI3MjQ2MSw2My45OTcwNzAzIDQuNDU3MDMxMywxMTYuNDA1MjczNCAxMS41MjQ0MTQxLDEyMy40ODE0NDUzIDYzLjk5ODUzNTIsNzEuMDY4MzU5NCAgICAgMTE2LjQ0MjM4MjgsMTIzLjUxMTcxODggMTIzLjUxMjY5NTMsMTE2LjQ0MTQwNjMgNzEuMDczMjQyMiw2NC4wMDE5NTMxICAgIi8+PC9nPjwvc3ZnPg=="></span>', I += '<div class="bsp-text-container">', void 0 !== c && (I += '<p class="pText">' + c + "</p>"), I += "</div>", i.showControl && (I += '<a class="bsp-controls next" data-bsp-id="' + t.ulId + '" href="' + t.nextImg + '">', I += '<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGhlaWdodD0iNTEycHgiIGlkPSJMYXllcl8xIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgdmVyc2lvbj0iMS4xIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgd2lkdGg9IjUxMnB4IiB4bWw6c3BhY2U9InByZXNlcnZlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48cGF0aCBkPSJNMjk4LjMsMjU2TDI5OC4zLDI1NkwyOTguMywyNTZMMTMxLjEsODEuOWMtNC4yLTQuMy00LjEtMTEuNCwwLjItMTUuOGwyOS45LTMwLjZjNC4zLTQuNCwxMS4zLTQuNSwxNS41LTAuMmwyMDQuMiwyMTIuNyAgYzIuMiwyLjIsMy4yLDUuMiwzLDguMWMwLjEsMy0wLjksNS45LTMsOC4xTDE3Ni43LDQ3Ni44Yy00LjIsNC4zLTExLjIsNC4yLTE1LjUtMC4yTDEzMS4zLDQ0NmMtNC4zLTQuNC00LjQtMTEuNS0wLjItMTUuOCAgTDI5OC4zLDI1NnoiLz48L3N2Zz4="/></a>', I += '<a class="bsp-controls previous" data-bsp-id="' + t.ulId + '" href="' + t.prevImg + '">', I += '<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGhlaWdodD0iNTEycHgiIGlkPSJMYXllcl8xIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgdmVyc2lvbj0iMS4xIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgd2lkdGg9IjUxMnB4IiB4bWw6c3BhY2U9InByZXNlcnZlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48cG9seWdvbiBwb2ludHM9IjM1MiwxMjguNCAzMTkuNyw5NiAxNjAsMjU2IDE2MCwyNTYgMTYwLDI1NiAzMTkuNyw0MTYgMzUyLDM4My42IDIyNC43LDI1NiAiLz48L3N2Zz4="/></a></a>'), a("#bsPhotoGalleryModal .modal-body").html(I), a(".bsp-close").on("click", o), e()
        }

        function o() {
            a("#bsPhotoGalleryModal").modal("hide")
        }
        return this.each(function(s) {
            var t = a(this).find("li");
            a(this).attr("data-bsp-ul-id", l), a(this).attr("data-bsp-ul-index", s), t.each(function(s) {
                var l = a(this).find("img"),
                    t = a(this).find("p"),
                    M = l.attr("src");
                a(this).addClass(d), a(this).attr("data-bsp-li-index", s), l.wrap('<div class="bspImgWrapper" style="background:url(\'' + M + "');\"></div>"), t.addClass("bspText"), !0 === i.shortText && t.addClass("bspShortText"), l.remove(), !0 === i.hasModal && (a(this).addClass("bspHasModal"), a(this).on("click", c))
            })
        }), !0 === i.hasModal && (a(document).on("click", 'a.bsp-controls[data-bsp-id="' + l + '"]', function() {
            var s = a(M()),
                i = a(this).attr("href"),
                l = n(s.find('li[data-bsp-li-index="' + i + '"] .bspImgWrapper')[0].style.backgroundImage),
                d = s.find('li[data-bsp-li-index="' + i + '"] p').html();
            a("#bsPhotoGalleryModal .modal-body img.bsp-modal-main-image").attr("src", l);
            var c = "";
            return void 0 !== d && (c += '<p class="pText">' + d + "</p>"), a(".bsp-text-container").html(c), t.prevImg = parseInt(i) - 1, t.nextImg = parseInt(t.prevImg) + 2, a(this).hasClass("previous") ? (a(this).attr("href", t.prevImg), a("a.next").attr("href", t.nextImg)) : (a(this).attr("href", t.nextImg), a("a.previous").attr("href", t.prevImg)), e(), !1
        }), a(document).on("hidden.bs.modal", "#bsPhotoGalleryModal", function() {
            a("#bsPhotoGalleryModal .modal-body").html(""), t = {}
        }), function() {
            if (0 !== a("#bsPhotoGalleryModal").length) return !1;
            var s = "";
            s += '<div class="modal fade" id="bsPhotoGalleryModal" tabindex="-1" role="dialog"', s += 'aria-labelledby="myModalLabel" aria-hidden="true">', s += '<div class="modal-dialog modal-lg"><div class="modal-content">', s += '<div class="modal-body"></div></div></div></div>', a("body").append(s)
        }()), this
    }, a.fn.bsPhotoGallery.defaults = {
        classes: "col-xl-2 col-lg-2 col-md-2 col-sm-4",
        showControl: !0,
        hasModal: !0,
        shortText: !0
    }
}(jQuery);