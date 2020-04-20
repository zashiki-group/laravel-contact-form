<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
    <script src="{{ asset('js/contact.js') }}" defer></script>
</head>
<body>
    <form action="{{ route('contact') }}" method="post" id="contact-form" @submit="submit">
        @csrf
        <div>
            <input type="text" name="お名前" v-model="お名前" v-show="!confirm" required>
            <p v-show="confirm" v-text="お名前"></p>
        </div>
        <div>
            <input type="email" name="メールアドレス" v-model="メールアドレス" v-show="!confirm" required>
            <p v-show="confirm" v-text="メールアドレス"></p>
        </div>
        <div>
            <textarea name="お問い合わせ内容" v-model="お問い合わせ内容" rows="5" v-show="!confirm"></textarea>
            <pre v-show="confirm" v-text="お問い合わせ内容"></pre>
        </div>

        <button type="button" v-show="!confirm" @click.prevent="check">確認画面へ</button>
        <button type="button" v-show="confirm" @click.prevent="back">戻る</button>
        <button type="submit" v-show="confirm">送信</button>
    </form>
</body>
</html>
