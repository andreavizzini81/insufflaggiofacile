class Utils {

    static checkResourceExists(urlToFile) {
        let xhr = new XMLHttpRequest();
        xhr.open('HEAD', urlToFile, false);
        xhr.send();
        return xhr.status != '404';
    }
    
    static validateEmail(str) {
        var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(str);
    }
    
    static validateItalianMobilePhoneNumber(mob_num) {
        var re = /^3\d{9}$/;
        var re2 = /^3\d{8}$/;
        return (!re.test(mob_num) && !re2.test(mob_num)) ? false : true;
    }
    
    static validateCurrency(currencyValue) {
        return !isNaN(currencyValue);
    }
    
    static validateURI(urlString) {
        return /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(urlString);
    }
    
    static validateString(str) {
        return (typeof(str) === 'string' && str.trim() != '');
    }
    
    static validateFloat(protoStr) {
        var re = /^[-+]?[0-9]+([.][0-9+]{1,2})?$/;
        return (!isNaN(parseFloat(protoStr)) && re.test(protoStr));
    }
    
    static validateInt(protoStr) {
        var re = /^[-+]?[0-9]+$/;
        if (!isNaN(parseInt(protoStr)) && re.test(protoStr)) {
            return true;
        }
        return false;
    }

    static capitalize(string) {
        let words = string.toLowerCase().split(' ');
        return words.map(word => {
            return (word.length > 1) ? word.charAt(0).toUpperCase() + word.slice(1) : word;
        }).join(' ');
    }
    
    static sortTable(tblID, rowCell, order) {
        var tbl = document.getElementById(tblID).tBodies[0];
        var store = [];
        for(var i = 0, len = tbl.rows.length; i < len; i++){
            var row = tbl.rows[i];
            var sortnr = parseFloat(row.cells[rowCell].textContent || row.cells[rowCell].innerText);
            if(!isNaN(sortnr)) store.push([sortnr, row]);
        }
        store.sort(function(x,y){
            return x[0] - y[0];
        });
        if (order == 1) {
            store.reverse();
        }
        for(var i = 0, len = store.length; i < len; i++){
            tbl.appendChild(store[i][1]);
        }
        store = null;
    }
    
    static getScrollPercent() {
        var h = document.documentElement, 
            b = document.body,
            st = 'scrollTop',
            sh = 'scrollHeight';
        return (h[st]||b[st]) / ((h[sh]||b[sh]) - h.clientHeight) * 100;
    }

    static extractJson(node, removeAfterParse = false) {
        const domElement = (node.constructor.name == 'String') ? 
            document.querySelector(node) : 
            node;
        if (!(domElement instanceof HTMLScriptElement) || domElement.type != 'application/json') {
            return null;
        }
        const data = JSON.parse(domElement.textContent);
        if (removeAfterParse) {
            domElement.remove();
        }
        return data;
    }

}

class resAlert {

    title;
    text;
    options;    
    wrapper;
    domElement;

    constructor(title = '', text = '', options = {}) {
        if (title.trim() == '' && text.trim() == '') {
            throw 'Nothing to notify';
        }
        this.title = title;
        this.text = text;
        this.options = {
            autoclose: true,
            timer: 5000,
            type: 'info',
            ...options
        };
        this.init();
    }

    initializeWrapper() {
        this.wrapper = document.querySelector('.notifications');
        if (this.wrapper == null) {
            document.body.insertAdjacentHTML('beforeend', '<div class="notifications"></div>');
            this.wrapper = document.querySelector('.notifications');
        }
    }

    init() {
        this.initializeWrapper();
        this.domElement = document.createElement('div');
        this.domElement.classList.add('notification', 'entering', this.options.type);

        if (this.title.trim() != '') {
            this.domElement.insertAdjacentHTML('beforeend', `<h3 class="title">${this.title}</h3>`);
        }
        if (this.text.trim() != '') {
            this.domElement.insertAdjacentHTML('beforeend', `<div class="text">${this.text}</div>`);
        }

        this.wrapper.prepend(this.domElement);
        this.registerEventsHandlers();
        this.show();
    }

    registerEventsHandlers() {

        this.domElement.addEventListener('click', () => {
            this.domElement.classList.add('closing');
            if (typeof this.options.callback === 'function') {
                this.options.callback();
            }
        });

        this.domElement.addEventListener('transitionend', () => {
            if (this.domElement.classList.contains('closing')) {
                this.domElement.remove();
            }
        });

    }

    show() {
        requestAnimationFrame(() => {
            this.domElement.classList.remove('entering');
            if (this.options.autoclose === true) {
                setTimeout(() => {
                    this.close();
                }, this.options.timer);
            }            
        });
    }

    close() {
        requestAnimationFrame(() => {
            this.domElement.classList.add('closing');
        });
    }

    static info(title = '', text = '', options = {}) {
        return new resAlert(title, text, {
            ...options, 
            type: 'info'
        });
    }

    static success(title = '', text = '', options = {}) {
        return new resAlert(title, text, {
            ...options, 
            type: 'success'
        });
    }

    static warning(title = '', text = '', options = {}) {
        return new resAlert(title, text, {
            ...options, 
            type: 'warning'
        });
    }    

    static error(title = '', text = '', options = {}) {
        return new resAlert(title, text, {
            ...options, 
            type: 'error'
        });
    }

}

class FormSerializer {

    form;
    data;

    constructor(form) {
        this.form = form;
    }

    serialize() {
        this.data = {};
        Array.from(this.form.elements).forEach(field => {
            let _value = this.getValue(field);
            if (_value === null) {
                return;
            }
            if (Array.isArray(_value)) {
                _value.forEach(_item => {
                    this.getPropertyEntry(field, _item);
                });
            } else {
                this.getPropertyEntry(field, _value);
            }
        });
        return this.data;
    }

    getValue(field) {
        if (!field.name || field.disabled || ['file', 'reset', 'submit', 'button'].indexOf(field.type) > -1) {
            return null;
        }
        if (['checkbox', 'radio'].indexOf(field.type) >-1 && !field.checked) {
            return null;
        };
        let isArray = (field.name.slice(-2) == '[]');
        let key = (isArray) ? field.name.replace('[]', '') : field.name;
        if (field.type === 'select-multiple') {
            let _value = [];
            Array.prototype.slice.call(field.options).forEach(option => {
                if (!option.selected) return;
                _value.push(option.value);
            });
            return _value;
        }
        return isArray ? [field.value] : field.value;
    }

    getPropertyEntry(property, value = null) {
        let props = property.name.split('.');
        let _root = this.data;
        props.forEach((prop, index) => {
            let isArray = (prop.slice(-2) == '[]');
            let _default = (isArray) ? [] : {};
            prop = isArray ? prop.slice(0, -2) : prop;
            if (index === props.length - 1) {
                _root[prop] = (_root[prop] === undefined) ? _default : _root[prop];
                return (Array.isArray(_root[prop])) ? _root[prop].push(value) : _root[prop] = value;             
            }
            if (_root[prop] !== undefined) {
                _root = _root[prop];
                return;
            }
            _root[prop] = _default;
            _root = _root[prop];
        });            
    }

    static for(form) {
        return new FormSerializer(form);
    }
}

class HttpRequest {

    method; 
    url; 
    data; 
    success; 
    fail; 
    options; 
    response;
    static validMethods = ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD'];
    defaultOptions = {
        failByStatusCode: true
    };

    constructor(params = {}) {
        this.setMethod(params.method ?? 'GET');
        this.url = params.url ?? window.location.href;
        this.data = params.data ?? null;
        this.onSuccess = params.onSuccess ?? null;
        this.onFail = params.onFail ?? null;
        this.options = {
            ...this.defaultOptions,
            ...params.options ?? {}
        };
    }

    setMethod(method) {
        if (!HttpRequest.validMethods.includes(method)) {
            throw 'Invalid request method';
        }
        this.method = method;
    }

    objectToFormData(obj, cfg, fd, pre) {
        cfg = cfg || {};
        cfg.indices = this.isUndefined(cfg.indices) ? false : cfg.indices;
        cfg.nullsAsUndefineds = this.isUndefined(cfg.nullsAsUndefineds) ? false : cfg.nullsAsUndefineds;
        cfg.booleansAsIntegers = this.isUndefined(cfg.booleansAsIntegers) ? false : cfg.booleansAsIntegers;
        fd = fd || new FormData();
        if (this.isUndefined(obj)) {
            return fd;
        } else if (this.isNull(obj)) {
            if (!cfg.nullsAsUndefineds) {
                fd.append(pre, '');
            }
        } else if (this.isBoolean(obj)) {
            if (cfg.booleansAsIntegers) {
                fd.append(pre, obj ? 1 : 0);
            } else {
                fd.append(pre, obj);
            }
        } else if (this.isArray(obj)) {
            if (obj.length) {
                obj.forEach((value, index) => {
                    let key = pre + '[' + (cfg.indices ? index : '') + ']';
                    this.objectToFormData(value, cfg, fd, key);
                });
            }
        } else if (this.isDate(obj)) {
            fd.append(pre, obj.toISOString());
        } else if (this.isObject(obj) && !this.isFile(obj) && !this.isBlob(obj)) {
            Object.keys(obj).forEach(prop => {
                let value = obj[prop];
                if (this.isArray(value)) {
                    while (prop.length > 2 && prop.lastIndexOf('[]') === prop.length - 2) {
                        prop = prop.substring(0, prop.length - 2);
                    }
                }
                let key = pre ? pre + '[' + prop + ']' : prop;
                this.objectToFormData(value, cfg, fd, key);
            });
        } else {
            fd.append(pre, obj);
        }
        return fd;
    };

    isUndefined(value) {
        return value === undefined;
    }

    isNull(value) {
        return value === null;
    }

    isBoolean(value) {
        return (typeof value === 'boolean');
    }

    isObject(value) {
        return (value === Object(value));
    }

    isArray(value) {
        return Array.isArray(value);
    }

    isDate(value) {
        return (value instanceof Date);
    }

    isBlob(value) {
        return (
            value && 
            typeof value.size === 'number' && 
            typeof value.type === 'string' && 
            typeof value.slice === 'function'
        );
    }

    isFile(value) {
        return (
            this.isBlob(value) && 
            typeof value.name === 'string' && 
            (typeof value.lastModifiedDate === 'object' || typeof value.lastModified === 'number')
        );
    }

    async send() {
        let reqConfig = {
            cache: 'no-cache',
            credentials: 'include',
            method: this.method
        };

        if (this.method != 'GET' && typeof this.data == 'object') {
            if (this.data instanceof FormData) {
                reqConfig.body = this.data;
            } else {
                reqConfig.body = this.objectToFormData(this.data);
            }
        }
        
        this.response = null;

        return await fetch(this.url, reqConfig).then(res => {
            this.response = res;
            if (this.options.failByStatusCode == true && !this.response.ok) {
                throw `Response is not valid.\nStatus code: ${res.status}`;
            }
            return (res.headers.get('Content-Type') === 'application/json') ? res.json() : res.text();
        }).then(val => {
            if (typeof this.onSuccess == 'function') {
                this.onSuccess(val, this.response);
            }
            return val;
        }).catch(err => {
            if (typeof this.onFail == 'function') {
                this.onFail(err, this.response);
            }
        });
    }

    static get(url, onSuccess, onFail = null, options = {}) {
        return new HttpRequest({
            options: options,
            url: url,
            onSuccess: onSuccess,
            onFail: onFail
        }).send();
    }

    static post(url, data, onSuccess, onFail = null, options = {}) {
        return new HttpRequest({
            options: options,
            url: url,
            data: data,
            method: 'POST',
            onSuccess: onSuccess,
            onFail: onFail
        }).send();
    }

    static put(url, data, onSuccess, onFail = null, options = {}) {
        return new HttpRequest({
            options: options,
            url: url,
            data: data,
            method: 'PUT',
            onSuccess: onSuccess,
            onFail: onFail
        }).send();
    }

    static patch(url, data, onSuccess, onFail = null, options = {}) {
        return new HttpRequest({
            options: options,
            url: url,
            data: data,
            method: 'PATCH',
            onSuccess: onSuccess,
            onFail: onFail
        }).send();
    }

    static delete(url, data, onSuccess, onFail = null, options = {}) {
        return new HttpRequest({
            ...options,
            url: url,
            method: 'DELETE',
            onSuccess: onSuccess,
            onFail: onFail
        }).send();
    }

    static head(url, onSuccess, onFail = null, options = {}) {
        return new HttpRequest({
            options: options,
            url: url,
            method: 'HEAD',
            onSuccess: onSuccess,
            onFail: onFail
        }).send();
    }

}

class LinkedFields {

    container;
    toggles;
    params;
    defaults = {
        parentSelector: '.form-group', 
        parentToggleClass: 'hidden'
    }

    constructor(container, params = {}) {
        if (!(container instanceof HTMLElement)) {
            throw 'Invalid container, the supplied value is not an instance of HTMLElement';
        }
        this.container = container;
        this.params = {...this.defaults, ...params};
        this.init();
    }

