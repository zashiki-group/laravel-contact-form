require('./bootstrap')

window.Vue = require('vue')

$(function () {
    if (!$('#contact-form').length) {
        return
    }

    const form = $('#contact-form')

    const required = []
    const data = {
        confirm: false,
        sending: false,
    }
    let email = null

    $('*[v-model]', form).each(function () {
        if ($(this).prop('required')) {
            required.push($(this).attr('v-model'))
        }

        data[$(this).attr('v-model')] = ''

        if ($(this).attr('type') === 'email') {
            email = $(this).attr('v-model')
        }
    })

    if (!email) {
        alert('メールアドレスのInputがありません')
        return
    }

    new Vue({
        el: '#contact-form',
        data: data,
        methods: {
            validate () {
                const errors = []
                required.forEach(v => {
                    if (!this[v]) {
                        errors.push(v + 'は必須です')
                    } else if (v === email) {
                        if (!/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(this[email])) {
                            errors.push('メールアドレスが正しくありません')
                        }
                    }
                })
                return errors
            },

            check () {
                const errors = this.validate()
                if (errors.length) {
                    alert(errors.join('\n'))
                } else {
                    this.confirm = true
                }
            },

            back () {
                this.sending = false
                this.confirm = false
            },

            submit (e) {
                if (!this.confirm) {
                    e.preventDefault()
                    return
                }

                if (this.sending) {
                    e.preventDefault()
                    return
                }

                const errors = this.validate()

                if (errors.length) {
                    e.preventDefault()
                    alert(errors.join('\n'))
                    return
                }

                this.sending = true
            }
        }
    })
})
