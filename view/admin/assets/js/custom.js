String.prototype.fromMkaCurrency = function() {
    let val = parseFloat(this.replace(/[\ €\.]+/g, '').replace(',', '.'));
    return (isNaN(val)) ? 0 : val;
}

String.prototype.fromMkaDecimal = function() {
    let val = parseFloat(this.replace(/[\ €\.]+/g, '').replace(',', '.'));
    return (isNaN(val)) ? 0 : val;
}

String.prototype.fromMkaPercentage = function() {
    let val = parseFloat(this.replace(/[\ €\.%]+/g, ''));
    return (isNaN(val)) ? 0 : val;
}

Number.prototype.toMkaCurrencyFormat = function() {
    return this.toLocaleString('de-DE', {
        style: 'currency',
        currency: 'EUR',
        minimumFractionDigits: 2, 
        maximumFractionDigits: 2
    });
}

Number.prototype.toMkaDecimal = function() {
    return this.toLocaleString('de-DE', {
        style: 'decimal',
        minimumFractionDigits: 0, 
        maximumFractionDigits: 2
    });
}

Number.prototype.toMkaPercentage = function() {
    return this.toLocaleString('it-IT', {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }) + '&nbsp;&percnt;';
}

(function () {
    Datepicker.locales.it = {
        days: ["Domenica", "Lunedì", "Martedì", "Mercoledì", "Giovedì", "Venerdì", "Sabato"],
        daysShort: ["Dom", "Lun", "Mar", "Mer", "Gio", "Ven", "Sab"],
        daysMin: ["Do", "Lu", "Ma", "Me", "Gi", "Ve", "Sa"],
        months: ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"],
        monthsShort: ["Gen", "Feb", "Mar", "Apr", "Mag", "Giu", "Lug", "Ago", "Set", "Ott", "Nov", "Dic"],
        today: "Oggi",
        monthsTitle: "Mesi",
        clear: "Cancella",
        weekStart: 1,
        format: "dd/mm/yyyy"
    };
}());

const vsBoxDefaults = {
    placeHolder: 'Nessuna opzione selezionata',
    multipleSize: 3,
    selectAll: false,
    translations: {
        all: 'Tutti', 
        item: 'opzione selezionata',
        items: 'opzioni selezionate',
        selectAll: 'Seleziona tutti'
    }
};

document.addEventListener('click', function(e) {
    var _a = e.target;
    var _b = document.querySelector('.head .dropdown.active');
    if (_a !== _b && _b !== null) {
        _b.classList.remove('active');
    }        
});