    init() {
        this.toggles = this.container.querySelectorAll('[data-toggle-group]');
        this.toggles.forEach(toggle => {
            toggle.linkedElements = document.querySelectorAll(`[data-toggled-by="${toggle.dataset.toggleGroup}"]`);
            let isDefault = false;
            switch(true) {
                case (toggle instanceof HTMLOptionElement):
                    toggle.parentNode.addEventListener('change', () => {
                        toggle.selected == true && this.toggle(toggle);
                    });
                    isDefault = toggle.selected;
                    break;
                case (toggle instanceof HTMLInputElement && ['checkbox', 'radio'].includes(toggle.type)):
                    toggle.addEventListener('change', () => {
                        this.toggle(toggle);
                    });
                    isDefault = toggle.checked;
                    break;
            }
            isDefault && this.toggle(toggle);
        });
    }

    toggle(item) {
        item.linkedElements.forEach(_element => {
            _element.disabled = (_element.dataset.toggledOn != item.value);
            let _parent = _element.closest(this.params.parentSelector);
            if (_parent) {
                _parent.classList.toggle(this.params.parentToggleClass, (_element.dataset.toggledOn != item.value));
            }
        });
    }
}

class AddressExplorer {

    form;
    prefix;
    fields = [];
    callbacks = {};

    fieldsName = {
        0: 'region',
        1: 'state',
        2: 'city',
        3: 'zipcode'
    };

    constructor(domElement, params = {}) {
        this.form = domElement;
        this.prefix = params.prefix != null ? `${params.prefix}_` : '';
        if (typeof params.onChange == 'function') {
            this.callbacks.onChange = params.onChange;
        }
        this.init();
    }

    init() {
        
        for (let pos in this.fieldsName) {
            const _field = this.form.querySelector(`*[data-location-explorer-field="${this.prefix}${this.fieldsName[pos]}"]`);
            if (_field) {
                this.fields[pos] = _field;
            }
        }

        this.registerEventsHandlers();
    }
    
    registerEventsHandlers() {

        for(const [index, field] of this.fields.entries()) {

            field.addEventListener('change', (e) => {

                this.resetDescendantFields(index);
                this.propagateChanges(this.fieldsName[index]);
                
                const targetElement = this.fields[index + 1];
                if (!targetElement) { return;}

                const formStatus = this.getFieldsValues();
                const key = this.fieldsName[index + 1];
                const endpoint = `${res.absolutePath}api/address/get${Utils.capitalize(key)}`;

                HttpRequest.post(endpoint, formStatus, (data, response) => {
                    if (data.status != 1) {
                        throw data.message ?? 'Errore generico';
                    }
                    data.result.list.forEach((item, index) => {
                        let status = (index == 0 && data.result.list.length == 1) ? 'selected="selected"' : '';
                        targetElement.insertAdjacentHTML('beforeend', `<option value="${item._key}" ${status}>${item._value}</option>`);
                        status != '' && this.propagateChanges(key);
                    });
                }, err => new resAlert('Operazione fallita', err.toString(), {type:'error'}));

            });

        }
    }

    resetDescendantFields(rootIndex) {
        for(const [index, field] of this.fields.entries()) {
            if (index > rootIndex) {
                field.innerHTML = '<option value="">Seleziona un\'opzione...</option>';
            }
        }
    }

    getFieldsValues() {
        let data = {};
        this.fields.forEach((field, index) => {
            const key = this.fieldsName[index];
            data[key] = field.value;
        });
        return data;
    }

    propagateChanges(changedKey) {
        if (this.callbacks.onChange) {
            this.callbacks.onChange(changedKey, this.getFieldsValues());
        }
    }

}

class AgencyMapHandler {
    
    mapWrapper;
    map;
    marker;
    position;
    callbacks = {};

    constructor(domElement, params = {}) {

        this.mapWrapper = domElement;
        this.position = params.position ?? { lat: 41.902784, lng: 12.496366 };

        if (typeof params.onSelect === 'function') {
            this.callbacks.onSelect = params.onSelect;
        }

        this.init();
    }

    init() {

        let mapOptions = {
            center: this.position,
            zoom: 16  
        };

        this.map = new google.maps.Map(
            this.mapWrapper, 
            mapOptions
        );

        this.marker = new google.maps.Marker({
            position: this.position,
            map: this.map,
            draggable: true
        });

        this.registerEventsHandlers();
    }

    setPosition(position) {
        this.position = {
            lat: parseFloat(position.lat),
            lng: parseFloat(position.lng)
        };
        this.map.setCenter(this.position);
        this.marker.setPosition(this.position);
        this.marker.setVisible(true); 
    }

    registerEventsHandlers() {
        this.marker.addListener('dragend', () => {

            let newMarkerPosition = this.marker.getPosition();

            if (this.callbacks.onSelect) {
                this.callbacks.onSelect({
                    lat: newMarkerPosition.lat(),
                    lng: newMarkerPosition.lng()
                });
            }

        });
    }

}

class PasswordGenerator {

    options;
    pool = [];

    constructor(options = {}) {
        this.options = {
            numbers: true,
            symbols: true,
            upper: true,
            length: 8,
            ...options
        };
        this.buildPool();
    }

    buildPool() {
        this.pool = [...'abcdefghijklmnopqrstuvwxyz'];
        this.pool = this.pool.concat(this.options.upper ? [...'ABCDEFGHIJKLMNOPQRSTUVWXYZ'] : []);
        this.pool = this.pool.concat(this.options.numbers ? [...'0123456789'] : []);
        this.pool = this.pool.concat(this.options.symbols ? [...'@$!%*?&'] : []);
    }

    verify(str) {
        if (this.options.upper && !(/[A-Z]+/.test(str))) {
            return false;
        }
        if (this.options.numbers && !(/[\d]+/.test(str))) {
            return false;
        }
        if (this.options.symbols && !(/[@$!%*?&]+/.test(str))) {
            return false;
        }
        return true;
    }

    build() {
        let password = '';
        for (let i = 0; i < this.options.length; i++) {
            password += this.pool[Math.floor(Math.random() * this.pool.length)];
        }
        return password;
    }

    get() {
        let _x = 0;
        do {
            let password = this.build();
            if (this.verify(password)) {
                return password;
            }
            _x++;
        } while(_x < 100);
        return false;
    }
}

class StageManager {

    current;
    dataSourceNode;
    data;
    wrapper;
    stages = [];
    tags = [];
    closeWrapper;
    onChange;

    constructor(wrapper, config = {}) {
        if (!(wrapper instanceof HTMLElement)) {
            throw 'Invalid bootstrap data';
        }
        this.wrapper = wrapper;
        if (typeof config.onChange !== 'function') {
            throw 'Invalid onChange callback';
        }
        this.onChange = config.onChange;
        const configNode = document.querySelector(config.configNodeSelector ?? '.stage-manager-config');
        if (!(configNode instanceof HTMLScriptElement)) {
            throw 'Missing stages configuration';
        }
        this.data = JSON.parse(configNode.textContent);
        this.current = this.data.currentStageId ?? null;
        configNode.remove();
        this.init();
    }

    init() {
        this.render();
        this.registerEventsHandlers();
        this.updateUI(this.current);        
    }

    render() {
        this.stages = this.data.stagesList.map(this.renderStage);
        this.stages.forEach(stage => {
            if (stage.isFinal) {
                return;
            }
            this.wrapper.appendChild(stage);
        });
        this.renderCloseGroup();
        this.wrapper.appendChild(this.closeWrapper);
        this.tags = this.wrapper.querySelectorAll('.tag');
        this.highlightActiveStage();
    }

    renderStage(data, index) {
        const stage = document.createElement('div');
        stage.classList.add('stage');
        stage.classList.toggle('tag', !data.isFinal);
        stage.dataset.id = data.id;
        stage.dataset.color = normalizeHexColor(data.color);
        stage.dataset.index = index + (data.isFinal ? 100 : 0);
        stage.isFinal = data.isFinal;
        stage.innerHTML = data.isFinal ? data.label : `<span class="inner">${data.label}</span>`;
        return stage;
    }

    renderCloseGroup() {
        const closeWrapper = document.createElement('div');
        closeWrapper.classList.add('stage-group', 'tag');
        closeWrapper.dataset.index = 100;
        const closeLabel = document.createElement('span');
        closeLabel.classList.add('inner');
        closeLabel.innerHTML = 'Chiuso';
        const closeGroup = document.createElement('div');
        closeGroup.classList.add('group');
        this.stages.forEach(stage => {
            if (!stage.isFinal) {
                return;
            }
            closeGroup.appendChild(stage);
        });
        closeWrapper.appendChild(closeLabel);
        closeWrapper.appendChild(closeGroup);
        this.closeWrapper = closeWrapper;
    }

    registerEventsHandlers() {
        this.stages.forEach(stage => {

            stage.addEventListener('click', () => {
                stage.classList.add('loading');
                this.setStage(stage.dataset.id);
            });

            stage.addEventListener('mouseover', () => {
                this.applyBackgroundByIndex(stage.dataset.color, stage.dataset.index);
            });

            stage.addEventListener('mouseleave', this.highlightActiveStage.bind(this));

        });

        this.closeWrapper.addEventListener('click', (e) => {
            if (e.target === this.closeWrapper) {
                this.closeWrapper.classList.toggle('open');
            }
        });

        document.addEventListener('click', (e) => {
            if (e.target === this.closeWrapper || this.closeWrapper.contains(e.target)) {return;}
            this.closeWrapper.classList.remove('open');
        });

        document.addEventListener('keydown', (e) => {
            if (e.key == 'Escape') {
                this.closeWrapper.classList.remove('open');
            }
        });

    }

    highlightActiveStage() {
        const activeStage = this.stages.find(stage => stage.classList.contains('active'));
        this.applyBackgroundByIndex(
            (activeStage) ? activeStage.dataset.color : '', 
            (activeStage) ? activeStage.dataset.index : -1
        );
    }

    applyBackgroundByIndex(color, index) {
        const resolvedColor = normalizeHexColor(color);

        this.wrapper.setAttribute('class', 'stage-manager');
        this.tags.forEach(tag => {
            const hasInheritedColor = parseInt(tag.dataset.index) <= parseInt(index);
            const tagInner = tag.querySelector('.inner');

            tag.classList.toggle('inherit-color', hasInheritedColor);

            if (!(tagInner instanceof HTMLElement)) {
                return;
            }

            tagInner.style.backgroundColor = hasInheritedColor && resolvedColor ? resolvedColor : '';
        });
    }

    async setStage(stageId) {
        const result = await this.onChange(stageId);
        if (result) {
            const targetStage = this.stages.find(stage => stage.dataset.id == stageId);
            const stageLabel = targetStage?.textContent?.trim() || stageId;

            console.info('[StageManager] Stage updated', { stageId, stageLabel });
            this.updateUI(stageId);
			new resAlert('Stage aggiornato', `Stage aggiornato a: ${stageLabel}`, {type:'success'});
        }
    }

    updateUI(activeStageId) {
        this.closeWrapper.classList.remove('open');
        let target = null;
        for(const stage of this.stages) {
            const isTarget = stage.dataset.id == activeStageId;
            stage.classList.toggle('active', isTarget);
            stage.classList.remove('loading');
            isTarget && (target = stage);
        }
        let closeLabel = this.closeWrapper.contains(target) ? target.innerHTML : 'Chiuso';
        this.closeWrapper.querySelector('.inner').innerHTML = closeLabel;
        this.highlightActiveStage();
    }

}

function normalizeHexColor(color) {
    if (typeof color !== 'string') {
        return '';
    }

    const trimmedColor = color.trim();
    if (!trimmedColor) {
        return '';
    }

    return trimmedColor.startsWith('#') ? trimmedColor : `#${trimmedColor}`;
}

class AttachmentModal {

    modal;
    form;
    fileCtl;
    progressCtl;
    progressLabel;
    submitCtl;
    xhr;
    options;

    defaults = {
        xhrMethod: 'POST',
        xhrTimeout: 60000,
        accept: '*/*',
        uploadName: 'attachment',
        multiple: false
    };

    constructor(params = {}) {
        let _prevInstance = document.getElementById(this.constructor.name);
        if (_prevInstance != null) {
            _prevInstance.parentNode.removeChild(_prevInstance);
        }
        if (!params.endpoint) {
            throw 'Missing endpoint';
        }

        this.options = {
            ...this.defaults,
            ...params
        };

        this.options.endpoint = params.endpoint;
        this.init();
    }

    init() {
        this.xhr = new XMLHttpRequest();
        this.xhr.timeout = this.options.xhrTimeout;
        this.render();
    }

