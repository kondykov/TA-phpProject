"use strict";

function _typeof(e) {
    return (_typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                return typeof e
            }
            : function (e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            }
    )(e)
}

function _possibleConstructorReturn(e, t) {
    return !t || "object" !== _typeof(t) && "function" != typeof t ? _assertThisInitialized(e) : t
}

function _getPrototypeOf(e) {
    return (_getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function (e) {
            return e.__proto__ || Object.getPrototypeOf(e)
        }
    )(e)
}

function _assertThisInitialized(e) {
    if (void 0 === e)
        throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
    return e
}

function _inherits(e, t) {
    if ("function" != typeof t && null !== t)
        throw new TypeError("Super expression must either be null or a function");
    e.prototype = Object.create(t && t.prototype, {
        constructor: {
            value: e,
            writable: !0,
            configurable: !0
        }
    }),
    t && _setPrototypeOf(e, t)
}

function _setPrototypeOf(e, t) {
    return (_setPrototypeOf = Object.setPrototypeOf || function (e, t) {
            return e.__proto__ = t,
                e
        }
    )(e, t)
}

function _classCallCheck(e, t) {
    if (!(e instanceof t))
        throw new TypeError("Cannot call a class as a function")
}

function _defineProperties(e, t) {
    for (var n = 0; n < t.length; n++) {
        var i = t[n];
        i.enumerable = i.enumerable || !1,
            i.configurable = !0,
        "value" in i && (i.writable = !0),
            Object.defineProperty(e, i.key, i)
    }
}

function _createClass(e, t, n) {
    return t && _defineProperties(e.prototype, t),
    n && _defineProperties(e, n),
        e
}

