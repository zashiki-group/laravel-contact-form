# laravel-contact-form

## インストール方法

composer.jsonに追記してインストール

~~~bash
composer config repositories.zashiki-group/laravel-contact-form vcs git@github.com:zashiki-group/laravel-contact-form.git

# laravel 7.xの場合
composer require zashiki-group/laravel-contact-form

# laravel 5.xの場合
composer require zashiki-group/laravel-contact-form:~5.0
~~~

必要ファイルを展開

~~~bash
php artisan vendor:publish --provider="Zashiki\ContactForm\ServiceProvider"
~~~

webpack.mix.jsに追記してビルド

~~~js
.js('resources/js/contact.js', 'public/js')
~~~

~~~bash
npm run production
~~~

config/contact.phpを編集

~~~php
'key' => [
    'email' => 'メールアドレス',
    'name' => 'お名前',
],
'validation' => [
    'お名前' => 'required|string',
    'メールアドレス' => 'required|email',
    'お問い合わせ内容' => 'nullable|string'
]
~~~

.envに以下を追記
~~~.env
# 送信元名
CONTACT_FROM_NAME='コンタクトフォーム'
# 送信元アドレス
CONTACT_FROM_ADDRESS=
# 会社送信先
CONTACT_TO=
# 会社CC
CONTACT_CC=
# お客様BCC
CONTACT_BCC=
# 会社題名
CONTACT_SUBJECT_COMPANY='会社用題名'
# お客様題名
CONTACT_SUBJECT_CUSTOMER='お客様用題名'
~~~

## Viewファイルについて

resources/views/vendor/contact内