    render() {
        let multipleFlag = this.options.multiple ? 'multiple' : '';
        let inputName = this.options.multiple ? `${this.options.uploadName}[]` : this.options.uploadName;
        let inputLabel = this.options.multiple ? 'allegati' : 'allegato';
        let el = document.createElement('div');
        document.body.appendChild(el);
        el.classList.add('modal', 'fade');
        el.id = this.constructor.name;
        el.innerHTML = `<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">CARICAMENTO ${inputLabel.toUpperCase()}</h4>
                    <button type="button" class="close btn btn-square-small btn-danger" data-dismiss="modal" aria-label="Chiudi">
                        <span class="fa fa-times"></span>
                    </button>	
                </div>
                <div class="modal-body">
                    <form class="form-horizontal attachment-upload-form" action="javascript:void(0);" method="post">
                        <div class="form-group mb-3">
                            <label class="control-label col-md-4">Seleziona ${inputLabel}:</label>
                            <input type="file" accept="${this.options.accept}" class="form-control" name="${inputName}" ${multipleFlag}>
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label">Stato upload <span class="progress-label"></span></label>
                            <div class="attachment-upload-progress">
                                <progress value="0" max="100"> 0% </progress>
                            </div>
                        </div>
                    </form>
                    <div class=""></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-custom submit">
                        <span class="fad fa-check greenFont"></span>&nbsp;APPLICA 
                    </button>&nbsp;
                    <button type="button" class="btn-custom void" data-dismiss="modal">
                        <span class="fad fa-times redFont"></span>&nbsp;ANNULLA
                    </button>
                </div>
            </div>
        </div>`;
        this.modal = new Modal({el: el});
        this.form = el.querySelector('form.attachment-upload-form');
        this.fileCtl = el.querySelector('input[type="file"]');
        this.progressCtl = el.querySelector('progress');
        this.progressLabel = el.querySelector('span.progress-label');
        this.submitCtl = el.querySelector('button.submit'); 
        this.registerEventsHandlers();
        this.modal.show();
    }

    registerEventsHandlers() {

        this.modal.on('shown', () => {
            if (typeof this.options.onShow == 'function') {
                this.options.onShow();
            }
        });

        this.modal.on('hidden', () => {
            if (typeof this.options.onHide == 'function') {
                this.options.onHide();
            }
            this.removeInstances();
        });

        this.submitCtl.addEventListener('click', this.submit.bind(this));

        this.xhr.upload.addEventListener('loadstart', (event) => {
            this.updateProgress(0);
        });

        this.xhr.upload.addEventListener('progress', (event) => {
            this.updateProgress(
                (event.loaded / event.total) * 100
            );
        });

        this.xhr.upload.addEventListener('loadend', (event) => {
            this.updateProgress(100);
        });

        this.xhr.upload.addEventListener('error', (event) => {
            void new resAlert('Operazione fallita', 'Il caricamento delle immagini non &egrave; andato a buon fine.', {type:'error'});
            console.warn(event);
        });

        this.xhr.addEventListener('readystatechange', (event) => {

            if (this.xhr.readyState === XMLHttpRequest.DONE) {
                this.fileCtl.value = null;
                this.submitCtl.classList.remove('loading');
                if (this.xhr.status >= 200 && this.xhr.status < 400) {
                    const data = JSON.parse(this.xhr.responseText);
                    if (typeof this.options.onSuccess == 'function') {
                        this.options.onSuccess(data, this.xhr);
                    }
                    this.modal.hide();
                } else {
                    if (typeof this.options.onError == 'function') {
                        this.options.onError(this.xhr);
                    }
                }
            }

        });

    }

    updateProgress(value) {
        this.progressCtl.value = value;
        this.progressCtl.innerHTML = `${value.toFixed(2)}%`;
        this.progressLabel.innerHTML = `(${value.toFixed(0)}%)`;
    }

    submit() {

        const payload = new FormData(this.form);

        this.xhr.open(
            this.options.xhrMethod,
            this.options.endpoint
        );

        this.submitCtl.classList.add('loading');
        this.xhr.send(payload);

    }

    removeInstances() {
        document.querySelectorAll('.vehicle-explorer-dialog').forEach(_instance => _instance.remove());
    }

}

class AttachmentsList {

    entity;
    entityId;
    domElement;
    container;
    endpoint;
    addAction;
    params;
    defaults = {
        sortable: false,
        download: true,
        delete: true
    }

    constructor(domElement, params = {}) {
        if (!(domElement instanceof HTMLElement)) {
            throw 'Invalid attachment list container';
        }
        this.domElement = domElement;
        this.params = {
            ...this.defaults,
            ...params
        };
        this.init();
    }

    init() {
        this.entity = this.domElement.dataset.entity;
        this.entityId = this.domElement.dataset.entityId;
        this.container = this.domElement.querySelector('.attachment-grid');
        this.addAction = this.domElement.querySelector('.add-attachment');
        this.endpoint = `${res.absolutePath}api/${this.entity.toLowerCase()}/${this.entityId}/attachment`;
        this.registerEventsHandlers();
        if (this.params.sortable === true) {
            this.initSortable();
        }
        this.load();
    }

    initSortable() {
        void new Sortable(this.container, {
            swapThreshold: 1,
            animation: 150,
            onSort: this.updateSort.bind(this)
        });
    }

    updateSort() {

        let items = this.container.querySelectorAll('.attachment');
        let sort = {};
        items.forEach((item, index) => {
            sort[index] = item.dataset.uuid;
        });
        this.container.classList.add('loading');
        
        HttpRequest.post(`${this.endpoint}/sort`, {sort: sort}, (data, response) => {
            this.container.classList.remove('loading');
            if (data.status != 1) {
                throw data.message ?? 'Errore generico';
            }
        }, err => resAlert.error('Operazione fallita', err.toString()));

    }

    load() {
        HttpRequest.get(this.endpoint, (data, response) => {
            this.container.innerHTML = '';
            if (data.status !== 1) {
                throw data.message ?? 'Errore generico';
            }
            for(let entry of data.result.list) {
                this.container.appendChild(
                    (new AttachmentView(entry, this)).getDomElement()
                );
            }
        }, err => void new resAlert('Operazione fallita', err.toString(), {type: 'error'}));
    }

    registerEventsHandlers() {
        this.addAction.addEventListener('click', () => {
            void new AttachmentModal({
                endpoint: this.endpoint,
                multiple: true,
                accept: 'image/png, image/jpeg',
                onSuccess: () => {
                    this.load();
                }
            });
        });
    }

}

class AttachmentView {

    data;
    parent;
    domElement;
    remove;
    download;

    constructor(data, parent) {
        this.data = data;
        this.parent = parent;
        this.render();
    }

    render() {
        this.domElement = document.createElement('div');
        this.domElement.classList.add('attachment');
        this.domElement.title = this.data.title;
        this.domElement.dataset.uuid = this.data.uuid;

        let actions = [];
        if (this.parent.params.download) {
            actions.push(`<a class="attachment-action download" href="${this.data.uri}" title="Scarica allegato" download="${this.data.title}"></a>`);
        }
        if (this.parent.params.delete) {
            actions.push(`<a class="attachment-action remove" title="Elimina allegato" href="javascript:void(0);"></a>`);
        }
        this.domElement.innerHTML = `<img src="${res.assets}assets/img/file_type/${this.data.extension}.png">
            ${actions.join('')}
            <p class="title">${this.data.title}</p>`;
        this.remove = this.domElement.querySelector('.remove');
        this.registerEventsHandlers();
    }

    getDomElement() {
        return this.domElement;
    }

    registerEventsHandlers() {

        if (this.parent.params.download) {
            this.domElement.addEventListener('dblclick', () => {
                window.open(this.data.uri, '_blank');
            });            
        }

        if (this.remove) {
            this.remove.addEventListener('click', () => {
                if (!confirm('Eliminare l\'allegato selezionato?')) {
                    return;
                }
                HttpRequest.delete(`${this.parent.endpoint}/${this.data.uuid}`, {}, (data, response) => {
                    if (data.status !== 1) {
                        throw data.message ?? 'Errore generico';
                    }
                    this.parent.load();
                }, err => new resAlert('Operazione fallita', err.message, {type:'error'}));
            });            
        }
    }

}

class ContactModal {

    params;
    modal;
    wrapper;
    form;
    submit;
    binds = {};
    pagination;

    searchKeyTimerId = null;
    emailTimerId = null;

    constructor(params = {}) {
        this.removeInstances();
        this.params = params;
        this.init();
    }

    async init() {
        this.render();
        this.registerEventsHandlers();
        void new Datepicker(this.binds.birthDate, {
            autohide: true,
            language: 'it'
        });        
        void new LinkedFields(this.form);
        this.modal.show();
    }

    render() {
        this.wrapper = document.createElement('div');
        document.body.appendChild(this.wrapper);
        this.wrapper.classList.add('modal', 'fade', 'contact-modal');
        this.wrapper.innerHTML = `<div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">GESTIONE ANAGRAFICA</h4>
                    <button type="button" class="close btn btn-square-small btn-danger" data-dismiss="modal" aria-label="Chiudi">
                        <span class="fa fa-times"></span>
                    </button> 
                </div>
                <div class="modal-body">
                    <div class="tabs">
                        <div class="head">
                            <div class="tab active" data-bind="searchTab" title="ESISTENTE"></div>
                            <div class="tab" data-bind="createTab" title="NUOVA ANAGRAFICA"></div>
                        </div>
                        <div class="content">
                            <div class="tab active">
                                <div class="form-horizontal">
                                    <div class="form-group mb-3">
                                        <label class="control-label">Ricerca</label>
										<div class="input-group">
											<input type="text" class="form-control" data-bind="searchKey" placeholder="Cerca per nome, cognome, telefono o indirizzo email...">
											<span class="input-group-text" data-bind="searchKeyInfo"></span>
										</div>
                                    </div>
                                </div>
                                <div class="search-results-wrapper" data-bind="resultsWrapper">
                                    <div class="inner" data-bind="resultsWrapperInner"></div>
                                    <span class="load-more-results" data-bind="loadMoreResult" hidden>Mostra altri risultati</span>
                                </div>
                            </div>
                            <div class="tab">
                                <form class="form-horizontal linked-fields" action="javascript:void(0);" method="POST" autocomplete="off">
                                    <div class="row">
                                        <div class="col-md-6">
											<div class="form-group mb-3">
												<label class="control-label">Tipologia</label>
												<div class="input-group">
													<div class="input-group-text">
														<input class="form-check-input mt-0" type="radio" name="contact_type_id" data-bind="typeId" value="0" data-toggle-group="contact-type" checked>
													</div>
													<input type="text" class="form-control" placeholder="Privato" disabled>
													<div class="input-group-text">
														<input class="form-check-input mt-0" type="radio" name="contact_type_id" data-bind="typeId" value="1" data-toggle-group="contact-type">
													</div>
													<input type="text" class="form-control" placeholder="Azienda" disabled>
												</div>
											</div>
                                            <div class="form-group mb-3">
                                                <label class="control-label col-md-4">Nome</label>
                                                <input type="text" class="form-control" data-bind="firstName" name="first_name" data-toggled-by="contact-type" data-toggled-on="0" required>
                                            </div>     
                                            <div class="form-group mb-3">
                                                <label class="control-label col-md-4">Cognome</label>
                                                <input type="text" class="form-control" data-bind="lastName" name="last_name" data-toggled-by="contact-type" data-toggled-on="0" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="control-label col-md-4">Rag. sociale</label>
                                                <input type="text" class="form-control" data-bind="businessName" name="business_name" data-toggled-by="contact-type" data-toggled-on="1" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="control-label col-md-4">Partita IVA</label>
                                                <input type="text" class="form-control" data-bind="vatNumber" name="vat_number" data-toggled-by="contact-type" data-toggled-on="1" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="control-label col-md-4">PEC/SDI</label>
                                                <input type="text" class="form-control" data-bind="pec" name="pec" data-toggled-by="contact-type" data-toggled-on="1">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="control-label col-md-4">Referente</label>
                                                <input type="text" class="form-control" data-bind="contactPerson" name="contact_person" data-toggled-by="contact-type" data-toggled-on="1" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="control-label col-md-4">Data di nascita</label>
                                                <input type="text" class="form-control datepicker-input" data-bind="birthDate" name="birth_date" data-toggled-by="contact-type" data-toggled-on="0">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="control-label col-md-4">Luogo di nascita</label>
                                                <input type="text" class="form-control" data-bind="birthPlace" name="birth_place" data-toggled-by="contact-type" data-toggled-on="0">
                                            </div>   
                                            <div class="form-group mb-3">
                                                <label class="control-label col-md-4">Codice fiscale</label>
                                                <input type="text" class="form-control" data-bind="taxCode" name="tax_code" data-toggled-by="contact-type" data-toggled-on="0">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="control-label col-md-3">Email</label>
												<div class="input-group">
													<input type="email" data-bind="email" class="form-control" name="email" required>
													<div class="input-group-text">
														<span class="far fa-envelope"></span>
													</div>
												</div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="control-label col-md-3">Telefono</label>
                                                <input type="text" data-bind="phone" class="form-control" name="phone" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="control-label col-md-3">Indirizzo</label>
                                                <input type="text" data-bind="address" class="form-control" name="address">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="control-label col-md-3">Citt&agrave;</label>
                                                <input type="text" data-bind="city" class="form-control" name="city">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="control-label col-md-3">CAP</label>
                                                <input type="text" data-bind="zipcode" class="form-control" name="zipcode">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="control-label col-md-3">Provincia</label>
                                                <input type="text" data-bind="state" class="form-control" name="state">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt5">
                                            <div class="form-group mb5">
                                                <label class="control-label col-md-2">Consensi privacy</label>
												<div class="input-group">
													<div class="input-group-text">
														<input class="form-check-input mt-0 field"  type="checkbox" data-bind="privacyStandard" name="privacy_standard" value="1" required>
													</div>
													<input type="text" class="form-control" placeholder="GPDR - UE2016/679" disabled>
													<div class="input-group-text">
														<input class="form-check-input mt-0 field" type="checkbox" data-bind="privacyMarketing" name="privacy_marketing" value="1">
													</div>
													<input type="text" class="form-control" placeholder="Finalità di marketing" disabled>
													<div class="input-group-text">
														<input class="form-check-input mt-0 field" type="checkbox" data-bind="privacyAnalysis" name="privacy_analysis" value="1">
													</div>
													<input type="text" class="form-control" placeholder="Analisi del traffico" disabled>
												</div>
                                            </div>    
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-custom submit" hidden>
                        <span class="fad fa-plus greenFont"></span>&nbsp;CREA ANAGRAFICA
                    </button>
                    <button type="button" class="btn-custom void" data-dismiss="modal">
                        <span class="fad fa-times redFont"></span>&nbsp;ANNULLA
                    </button>
                </div>
            </div>
        </div>`;
        this.form = this.wrapper.querySelector('form');
        this.submit = this.wrapper.querySelector('button.submit');

        for (let item of this.wrapper.querySelectorAll('*[data-bind]')) {
            this.binds[item.dataset.bind] = item;
        }

        this.modal = new Modal({el: this.wrapper});
    }