var Emitter = function () {
    function e() {
        _classCallCheck(this, e)
    }

    return _createClass(e, [{
        key: "on",
        value: function (e, t) {
            return this._callbacks = this._callbacks || {},
            this._callbacks[e] || (this._callbacks[e] = []),
                this._callbacks[e].push(t),
                this
        }
    }, {
        key: "emit",
        value: function (e) {
            this._callbacks = this._callbacks || {};
            var t = this._callbacks[e];
            if (t) {
                for (var n = arguments.length, i = new Array(1 < n ? n - 1 : 0), r = 1; r < n; r++)
                    i[r - 1] = arguments[r];
                var o = !0
                    , a = !1
                    , l = void 0;
                try {
                    for (var s, u = t[Symbol.iterator](); !(o = (s = u.next()).done); o = !0) {
                        s.value.apply(this, i)
                    }
                } catch (e) {
                    a = !0,
                        l = e
                } finally {
                    try {
                        o || null == u.return || u.return()
                    } finally {
                        if (a)
                            throw l
                    }
                }
            }
            return this
        }
    }, {
        key: "off",
        value: function (e, t) {
            if (!this._callbacks || 0 === arguments.length)
                return this._callbacks = {},
                    this;
            var n = this._callbacks[e];
            if (!n)
                return this;
            if (1 === arguments.length)
                return delete this._callbacks[e],
                    this;
            for (var i = 0; i < n.length; i++) {
                if (n[i] === t) {
                    n.splice(i, 1);
                    break
                }
            }
            return this
        }
    }]),
        e
}()
    , Dropzone = function () {
    function C(e, t) {
        var n, i, r;
        if (_classCallCheck(this, C),
            (n = _possibleConstructorReturn(this, _getPrototypeOf(C).call(this))).element = e,
            n.version = C.version,
            n.defaultOptions.previewTemplate = n.defaultOptions.previewTemplate.replace(/\n*/g, ""),
            n.clickableElements = [],
            n.listeners = [],
            n.files = [],
        "string" == typeof n.element && (n.element = document.querySelector(n.element)),
        !n.element || null == n.element.nodeType)
            throw new Error("Invalid dropzone element.");
        if (n.element.dropzone)
            throw new Error("Dropzone already attached.");
        C.instances.push(_assertThisInitialized(n)),
            n.element.dropzone = _assertThisInitialized(n);
        var o = null != (r = C.optionsForElement(n.element)) ? r : {};
        if (n.options = C.extend({}, n.defaultOptions, o, null != t ? t : {}),
        n.options.forceFallback || !C.isBrowserSupported())
            return _possibleConstructorReturn(n, n.options.fallback.call(_assertThisInitialized(n)));
        if (null == n.options.url && (n.options.url = n.element.getAttribute("action")),
            !n.options.url)
            throw new Error("No URL provided.");
        if (n.options.acceptedFiles && n.options.acceptedMimeTypes)
            throw new Error("You can't provide both 'acceptedFiles' and 'acceptedMimeTypes'. 'acceptedMimeTypes' is deprecated.");
        if (n.options.uploadMultiple && n.options.chunking)
            throw new Error("You cannot set both: uploadMultiple and chunking.");
        return n.options.acceptedMimeTypes && (n.options.acceptedFiles = n.options.acceptedMimeTypes,
            delete n.options.acceptedMimeTypes),
        null != n.options.renameFilename && (n.options.renameFile = function (e) {
                return n.options.renameFilename.call(_assertThisInitialized(n), e.name, e)
            }
        ),
            n.options.method = n.options.method.toUpperCase(),
        (i = n.getExistingFallback()) && i.parentNode && i.parentNode.removeChild(i),
        !1 !== n.options.previewsContainer && (n.options.previewsContainer ? n.previewsContainer = C.getElement(n.options.previewsContainer, "previewsContainer") : n.previewsContainer = n.element),
        n.options.clickable && (!0 === n.options.clickable ? n.clickableElements = [n.element] : n.clickableElements = C.getElements(n.options.clickable, "clickable")),
            n.init(),
            n
    }

    return _inherits(C, Emitter),
        _createClass(C, null, [{
            key: "initClass",
            value: function () {
                this.prototype.Emitter = Emitter,
                    this.prototype.events = ["drop", "dragstart", "dragend", "dragenter", "dragover", "dragleave", "addedfile", "addedfiles", "removedfile", "thumbnail", "error", "errormultiple", "processing", "processingmultiple", "uploadprogress", "totaluploadprogress", "sending", "sendingmultiple", "success", "successmultiple", "canceled", "canceledmultiple", "complete", "completemultiple", "reset", "maxfilesexceeded", "maxfilesreached", "queuecomplete"],
                    this.prototype.defaultOptions = {
                        url: null,
                        method: "post",
                        withCredentials: !1,
                        timeout: 3e4,
                        parallelUploads: 2,
                        uploadMultiple: !1,
                        chunking: !1,
                        forceChunking: !1,
                        chunkSize: 2e6,
                        parallelChunkUploads: !1,
                        retryChunks: !1,
                        retryChunksLimit: 3,
                        maxFilesize: 256,
                        paramName: "file",
                        createImageThumbnails: !0,
                        maxThumbnailFilesize: 10,
                        thumbnailWidth: 120,
                        thumbnailHeight: 120,
                        thumbnailMethod: "crop",
                        resizeWidth: null,
                        resizeHeight: null,
                        resizeMimeType: null,
                        resizeQuality: .8,
                        resizeMethod: "contain",
                        filesizeBase: 1e3,
                        maxFiles: null,
                        headers: null,
                        clickable: !0,
                        ignoreHiddenFiles: !0,
                        acceptedFiles: null,
                        acceptedMimeTypes: null,
                        autoProcessQueue: !0,
                        autoQueue: !0,
                        addRemoveLinks: !1,
                        previewsContainer: null,
                        hiddenInputContainer: "body",
                        capture: null,
                        renameFilename: null,
                        renameFile: null,
                        forceFallback: !1,
                        dictDefaultMessage: "Drop files here to upload",
                        dictFallbackMessage: "Your browser does not support drag'n'drop file uploads.",
                        dictFallbackText: "Please use the fallback form below to upload your files like in the olden days.",
                        dictFileTooBig: "File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.",
                        dictInvalidFileType: "You can't upload files of this type.",
                        dictResponseError: "Server responded with {{statusCode}} code.",
                        dictCancelUpload: "Cancel upload",
                        dictUploadCanceled: "Upload canceled.",
                        dictCancelUploadConfirmation: "Are you sure you want to cancel this upload?",
                        dictRemoveFile: "Remove file",
                        dictRemoveFileConfirmation: null,
                        dictMaxFilesExceeded: "You can not upload any more files.",
                        dictFileSizeUnits: {
                            tb: "TB",
                            gb: "GB",
                            mb: "MB",
                            kb: "KB",
                            b: "b"
                        },
                        init: function () {
                        },
                        params: function (e, t, n) {
                            if (n)
                                return {
                                    dzuuid: n.file.upload.uuid,
                                    dzchunkindex: n.index,
                                    dztotalfilesize: n.file.size,
                                    dzchunksize: this.options.chunkSize,
                                    dztotalchunkcount: n.file.upload.totalChunkCount,
                                    dzchunkbyteoffset: n.index * this.options.chunkSize
                                }
                        },
                        accept: function (e, t) {
                            return t()
                        },
                        chunksUploaded: function (e, t) {
                            t()
                        },
                        fallback: function () {
                            var e;
                            this.element.className = "".concat(this.element.className, " dz-browser-not-supported");
                            var t = !0
                                , n = !1
                                , i = void 0;
                            try {
                                for (var r, o = this.element.getElementsByTagName("div")[Symbol.iterator](); !(t = (r = o.next()).done); t = !0) {
                                    var a = r.value;
                                    if (/(^| )dz-message($| )/.test(a.className)) {
                                        (e = a).className = "dz-message";
                                        break
                                    }
                                }
                            } catch (e) {
                                n = !0,
                                    i = e
                            } finally {
                                try {
                                    t || null == o.return || o.return()
                                } finally {
                                    if (n)
                                        throw i
                                }
                            }
                            e || (e = C.createElement('<div class="dz-message"><span></span></div>'),
                                this.element.appendChild(e));
                            var l = e.getElementsByTagName("span")[0];
                            return l && (null != l.textContent ? l.textContent = this.options.dictFallbackMessage : null != l.innerText && (l.innerText = this.options.dictFallbackMessage)),
                                this.element.appendChild(this.getFallbackForm())
                        },
                        resize: function (e, t, n, i) {
                            var r = {
                                srcX: 0,
                                srcY: 0,
                                srcWidth: e.width,
                                srcHeight: e.height
                            }
                                , o = e.width / e.height;
                            null == t && null == n ? (t = r.srcWidth,
                                n = r.srcHeight) : null == t ? t = n * o : null == n && (n = t / o);
                            var a = (t = Math.min(t, r.srcWidth)) / (n = Math.min(n, r.srcHeight));
                            if (r.srcWidth > t || r.srcHeight > n)
                                if ("crop" === i)
                                    a < o ? (r.srcHeight = e.height,
                                        r.srcWidth = r.srcHeight * a) : (r.srcWidth = e.width,
                                        r.srcHeight = r.srcWidth / a);
                                else {
                                    if ("contain" !== i)
                                        throw new Error("Unknown resizeMethod '".concat(i, "'"));
                                    a < o ? n = t / o : t = n * o
                                }
                            return r.srcX = (e.width - r.srcWidth) / 2,
                                r.srcY = (e.height - r.srcHeight) / 2,
                                r.trgWidth = t,
                                r.trgHeight = n,
                                r
                        },
                        transformFile: function (e, t) {
                            return (this.options.resizeWidth || this.options.resizeHeight) && e.type.match(/image.*/) ? this.resizeImage(e, this.options.resizeWidth, this.options.resizeHeight, this.options.resizeMethod, t) : t(e)
                        },
                        previewTemplate: '<div class="dz-preview dz-file-preview">\n  <div class="dz-image"><img data-dz-thumbnail /></div>\n  <div class="dz-details">\n    <div class="dz-size"><span data-dz-size></span></div>\n    <div class="dz-filename"><span data-dz-name></span></div>\n  </div>\n  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>\n  <div class="dz-error-message"><span data-dz-errormessage></span></div>\n  <div class="dz-success-mark">\n    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">\n      <title>Check</title>\n      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\n        <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF"></path>\n      </g>\n    </svg>\n  </div>\n  <div class="dz-error-mark">\n    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">\n      <title>Error</title>\n      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\n        <g stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">\n          <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"></path>\n        </g>\n      </g>\n    </svg>\n  </div>\n</div>',
                        drop: function () {
                            return this.element.classList.remove("dz-drag-hover")
                        },
                        dragstart: function () {
                        },
                        dragend: function () {
                            return this.element.classList.remove("dz-drag-hover")
                        },
                        dragenter: function () {
                            return this.element.classList.add("dz-drag-hover")
                        },
                        dragover: function () {
                            return this.element.classList.add("dz-drag-hover")
                        },
                        dragleave: function () {
                            return this.element.classList.remove("dz-drag-hover")
                        },
                        paste: function () {
                        },
                        reset: function () {
                            return this.element.classList.remove("dz-started")
                        },
                        addedfile: function (t) {
                            var n = this;
                            if (this.element === this.previewsContainer && this.element.classList.add("dz-started"),
                                this.previewsContainer) {
                                t.previewElement = C.createElement(this.options.previewTemplate.trim()),
                                    t.previewTemplate = t.previewElement,
                                    this.previewsContainer.appendChild(t.previewElement);
                                var e = !0
                                    , i = !1
                                    , r = void 0;
                                try {
                                    for (var o, a = t.previewElement.querySelectorAll("[data-dz-name]")[Symbol.iterator](); !(e = (o = a.next()).done); e = !0) {
                                        var l = o.value;
                                        l.textContent = t.name
                                    }
                                } catch (e) {
                                    i = !0,
                                        r = e
                                } finally {
                                    try {
                                        e || null == a.return || a.return()
                                    } finally {
                                        if (i)
                                            throw r
                                    }
                                }
                                var s = !0
                                    , u = !1
                                    , c = void 0;
                                try {
                                    for (var d, p = t.previewElement.querySelectorAll("[data-dz-size]")[Symbol.iterator](); !(s = (d = p.next()).done); s = !0)
                                        (l = d.value).innerHTML = this.filesize(t.size)
                                } catch (e) {
                                    u = !0,
                                        c = e
                                } finally {
                                    try {
                                        s || null == p.return || p.return()
                                    } finally {
                                        if (u)
                                            throw c
                                    }
                                }
                                this.options.addRemoveLinks && (t._removeLink = C.createElement('<a class="dz-remove" href="javascript:undefined;" data-dz-remove>'.concat(this.options.dictRemoveFile, "</a>")),
                                    t.previewElement.appendChild(t._removeLink));
                                var h = function (e) {
                                    return e.preventDefault(),
                                        e.stopPropagation(),
                                        t.status === C.UPLOADING ? C.confirm(n.options.dictCancelUploadConfirmation, function () {
                                            return n.removeFile(t)
                                        }) : n.options.dictRemoveFileConfirmation ? C.confirm(n.options.dictRemoveFileConfirmation, function () {
                                            return n.removeFile(t)
                                        }) : n.removeFile(t)
                                }
                                    , f = !0
                                    , v = !1
                                    , m = void 0;
                                try {
                                    for (var y, g = t.previewElement.querySelectorAll("[data-dz-remove]")[Symbol.iterator](); !(f = (y = g.next()).done); f = !0) {
                                        y.value.addEventListener("click", h)
                                    }
                                } catch (e) {
                                    v = !0,
                                        m = e
                                } finally {
                                    try {
                                        f || null == g.return || g.return()
                                    } finally {
                                        if (v)
                                            throw m
                                    }
                                }
                            }
                        },
                        removedfile: function (e) {
                            return null != e.previewElement && null != e.previewElement.parentNode && e.previewElement.parentNode.removeChild(e.previewElement),
                                this._updateMaxFilesReachedClass()
                        },
                        thumbnail: function (e, t) {
                            if (e.previewElement) {
                                e.previewElement.classList.remove("dz-file-preview");
                                var n = !0
                                    , i = !1
                                    , r = void 0;
                                try {
                                    for (var o, a = e.previewElement.querySelectorAll("[data-dz-thumbnail]")[Symbol.iterator](); !(n = (o = a.next()).done); n = !0) {
                                        var l = o.value;
                                        l.alt = e.name,
                                            l.src = t
                                    }
                                } catch (e) {
                                    i = !0,
                                        r = e
                                } finally {
                                    try {
                                        n || null == a.return || a.return()
                                    } finally {
                                        if (i)
                                            throw r
                                    }
                                }
                                return setTimeout(function () {
                                    return e.previewElement.classList.add("dz-image-preview")
                                }, 1)
                            }
                        },
                        error: function (e, t) {
                            if (e.previewElement) {
                                e.previewElement.classList.add("dz-error"),
                                "String" != typeof t && t.error && (t = t.error);
                                var n = !0
                                    , i = !1
                                    , r = void 0;
                                try {
                                    for (var o, a = e.previewElement.querySelectorAll("[data-dz-errormessage]")[Symbol.iterator](); !(n = (o = a.next()).done); n = !0) {
                                        o.value.textContent = t
                                    }
                                } catch (e) {
                                    i = !0,
                                        r = e
                                } finally {
                                    try {
                                        n || null == a.return || a.return()
                                    } finally {
                                        if (i)
                                            throw r
                                    }
                                }
                            }
                        },
                        errormultiple: function () {
                        },
                        processing: function (e) {
                            if (e.previewElement && (e.previewElement.classList.add("dz-processing"),
                                e._removeLink))
                                return e._removeLink.innerHTML = this.options.dictCancelUpload
                        },
                        processingmultiple: function () {
                        },
                        uploadprogress: function (e, t) {
                            if (e.previewElement) {
                                var n = !0
                                    , i = !1
                                    , r = void 0;
                                try {
                                    for (var o, a = e.previewElement.querySelectorAll("[data-dz-uploadprogress]")[Symbol.iterator](); !(n = (o = a.next()).done); n = !0) {
                                        var l = o.value;
                                        "PROGRESS" === l.nodeName ? l.value = t : l.style.width = "".concat(t, "%")
                                    }
                                } catch (e) {
                                    i = !0,
                                        r = e
                                } finally {
                                    try {
                                        n || null == a.return || a.return()
                                    } finally {
                                        if (i)
                                            throw r
                                    }
                                }
                            }
                        },
                        totaluploadprogress: function () {
                        },
                        sending: function () {
                        },
                        sendingmultiple: function () {
                        },
                        success: function (e) {
                            if (e.previewElement)
                                return e.previewElement.classList.add("dz-success")
                        },
                        successmultiple: function () {
                        },
                        canceled: function (e) {
                            return this.emit("error", e, this.options.dictUploadCanceled)
                        },
                        canceledmultiple: function () {
                        },
                        complete: function (e) {
                            if (e._removeLink && (e._removeLink.innerHTML = this.options.dictRemoveFile),
                                e.previewElement)
                                return e.previewElement.classList.add("dz-complete")
                        },
                        completemultiple: function () {
                        },
                        maxfilesexceeded: function () {
                        },
                        maxfilesreached: function () {
                        },
                        queuecomplete: function () {
                        },
                        addedfiles: function () {
                        }
                    },
                    this.prototype._thumbnailQueue = [],
                    this.prototype._processingThumbnail = !1
            }
        }, {
            key: "extend",
            value: function (e) {
                for (var t = arguments.length, n = new Array(1 < t ? t - 1 : 0), i = 1; i < t; i++)
                    n[i - 1] = arguments[i];
                for (var r = 0, o = n; r < o.length; r++) {
                    var a = o[r];
                    for (var l in a) {
                        var s = a[l];
                        e[l] = s
                    }
                }
                return e
            }
        }]),
        _createClass(C, [{
            key: "getAcceptedFiles",
            value: function () {
                return this.files.filter(function (e) {
                    return e.accepted
                }).map(function (e) {
                    return e
                })
            }
        }, {
            key: "getRejectedFiles",
            value: function () {
                return this.files.filter(function (e) {
                    return !e.accepted
                }).map(function (e) {
                    return e
                })
            }
        }, {
            key: "getFilesWithStatus",
            value: function (t) {
                return this.files.filter(function (e) {
                    return e.status === t
                }).map(function (e) {
                    return e
                })
            }
        }, {
            key: "getQueuedFiles",
            value: function () {
                return this.getFilesWithStatus(C.QUEUED)
            }
        }, {
            key: "getUploadingFiles",
            value: function () {
                return this.getFilesWithStatus(C.UPLOADING)
            }
        }, {
            key: "getAddedFiles",
            value: function () {
                return this.getFilesWithStatus(C.ADDED)
            }
        }, {
            key: "getActiveFiles",
            value: function () {
                return this.files.filter(function (e) {
                    return e.status === C.UPLOADING || e.status === C.QUEUED
                }).map(function (e) {
                    return e
                })
            }
        }, {
            key: "init",
            value: function () {
                var s = this;
                if ("form" === this.element.tagName && this.element.setAttribute("enctype", "multipart/form-data"),
                this.element.classList.contains("dropzone") && !this.element.querySelector(".dz-message") && this.element.appendChild(C.createElement('<div class="dz-default dz-message"><button class="dz-button" type="button">'.concat(this.options.dictDefaultMessage, "</button></div>"))),
                    this.clickableElements.length) {
                    !function l() {
                        return s.hiddenFileInput && s.hiddenFileInput.parentNode.removeChild(s.hiddenFileInput),
                            s.hiddenFileInput = document.createElement("input"),
                            s.hiddenFileInput.setAttribute("type", "file"),
                        (null === s.options.maxFiles || 1 < s.options.maxFiles) && s.hiddenFileInput.setAttribute("multiple", "multiple"),
                            s.hiddenFileInput.className = "dz-hidden-input",
                        null !== s.options.acceptedFiles && s.hiddenFileInput.setAttribute("accept", s.options.acceptedFiles),
                        null !== s.options.capture && s.hiddenFileInput.setAttribute("capture", s.options.capture),
                            s.hiddenFileInput.style.visibility = "hidden",
                            s.hiddenFileInput.style.position = "absolute",
                            s.hiddenFileInput.style.top = "0",
                            s.hiddenFileInput.style.left = "0",
                            s.hiddenFileInput.style.height = "0",
                            s.hiddenFileInput.style.width = "0",
                            C.getElement(s.options.hiddenInputContainer, "hiddenInputContainer").appendChild(s.hiddenFileInput),
                            s.hiddenFileInput.addEventListener("change", function () {
                                var e = s.hiddenFileInput.files;
                                if (e.length) {
                                    var t = !0
                                        , n = !1
                                        , i = void 0;
                                    try {
                                        for (var r, o = e[Symbol.iterator](); !(t = (r = o.next()).done); t = !0) {
                                            var a = r.value;
                                            s.addFile(a)
                                        }
                                    } catch (e) {
                                        n = !0,
                                            i = e
                                    } finally {
                                        try {
                                            t || null == o.return || o.return()
                                        } finally {
                                            if (n)
                                                throw i
                                        }
                                    }
                                }
                                return s.emit("addedfiles", e),
                                    l()
                            })
                    }()
                }
                this.URL = null !== window.URL ? window.URL : window.webkitURL;
                var e = !0
                    , t = !1
                    , n = void 0;
                try {
                    for (var i, r = this.events[Symbol.iterator](); !(e = (i = r.next()).done); e = !0) {
                        var o = i.value;
                        this.on(o, this.options[o])
                    }
                } catch (e) {
                    t = !0,
                        n = e
                } finally {
                    try {
                        e || null == r.return || r.return()
                    } finally {
                        if (t)
                            throw n
                    }
                }
                this.on("uploadprogress", function () {
                    return s.updateTotalUploadProgress()
                }),
                    this.on("removedfile", function () {
                        return s.updateTotalUploadProgress()
                    }),
                    this.on("canceled", function (e) {
                        return s.emit("complete", e)
                    }),
                    this.on("complete", function (e) {
                        if (0 === s.getAddedFiles().length && 0 === s.getUploadingFiles().length && 0 === s.getQueuedFiles().length)
                            return setTimeout(function () {
                                return s.emit("queuecomplete")
                            }, 0)
                    });

                function a(e) {
                    var t;
                    return (t = e).dataTransfer.types && t.dataTransfer.types.some(function (e) {
                        return "Files" == e
                    }) && (e.stopPropagation(),
                        e.preventDefault ? e.preventDefault() : e.returnValue = !1)
                }

                return this.listeners = [{
                    element: this.element,
                    events: {
                        dragstart: function (e) {
                            return s.emit("dragstart", e)
                        },
                        dragenter: function (e) {
                            return a(e),
                                s.emit("dragenter", e)
                        },
                        dragover: function (e) {
                            var t;
                            try {
                                t = e.dataTransfer.effectAllowed
                            } catch (e) {
                            }
                            return e.dataTransfer.dropEffect = "move" === t || "linkMove" === t ? "move" : "copy",
                                a(e),
                                s.emit("dragover", e)
                        },
                        dragleave: function (e) {
                            return s.emit("dragleave", e)
                        },
                        drop: function (e) {
                            return a(e),
                                s.drop(e)
                        },
                        dragend: function (e) {
                            return s.emit("dragend", e)
                        }
                    }
                }],
                    this.clickableElements.forEach(function (t) {
                        return s.listeners.push({
                            element: t,
                            events: {
                                click: function (e) {
                                    return t === s.element && e.target !== s.element && !C.elementInside(e.target, s.element.querySelector(".dz-message")) || s.hiddenFileInput.click(),
                                        !0
                                }
                            }
                        })
                    }),
                    this.enable(),
                    this.options.init.call(this)
            }
        }, {
            key: "destroy",
            value: function () {
                return this.disable(),
                    this.removeAllFiles(!0),
                null != this.hiddenFileInput && this.hiddenFileInput.parentNode && (this.hiddenFileInput.parentNode.removeChild(this.hiddenFileInput),
                    this.hiddenFileInput = null),
                    delete this.element.dropzone,
                    C.instances.splice(C.instances.indexOf(this), 1)
            }
        }, {
            key: "updateTotalUploadProgress",
            value: function () {
                var e, t = 0, n = 0;
                if (this.getActiveFiles().length) {
                    var i = !0
                        , r = !1
                        , o = void 0;
                    try {
                        for (var a, l = this.getActiveFiles()[Symbol.iterator](); !(i = (a = l.next()).done); i = !0) {
                            var s = a.value;
                            t += s.upload.bytesSent,
                                n += s.upload.total
                        }
                    } catch (e) {
                        r = !0,
                            o = e
                    } finally {
                        try {
                            i || null == l.return || l.return()
                        } finally {
                            if (r)
                                throw o
                        }
                    }
                    e = 100 * t / n
                } else
                    e = 100;
                return this.emit("totaluploadprogress", e, n, t)
            }
        }, {
            key: "_getParamName",
            value: function (e) {
                return "function" == typeof this.options.paramName ? this.options.paramName(e) : "".concat(this.options.paramName).concat(this.options.uploadMultiple ? "[".concat(e, "]") : "")
            }
        }, {
            key: "_renameFile",
            value: function (e) {
                return "function" != typeof this.options.renameFile ? e.name : this.options.renameFile(e)
            }
        }, {
            key: "getFallbackForm",
            value: function () {
                var e, t;
                if (e = this.getExistingFallback())
                    return e;
                var n = '<div class="dz-fallback">';
                this.options.dictFallbackText && (n += "<p>".concat(this.options.dictFallbackText, "</p>")),
                    n += '<input type="file" name="'.concat(this._getParamName(0), '" ').concat(this.options.uploadMultiple ? 'multiple="multiple"' : void 0, ' /><input type="submit" value="Upload!"></div>');
                var i = C.createElement(n);
                return "FORM" !== this.element.tagName ? (t = C.createElement('<form action="'.concat(this.options.url, '" enctype="multipart/form-data" method="').concat(this.options.method, '"></form>'))).appendChild(i) : (this.element.setAttribute("enctype", "multipart/form-data"),
                    this.element.setAttribute("method", this.options.method)),
                    null != t ? t : i
            }
        }, {
            key: "getExistingFallback",
            value: function () {
                for (var e = function (e) {
                    var t = !0
                        , n = !1
                        , i = void 0;
                    try {
                        for (var r, o = e[Symbol.iterator](); !(t = (r = o.next()).done); t = !0) {
                            var a = r.value;
                            if (/(^| )fallback($| )/.test(a.className))
                                return a
                        }
                    } catch (e) {
                        n = !0,
                            i = e
                    } finally {
                        try {
                            t || null == o.return || o.return()
                        } finally {
                            if (n)
                                throw i
                        }
                    }
                }, t = 0, n = ["div", "form"]; t < n.length; t++) {
                    var i, r = n[t];
                    if (i = e(this.element.getElementsByTagName(r)))
                        return i
                }
            }
        }, {
            key: "setupEventListeners",
            value: function () {
                return this.listeners.map(function (i) {
                    return function () {
                        var e = [];
                        for (var t in i.events) {
                            var n = i.events[t];
                            e.push(i.element.addEventListener(t, n, !1))
                        }
                        return e
                    }()
                })
            }
        }, {
            key: "removeEventListeners",
            value: function () {
                return this.listeners.map(function (i) {
                    return function () {
                        var e = [];
                        for (var t in i.events) {
                            var n = i.events[t];
                            e.push(i.element.removeEventListener(t, n, !1))
                        }
                        return e
                    }()
                })
            }
        }, {
            key: "disable",
            value: function () {
                var t = this;
                return this.clickableElements.forEach(function (e) {
                    return e.classList.remove("dz-clickable")
                }),
                    this.removeEventListeners(),
                    this.disabled = !0,
                    this.files.map(function (e) {
                        return t.cancelUpload(e)
                    })
            }
        }, {
            key: "enable",
            value: function () {
                return delete this.disabled,
                    this.clickableElements.forEach(function (e) {
                        return e.classList.add("dz-clickable")
                    }),
                    this.setupEventListeners()
            }
        }, {
            key: "filesize",
            value: function (e) {
                var t = 0
                    , n = "b";
                if (0 < e) {
                    for (var i = ["tb", "gb", "mb", "kb", "b"], r = 0; r < i.length; r++) {
                        var o = i[r];
                        if (Math.pow(this.options.filesizeBase, 4 - r) / 10 <= e) {
                            t = e / Math.pow(this.options.filesizeBase, 4 - r),
                                n = o;
                            break
                        }
                    }
                    t = Math.round(10 * t) / 10
                }
                return "<strong>".concat(t, "</strong> ").concat(this.options.dictFileSizeUnits[n])
            }
        }, {
            key: "_updateMaxFilesReachedClass",
            value: function () {
                return null != this.options.maxFiles && this.getAcceptedFiles().length >= this.options.maxFiles ? (this.getAcceptedFiles().length === this.options.maxFiles && this.emit("maxfilesreached", this.files),
                    this.element.classList.add("dz-max-files-reached")) : this.element.classList.remove("dz-max-files-reached")
            }
        }, {
            key: "drop",
            value: function (e) {
                if (e.dataTransfer) {
                    this.emit("drop", e);
                    for (var t = [], n = 0; n < e.dataTransfer.files.length; n++)
                        t[n] = e.dataTransfer.files[n];
                    if (t.length) {
                        var i = e.dataTransfer.items;
                        i && i.length && null != i[0].webkitGetAsEntry ? this._addFilesFromItems(i) : this.handleFiles(t)
                    }
                    this.emit("addedfiles", t)
                }
            }
        }, {
            key: "paste",
            value: function (e) {
                if (null != __guard__(null != e ? e.clipboardData : void 0, function (e) {
                    return e.items
                })) {
                    this.emit("paste", e);
                    var t = e.clipboardData.items;
                    return t.length ? this._addFilesFromItems(t) : void 0
                }
            }
        }, {
            key: "handleFiles",
            value: function (e) {
                var t = !0
                    , n = !1
                    , i = void 0;
                try {
                    for (var r, o = e[Symbol.iterator](); !(t = (r = o.next()).done); t = !0) {
                        var a = r.value;
                        this.addFile(a)
                    }
                } catch (e) {
                    n = !0,
                        i = e
                } finally {
                    try {
                        t || null == o.return || o.return()
                    } finally {
                        if (n)
                            throw i
                    }
                }
            }
        }, {
            key: "_addFilesFromItems",
            value: function (s) {
                var u = this;
                return function () {
                    var e = []
                        , t = !0
                        , n = !1
                        , i = void 0;
                    try {
                        for (var r, o = s[Symbol.iterator](); !(t = (r = o.next()).done); t = !0) {
                            var a, l = r.value;
                            null != l.webkitGetAsEntry && (a = l.webkitGetAsEntry()) ? a.isFile ? e.push(u.addFile(l.getAsFile())) : a.isDirectory ? e.push(u._addFilesFromDirectory(a, a.name)) : e.push(void 0) : null != l.getAsFile && (null == l.kind || "file" === l.kind) ? e.push(u.addFile(l.getAsFile())) : e.push(void 0)
                        }
                    } catch (e) {
                        n = !0,
                            i = e
                    } finally {
                        try {
                            t || null == o.return || o.return()
                        } finally {
                            if (n)
                                throw i
                        }
                    }
                    return e
                }()
            }
        }, {
            key: "_addFilesFromDirectory",
            value: function (e, s) {
                function t(t) {
                    return __guardMethod__(console, "log", function (e) {
                        return e.log(t)
                    })
                }

                var u = this
                    , n = e.createReader();
                return function l() {
                    return n.readEntries(function (e) {
                        if (0 < e.length) {
                            var t = !0
                                , n = !1
                                , i = void 0;
                            try {
                                for (var r, o = e[Symbol.iterator](); !(t = (r = o.next()).done); t = !0) {
                                    var a = r.value;
                                    a.isFile ? a.file(function (e) {
                                        if (!u.options.ignoreHiddenFiles || "." !== e.name.substring(0, 1))
                                            return e.fullPath = "".concat(s, "/").concat(e.name),
                                                u.addFile(e)
                                    }) : a.isDirectory && u._addFilesFromDirectory(a, "".concat(s, "/").concat(a.name))
                                }
                            } catch (e) {
                                n = !0,
                                    i = e
                            } finally {
                                try {
                                    t || null == o.return || o.return()
                                } finally {
                                    if (n)
                                        throw i
                                }
                            }
                            l()
                        }
                        return null
                    }, t)
                }()
            }
        }, {
            key: "accept",
            value: function (e, t) {
                this.options.maxFilesize && e.size > 1024 * this.options.maxFilesize * 1024 ? t(this.options.dictFileTooBig.replace("{{filesize}}", Math.round(e.size / 1024 / 10.24) / 100).replace("{{maxFilesize}}", this.options.maxFilesize)) : C.isValidFile(e, this.options.acceptedFiles) ? null != this.options.maxFiles && this.getAcceptedFiles().length >= this.options.maxFiles ? (t(this.options.dictMaxFilesExceeded.replace("{{maxFiles}}", this.options.maxFiles)),
                    this.emit("maxfilesexceeded", e)) : this.options.accept.call(this, e, t) : t(this.options.dictInvalidFileType)
            }
        }, {
            key: "addFile",
            value: function (t) {
                var n = this;
                t.upload = {
                    uuid: C.uuidv4(),
                    progress: 0,
                    total: t.size,
                    bytesSent: 0,
                    filename: this._renameFile(t)
                },
                    this.files.push(t),
                    t.status = C.ADDED,
                    this.emit("addedfile", t),
                    this._enqueueThumbnail(t),
                    this.accept(t, function (e) {
                        e ? (t.accepted = !1,
                            n._errorProcessing([t], e)) : (t.accepted = !0,
                        n.options.autoQueue && n.enqueueFile(t)),
                            n._updateMaxFilesReachedClass()
                    })
            }
        }, {
            key: "enqueueFiles",
            value: function (e) {
                var t = !0
                    , n = !1
                    , i = void 0;
                try {
                    for (var r, o = e[Symbol.iterator](); !(t = (r = o.next()).done); t = !0) {
                        var a = r.value;
                        this.enqueueFile(a)
                    }
                } catch (e) {
                    n = !0,
                        i = e
                } finally {
                    try {
                        t || null == o.return || o.return()
                    } finally {
                        if (n)
                            throw i
                    }
                }
                return null
            }
        }, {
            key: "enqueueFile",
            value: function (e) {
                var t = this;
                if (e.status !== C.ADDED || !0 !== e.accepted)
                    throw new Error("This file can't be queued because it has already been processed or was rejected.");
                if (e.status = C.QUEUED,
                    this.options.autoProcessQueue)
                    return setTimeout(function () {
                        return t.processQueue()
                    }, 0)
            }
        }, {
            key: "_enqueueThumbnail",
            value: function (e) {
                var t = this;
                if (this.options.createImageThumbnails && e.type.match(/image.*/) && e.size <= 1024 * this.options.maxThumbnailFilesize * 1024)
                    return this._thumbnailQueue.push(e),
                        setTimeout(function () {
                            return t._processThumbnailQueue()
                        }, 0)
            }
        }, {
            key: "_processThumbnailQueue",
            value: function () {
                var t = this;
                if (!this._processingThumbnail && 0 !== this._thumbnailQueue.length) {
                    this._processingThumbnail = !0;
                    var n = this._thumbnailQueue.shift();
                    return this.createThumbnail(n, this.options.thumbnailWidth, this.options.thumbnailHeight, this.options.thumbnailMethod, !0, function (e) {
                        return t.emit("thumbnail", n, e),
                            t._processingThumbnail = !1,
                            t._processThumbnailQueue()
                    })
                }
            }
        }, {
            key: "removeFile",
            value: function (e) {
                if (e.status === C.UPLOADING && this.cancelUpload(e),
                    this.files = without(this.files, e),
                    this.emit("removedfile", e),
                0 === this.files.length)
                    return this.emit("reset")
            }
        }, {
            key: "removeAllFiles",
            value: function (e) {
                null == e && (e = !1);
                var t = !0
                    , n = !1
                    , i = void 0;
                try {
                    for (var r, o = this.files.slice()[Symbol.iterator](); !(t = (r = o.next()).done); t = !0) {
                        var a = r.value;
                        a.status === C.UPLOADING && !e || this.removeFile(a)
                    }
                } catch (e) {
                    n = !0,
                        i = e
                } finally {
                    try {
                        t || null == o.return || o.return()
                    } finally {
                        if (n)
                            throw i
                    }
                }
                return null
            }
        }, {
            key: "resizeImage",
            value: function (r, e, t, n, o) {
                var a = this;
                return this.createThumbnail(r, e, t, n, !0, function (e, t) {
                    if (null == t)
                        return o(r);
                    var n = a.options.resizeMimeType;
                    null == n && (n = r.type);
                    var i = t.toDataURL(n, a.options.resizeQuality);
                    return "image/jpeg" !== n && "image/jpg" !== n || (i = ExifRestore.restore(r.dataURL, i)),
                        o(C.dataURItoBlob(i))
                })
            }
        }, {
            key: "createThumbnail",
            value: function (e, t, n, i, r, o) {
                var a = this
                    , l = new FileReader;
                l.onload = function () {
                    e.dataURL = l.result,
                        "image/svg+xml" !== e.type ? a.createThumbnailFromUrl(e, t, n, i, r, o) : null != o && o(l.result)
                }
                    ,
                    l.readAsDataURL(e)
            }
        }, {
            key: "displayExistingFile",
            value: function (t, e, n, i, r) {
                var o = this
                    , a = !(4 < arguments.length && void 0 !== r) || r;
                if (this.emit("addedfile", t),
                    this.emit("complete", t),
                    a) {
                    t.dataURL = e,
                        this.createThumbnailFromUrl(t, this.options.thumbnailWidth, this.options.thumbnailHeight, this.options.resizeMethod, this.options.fixOrientation, function (e) {
                            o.emit("thumbnail", t, e),
                            n && n()
                        }, i)
                } else
                    this.emit("thumbnail", t, e),
                    n && n()
            }
        }, {
            key: "createThumbnailFromUrl",
            value: function (o, a, l, s, t, u, e) {
                var c = this
                    , d = document.createElement("img");
                return e && (d.crossOrigin = e),
                    d.onload = function () {
                        var e = function (e) {
                            return e(1)
                        };
                        return "undefined" != typeof EXIF && null !== EXIF && t && (e = function (e) {
                                return EXIF.getData(d, function () {
                                    return e(EXIF.getTag(this, "Orientation"))
                                })
                            }
                        ),
                            e(function (e) {
                                o.width = d.width,
                                    o.height = d.height;
                                var t = c.options.resize.call(c, o, a, l, s)
                                    , n = document.createElement("canvas")
                                    , i = n.getContext("2d");
                                switch (n.width = t.trgWidth,
                                    n.height = t.trgHeight,
                                4 < e && (n.width = t.trgHeight,
                                    n.height = t.trgWidth),
                                    e) {
                                    case 2:
                                        i.translate(n.width, 0),
                                            i.scale(-1, 1);
                                        break;
                                    case 3:
                                        i.translate(n.width, n.height),
                                            i.rotate(Math.PI);
                                        break;
                                    case 4:
                                        i.translate(0, n.height),
                                            i.scale(1, -1);
                                        break;
                                    case 5:
                                        i.rotate(.5 * Math.PI),
                                            i.scale(1, -1);
                                        break;
                                    case 6:
                                        i.rotate(.5 * Math.PI),
                                            i.translate(0, -n.width);
                                        break;
                                    case 7:
                                        i.rotate(.5 * Math.PI),
                                            i.translate(n.height, -n.width),
                                            i.scale(-1, 1);
                                        break;
                                    case 8:
                                        i.rotate(-.5 * Math.PI),
                                            i.translate(-n.height, 0)
                                }
                                drawImageIOSFix(i, d, null != t.srcX ? t.srcX : 0, null != t.srcY ? t.srcY : 0, t.srcWidth, t.srcHeight, null != t.trgX ? t.trgX : 0, null != t.trgY ? t.trgY : 0, t.trgWidth, t.trgHeight);
                                var r = n.toDataURL("image/png");
                                if (null != u)
                                    return u(r, n)
                            })
                    }
                    ,
                null != u && (d.onerror = u),
                    d.src = o.dataURL
            }
        }, {
            key: "processQueue",
            value: function () {
                var e = this.options.parallelUploads
                    , t = this.getUploadingFiles().length
                    , n = t;
                if (!(e <= t)) {
                    var i = this.getQueuedFiles();
                    if (0 < i.length) {
                        if (this.options.uploadMultiple)
                            return this.processFiles(i.slice(0, e - t));
                        for (; n < e;) {
                            if (!i.length)
                                return;
                            this.processFile(i.shift()),
                                n++
                        }
                    }
                }
            }
        }, {
            key: "processFile",
            value: function (e) {
                return this.processFiles([e])
            }
        }, {
            key: "processFiles",
            value: function (e) {
                var t = !0
                    , n = !1
                    , i = void 0;
                try {
                    for (var r, o = e[Symbol.iterator](); !(t = (r = o.next()).done); t = !0) {
                        var a = r.value;
                        a.processing = !0,
                            a.status = C.UPLOADING,
                            this.emit("processing", a)
                    }
                } catch (e) {
                    n = !0,
                        i = e
                } finally {
                    try {
                        t || null == o.return || o.return()
                    } finally {
                        if (n)
                            throw i
                    }
                }
                return this.options.uploadMultiple && this.emit("processingmultiple", e),
                    this.uploadFiles(e)
            }
        }, {
            key: "_getFilesWithXhr",
            value: function (t) {
                return this.files.filter(function (e) {
                    return e.xhr === t
                }).map(function (e) {
                    return e
                })
            }
        }, {
            key: "cancelUpload",
            value: function (e) {
                if (e.status === C.UPLOADING) {
                    var t = this._getFilesWithXhr(e.xhr)
                        , n = !0
                        , i = !1
                        , r = void 0;
                    try {
                        for (var o, a = t[Symbol.iterator](); !(n = (o = a.next()).done); n = !0) {
                            o.value.status = C.CANCELED
                        }
                    } catch (e) {
                        i = !0,
                            r = e
                    } finally {
                        try {
                            n || null == a.return || a.return()
                        } finally {
                            if (i)
                                throw r
                        }
                    }
                    void 0 !== e.xhr && e.xhr.abort();
                    var l = !0
                        , s = !1
                        , u = void 0;
                    try {
                        for (var c, d = t[Symbol.iterator](); !(l = (c = d.next()).done); l = !0) {
                            var p = c.value;
                            this.emit("canceled", p)
                        }
                    } catch (e) {
                        s = !0,
                            u = e
                    } finally {
                        try {
                            l || null == d.return || d.return()
                        } finally {
                            if (s)
                                throw u
                        }
                    }
                    this.options.uploadMultiple && this.emit("canceledmultiple", t)
                } else
                    e.status !== C.ADDED && e.status !== C.QUEUED || (e.status = C.CANCELED,
                        this.emit("canceled", e),
                    this.options.uploadMultiple && this.emit("canceledmultiple", [e]));
                if (this.options.autoProcessQueue)
                    return this.processQueue()
            }
        }, {
            key: "resolveOption",
            value: function (e) {
                if ("function" != typeof e)
                    return e;
                for (var t = arguments.length, n = new Array(1 < t ? t - 1 : 0), i = 1; i < t; i++)
                    n[i - 1] = arguments[i];
                return e.apply(this, n)
            }
        }, {
            key: "uploadFile",
            value: function (e) {
                return this.uploadFiles([e])
            }
        }, {
            key: "uploadFiles",
            value: function (s) {
                var u = this;
                this._transformFiles(s, function (e) {
                    if (u.options.chunking) {
                        var t = e[0];
                        s[0].upload.chunked = u.options.chunking && (u.options.forceChunking || t.size > u.options.chunkSize),
                            s[0].upload.totalChunkCount = Math.ceil(t.size / u.options.chunkSize)
                    }
                    if (s[0].upload.chunked) {
                        var r = s[0]
                            , o = e[0];
                        r.upload.chunks = [];
                        var i = function () {
                            for (var e = 0; void 0 !== r.upload.chunks[e];)
                                e++;
                            if (!(e >= r.upload.totalChunkCount)) {
                                0;
                                var t = e * u.options.chunkSize
                                    , n = Math.min(t + u.options.chunkSize, r.size)
                                    , i = {
                                    name: u._getParamName(0),
                                    data: o.webkitSlice ? o.webkitSlice(t, n) : o.slice(t, n),
                                    filename: r.upload.filename,
                                    chunkIndex: e
                                };
                                r.upload.chunks[e] = {
                                    file: r,
                                    index: e,
                                    dataBlock: i,
                                    status: C.UPLOADING,
                                    progress: 0,
                                    retries: 0
                                },
                                    u._uploadData(s, [i])
                            }
                        };
                        if (r.upload.finishedChunkUpload = function (e) {
                            var t = !0;
                            e.status = C.SUCCESS,
                                e.dataBlock = null,
                                e.xhr = null;
                            for (var n = 0; n < r.upload.totalChunkCount; n++) {
                                if (void 0 === r.upload.chunks[n])
                                    return i();
                                r.upload.chunks[n].status !== C.SUCCESS && (t = !1)
                            }
                            t && u.options.chunksUploaded(r, function () {
                                u._finished(s, "", null)
                            })
                        }
                            ,
                            u.options.parallelChunkUploads)
                            for (var n = 0; n < r.upload.totalChunkCount; n++)
                                i();
                        else
                            i()
                    } else {
                        for (var a = [], l = 0; l < s.length; l++)
                            a[l] = {
                                name: u._getParamName(l),
                                data: e[l],
                                filename: s[l].upload.filename
                            };
                        u._uploadData(s, a)
                    }
                })
            }
        }, {
            key: "_getChunk",
            value: function (e, t) {
                for (var n = 0; n < e.upload.totalChunkCount; n++)
                    if (void 0 !== e.upload.chunks[n] && e.upload.chunks[n].xhr === t)
                        return e.upload.chunks[n]
            }
        }, {
            key: "_uploadData",
            value: function (t, e) {
                var n = this
                    , i = new XMLHttpRequest
                    , r = !0
                    , o = !1
                    , a = void 0;
                try {
                    for (var l, s = t[Symbol.iterator](); !(r = (l = s.next()).done); r = !0) {
                        l.value.xhr = i
                    }
                } catch (e) {
                    o = !0,
                        a = e
                } finally {
                    try {
                        r || null == s.return || s.return()
                    } finally {
                        if (o)
                            throw a
                    }
                }
                t[0].upload.chunked && (t[0].upload.chunks[e[0].chunkIndex].xhr = i);
                var u = this.resolveOption(this.options.method, t)
                    , c = this.resolveOption(this.options.url, t);
                i.open(u, c, !0),
                    i.timeout = this.resolveOption(this.options.timeout, t),
                    i.withCredentials = !!this.options.withCredentials,
                    i.onload = function (e) {
                        n._finishedUploading(t, i, e)
                    }
                    ,
                    i.ontimeout = function () {
                        n._handleUploadError(t, i, "Request timedout after ".concat(n.options.timeout, " seconds"))
                    }
                    ,
                    i.onerror = function () {
                        n._handleUploadError(t, i)
                    }
                    ,
                    (null != i.upload ? i.upload : i).onprogress = function (e) {
                        return n._updateFilesUploadProgress(t, i, e)
                    }
                ;
                var d = {
                    Accept: "application/json",
                    "Cache-Control": "no-cache",
                    "X-Requested-With": "XMLHttpRequest"
                };
                for (var p in this.options.headers && C.extend(d, this.options.headers),
                    d) {
                    var h = d[p];
                    h && i.setRequestHeader(p, h)
                }
                var f = new FormData;
                if (this.options.params) {
                    var v = this.options.params;
                    for (var m in "function" == typeof v && (v = v.call(this, t, i, t[0].upload.chunked ? this._getChunk(t[0], i) : null)),
                        v) {
                        var y = v[m];
                        f.append(m, y)
                    }
                }
                var g = !0
                    , b = !1
                    , k = void 0;
                try {
                    for (var w, F = t[Symbol.iterator](); !(g = (w = F.next()).done); g = !0) {
                        var z = w.value;
                        this.emit("sending", z, i, f)
                    }
                } catch (e) {
                    b = !0,
                        k = e
                } finally {
                    try {
                        g || null == F.return || F.return()
                    } finally {
                        if (b)
                            throw k
                    }
                }
                this.options.uploadMultiple && this.emit("sendingmultiple", t, i, f),
                    this._addFormElementData(f);
                for (var x = 0; x < e.length; x++) {
                    var E = e[x];
                    f.append(E.name, E.data, E.filename)
                }
                this.submitRequest(i, f, t)
            }
        }, {
            key: "_transformFiles",
            value: function (n, i) {
                for (var e = this, r = [], o = 0, t = function (t) {
                    e.options.transformFile.call(e, n[t], function (e) {
                        r[t] = e,
                        ++o === n.length && i(r)
                    })
                }, a = 0; a < n.length; a++)
                    t(a)
            }
        }, {
            key: "_addFormElementData",
            value: function (e) {
                if ("FORM" === this.element.tagName) {
                    var t = !0
                        , n = !1
                        , i = void 0;
                    try {
                        for (var r, o = this.element.querySelectorAll("input, textarea, select, button")[Symbol.iterator](); !(t = (r = o.next()).done); t = !0) {
                            var a = r.value
                                , l = a.getAttribute("name")
                                , s = a.getAttribute("type");
                            if (s = s && s.toLowerCase(),
                            null != l)
                                if ("SELECT" === a.tagName && a.hasAttribute("multiple")) {
                                    var u = !0
                                        , c = !1
                                        , d = void 0;
                                    try {
                                        for (var p, h = a.options[Symbol.iterator](); !(u = (p = h.next()).done); u = !0) {
                                            var f = p.value;
                                            f.selected && e.append(l, f.value)
                                        }
                                    } catch (e) {
                                        c = !0,
                                            d = e
                                    } finally {
                                        try {
                                            u || null == h.return || h.return()
                                        } finally {
                                            if (c)
                                                throw d
                                        }
                                    }
                                } else
                                    (!s || "checkbox" !== s && "radio" !== s || a.checked) && e.append(l, a.value)
                        }
                    } catch (e) {
                        n = !0,
                            i = e
                    } finally {
                        try {
                            t || null == o.return || o.return()
                        } finally {
                            if (n)
                                throw i
                        }
                    }
                }
            }
        }, {
            key: "_updateFilesUploadProgress",
            value: function (e, t, n) {
                var i;
                if (void 0 !== n) {
                    if (i = 100 * n.loaded / n.total,
                        e[0].upload.chunked) {
                        var r = e[0]
                            , o = this._getChunk(r, t);
                        o.progress = i,
                            o.total = n.total,
                            o.bytesSent = n.loaded;
                        r.upload.progress = 0,
                            r.upload.total = 0;
                        for (var a = r.upload.bytesSent = 0; a < r.upload.totalChunkCount; a++)
                            void 0 !== r.upload.chunks[a] && void 0 !== r.upload.chunks[a].progress && (r.upload.progress += r.upload.chunks[a].progress,
                                r.upload.total += r.upload.chunks[a].total,
                                r.upload.bytesSent += r.upload.chunks[a].bytesSent);
                        r.upload.progress = r.upload.progress / r.upload.totalChunkCount
                    } else {
                        var l = !0
                            , s = !1
                            , u = void 0;
                        try {
                            for (var c, d = e[Symbol.iterator](); !(l = (c = d.next()).done); l = !0) {
                                var p = c.value;
                                p.upload.progress = i,
                                    p.upload.total = n.total,
                                    p.upload.bytesSent = n.loaded
                            }
                        } catch (e) {
                            s = !0,
                                u = e
                        } finally {
                            try {
                                l || null == d.return || d.return()
                            } finally {
                                if (s)
                                    throw u
                            }
                        }
                    }
                    var h = !0
                        , f = !1
                        , v = void 0;
                    try {
                        for (var m, y = e[Symbol.iterator](); !(h = (m = y.next()).done); h = !0) {
                            var g = m.value;
                            this.emit("uploadprogress", g, g.upload.progress, g.upload.bytesSent)
                        }
                    } catch (e) {
                        f = !0,
                            v = e
                    } finally {
                        try {
                            h || null == y.return || y.return()
                        } finally {
                            if (f)
                                throw v
                        }
                    }
                } else {
                    var b = !0
                        , k = !0
                        , w = !(i = 100)
                        , F = void 0;
                    try {
                        for (var z, x = e[Symbol.iterator](); !(k = (z = x.next()).done); k = !0) {
                            var E = z.value;
                            100 === E.upload.progress && E.upload.bytesSent === E.upload.total || (b = !1),
                                E.upload.progress = i,
                                E.upload.bytesSent = E.upload.total
                        }
                    } catch (e) {
                        w = !0,
                            F = e
                    } finally {
                        try {
                            k || null == x.return || x.return()
                        } finally {
                            if (w)
                                throw F
                        }
                    }
                    if (b)
                        return;
                    var C = !0
                        , _ = !1
                        , S = void 0;
                    try {
                        for (var D, T = e[Symbol.iterator](); !(C = (D = T.next()).done); C = !0) {
                            var L = D.value;
                            this.emit("uploadprogress", L, i, L.upload.bytesSent)
                        }
                    } catch (e) {
                        _ = !0,
                            S = e
                    } finally {
                        try {
                            C || null == T.return || T.return()
                        } finally {
                            if (_)
                                throw S
                        }
                    }
                }
            }
        }, {
            key: "_finishedUploading",
            value: function (e, t, n) {
                var i;
                if (e[0].status !== C.CANCELED && 4 === t.readyState) {
                    if ("arraybuffer" !== t.responseType && "blob" !== t.responseType && (i = t.responseText,
                    t.getResponseHeader("content-type") && ~t.getResponseHeader("content-type").indexOf("application/json")))
                        try {
                            i = JSON.parse(i)
                        } catch (e) {
                            n = e,
                                i = "Invalid JSON response from server."
                        }
                    this._updateFilesUploadProgress(e),
                        200 <= t.status && t.status < 300 ? e[0].upload.chunked ? e[0].upload.finishedChunkUpload(this._getChunk(e[0], t)) : this._finished(e, i, n) : this._handleUploadError(e, t, i)
                }
            }
        }, {
            key: "_handleUploadError",
            value: function (e, t, n) {
                if (e[0].status !== C.CANCELED) {
                    if (e[0].upload.chunked && this.options.retryChunks) {
                        var i = this._getChunk(e[0], t);
                        if (i.retries++ < this.options.retryChunksLimit)
                            return void this._uploadData(e, [i.dataBlock]);
                        console.warn("Retried this chunk too often. Giving up.")
                    }
                    this._errorProcessing(e, n || this.options.dictResponseError.replace("{{statusCode}}", t.status), t)
                }
            }
        }, {
            key: "submitRequest",
            value: function (e, t) {
                e.send(t)
            }
        }, {
            key: "_finished",
            value: function (e, t, n) {
                var i = !0
                    , r = !1
                    , o = void 0;
                try {
                    for (var a, l = e[Symbol.iterator](); !(i = (a = l.next()).done); i = !0) {
                        var s = a.value;
                        s.status = C.SUCCESS,
                            this.emit("success", s, t, n),
                            this.emit("complete", s)
                    }
                } catch (e) {
                    r = !0,
                        o = e
                } finally {
                    try {
                        i || null == l.return || l.return()
                    } finally {
                        if (r)
                            throw o
                    }
                }
                if (this.options.uploadMultiple && (this.emit("successmultiple", e, t, n),
                    this.emit("completemultiple", e)),
                    this.options.autoProcessQueue)
                    return this.processQueue()
            }
        }, {
            key: "_errorProcessing",
            value: function (e, t, n) {
                var i = !0
                    , r = !1
                    , o = void 0;
                try {
                    for (var a, l = e[Symbol.iterator](); !(i = (a = l.next()).done); i = !0) {
                        var s = a.value;
                        s.status = C.ERROR,
                            this.emit("error", s, t, n),
                            this.emit("complete", s)
                    }
                } catch (e) {
                    r = !0,
                        o = e
                } finally {
                    try {
                        i || null == l.return || l.return()
                    } finally {
                        if (r)
                            throw o
                    }
                }
                if (this.options.uploadMultiple && (this.emit("errormultiple", e, t, n),
                    this.emit("completemultiple", e)),
                    this.options.autoProcessQueue)
                    return this.processQueue()
            }
        }], [{
            key: "uuidv4",
            value: function () {
                return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function (e) {
                    var t = 16 * Math.random() | 0;
                    return ("x" === e ? t : 3 & t | 8).toString(16)
                })
            }
        }]),
        C
}();
Dropzone.initClass(),
    Dropzone.version = "5.7.0",
    Dropzone.options = {},
    Dropzone.optionsForElement = function (e) {
        return e.getAttribute("id") ? Dropzone.options[camelize(e.getAttribute("id"))] : void 0
    }
    ,
    Dropzone.instances = [],
    Dropzone.forElement = function (e) {
        if ("string" == typeof e && (e = document.querySelector(e)),
        null == (null != e ? e.dropzone : void 0))
            throw new Error("No Dropzone found for given element. This is probably because you're trying to access it before Dropzone had the time to initialize. Use the `init` option to setup any additional observers on your Dropzone.");
        return e.dropzone
    }
    ,
    Dropzone.autoDiscover = !0,
    Dropzone.discover = function () {
        var s;
        if (document.querySelectorAll)
            s = document.querySelectorAll(".dropzone");
        else {
            s = [];
            var e = function (l) {
                return function () {
                    var e = []
                        , t = !0
                        , n = !1
                        , i = void 0;
                    try {
                        for (var r, o = l[Symbol.iterator](); !(t = (r = o.next()).done); t = !0) {
                            var a = r.value;
                            /(^| )dropzone($| )/.test(a.className) ? e.push(s.push(a)) : e.push(void 0)
                        }
                    } catch (e) {
                        n = !0,
                            i = e
                    } finally {
                        try {
                            t || null == o.return || o.return()
                        } finally {
                            if (n)
                                throw i
                        }
                    }
                    return e
                }()
            };
            e(document.getElementsByTagName("div")),
                e(document.getElementsByTagName("form"))
        }
        return function () {
            var e = []
                , t = !0
                , n = !1
                , i = void 0;
            try {
                for (var r, o = s[Symbol.iterator](); !(t = (r = o.next()).done); t = !0) {
                    var a = r.value;
                    !1 !== Dropzone.optionsForElement(a) ? e.push(new Dropzone(a)) : e.push(void 0)
                }
            } catch (e) {
                n = !0,
                    i = e
            } finally {
                try {
                    t || null == o.return || o.return()
                } finally {
                    if (n)
                        throw i
                }
            }
            return e
        }()
    }
    ,
    Dropzone.blacklistedBrowsers = [/opera.*(Macintosh|Windows Phone).*version\/12/i],
    Dropzone.isBrowserSupported = function () {
        var e = !0;
        if (window.File && window.FileReader && window.FileList && window.Blob && window.FormData && document.querySelector)
            if ("classList" in document.createElement("a")) {
                var t = !0
                    , n = !1
                    , i = void 0;
                try {
                    for (var r, o = Dropzone.blacklistedBrowsers[Symbol.iterator](); !(t = (r = o.next()).done); t = !0) {
                        r.value.test(navigator.userAgent) && (e = !1)
                    }
                } catch (e) {
                    n = !0,
                        i = e
                } finally {
                    try {
                        t || null == o.return || o.return()
                    } finally {
                        if (n)
                            throw i
                    }
                }
            } else
                e = !1;
        else
            e = !1;
        return e
    }
    ,
    Dropzone.dataURItoBlob = function (e) {
        for (var t = atob(e.split(",")[1]), n = e.split(",")[0].split(":")[1].split(";")[0], i = new ArrayBuffer(t.length), r = new Uint8Array(i), o = 0, a = t.length, l = 0 <= a; l ? o <= a : a <= o; l ? o++ : o--)
            r[o] = t.charCodeAt(o);
        return new Blob([i], {
            type: n
        })
    }