document.addEventListener('DOMContentLoaded', function() {

    Array.from(document.querySelectorAll('.charCount')).forEach(function(element) {
        element.dispatchEvent(new Event('input', {bubbles: true}));
    });

    Delegate(document).on('click', '.tabs>.head>.tab', function(e) {
        let headCtls = Array.from(this.closest('.tabs').querySelectorAll('.head>.tab'));
        let contentCtls = Array.from(this.closest('.tabs').querySelectorAll('.content>.tab'));
        headCtls.forEach((_item, index) => {
            let toActive = _item === this;
            headCtls[index].classList.toggle('active', toActive);
            contentCtls[index].classList.toggle('active', toActive);
            if (toActive) {
                const event = new Event("tab-activate");
                _item.dispatchEvent(event);
            }
        });
    });
    
    Delegate(document).on('click', '.widget .head .dropdown', function() {
        this.classList.add('active');
    });
    
    Delegate(document).on(['input', 'propertychange'], '.char-count', function() {
        if (this.maxLength > 0) {
            this.parentNode.querySelector('.char-num').innerHTML = this.maxLength - this.value.length;
        } 
    });
    
    Delegate(document).on('click', '.input-group-addon.reset', function() {
        let _par = this.closest('.form-group');
        if (_par != null) {
            let _inp = _par.querySelector('.date-picker');
            if (_inp != null) {
                _inp.value = '';
            }
        }
    });

    Delegate(document).on('click', '.input-group-addon.toggle-password-visibility', function() {
        const input = this.previousElementSibling;
        if (input == null || input.localName != 'input') {
            return;
        }
        input.type = (input.type == 'password') ? 'text' : 'password';
    });

    Delegate(document).on('click', '.form-group .reset', function() {
        const target = this.parentNode.querySelector('input');
        target != null && (target.value = '');
    });

    Delegate(document).on('click', '.checkbox:not(.multiple)>label>input[type="checkbox"]', function(e) {
        if (this.readOnly === true) {
            e.preventDefault();
            e.stopPropagation();
            return false;
        }
        let rels = this.closest('.checkbox').querySelectorAll('label>input[type="checkbox"][name="' + this.name + '"]');
        if (rels.length > 1) {
            rels.forEach(rel => rel.checked = false);
            this.checked = true;
        }
    }); 

    Delegate(document).on('click', 'nav>ul>li>a', function() {
        this.closest('li').classList.toggle('open');
    });

    Delegate(document).on('click', '.action.login', function() {
        let serializer = new FormSerializer(document.querySelector('.login-form'));
        this.classList.add('loading');
        HttpRequest.put(`${res.path}session`, serializer.serialize(),
            response => {
                this.classList.remove('loading');
                if (response.status == 0) {
                    throw response.message ?? 'Errore generico';
                }
                window.location.href = res.path;           
            },
            error => {
                return new resAlert('Operazione fallita', error.toString(), {type:'error'});
            }, {
                failByStatusCode: false
            }
        )
    });

    Delegate(document).on('click', '.generate-calendar-link', function() {
        this.classList.add('loading');
        void new CalendarLinkModal({
            onOpen: () => {
                this.classList.remove('loading')
            }
        });
    });

    Delegate(document).on('click', '.send-logout-req', function() {
        this.classList.add('loading');
        HttpRequest.delete(`${res.path}session`, null,
            response => {
                if (response.status == 0) {
                    this.classList.remove('loading');
                    throw response.message ?? 'Errore generico';
                }
                window.location.href = res.path;           
            },
            error => {
                return new resAlert('Operazione fallita', error.toString(), {type:'error'});
            }
        )
    });

    Delegate(document).on('click', '.submit-password-restore', function() {
        let serializer = new FormSerializer(document.querySelector('.password-restore-form'));
        this.classList.add('loading');
        HttpRequest.post(`${res.path}user/password-restore-request`, serializer.serialize(),
            response => {
                if (response.status == 0) {
                    this.classList.remove('loading');
                    throw response.message ?? 'Errore generico';
                }
                void new resAlert('Ripristino della password', 'All&rsquo;indirizzo indicato &egrave; stata inviata una mail contenente il link per ripristinare la password.');
                this.remove();
            },
            error => {
                return new resAlert('Operazione fallita', error.toString(), {type:'error'});
            }
        )
    });

    Delegate(document).on('click', '.submit-new-password', function() {
        let _frm = document.querySelector('.password-restore-form');
        let validation = (new FormValidator({alerts: false})).checkAll(_frm);
        if (!validation.valid) {
            let invalidFieldsErrors = [];
            validation.fields.forEach(entry => {
                let _group = entry.field.closest('.form-group');
                _group.classList.toggle('has-error', !entry.valid);
                if (!entry.valid) {
                    let label = _group.querySelector('label.field-descriptor');
                    invalidFieldsErrors.push(`<span class="fw400 blackFont">${label.textContent}: </span>${entry.error}`);
                }
            });
            return new resAlert('Verificare i campi contrassegnati in rosso:', `${invalidFieldsErrors.join('<br>')}`, {type:'warning'});
        }
        let data = (new FormSerializer(_frm)).serialize();
        this.classList.add('loading');
        HttpRequest.patch(`${res.path}user/new-password`, data, response => {
            this.classList.remove('loading');
            if (response.status != 1) {
                throw response.message ?? 'Errore generico';
            }
            this.remove();
            void new resAlert(
                'Password reimpostata con successo', 
                `<p>Password reimpostata con successo.<br>Fai click <a href="${res.path}">qui</a> per effettuare il login.</p>`,
                {type:'success'}
            );
        }, 
        error => {
            return new resAlert('Operazione fallita', error.toString(), {type:'error'});
        });
    });

    Array.from(document.querySelectorAll('.dtpicker')).forEach(_picker => {
        void new Datepicker(_picker, {
            autohide: true,
            language: 'it'
        });
    });

    let _linkedFields = document.querySelectorAll('.linked-fields');
    if (_linkedFields.length > 0) {
        _linkedFields.forEach(_group => {
            new LinkedFields(_group);
        });    
    }

    Delegate(document).on('click', '.password-strength-info', () => {
        void new resAlert('Requisiti password', `La password deve essere composta da: <ul class="pl25 mt10"><li>almeno un carattere maiuscolo</li><li>almeno un carattere minuscolo</li><li>almeno un simbolo fra: @ $ ! % * ? &</li><li>almeno un numero</li><li>almeno 8 caratteri</li></ul>`, {type:'info'});
    });

    Delegate(document).on('keydown', '.currency', function(e) {
        let valid = [8, 9, 13, 27, 35, 36, 37, 38, 39, 40, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 109, 189, 190];
        let char = (e.which || e.keyCode);
        let chars = this.value.split('');
        let hasDot = chars.includes('.');
        let hasDash = chars.includes('-');
        if ((hasDot && [110, 190].includes(char)) || 
            (hasDash && [109, 189].includes(char)) || 
            (this.value.length > 0 && [109, 189].includes(char)) || 
            !valid.includes(char) || e.shiftKey) {
                e.preventDefault();
        }
    });
    
    Delegate(document).on('keydown', '.numeric', function(e) {
        let valid = [8, 9, 13, 27, 35, 36, 37, 38, 39, 40, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 109, 189];
        let char = (e.which || e.keyCode);
        let chars = this.value.split('');
        let hasDash = chars.includes('-');
        if (!valid.includes(char) || (hasDash && [109, 189].includes(char)) || (this.value.length > 0 && [109, 189].includes(char)) || e.shiftKey) {
            e.preventDefault();
        }
    });
    
    Delegate(document).on('keydown', '.discount', function(e) {
        let valid = [8, 9, 13, 27, 35, 36, 37, 38, 39, 40, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105];
        if (!valid.includes(e.which || e.keyCode) || e.shiftKey) {
            e.preventDefault();
        }
    });
    
    Delegate(document).on('keydown', '.mka-decimal', function(e) {
        let valid = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', ',', 'ArrowUp', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'Backspace', 'Delete', 'Enter', 'Tab'];
        let chars = this.value.split('');
        let hasComma = chars.includes(',');
        let hasDash = chars.includes('-');
        if ((hasComma && e.key == ',') ||
            (hasDash && e.key == '-') || 
            (this.value.length > 0 && e.key == '-') || 
            !valid.includes(e.key) || e.shiftKey) {
                e.preventDefault();
        }
    });
    
    Delegate(document).on('keydown', '.mka-currency', function(e) {
        let valid = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '.', 'ArrowUp', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'Backspace', 'Delete', 'Enter', 'Tab'];
        let chars = this.value.split('');
        let hasDot = chars.includes('.');
        let hasDash = chars.includes('-');
        if ((hasDot && e.key == '.') || 
            (hasDash && e.key == '-') || 
            (this.value.length > 0 && e.key == '-') || 
            !valid.includes(e.key) || e.shiftKey) {
                e.preventDefault();
        }
    });
    
    Delegate(document).on('keydown', '.mka-numeric', function(e) {
        let valid = [8, 9, 13, 27, 35, 36, 37, 38, 39, 40, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 109, 189];
        let char = (e.which || e.keyCode);
        let chars = this.value.split('');
        let hasDash = chars.includes('-');
        if (!valid.includes(char) || (hasDash && [109, 189].includes(char)) || (this.value.length > 0 && [109, 189].includes(char)) || e.shiftKey) {
            e.preventDefault();
        }
    });
    
    Delegate(document).on('keydown', '.mka-discount', function(e) {
        let valid = [8, 9, 13, 27, 35, 36, 37, 38, 39, 40, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105];
        if (!valid.includes(e.which || e.keyCode) || e.shiftKey) {
            e.preventDefault();
        }
    });
    
    Delegate(document).on(['input', 'propertychange'], '.form-group.has-error .form-control', function() {
        if (this.value.trim().length > 0) {
            this.closest('.form-group.has-error').classList.remove('has-error');
        }
    });
    
    Delegate(document).on('keyup', '.reqField', function() {
        if (this.value.length > 0) {
            this.classList.remove('errorField');
        }
    });
    
    Delegate(document).on('click', '.widget.collapsible button[data-action="collapse"]', function() {
        let _self = this;
        let _widget = this.closest('.widget');
        let _content = _widget.querySelector('.content');
        let close = !_widget.classList.contains('collapsed');
        let initialHeight = window.getComputedStyle(_content).height;
        _widget.classList.remove('collapsed');
        let finalHeight = (close) ? '0px' : window.getComputedStyle(_content).height;
        requestAnimationFrame(() => {
            _content.style.height = initialHeight;
            requestAnimationFrame(() => {
                _content.style.height = finalHeight;
                _content.addEventListener('transitionend', function() {
                    this.style.height = '';
                    _widget.classList.toggle('collapsed', close);
                    _content.removeEventListener('transitionend', arguments.callee);
                    _self.querySelector('span').className = `fal fa-toggle-${(close) ? 'on' : 'off'}`;
                });
            });
        });
    
    });
    
    Delegate(document).on('focus', 'table.editable tr td input:not([readonly])', function() {
        this.select();
    });
    
    Delegate(document).on('click', '.dropdown .dropdown-toggle', function() {
        this.closest('.dropdown').classList.toggle('open');
    });
    
    Delegate(document).on('click', '*', function() {
        if (this.closest('.dropdown') === null) {
            document.querySelectorAll('.dropdown').forEach(_dropdown => {
                _dropdown.classList.remove('open');
            });
        }
    });
    
    Delegate(document).on('click', 'fieldset legend', function(e) {
        if (e.target === this) {
            this.parentNode.classList.toggle('collapsed');
        }
    });

    Delegate(document).on('click', '.copy-group-text', function() {
        let _grp = this.closest('.input-group');
        let _inp = _grp.querySelector('input.form-control');
        if (navigator.clipboard) {
            navigator.clipboard.writeText(_inp.value).then(() => {
                void new resAlert('Appunti', 'Testo copiato negli appunti.', {type:'success'});
            }, (err) => {
                void new resAlert('Operazione fallita', err.toString(), {type:'error'});
            });
        } else {
            void new resAlert('Operazione fallita', 'Il browser che stai utilizzando non supporta la Clipboard API.', {type:'error'});
        }
    });

    Delegate(document).on('click', '.send-email-modal[data-email]', function() {
        void new MailModal({
            recipients: [this.dataset.email]
        });
    });
});