    getTerm() {
        let term = this.binds.searchKey.value.trim();
        if (term.length == 0 || term.length > 0 && term.length < 4) {
            return false;
        }
        return term;
    }

    handleInput() {
        clearTimeout(this.searchKeyTimerId);

        const term = this.getTerm();
        if (term === false) {
            this.binds.resultsWrapperInner.innerHTML = '';
            this.binds.searchKeyInfo.innerHTML = '';
            this.binds.loadMoreResult.hidden = true;
            this.pagination = null;
            return;
        }

        this.searchKeyTimerId = setTimeout(async () => {
            const data = await this.fetchData(term, 1);
            this.binds.resultsWrapperInner.innerHTML = '';
            this.renderResults(data.result.list);
        }, 750);        
    }

    registerEventsHandlers() {

        this.binds.searchKey.addEventListener('input', this.handleInput.bind(this));
        this.binds.searchKey.addEventListener('paste', (e) => {
            e.preventDefault();
            let paste = (e.clipboardData || window.clipboardData).getData('text');
            (this.binds.searchKey.value = paste) && this.handleInput();
        });

        this.binds.loadMoreResult.addEventListener('click', async () => {
            const data = await this.fetchData(
                this.getTerm(),
                this.pagination.current + 1
            );
            this.renderResults(data.result.list);
        });

        this.binds.resultsWrapperInner.addEventListener('dblclick', (e) => {
            const contactCard = e.target.closest('.contact-modal-card');
            if (contactCard && contactCard.contactData != null) {
                this.returnContactData(contactCard.contactData);
            }
        });

        this.binds.searchTab.addEventListener('tab-activate', () => {
            this.submit.hidden = true;
        });

        this.binds.createTab.addEventListener('tab-activate', () => {
            this.submit.hidden = false;
        });

        this.binds.email.addEventListener('input', () => {
            clearTimeout(this.emailTimerId);

            this.emailTimerId = setTimeout(() => {
                const mark = this.binds.email.nextElementSibling;
                mark.classList.remove('is-valid', 'is-error');

                if (this.binds.email.value.trim() == '') {
                    return;
                }

                mark.classList.add('loading');
                HttpRequest.post(`${res.absolutePath}api/contact/validate`, {
                    email: this.binds.email.value
                }, response => {
                    mark.classList.remove('loading');
                    mark.classList.toggle('is-error', response.status == 0);
                    mark.classList.toggle('is-valid', response.status == 1);
                    if (response.status !== 1) {
                        if (response.result.contactId != null) {
                            return resAlert.error('Contatto gi&agrave; registrato', `L&rsquo;indirizzo email inserito risulta gi&agrave; registrato in anagrafica. <a href="${res.path}contact/${response.result.contactId}" target="_blank">Fai click qui per visualizzare il contatto.</a>`)
                        }
                        throw response.message ?? 'Errore generico';
                    }
                }, err => resAlert.error('Operazione fallita', err.toString()));
            }, 1250);
        });

        this.modal.on('shown', () => {
            this.binds.searchKey.focus();
            if (typeof this.params.onOpen == 'function') {
                this.params.onOpen(this);
            }
        });

        this.modal.on('hidden', () => {
            this.removeInstances();
            if (typeof this.params.onClose == 'function') {
                this.params.onClose();
            }
        });

        this.submit.addEventListener('click', () => {
			
			const elementsWithBadClass = document.querySelectorAll('.bad');
			elementsWithBadClass.forEach(function(element) {
				element.classList.remove('bad');
			});

            let validation = (new FormValidator({alerts: false})).checkAll(this.form);

            if (!validation.valid) {
                validation.fields.forEach(entry => {
                    entry.field.closest('.form-group').classList.toggle('has-error', !entry.valid);
                });
                return new resAlert('Dati non validi', 'I campi contrassegnati in rosso sono incompleti o contengono valori non validi.', {type:'error'});
            }

            let payload = (new FormSerializer(this.form)).serialize();
            this.submit.classList.add('loading');

            HttpRequest.post(`${res.absolutePath}api/contact`, payload, (data, response) => {
                this.submit.classList.remove('loading');
                if (data.status != 1) {
                    throw data.message ?? 'Errore generico';
                }
                this.returnContactData(data.result.contact);
            }, err => void new resAlert('Inserimento anagrafica fallito', err.toString(), {type:'error'}));
        });

    }

    async fetchData(term, page = 1) {
        this.binds.searchKeyInfo.innerHTML = 'Ricerca...';
        const data = await HttpRequest.post(`${res.absolutePath}api/contact/search`, {
            term: term,
            page: page
        }, null, err => console.log(err));
        if (data.status !== 1) {
            throw data.message;
        }
        if (data.result.pagination) {
            this.pagination = data.result.pagination;
        }
        return data;
    }

    renderResults(list) {
        for (let item of list) {
            const card = document.createElement('div');
            card.contactData = item;
            card.classList.add('contact-modal-card');
            const iconClass = item.typeId == 0 ? 'user' : 'building';
            const contactName = item.typeId == 0 ? `${item.firstName} ${item.lastName}` : `${item.businessName} - ${item.contactPerson}`;
            card.innerHTML = `<span class="icon fal fa-${iconClass}"></span>
                <h5>${contactName}</h5>
                <p>${item.email}</p>
                <p>${item.phone}</p>`;
            this.binds.resultsWrapperInner.appendChild(card);
        }
        this.binds.loadMoreResult.hidden = (this.pagination.total == null || this.pagination.current == this.pagination.total);
        const currentlyShown = this.pagination.currentSize + this.pagination.offset;
        this.binds.searchKeyInfo.innerHTML = (this.pagination.results == 0) ? 'Nessun risultato' : `${currentlyShown} risultati di ${this.pagination.results}`;
    }

    returnContactData(data) {
        if (typeof this.params.onSelect === 'function') {
            this.params.onSelect(data);
        }
        this.modal.hide();
    }

    removeInstances() {
        document.querySelectorAll('.vehicle-explorer-dialog').forEach(_instance => _instance.remove());
    }

}

class ToolbarFilter {

    wrapper;
    options;
    params = [];
    tokens = [];

    tokensWrapper;
    form;
    searchInput;
    submit;

    defaultOptions = {
        maxTokens: 4,
        submitOnTokenRemove: true
    }

    constructor(wrapper, options = {}) {
        if (!(wrapper instanceof HTMLElement)) {
            throw 'Invalid filter wrapper';
        }
        this.wrapper = wrapper;
        this.options = {
            ...this.defaultOptions,
            ...options
        };

        this.init();
    }

    init() {
        this.params = [...this.wrapper.querySelectorAll('.filter-param')];
        this.tokensWrapper = this.wrapper.querySelector('.tokens-wrapper');
        this.submit = this.wrapper.querySelectorAll('button[data-action="submit"]');
        this.form = this.wrapper;
        this.searchInput = this.wrapper.querySelector('.search-input-wrapper input');
        this.registerEventsHandlers();
        this.renderTokens();
        if (typeof this.options.onInit == 'function') {
            this.options.onInit(this);
        }
    }

    registerEventsHandlers() {

        this.params.forEach(param => {
            param.addEventListener('change', this.renderTokens.bind(this));
        });

        this.wrapper.addEventListener('click', (e) => {
            if (e.target.closest('*[data-toggle-filter]') != null) {
                this.wrapper.classList.toggle('dropdown-shown');
            }
        });

        [...this.submit].forEach(submit => {
            submit.addEventListener('click', () => {
                this.wrapper.classList.remove('dropdown-shown');
                this.submitHandler();
            });
        });

        this.searchInput && this.searchInput.addEventListener('keydown', (e) => {
            if (e.key == 'Enter') {
                this.submitHandler();
            }
        });

        document.addEventListener('click', function(e) {
            if (e.target.closest('.filter-wrapper') == null) {
                document.querySelectorAll('.filter-wrapper').forEach(_item => _item.classList.remove('dropdown-shown'));
            }
        });

    }

    removeParam(name) {
        const params = this.params.filter(param => param.name == name);

        params.forEach(param => {
            switch(param.type) {
                case 'select-one':
                    param.selectedIndex = 0;
                    break;
                case 'select-multiple':
                    param.selectedIndex = -1;
                    param.vanillaSelectBox != null && param.vanillaSelectBox.setValue([]);
                    break;
                case 'checkbox':
                case 'radio':
                    param.checked = false;
                    break;
                default:
                    param.value = '';
            }
        });

        this.renderTokens();
    }

    renderTokens() {

        const paramsList = [];

        this.params.forEach(param => {
            let paramLabelPrefix = param.dataset.label != null ? `${param.dataset.label}: ` : '';
            switch(param.type) {
                case 'checkbox':
                    if (!param.checked) { break; }
                    paramsList.push({
                        label: `${paramLabelPrefix}${param.closest('label').textContent.trim()}`,
                        name: param.name
                    });
                    break;
                case 'select-one':
                    let selectedOption = param.selectedOptions.length > 0 ? param.selectedOptions[0] : null;
                    if (selectedOption == null || selectedOption.value == '') {
                        break;
                    }
                    paramsList.push({
                        label: `${paramLabelPrefix}${selectedOption.textContent}`,
                        name: param.name
                    });
                    break;
                case 'select-multiple':
                    let selectedOptions = param.selectedOptions;
                    if (selectedOptions.length == 0) {
                        break;
                    }
                    let labels = [...selectedOptions].map(opt => opt.textContent);
                    paramsList.push({
                        label: `${paramLabelPrefix}${labels.join(',')}`,
                        name: param.name
                    });
                    break;
                case 'text':
                    if (param.value.trim() == '') {
                        break;
                    }
                    paramsList.push({
                        label: `${paramLabelPrefix}${param.value}`,
                        name: param.name
                    });
                    break;
            }
        });

        if (paramsList.length > this.options.maxTokens) {
            const aggregatedParamsName = [];
            while (paramsList.length > this.options.maxTokens - 1) {
                aggregatedParamsName.push(
                    (paramsList.pop()).name
                );
            }
            paramsList.push({
                label: `+ altri ${aggregatedParamsName.length}`,
                name: aggregatedParamsName
            });
        }

        this.tokensWrapper.replaceChildren(
            ...paramsList.map(param => this.createToken(param))
        );
    }

    createToken(data) {
        const token = document.createElement('div');
        token.classList.add('filter-param-token');
        token.innerHTML = `<span class="filter-param-label">${data.label}</span>`;
        let deleteToken = document.createElement('span');
        deleteToken.classList.add('filter-param-remove');
        deleteToken.innerHTML = '<i class="fal fa-times"></i>';
        deleteToken.addEventListener('click', () => {
            if (Array.isArray(data.name)) {
                data.name.forEach(name => this.removeParam(name));
            } else {
                this.removeParam(data.name);
            }
            if (this.options.submitOnTokenRemove) {
                this.submitHandler();
            }
        });
        token.appendChild(deleteToken);
        return token;
    }