;
var without = function (e, t) {
    return e.filter(function (e) {
        return e !== t
    }).map(function (e) {
        return e
    })
}
    , camelize = function (e) {
    return e.replace(/[\-_](\w)/g, function (e) {
        return e.charAt(1).toUpperCase()
    })
};
Dropzone.createElement = function (e) {
    var t = document.createElement("div");
    return t.innerHTML = e,
        t.childNodes[0]
}
    ,
    Dropzone.elementInside = function (e, t) {
        if (e === t)
            return !0;
        for (; e = e.parentNode;)
            if (e === t)
                return !0;
        return !1
    }
    ,
    Dropzone.getElement = function (e, t) {
        var n;
        if ("string" == typeof e ? n = document.querySelector(e) : null != e.nodeType && (n = e),
        null == n)
            throw new Error("Invalid `".concat(t, "` option provided. Please provide a CSS selector or a plain HTML element."));
        return n
    }
    ,
    Dropzone.getElements = function (e, t) {
        var n, i;
        if (e instanceof Array) {
            i = [];
            try {
                var r = !0
                    , o = !1
                    , a = void 0;
                try {
                    for (var l, s = e[Symbol.iterator](); !(r = (l = s.next()).done); r = !0)
                        n = l.value,
                            i.push(this.getElement(n, t))
                } catch (e) {
                    o = !0,
                        a = e
                } finally {
                    try {
                        r || null == s.return || s.return()
                    } finally {
                        if (o)
                            throw a
                    }
                }
            } catch (e) {
                i = null
            }
        } else if ("string" == typeof e) {
            var u = !0
                , c = !(i = [])
                , d = void 0;
            try {
                for (var p, h = document.querySelectorAll(e)[Symbol.iterator](); !(u = (p = h.next()).done); u = !0)
                    n = p.value,
                        i.push(n)
            } catch (e) {
                c = !0,
                    d = e
            } finally {
                try {
                    u || null == h.return || h.return()
                } finally {
                    if (c)
                        throw d
                }
            }
        } else
            null != e.nodeType && (i = [e]);
        if (null == i || !i.length)
            throw new Error("Invalid `".concat(t, "` option provided. Please provide a CSS selector, a plain HTML element or a list of those."));
        return i
    }
    ,
    Dropzone.confirm = function (e, t, n) {
        return window.confirm(e) ? t() : null != n ? n() : void 0
    }
    ,
    Dropzone.isValidFile = function (e, t) {
        if (!t)
            return !0;
        t = t.split(",");
        var n = e.type
            , i = n.replace(/\/.*$/, "")
            , r = !0
            , o = !1
            , a = void 0;
        try {
            for (var l, s = t[Symbol.iterator](); !(r = (l = s.next()).done); r = !0) {
                var u = l.value;
                if ("." === (u = u.trim()).charAt(0)) {
                    if (-1 !== e.name.toLowerCase().indexOf(u.toLowerCase(), e.name.length - u.length))
                        return !0
                } else if (/\/\*$/.test(u)) {
                    if (i === u.replace(/\/.*$/, ""))
                        return !0
                } else if (n === u)
                    return !0
            }
        } catch (e) {
            o = !0,
                a = e
        } finally {
            try {
                r || null == s.return || s.return()
            } finally {
                if (o)
                    throw a
            }
        }
        return !1
    }
    ,