    submitHandler() {
        if (typeof this.options.onSubmit === 'function') {
            this.options.onSubmit(this.form);
        }
    }

    getForm() {
        return this.form;
    }

    getData(removeVoidValues = true) {
        let payload = FormSerializer.for(this.form).serialize();
        if (removeVoidValues) {
            for(const [key, value] of Object.entries(payload)) {
                if ((typeof value == 'string' && value.trim() == '') || value == null) {
                    delete payload[key];
                }
            }
        }
        return payload;
    }

}

class Kanban {

    wrapper;
    lists;
    stagesMap;
    config;
    initHandler;
    fetchHandler;
    defaults = {
        cardClass: KanbanCard
    }

    constructor(data, params) {
        this.wrapper = params.wrapper;

        this.config = {
            ...this.defaults,
            ...params.config
        };
        this.initHandler = params.onInit;
        this.fetchHandler = params.onFetchData;

        this.init(data);
    }

    async init(data) {

        data ??= await this.initHandler();

        console.log(data);

        this.wrapper.innerHTML = '';
        this.wrapper.classList.add('kanban-wrapper');
        this.lists = {};
        this.stagesMap = {};

        for(const [token, entry] of Object.entries(data)) {

            entry.stagesId.forEach(stageId => {
                this.stagesMap[stageId] = entry.token;
            });
            
            if (!Object.hasOwn(this.lists, token)) {
                this.lists[token] = new KanbanStage({
                    parent: this,
                    container: this.wrapper,
                    config: entry,
                    isGroup: entry.isGroup,
                    stagesId: entry.stagesId,
                    pagination: entry.data.pagination
                });
            }

            entry.data.list.forEach(item => {
                this.addCard(item.stageId, item);
            });

        }
        this.wrapper.classList.remove('loading-overlay');
    }

    async fetchData(params = {}, page = null, callback = null) {
        const data = await this.fetchHandler(params, page);
        data.result.list.forEach(item => {
            this.addCard(item.stageId, item);
        });
        if (typeof callback == 'function') {
            callback(data);
        }
    }

    addCard(stageId, data) {

        if (!Object.hasOwn(this.stagesMap, stageId)) {
            return;
        }

        const token = this.stagesMap[stageId];
        this.lists[token].appendCard(
            new this.config.cardClass({
                entityId: data.id,
                data: data
            })
        );
    }

    resolveTargetStageId(stage, card = null) {
        if (!Array.isArray(stage?.delegatedStageIds) || stage.delegatedStageIds.length === 0) {
            return null;
        }
        if (card && stage.delegatedStageIds.includes(card.stageId)) {
            return card.stageId;
        }
        return stage.delegatedStageIds[0];
    }

    async moveCard(card, targetStage) {
        if (!card || !targetStage || card.currentStage === targetStage) {
            return;
        }

        const originStage = card.currentStage;
        if (!originStage) {
            return;
        }

        const targetStageId = this.resolveTargetStageId(targetStage, card);
        if (!targetStageId) {
            alert('Impossibile spostare la card: stage di destinazione non valido');
            return;
        }

        const previousStageId = card.stageId;

        targetStage.appendCard(card, { prepend: true });
        card.stageId = targetStageId;
        card.wrapper.classList.add('loading');

        try {
            const response = await HttpRequest.put(`${res.absolutePath}api/deal/${card.id}/stage/${targetStageId}`, {});
            if (!response || response.status !== 1) {
                throw new Error(response?.message ?? 'Errore durante lo spostamento della card');
            }
            card.wrapper.classList.remove('loading');
        } catch (error) {
            originStage.appendCard(card);
            card.stageId = previousStageId;
            card.wrapper.classList.remove('loading');
            alert(error?.message ?? 'Spostamento non riuscito, ripristino posizione precedente');
        }
    }

}

class KanbanStage {

    parent;
    container;
    wrapper;
    token;
    label;
    color;
    header;
    list;
    delegatedStageIds = [];
    cards = [];

    pagination;

    constructor(params) {
        this.parent = params.parent;
        this.container = params.container;

        this.token = params.config.token;
        this.label = params.config.label;
        this.color = normalizeHexColor(params.config.color);
        this.isGroup = params.isGroup ?? false;
        this.delegatedStageIds = params.stagesId;
        this.pagination = params.pagination;

        this.init();
    }

    init() {
        this.render();
        this.registerEventsHandlers();
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.classList.add('kanban-stage');
        this.wrapper.classList.toggle('is-group', this.isGroup);

        this.header = document.createElement('div');
        this.header.classList.add('kanban-stage-header');
        this.header.innerHTML = `${this.label} (${this.pagination.results})`;
        this.header.style.backgroundColor = this.color;
        this.wrapper.appendChild(this.header);

        this.list = document.createElement('div');
        this.list.classList.add('kanban-stage-list');
        this.wrapper.appendChild(this.list);
        this.container.appendChild(this.wrapper);            
    }

    registerEventsHandlers() {
        
        this.list.addEventListener('scroll', () => {
            if (this.getCurrentListScrollPosition() < 95 || this.list.classList.contains('is-loading') || this.pagination.current >= this.pagination.total) {
                return;
            }

            this.list.classList.add('is-loading');
            this.parent.fetchData({
                stage_id: this.delegatedStageIds
            }, this.pagination.current + 1, (data) => {
                this.list.classList.remove('is-loading');
                this.pagination.current = data.result.pagination.current;
            });
        });
        this.wrapper.addEventListener('dragover', (e) => {
            e.preventDefault();
            this.wrapper.classList.add('is-drop-target');
        });

        this.wrapper.addEventListener('dragenter', (e) => {
            e.preventDefault();
            this.wrapper.classList.add('is-drop-target');
        });

        this.wrapper.addEventListener('dragleave', (e) => {

            if (e.target === this.wrapper) {
                this.wrapper.classList.remove('is-drop-target');
            }
        });

        this.wrapper.addEventListener('drop', async (e) => {
            e.preventDefault();
            const cardId = e.dataTransfer.getData('text/plain');
            this.container.querySelectorAll('.kanban-stage.is-drop-target').forEach(stage => {
                stage.classList.remove('is-drop-target');
            });
            if (!cardId) {
                return;
            }
            const cardElement = document.querySelector(`.kanban-card[data-id="${cardId}"]`);
            if (!cardElement?.kanbanCard) {
                return;
            }
            await this.parent.moveCard(cardElement.kanbanCard, this);
        });

        this.list.addEventListener('drop', (e) => {
            e.preventDefault();
            this.wrapper.classList.remove('is-drop-target');
        });
    }

    addDelegatedStageId(stageId) {
        this.delegatedStageIds.push(stageId);
    }

    appendCard(card, options = {}) {
        if (card.currentStage && card.currentStage !== this) {
            card.currentStage.cards = card.currentStage.cards.filter(item => item !== card);
        }
        card.currentStage = this;
        if (!this.cards.includes(card)) {
            this.cards.push(card);
        }

        const shouldPrepend = options.prepend === true;
        if (shouldPrepend) {
            this.list.prepend(card.wrapper);
            card.wrapper.style.borderLeftColor = this.color;
            return;
        }

        this.list.appendChild(card.wrapper);
        card.wrapper.style.borderLeftColor = this.color;
    }

    getCurrentListScrollPosition() {
        return (this.list.scrollTop / (this.list.scrollHeight - this.list.clientHeight) * 100).toFixed(0);
    }

}

class KanbanCard {

    data;
    wrapper;
    dom = {};

    constructor(data = {}) {
        this.data = data;
    }

    render() {
        let template = document.createElement('template');
        template.innerHTML = `<div class="kanban-card has-side-actions" data-id="" data-entity="">
            <a class="title" href="" data-prop="title"></a>
            <a href="" class="subject" data-prop="subject"></a>
            <p class="timestamp" data-prop="timestamp"></p>
            <div class="owner">
                <label data-prop="ownerLabel">AGENZIA</label>
                <p class="name" data-prop="owner"></p>
            </div>
            <div class="add-task" data-prop="tasks">ATTIVIT&Aacute;</div>
            <div class="side-actions">
                <button class="task-counter" data-prop="taskCount"></button>
                <button class="side-action">
                    <i class="far fa-envelope"></i>
                </button>
                <button class="side-action">
                    <i class="fab fa-whatsapp"></i>
                </button>
				PIPPO
            </div>
        </div>`;
        this.wrapper = template.content.firstChild;
    }

    init() {
        this.data = {
            ...this.defaults,
            ...this.data.data
        }
        this.mapData(this.data);

        this.prepareWrapper();
        this.render();

        for (let child of this.wrapper.querySelectorAll('[data-prop]')) {
            this.dom[child.dataset.prop] = child;
        }

        this.registerEventsHandlers();

    }

    mapData(data) {
        for (let prop in data) {
            this[prop] = data[prop];
        }
    }

    mapProps() {
        for (let child of this.wrapper.querySelectorAll('[data-prop]')) {
            this.dom[child.dataset.prop] = child;
        }
    }

    prepareWrapper() {
        this.wrapper = document.createElement('div');
        this.wrapper.classList.add('kanban-card', 'has-side-actions');
        this.wrapper.dataset.id = this.data.id;
        this.wrapper.draggable = true;
        this.wrapper.kanbanCard = this;
    }

    render() {
        let template = document.createElement('template');
        template.innerHTML = `<div class="kanban-card" draggable="true">DEFAULT KANBAN CARD</div>`;
        this.wrapper = template.content.firstChild;

        this.mapProps();
    }

    registerEventsHandlers() {
        this.wrapper.addEventListener('dragstart', (e) => {
            e.dataTransfer.setData('text/plain', `${this.id}`);
            e.dataTransfer.effectAllowed = 'move';
            this.wrapper.classList.add('is-dragging');
            this.wrapper.closest('.kanban-wrapper')?.classList.add('is-dragging-card');
        });

        this.wrapper.addEventListener('dragend', () => {
            this.wrapper.classList.remove('is-dragging');
            const kanbanWrapper = this.wrapper.closest('.kanban-wrapper');
            kanbanWrapper?.classList.remove('is-dragging-card');
            kanbanWrapper?.querySelectorAll('.kanban-stage.is-drop-target').forEach(stage => {
                stage.classList.remove('is-drop-target');
            });
        });
    }

}

class DealKanbanCard extends KanbanCard {

    defaults = {
        taskCount: 0,
        taskIsOverdue: false
    }

    constructor(data = {}) {
        super(data);
        this.init();
        console.log(data);
    }

    render() {
		const stageName = this.stageName;
        const contactLink = `${res.path}contact/${this.contact.id}`;
        const contactName = this.contact.typeId == 0 ? `${this.contact.firstName} ${this.contact.lastName}` : `${this.contact.businessName} - ${this.contact.contactPerson}`;
        const contactWaLink = `https://wa.me/${this.contact.phone}`;
		const contactPhoneLink = `tel:${this.contact.phone}`;
        const contactEmailLink = `mailto:${this.contact.email}`;
		const dealValue = (this.value) ? ` - ${this.value} &euro;` : '';
        const subject = (this.contact) ? `<a href="${contactLink}" class="subject" data-prop="subject">${contactName}</a>` : '';

        this.wrapper.innerHTML = `
            <a type="button" class="btn btn-info" href="${res.path}deal/${this.id}" data-prop="title">${this.title}${dealValue}</a><br>
            ${subject ?? ''}
            <p class="timestamp" data-prop="timestamp">${moment(this.createdAt).format('DD/MM/YYYY HH:mm')}</p>
            <div class="owner">
                <label data-prop="ownerLabel">AGENZIA</label>
                <p class="name" data-prop="owner">${this.owner ?? 'Nessun proprietario'}</p>
            </div>
            <div class="responsible">
                <label data-prop="ownerLabel">RESPONSABILE</label>
                <p class="name" data-prop="owner">${this.responsible ?? 'Nessun responsabile'}</p>
            </div>
            <div class="add-task" data-prop="tasks">
				<span class="task-counter" data-prop="taskCount">${this.eventsCount}</span>
                <span class="far fa-plus"></span>&nbsp;ATTIVIT&Agrave;
            </div>
            <div class="add-note" data-prop="notes">
                <span class="task-counter" data-prop="noteCount">${this.noteCount}</span>
                <span class="far fa-plus"></span>&nbsp;NOTA
            </div>
            <div class="side-actions">
				<!-- <a class="task-counter" data-prop="taskCount">${this.eventsCount}</a> -->
				<a type="button" class="btn btn-primary btn-square-small" href="${contactPhoneLink}" target="_blank">
                    <span class="fa fa-phone"></span>
                </a>
                <a type="button" class="btn btn-primary btn-square-small">
                    <span class="fa fa-envelope" href="${contactEmailLink}"></span>
                </a>
				
                <a type="button" class="btn btn-primary btn-square-small" href="${contactWaLink}" target="_blank">
                    <span class="fab fa-whatsapp"></span>
                </a>
            </div>`;

        this.mapProps();

    }

    async refresh() {
        this.wrapper.classList.add('loading');
        const data = await HttpRequest.get(`${res.absolutePath}api/deal/${this.id}/kanban`);
        if (data.status !== 1) {
            return resAlert.error('Aggiornamento fallito', data.message ?? 'Errore sconosciuto');
        }
        this.mapData(data.result.deal);
        this.wrapper.classList.remove('loading');
        this.render();
    }

    registerEventsHandlers() {
        super.registerEventsHandlers();

        this.wrapper.addEventListener('click', (e) => {
            if (e.target.closest('.add-task')) {
                this.openCalendarEventModal();
            }
        });

        this.wrapper.addEventListener('click', (e) => {
            if (e.target.closest('.add-note')) {
                this.openNoteModal();
            }
        });
		
        /*
		this.dom.notes.addEventListener('click', () => {
            
            this.dom.notes.classList.add('loading');
			
			void new CrmNoteModal(null, {
				endpoint: `${res.absolutePath}api/deal/${this.data.id}/note`,
				withUpdatedList: true,
				onShow: (modal) => {
                    this.dom.notes.classList.remove('loading');
                },
				onSuccess: (data) => {
					this.refresh();
				}
			});

        });
        */
    }

    openCalendarEventModal() {
        this.dom.tasks.classList.add('loading');

        void new CalendarEventModal(null, {
            endpoint: `${res.absolutePath}api/deal/${this.data.id}/event`,
            withUpdatedList: true,
            title: this.contact.typeId == 0 ? `${this.contact.firstName} ${this.contact.lastName}` : `${this.contact.businessName} - ${this.contact.contactPerson}`,
            onShow: (modal) => {
                this.dom.tasks.classList.remove('loading');
            },
            onSuccess: (data) => {
                this.refresh();
            } 
        });
    }

    openNoteModal() {  
        this.dom.tasks.classList.add('loading');
        void new CrmNoteModal(null, {
            endpoint: `${res.absolutePath}api/deal/${this.data.id}/note`,
            withUpdatedList: true,
            onShow: (modal) => {
                this.dom.notes.classList.remove('loading');
            },
            onSuccess: (data) => {
                this.refresh();
            }
        });
    }

}

class CrmNoteFieldset {

    wrapper;
    options;
    addCtl;
    table;
    tableBody;

    endpoint;

    constructor(wrapper = '.crm-note-wrapper', options = {}) {
        if (typeof wrapper == 'string') {
            wrapper = document.querySelector(wrapper);
        }
        if (!(wrapper instanceof HTMLElement)) {
            throw 'Invalid CRM Note wrapper';
        }
        if (options.entity == null || options.entityId == null) {
            throw 'Missing entity reference';
        }
        this.wrapper = wrapper;
        this.options = options;
        this.init();
    }

    init() {
        this.endpoint = `${res.absolutePath}api/${this.options.entity}/${this.options.entityId}/note`;
        this.render();
        this.loadFromDOM();
        this.registerEventsHandlers();
    }

    loadFromDOM() {
        const notes = Utils.extractJson(
            this.wrapper.querySelector('script[type="application/json"]'), 
            true
        );
        if (notes == null) {
            return;
        }
        this.renderNotes(notes);
    }

    render() {
        let fieldset = document.createElement('fieldset');
        fieldset.innerHTML = `
            <legend>
                CRM NOTE
                <div class="action-group">
                    <a class="action add-note" href="javascript:void(0);">
                        <i class="far fa-plus"></i> NUOVA
                    </a>
                </div>
            </legend>
            <div class="table-responsive">
                <table class="w100 hover bordered">
                    <thead>
                        <tr>
                            <th>Data e ora</th>
                            <th>Utente</th>
                            <th>Commento</th>
                            <th>Opzioni</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>`;
        this.table = fieldset.querySelector('table');
        this.tableBody = this.table.querySelector('tbody');
        this.addCtl = fieldset.querySelector('.action.add-note');
        this.wrapper.appendChild(fieldset);
    }

    registerEventsHandlers() {
        this.addCtl.addEventListener('click', this.addNote.bind(this));
    }

    refreshList() {
        HttpRequest.get(this.endpoint, (data) => {
            if (data.status !== 1) {
                throw data.message ?? 'Errore generico';
            }
            this.renderNotes(data.result.list);
        }, err => resAlert.error('Operazione fallita', err.toString()));
    }

    renderNotes(notes) {
        this.tableBody.innerHTML = '';
        this.table.classList.toggle('hidden', notes.length == 0);
        notes.forEach(note => {
            this.tableBody.appendChild(
                (new CrmNoteFieldsetRow(this, note)).getNode()
            );
        });
    }

    addNote() {
        void new CrmNoteModal(null, {
            endpoint: this.endpoint,
            withUpdatedList: true,
            onSuccess: (data) => {
                if (data.status === 1) {
                    this.renderNotes(data.result.list);
                }
            }
        });
    }

}

class CrmNoteFieldsetRow {

    parent;
    data;

    wrapper;
    editCtl;
    deleteCtl;

    constructor(parent, data) {
        this.parent = parent;
        this.data = data;
        this.init();
    }

    init() {
        this.render();
        this.registerEventsHandlers();
    }

    render() {
        this.wrapper = document.createElement('tr');
        this.wrapper.innerHTML = `<td>${moment(this.data.createdAt).format('DD/MM/YYYY HH:mm')}</td>
            <td>${this.data.user.name}</td>
            <td>${this.data.content}</td>
            <td>
                <button class="action edit-note">
                    <span class="fas fa-pencil orangeFont"></span>
                </button>
                <button class="action delete-note">
                    <span class="fas fa-trash redFont"></span>
                </button>
            </td>`;
        this.editCtl = this.wrapper.querySelector('.action.edit-note');
        this.deleteCtl = this.wrapper.querySelector('.action.delete-note');
    }

    registerEventsHandlers() {

        this.editCtl.addEventListener('click', () => {
            void new CrmNoteModal(this.data.id, {
                endpoint: this.parent.endpoint,
                onSuccess: () => {
                    this.parent.refreshList();
                }
            });
        });

        this.deleteCtl.addEventListener('click', () => {
            if (!confirm('Eliminare la nota selezionata?')) {
                return;
            }
            this.deleteCtl.classList.add('loading');
            HttpRequest.delete(`${this.parent.endpoint}/${this.data.id}`, {}, (data, response) => {
                if (data.status !== 1) {
                    throw data.message ?? 'Errore generico';
                }
                this.parent.refreshList();
            }, err => console.log(err));
        });

    }

    getNode() {
        return this.wrapper;
    }

}

class CrmNoteModal {

    id;
    content = '';
    options;
    endpoint;
    modal;
    form;
    textCtl;
    submitCtl;

    defaults = {
        withUpdatedList: false
    }

    constructor(id = null, options = {}) {
        this.id = id;
        if (options.endpoint == null) {
            throw 'Missing endpoint';
        }
        this.endpoint = `${options.endpoint}/${this.id ?? ''}`;
        this.options = {
            ...this.defaults,
            ...options
        };
        this.init();
    }

    async init() {
        if (this.id) {
            const data = await HttpRequest.get(this.endpoint);
            if (data.status !== 1) {
                throw data.message ?? 'Errore generico';
            }
            this.content = data.result.note.content;
        }
        this.render();
    }

    render() {
        let el = document.createElement('div');
        el.classList.add('modal', 'fade', this.constructor.name);
        el.innerHTML = `<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Gestione nota CRM</h4>
                    <button type="button" class="close btn btn-square-small btn-danger" data-dismiss="modal" aria-label="Chiudi">
                        <span class="fa fa-times"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="javascript:void(0);" method="POST" autocomplete="off">
                        <div class="form-group">
                            <label class="form-label">Commento</label>
                            <textarea class="form-control" name="content" rows="6">${this.content}</textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn-custom action submit">
                        <span class="fad fa-check greenFont"></span> APPLICA
                    </button>&nbsp;
                    <button class="btn-custom" data-dismiss="modal">
                        <span class="fad fa-times redFont"></span> ANNULLA
                    </button>
                </div>
            </div>
        </div>`;
        document.body.appendChild(el);
        this.form = el.querySelector('form');
        this.textCtl = this.form.querySelector('textarea');
        this.submitCtl = el.querySelector('.action.submit');
        this.modal = new Modal({el: el});
        this.registerEventsHandlers();
        this.modal.show();
    }

    registerEventsHandlers() {
		
		this.modal.on('shown', () => {
            if (typeof this.options.onShow == 'function') {
                this.options.onShow(this);
            }
			this.textCtl.focus();
        });

        this.submitCtl.addEventListener('click', this.submit.bind(this));

    }

    submit() {
        if (this.textCtl.value.trim() == '') {
			this.textCtl.classList.add('bad');
            this.textCtl.closest('.form-group').classList.add('has-error');
            return;
        }
        const method = this.id == null ? 'post' : 'patch';
        const payload = FormSerializer.for(this.form).serialize();

        if (this.options.withUpdatedList) {
            payload['with_updated_list'] = 1;
        }
        
        HttpRequest[method](this.endpoint, payload, (data, response) => {
            if (data.status !== 1) {
                throw data.message ?? 'Errore generico';
            }
            if (typeof this.options.onSuccess == 'function') {
                this.options.onSuccess(data);
            }
            this.modal.hide();
        }, err => void resAlert.error('Operazione fallita', err.toString()));
    }

}

class CalendarEventModal {

    id;
    data = {
        color: 'blue',
        status: 'pending',
        startsAt: moment().format('YYYY-MM-DD HH:00'),
        endsAt: moment().format('YYYY-MM-DD HH:30')
    };
    siblings;
    selfId;
    options;
    endpoint;
    modal;
    form;
    timeRegex = /^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/;
    binds = {};

    defaults = {
        withUpdatedList: false,
    };

    colors = ['yellow', 'green', 'blue', 'orange', 'red', 'grey'];
    timeSlots = ['09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30'];
    activityTypes = ['Seleziona un&rsquo;opzione...', 'Primo appuntamento telefonico', 'Chiamata richiesta planimetria', 'Chiamata discussione preventivo', 'Sopralluogo', 'Lavoro in cantiere']; 
 

    constructor(id = null, options = {}) {
        this.id = id;
        if (options.endpoint == null) {
            throw 'Missing endpoint';
        }
        this.endpoint = `${options.endpoint}/${this.id ?? ''}`;
        this.options = {
            ...this.defaults,
            ...options
        };

        this.init();
    }

    async init() {

        const siblingsListResponse = await HttpRequest.get(`${res.absolutePath}api/me/siblings`);
        this.siblings = siblingsListResponse.result.list;
        this.selfId = siblingsListResponse.result.selfId;

        if (this.id) {
            const response = await HttpRequest.get(this.endpoint);
            if (response.status !== 1) {
                throw response.message ?? 'Errore generico';
            }
            this.data = {
                ...this.data,
                ...response.result.event
            };
        }
        this.render();
    }