"undefined" != typeof jQuery && null !== jQuery && (jQuery.fn.dropzone = function (e) {
        return this.each(function () {
            return new Dropzone(this, e)
        })
    }
),
    "undefined" != typeof module && null !== module ? module.exports = Dropzone : window.Dropzone = Dropzone,
    Dropzone.ADDED = "added",
    Dropzone.QUEUED = "queued",
    Dropzone.ACCEPTED = Dropzone.QUEUED,
    Dropzone.UPLOADING = "uploading",
    Dropzone.PROCESSING = Dropzone.UPLOADING,
    Dropzone.CANCELED = "canceled",
    Dropzone.ERROR = "error",
    Dropzone.SUCCESS = "success";
var detectVerticalSquash = function (e) {
    e.naturalWidth;
    var t = e.naturalHeight
        , n = document.createElement("canvas");
    n.width = 1,
        n.height = t;
    var i = n.getContext("2d");
    i.drawImage(e, 0, 0);
    for (var r = i.getImageData(1, 0, 1, t).data, o = 0, a = t, l = t; o < l;) {
        0 === r[4 * (l - 1) + 3] ? a = l : o = l,
            l = a + o >> 1
    }
    var s = l / t;
    return 0 == s ? 1 : s
}
    , drawImageIOSFix = function (e, t, n, i, r, o, a, l, s, u) {
    var c = detectVerticalSquash(t);
    return e.drawImage(t, n, i, r, o, a, l, s, u / c)
}
    , ExifRestore = function () {
    function e() {
        _classCallCheck(this, e)
    }

    return _createClass(e, null, [{
        key: "initClass",
        value: function () {
            this.KEY_STR = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/="
        }
    }, {
        key: "encode64",
        value: function (e) {
            for (var t = "", n = void 0, i = void 0, r = "", o = void 0, a = void 0, l = void 0, s = "", u = 0; o = (n = e[u++]) >> 2,
                a = (3 & n) << 4 | (i = e[u++]) >> 4,
                l = (15 & i) << 2 | (r = e[u++]) >> 6,
                s = 63 & r,
                isNaN(i) ? l = s = 64 : isNaN(r) && (s = 64),
                t = t + this.KEY_STR.charAt(o) + this.KEY_STR.charAt(a) + this.KEY_STR.charAt(l) + this.KEY_STR.charAt(s),
                n = i = r = "",
                o = a = l = s = "",
            u < e.length;)
                ;
            return t
        }
    }, {
        key: "restore",
        value: function (e, t) {
            if (!e.match("data:image/jpeg;base64,"))
                return t;
            var n = this.decode64(e.replace("data:image/jpeg;base64,", ""))
                , i = this.slice2Segments(n)
                , r = this.exifManipulation(t, i);
            return "data:image/jpeg;base64,".concat(this.encode64(r))
        }
    }, {
        key: "exifManipulation",
        value: function (e, t) {
            var n = this.getExifArray(t)
                , i = this.insertExif(e, n);
            return new Uint8Array(i)
        }
    }, {
        key: "getExifArray",
        value: function (e) {
            for (var t = void 0, n = 0; n < e.length;) {
                if (255 === (t = e[n])[0] & 225 === t[1])
                    return t;
                n++
            }
            return []
        }
    }, {
        key: "insertExif",
        value: function (e, t) {
            var n = e.replace("data:image/jpeg;base64,", "")
                , i = this.decode64(n)
                , r = i.indexOf(255, 3)
                , o = i.slice(0, r)
                , a = i.slice(r)
                , l = o;
            return l = (l = l.concat(t)).concat(a)
        }
    }, {
        key: "slice2Segments",
        value: function (e) {
            for (var t = 0, n = []; ;) {
                if (255 === e[t] & 218 === e[t + 1])
                    break;
                if (255 === e[t] & 216 === e[t + 1])
                    t += 2;
                else {
                    var i = t + (256 * e[t + 2] + e[t + 3]) + 2
                        , r = e.slice(t, i);
                    n.push(r),
                        t = i
                }
                if (t > e.length)
                    break
            }
            return n
        }
    }, {
        key: "decode64",
        value: function (e) {
            var t = void 0
                , n = void 0
                , i = ""
                , r = void 0
                , o = void 0
                , a = ""
                , l = 0
                , s = [];
            for (/[^A-Za-z0-9\+\/\=]/g.exec(e) && console.warn("There were invalid base64 characters in the input text.\nValid base64 characters are A-Z, a-z, 0-9, '+', '/',and '='\nExpect errors in decoding."),
                     e = e.replace(/[^A-Za-z0-9\+\/\=]/g, ""); t = this.KEY_STR.indexOf(e.charAt(l++)) << 2 | (r = this.KEY_STR.indexOf(e.charAt(l++))) >> 4,
                     n = (15 & r) << 4 | (o = this.KEY_STR.indexOf(e.charAt(l++))) >> 2,
                     i = (3 & o) << 6 | (a = this.KEY_STR.indexOf(e.charAt(l++))),
                     s.push(t),
                 64 !== o && s.push(n),
                 64 !== a && s.push(i),
                     t = n = i = "",
                     r = o = a = "",
                 l < e.length;)
                ;
            return s
        }
    }]),
        e
}();
ExifRestore.initClass();
var contentLoaded = function (t, n) {
    function i(e) {
        if ("readystatechange" !== e.type || "complete" === o.readyState)
            return ("load" === e.type ? t : o)[s](u + e.type, i, !1),
                !r && (r = !0) ? n.call(t, e.type || e) : void 0
    }

    var r = !1
        , e = !0
        , o = t.document
        , a = o.documentElement
        , l = o.addEventListener ? "addEventListener" : "attachEvent"
        , s = o.addEventListener ? "removeEventListener" : "detachEvent"
        , u = o.addEventListener ? "" : "on";
    if ("complete" !== o.readyState) {
        if (o.createEventObject && a.doScroll) {
            try {
                e = !t.frameElement
            } catch (e) {
            }
            e && !function t() {
                try {
                    a.doScroll("left")
                } catch (e) {
                    return void setTimeout(t, 50)
                }
                return i("poll")
            }()
        }
        return o[l](u + "DOMContentLoaded", i, !1),
            o[l](u + "readystatechange", i, !1),
            t[l](u + "load", i, !1)
    }
};

function __guard__(e, t) {
    return null != e ? t(e) : void 0
}

function __guardMethod__(e, t, n) {
    return null != e && "function" == typeof e[t] ? n(e, t) : void 0
}

Dropzone._autoDiscoverFunction = function () {
    if (Dropzone.autoDiscover)
        return Dropzone.discover()
}
,
contentLoaded(window, Dropzone._autoDiscoverFunction);