    render() {
        let el = document.createElement('div');
        el.classList.add('modal', 'fade', this.constructor.name);

        const selectedResponsibleId = this.data.userId ?? this.selfId;
        const dataActivity = this.data.activity;
        const siblingsOptions = this.siblings.map(
            item => `<option value="${item.id}" ${item.id == selectedResponsibleId ? 'selected' : ''}>${item.firstName} ${item.lastName}</option>`
        );
        const colorsItems = this.colors.map(
            color => `<input type="radio" class="color" name="color" value="${color}" ${this.data.color == color ? 'checked' : ''}>`
        );
        const timeSlotOptions = this.timeSlots.map(slot => `<option value="${slot}"></option>`);
        const activityTypeOptions = this.activityTypes.map(type => `<option value="${type == 'Seleziona un&rsquo;opzione...' ? '' : type}" ${dataActivity == type ? 'selected' : ''}>${type}</option>`);
        const activityTypeMkp = `<div class="form-group mb-3">
            <label class="form-label">Attivit&agrave;</label>
            <select class="form-select" data-bind="taskTypeId" name="activity" required>${activityTypeOptions.join('')}</select>
		</div>`;
            
        
        const startsAtDate = moment(this.data.startsAt).format('DD/MM/YYYY');
        const startsAtTime = this.data.id ? moment(this.data.startsAt).format('HH:mm') : '';
        const endsAtTime = this.data.id ? moment(this.data.endsAt).format('HH:mm') : '';

        el.innerHTML = `<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Gestione evento calendario</h4>
                    <button type="button" class="close btn btn-square-small btn-danger" data-dismiss="modal" aria-label="Chiudi">
                        <span class="fa fa-times"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="javascript:void(0);" method="POST" autocomplete="off">
                        ${activityTypeMkp}
						<div class="form-group mb-3">
							<label class="form-label">Descrizione</label>
							<input 
								type="text" 
								class="form-control" 
								name="subject"
								value="${this.options.hasOwnProperty('title') ? this.options.title : this.data.subject}"
								placeholder="Inserisci l&rsquo;oggetto dell'attivit&agrave;..."
								data-bind="subject" 
								required
							>
						</div>
						<div class="form-group mb-3">
							<div class="form-check">
								<input 
									class="form-check-input" 
									type="checkbox" 
									name="whole_day" 
									value="1" 
									data-bind="wholeDay" 
									${this.data.wholeDay ? 'checked' : ''}
								>
								<label class="form-check-label" for="flexCheckDefault">
									L&rsquo;evento dura tutto il giorno
								</label>
							</div>
						</div>
						<div class="form-group mb-3">
							<label class="form-label">Fascia oraria</label>
							<div class="d-flex no-wrap">
								<div class="input-group">
									<input 
										type="text" 
										class="form-control" 
										list="time-slots" 
										name="time_from" 
										data-bind="timeFrom" 
										maxlength="5" 
										value="${startsAtTime}" 
										pattern="timeRegex" 
										placeholder="hh:mm" 
										required
									>
									<div class="input-group-text reset">
										<span class="fal fa-times redFont"></span>
									</div>
								</div>
								<div class="d-flex justify-content-center align-items-center mx-3">
								<span class="fas fa-arrow-right"></span>
								</div>
								<div class="input-group">
									<input 
										type="text" 
										class="form-control" 
										list="time-slots" 
										name="time_to" 
										data-bind="timeTo" 
										maxlength="5" 
										value="${endsAtTime}" 
										pattern="timeRegex" 
										placeholder="hh:mm" 
										required
									>
									<div class="input-group-text reset">
										<span class="fal fa-times redFont"></span>
									</div> 
								</div>
							</div>
							<datalist id="time-slots">${timeSlotOptions.join('')}</datalist>
						</div>
						<div class="form-group mb-3">
							<label class="form-label">Data</label>
							<input type="text" name="starts_at" class="form-control dtpicker" value="${startsAtDate}" data-bind="date" readonly required>
						</div>
                        <div class="form-group mb-3">
                            <label class="form-label">Colore</label>
                            <div>${colorsItems.join('')}</div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Commento</label>
                            <textarea class="form-control" name="comment" rows="4" placeholder="Inserisci ulteriori informazioni..."></textarea>
                        </div>
                        <div class="form-group mb-3">  
							<div class="d-flex justify-content-start align-items-center">
								<div class="me-3">
									<label class="form-check-label">Attivit&agrave; completata</label>
								</div>
								<div class="me-3">
									<input class="form-check-input me-2" type="radio" name="status" value="completed" data-bind="statusCompleted" ${this.data.status == 'completed' ? 'checked' : ''}>SI
								</div>
								<div class="me-3">
									<input class="form-check-input me-2" type="radio" name="status" value="pending" data-bind="statusPending" ${this.data.status == 'pending' ? 'checked' : ''}>NO
								</div>
							</div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label col-md-3">Responsabile:</label>
							<select class="form-select" name="user_id" data-bind="responsibleId" required>
								<option value="">Seleziona il responsabile...</option>
								${siblingsOptions.join('')}
							</select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn-custom action submit" data-bind="submit">
                        <span class="fad fa-check greenFont"></span> APPLICA
                    </button>&nbsp;
                    <button class="btn-custom" data-dismiss="modal">
                        <span class="fad fa-times redFont"></span> ANNULLA
                    </button>
                </div>
            </div>
        </div>`;
        document.body.appendChild(el);
        this.form = el.querySelector('form');
        void new LinkedFields(this.form);
        el.querySelectorAll('[data-bind]').forEach(item => {
            this.binds[item.dataset.bind] = item;
        });

        void new Datepicker(this.binds.date, {
            autohide: true,
            language: 'it'
        });

        this.modal = new Modal({el: el});
        this.registerEventsHandlers();
        this.evaluateWholeDayFlag();
        this.modal.show();
    }

    registerEventsHandlers() {

        this.modal.on('shown', () => {
            if (typeof this.options.onShow == 'function') {
                this.options.onShow(this);
            }
        });

        this.modal.on('hide', () => {
            if (typeof this.options.onHide == 'function') {
                this.options.onHide();
            }
        });

        this.binds.submit.addEventListener('click', this.submit.bind(this));

        this.binds.timeFrom.addEventListener('change', () => this.evaluateTime(this.binds.timeFrom));
        this.binds.timeTo.addEventListener('change', () => this.evaluateTime(this.binds.timeTo));

        this.binds.timeFrom.addEventListener('keyup', this.addColonOnTime);
        this.binds.timeTo.addEventListener('keyup', this.addColonOnTime);

        this.binds.wholeDay.addEventListener('change', this.evaluateWholeDayFlag.bind(this));

        const activityPicker = this.binds.taskTypeId;
        if (activityPicker) {
            activityPicker.addEventListener('change', () => {
                const optionIndex = activityPicker.selectedIndex;
                if (this.binds.subject.value.trim() != '' || optionIndex == 0) {
                    return;
                }
                const option = activityPicker.options[optionIndex];
                this.binds.subject.value = `${option.textContent} `;
                this.binds.subject.focus();
            });                
        }

    }

    evaluateTime(subject) {
        !(this.timeRegex.test(subject.value)) && (subject.value = '');
    }

    evaluateWholeDayFlag() {
        const isWholeDay = this.binds.wholeDay.checked;
        this.binds.timeFrom.required = !isWholeDay;
        this.binds.timeTo.required = !isWholeDay;
        this.binds.timeFrom.closest('.form-group').classList.toggle('hidden', isWholeDay);
        if (isWholeDay) {
            this.binds.timeFrom.value = '00:00';
            this.binds.timeTo.value = '23:59';
        }
    }

    addColonOnTime(e) {
        if (['0','1','2','3','4','5','6','7','8','9'].includes(e.key) && this.value.length == 2) {
            this.value += ':';
            return;
        }
        if (this.dataset.bind == 'timeFrom' && this.value.length == 5) {
            this.closest('.time-wrapper').querySelector('input[data-bind="timeTo"]').focus();
        }
    }

    submit() {
		
		const elementsWithBadClass = document.querySelectorAll('.bad');
		elementsWithBadClass.forEach(function(element) {
			element.classList.remove('bad');
		});
		
        const validator = new FormValidator({
            regex: {
                timeRegex: this.timeRegex
            }
        });
        const validation = validator.checkAll(this.form);
        if (!validation.valid) {
            validation.fields.forEach(entry => {
                if (entry.valid) {
                    return;
                }
                entry.field.closest('.form-group').classList.add('has-error');
            });
			return new resAlert('Dati non validi', 'I campi contrassegnati in rosso sono incompleti o contengono valori non validi.', {type:'error'});
        }

        const method = this.data.id == null ? 'post' : 'patch';
        const payload = FormSerializer.for(this.form).serialize();

        console.log(payload);

        const startDatetime = moment(`${payload.starts_at} ${payload.time_from}`, 'DD/MM/YYYY HH:mm');
        const endDatetime = moment(`${payload.starts_at} ${payload.time_to}`, 'DD/MM/YYYY HH:mm');

        if (endDatetime.diff(startDatetime) <= 0) {
            this.binds.timeTo.closest('.form-group').classList.add('has-error');
            return resAlert.error('Dati non validi', 'L&rsquo;orario di fine dell&rsquo;evento non pu&ograve; essere antecedente a quello di inizio.');
        }
        payload.starts_at = startDatetime.format('YYYY-MM-DD HH:mm:ss');
        payload.ends_at = endDatetime.format('YYYY-MM-DD HH:mm:ss');

        if (this.options.withUpdatedList) {
            payload.with_updated_list = 1;
        }

        this.binds.submit.classList.add('loading');
        
        HttpRequest[method](this.endpoint, payload, (data, response) => {
            this.binds.submit.classList.remove('loading');
            if (data.status !== 1) {
                throw data.message ?? 'Errore generico';
            }
            if (typeof this.options.onSuccess == 'function') {
                this.options.onSuccess(data);
            }
            this.modal.hide();
        }, err => void resAlert.error('Operazione fallita', err.toString()));
    }

}

class CalendarEventsFieldset {

    wrapper;
    options;
    addCtl;
    table;
    tableBody;
    endpoint;

    constructor(wrapper = '.calendar-events-wrapper', options = {}) {
        if (typeof wrapper == 'string') {
            wrapper = document.querySelector(wrapper);
        }
        if (!(wrapper instanceof HTMLElement)) {
            throw 'Invalid Calendar Events wrapper';
        }
        if (options.entity == null || options.entityId == null) {
            throw 'Missing entity reference';
        }
        this.wrapper = wrapper;
        this.options = options;
        this.init();
    }

    init() {
        this.endpoint = `${res.absolutePath}api/${this.options.entity}/${this.options.entityId}/event`;
        this.render();
        this.loadFromDOM();
        this.registerEventsHandlers();
    }

    loadFromDOM() {
        const events = Utils.extractJson(
            this.wrapper.querySelector('script[type="application/json"]'), 
            true
        );
        if (events == null) {
            return;
        }
        this.renderEvents(events);
    }

    render() {
        let fieldset = document.createElement('fieldset');
        fieldset.innerHTML = `
            <legend>
                CRM ATTIVITA&rsquo;
                <div class="action-group">
                    <a class="action add-calendar-event" href="javascript:void(0);">
                        <i class="far fa-plus"></i> NUOVA
                    </a>
                </div>
            </legend>
            <div class="table-responsive">
                <table class="w100 hover bordered">
                    <thead>
                        <tr>
                            <th>Data e ora</th>
                            <th>Utente</th>
                            <th>Attività</th>
                            <th>Opzioni</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>`;
        this.table = fieldset.querySelector('table');
        this.tableBody = this.table.querySelector('tbody');
        this.addCtl = fieldset.querySelector('.action.add-calendar-event');
        this.wrapper.appendChild(fieldset);
    }

    registerEventsHandlers() {
        this.addCtl.addEventListener('click', this.addEvent.bind(this));
    }

    refreshList() {
        HttpRequest.get(this.endpoint, (data, response) => {
            if (data.status !== 1) {
                throw data.message ?? 'Errore generico';
            }
            this.renderEvents(data.result.list);
        }, err => resAlert.error('Operazione fallita', err.toString()));
    }

    renderEvents(events) {
        this.tableBody.innerHTML = '';
        this.table.classList.toggle('hidden', events.length == 0);
        events.forEach(event => {
            this.tableBody.appendChild(
                (new CalendarEventsFieldsetRow(this, event)).getNode()
            );
        });
    }

    addEvent() {
        void new CalendarEventModal(null, {
            endpoint: this.endpoint,
            withUpdatedList: true,
			title: document.querySelector('.page-title').textContent,
            onSuccess: (data) => {
                if (data.status === 1) {
                    this.renderEvents(data.result.list);
                }
            }
        });
    }

}

class CalendarEventsFieldsetRow {

    parent;
    data;

    wrapper;
    editCtl;
    deleteCtl;

    constructor(parent, data) {
        this.parent = parent;
        this.data = data;
        this.init();
    }

    init() {
        this.render();
        this.registerEventsHandlers();
    }

    render() {
        this.wrapper = document.createElement('tr');
        this.wrapper.innerHTML = `<td>${moment(this.data.startsAt).format('DD/MM/YYYY HH:mm')}</td>
            <td>${this.data.userName}</td>
            <td>${this.data.activity}</td>
            <td>
                <button class="action edit-calendar-event">
                    <span class="fas fa-pencil orangeFont"></span>
                </button>
                <button class="action delete-calendar-event">
                    <span class="fas fa-trash redFont"></span>
                </button>
            </td>`;
        this.editCtl = this.wrapper.querySelector('.action.edit-calendar-event');
        this.deleteCtl = this.wrapper.querySelector('.action.delete-calendar-event');
    }

    registerEventsHandlers() {

        this.editCtl.addEventListener('click', () => {
            void new CalendarEventModal(this.data.id, {
                endpoint: this.parent.endpoint,
				title: document.querySelector('.page-title').textContent,
                onSuccess: () => {
                    this.parent.refreshList();
                }
            });
        });

        this.deleteCtl.addEventListener('click', () => {
            if (!confirm('Eliminare l&rsquo;arrivit&agrave; selezionata?')) {
                return;
            }
            this.deleteCtl.classList.add('loading');
            HttpRequest.delete(`${this.parent.endpoint}/${this.data.id}`, {}, (data, response) => {
                if (data.status !== 1) {
                    throw data.message ?? 'Errore generico';
                }
                this.parent.refreshList();
            }, err => console.log(err));
        });

    }

    getNode() {
        return this.wrapper;
    }

}

class CalendarLinkModal {

    options;
    wrapper;
    agencies;
    role;
    agency;
    form;
    input;

    constructor(options = {}) {
        this.options = options;
        this.init();
    }

    async init() {
        this.removePreviousInstances();
        const agenciesData = await HttpRequest.get(`${res.absolutePath}api/me/agencies`);
        if (agenciesData.status !== 1) {
            return resAlert.error('Operazione fallita', agenciesData.message ?? 'Errore generico');
        }
        this.agencies = agenciesData.result.list;
        this.render();
        this.registerEventsHandlers();
    }

    render() {
        let agenciesListMarkup = this.agencies.map(agency => {
            return `<option value="${agency.id}">${agency.description}</option>`;
        });
        let markup = `<div class="modal fade ${this.constructor.name}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">LINK CALENDARIO</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="javascript:void(0);" method="POST">
                            <div class="form-group">
                                <label class="control-label col-md-2">Tipo:</label>
                                <div class="col-md-10">
                                    <label class="radio-inline">
                                    <input type="radio" name="role" value="agency">AGENZIA</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="role" value="user" checked>PERSONALE 
                                    </label>
                                </div>
                            </div>
                            <div class="form-group hidden">
                                <label class="control-label col-md-2">Agenzia:</label>
                                <div class="col-md-7">
                                    <select class="form-control" name="agency_id" disabled>${agenciesListMarkup.join('')}</select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">URL:</label>
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="calendar-link" readonly>
                                        <span class="input-group-addon cursor-pointer copy-group-text">
                                            <span class="fa fa-copy text-primary"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>`;
        document.body.insertAdjacentHTML('beforeend', markup);
        this.wrapper = document.querySelector(`.${this.constructor.name}`);
        this.modal = new Modal({
            el: this.wrapper
        });
        this.form = this.wrapper.querySelector('form');
        this.input = this.wrapper.querySelector('#calendar-link');
        this.agency = this.wrapper.querySelector('select[name="agency_id"]');
        this.modal.show();
    }

    removePreviousInstances() {
        const instances = document.querySelectorAll(`.${this.constructor.name}`);
        instances.forEach(instance => instance.remove());
    }

    registerEventsHandlers() {

        this.modal.on('shown', () => {
            this.getLink();
            if (typeof this.options.onOpen == 'function') {
                this.options.onOpen();
            }
        });

        this.modal.on('hidden', () => {
            if (typeof this.options.onClose == 'function') {
                this.options.onClose();
            }
        });
        
        this.wrapper.querySelectorAll('input[name="role"]').forEach(itm => {
            itm.addEventListener('change', () => {
                if (!itm.checked) {
                    return;
                }
                this.agency.closest('.form-group').classList.toggle('hidden', itm.value == 'admin');
                this.agency.disabled = itm.value == 'admin';
                this.getLink();
            });           
        });

        this.agency.addEventListener('change', () => {
            this.getLink();
        });
    }

    getLink() {
        this.input.value = '';
        let requestUrl = new URL(`${res.absolutePath}api/calendar/link`);
        const formData = (FormSerializer.for(this.form)).serialize();
        requestUrl.searchParams.set('entity', formData.role);
        if (formData.role == 'agency') {
            requestUrl.searchParams.set('entityId', formData.agency_id);
        }
        this.form.classList.add('loading');
        HttpRequest.get(requestUrl.toString(), (data, response) => {
            this.form.classList.remove('loading');
            if (data.status !== 1) {
                return resAlert.error('Operazione fallita', data.message ?? 'Errore generico');
            }
            const timestamp = Math.floor(new Date().getTime() / 1000);
            this.input.value = `${res.absolutePath}ical/${data.result.token}?v=${timestamp}`;
        }, err => resAlert.error('Operazione fallita', err.toString()));
    }

}

class MailModal {

    params;
    wrapper;
    modal;
    binds = {};
    files = [];

    constructor(params = {}) {

        this.removePreviousInstances();
        this.params = params;

        this.init();
    }

    init() {

        this.render();
        this.wrapper.querySelectorAll('*[data-bind]').forEach(item => {
            this.binds[item.dataset.bind] = item;
        });
        
        if (this.params.recipients && Array.isArray(this.params.recipients)) {
            this.binds.recipientInput.value = this.params.recipients.join(', ');
        }
        if (this.params.ccs && Array.isArray(this.params.ccs)) {
            this.binds.carbonCopyInput.value = this.params.ccs.join(', ');
            this.binds.carbonCopyWrapper.hidden = false;
        }
        this.binds.subjectInput.value = this.params.subject ?? '';
        this.binds.contentArea.value = this.params.body ?? '';

        this.modal = new Modal({
            el: this.wrapper
        });
        this.modal.show();

        this.registerEventsHandlers();
    }

    render() {

        this.wrapper = document.createElement('div');
        this.wrapper.classList.add('modal', 'fade', this.constructor.name);
        this.wrapper.role = 'dialog';
        this.wrapper.tabindex = -1;

        this.wrapper.innerHTML = `<div class="modal-dialog modal-lg" role="document">
            <div class="modal-content mail-modal-content" data-bind="modalContent">
                <div class="modal-header">
                    <h6 class="modal-title">NUOVA EMAIL</h6>
                    <button type="button" class="close btn btn-danger btn-square-small" data-dismiss="modal" aria-label="Chiudi">
                        <span class="fa fa-times"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0);" method="post" data-bind="form">
                        <div class="mail-modal-details">
                            <div class="mail-modal-detail-row">
                                <div class="mail-modal-detail-label">Invia a:</div>
                                <div class="mail-modal-detail-content">
                                    <input type="text" class="form-control" data-bind="recipientInput" placeholder="Per inviare a pi&ugrave; destinatari separare gli indirizzi con la virgola">
                                </div>
                                <div class="mail-modal-detail-options">
                                    <button type="button" class="btn-muted btn-square-small" data-bind="addAttachment" tabindex="-1" title="Aggiungi allegato">
                                        <i class="fal fa-paperclip"></i>
                                    </button>
                                    <button type="button" class="btn-muted btn-square-small" data-bind="addCarbonCopy" tabindex="-1" title="Aggiungi destinatario in copia">Cc</button>
                                </div>
                            </div>
                            <div class="mail-modal-detail-row" data-bind="carbonCopyWrapper" hidden>
                                <div class="mail-modal-detail-label">Cc:</div>
                                <div class="mail-modal-detail-content">
                                    <input type="text" class="form-control" data-bind="carbonCopyInput" placeholder="Separare pi&ugrave; indirizzi in copia con la virgola">
                                </div>
                            </div>
                            <div class="mail-modal-detail-row">
                                <div class="mail-modal-detail-label">Oggetto:</div>
                                <div class="mail-modal-detail-content">
                                    <input type="text" class="form-control" name="subject" data-bind="subjectInput" placeholder="Inserire l&rsquo;oggetto della mail">
                                </div>
                            </div>
                        </div>
                        <div class="mail-modal-content-wrapper">
                            <textarea placeholder="Testo della mail..." name="content" data-bind="contentArea" rows="10"></textarea>
                            <div class="mail-modal-attachments-wrapper" data-bind="attachmentsWrapper" hidden>
                                <input type="file" data-bind="attachmentInput" multiple>
                                <div class="mail-modal-attachments-container" data-bind="attachmentsContainer"></div>
                            </div>    
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-custom action submit" data-bind="submitButton">
                        <i class="fad fa-paper-plane navyFont mr5"></i>INVIA EMAIL
                    </button>
                    <button type="button" class="btn-custom action" data-dismiss="modal">
                        <i class="fad fa-times redFont mr5"></i>ANNULLA
                    </button>
                </div>
            </div>
        </div>`;
        document.body.insertAdjacentElement('beforeend', this.wrapper);
    }

    registerEventsHandlers() {

        this.modal.on('shown', () => {
            if (typeof this.params.onOpen == 'function') {
                this.params.onOpen();
            }
        });

        this.modal.on('hidden', () => {
            if (typeof this.params.onClose == 'function') {
                this.params.onClose();
            }
            this.wrapper.remove();
        });

        this.binds.submitButton.addEventListener('click', () => {
            this.send();
        });

        this.binds.addCarbonCopy.addEventListener('click', () => {
            this.binds.carbonCopyWrapper.hidden = false;
        });

        this.binds.addAttachment.addEventListener('click', () => {
            this.openAttachmentsExplorer();
        });

        this.binds.attachmentInput.addEventListener('change', () => {
            this.uploadAttachments();
        });

        this.binds.attachmentsWrapper.addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-attachment')) {
                this.removeAttachment(e.target.dataset.index);
            }
        });
    }

    send() {
        if (this.binds.recipientInput.value.trim() == '') {
            return resAlert.warning('Invio annullato', 'Inserire almeno un destinatario');
        }
        if (this.binds.subjectInput.value.trim() == '') {
            return resAlert.warning('Invio annullato', 'L&rsquo;oggetto della mail non pu&ograve; essere vuoto');
        }
        if (this.binds.contentArea.value.trim() == '') {
            return resAlert.warning('Invio annullato', 'Il contenuto della mail non pu&ograve; essere vuoto');
        }
        let recipients = this.getRecipientsList();
        if (!recipients.every(this.validateEmail)) {
            return resAlert.warning('Invio annullato', 'Uno o pi&ugrave; indirizzi email destinatari non sono validi');
        }
        let carbonCopys = this.getCarbonCopyList();
        if (carbonCopys != null && !carbonCopys.every(this.validateEmail)) {
            return resAlert.warning('Invio annullato', 'Uno o pi&ugrave; destinatari in copia non sono validi');
        }
        let formData = new FormData();
        recipients.forEach(recipient => {
            formData.append('recipient[]', recipient);
        });
        if (carbonCopys != null) {
            carbonCopys.forEach(carbonCopy => {
                formData.append('cc[]', carbonCopy);
            });
        }
        formData.append('subject', this.binds.subjectInput.value.trim());
        formData.append('body', this.binds.contentArea.value);
        if (this.files.length > 0) {
            this.files.forEach(file => {
                formData.append('attachments[]', file);
            });               
        }
        this.binds.modalContent.classList.add('loading');
        HttpRequest.post(`${res.absolutePath}api/email`, formData, (data, response) => {
            this.binds.modalContent.classList.remove('loading');
            if (data.status == 0) {
                const message = data.message ?? 'Errore generico';
                if (typeof this.params.onFail == 'function') {
                    this.params.onFail(message);
                }
                throw message;
            }
            if (typeof this.params.onSend == 'function') {
                this.params.onSend();
            }
            this.modal.hide();
        }, err => resAlert.error('Invio non riuscito', err.toString()));
    }

    getRecipientsList() {
        return this.binds.recipientInput.value.split(',').map(addr => addr.trim());
    }

    getCarbonCopyList() {
        if (this.binds.carbonCopyInput.value.trim() == '') {
            return null;
        }
        return this.binds.carbonCopyInput.value.split(',').map(addr => addr.trim());
    }

    validateEmail(str) {
        var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(str);
    }

    openAttachmentsExplorer() {
        this.binds.attachmentInput.click();
    }

    uploadAttachments(evt) {
        const files = this.binds.attachmentInput.files;
        if (files.length == 0) {
            return;
        }
        for(const file of files) {
            this.files.push(file);
        }
        this.binds.attachmentInput.value = '';
        this.renderAttachments();
    }

    renderAttachments() {
        let cards = this.files.map((file, index) => {
            return `<div class="mail-modal-attachment">
                <span class="mail-modal-attachment-preview">
                    <i class="${this.getIconFromMimeType(file.type)} fa-3x"></i>
                </span>
                <div class="mail-modal-attachment-content">
                    <span class="title" title="${file.name}">${file.name}</span>
                    <span class="size">${this.formatFileSize(file.size)}</span>
                    <a href="javascript:void(0);" class="remove-attachment" data-index="${index}">Rimuovi</a>
                </div>
            </div>`
        });
        this.binds.attachmentsContainer.innerHTML = cards.join('');
        this.binds.attachmentsWrapper.hidden = this.files.length == 0;                
    }

    removeAttachment(index) {
        this.files.splice(index, 1);
        this.renderAttachments();
    }

    getIconFromMimeType(mime) {
        let mimeTypes = {
            'application/pdf': 'fal fa-file-pdf',
            'text/csv': 'fal fa-file-spreadsheet',
            'application/zip': 'fal fa-file-archive',
            'application/x-gzip': 'fal fa-file-archive',
            'image/jpeg': 'fal fa-image',
            'image/png': 'fal fa-image',
            'application/octet-stream': 'fal fa-file-word',
            'text/plain': 'fal fa-file-alt'
        };
        return (mimeTypes[mime] != null) ? mimeTypes[mime] : 'fal fa-file';
    }

    formatFileSize(size) {
        var i = (size == 0) ? 0 : Math.floor(Math.log(size) / Math.log(1024));
        return (size / Math.pow(1024, i)).toFixed(2) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i];
    }

    removePreviousInstances() {
        const instances = document.querySelectorAll(`.${this.constructor.name}`);
        instances.forEach(instance => instance.remove());
    }

}
